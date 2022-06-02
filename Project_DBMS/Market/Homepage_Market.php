<!DOCTYPE html>
<html lang="en">

<?php
    session_start();
    
    $temp1 = true;
    if(!empty($_SESSION['username'] )){
        $temp = $_SESSION['username'];
        $temp1 = false;
        // echo "<script>alert('Hi! $temp');</script>" ;
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Homepage_Market_style.css">
    <title>KKUBETE</title>
</head>
<body>
    <div class="head_bg">
        <img src="../Photo/head_bg.png">
    </div>

    <div class="head_logo">
        <a href="Homepage_Market.php"><img src="../Photo/Logo_new.png"></a>
    </div>

    <nav class="control_user"> 
        <?php 
            if($temp1){ 
                echo '<nav class="bt_login"><a href="login_Market.php">ลงชื่อเข้าใช้ร้านค้า</a></nav>';
                echo '<nav class="bt_reg"><a href="Register_Market.php">สมัครสมาชิกร้านค้า</a></nav>';
            }
            else{
                echo '<nav class="bt_login"><a href="Showdata.php">'.$temp.'</a></nav>';
                echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
            }
        ?>
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>
    
    <div class="wall">
        <h2>รวดเร็วทันใจไม่ต้องต่อแถวที่หน้าร้านสั่งง่ายๆเพียงแค่คลิ๊ก</h2>
        <h1>BE EASY TO EAT</h1>
        
    </div>
    <div class="content">
        <h1>ทำไมคุณต้องลอง KKUBETE</h1>
        <img src="../Photo/hp_descNew.png">
    </div>
    <div class="content2">
        <img src="../Photo/hp_wayshopnew.png">
    </div>

    <div class="botton">
        <img src="../Photo/bt_bgnew.png">
    </div>
   
</body>
</html>