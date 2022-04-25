<?php
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
    print('<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/bttslogo.png">');
    if(!isset($_COOKIE['tusername'])){
        $script = " <div class='alert alert-danger'>
                        <p>Access Denied! Login Required!</p>
                        Click <a href='login.php'>Here </a> to login
                    </div>";
        print($script);
        exit();
    }
    
    setcookie("username", "", time()-3600);
    setcookie("passwd", "", time()-3600);
    setcookie("fname", "", time()-3600);
    setcookie("lname", "", time()-3600);

    $msg = '<div class="alert alert-success" role="alert">
                Logout Successfull!
                Click <a href="login.php">here</a> to login
            </div>';            
    print($msg);
?>