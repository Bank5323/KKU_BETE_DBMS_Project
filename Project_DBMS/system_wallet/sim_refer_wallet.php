<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'projectdbms');

    $connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

if (mysqli_connect_errno()) {
    die("Something wrong.: " . $connect->connect_error);
}
    function Random_refer_money() { 

        $chars = "0123456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 

        while ($i < 18) { 
            $num = rand() % 10; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        }
        $money = rand(100,1000);
        return array($pass,$money); 

    }
    $tmp = Random_refer_money();
    print_r($tmp);
    // print('hi');

    $sql = "INSERT INTO wallet_in(refer_code,money) VALUES($tmp[0],$tmp[1])";
    if (mysqli_query($connect,$sql)){
        print('yes');
    }
    else{
        print('no');
    }
?>