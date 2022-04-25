<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .flex-container {
        display: flex;
        }
        .box-r{
            color:white;
            background-color:#1C2833;
            text-align:center;
        }
        .box-r h1{
            margin:150px;
            border-bottom:5px solid white;
            padding:10px;
        }
        .flex-container > div {
        min-width:650px;
        }    
        .frm{
            padding-left:50px;
            padding-bottom:20px;
            padding-top:10px;
        }
    </style>
    <script>
        function validatePassword(){
            var pass = document.getElementById(pass);
            var cpass = document.getElementById(cpass);
            if(pass != cpass){
                alert("Passowrd and Confirm Password did not matched!");
                return false;
            }
            else{
                return true;
            }
        }
        validatePassword();
    </script>
    <title>Registration</title>
</head>
<body class="content">
    <div class="flex-container">
        <div class="box-r" style="border-right:5px solid blue;">
            <h1>Registration Form</h1>
            <h2>Bosco Technical Training Society,</h2>
            <h2>Don Bosco Technical Institute</h2>
        </div>

        <div class="frm">
            <form action="register.php" method="post">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="John" name="fname" required>
                    <label for="floatingInput">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Doe" name="lname" required>
                    <label for="floatingInput">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="floatingInput" placeholder="2000-04-17" name="dob" required>
                    <label for="floatingInput">Date of Birth (yyyy-mm-dd)</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Okhla" name="address" required>
                    <label for="floatingInput">Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="1234567890" name="phone" required>
                    <label for="floatingInput">Mobile Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="01228402015" name="rollno" required>
                    <label for="floatingInput">Roll Number</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="course" id="course" class="form-select" required>
                        <option value="selectcourse">Select Course</option>
                        <?php 
                            $host = "localhost";
                            $user = "root";
                            $passwd = "";
                            $db = "btts";
                            $conn = new mysqli($host, $user, $passwd, $db);
                            if($conn->connect_error){
                                die("Connection Error");
                            }
                            else{
                                $sql = "select course_name from courses";
                                $res = $conn->query($sql);
                                if($res->num_rows > 0){
                                    while($row=$res->fetch_assoc()){
                                        print("<option value='".$row['course_name']."'>".$row['course_name']."</option>");
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-floating mb-3">
                    <select name="sem" id="sem" class="form-select" required>
                        <option value="selectsem">Select Semester</option>
                        <?php 
                            for($i=1;$i<=8;$i++){
                                print("<option value=".$i.">".$i."</option>");
                            }
                        ?>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cpass" required>
                    <label for="floatingPassword">Confirm Password</label>
                </div>
                <button type="submit" class="btn btn-outline-primary" onclick="validatePassword();"> Register </button>
            </form>
        </div>
    </div>
</body>
</html>