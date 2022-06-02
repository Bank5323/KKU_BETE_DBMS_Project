<!DOCTYPE html>
<html lang="en">

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
    
    $temp1 = true;
?>

<?php
    if(!empty($_SESSION['username'] )){
        $temp = $_SESSION['username'];
        $temp1 = false;
        
        $ID_customer = $_SESSION['id_customer'];
        $sql_wallet = "SELECT wallet_point FROM customer WHERE ID_customer = $ID_customer";
        $get_wallet = mysqli_fetch_assoc(mysqli_query($connect,$sql_wallet));
        $wallet = $get_wallet['wallet_point'];
    }

       

        
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="HP_style.css">
    <title>KKUBETE</title>
</head>
<body>
    <div class="head_bg">
        <img src="Photo/head_bg.png">
    </div>

    <div class="head_logo">
        <a href="Homepage.php"><img src="Photo/Logo_new.png"></a>
    </div>

    <nav class="control_user"> 
        <?php 
            if($temp1){ 
                echo '<nav class="bt_login"><a href="signin_user.php">ลงชื่อเข้าใช้</a></nav>';
                echo '<nav class="bt_reg"><a href="Register_user.php">สมัครสมาชิก</a></nav>';

                
            }
            else{
                echo '<nav class="bt_login"><a href="AddPoint.php">'.$temp.'</a></nav>';
                echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
                
                echo '<nav class="wallet"><p>'.$wallet.' บาท</p></nav>';

                
            }
        ?>
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>
    
    <div class="wall">
        <a href="Page2.php"><img src="Photo/bt_th_order.png"></a>
        
        <h2>รวดเร็วทันใจไม่ต้องต่อแถวที่หน้าร้านสั่งง่ายๆเพียงแค่คลิ๊ก</h2>
        <h1>BE EASY TO EAT</h1>
        
    </div>



    <div class="content">
        <h1>ทำไมคุณต้องลอง KKUBETE</h1>
        <img src="Photo/hp_descNew.png">
    </div>
    <div class="content2">
        
        <img src="Photo/hp_wayshopnew.png">
    </div>

    <div class="botton">
        <img src="Photo/bt_bgnew.png">
    </div>
   
</body>
</html>