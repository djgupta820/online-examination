<?php
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
    error_reporting(E_ERROR | E_PARSE);
    if(!isset($_COOKIE['strollno'])){
        $script = ' <div class="alert alert-danger">
                        Permission Denied! Login Required!
                        <p> Click <a href="login.php"> Here </a> to Login. </p>
                    </div>';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style>
        .grids{
            display:flex;
        }
        .cam{
            float:right;
            right:10px;
        }
        .qp{
            max-width:850px;
        }
        #results { padding:10px; border:1px solid; background:#ccc; height:380px; width:380px; }
    </style>
    <script>
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
                
                var endtime = document.getElementById('etime').innerHTML;
                else if(time >= endtime){
                    document.getElementById('quespaper').submit(); 
                }
            }
            window.onload = function(){
                enableBtn();
            }
    </script>
    <title>Question Paper</title>
</head>
<body>
    <?php
        include('studentnavsys.php');
    ?>
    
    <div class="grids">
        <div class="qp">
            <?php
                /*
                    requirements for question paper
                    1 -> each question must start numeric value e.i 1 and end with a question mark (?)
                    2 -> each option must start with char value e.i a and  end with a dot (.)
                */
                                    
                function putQuestion($filename){
                    $file = fopen($filename, "r");
                    $ctr = 0;
                    print('<div class="container"> <form action="results.php" method="post" name="quespaper">');
                    while(!feof($file)){
                        $line = fgets($file);
                        if(is_numeric($line[0])){
                            $ctr++;
                            print("<h3> $line </h3>");
                            
                            setcookie("ctr", $ctr, time()+(86400*2), "/");
                        }
                        else{
                            print("<p> <input type='radio' name=\"question$ctr\" value=\"$line\"> $line </p>");
                        }
                    }
                    print("<input type='hidden' name='ctr' value=".$ctr.">");
                    print('<input type="hidden" name="ansfile" value=uploads/answers/'.$row['Question_paper_name'].'>');
                    print('<button type="submit" class="btn btn-primary"> Submit </button>');
                    print('</form> </div>');
                }
                    

                $conn = new mysqli("localhost", "root", "","btts");
                $sql = "select Question_paper_name from exams where date_of_exam = '".date("y-m-d")."'";
                $res = $conn->query($sql);
                if($res->num_rows > 0){
                    $row = $res->fetch_assoc();
                }

                chdir(".."); 
                $filename = "uploads/questions/".$row['Question_paper_name'];
                print('<div class="content" style="margin:20px;">');
                putQuestion($filename);
                print('</div>');
                $conn->close();
            ?>
        </div>
        <!-- for camera -->
        <div class="cam">
            <div class="container">
                <form method="POST" action="storeImage.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camer"></div>
                        </div>           
                    </div>
                </form>
            </div>
            <script language="JavaScript">
                Webcam.set({
                    width: 490,
                    height: 390,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                });
            
                Webcam.attach( '#my_camera' );
            
                function take_snapshot() {
                    Webcam.snap( function(data_uri) {
                        $(".image-tag").val(data_uri);
                        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
                    } );
                }
            </script>
            <!--  -->
        </div>
    </div>
</body>
</html>