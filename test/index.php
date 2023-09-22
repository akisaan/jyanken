<?php
session_start();

// ユーザー名をセッションから取得
if (isset($_SESSION['name'])) {
    $username = $_SESSION['name'];
} else {
    $username = ''; // ユーザー名がセッションに存在しない場合のデフォルト値
}

// ログイン状態に応じてメッセージとリンクを設定
if (isset($_SESSION['id'])) {
    $msg = 'こんにちは ' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . ' さん';
    $link = '<a href="logout.php">ログアウト</a>';
} else {
    $msg = 'ログインしていません';
    $link = '<a href="login.php">ログイン</a>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログインチェック</title>
</head>
<body>
    <h1><?php echo $msg; ?></h1>
    <?php echo $link; ?>
</body>
</html>
