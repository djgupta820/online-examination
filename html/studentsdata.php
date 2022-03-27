<?php
    class users{
            
        function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->pass = "";
            $this->db = "btts";
        }
        
        public function checkConn(){        
            $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if($conn->connect_error){
                die("connection error: ".$conn->error);
            }
            else{
                print("connection Successfull");
            }
            return $conn;
        }

        public function closeConn(){
            $conn->close();
            print("<br>connection Successfull closed");
        }

        public function createTable(){
            $conn = $this->checkConn();
            $sql = "create table eightsem(
                First_Name varchar(15) not null,
                Last_Name varchar(15) not null,
                Date_of_Birth date not null,
                Address varchar(50) not null,
                Mobile_Number bigint not null unique,
                Roll_Number bigint primary key,
                Course char(30) not null, 
                Semester int not null
            );";

            if ($conn->query($sql) === TRUE){
                print("<br>Table firstsem created successfully");
            }
            else{
                die("Error creating table".$conn->error);
            }
        }

        public function md(){
            $st = "djgupta";
            print("<h1>".md5($st)."</h1>");
            print("<br><h1>8fdf9deb2169eaa88f2e32ba7e814988</h1>");
            if(md5($st) === "8fdf9deb2169eaa88f2e32ba7e814988")
            {
                print("True");
            }
            else{
                print("False");
            }
        }
    }
    
?>

