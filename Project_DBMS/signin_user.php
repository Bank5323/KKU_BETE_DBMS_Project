<?php 
    session_start();
    include_once("function_user.php");
    
    $userdata = new DB_con();

    if(isset($_POST['login'])){
        $Uname = $_POST['User_name'];
        $Upassword = $_POST['User_password'];

        $result = $userdata->signin($Uname,$Upassword);
        $num = mysqli_fetch_array($result);

        // echo "<p>$num</p>";

        if($num){
            // echo "<script>alert('1');</script>" ;
            $_SESSION['id_customer'] = $num['ID_customer'];
            $_SESSION['username'] = $num['username'];
            $_SESSION['password'] = $num['password'];
            
            echo "<script>alert('Login Successful!');</script>" ;
            echo "<script>window.location.href = 'homepage.php';</script>" ;
        }else{
            // echo "<script>alert('2');</script>" ;
            echo "<script>alert('Something went worng Please try agin!');</script>" ;
            echo "<script>window.location.href = 'signin_user.php';</script>" ;
        }
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
        <nav class="bt_logout"> 
        </nav>

        
        <!-- <nav class="bt_login"> 
            <a>ลงชื่อเข้าใช้</a>
        </nav>

        <nav class="bt_reg"> 
            <a>สมัครสมาชิก</a>
        </nav>

        <nav class="head_k"> 
            <a>|</a>
        </nav>
         -->
  

    <div class="loginbox">
        <img src="photo/user.png" class="avatar">
        <h1 class="h1">ลงชื่อเข้าใช้</h1>

        <form   method="POST">
            <p>ชื่อผู้ใช้</p>
            <input type="text" name="User_name" placeholder="@username" required>
            <p>รหัสผ่าน</p>
            <input type="password" name="User_password" placeholder="@password" required>
            
            <input type="submit" name="login" id="login" value="เข้าสู่ระบบ"><br>
            <a href="Register_user.php"><p>สมัครสมาชิก</p></a>
         
        </form>
    </div>

    <div class="botton">
        <img src="Photo/bt_bgnew.png">
    </div>

    
</body>
</html>