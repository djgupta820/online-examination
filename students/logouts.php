<?php
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
    error_reporting(E_ERROR | E_PARSE);
    if(!isset($_COOKIE['strollno'])){
        $script = " <div class='alert alert-danger'>
                        <p> Permission Denied! Login Required! </p>
                        Click <a href='login.php'> Here </a> to login.
                    </div>";
        print($script);
        exit();
    }
    setcookie("strollno", $_COOKIE['rollno'], time() - 3600);
    setcookie("stpasswd", $_COOKIE['passwd'], time() - 3600);
    setcookie("stfname", $_COOKIE['fname'], time() - 3600);
    setcookie("stlname", $_COOKIE['lname'], time() - 3600);

    $msg = '<div class="alert alert-success" role="alert">
                Logout Successfull!
                Click <a href="login.php">here</a> to login
            </div>';            
    print($msg);
?>