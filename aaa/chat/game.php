<?php
session_start();

// ゲームの状態をセッションに保存
if (!isset($_SESSION['money'])) {
    $_SESSION['money'] = 0;
    $_SESSION['winningStreak'] = 0;
    $_SESSION['drawStreak'] = 0;
}

// ゲームの状態を変数に代入
$money = $_SESSION['money'];
$winningStreak = $_SESSION['winningStreak'];
$drawStreak = $_SESSION['drawStreak'];

// ゲームの結果を表示するための変数
$result = '';

// ゲームをプレイしたときの処理
if (isset($_POST['playerChoice'])) {
    $playerChoice = $_POST['playerChoice'];
    $computerChoices = array('rock', 'paper', 'scissors');
    $computerChoice = $computerChoices[rand(0, 2)];

    if ($playerChoice === $computerChoice) {
        $result = '引き分け';
        $drawStreak++;
    } else if (
        ($playerChoice === 'rock' && $computerChoice === 'scissors') ||
        ($playerChoice === 'paper' && $computerChoice === 'rock') ||
        ($playerChoice === 'scissors' && $computerChoice === 'paper')
    ) {
        $drawStreak = 0;
        $winningStreak++;
        $winningAmount = ($winningStreak === 1) ? 100 : 100 * pow(2, $winningStreak - 1);
        $money += $winningAmount;
        $result = '勝ち！所持金が' . $money . '円になりました。';
    } else {
        $drawStreak = 0;
        $result = '負け！所持金が0円になりました。';
        $money = 0;
        $winningStreak = 0;
    }

    // ゲームの状態をセッションに更新
    $_SESSION['money'] = $money;
    $_SESSION['winningStreak'] = $winningStreak;
    $_SESSION['drawStreak'] = $drawStreak;
}

// ゲームをリセットする処理
if (isset($_POST['reset'])) {
    $_SESSION['money'] = 0;
    $_SESSION['winningStreak'] = 0;
    $_SESSION['drawStreak'] = 0;
    $money = 0;
    $winningStreak = 0;
    $drawStreak = 0;
}

// HTMLを出力
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <title>後澤jaiけんゲーム</title>
    <style>
        /* スタイリング */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .buttons button {
            font-size: 18px;
            padding: 15px 30px;
            margin: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .buttons button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>後澤jaiけん</h1>
        <p>所持金: <?php echo $money; ?>円</p>
        <form method="post">
            <div class="buttons">
                <button type="submit" name="playerChoice" value="rock">グー</button>
                <button type="submit" name="playerChoice" value="scissors">チョキ</button>
                <button type="submit" name="playerChoice" value="パー">パー</button>
            </div>
        </form>
        <p><?php echo $result; ?></p>
    </div>
</body>
</html>