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

    $id_order = $_GET['id_order'];
    $sql_order = "SELECT ID_market,total_price FROM order_food WHERE ID_order = $id_order";
    $data_order = mysqli_fetch_assoc(mysqli_query($connect,$sql_order));

    $sql_detail_food = "SELECT ID_food,Amount,format_ID FROM list_food WHERE ID_order = $id_order";
    $result_sql = mysqli_query($connect,$sql_detail_food);
    
    

    $connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

    if (mysqli_connect_errno()) {
        die("Something wrong.: " . $connect->connect_error);
    }
    
    $temp1 = true;

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
    <title>Document</title>
    <link rel="stylesheet" href = "Process.css">
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
                echo '<nav class="bt_login"><a href="AddPoint.php">'.$temp.'</a></nav>';
                echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
                echo '<nav class="wallet"><p>'.$wallet.' บาท</p></nav>';
            }
        ?>
    </nav>

    <nav class="head_k"> 
        <a>|</a>
    </nav>
    
  
    <p class="text_code">หมายเลขคำสั่งซื้อที่ : <?php echo $id_order; ?></p>
    <div class='container'>
        <table>
        <!-- <thead>
        <tr>
            <td width="15%">ภาพอาหาร</td>
            <td width="25%">ชื่ออาหาร</td>
            <td width="25%">ราคา</td>       
            <td width="10%">จำนวน</td>
            <td width="10%">รูปแบบการจัดส่ง</td>  
        </tr>
        </thead> -->
        <tbody>
            <?php
                while($row = $result_sql->fetch_assoc()):
                    // echo '<br>';
                    // print_r($row);
                    $id_food = $row['ID_food'];
                    $sql_food = "SELECT name_food,price,path_food FROM food WHERE ID_food = $id_food";
                    $result_food = mysqli_fetch_assoc(mysqli_query($connect,$sql_food));
                    // print_r($result_food);
                       
                    
            ?>

            <tr >
                <td>
                    <?php
                        if ($result_food['path_food'] != null){
                            $img = $result_food['path_food'];
                            echo "<img src = Photo\Menu_P\\".$result_food['path_food']." width = 100 height = 100>";
                        }
                    ?>
                </td>
                <td class='Name_food'><?php echo $result_food['name_food']; ?></td>
                <td class='Price_food'><?php echo '<p>'.$result_food['price'].' บาท</p>'; ?></td>
                <td><?php echo '<p> จำนวน : '.$row['Amount'].'</p>'; ?></td>
                <td><?PHP
                    $form_id = $row['format_ID'];
                    $sql_format = "SELECT * FROM format WHERE form_id = $form_id";
                    $result_format = mysqli_fetch_assoc(mysqli_query($connect,$sql_format));

                    echo "<p>".$result_format['form_name']."</p>";
                
                
                ?></td>
            </tr>
            <?php endwhile ?>
        </tbodey>
        </table>
        <p class="TT_Price">ราคารวม : <?php echo "<p1>".$data_order['total_price']." บาท</p>"; ?></p>
        <a class='Bt_back'href= "Homepage.php">กลับไปหน้าหลัก</a>
        
    </div>

    
    <p class="SS">สถานะ</p>  
    <p class="SS_H"id = 'status'>รอสักครู<p>
    <!-- <a href = '#' onclick = "updata_status();">update</a> -->

    <p class="SS_p"><script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            
            function updata_status(){
                $.ajax({
                    async: false,
                    type: 'POST',
                    url : "updata_status_script.php",
                    data : 'id_order='+<?php echo $id_order; ?>,
                    success: function(data){
                        $('#status').html(data);
                    }
                });
            }

            function doloop(){
                load_status();
            }
            function load_status(){
                updata_status();
                setTimeout("doloop();",1000);

            }

            load_status();

        </script></p>
    
</body>
</html>
