
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ジャンケンゲーム</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <ul>
            <li class="right"><a href="mypage.html">マイページ</a></li>
        </ul>
    </nav>
    <h1>じゃんけん</h1>
    <div id="result"></div>
    <div class="choices">
        <button id="グー">グー</button>
        <button id="パー">パー</button>
        <button id="チョキ">チョキ</button>
    </div>   
    <div id="score">
        <h2>戦績</h2>
        <p>勝ち: <span id="winCount">0</span></p>
        <p>負け: <span id="loseCount">0</span></p>
        <p>引き分け: <span id="drawCount">0</span></p>
    </div>
    <div id="rateDisplay">
        <h2>レート</h2>
        <p>レート: <span id="rate">1.0</span></p>
    </div>
    <!-- リセットボタンを追加 -->
    <button id="resetButton">戦績・レートリセット</button>
<script src="script.js"></script>
</body>
</html>
