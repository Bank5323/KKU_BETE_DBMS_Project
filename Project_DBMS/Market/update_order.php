<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'projectdbms');

    $connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if (mysqli_connect_errno()) {
        die("Something wrong.: " . $connect->connect_error);
    }
    // $id_market = $_POST['id_market'];
    $id_market = 1;
    $sql_order = "SELECT * FROM order_food WHERE ID_market = $id_market AND status_ID = 0 ORDER BY Date DESC";
    $result = mysqli_fetch_assoc(mysqli_query($connect,$sql_order));

    // print_r($result);
    // echo '<br>';
    // print(count($result));
    // echo '<br>';
    // print($result['ID_order']);

    $ID_order = $result['ID_order'];
    // $Food = $result['ID_order'];
    $total = $result['total_price'];
    $status = $result['status_ID'];

    echo "<h2>$ID_order</h2>";
    // echo "<h2>".$total."</h2>";
    // echo "<h3>".$status."</h3>";


?>