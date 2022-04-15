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
                die("<br>connection error: ".$conn->error);
            }
            return $conn;
        }

        public function closeConn(){
            $conn->close();
            print("<br>connection Successfull closed");
        }

        public function createTable($course, $semester){
            $conn = $this->checkConn();
            $sql = "create table ". $course."(
                First_Name varchar(15) not null,
                Last_Name varchar(15) not null,
                Date_of_Birth date not null,
                Address varchar(50) not null,
                Mobile_Number bigint not null unique,
                Roll_Number bigint primary key,
                Course char(30) not null, 
                Semester int not null
            )";

            if ($conn->query($sql) === TRUE){
                print("<br>Table ". $course." created successfully");
            }
            else{
                die("Error creating table".$conn->error);
            }
        }

        public function getData(){
            $course = $_GET['course'];
            $sem = $_GET['semester'];
            
            $conn = $this->checkConn();
            $sql = "select First_Name,Last_Name,Date_of_Birth,Address,Mobile_Number, Roll_Number, Course, Semester from students where Course='".$course."' and Semester = ".$sem;
            $res = $conn->query($sql);
            print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
            if($res->num_rows > 0){
                
                print("<div style='margin:20px;'><h1 style='text-align:center; text-decoration:underline;'>".strtoupper($course)." Students List</h1>");
                $tab = '<table class="table table-hover table-bordered table-dark" style="box-shadow:3px 2px 2px gray;>
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">S. No.</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile Number</th>
                            <th scope="col">Roll Number</th>
                            <th scope="col">Course</th>
                            <th scope="col">Semester</th>
                            </tr>
                        </thead>
                        <tbody>';
                print($tab);
                $i = 1;
                while($row=$res->fetch_assoc()){
                    print("<tr>");
                    print("<td>".$i."</td>");
                    print("<td>".$row['First_Name']."</td>");
                    print("<td>".$row['Last_Name']."</td>");
                    print("<td>".$row['Date_of_Birth']."</td>");
                    print("<td>".$row['Address']."</td>");
                    print("<td>".$row['Mobile_Number']."</td>");
                    print("<td>0".$row['Roll_Number']."</td>");
                    print("<td>".$row['Course']."</td>");
                    print("<td>".$row['Semester']."</td>");
                    print("</tr>");
                    $i++;
                }
                print("</table>");
                $btn = '<div class="d-grid gap-2 d-md-block" style="margin:20px;">
                            <a href="index.php" class="btn btn-primary"> Home </a>
                            <a href="student-list.php" class="btn btn-primary"> Back </a>
                        </div>';
                print($btn);
            }
            else{
                $alert = '<div class="alert alert-danger" role="alert">
                                No Data Availabel
                            </div>
                            <div class="container" style="margin-bottom:20px;"><a href="student-list.php" class="btn btn-primary">Back</a></div> </div>
                            ';
                            
                print($alert);
            }
            ;
           
            include('footer.php');
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

    $u = new users();
    $u->getData();
?>

