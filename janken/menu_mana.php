<?php session_start(); ?>
<?php require 'server_connection.php'; ?>



<?php
if (isset($_REQUEST['command'])) {
    switch ($_REQUEST['command']) {
        // ログイン
        case 'login':
            unset($_SESSION['customer']);

            // ユーザー名とパスワードの検証
            $sql = $pdo->prepare("select * from customer where username=? and password=?");
            $sql->execute([$_REQUEST['username'], hash('sha256', $_REQUEST['password'])]);
            foreach($sql as $row){
                $_SESSION['customer']=[
                    'customer_id'        => $row['customer_id'],
                    'username'      => $row['username'],
                    'password'  => $row['password']
                ];
            }
            if (!isset($_SESSION['customer'])) {
                $alert = "<script type='text/javascript'>alert('ログイン名もしくはパスワードが間違っています');</script>";
                echo $alert;
            }
            break;

        // ログアウト
        case 'logout':
            unset($_SESSION['customer']);
            break;
    }
}

if (isset($_SESSION['customer'])) {
    require 'header_mana.php';
    echo '<div class="m-5">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">ID</th><th scope="col">名前</th><th scope="col" style="width: 5%">値段</th><th scope="col">種類</th><th scope="col"style="width: 60%">説明</th><th scope="col">お勧め</th>';
    echo '</tr>';
    echo '</thead>';
    foreach ($pdo->query('select * from product') as $row) {
        echo '<tbody>';
        echo '<tr>';
        echo '<td>', $row['product_id'], '</td>';
        echo '<td>', $row['product_name'], '</td>';
        echo '<td>', $row['product_price'], '</td>';
        echo '<td>', $row['product_genre'], '</td>';
        echo '<td>', $row['product_description'], '</td>';
        echo '<td>', $row['is_featured'], '</td>';
        echo '</tr>';
        echo "\n";
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<a href="login_mana.php">ログインに戻る</a>';
}
?>

</div>

</body>
</html>
