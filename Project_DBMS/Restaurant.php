<?php 
     define('DB_SERVER', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     define('DB_NAME', 'projectdbms');
     session_start();

     $connect = new mysqli('localhost', 'root', '', 'projectdbms');

     if ($connect->connect_error) {
        die("Something wrong.: " . $connect->connect_error);
      }
     $center = $_GET['id_center'];
     $sql = "SELECT * FROM market WHERE ID_center = $center AND status_market = '1'";
     $result = $connect->query($sql);
?>

<?php
    session_start();
    $temp1 = true;
    if(!empty($_SESSION['username'] )){
        $temp = $_SESSION['username'];
        $temp1 = false;
        // echo "<script>alert('Hi! $temp');</script>" ;
    }

    if(!empty($_SESSION['username'] )){
        $temp = $_SESSION['username'];
        $temp1 = false;
        
        $ID_customer = $_SESSION['id_customer'];
        $sql_wallet = "SELECT wallet_point FROM customer WHERE ID_customer = $ID_customer";
        $get_wallet = mysqli_fetch_assoc(mysqli_query($connect,$sql_wallet));
        $wallet = $get_wallet['wallet_point'];
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKUBETE-SHOP</title>
    <link rel="stylesheet" href = "Res.css">
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

                echo '<nav class="wallet"><p>'.$wallet.' บาท</p></nav>';
            }

        ?>
        <!-- <a href="signin_user.php">ลงชื่อเข้าใช้</a>
        <a href="Register_user.php">สมัครสมาชิก</a> -->
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>



     <div class="container">
     <?php
        $sql = "SELECT Name_center FROM center WHERE ID_center = $center";
        $center_result = $connect->query($sql);
        $center_result = $center_result->fetch_assoc();
        $name_center = $center_result['Name_center'];
        // echo "<h1>$name_center</h1>";
        ?>

        <h1><?php echo $name_center; ?></h1>

        <?php 
            if(mysqli_num_rows($result)){
                echo "<p>รายชื่อร้านค้า</p>";
            }
            else{
                echo "<p class='tkk'>( ยังไม่มีร้านค้าที่ร่วมรายการ หรือ ร้านที่ร่วมยังไม่เปิด )</p>"; //ช่วยปรับให้มันอยู่ตรงกลางหน่อย
            }
        ?>
        
        <!-- <p>รายชื่อร้านค้า</p> -->
        <table>

        <tbody>
                <?php 
                    while($row = $result->fetch_assoc()): ?>
                    
                    <tr>
                        <td width="10%"><?php 
                            if ($row['path_profile'] != null){
                                $img = $row['path_profile'];
                                echo "<img src = Photo\Market_P\\".$row['path_profile']." width = 100 height = 100>";
                            }
                        ?></td>
                        
                        <td class="name_shop" width="25%">
                            <?php
                                echo '<a class ="nameshop2" href= Shop.php?id_market='.$row['ID_market'].'&id_center='.$row['ID_center'].'>'.$row['Name_market'].'</a>'; 
                            ?>
                            <!-- <?php echo $row['username']; ?> -->
                            
                        </td>
                    </tr>
                    
                    <?php  endwhile ?>
                   
            </tbody>
            
        </table>
    </div>

    <div class="botton">
        <img src="Photo/bt_bgnew.png">
    </div>


    
</body>
</html>