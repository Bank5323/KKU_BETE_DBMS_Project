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
    function order($item,$con){
        $ID_customer = $_SESSION['id_customer'];
        $total = 0;
        $refer_code = createRandomPassword();
        $sql_insert = "INSERT INTO order_food(ID_market,ID_customer,status_ID,refer_code) 
                        VALUES(".$_GET['id_market'].",".$_SESSION['id_customer'].",0,'".$refer_code."')";
        mysqli_query($con,$sql_insert);
        $sql_find = "SELECT * FROM order_food WHERE ID_customer = ".$_SESSION['id_customer']." and refer_code = '".$refer_code."'";
        $tmp = mysqli_fetch_assoc(mysqli_query($con,$sql_find));
        // print_r($tmp);
        $id_order = (int)$tmp['ID_order'];
        foreach($item as $index => $val){
            $sql_insert_food = "INSERT INTO list_food(ID_order,ID_food,Amount,format_ID) 
                                VALUES($id_order,".$val['food']['ID_food'].",".$val['amount'].",'".$val['form']."')";
            $total = $total + ($val['food']['price']*$val['amount']);
            mysqli_query($con,$sql_insert_food);
        }
        // mysqli_query($connect,"INSERT INTO list_wallet(ID_customer,amount) VALUES($ID_customer,$total)");
        $sql_up_total = "UPDATE order_food SET total_price = $total WHERE ID_order = $id_order";
        mysqli_query($con,$sql_up_total);
        return $id_order;
    }
    function createRandomPassword() { 

        $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 

        while ($i <= 7) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
        return $pass; 

    }

    if(isset($_SESSION['id_customer'])){
        $ID_customer = $_SESSION['id_customer'];
        $sql_get_wallet = "SELECT wallet_point FROM customer WHERE ID_customer = $ID_customer";
        $get_wallet = mysqli_fetch_assoc(mysqli_query($connect,$sql_get_wallet));
        $total = 0;
        foreach($_SESSION['cart'] as $index => $val){  
            $total = $total + ($val['food']['price']*$val['amount']);
        }
        if($get_wallet['wallet_point'] < $total){
            echo "<script>alert('You Wallet not enough.');</script>";
            echo "<script>window.location.href = 'AddPoint.php';</script>";
        }
        else{
            $refer = order($_SESSION['cart'],$connect);
            $wallet = $get_wallet['wallet_point'] - $total;
            $sql_update_wallet = "UPDATE customer SET wallet_point = $wallet WHERE ID_customer = $ID_customer";
            if(mysqli_query($connect,$sql_update_wallet)){
                unset($_SESSION['cart']);
                echo "<script>window.location.href = 'Process_page.php?id_order=$refer';</script>";
            }
            else{
                echo "<script>alert('Fail to order.');</script>";
                echo "<script>window.location.href = 'Homepage.php';</script>";
            }
        }

    }else{
        echo "<script>alert('You are not logged in.');</script>";
        echo "<script>window.location.href = 'signin_user.php';</script>";
    }

    // $refer = order($_SESSION['cart'],$connect);
    // print($refer);
    // unset($_SESSION['cart']);
    // echo "<script>window.location.href = 'Process_page.php?id_order=$refer';</script>";
    // header('Location:Process_page.php?id_order='.$refer);
       

?>