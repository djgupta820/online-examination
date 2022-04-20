<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> 0<?php print($_COOKIE['strollno']); ?> Results</title>
</head>
<body>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        if(!isset($_COOKIE['strollno'])){
            $script = ' <div class="alert alert-danger">
                            Permission Denied! Login Required!
                            <p> Click <a href="login.php"> Here </a> to Login. </p>
                        </div>';
            print($script);
            exit();
        }

        include('studentnavsys.php');
    ?>
    <div class="content">
        <div class="alert alert-success">
            <p>Your Exam has been finished. You can close the window.</p>
        </div>
        <h1>Result Details</h1>
    </div>
</body>
</html>