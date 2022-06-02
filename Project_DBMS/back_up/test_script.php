<?php

    // session_start();
    // $_SESSION['cart'] = array();
    // array_push($_SESSION['cart'],array(1,'1'));
    // array_push($_SESSION['cart'],array(3,'1'));

    // print_r($_SERVER);
    // header('Location:shopping_cart.php');
    // foreach($_SESSION['cart'] as $index => $val){

    //     print($index);
    //     echo '<br>';
    //     print_r($val);
    //     echo '<br>';

    // }

    session_start();
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'projectdbms');

    $connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if (mysqli_connect_errno()) {
        die("Something wrong.: " . $connect->connect_error);
    }


    // $sql = "SELECT * FROM wallet_in";
    // $sql_result = mysqli_query($connect,$sql);
    // print_r($sql_result);
    // $result = mysqli_fetch_assoc($sql_result);
    // print_r($result);
    // echo '<br>';
    // echo !empty($result) ? 'true' : 'false';
    // echo '<br>';
    // echo ($result['money'] == 785) ? 'true' : 'false';
    // print(count($result));

    $ID_customer = $_SESSION['id_customer'];
    $sql_wallet = "SELECT wallet_point FROM customer WHERE ID_customer = $ID_customer";
    $get_wallet = mysqli_fetch_assoc(mysqli_query($connect,$sql_wallet));
    $wallet = $get_wallet['wallet_point'];
    print($wallet);
?>