<?php 
    session_start();
    include_once("function_market.php");
    
    $userdata = new DB_con();

    if(isset($_POST['login'])){
        $Uname = $_POST['User_name'];
        $Upassword = $_POST['User_password'];

        $result = $userdata->signin($Uname,$Upassword);
        $num = mysqli_fetch_array($result);

        if($num){
            $_SESSION['username'] = $num['username'];
            $_SESSION['password'] = $num['password'];
            $_SESSION['id_market'] = $num['ID_market'];
            $_SESSION['id_center'] = $num['ID_center'];
            echo "<script>alert('Login Successful!');</script>" ;
            echo "<script>window.location.href = 'Showdata.php';</script>" ;
        }else{
            echo "<script>alert('Something went worng Please try agin!');</script>" ;
            echo "<script>window.location.href = 'login_market.php';</script>" ;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login_Market.css">
    <title>Market</title>
</head>
<body>

    <div class="head_bg">
        <img src="../Photo/head_bg.png">
    </div>

    <div class="head_logo">
        <a href="Homepage_Market.php"><img src="../Photo/Logo_new.png"></a>
    </div>

    <nav class="control_user"> 
        <!-- <?php 
            if($temp1){ 
                echo '<nav class="bt_login"><a href="signin_user.php">ลงชื่อเข้าใช้ร้านค้า</a></nav>';
                echo '<nav class="bt_reg"><a href="Register_user.php">สมัครสมาชิกร้านค้า</a></nav>';
            }
            else{
                echo '<nav class="bt_login"><a href="AddPoint.php">'.$temp.'</a></nav>';
                echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
            }
        ?> -->
    </nav>

    <div class="loginbox">
        <img src="../photo/user.png" class="avatar">
        <h1 class="h1">เข้าสู่ระบบร้านค้า</h1>

        <form   method="POST">
            <p>ชื่อผู้ใช้</p>
            <input type="text" name="User_name" placeholder="@username" required>
            <p>รหัสผ่าน</p>
            <input type="password" name="User_password" placeholder="@password" required>
            
            <input type="submit" name="login" id="login" value="Login"><br>
        </form>

    </div>
    
    <div class="botton">
        <img src="../Photo/bt_bgnew.png">
    </div>
    
</body>
</html>