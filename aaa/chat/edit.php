<?php
    if (isset($_GET['id'])) {
        try {
 
            // 接続処理
            $dsn = 'mysql:host=localhost;dbname=sample_db';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
 
            // SELECT文を発行
            $sql = "SELECT * FROM members WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
            $stmt->execute();
            $member = $stmt->fetch(PDO::FETCH_OBJ); // 1件のレコードを取得
 
            
            // 接続切断
            $dbh = null;
 
        } catch (PDOException $e) {
            print $e->getMessage() . "<br/>";
            die();
        }
 
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>変更画面</title>
</head>
<body>
<form action="./update.php" method="post">
        <input type="hidden" name="id" value="<?php print($member->id) ?>">
        <label for="name">名前</label>
        <input type="text" name="name" value="<?php print($member->name) ?>">
        <br>
        <label for="age">年齢</label>
        <input type="text" name="age" value="<?php print($member->age) ?>">
        <br>
        <label for="address">住所</label>
        <input type="text" name="address" value="<?php print($member->address) ?>">
        <br>
        <button type="submit">更新</button>
        <br>
 
</form>
</body>
</html>