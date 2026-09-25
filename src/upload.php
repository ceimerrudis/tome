<!DOCTYPE html>
<?php

	$target_dir = "/tome/persistent/";
	$target_file = $target_dir . "a_";
	$uploadOk = 1;
	
	echo $_SERVER;
	echo $_FILES;
	
    if(isset($_FILES["myFile"]) && 
    $_FILES["myFile"]["error"] == 0) {

        $file_name = $target_file . $_FILES["fileToUpload"]["name"];
    
        if (file_exists($target_dir . $file_name)) {
    
        }        
        else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
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
