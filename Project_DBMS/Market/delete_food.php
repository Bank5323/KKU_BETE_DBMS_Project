<?php
    session_start();
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'projectdbms');

    $connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if (mysqli_connect_errno()) {
        die("Something wrong.: " . $connect->connect_error);
    }
    $id_food = $_POST['edit'];
    $sql = "DELETE FROM food WHERE ID_food = $id_food";
    print_r($_POST);
    print_r($_GET);
    if(mysqli_query($connect,$sql)){
        echo "<script>alert('Delete Success.');</script>" ;
    }
    else{
        echo "<script>alert('Delete Success.');</script>" ;
    }
    echo "<script>window.location.href = 'Showdata.php';</script>";
?>