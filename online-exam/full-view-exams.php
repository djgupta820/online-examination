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
    <title> Exams</title>
</head>
<body>
    <div class="content" style="margin:20px;">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title"> Exams</h4>
            </div>
          </div>
        </div>
        <div>
            <table class="table table-hover table-bordered table-dark">
                <thead>
                    <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Subject Code</th>
                    <th scope="col">Date of Exam</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Scheduled By</th>
                    <th scope="col">Question Paper</th>
                    <th scope="col">Exam Type</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                  <tbody>
                      <?php
                          $host = "localhost";
                          $user = "root";
                          $pass = "";
                          $db = "btts";
                          $conn = new mysqli($host, $user, $pass, $db);
                          $sql = "select course_name, semester, subject, subject_code, date_of_exam, start_time, end_time, scheduled_by, Question_paper_name, exam_type from exams"; 
                          
                          $res = $conn->query($sql);
                          if($res->num_rows > 0){
                            $i=1;
                            while($row = $res->fetch_assoc()){
                                print("<tr>");
                                print("<th>$i</th>");
                                print("<td>".$row['course_name']."</td>");
                                print("<td>".$row['semester']."</td>");
                                print("<th>".$row['subject']."</th>");
                                print("<td>".$row['subject_code']."</td>");
                                print("<td>".$row['date_of_exam']."</td>");
                                print("<td>".$row['start_time']."</td>");
                                print("<td>".$row['end_time']."</td>");
                                print("<td>".$row['scheduled_by']."</td>");
                                print("<td>".$row['Question_paper_name']."</td>");
                                print("<td>".$row['exam_type']."</td>");
                                print('<td> <form action="question-paper.php"> <button class="btn btn-outline-success"> View </button> </form> </td>');
                                print("</tr>");
                                $i++;
                            }
                          }
                      ?>
                      
                  </tbody>
            </table>
            <form action="previous-exams.php">
              <button class="btn btn-primary"> Back </button>
            </form>
        </div>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>