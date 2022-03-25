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
                    <th scope="col">Year</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Subject Code</th>
                    <th scope="col">Date</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for($i=1; $i<15; $i++)
                        {
                            print("<tr>");
                            print("<th>$i</th>");
                            print("<td>BCA</td>");
                            print("<td>011</td>");
                            print("<td>Third</td>");
                            print("<th>Sixth</th>");
                            print("<td>C++</td>");
                            print("<td>BCA 152</td>");
                            print("<td>".date("Y/m/d")."</td>");
                            print("<td>".date("h:i:sa")."</td>");
                            print("<td>".date("h:i:sa")."</td>");
                            print("<td><a href='#'>Details</a></td>");
                            print("</tr>");
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