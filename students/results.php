<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title> 0<?php print($_COOKIE['strollno']); ?> Results</title>
</head>
<body>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        if(!isset($_COOKIE['strollno'])){
            $script = ' <div class="alert alert-danger">
                            Permission Denied! Login Required!
                            <p> Click <a href="login.php"> Here </a> to Login. </p>
                        </div>';
            print($script);
            exit();
        }

        include('studentnavsys.php');
    ?>
    
    <?php

        function insertData($correct, $incorrect, $marks){
            $conn = new mysqli("localhost", "root", "", "btts");
            $sql1 = "select Course, Semester from students where Roll_Number = ".$_COOKIE['strollno']; 
            $res = $conn->query($sql1);
            $row = $res->fetch_assoc();
            $stc = $row['Course'];
            $ssm = $row['Semester'];

            $sql2 = "select subject from exams where date_of_exam='".date("y-m-d")."'";
            $res2 = $conn->query($sql2);
            $row = $res->fetch_assoc();
            $subj = $row['subject'];
            //print("<script>alert('Subject: ".$subj."')</script>");
            $sql = "insert into results(
                        date_of_exam, 
                        student_fullname, 
                        student_rollno,	
                        correct_answers, 
                        incorrect_answers, 
                        total_marks, 
                        total_questions, 
                        left_questions, 
                        obtained_marks, 
                        subject, 
                        submitted_at,
                        course, 
                        semester
                    )
                    values(
                    '".date("y-m-d").
                    "','".$_COOKIE['stfname']." ".$_COOKIE['stlname'].
                    "',".$_COOKIE['strollno'].
                    ",".$correct.
                    ",".$incorrect.
                    ",".$_POST['ctr'].
                    ",".$_POST['ctr'].
                    ",".$_POST['ctr'] - (int)($correct + $incorrect).
                    ",".$correct.
                    ",'".$subj.
                    "','".date("h:i:s").
                    "','".$stc.
                    "',".$ssm.")";
            try {
                if($conn->query($sql)){
                    $scrpt = "  <div class='alert alert-success'>
                                    <p>Your Exam has been finished. You can close the window.</p>
                                </div>";
                    print($scrpt);
                }
                else{
                    $scrpt = "  <div class='alert alert-danger'>
                                    <p>Your Exam has been finished. Error submitting Your exam.</p>
                                    <p> Please contact your college </p>
                                </div>";
                    print($scrpt);
                }
            } catch (mysqli_sql_exception $th) {
                $error_code = $th->errorInfo[1];
                if($th->getMessage() == "Duplicate entry '".$_COOKIE['strollno']."' for key 'PRIMARY'"){
                    $scrpt =   "<div class='alert alert-danger'>
                                    <p> Message: </p>
                                    <p> An exam was submitted with this <b> Enrollment Number </b> </p>
                                    <p>Cannot submit another! </p>
                                </div>";
                    print($scrpt);
                    exit();
                }
                $scrpt = "      <div class='alert alert-danger'>
                                    <p> Message: </p>
                                    <p> ".$th->getMessage()." </p>
                                </div>";
                    print($scrpt);
                    exit();
            }
        }

        chdir("..");

        $file = fopen("uploads/answers/answer.txt", "r");
        $answer = array();
        while(! feof($file)){
            $line = fgets($file);
            array_push($answer, $line);
        }
            
        $table = "<table class='table' style='max-width:1340px;'>
                    <thead class='table-dark'>
                        <tr>
                            <td>S. No.</td>
                            <td>Your Answer</td>
                            <td>Correct Answer</td>
                            <td class='alert'>Remark</td>
                        </tr>
                    </thead>
                    <tbody>";
        print($table);
        
        $right = 0;
        $wrong = 0;
        for($i=0; $i<$_POST['ctr']; $i++){
            $q = "quest".$i;
            print("<tr>");
            print("<td> $i </td>");
            $ques = 'question'.$i+1;
            print("<td> $_POST[$ques] </td>");
            print("<td> $answer[$i] </td>");
            if($_POST[$ques] == $answer[$i]){
                print("<td class='alert alert-success'> <b> Right </b> </td>");
                $right++;
            }
            else{
                print("<td class='alert alert-danger'> <b> Wrong </b> </td>");
                $wrong++;
            }
        }
        fclose($file);
        print("</tbody> </table>"); 
        $scrpt = "
        <div class='alert alert-info'>
            <p>Correct Answers: $right</p>
            <p>Incorrect Answers: $wrong</p>
            <p>Total: ".$right+$wrong."</p>
        </div>";
        print($scrpt);
        if(($right+$wrong) >= 3){
            print("<p class='alert alert-success'>Overall Result: Pass</p>");
        }
        else{
            print("<p class='alert alert-danger'>Overall Result: Fail</p>");
        }
        $tablename = "results";
        $correct = $right;
        $incorrect = $wrong;
        $marks = $right+$wrong;
        insertData($correct, $incorrect, $marks);
        /*if(isset($_POST['question1'])){
            print("true");
        }
        else{
            print("false");
        } */
    ?>
</body>
</html>