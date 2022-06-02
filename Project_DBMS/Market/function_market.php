<?php 
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'projectdbms');

    class DB_con {
        function __construct(){
            $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbcon = $conn;

            if(mysqli_connect_errno()){
                echo "Failed to connect to MySQL:".mysqli_connect_error();
            }
        }

        public function usernameavailable($uname){
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM market WHERE username = '$uname'");
            return $checkuser;

        }

     

        public function registration($Ufname,$UMarket_name,$User_name,$User_email,$Upassword,$Ucenter_id,$U_Upload){
            $reg = mysqli_query($this->dbcon, "INSERT INTO market(Name_market,username,password,Name_user,ID_center,Email,path_profile) 
            VALUES('$UMarket_name','$User_name','$Upassword','$Ufname',$Ucenter_id,'$User_email','$U_Upload')");
            return $reg;
        }
        
        public function signin($uname,$password){
            $signinquery = mysqli_query($this->dbcon, "SELECT * FROM market 
            WHERE  username = '$uname' AND password = '$password'" );
            return $signinquery;
        }
   




     }




?>