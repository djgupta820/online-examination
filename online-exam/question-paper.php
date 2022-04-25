<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/bttslogo.png">
    <style>
        body{
            background-color:#F2F3F4 ;
        }
        .sp{
            border:1px solid gray;
            border-radius:10px;
            padding:10px;
            width:fit-content;
            margin-top:20px;
            margin-bottom:20px;
            box-shadow:2px 2px 2px gray;
        }
        h1{
            border-bottom: 1px dotted gray;
            padding-bottom:10px;
            text-align:center;
        }
    </style>
    <title>Question Paper</title>
</head>
<body class="container" id="container" style="margin-left:15px;margin-right:15px;">
    <h1>Bosco Technical Training Society</h1>
    <?php
        /*
            requirements for question paper
            1 -> each question must start numeric value e.i 1 and end with a question mark (?)
            2 -> each option must start with char value e.i a and  end with a dot (.)
        */
        error_reporting(E_ERROR | E_PARSE);

        function putQuestion($filename){
            $file = fopen($filename, "r");
            $ctr = 0;
            print('<div class="container"> <form action="students/results.php" method="post">');
            while(!feof($file)){
            $line = fgets($file);
            if(is_numeric($line[0])){
                print("<h3> $line </h3>");
                $ctr++;
            }
            else{
                print("<p> <input type='radio' name=\"question$ctr\" value=\"$line\"> $line </p>");
            }
            }
            print('</form> </div>');
        }
                
        chdir(".."); 
        $filename = "uploads/questions/quespaper.txt";
        putQuestion($filename);
        print('<div style="margin-bottom:20px;"> <a href="index.php" class="btn btn-primary"> Home </a> </div>');
    ?>  
</body>
</html>
