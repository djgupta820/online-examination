<?php
  print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
  if(!isset($_COOKIE['tusername'])){
      $script = " <div class='alert alert-danger'>
                      <p>Access Denied! Login Required!</p>
                      Click <a href='login.php'>Here </a> to login
                  </div>";
      print($script);
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/bttslogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            
    <style>
        .cp{
            border:1px solid gray;
            border-radius:10px;
            padding:20px;
            margin:20px;
            box-shadow:2px 2px 2px gray;
        }
    </style>
    <title>Change Password</title>
</head>
<body>
    <?php
        include("navsys.php");
    ?>
    <div class=""  style="margin-left:250px;">
        
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Change Password</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Change Password
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <form action="changepass.php" method="post" class="form-group cp">
          <label for="cpass">Current Password</label>
          <input type="text" name="cpass" id="cpass" class="form-control" required><br>
          <label for="npass1">New Password</label>
          <input type="text" name="npass1" id="cpass" class="form-control" required><br>
          <label for="npass2">Repeat Password</label>
          <input type="text" name="npass2" id="cpass" class="form-control" required><br>
          <button type="submit" class="btn btn-success">Change</button>
        </form>
    </div>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>