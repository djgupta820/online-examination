<?php 
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
    if(isset($_POST['submit'])){
        //print_r($_FILES['fileToUpload']);
        $filename = $_FILES['fileToUpload']['name'];
        $temp_dir = $_FILES['fileToUpload']['tmp_name'];
        $target_dir = "uploads/".$filename;
        $filetype = $_FILES['fileToUpload']['type'];
        chdir("..");
        if(move_uploaded_file($temp_dir, $target_dir)){
            $msg = '<div class="alert alert-success" role="alert">
                        file uploaded successfully!
                    </div>';
            print($msg);
        }
        else{
            $msg = '<div class="alert alert-danger" role="alert">
                        Error while uploading file!
                    </div>';
            print($msg);
        }
    }
?>