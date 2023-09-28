<?php
session_start();
if (isset($_REQUEST['command'])) {
    if ($_REQUEST['command'] == 'logout') {
        unset($_SESSION['customer']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>管理者ログイン</title>
</head>
<body>
    <h1>管理者ログイン</h1>

    <form method="POST" action="menu_mana.php">
        <label>ユーザー名: <input type="text" name="username"></label><br>
        <label>パスワード: <input type="password" name="password"></label><br>
        <input type="hidden" name="command" value="login">
        <input type="submit" value="ログイン">
    </form>
</body>
</html>
