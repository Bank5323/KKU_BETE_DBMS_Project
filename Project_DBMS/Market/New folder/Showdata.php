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

    if(isset($_POST['edit'])){
        $price_edit = $_POST['price'];
        $id_food_edit = $_POST['edit'];
        $sql_edit_price = "UPDATE food SET price = $price_edit WHERE ID_food = $id_food_edit";
        if($connect->query($sql_edit_price)){
            echo "<script>alert('Update Success.');</script>" ;
        }
        else{
            echo "<script>alert('Update Fail.');</script>" ;
        }
        echo "<script>window.location.href = 'Showdata.php';</script>";
    }
    if(isset($_POST['delete'])){
        $id_food_delete = $_POST['delete'];
        $sql_delete = "DELETE FROM food WHERE ID_food = $id_food_delete";
        if($connect->query($sql_delete)){
            echo "<script>alert('Delete Success.');</script>" ;
        }
        else{
            echo "<script>alert('Delete Fail.');</script>" ;
        }
        echo "<script>window.location.href = 'Showdata.php';</script>";
    }
    
?>

<!-- ----------------------------------------------------------------------------------------------------->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop_style.css">
    <link rel="stylesheet" href="ShowData_style.css">
    <title>Document</title>

</head>
<body>
    <?php
        $id_market = $_SESSION['id_market'];
        $sql = "SELECT * FROM `food` WHERE ID_market = $id_market";
        $result = $connect->query($sql);
    ?>

    <div class="head_bg">
        <img src="../Photo/head_bg.png">
    </div>

    <div class="head_logo">
        <a href="Homepage_Market.php"><img src="../Photo/Logo_new.png"></a>
    </div>


    <nav class="control_user"> 
        <?php 
            echo '<nav class="bt_login"><a href="#">'.$temp.'</a></nav>';
            echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
            // echo '<nav class="bt_reg2"> <a href= "shopping_cart.php?id_market='.$id_market.' &id_center= '.$_GET['id_center'].'"><img src="Photo/bag.png"></nav>';
            // }
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
                    <td width= "25%">แก้ไขราคา<td>
                    <!-- <td width= "0%"><td>
                    <td width="25%">ชื่อ</td> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php 
                            if ($row['path_food'] != null){
                                $id_food = $row['ID_food'];
                                $img = $row['path_food'];
                                // echo $img;
                                echo "<img src = ..\Photo\Menu_P\\".$img." width = 100 height = 100>";
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
                            <!-- <form method = 'post' action = "/Project_DBMS/add_food.php?item=<?php echo $row['ID_food']?>&market=<?php echo $id_market ?>&id_center=<?php echo $_GET['id_center'] ?>">
                            <input type="number" name="amount" min="1" max="10" value=1>
                            <input type="radio" name="form" value=1 checked='checked'>กินที่โรงอาหาร
                            <input type="radio" name="form" value=0>กลับบ้าน<br>
                            <input type="submit" name="submit" value="ใส่ตะกร้า">  
                            </form> -->
                            <form method="post">

                                <input type="text" name = 'price' id = 'price' required>
                                <button type="submit" name = 'edit' id = 'edit' value = <?php echo $id_food; ?> width="30">แก้ไข</button>
                                <br>
                                <!-- <button type="submit" name = 'delete' id = 'delete' value = "Delete">ลบรายการอาหาร</button> -->
                            </form>


                            <!-- <a href = add_food.php?item=<?php echo $row['ID_food'] ?>>ใส่ตะกร้า</a> -->
                        </td> 
                        <td>
                            <form method="post">
                                <button type="submit" name = 'delete' id = 'delete' value = <?php echo $id_food; ?>>ลบรายการอาหาร</button>
                            </form>
                        </td>
                    </tr>
                <?php  endwhile ?>
            </tbody>

            <!-- <a href= "shopping_cart.php?id_market=<?php echo $row['id_center'] ?>&id_center=<?php echo $_GET['id_center'] ?>"><img src="Photo/bag.png"></a> -->

        </table>
        <!-- <a href= "Restaurant.php?id_center=<?php echo $_GET['id_center'] ?>">Back</a> -->
    </div>
    
    <div class="back2"> 
        <a href = "AddData_Market.PHP">เพิ่มรายการ</a>
        <a href = "Status_Page.php">ดูคำสั่งซื้อ</a>
    </div>


    <div class="botton">
        <img src="..\Photo/bt_bgnew.png">
    </div>
    
</body>
</html>