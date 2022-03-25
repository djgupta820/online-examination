<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/bttslogo.png"
    />
    <style>
      .sel{
        padding:20px;
        margin:20px;
        display:inline;
      }
    </style>
    <title>Student List</title>
</head>
<body>
    <?php
        include("navsys.php");
    ?>
    <div style="margin-left:250px;">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Student List</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Students
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="sel">
            <form action="">
              <div class="form-group">
                <label for="course">Select Course</label>
                <select name="course" class="form-control">
                  <option value="sel">Select</option>
                  <option value="bca">BCA</option>
                  <option value="bsc">BSC</option>
                </select>
              </div>
              <div class="form-group">
                  <label for="semester">Select Semester</label>
                  <select name="semester" class="form-control">
                  <option value="sel">Select</option>
                  <option value="First">First</option>
                  <option value="Second">Second</option>
                  <option value="third">Third</option>
                  <option value="forth">Forth</option>
                  <option value="fifth">Fifth</option>
                  <option value="sixth">Sixth</option>
                  <option value="seven">Seventh</option>
                  <option value="eight">Eighth</option>
                </select>
              </div>
              <button class="btn btn-primary">Fetch</button>
            </form>
          </div>
            <table class="table table-hover table-bordered table-dark" style="box-shadow:3px 2px 2px gray;">
                <thead>
                    <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Course</th>
                    <th scope="col">Roll Number</th>
                    <th scope="col">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for($i=1; $i<15; $i++)
                        {
                            print("<tr>");
                            print("<th>$i</th>");
                            print("<td>Mark</td>");
                            print("<td>Otto</td>");
                            print("<td>17/04/2000</td>");
                            print("<th>Dakshinpuri</th>");
                            print("<td>9810685369</td>");
                            print("<td>BCA</td>");
                            print("<td>01228402019</td>");
                            print("<td>Sixth</td>");
                            print("</tr>");
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>