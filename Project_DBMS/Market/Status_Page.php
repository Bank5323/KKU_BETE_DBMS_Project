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

    if(isset($_POST['finish'])){
        $id_order = $_POST['finish'];
        $sql_update_status = "UPDATE order_food SET status_ID = 1 WHERE ID_order = $id_order";
        if($connect->query($sql_update_status)){
            echo "<script>alert('Update Success.');</script>" ;
        }
        else{
            echo "<script>alert('Update Fail.');</script>" ;
        }
        // echo "<script>window.location.href = 'Status_page.php';</script>";
    }
    elseif(isset($_POST['reset'])){
        echo "<script>window.location.href = 'Status_page.php';</script>";
    }
    $id_market = $_SESSION['id_market'];
    // $id_market = 1;
    $sql_order = "SELECT ID_order,total_price,status_name FROM order_food,status WHERE ID_market = $id_market AND order_food.status_ID = 0 AND order_food.status_ID = status.status_ID ORDER BY Date ASC";
    $result = mysqli_fetch_assoc(mysqli_query($connect,$sql_order));

    // print_r($result);
    // echo '<br>';
    // print(count($result));
    // echo '<br>';
    // print($result['ID_order']);
    if(empty($result)){
        $check = FALSE;
        $ID_order = 'ไม่มีคำสั่งซื้อ';
        $total = 0;
        $status = '';
    }
    else{
        $check = TRUE;
        $ID_order = $result['ID_order'];
        $total = $result['total_price'];
        $status = $result['status_name'];
    }
    

    // echo "<h2>$ID_order</h2>";
    // echo "<h2>".$total."</h2>";
    // echo "<h3>".$status."</h3>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Status_style.css">
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
        <!-- <?php 
            if($temp1){ 
                echo '<nav class="bt_login"><a href="signin_user.php">ลงชื่อเข้าใช้</a></nav>';
                echo '<nav class="bt_reg"><a href="Register_user.php">สมัครสมาชิก</a></nav>';
            }
            else{
                echo '<nav class="bt_login"><a href="AddPoint.php">'.$temp.'</a></nav>';
                echo '<nav class="bt_reg"><a href="LogoutScript.php">ออกจากระบบ</a>';
                
                echo '<nav class="wallet"><h1>'.$wallet.'</h1></nav>';
            }
        ?> -->
    </nav>


    <div class="monitor">
        <?PHP
            echo "หมายเลขคำสั่งซื้อ : <h2 id = 'id_order'>$ID_order</h2>";
        
        ?>
        รายการอาหาร
        <br>
        <table>
            <!-- <thead>

            </thead> -->
            <tbody>
                <?PHP
                    // $sql_detail_order = "SELECT list_food.ID_food,name_food,price,path_food,Amount FROM list_food,food WHERE ID_order = $ID_order AND list_food.ID_food = food.ID_food";
                    $sql_detail_order = "SELECT list_food.ID_food,name_food,price,path_food,Amount,form_name 
                    FROM list_food,food,format 
                    WHERE ID_order = $ID_order 
                    AND list_food.ID_food = food.ID_food 
                    AND list_food.format_ID = format.form_id";


                    $detail = mysqli_query($connect,$sql_detail_order);
                    if($check){
                    while($row = mysqli_fetch_assoc($detail)):
                ?>
                <tr>

                   <td> <?PHP echo $row['name_food']; ?></td>
                   <td> <?PHP echo $row['Amount']; ?></td>
                   <td> <?PHP echo $row['form_name']; ?></td>

                </tr>
                <?php endwhile;} ?>


                    


            </tbody>
        </table>

        <?PHP
            echo "ราคารวม : <h2 id = 'total'>$total</h2>";
            echo "<br>";
            echo "สถานนะ : <h3 id = 'status'>$status</h3>";
        ?>
        
            <!-- หมายเลขคำสั่งซื้อ : <h2 id = 'id_order'></h2>
            รายการอาหาร : <h4 id = 'Food'></h4>
            ราคารวม : <h2 id = 'total'></h2>
            สถานนะ : <h3 id = 'status'></h3> -->
    </div>

    <form method="post">
        

    <?php
        if($check){
            echo "<button type='submit' name = 'finish' id = 'finish' value = $ID_order>Finish</button>";
        }
        else{
            echo "<button type='submit' name = 'reset' id = 'reset'>Refresh</button>";
        }
    ?>
        <!-- <button type="submit" name = 'finish' id = 'finish' value = <?php echo $id_order; ?>> -->
    </form>

    <!-- <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script>

        function update_order(){
            $.ajax({
                async: false,
                type :'POST',
                url : "update_order.php",
                data : "id_market="+<?php echo $_SESSION['id_market']; ?>,
                success: function(data){
                        $('#id_order').html(data);
                        // $('#Food').html(data);
                        // $('#total').html(data);
                        // $('#status').html(data);
                    }
            });

        }

        function doloop_order(){
            load_order();
        }

        function load_order(){
            update_order();
            setTimeout("doloop_order();", 1000);
        }

        // <?php echo "Hi"; ?>
        alert('Hi');
        load_order();

    </script> -->

    <div class="botton">
        <img src="../Photo/bt_bgnew.png">
    </div>

</body>
</html>