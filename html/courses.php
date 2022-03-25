<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
</head>
<body>
    <?php
        include("navsys.php");
    ?>
    <div style="margin-left:250px;">
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Courses</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Courses
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
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for($i=1; $i<15; $i++)
                        {
                            print("<tr>");
                            print("<th scope='row'>$i</th>");
                            print("<td>Mark</td>");
                            print("<td>Otto</td>");
                            print("<td>@mdo</td>");
                            print("<th scope='row'>$i</th>");
                            print("<td>Mark</td>");
                            print("<td>Otto</td>");
                            print("<td>@mdo</td>");
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