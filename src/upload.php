<!DOCTYPE html>
<html>
<body>
<?php

	$target_dir = "/var/www/tome/data/";
	$target_file = $target_dir . "a_";
	$uploadOk = 1;
echo '<pre>';
print_r($_FILES);
print_r($_SERVER);
echo '</pre>';
echo exec('whoami');
    echo "begin";
    if(isset($_FILES["myFile"]) && 
    $_FILES["myFile"]["error"] == 0) {

    echo "inif";
        $file_name = $target_file . $_FILES["myFile"]["name"];
    
    echo "fname_got";
        if (file_exists($target_dir . $file_name)) {
    
    echo "fex";
        }        
        else {
            if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file)) {
                echo "success";
            } 
            else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

?>
</body>
</html>
