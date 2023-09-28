<h1>ログイン<h1>
    <form method="POST" action="janken.php">
        <label>ユーザ名：<input type="test" name="name" required></label><br>
        <label>パスワード：<input type="password" name="password" required></label><br>
        <input type="hidden" name="comand" value="login">
        <input type="submit" value="ログイン">
    </form>