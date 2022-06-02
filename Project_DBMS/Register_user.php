
<?php 

    include_once("function_user.php");
    $userdata = new DB_con();
    if (isset($_POST['submit'])){
        $Ufname        = $_POST['fname_lname'];
        $Uname         = $_POST['User_name'];
        $Uemail        = $_POST['User_email'];
        $Upassword     = $_POST['User_password'];
        $cpassword     = $_POST['Com_User_password'] ;

        if($cpassword !== $Upassword){
            echo "<script>alert('Password does not match.');</script>";
            echo "<script>window.location.href = 'Register_user.php';</script>";
        }
        else{
            $sql = $userdata->registration($Uname,$Uemail,$Upassword,$Ufname);

            if($sql){
                echo "<script>alert('Registor Successful!');</script>" ;
                echo "<script>window.location.href = 'signin_user.php';</script>" ;
            }else{
                echo "<script>alert('Something went wrong! Please try again.');</script>";
                echo "<script>window.location.href = 'Register_user.php';</script>";
            }
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="register_user.css">
</head>
<body>

    <div class="head_bg">
        <img src="Photo/head_bg.png">
    </div>

    <div class="head_logo">
        <a href="Homepage.php"><img src="Photo/Logo_new.png"></a>
    </div>

    <nav class="bt_login"> 
        <a href="signin_user.php">ลงชื่อเข้าใช้</a>
    </nav>

    <nav class="bt_reg"> 
        <a>สมัครสมาชิก</a>
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>

    <div class="loginbox">
        <h1 class="h1">สมัครสมาชิก</h1>

        <form  method="POST">
            <p>ชื่อ - นามสกุล</p>
            <input type="text" name="fname_lname" placeholder="@name" required>
            
            <p>ชื่อผู้ใช้</p>
            <input type="text" name="User_name" placeholder="@username" required
            onblur="checkusername (this.value)">
            <span id = "usernameavaliable"></span>

            <p>อีเมล</p>
            <input type="text" name="User_email" placeholder="@email" required>
            
            <p>รหัสผ่าน</p>
            <input type="password" name="User_password" placeholder="@password" required>

            <p>ยืนยัน รหัสผ่าน</p>
            <input type="password" name="Com_User_password" placeholder="@password-confirm" required>

            <input type="submit" name="submit" id ="submit" value="ยืนยัน">

        </form>
    </div>

    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
                function checkusername(val){
                    $.ajax({
                        type: 'POST',
                        url:'check_customer.php',
                        data: 'username='+val,
                        success: function(data){
                            $('#usernameavaliable').html(data);
                    }
                });
            }
        </script>

    <div class="botton">
        <img src="Photo/bt_bgnew.png">
    </div>
    
</body>
</html>