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
    // $_SESSION['cart'] = array();
    // array_push($_SESSION['cart'],array(1,'1'));
    // array_push($_SESSION['cart'],array(3,'1'));
      
     $sql = "SELECT * FROM food WHERE ";
     $result = $connect->query($sql);
    //  print_r($_SERVER);
    //  if($_GET['out'] != null){
    //     print($_GET['out']);
        
    //  }
    //  print($_SERVER["PHP_SELF"]);
    //  print_r($_SERVER);
    // print_r($_SESSION);
    // print($_GET['id_market']);
    // print_r($_POST);
    // print_r($_SESSION['cart']);

    // function order($item){
    //     $total = 0;
    //     $sql = "INSERT INTO order_food(ID_market,ID_customer,status_ID) VALUES(".$_GET['id_market'].",".$_SESSION['id_customer'].",0)";
        
    //     foreach($item as $index => $val){
    //         print_r($val);
    //         echo '<br>';
    //         $sql_food = "SELECT * FROM food WHERE ID_food = $id_food";
    //         $result_food = mysqli_fetch_array(mysqli_query($connect,$sql_food));
    //         $total = $total + ($result_food['price']*$val[2]);  
    //     }
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
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สั่งอาหารมา</title>
    <link rel="stylesheet" href = "shopping.css">
</head>
<body>

    <!-- <?php
        // print_r($_SESSION['cart']);
        // echo '<br>';
        // echo count($_SESSION['cart']);
        // echo '<br>';

        // $sql_food = "SELECT * FROM food WHERE ID_food = 1";
        // $result_food = mysqli_query($connect,$sql_food);
        // echo $result_food->num_rows;

        // for($index = 0; $index < count($_SESSION['cart']);$index++){
        //     echo $index.'<br>';
        //     print_r( $_SESSION['cart'][$index]);
        //     echo '<br>'.$_SESSION['cart'][$index][0].'<br>';
        //     $id_food = $_SESSION['cart'][$index][0];
        //     $format = $_SESSION['cart'][$index][1];
        //     $sql_food = "SELECT * FROM food WHERE ID_food = $id_food";
        //     $sql_format = "SELECT * FROM format WHERE form_id = $format";
        //     $result_food = mysqli_fetch_array(mysqli_query($connect,$sql_food));
        //     $result_format = mysqli_fetch_array(mysqli_query($connect,$sql_format));
        //     print_r($result_food);
            
        //     $result_format = $connect->query($sql_format);
        //     print_r($result_format->fetch_assoc());
        //     echo '<br>';
        //     echo $result_food->num_rows;
        //     $result = $result_food->fetch_assoc();
        //     print(mysqli_fetch_array($result_food));
        //     print_r($row);
        // }
    ?> -->




    <div class="shopping_cart">
        <h1 class="h1">ตะกร้าของคุณ</h1>
        <table>
            <thead>
                <tr>
                    <td width="5%">ภาพอาหาร</td>
                    <td width="25%">ชื่อเมนู</td>
                    <td width="5%">จำนวน</td>
                    <td width="25%">ราคา(บาท)</td>
                    <td width="25%"> </td>
                </tr>
            </thead>
            <tbody>
                <?php 
                // if(count($_SESSION['cart'])>0){
                    foreach($_SESSION['cart'] as $index => $val): ?>
                    <tr>
                        <form method="post">
                        <td>
                            <?php
                                // $id_food = $val[0];
                                // $format = $val[1];
                                // $sql_food = "SELECT * FROM food WHERE ID_food = $id_food";
                                // $sql_format = "SELECT * FROM format WHERE form_id = $format";
                                // $result_food = mysqli_fetch_array(mysqli_query($connect,$sql_food));
                                // $result_format = mysqli_fetch_array(mysqli_query($connect,$sql_format));
                                // echo "<img src = Photo/Menu_P/".$result_food['path_food']." width = 100 height = 100>";
                                echo "<img src = Photo/Menu_P/".$val['food']['path_food']." width = 100 height = 100>";
                        ?></td>
                        <td class="name">
                        <!-- <a href="test.php?id=".$row['Name_market'].''> -->
                            <?php
                                // echo $result_food['name_food'].'<br>';
                                // if($format == 1){
                                //     echo 'shop' ;
                                // }
                                // elseif ($format == 0){
                                //     echo 'home' ;
                                // }
                                echo $val['food']['name_food'].'<br>';
                                $form_id = $val['form'];
                                $sql_format = "SELECT * FROM format WHERE form_id = $form_id";
                                $result_format = mysqli_fetch_assoc(mysqli_query($connect,$sql_format));

                                echo $result_format['form_name'];
                                // if($val['form'] == 1){
                                //     echo 'shop' ;
                                // }
                                // elseif ($val['form'] == 0){
                                //     echo 'home' ;
                                // }
                                // echo $result_format['form_name'];
                                // echo '<a href= test.php?name_market='.$row['id'].'>'.$result_food['Name_market'].'</a>';
                            ?>
                        <!-- </a> -->
                        </td>
                        <td>
                            <!-- <?php echo $val[2] ?> -->
                            <?php echo $val['amount'] ?>

                        </td>
                        <td>
                        <!-- <?php echo $result_food['price']*$val[2]; ?> -->
                        <?php echo $val['food']['price']*$val['amount']; ?>
                        </td>
                        <form action = "shopping_cart.php" method="post">
                        <td><a href="remove_cart.php?position=<?php echo $index ?>&id_market=
                                    <?php echo $_GET['id_market'] ?>&id_center=<?php echo $_GET['id_center'] ?>" id ='remove_bt' >เอาออก</a></td>
                    </form>
                    </tr>
                    <?php  endforeach;  ?>
            </tbody>
        </table>
        <a href= "Shop.php?id_market=<?php echo $_GET['id_market'] ?>&id_center=<?php echo $_GET['id_center'] ?>">Back</a>
        <a href = "add_process.php?id_market=<?php echo $_GET['id_market'] ?>">ยืนยันการสั่ง</a>
        <!-- <?php order($_SESSION['cart'],$connect); ?> -->
    </div>
</body>
</html>

