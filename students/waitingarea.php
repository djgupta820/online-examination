<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        center h2{
            background-color:black;
            color:white;
            padding:5px;
            border-radius:8px;
        }
        .box{
            min-width: 250px;
            min-height:250px;
            border:1px solid gray;
            border-radius:10px;
            width:fit-content;
            padding:10px;
            margin:10px;
            position:relative;
            place-items:center;
        }
        .box:hover{
            box-shadow:2px 2px 2px gray;
        }
        .box label{
            margin-top:5px;
            margin-bottom:5px;
        }
        </style>
        <script>            
            var x = 0
            //Enable start button
            setInterval(enableBtn, 1000);
            function enableBtn(){
                const timeNow = new Date();

                var hoursOfDay = timeNow.getHours();
                var minutes = timeNow.getMinutes();
                var seconds = timeNow.getSeconds();
                var weekDay = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
                var today = weekDay[timeNow.getDay()];
                var months = timeNow.toLocaleString("default", {
                    month: "long"
                });
                var year = timeNow.getFullYear();
                var period = "AM";

                if (hoursOfDay > 12) {
                    hoursOfDay-= 12;
                    period = "PM";
                }

                if (hoursOfDay === 0) {
                    hoursOfDay = 12;
                    period = "AM";
                }

                hoursOfDay = hoursOfDay < 10 ? "0" + hoursOfDay : hoursOfDay;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                var time = hoursOfDay + ":" + minutes + ":" + seconds;
                
                var strtime = document.getElementById('stime').innerHTML;
                if(time == strtime){
                    addElement();
                    document.getElementById('startBtn').removeAttribute("disabled");
                }
                else if(time >= strtime){
                    document.getElementById('startBtn').removeAttribute("disabled");
                }
            }
            window.onload = function(){
                enableBtn();
            }

            function addElement(){
                var ele = document.getElementById('aldiv');
                const msg = document.createTextNode('You Can Start Your Exam');
                ele.appendChild(msg);
                ele.classList.add("alert");
                ele.classList.add("alert-success");
            }
        </script>
    <title>Waiting Area</title>
</head>
<body>
    <p style="margin:10px;">Scheduled Exams</p>
    <div id=aldiv> </div>
    <div style="display:flex; align-items:center;">
        <?php
            error_reporting(E_ERROR | E_PARSE);
            if(!isset($_COOKIE['strollno'])){
                $script = " <div class='alert alert-danger'>
                                <p> Permission Denied! Login Required! </p>
                                Click <a href='login.php'> Here </a> to login.
                            </div>";
                print($script);
                exit();
            }

            $host = "localhost";
            $user = "root";
            $passwd = "";
            $db = "btts";
            $conn = new mysqli($host, $user, $passwd, $db);
            if($conn->connect_error){
                die("Connection Error");
            }
            else{
                $sql = "select course_name, subject, subject_code, date_of_exam, start_time, 
                        end_time, Question_paper_name
                        from exams
                        where date_of_exam = '".date("y-m-d")."'";
                $res = $conn->query($sql);
                if($res->num_rows > 0){
                    $i=1;
                    while($row = $res->fetch_assoc()){
                        
                        $bx = ' <div class="box">
                                    <label class="text-muted"> Course Name: </label> '.$row['course_name'].'<br>
                                    <label class="text-muted"> Subject: </label> '.$row['subject'].'<br>
                                    <label class="text-muted"> Subject Code: </label> '.$row['subject_code'].'<br>
                                    <label class="text-muted"> Date of Exam: </label> '.$row['date_of_exam'].'<br>
                                    <label class="text-muted"> Start Time: </label> <span id="stime">'.$row['start_time'].'</span><br>
                                    <label class="text-muted"> End Time: </label> '.$row['end_time'].'<br>
                                    <div class="d-grid gap-2">
                                        <form action="question-paper.php" method="post">
                                            <input type="hidden" class="form-control" name="quespaper" value="'.$row['Question_paper_name'].'"/>
                                            <button disabled type="submit" class="btn btn-success" style="margin-top:15px;" id="startBtn"> Start </button>
                                        </form>
                                    </div> 
                                </div>';
                        print($bx);
                    }
                }
                else{
                    $script = " <div class='alert alert-warning'>
                                    No exam is schdeduled for today!
                                </div>";
                    print($script);
                }
            }
        ?>
    </div>
</body>
</html>