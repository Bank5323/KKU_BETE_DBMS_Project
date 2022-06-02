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
                // $tmp = "Failed to connect to MySQL:".mysqli_connect_error();
                // echo "<script>alert('$tmp');</script>" ;
            }
        }

        public function usernameavailable($uname){
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM customer WHERE username = '$uname'");
            return $checkuser;

        }


        public function registration($fname,$email,$password,$flname,$path = 'user.png'){
            $reg = mysqli_query($this->dbcon, "INSERT INTO customer(username,email,password,Name_customer,path_profile) VALUES ('$fname','$email','$password','$flname','$path')");
            // $profile = mysqli_query($this->dbcon,"UPDATE customer SET path_customer = 'user.png' WHERE username == $fname");
            // if ($profile != TRUE){
            //     echo ERROR;
            // }
            return $reg;
        }
        public function signin($uname,$password){
            $signinquery = mysqli_query($this->dbcon, "SELECT ID_customer,username,password FROM customer 
            WHERE  username = '$uname' AND password = '$password'");
            // echo "<script>alert('$signinquery');</script>" ;
            return $signinquery;
        }
    }

    // $tmp= new DB_con();
    // $tmp1 = $tmp->signin('top','1234');
    // if($tmp1){
    //     print(1);
    // }
    // else{
    //     print(0);
    // }

    
    

?>