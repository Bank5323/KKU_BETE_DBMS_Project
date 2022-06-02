<?php
    session_start();
    // define('DB_SERVER', 'localhost');
    // define('DB_USER', 'root');
    // define('DB_PASS', '');
    // define('DB_NAME', 'projectdbms');

    $connect = new mysqli('localhost', 'root', '', 'projectdbms');

    if ($connect->connect_error) {
       die("Something wrong.: " . $connect->connect_error);
    }

    if(empty($_SESSION['username'] )){
        // $temp = $_SESSION['username'];
        echo "<script>alert('You must be Login.');</script>" ;
        echo "<script>window.location.href = 'login_market.php';</script>" ;
    }
    else{
        $temp = $_SESSION['username'];
    }


    if(isset($_POST['submit'])){

        print_r($_FILES);
        print_r($_POST);
        // $path_food = $_POST['Upload'];
        $target_dir = "../Photo/Menu_P/";
        $uploadOk = 1;
        $target_file = $target_dir.basename($_FILES['Upload']["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $id_market = $_SESSION['id_market'];
        $food_name = $_POST['name_food'];
        $price_food = $_POST['price_food'];
        // print_r($_FILES['Upload']['name']);

        if(!empty($_FILES['Upload']['name'])){
            $path_food = $_FILES['Upload']['name'];
            $check = getimagesize($_FILES["Upload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
              } else {
                $tmp = "Not found file";
                $uploadOk = 0;
              }
            if (file_exists($target_file)) {
                $tmp = 'Please upload new file';
                $uploadOk = 0;
              }
            // print($imageFileType);
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $tmp = "File is not image";
                $uploadOk = 0;
              }
            if($uploadOk == 0){
                echo "<script>alert('Add Fail Because ".$tmp.".');</script>" ;
                echo "<script>window.location.href = 'AddData_Market.php';</script>";
            }
            else{
                if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
                    $sql_add_food = "INSERT INTO food (ID_market,price,name_food,path_food) VALUES($id_market,$price_food,'$food_name','$path_food')";
                }else{
                    echo "<script>alert('Add Fail.');</script>" ;
                    echo "<script>window.location.href = 'AddData_Market.php';</script>";
                }
            }
        }
        else{
            $sql_add_food = "INSERT INTO food (ID_market,price,name_food) VALUES($id_market,$price_food,'$food_name')";
        }
        if($connect->query($sql_add_food)){
            echo "<script>alert('Add Success.');</script>" ;
            echo "<script>window.location.href = 'AddData_Market.php';</script>" ;
        }
        else{
            echo "<script>alert('Add Fail.');</script>" ;
            echo "<script>window.location.href = 'AddData_Market.php';</script>" ;
        }


    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AddData_style.css">
    <title>Document</title>
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

    <!-- <div class="head_bg">
        <img src="../Photo/head_bg.png">
    </div>

    <div class="head_logo">
        <a href="Homepage.php"><img src="../Photo/Logo_new.png"></a>
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
                
                echo '<nav class="wallet"><h1>'.$wallet.'</h1></nav>';
            }
        ?> 

    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav> -->
    
    <div class="Add_form">
        <h1 class="h1">เพิ่มข้อมูลรายการอาหาร</h1>

        <form  method="POST" enctype="multipart/form-data">
            <p>ชื่อเมนู</p>
            <input type="text" name="name_food" placeholder="@Namefood" required>

            <p>ราคา</p>
            <input type="text" name="price_food" placeholder="@Pricefood" required>

            <p>อัพโหลดรูปอาหาร</p>
            <input type="file" name="Upload" id = 'Upload'><br><br>

            <input type="submit" name="submit" id ="submit" value="ยืนยัน">

        </form>
    </div>
    
    <br><br>

    <p><a href = 'ShowData.php'>Back</a></p>

    <div class="botton">
        <img src="../Photo/bt_bgnew.png">
    </div>

</body>
</html>