<?php
    class teacher{

        function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "";
            $this->db = "btts";
        }

        public function login(){
            error_reporting(E_ERROR | E_PARSE);
            $username = $_POST["username"];
            $passwd = $_POST["password"];

            //print(var_dump($_REQUEST));

            $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

            if($conn->connect_error){
                die("Connection Error: ".$conn->connect->error);
            }
            else{
                if(isset($_POST["username"])){
                    $sql = "select First_name, Last_name, User_name, Login_password from users where User_name ='".$username."' and Login_password ='".md5($passwd)."'";
                    $res = $conn->query($sql);
                    if($res->num_rows > 0){
                        //Output
                        $row = $res->fetch_assoc();
                        if($row["User_name"] === $username && $row["Login_password"] === md5($passwd)){
                            $script = " <script type='text/JavaScript'> alert('Login Successfull!'); </script> ";
                            print($script);
                            header("Location: http://localhost/matrix-admin-bt5/html/index.php");
                        }
                        else{
                            $script = " <script type='text/JavaScript'> alert('Invalid Credentials!'); </script> ";
                            print($script);/*
                            header("Location: http://localhost/matrix-admin-bt5/html/login.php");*/
                        }
                    }
                }
            }
        }
    }

    $t = new teacher();
    $t->login();
?>