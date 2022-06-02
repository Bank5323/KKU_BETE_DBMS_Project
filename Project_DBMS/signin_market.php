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
            echo "<script>alert('Login Successful!');</script>" ;
            echo "<script>window.location.href = 'homepage.php';</script>" ;
        }else{
            echo "<script>alert('Something went worng Please try agin!');</script>" ;
            echo "<script>window.location.href = 'signin_market.php';</script>" ;
        }


    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="register_market.css">
    <title>Market</title>
</head>
<body>
<div class="loginbox">
        <img src="photo/user.png" class="avatar">
        <h1 class="h1">Login</h1>

        <form   method="POST">
            <p>username</p>
            <input type="text" name="User_name" placeholder="@username" required>
            <p>Password</p>
            <input type="password" name="User_password" placeholder="@password" required>
            
            <input type="submit" name="login" id="login" value="Login"><br>

         
        </form>
    
</body>
</html>