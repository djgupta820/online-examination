<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .other{
            margin-left:50px;
            margin-right:50px;
            color:white;
            display:inline;
        }
    </style>
    <script>
        setInterval(displayTime, 1000);
        function displayTime() {

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
            var time = hoursOfDay + ":" + minutes + ":" + seconds+" "+period;
            document.getElementById('Clock').innerHTML = time;   

            }
            window.onload = function(){
                displayTime();
            }

            
            
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../assets/images/bttslogo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
            BTTS, DBTI
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="main.php">Exams <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="logouts.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
        <div class="other">
            <span>
                <?php
                    error_reporting(E_ERROR | E_PARSE);
                    print('<div id="Clock"> </div>'); 
                    print($_COOKIE['stfname']." ".$_COOKIE['stlname']." (0".$_COOKIE['strollno'].")"); 
                ?>
            </span>            
        </div>
    </nav>
    
</body>
</html>