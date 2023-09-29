<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>後澤jaiけんゲーム_トップページ</title>
    <style>
        /* ナビゲーションバーのスタイルを追加 */
        ul.navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #333; /* ナビゲーションバーの背景色 */
            overflow: hidden;
        }

        li.nav-item {
            float: left;
        }

        li.nav-item a {
            display: block;
            color: white; /* リンクの文字色 */
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li.nav-item a:hover {
            background-color: #ddd; /* マウスオーバー時の背景色 */
            color: black; /* マウスオーバー時の文字色 */
        }
        /* スタイリング */
        .h1{
            /* margin-left: auto;
            margin-right: auto; */
            text-align: center;
        }
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
    <ul class="navbar">
        <li class="nav-item"><a href="game.php">ジャンケン</a></li>
        <li class="nav-item"><a href="mypage.php">マイページ</a></li>
        <li class="nav-item"><a href="logout.php">ログアウト</a></li>
    </ul>
    <h1>マイページ</h1>
    <button><h2>プレイヤー名変更</h2></button>
    <button><h2>過去の戦績</h2></button>
    <button><h2>ランキング</h2></button>
</body>
</html>