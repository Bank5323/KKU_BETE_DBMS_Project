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
     $sql = "SELECT * FROM market WHERE ID_center = $center";
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
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KKU BETE</title>
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
            }

        ?>
        <!-- <a href="signin_user.php">ลงชื่อเข้าใช้</a>
        <a href="Register_user.php">สมัครสมาชิก</a> -->
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>



     <div class="container">
        <h1>ข้อมูลร้านค้า</h1>
        <table>
            <thead>
                <tr>
                    <td width="5%">ลำดับ</td>
                    <td width="25%">ชื่อร้านค้า</td>
                    <!-- <td width="25%">ชื่อ</td> -->
                </tr>
            </thead>

            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php 
                            if ($row['path_profile'] != null){
                                $img = $row['path_profile'];
                                echo "<img src = Photo\Market_P\\".$row['path_profile']." width = 100 height = 100>";
                            }
                        ?></td>
                        
                        <td class="name">
                        <!-- <a href='./Shop_Page/Shop.php?id_market='.$row['ID_market'].'''> -->
                            <?php
                                echo '<a href= Shop.php?id_market='.$row['ID_market'].'&id_center='.$row['ID_center'].'>'.$row['Name_market'].'</a>';
                                // echo $row['Name_market'];
                            ?>
                        <!-- </a> -->
                        <!-- </td>
                        <td><?php echo $row['username']; ?></td>
                    </tr> -->
                    <?php  endwhile ?>
            </tbody>
            
        </table>
    </div>

    <div class="botton">
        <img src="Photo/bt_bgnew.png">
    </div>


    
</body>
</html>