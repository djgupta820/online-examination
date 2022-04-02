<?php
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
    function getExamDetails(){
        
        $course = $_POST['course'];
        $sem = $_POST['semester'];
        $subj = $_POST['sub'];
        $subj_code = $_POST['subcode'];
        $stime = $_POST['stime'];
        $etime = $_POST['etime'];
        $etype = $_POST['extype'];
        //print($etype);
        if($etype === "objective"){
            print("<div class='container' style='margin-top:20px;'>");
        }
        else{
            //print("Subjective selected");
        }
    }

    getExamDetails();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <div class="Container" style="margin-top:20px;">
        <form action="upload.php" method="post" class="form-group" enctype="multipart/form-data">
            <label for="file"> <h1>Upload File </h1></label>
            <input type="file" name="fileToUpload" class="form-control" id="fileToUpload"><br>
            <button tupe="button" class="btn btn-primary btn-sm" name="submit" style="margin-top:20px;">Done</button>
        </form>
    </div>
</body>
</html>
