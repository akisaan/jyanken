<?php
if (isset($_REQUEST['command'])) {

switch ($_REQUEST['command']) {     

    
  // ユーザ名変更
    case 'name':
        $id = $_SESSION['customer']['id'];
        $sql=$pdo->prepare('update customer set name=? where id=?');
        $sql->execute([$_REQUEST['name'], $id]);
        $_SESSION['customer']=[
        'id'      =>$id,
        'name'    =>htmlspecialchars($_REQUEST['name']),
        'password'=>htmlspecialchars($_REQUEST['password']),
        ];
        break;

}}
?>
<form action="#" method="post">

        <input type="hidden" name="command" value="name">
        <?php
        echo '<p>ユーザ名変更</p>';
        echo '<input type="text" name="name" value="', $_SESSION['customer']['name'], '" required>';
        echo '<button type="submit">変更</button><br>';
    ?>
    </form>


