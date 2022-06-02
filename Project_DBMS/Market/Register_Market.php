<!-- 
<?php 
    include_once("function_market.php");
    $userdata = new DB_con();
    if (isset($_POST['submit'])){
        $Ufname        = $_POST['fname_lname'];
        $UMarket_name  = $_POST['Market_name'];
        $User_name        = $_POST['User_name'];
        $User_email     =$_POST['User_email'];
        $Upassword     = $_POST['User_password'];
        $Ucenter_id     =$_POST['center_id'];
        $U_Upload     =$_POST['Upload'];

        $sql = $userdata->registration($Ufname,$UMarket_name,$User_name,$User_email,$Upassword,$Ucenter_id,$U_Upload);

        if($sql){
            echo "<script>alert('Registor Successful!');</script>" ;
            echo "<script>window.location.href = 'signin_user.php';</script>" ;
        }else{
            echo "<script>alert('Something went wrong! Please try again.');</script>";
            echo "<script>window.location.href = 'Register_user.php';</script>";
        }
    }
    if(isset($_POST['submit'])){
        echo "<script>alert('Hi');</script>";

    }

?>
<?php
    $var = $_POST['center_id'];
?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="register_Market.css">
</head>
<body>

    <div class="head_bg">
        <img src="../Photo/head_bg.png">
    </div>

    <div class="head_logo">
        <a href="Homepage_Market.php"><img src="../Photo/Logo_new.png"></a>
    </div>

    <nav class="bt_login"> 
        <a href="login_Market.php">ลงชื่อเข้าใช้</a>
    </nav>

    <nav class="bt_reg"> 
        <a>สมัครสมาชิก</a>
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>

    <div class="loginbox">
        <h1 class="h1">สมัครสมาชิกร้านค้า</h1>

        <form  method="POST" >

            <p>ชื่อ - นามสกุล</p>
            <input type="text" name="fname_lname" placeholder="@name" required>

            <p>ชื่อร้านค้า</p>
            <input type="text" name="Market_name" placeholder="@Market Name" required>

            <p>ชื่อผู้ใช้</p>
            <input type="text" name="User_name" placeholder="@username" required>

            <p>อีเมล</p>
            <input type="text" name="User_email" placeholder="@email" required>
            
            <p>รหัสผ่าน</p>
            <input type="password" name="User_password" placeholder="@password" required>

            <p>ยืนยัน รหัสผ่าน</p>
            <input type="password" name="Com_User_password" placeholder="@password" required>

            <p>เลือกศูนย์อาหาร</p>
            
            <!-- <p>1 . โรงอาหารชาย(ชั่วคราว)<p>
            <p>2 . โรงอาหารคณะบริหารธุรกิจและการบัญชี</p>
            <p>3 . ศูนย์อาหารและบริการ 2</p>   
            <p>4 . ศูนย์อาหารคอมเพล็ค</p>
            <p>5 . ศูนย์อาหารและบริการ 3 (หนองแวง)</p>
            <p>6 . โรงอาหารคณะแพทศาสตร์</p>
            <p>7 . โรงอาหารคณะเทคโนโลยี</p>
            <p>8 . โรงอาหารคณะศึกษาศาสตร์</p> -->
            
            <input type="text" name="center_id" placeholder="@ 1 - 8">

            <br><br>
            <input type="submit" name="submit" id ="submit" value="ยืนยัน">

        </form>
    </div>
            <div class="list">
                <h3>รายชื่อศูนย์อาหาร</h3>
                <p>1 . โรงอาหารชาย(ชั่วคราว)<p>
                <p>2 . โรงอาหารคณะบริหารธุรกิจและการบัญชี</p>
                <p>3 . ศูนย์อาหารและบริการ 2</p>   
                <p>4 . ศูนย์อาหารคอมเพล็ค</p>
                <p>5 . ศูนย์อาหารและบริการ 3 (หนองแวง)</p>
                <p>6 . โรงอาหารคณะแพทศาสตร์</p>
                <p>7 . โรงอาหารคณะเทคโนโลยี</p>
                <p>8 . โรงอาหารคณะศึกษาศาสตร์</p>
            </div>


    <div class="botton">
        <img src="../Photo/bt_bgnew.png">
    </div>

    
    
</body>
</html>