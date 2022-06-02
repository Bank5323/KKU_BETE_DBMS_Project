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

    if(isset($_POST['submit'])){
        $username = $_POST['User_name'];
        $refer_code = $_POST['confirm_pin'];
        $money = $_POST['money_pin'];

        
        $sql = "SELECT money FROM wallet_in WHERE refer_code = $refer_code";
        $sql_result = mysqli_fetch_assoc(mysqli_query($connect,$sql));
        if ((!empty($sql_result) && ($sql_result['money'] == $money) && ($_SESSION['username'] == $username))){
            $ID_customer = $_SESSION['id_customer'];
            $sql_get_wallet = "SELECT wallet_point FROM customer WHERE ID_customer = $ID_customer";
            $get_wallet = mysqli_fetch_assoc(mysqli_query($connect,$sql_get_wallet));
            $wallet = $get_wallet['wallet_point'] + $money;
            $sql_update_wallet = "UPDATE customer SET wallet_point = $wallet WHERE ID_customer = $ID_customer";
            if(mysqli_query($connect,$sql_update_wallet)){
                echo "<script>alert('Successful!');</script>" ;
            }
            else{
                echo "<script>alert('Fail!');</script>" ;
            }
        }else{
            echo "<script>alert('Fail!');</script>" ;
        }

        echo "<script>window.location.href = 'AddPoint.php';</script>";//บรรทัดนี้คือบรรทัดที่จะส่งไปหน้าอื่นหลังจบกระบวนการ
        

        // if($sql){
        //     echo "<script>alert('Registor Successful!');</script>" ;
        //     echo "<script>window.location.href = 'Homepage.php';</script>" ;
        // }else{
        //     echo "<script>alert('Something went wrong! Please try again.');</script>";
        //     echo "<script>window.location.href = 'AddPoint.php';</script>";
        // }
    }





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login_user.css">
    <title>Customer</title>
</head>
<body>
    <div class="head_bg">
        <img src="Photo/head_bg.png">
    </div>

    <div class="head_logo">
        <a href="Homepage.php"><img src="Photo/Logo_new.png"></a>
    </div>
  

    <div class="loginbox">
        <img src="photo/user.png" class="avatar">
        <h1 class="h1">เติมพอย์ท</h1>


        <form  method="POST"> 
            <p>ชื่อผู้ใช้</p>
            <input type="text" name="User_name" placeholder="@username" required>
            <p>จำนวนเงิน</p>
            <input type="text" name="money_pin" placeholder="@Amount Money." required>
            <p>หมายเลขอ้างอิง</p>
            <input type="text" name="confirm_pin" placeholder="@Reference No." required>
            
            <input type="submit" name="submit" id="submit" value="เติมพอย์ท"><br>
        </form>
    
    </div>

    <div class="botton">
        <img src="Photo/bt_bgnew.png">
    </div>

</body>
</html>