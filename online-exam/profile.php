<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/bttslogo.png">
    <style>
        body{
            background-color:#ECF0F1;
        }
        .bx{
            margin:20px;
            padding:20px;
        }
    </style>
    <title>Profile</title>
</head>
<body>
    <?php
    include("navsys.php");
    ?>
    <div style="margin-left:250px;">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Profile</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Profile
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="bx">
        
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <img src="../assets/images/users/1.jpg" alt="Profile Picture" height="150px" width="150px" style="border-radius:50%;"/>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <?php
                                    $conn = new mysqli('localhost', 'root','','btts');
                                    if($conn->connect_error){
                                        die("Error: ".$conn->connect_error);
                                    }
                                    else{
                                        $sql = "select First_name, Last_name, Employee_ID, Designation, 
                                                Email_ID, User_name, Login_password, Phone_number, Address
                                                from users where User_name = '".$_COOKIE['tusername']."'";

                                        $res = $conn->query($sql);
                                        if($res->num_rows > 0){
                                            while($row = $res->fetch_assoc()){ 
                                                print('<h4> <label class="text-muted"> Full Name: </label> '. $row["First_name"]." ".$row["Last_name"].'</h4>');
                                                print('<h5> <label for="" class="text-muted"> Username: </label> '.($row["User_name"]).'</h5>');
                                                print('<small><cite title="San Francisco, USA">'.($row["Address"]).'<i class="glyphicon glyphicon-map-marker">
                                                </i></cite></small><br>');
                                                print('<label class="text-muted">Email ID: </label> <i class="glyphicon glyphicon-envelope"></i>'.($row["Email_ID"]).'</br>');
                                                print('<label class="text-muted">Designation:  </label> <i class="glyphicon glyphicon-globe"></i>'.($row["Designation"]).'<br />');
                                                print('<label class="text-muted">Employee ID: </label> <i class="glyphicon glyphicon-gift"></i>'.($row["Employee_ID"]).'<br />');
                                                print('<label class="text-muted">Phone Number: </label> <i class="glyphicon glyphicon-gift"></i>'.($row["Phone_number"]).'<br />');
                                                print('<label class="text-muted">Password Hash: </label> <i class="glyphicon glyphicon-gift"></i>'.($row["Login_password"]).'<br />');
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>