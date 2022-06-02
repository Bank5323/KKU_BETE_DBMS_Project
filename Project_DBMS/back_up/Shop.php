<?php
    session_start();
    $temp1 = true;
    if(!empty($_SESSION['username'] )){
        $temp = $_SESSION['username'];
        $temp1 = false;
        // echo "<script>alert('Hi! $temp');</script>" ;
    }
?>

<!-- ----------------------------------------------------------------------------------------------------->
<?php
    $connect = new mysqli('localhost', 'root', '', 'projectdbms');

    if ($connect->connect_error) {
       die("Something wrong.: " . $connect->connect_error);
     }
    //  $_SESSION['cart'] = array();
     if(empty($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    // $_SESSION['cart'] = array();
    // print_r($_SESSION);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop_style.css">
    <title>Document</title>
</head>
<body>
    <?php
        $id_market = $_GET['id_market'];
        $sql = "SELECT * FROM `food` WHERE ID_market = $id_market";
        $result = $connect->query($sql);

    ?>

    
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
                echo '<nav class="bt_reg">  <a href="Register_user.php">สมัครสมาชิก</a></nav>';
                echo '<nav class="bt_reg2"> <a href= "shopping_cart.php?id_market='.$id_market.' &id_center= '.$_GET['id_center'].'"><img src="Photo/bag.png"></nav>';  

            }
            else{
                echo '<nav class="bt_login"><a href="#">'.$temp.'</a></nav>';
                echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
                echo '<nav class="bt_reg2"> <a href= "shopping_cart.php?id_market='.$id_market.' &id_center= '.$_GET['id_center'].'"><img src="Photo/bag.png"></nav>';
            }
        ?>
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>


            <nav> <a> <img> </a> </nav>

    <div class="container">
        <h1>รายการอาหาร</h1>
        <table class="tk">
            <thead>
                <tr>
                    <td width="15%">ภาพอาหาร</td>
                    <td width="25%">ชื่ออาหาร</td>
                    <td width="25%">ราคา</td>
                    <td width= "25%">สถานที่<td>
                    <!-- <td width="25%">ชื่อ</td> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php 
                            if ($row['path_food'] != null){
                                $img = $row['path_food'];
                                // echo $img;
                                echo "<img src = Photo\Menu_P\\".$img." width = 100 height = 100>";
                                // echo "<img src = Photo\Menu_P\food.jpg width = 100 height = 100>";
                            }
                        ?></td>
                        <td class="name">
                            <?php
                                // echo '<a href= ./Shop_Page/Shop.php?id_market='.$row['ID_market'].'>'.$row['Name_market'].'</a>';
                                echo $row['name_food'];
                            ?>
                        </td>
                        <td><?php echo $row['price']; ?></td>
                        <td >
                            <form method = 'post' action = "/Project_DBMS/add_food.php?item=<?php echo $row['ID_food']?>&market=<?php echo $id_market ?>&id_center=<?php echo $_GET['id_center'] ?>">
                            <input type="number" name="amount" min="1" max="10" value=1>
                            <input type="radio" name="form" value=1 checked='checked'>กินที่โรงอาหาร
                            <input type="radio" name="form" value=0>กลับบ้าน<br>
                            <!-- <input type="submit" name = 'submit' value = 'ใส่ตะกร้า'> -->
                            <input type="submit" name="submit" value="ใส่ตะกร้า">  
                            </form>


                            <!-- <a href = add_food.php?item=<?php echo $row['ID_food'] ?>>ใส่ตะกร้า</a> -->
                        </td> 
                    </tr>
                <?php  endwhile ?>
            </tbody>

            <!-- <a href= "shopping_cart.php?id_market=<?php echo $row['id_center'] ?>&id_center=<?php echo $_GET['id_center'] ?>"><img src="Photo/bag.png"></a> -->

        </table>
        <a href= "Restaurant.php?id_center=<?php echo $_GET['id_center'] ?>">Back</a>
    </div>

    <div class="botton">
        <img src="Photo/bt_bgnew.png">
    </div>
    
</body>
</html>