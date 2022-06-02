<?php 
    session_start();
     define('DB_SERVER', 'localhost');
     define('DB_USER', 'root');
     define('DB_PASS', '');
     define('DB_NAME', 'projectdbms');

     $connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

     if (mysqli_connect_errno()) {
        die("Something wrong.: " . $connect->connect_error);
      }
     $sql = "SELECT * FROM food WHERE ";
     $result = $connect->query($sql);
    
    //  if(empty($_SESSION['cart'])){
    //     $_SESSION['cart']['item'] = array();
    //     $_SESSION['cart']['id_market'] = null;
    // }

    
    // function createRandomPassword() { 

    //     $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    //     srand((double)microtime()*1000000); 
    //     $i = 0; 
    //     $pass = '' ; 
    
    //     while ($i <= 7) { 
    //         $num = rand() % 33; 
    //         $tmp = substr($chars, $num, 1); 
    //         $pass = $pass . $tmp; 
    //         $i++; 
    //     } 
    
    //     return $pass; 

    // }
    // function order($item,$con){
    //     $total = 0;
    //     $refer_code = createRandomPassword();
    //     $sql_insert = "INSERT INTO order_food(ID_market,ID_customer,status_ID,refer_code) 
    //                     VALUES(".$_GET['id_market'].",".$_SESSION['id_customer'].",0,'".$refer_code."')";
    //     // if (mysqli_query($con,$sql_insert)) {
    //     //     echo "New record created successfully";
    //     //   } else {
    //     //     echo "Error: " . $sql_insert . "<br>" . mysqli_error($con);
    //     //   }
    //     mysqli_query($con,$sql_insert);
    //     $sql_find = "SELECT * FROM order_food WHERE ID_customer = ".$_SESSION['id_customer']." and refer_code = '".$refer_code."'";
    //     $tmp = mysqli_fetch_array(mysqli_query($con,$sql_find));
    //     $id_order = (int)$tmp['ID_order'];
    //     // echo $id_order;
    //     // echo gettype($id_order) ;
    //     // $tmp = mysqli_query($con,$sql_find);
    //     // print_r($tmp);
    //     // echo $refer_code;
    //     // $connect->query($sql_find);
    //     // print($con);
    //     foreach($item as $index => $val){
    //         // echo '<br>';
    //         // echo $val['form'];
    //         // echo '<br>';
    //         // echo 'ID_food:'.$val['food']['ID_food'];
    //         // echo '<br>';
    //         // echo 'Amount:'.$val['amount'];
    //         print_r($val);
    //         // echo '<br>';
    //         // $sql_food = "SELECT * FROM food WHERE ID_food = $id_food";
    //         // $result_food = mysqli_fetch_array(mysqli_query($connect,$sql_food));
    //         // $sql_insert_food = "INSERT INTO list_food(ID_order,ID_food,Amount,format_ID) 
    //         //                     VALUES(".$id_order.",".$val['food']['ID_food'].",".$val['amount'].",'".$val['form']."')";

    //         $sql_insert_food = "INSERT INTO list_food(ID_order,ID_food,Amount,format_ID) 
    //                             VALUES($id_order,".$val['food']['ID_food'].",".$val['amount'].",'".$val['form']."')";
    //         $total = $total + ($val['food']['price']*$val['amount']);
    //         mysqli_query($con,$sql_insert_food);
    //     //     if (mysqli_query($con,$sql_insert_food)) {
    //     //     echo "New record created successfully";
    //     //   } else {
    //     //     echo "Error: " . $sql_insert_food . "<br>" . mysqli_error($con);
    //     //   }
    //     }
    //     // echo '<br>';
    //     // echo $total;
    // }
    
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
    <title>KKUBETE-CART</title>
    <link rel="stylesheet" href = "shopping.css">
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
                echo '<nav class="bt_reg">  <a href="Register_user.php">สมัครสมาชิก</a></nav>';

            }
            else{
                echo '<nav class="bt_login"><a href="#">'.$temp.'</a></nav>';
                echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
                // echo '<nav class="bt_reg2"> <a href= "shopping_cart.php?id_market='.$id_market.' &id_center= '.$_GET['id_center'].'"><img src="Photo/bag.png"></nav>';

                echo '<nav class="wallet"><p>'.$wallet.' บาท</p></nav>';
            }
        ?>
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>



    <div class="shopping_cart">
        <h1 class="h1">ตะกร้าของคุณ</h1>
        <table>
            <thead>
                <tr>
                    <!-- <td width="5%">ภาพอาหาร</td>
                    <td width="25%">ชื่อเมนู</td>
                    <td width="5%">จำนวน</td>
                    <td width="25%">ราคา(บาท)</td>
                    <td width="25%"> </td> -->
                </tr>
            </thead>
            <tbody>
                <?php 
                // if(count($_SESSION['cart'])>0){
                    $total_price = 0;
                    foreach($_SESSION['cart']['item'] as $index => $val): ?>
                   <tr class="headt">
                        <form method="post">
                        <td class="photo_cart" width="10%">
                            <?php
                                
                                echo "<img src = Photo/Menu_P/".$val['food']['path_food']." width = 170 height = 100>";
                        ?>
                        </td>
                        <td width="25%">
                       
                            <?php

                                $name_food = $val['food']['name_food'];
                                $total_price = $total_price + ($val['food']['price']*$val['amount']);
                                
                                echo "<p class='name_cart'>$name_food</p>";

                                // echo "<br>";

                                $form_id = $val['form'];
                                $sql_format = "SELECT * FROM format WHERE form_id = $form_id";
                                $result_format = mysqli_fetch_assoc(mysqli_query($connect,$sql_format));
                                $form_name = $result_format['form_name'];
                                echo "<p class='way_cart'> - $form_name</p>";
                                // echo $result_format['form_name'];
                                // echo '<a href= test.php?name_market='.$row['id'].'>'.$result_food['Name_market'].'</a>';
                            ?>
                        <!-- </a> -->
                        </td>

                        <td width="5%">
                            <!-- <?php echo $val[2] ?> -->
                            <p>จำนวน</p>
                            <?php 
                            
                            
                            echo "<p class='Am_cart'>".$val['amount']."</p>"; 
                            
                            ?>

                        </td>

                        <td width="25%">
                        <p>ราคา</p>
                        <!-- <?php echo $result_food['price']*$val[2]; ?> -->
                        <?php 
                        echo "<p class='price_cart'>".$val['food']['price']*$val['amount']." บาท</p>"; 
                        ?>
                        </td width="5%">
                        <form action = "shopping_cart.php" method="post">
                        <td class="remove_cart"><a class="Rem_cart"href="remove_cart.php?position=<?php echo $index ?>&id_market=
                                    <?php echo $_GET['id_market'] ?>&id_center=<?php echo $_GET['id_center'] ?>" id ='remove_bt' >X</a></td>
                    </form>
                    </tr>
                    <?php  endforeach;  ?>
            </tbody>
        </table>

        <p class="Total_price">ราคารวม : <?php echo $total_price; ?> บาท</p>
    
        <a class='Bt_back'href= "Shop.php?id_market=<?php echo $_GET['id_market'] ?>&id_center=<?php echo $_GET['id_center'] ?>"><</a>
        <a class='Bt_sub'href = "add_process.php?id_market=<?php echo $_GET['id_market'] ?>">ยืนยัน</a>
    </div>
</body>
</html>

