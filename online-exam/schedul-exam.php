<?php
    error_reporting(E_ERROR | E_PARSE);
    print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
        
        $course = $_POST['course'];
        $sem = $_POST['semester'];
        $subj = $_POST['sub'];
        $subj_code = $_POST['subcode'];
        $stime = $_POST['stime'];
        $etime = $_POST['etime'];
        $etype = $_POST['extype'];
        $doe = $_POST['dateofexam'];
        
        function uploadFile(){
            if(isset($_COOKIE['tusername'])){
                $filename = $_FILES['fileToUpload']['name'];
                $newfilename = $_POST['course']."_".$_POST['semester']."_".$_POST['sub']."_".date("Ymd").date("his").".txt";
                rename($filename, $newfilename);
                $temp_dir = $_FILES['fileToUpload']['tmp_name'];
                $target_dir = "uploads/".$newfilename;
                $filetype = $_FILES['fileToUpload']['type'];
                chdir("..");
                if(move_uploaded_file($temp_dir, $target_dir)){
                    $msg = '<script> 
                                alert("File Uploaded Successfully!");
                            </script>';
                    print($msg);
                    return true;
                }
                else{
                    $msg = '<script> 
                                alert("Error Uploading File!!");
                            </script>';
                    print($msg);
                    return false;
                }
            }
        }
        
        if(uploadFile()){
            $conn = new mysqli('localhost', 'root', '', 'btts');
            $filename = $_POST['course']."_".$_POST['semester']."_".$_POST['sub']."_".date("Ymd").date("his").".txt";
            $sql = "insert into exams(
                    course_name, semester, subject, subject_code, date_of_exam, 
                    start_time, end_time, scheduled_by, exam_type, Question_paper_name
                    ) 
                    values('".$course."',".$sem.",'".$subj."','".$subj_code."','".$doe."','".$stime."','".$etime."','".$_COOKIE['tfname']." ".$_COOKIE['tlname']."','".$etype."','".$filename."')";

            if($conn->query($sql)){
                $script = " <script> 
                                alert('Exam Scheduled Successfully!');
                                window.open('question-paper.php', '_self');
                            </script>";
                print($script);
            }
            else{
                $script = " <script> 
                                alert('Error Scheduling Exam!');
                                window.open('schedule-exam.php', '_self');
                            </script>";
                print($script);
            }

        }
?>