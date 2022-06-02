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
    <title>KKUBETE-CANTEEN</title>
</head>
<body>
    <?php
        $id_market = $_GET['id_market'];
        $sql = "SELECT * FROM `food` WHERE ID_market = $id_market";
        $result = $connect->query($sql);

        $sql_name_market = "SELECT Name_market from market WHERE ID_market = $id_market";
        $market_result = $connect->query($sql_name_market);
        $market_result = $market_result->fetch_assoc();
        $name_market = $market_result['Name_market'];


        if(!empty($_SESSION['username'] )){
            $temp = $_SESSION['username'];
            $temp1 = false;
            
            $ID_customer = $_SESSION['id_customer'];
            $sql_wallet = "SELECT wallet_point FROM customer WHERE ID_customer = $ID_customer";
            $get_wallet = mysqli_fetch_assoc(mysqli_query($connect,$sql_wallet));
            $wallet = $get_wallet['wallet_point'];
        }
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

                echo '<nav class="wallet"><p>'.$wallet.' บาท</p></nav>';
            }
        ?>
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>


            <nav> <a> <img> </a> </nav>

    <div class="container">
        <h1><?php echo $name_market; ?></h1>
        <p>รายการอาหาร</p>
        <table class="tk">
            <tbody>
            <?php
                    while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td width="20%" class="photo_market"><?php 
                            if ($row['path_food'] != null){
                                $img = $row['path_food'];
                                // echo $img;
                                echo "<img src = Photo\Menu_P\\".$img." width = 170 height = 100>";
                                // echo "<img src = Photo\Menu_P\food.jpg width = 100 height = 100>";
                            }
                        ?></td>
                        <td width="20%" class="Name_market">
                            <?php
                                // echo '<a href= ./Shop_Page/Shop.php?id_market='.$row['ID_market'].'>'.$row['Name_market'].'</a>';
                                echo '<h4 >'.$row['name_food'].'</h4>';
                            ?>
                        </td>
                        <td width="10%" class="price_market"><?php echo $row['price']; ?></td>
                        
                        <td width="5%" class="Am_arket">
                            <form method = 'post' action = "add_food.php?item=<?php echo $row['ID_food']?>&market=<?php echo $id_market ?>&id_center=<?php echo $_GET['id_center'] ?>">
                            <input type="number" name="amount" min="1" max="10" value=1 style="width: 4em">
                        </td>
                        <td width="15%" class="box_c">
                            <input type="radio" name="form" value=1 checked='checked'>   ทานนี่<br>
                            <input type="radio" name="form" value=0>ใส่กล่อง<br>
                        </td>
                        <td width="10%" class="Add_market">
                            <!-- <input type="submit" name = 'submit' value = 'ใส่ตะกร้า'> -->
                            <input class="G"type="submit" name="submit" value="  เพิ่มในตะกร้า  ">  
                            
                        </td>
                            </form>
                            <!-- <a href = add_food.php?item=<?php echo $row['ID_food'] ?>>ใส่ตะกร้า</a> -->
                        
                    </tr>
                <?php  endwhile ?>
            </tbody>

            <!-- <a href= "shopping_cart.php?id_market=<?php echo $row['id_center'] ?>&id_center=<?php echo $_GET['id_center'] ?>"><img src="Photo/bag.png"></a> -->

        </table>
        <a class="B_back"href= "Restaurant.php?id_center=<?php echo $_GET['id_center'] ?>"><</a>
    </div>

    <div class="botton">
        <img src="Photo/bt_bgnew.png">
    </div>
    
</body>
</html>