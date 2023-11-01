<!DOCTYPE html>
<html>
<head>
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form method="POST" action="janken/top.php">
        <label>ユーザ名：<input type="text" name="name" required></label><br>
        <label>パスワード：<input type="password" name="password" required></label><br>
        <input type="hidden" name="command" value="login">
        <input type="submit" value="ログイン">
    </form>
</body>
</html>
