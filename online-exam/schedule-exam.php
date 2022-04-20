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
    <style>
      .sel{
        padding:20px;
        margin:20px;
        display:inline;
        margin-bottom:30px;
      }
    </style>
    <title>Schedule Exam</title>
</head>
<body>
    <?php
    include("navsys.php");
    ?>
    <div style="margin-left:250px;">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Schedule Exam</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    Schedule Exam
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        
        <div class="container">
            <form action="schedul-exam.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="course">Select Course</label>
                <select name="course" class="form-control" required>
                  <option value="sel">Select</option>
                  <?php
                    $host = "localhost";
                    $pass = "";
                    $user = "root";
                    $db = "btts";
                    $conn = new mysqli($host, $user, $pass, $db);
                    $sql = "select Course_name from courses";
                    $res = $conn->query($sql);
                    if($res->num_rows > 0){
                      while($row=$res->fetch_assoc()){
                        print("<option value=".$row['Course_name'].">".$row['Course_name']."</option>");
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                  <label for="semester">Select Semester</label>
                  <select name="semester" class="form-control" required>
                    <option value="sel">Select</option>
                    <option value="1">First</option>
                    <option value="2">Second</option>
                    <option value="3">Third</option>
                    <option value="4">Forth</option>
                    <option value="5">Fifth</option>
                    <option value="6">Sixth</option>
                    <option value="7">Seventh</option>
                    <option value="8">Eighth</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="sub">Subject</label>
                <input type="text" class="form-control" name="sub" id="sub" required>
              </div>
              <div class="form-group">
                <label for="subcode">Subect Code</label>
                <input type="text" class="form-control" name="subcode" id="subcode" required>
              </div>
              <div class="form-group">
                <label for="subcode">Date of Exam</label>
                <input type="date" class="form-control" name="dateofexam" id="dateofexam" placeholder="yyyy-mm-dd" required>
              </div>
              <div class="form-inline">
                <label for="stime">Start Time</label>
                <input type="time" name="stime" placeholder="hrs:mins" class="form-control" required>
              </div>
              <div class="form-group">
                <select name="ampm" id="ampm" class="form-control">
                  <option value="AM">AM</option>
                  <option value="PM">PM</option>
                </select>
              </div>
              <div class="form-group">
                <label for="etime">End Time</label>
                <input type="time" name="etime" placeholder="hrs:mins" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="extype">Exam Type</label>
                <select name="extype" id="extype" class="form-control" required>
                  <option value="sel">select</option>
                  <!-- <option value="subjective">Subjective</option> -->
                  <option value="objective">Objective</option>
                </select>
              </div>
              <div class="form-group">
                  <label for="file"> <h1>Upload File </h1></label>
                  <p style="color:red;"> * file must be text type (.txt)</p>
                  <input type="file" name="fileToUpload" class="form-control" id="fileToUpload"><br>
                  <!-- <button tupe="button" class="btn btn-primary" name="submit" style="margin-top:20px;">Done</button> 
                  <a href="scheduleexam.php" class="btn btn-primary" style="margin-top:20px;float:right;"> Back </a> -->
              </div>
              <button class="btn btn-primary"> Schedule </button>
            </form>
        </div>
        <?php
        print("<p></p>");
            include("footer.php");
        ?>
    </div>
</body>
</html>