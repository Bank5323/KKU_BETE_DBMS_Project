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
    // print_r($result_sql);
    // $detail_food = $result_sql->fetch_assoc();
    // print_r($detail_food);

    // while($row = $result_sql->fetch_assoc()){
    //     echo '<br>';
    //     print_r($row);
    //     $id_food = $row['ID_food'];
    //     $sql_food = "SELECT name_food,price,path_food FROM food WHERE ID_food = $id_food";
    //     $result_food = mysqli_fetch_assoc(mysqli_query($connect,$sql_food));
    //     echo '<br>';
    //     print_r($result_food);
    // }
    // $id_food = $row['ID_food'];
    // $sql_food = "SELECT name_food,price,path_food FROM food WHERE ID_food = $id_food";
    // $result_food = mysqli_fetch_assoc(mysqli_query($connect,$sql_food));
    // print_r($result_food);
    // print(count($detail_food));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>หมายเลขคำสั่งซื้อ : <?php echo $id_order; ?></h1>

    <table>
        <thead>
        <tr>
            <td width="15%">ภาพอาหาร</td>
            <td width="25%">ชื่ออาหาร</td>
            <td width="25%">ราคา</td>       
            <td width="10%">จำนวน</td>
            <td width="10%">รูปแบบการจัดส่ง</td>  
        </tr>
        </thead>
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
            <tr>
                <td>
                    <?php
                        if ($result_food['path_food'] != null){
                            $img = $result_food['path_food'];
                            echo "<img src = Photo\Menu_P\\".$result_food['path_food']." width = 100 height = 100>";
                        }
                    ?>
                </td>
                <td><?php echo $result_food['name_food']; ?></td>
                <td><?php echo $result_food['price']; ?></td>
                <td><?php echo $row['Amount']; ?></td>
                <td><?PHP
                    $form_id = $row['format_ID'];
                    $sql_format = "SELECT * FROM format WHERE form_id = $form_id";
                    $result_format = mysqli_fetch_assoc(mysqli_query($connect,$sql_format));

                    echo $result_format['form_name'];
                
                
                ?></td>
            </tr>
            <?php endwhile ?>
        </tbodey>
    </table>
    <h1>ราคารวม : <?php echo $data_order['total_price']; ?></h1>
    สถานะ :  <h2 id = 'status'>รอสักครู<h2>
    <!-- <a href = '#' onclick = "updata_status();">update</a> -->

    <script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        </script>

    <!-- สถานะ : <span id = 'status' onblur="updata_status ($id_order)"></span>  -->

    <!-- updata_status($id_order); -->
    
    <!-- <script>
        setTimeout(function(){ 

        $.get( "updata_status_script.php", function( data ) {
        $( "#status" ).html( data ); // this will replace the html refreshing its content using ajax

        });


        }, 5000);
    </script> -->




    <!-- <h2>สถานะ : 
        <?php
            $sql_status_id = "SELECT status_ID FROM order_food WHERE ID_order = $id_order";
            
            // while (TRUE){

            //     $status = mysqli_fetch_assoc(mysqli_query($connect,$sql_status_id));
            //     $status_id = $status['status_ID'];
            //     $sql_status = "SELECT status_name FROM status WHERE status_ID = $status_id";
            //     $status = mysqli_fetch_assoc(mysqli_query($connect,$sql_status));


            //     echo $status['status_name'];
                
            // }   

            // $status = mysqli_fetch_assoc(mysqli_query($connect,$sql_status_id));
            // $status_id = $status['status_ID'];
            // $sql_status = "SELECT status_name FROM status WHERE status_ID = $status_id";
            // $status = mysqli_fetch_assoc(mysqli_query($connect,$sql_status));


            // echo $status['status_name'];
    
        ?>
    </h2> -->

    
</body>
</html>
