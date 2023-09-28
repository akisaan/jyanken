<?php

// 登録処理
if(isset($_POST['submit'])){
  // 入力値のバリデーション 
  if(empty($_POST['name'])){
    $error[] = '名前を入力してください';
  }

  if(empty($_POST['password'])){
    $error[] = 'パスワードを入力してください';
  }

  if($_POST['password'] !== $_POST['passwordConfirm']){
    $error[] = 'パスワードが一致しません';
  }

  if(!$error){
    // DBやAPIへ登録処理
    // 登録成功時
    echo '登録が完了しました!';

  }else{
    foreach($error as $error_m){
      echo $error_m.'<br>';
    }
  }
}

?>

<form method="POST" action="janken\top.php">

  <label>名前</label>
<input type="text" name="name"><br>

  <label>パスワード</label>
<input type="password" name="password"><br>
  <label>パスワード(確認)</label>

<input type="password" name="passwordConfirm"><br>
  <input type="submit" name="submit" value="登録する">
</form>