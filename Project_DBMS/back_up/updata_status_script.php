<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'projectdbms');

    $connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if (mysqli_connect_errno()) {
        die("Something wrong.: " . $connect->connect_error);
    }

    $order_id = $_POST['id_order'];
    // $order_id = 25;
    $sql_order = "SELECT status_ID FROM order_food WHERE ID_order = $order_id";
    $result_order = mysqli_fetch_assoc(mysqli_query($connect,$sql_order));
    
    
    $id_status = $result_order['status_ID'];
    $sql_status = "SELECT status_name FROM status WHERE status_ID = $id_status";
    $status = mysqli_fetch_assoc(mysqli_query($connect,$sql_status));
    $status = $status['status_name'];
    
    // echo "<span style = 'color: red;' >$status</span>";
    // echo "<span style = 'color: red;' >Hi</span>";
    echo "<h2>$status</h2>";
?>