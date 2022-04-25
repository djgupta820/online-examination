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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/bttslogo.png">
    <title> Exams</title>
</head>
<body>
    <?php
    include("navsys.php");
    ?>
    <div style="margin-left:250px;">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title"> Exams</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                     Exams
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
                      <?php
                          $host = "localhost";
                          $user = "root";
                          $pass = "";
                          $db = "btts";
                          $conn = new mysqli($host, $user, $pass, $db);
                          $sql = "select course_name from exams "; 
                          
                          $res = $conn->query($sql);
                          if($res->num_rows <= 0){
                            $script ="<div class='alert alert-info'>
                                        <p> No exam is Scheduled!</p>
                                      </div>";
                            print($script);
                            $conn->close();
                            exit(); 
                            }                          
                      ?>
                      
        <div class="container">
            <table class="table table-hover table-bordered table-dark">
                <thead>
                    <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Date of Exam</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">Scheduled By</th>
                    </tr>
                </thead>
                <div class="tble">
                  <tbody>
                      <?php
                          $host = "localhost";
                          $user = "root";
                          $pass = "";
                          $db = "btts";
                          $conn = new mysqli($host, $user, $pass, $db);
                          $sql = "select course_name, semester, subject, date_of_exam, start_time, scheduled_by from exams order by date_of_exam desc"; 
                          
                          $res = $conn->query($sql);
                          if($res->num_rows > 0){
                            $i=1;
                            while($row = $res->fetch_assoc()){
                                print("<tr>");
                                print("<th>$i</th>");
                                print("<td>".$row['course_name']."</td>");
                                print("<td>".$row['semester']."</td>");
                                print("<th>".$row['subject']."</th>");
                                print("<td>".$row['date_of_exam']."</td>");
                                print("<td>".$row['start_time']."</td>");
                                print("<td>".$row['scheduled_by']."</td>");
                                print("</tr>");
                                $i++;
                            }
                          }
                          $conn->close();
                      ?>
                      
                  </tbody>
                </div>
            </table>
            <form action="full-view-exams.php">
              <button class="btn btn-primary">Detailed View</button>
            </form>
        </div>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>