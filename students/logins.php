<?php
    class student{
        
        function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "";
            $this->db = "btts";
        }
 
        public function login(){
            
            //error_reporting(E_ERROR | E_PARSE);
            $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if($conn->connect_error){
                die("Error: ".$conn->connect_error);
            }
            else{
                $sql = "select First_Name, Last_Name, Roll_Number, Course, Semester, Login_Password
                        from students where Roll_Number = ".$_POST['rollno']." 
                        and Login_password = '".md5($_POST['password'])."'";

                $res = $conn->query($sql);
                if($res->num_rows > 0){
                    $row = $res->fetch_assoc();
                    //print($row['First_Name']);
                    setcookie("stfname", $row['First_Name'], time() + (86400/24), "/");      //86400 is for 1 day
                    setcookie("stlname", $row['Last_Name'], time() + (86400/24), "/");
                    setcookie("strollno", $row['Roll_Number'], time() + (86400/24), "/");
                    setcookie("stpasswd", $row['Login_Password'], time() + (86400/24), "/");

                    $script =  "<script>
                                    alert('Login Successfull!');
                                    window.open('main.php', '_self');
                                </script>";
                    print($script);
                }
                else{
                    $script =  "<script>
                                    alert('Invalid Credentials !');
                                    window.open('login.php', '_self');
                                </script>";
                    print($script);
                }
            }
        }
    }
    $s = new student();
    $s->login();
?>
