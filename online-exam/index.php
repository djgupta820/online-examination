<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/bttslogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <?php
    if(!isset($_COOKIE['tusername'])){
        $script = " <div class='alert alert-danger'>
                        <p>Access Denied! Login Required!</p>
                        Click <a href='login.php'>Here </a> to login
                    </div>";
        print($script);
        exit();
    }
    include("navsys.php");
    include("dashboard.php");
    include("footer.php");
    ?>
</body>
</html>