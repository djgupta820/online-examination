<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/bttslogo.png">
    <title>Previous Exams</title>
</head>
<body>
    <?php
    include("navsys.php");
    ?>
    <div style="margin-left:250px;">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Previous Exams</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    Previous Exams
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
            <table class="table table-hover table-bordered table-dark">
                <thead>
                    <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Subject Code</th>
                    <th scope="col">Date of Exam</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $db = "btts";
                        $conn = new mysqli($host, $user, $pass, $db);
                        $sql = "select course_name, course_code, semester, subject, subject_code, date_of_exam, start_time, end_time from previous_exams"; 
                        
                        $res = $conn->query($sql);
                        if($res->num_rows > 0){
                          $i=1;
                          while($row = $res->fetch_assoc()){
                              print("<tr>");
                              print("<th>$i</th>");
                              print("<td>".$row['course_name']."</td>");
                              print("<td>".$row['course_code']."</td>");
                              print("<td>".$row['semester']."</td>");
                              print("<th>".$row['subject']."</th>");
                              print("<td>".$row['subject_code']."</td>");
                              print("<td>".$row['date_of_exam']."</td>");
                              print("<td>".$row['start_time']."</td>");
                              print("<td>".$row['end_time']."</td>");
                              print("</tr>");
                              $i++;
                          }
                        }
                    ?>
                    
                </tbody>
            </table>
            <div style="margin-bottom:25px; display:grid; place-items:center;">
                <button class="btn btn-outline-primary">Refresh</button>
            </div>
        </div>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>