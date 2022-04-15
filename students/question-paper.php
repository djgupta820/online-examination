<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script>
        
    </script>
    <title>Question Paper</title>
</head>
<body>
    <?php
        /*
            requirements for question paper
            1 -> each question must start numeric value e.i 1 and end with a question mark (?)
            2 -> each option must start with char value e.i a and  end with a dot (.)
        */
        error_reporting(E_ERROR | E_PARSE);
        if(!isset($_COOKIE['strollno'])){
            $script = ' <div class="alert alert-danger">
                            Permission Denied! Login Required!
                            <p> Click <a href="login.php"> Here </a> to Login. </p>
                        </div>';
            print($script);
            exit();
        }
            
        function putQuestion($filename){
            $ans = 0;
            $op = 0;
            $file = fopen($filename, "r");
            print("<div class='content'>");
            print("<form action='' method='post'>");
            while(!feof($file)){
                $line = fgets($file);
                if(is_numeric($line[0])){
                    print("<div style='padding-left:20px;'> <h3>".$line."</h3> </div>");
                }
                else{
                    $op++;
                    if($op === 5){
                        $op = 0;
                    }
                    $inp = "<div style='padding-left:30px;' class='form-group'>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                    <label class='form-check-label' for='flexRadioDefault1' name=\"option$op\">
                                    $line
                                    </label>
                                </div>
                            </div>";
                    print($inp);
                } 
            }
            print("<button class='btn btn-primary' style='margin:40px;'> Submit </button>");
            print("</form>");
            print("</div>");
        }

        if($_POST == null){
            print("Post is Null");
        }
        //include('studentnavsys.php');
        //chdir(".."); 
        print_r("<br>".$_GET);
        /*$filename = "uploads/".$_POST['quespaper'];
        print($filename);
        print($filename);
        print_r($_SESSION);
        print('<div class="content" style="margin:20px;">');
            putQuestion($filename);
        print('</div>');*/
    ?>
</body>
</html>