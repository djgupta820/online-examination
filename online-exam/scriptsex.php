<?php
    function createTable($course){
        $conn = $this->checkConn();
        $sql = "create table ". $course."_students(
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
            print("<br>Table ". $course."_students created successfully");
        }
        else{
            die("Error creating table".$conn->error);
        }
    }

    createTable("BCA")
?>