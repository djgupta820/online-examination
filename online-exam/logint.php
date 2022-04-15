<?php
    class teacher{
        
        function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "";
            $this->db = "btts";
        }

        function is_valid($username, $passwd){
            //check is logged in ... isset(session[username] and password
            // if exist ... use username and password values in cookies to login .... 
            $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if(1){
                $sql = "select First_name, Last_name, Employee_ID, Designation, Email_ID, User_name, Login_password, Phone_number, Address from users where User_name ='".$username."' and Login_password ='".md5($passwd)."'";
                $res = $conn->query($sql);
                if($res->num_rows > 0){
                    //Output
                    $row = $res->fetch_assoc();
                    if($row["User_name"] === $username && $row["Login_password"] === md5($passwd)){
                        $uname = $row["User_name"];
                        if (isset($_COOKIE['tusername'])) {
                            unset($_COOKIE['tusername']); 
                        }
                        if (isset($_COOKIE['tpasswd'])) {
                            unset($_COOKIE['tpasswd']); 
                        }
                        setcookie("tusername", $username, time() + (86400), "/");                        
                        setcookie("tpasswd", $passwd, time() + (86400), "/");
                        setcookie("tfname", $row['First_name'], time() + (86400), "/");
                        setcookie("tlname", $row['Last_name'], time() + (86400), "/");
                        return true;
                    }
                }
                else{
                    return false;
                }
            }
            return false;
        }

        public function login(){
            
            error_reporting(E_ERROR | E_PARSE);/*
            if($this->is_valid($_COOKIE['username'] ,$_COOKIE['passwd'])){
                print("<script>alert('Login Successfull!');</script>");
                print("<script>window.open('index.php', '_self');</script>");  
                exit();
            }*/

            if($this->is_valid($_POST["username"], $_POST["password"])){
                print("<script>alert('Login Successfull}!');</script>");
                print("<script>window.open('index.php', '_self');</script>");
            }/*
            else{
                print("<script>alert('Invalid Credentials!');</script>");
                print("<script> window.open('login.php', '_self'); </script>");
            }*/
            
        }
    }
    //print("Alert");
    $t = new teacher();
    $t->login();
?>
