<?php
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');

    $current_password = $_POST['cpass'];
    $new_password = $_POST['npass1'];
    $confirm_password = $_POST['npass2'];
    //print($current_password." ".$new_password." ".$confirm_password);

        if($current_password === $new_password){
            $err = '<div class="alert alert-danger">
                        <p>New Password cannot be same as previous</p>
                        <a href="cpassword.php" class="btn btn-primary"> Back </a>
                    </div>';
            print($err);
            return false;
        }
        if($new_password !== $confirm_password){
            $err = '<div class="alert alert-danger">
                        <p>New Password and Repeat Passowrd did not matched</p>
                        <a href="cpassword.php" class="btn btn-primary"> Back </a>
                    </div>';
            print($err);
            return false;
        }
    
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "btts";

        $conn = new mysqli($host, $user, $pass, $db);
        if($conn->connect_error){
            $err = '<div class="alert alert-danger">
                        <p>Cannot connect to database'.$conn->connect_error.'</p>
                        <a href="cpassword.php" class="btn btn-primary"> Back </a>
                    </div>';
            print($err);
        }
    
        else{

        }
        $sql = "select Login_password from users where user_name = '".$_COOKIE['username']."'";
        $res = $conn->query($sql);

        if($res->num_rows < 1){
            $err = '<div class="alert alert-danger">
                        <p>Your current password did not matched!</p>
                        <a href="cpassword.php" class="btn btn-primary"> Back </a>
                    </div>';
            print($err);
        }
        if($res->num_rows > 0){
            $sql = "update users set Login_password = md5('".$new_password."') where User_name = '".$_COOKIE['username']."'";
            $res = $conn->query($sql);
            $outp = '<div class="alert alert-success">
                            <p>Password change Successfully!</p>
                            <a href="index.php" class="btn btn-primary"> Home </a>
                        </div>';
            print($outp);
        }
    
?>