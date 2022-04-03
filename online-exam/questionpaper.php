<?php
    /*
        requirements for question paper
        1 -> each question must start numeric value e.i 1 and end with a question mark (?)
        2 -> each option must start with char value e.i a and  end with a dot (.)
    */

    function read_file_docx($filename){  
        $striped_content = '';  
        $content = '';  
        if(!$filename || !file_exists($filename)) return false;  
        $zip = zip_open($filename);  
        if (!$zip || is_numeric($zip)) return false;  
        while ($zip_entry = zip_read($zip)) {  
        if (zip_entry_open($zip, $zip_entry) == FALSE) continue;  
        if (zip_entry_name($zip_entry) != "word/document.xml") continue;  
        $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));  
        zip_entry_close($zip_entry);  
        }// end while  
        zip_close($zip);  
        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);  
        $content = str_replace('</w:r></w:p>', "\r\n", $content);  
        $striped_content = strip_tags($content);  
        return $striped_content;  
    }
    
    function createTextFile($filename){
        $content = read_file_docx($filename);
        $file = fopen($filename.".txt", 'w');
        fwrite($file, $content);
        fclose($file);
    }

    function putQuestion($filename){
        $ans = 0;
        $op = 0;
        $file = fopen($filename, "r");
        print('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');
        print("<class=\"container\" style='margin:20px;'>");
        print("<form action='' method='post'>");
        while(!feof($file)){
            $line = fgets($file);
            if(is_numeric($line[0])){
                print("<h3>".$line."</h3>");
            }
            else{
                $op++;
                if($op === 5){
                    $op = 0;
                }
                $inp = "<div class='form-check'>
                            <input class='form-check-input' type='radio' name='flexRadioDefault' id='flexRadioDefault1'>
                            <label class='form-check-label' for='flexRadioDefault1' name=\"option$op\">
                            $line
                            </label>
                        </div>";
                print($inp);
            } 
        }
        print("<a href='index.php' class='btn btn-primary'> Home </a>");
        print("</form>");
        print("</div>");
    }

    chdir(".."); 
    $filename = "uploads/quespaper.txt";
    putQuestion($filename);

?>