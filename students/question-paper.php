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
                    $ans = 0;
                    $op = 0;
                    $file = fopen($filename, "r");
                    print("<form action='results.php' method='post'>");
                    while(!feof($file)){
                        $line = fgets($file);
                        if(is_numeric($line[0])){
                            print("<h4>$line</h4>");
                        }
                        else if(substr($line, 0, 5) == "Answer"){
                            print('<input type="hidden" name="answer" value="'.$line.'">');
                        }
                        else{
                            $op++;
                            $ans++;
                            if($op === 5){
                                $op = 0;
                            }
                            $script  = "<div> 
                                            <p> <input type='radio' name='".$op."ques'> " .$line."</p>
                                        </div>
                                        ";
                            $op++;
                            print($script);
                        }
                        $ans++;
                    }
                    print("</form>");
                    
                    
                    /*print("<div class='content'>");
                    print("<form action='results.php' method='post'>");
                    
                    while(!feof($file)){
                        print('<div class="">');
                        $line = fgets($file);
                        if(is_numeric($line[0])){
                            print("<div style='padding-left:20px;'> <h3>".$line."</h3> </div>");
                        }
                        else{
                            $op++;
                            if($op === 5){
                                $op = 0;
                            }
                            $inp = "<div style='padding-left:30px;>' 
                                        <div class='form-check'>
                                            <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                                            <label class='form-check-label' for='flexRadioDefault1' name=\"option$op\">
                                            $line
                                            </label>
                                        </div>
                                    </div>";
                            print($inp);
                        } 
                        //print('</div>');
                    }*/
                    print("<button type='submit' class='btn btn-primary' style='margin:40px;'> Submit </button>");
                }

                
                chdir(".."); 
                $filename = "uploads/".$_POST['quespaper'];
                print('<div class="content" style="margin:20px;">');
                    putQuestion($filename);
                print('</div>');
            ?>
        </div>
        <!-- for camera -->
        <div class="cam">
            <div class="container">
                <form method="POST" action="storeImage.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="my_camera"></div>
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