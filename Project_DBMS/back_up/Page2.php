<?php
    session_start();
    $temp1 = true;
    if(!empty($_SESSION['username'] )){
        $temp = $_SESSION['username'];
        $temp1 = false;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Page2.css">
    <title>Document</title>
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
                echo '<nav class="bt_login"><a href="#">'.$temp.'</a></nav>';
                echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
            }
        ?>  
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>


    <div class="content-area">

        <div class="text-content">
            <h1>กรุณาเลือกสถานที่</h1>
        </div>
        <div class="background">
            <img src="photo/map.png">
        </div>    
    </div>

    <div class="bottonPage">
        <div class="b1">
            <a href="Restaurant.php?id_center=1"><img src= "Photo/bt_ah1.png"></a>
            <!-- <a href="Restaurant.php"><img src= "Photo/bt_ah1.png"></a> -->
        </div>
        <div class="b1">
            <!-- <a href="Restaurant.php"><img src= "Photo/bt_ah2.png"></a> -->
            <a href="Restaurant.php?id_center=2"><img src= "Photo/bt_ah2.png"></a>
        </div>
        <div class="b1">
            <!-- <a href="Restaurant.php"><img src= "Photo/bt_ah3.png"></a> -->
            <a href="Restaurant.php?id_center=3"><img src= "Photo/bt_ah3.png"></a>
        </div>
        <div class="b1">
            <!-- <a href="Restaurant.php"><img src= "Photo/bt_ah4.png"></a> -->
            <a href="Restaurant.php?id_center=4"><img src= "Photo/bt_ah4.png"></a>
        </div>
        <div class="b1">
        <!-- <a href="Restaurant.php"><img src="Photo/bt_ah5.png" > -->
        <a href="Restaurant.php?id_center=5"><img src= "Photo/bt_ah5.png"></a>
        </div>
        <div class="b1">
            <!-- <a href="Restaurant.php"><img src= "Photo/bt_ah6.png"></a> -->
            <a href="Restaurant.php?id_center=6"><img src= "Photo/bt_ah6.png"></a>
        </div>
        <div class="b1">
            <!-- <a href="Restaurant.php"><img src="Photo/bt_ah7.png."></a> -->
            <a href="Restaurant.php?id_center=7"><img src= "Photo/bt_ah7.png"></a>
        </div>
        <div class="b1">
            <!-- <a href="Restaurant.php"><img src="Photo/bt_ah8.png."></a> -->
            <a href="Restaurant.php?id_center=8"><img src= "Photo/bt_ah8.png"></a>
        </div>
    </div>

    <div class="tagmap">
        <div class="t1">
            <a href="Restaurant.php?id_center=1"><img src="Photo/map-pin_115251.png" width="30" height="40"></a>
        </div>
        <div class="t2">
            <a href="Restaurant.php?id_center=2"><img src="Photo/map-pin_115251.png" width="30" height="40"></a>
        </div>
        <div class="t3">
            <a href="Restaurant.php?id_center=3"><img src="Photo/map-pin_115251.png" width="30" height="40"></a>
        </div>
        <div class="t4">
            <a href="Restaurant.php?id_center=4"><img src="Photo/map-pin_115251.png" width="30" height="40"></a>
        </div>
        <div class="t5">
            <a href="Restaurant.php?id_center=5"><img src="Photo/map-pin_115251.png" width="30" height="40"></a>
        </div>
        <div class="t6">
            <a href="Restaurant.php?id_center=6"><img src="Photo/map-pin_115251.png" width="30" height="40"></a>
        </div>
        <div class="t7">
            <a href="Restaurant.php?id_center=7"><img src="Photo/map-pin_115251.png" width="30" height="40"></a>
        </div>
        <div class="t8">
            <a href="Restaurant.php?id_center=8"><img src="Photo/map-pin_115251.png" width="30" height="40"></a>
        </div>
    </div>    
        
</body>
</html>