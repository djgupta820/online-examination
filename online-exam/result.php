<?php 
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
    print("<title>Results</title>");
    error_reporting(0);
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
    <style>
        .bx{
            padding:20px;
            margin: auto;
            width: 55%;
            border:1px solid gray;
            border-radius:10px;
        }
        .bx button{
            margin-left:20px;
        }

    </style>
    <title>Result</title>
</head>
<body>
    <div class="bx">
    <form action="" method="post">
        <label for="course" class="form-group">Select Course: </label>
        <select name="course" id="c" class="form-group">
            <option value="select"> Select </option>
            <?php 
                $conn = new mysqli("localhost", "root", "", "btts");
                $sql = "select Course_name from courses";
                $res = $conn->query($sql);
                if($res->num_rows > 0){
                    while($row = $res->fetch_assoc()){
                        print("<option value='".$row['Course_name']."'> ".$row['Course_name']." </option>");
                    }
                }
            ?>
        </select>
        <label for="sem"> Semester : </label>
        <select name="sem" id="sem" calss="form-group">
            <option value="select"> Select </option>
            <?php 
                for($i=1; $i<=8;$i++){
                    print("<option value='".$i."'>". $i ."</option>");
                }
            ?>
        </select>
        <label for="date"> Select Date </label>
        <select name="date" id="date" class="form-group">
            <option value="select"> Select </option>
            <?php 
                $conn = new mysqli("localhost", "root", "", "btts");
                $sql = "select DISTINCT date_of_exam from results";
                $res = $conn->query($sql);
                if($res->num_rows > 0){
                    while($row = $res->fetch_assoc()){
                        print("<option value='".$row['date_of_exam']."'> ".$row['date_of_exam']." </option>");
                    }
                }
            ?>
        </select>
        <button type="submit" class="btn btn-outline-primary"> Get Result</button>
    </form>
    </div>    
</body>
</html>

<?php
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
    
    function getResult(){
        $conn = new mysqli("localhost", "root", "", "btts");
        $sql = "select 
                s.Course,
                s.Semester,
                r.subject,
                r.date_of_exam, 
                r.student_fullname, 
                r.student_rollno, 
                r.correct_answers, 
                r.incorrect_answers, 
                r.total_marks, 
                r.total_questions, 
                r.left_questions, 
                r.obtained_marks
                from results r, students s WHERE s.Roll_Number = r.student_rollno
                AND s.Course = '".$_POST['course']."' and s.Semester = ".$_POST['sem'] ." and r.date_of_exam='".$_POST['date']."'";

        $res = $conn->query($sql);
        if($res->num_rows > 0){
            $tab = "<body style='background-color:#E5E7E9;'><div class='content' style='background-color:#E5E7E9;padding:20px;'><center> <h1 style='color:#34495E;'>".strtoupper($row['Course']).strtoupper(" Semester ").$row['Semester']." ".strtoupper($row['subject']).strtoupper(" result")."</h1><h6>Dated: ".$row['results.date_of_exam']." </center>
                    <table class='table table-dark table-bordered' style='box-shadow:2px 2px 4px 4px gray;'>
                        <thead>
                            <tr>
                                <td> S. No.</td>
                                <td> Name </td>
                                <td> Enrollment No.</td>
                                <td> Course </td>
                                <td> Semester </td>
                                <td> Subject </td>
                                <td> Date Of Exam </td>
                                <td> Total Questions </td>
                                <td> Questions Unattempted </td>
                                <td> Total Marks </td>
                                <td> Correct Answers </td>
                                <td> Incorrect Answers </td>
                                <td> Obtained Marks </td>
                            </tr>
                        </thead>";
            print($tab);
            
            $i = 0;
            while($row = $res->fetch_assoc()){
                $i++;
                print("<tr>");
                print("<td>". $i ."</td>");
                print("<td>". $row['student_fullname']."</td>");
                print("<td>". $row['student_rollno']."</td>");
                print("<td>". $row['Course']."</td>");
                print("<td>". $row['Semester']."</td>");
                print("<td>". $row['Subject']."</td>");
                print("<td>". $row['date_of_exam']."</td>");
                print("<td>". $row['total_questions']."</td>");
                print("<td>". $row['left_questions']."</td>");
                print("<td>". $row['total_marks']."</td>");
                print("<td>". $row['correct_answers']."</td>");
                print("<td>". $row['incorrect_answers']."</td>");
                print("<td>". $row['obtained_marks']."</td>");
                print("</tr>");
            }
            print("</table> <a href='full-view-exams.php' class='btn btn-outline-primary'> Back </a></div> <body>");
        }
    } 
?>
    

    <?php 
        getResult();
    ?>
    
