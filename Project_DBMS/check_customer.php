<?php
    include_once("function_user.php");

    $usernamecheck = new DB_con();


    $uname = $_POST['username'];

    $sql = $usernamecheck->usernameavailable($uname);

    $num = mysqli_num_rows($sql);

    if($num > 0 ){
        echo "<span style = 'color: red;' >ชื่อผู้ใช้นี้มีอยู่ร้าว.</span>";
        echo "<script>$('#submit').prop('disabled',true)</script>";
    }else{
        echo "<span style = 'color: green;' >ชื่อผู้ใช้นี้สามารถใช้ได้.</span>";
        echo "<script>$('#submit').prop('disabled',false)</script>";
    }
    

?>