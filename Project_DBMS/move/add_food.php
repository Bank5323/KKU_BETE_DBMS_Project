<?php
    session_start();
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'projectdbms');
    // $_SESSION['cart'] = array();
    $item = $_GET['item'];
    $form = $_POST['form'];
    $amount = $_POST['amount'];
    $connect = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
        die("Something wrong.: " . $connect->connect_error);
    }
    $sql = "SELECT * FROM food WHERE ID_food = $item";
    $result =  mysqli_fetch_assoc(mysqli_query($connect,$sql));
    print_r($result);
    // array_push($_SESSION['cart'],array(3,'1'));
    array_push($_SESSION['cart'],array('food' => $result,'form' => $form,'amount' => $amount));
    // array_push($_SESSION['cart'],array(3,'1'));
    // print_r($_GET);
    // echo '<br>';
    // print_r($_POST);
    // print_r($_SESSION['cart']);
    // echo htmlspecialchars($_SERVER["PHP_SELF"]);
    $market = $_GET['market'];
    // print($item);
    // print($form);

    // print_r($_SESSION['cart']);
    header('Location:Shop.php?id_market='.$market.'&id_center='.$_GET['id_center']);
?>