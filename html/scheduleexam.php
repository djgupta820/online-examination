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
            <form action="">
              <div class="form-group">
                <label for="course">Select Course</label>
                <select name="course" class="form-control" required>
                  <option value="sel">Select</option>
                  <option value="bca">BCA</option>
                  <option value="bsc">BSC</option>
                </select>
              </div>
              <div class="form-group">
                  <label for="semester">Select Semester</label>
                  <select name="semester" class="form-control" required>
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
              <div class="form-group">
                <label for="sub">Subject</label>
                <input type="text" class="form-control" name="sub" id="sub" required>
              </div>
              <div class="form-group">
                <label for="subcode">Subect Code</label>
                <input type="text" class="form-control" name="subcode" id="subcode" required>
              </div>
              <div class="form-group">
                <label for="stime">Start Time</label>
                <input type="text" class="form-control" name="stime" id="stime" placeholder="12:00:00" required>
              </div>
              <div class="form-group">
                <label for="etime">End Time</label>
                <input type="text" class="form-control" name="etime" id="etime" placeholder="12:00:00" required>
              </div>
              <div class="form-group">
                <label for="extype">Exam Type</label>
                <select name="extype" id="extype" class="form-control" required>
                  <option value="sel">select</option>
                  <option value="subj">Subjective</option>
                  <option value="obj">Objective</option>
                </select>
              </div>
              <button class="btn btn-primary">Next</button>
            </form>
        </div>
        <?php
            include("footer.php");
        ?>
    </div>
</body>
</html>