<?php
    $connect = new mysqli('localhost', 'root', '', 'projectdbms');

    if ($connect->connect_error) {
       die("Something wrong.: " . $connect->connect_error);
     }

    // if($_GET['status'] == '1' ){
    //     $sql = "UPDATE market SET status_market = ".$_GET['status']." WHERE ID_market = ".$_GET['id_market'];
    // }
    // elseif($_GET['status'] == '0'){
    //     $sql = "UPDATE market SET status_market = ".$_GET['status']." WHERE ID_market = ".$_GET['id_market'];
    // }
    $status = $_GET['status'];

    $sql = "UPDATE market SET status_market = '$status' WHERE ID_market = ".$_GET['id_market'];
    if($connect->query($sql)){
        echo "<script>alert('Update status success.');</script>" ;
    }
    else{
        echo "<script>alert('Update status fail.');</script>" ;
    }

    echo "<script>window.location.href = 'Showdata.php';</script>";

?>