<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/JavaScript">
        function disableBtn(){
            var x = document.getElementById('btn');
            x.disabled = true;
        }
        function enableBtn(){
            var x = document.getElementById('btn');
            var y = document.getElementById('chk');
            if(y.checked == true){
                x.disabled = true;
            }
            else{
                x.disabled = false;
            }
            
        }
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

            var time = hoursOfDay + ":" + minutes + ":" + seconds;
            
            document.getElementById('Clock').innerHTML = time;   

            }
            window.onload = function(){
                displayTime();
            }
    </script>
    <title>Test Page</title>
</head>
<body>
    <p id="Clock"></p>
    
</body>
</html>