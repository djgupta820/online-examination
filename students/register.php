<?php

    $host = 'localhost';
    $user = 'root';
    $passd = '';
    $db = 'btts';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $addr = $_POST['address'];
    $phone = $_POST['phone'];
    $rollno = $_POST['rollno'];
    $course = $_POST['course'];
    $sem = $_POST['sem'];
    $passwd = $_POST['pass'];
    $cpasswd = $_POST['cpass'];

    if($passwd !== $cpasswd){
        $scrpt = "  <script>
                        alert('Password and Confirm Password did not matched');
                        window.open('registration.php', '_self');
                    </script>";
                print($scrpt);
                exit();
    }
    $conn = new mysqli($host, $user, $passd, $db);
    if($conn->connect_error){
        die("Error while connecting to DataBase! ".$conn->connect_error);
    }
    else{
        $sql = "Insert into students(
            First_Name, Last_Name, Date_of_Birth, Address, Mobile_Number, Roll_Number, Course, Semester, Login_Password, registered_at) 
            values('".$fname."','".$lname."','".$dob."','".$addr."',".$phone.",".$rollno.",'".$course."',".$sem.",'".md5($passwd)."','".date("y-m-d h:i:s")."')";
            if($conn->query($sql)){
                $scrpt = "  <script>
                                alert('Register Successfull!');
                                window.open('login.php', '_self');
                            </script>";
                print($scrpt);

            }
            else{
                $scrpt = "  <script>
                                alert('Registration Unsuccessfull!');
                                window.open('registration.php', '_self');
                            </script>";
                print($scrpt);
            }
    }
?>