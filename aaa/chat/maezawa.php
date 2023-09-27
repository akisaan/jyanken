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
        <p id="money">所持金: 0円</p>
        <div class="buttons">
            <button onclick="playGame('rock')">グー</button>
            <button onclick="playGame('scissors')">チョキ</button>
            <button onclick="playGame('paper')">パー</button>
            
        </div>
        <p id="result"></p>
        <button onclick="resetGame()" style="background-color: #d03ce7; padding: 15px 30px; border-radius: 8px; color: white; border: none; cursor: pointer; transition: background-color 0.3s;">ゲームリセット</button>

        <!-- 追加: 続けますか？ -->
        <div id="continueSection" style="display: none;">
            <p>続けますか？</p>
            <button onclick="continueGame(true)">はい</button>
            <button onclick="continueGame(false)">いいえ</button>
        </div>
    </div>

    <script>
        <?php
        $money = 0;
        $winningStreak = 0;
        $drawStreak = 0;
        ?>

        function playGame(playerChoice) {
            const computerChoice = ['rock', 'paper', 'scissors'][Math.floor(Math.random() * 3)];

            let result;
            if (playerChoice === computerChoice) {
                result = '引き分け';
                <?php $drawStreak++; ?>
                // 引き分けの場合も続けるかどうかを尋ねる
                showContinueSection();
            } else if (
                (playerChoice === 'rock' && computerChoice === 'scissors') ||
                (playerChoice === 'paper' && computerChoice === 'rock') ||
                (playerChoice === 'scissors' && computerChoice === 'paper')
            ) {
                <?php
                $drawStreak = 0;
                $winningStreak++;
                $money += ($winningStreak === 1) ? 100 : 100 * pow(2, $winningStreak - 1);
                ?>
                result = `勝ち！所持金が<?php echo $money; ?>円になりました。`;
                // 勝った場合、続けるかどうかを尋ねる
                showContinueSection();
            } else {
                <?php
                $drawStreak = 0;
                $result = '負け！所持金が0円になりました。';
                $money = 0;
                $winningStreak = 0;
                ?>
                result = '負け！所持金が0円になりました。';
                money = 0;
                winningStreak = 0;
                document.getElementById('continueSection').style.display = 'none';
            }

            document.getElementById('money').textContent = `所持金: <?php echo $money; ?>円`;
            document.getElementById('result').textContent = `結果: ${result}`;
        }

        function resetGame() {
            <?php
            $money = 0;
            $winningStreak = 0;
            $drawStreak = 0;
            ?>
            document.getElementById('money').textContent = `所持金: <?php echo $money; ?>円`;
            document.getElementById('result').textContent = '';
            document.getElementById('continueSection').style.display = 'none';
        }

        // 続けるかどうかを尋ねる
        function showContinueSection() {
            document.getElementById('continueSection').style.display = 'block';
        }

        // 続けるかどうかの選択を処理
        function continueGame(continueFlag) {
            if (continueFlag) {
                document.getElementById('continueSection').style.display = 'none';
                document.getElementById('result').textContent = '';
            } else {
                resetGame();
            }
        }
    </script>
</body>
</html>