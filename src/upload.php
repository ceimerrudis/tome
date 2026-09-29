<!DOCTYPE html>
<html>
<body>
<?php
    $status = 0;
    $main_file_dir = "/var/www/tome/data/";
    $sub_folder = $_POST['directory'] ?? '';

    $target_dir = realpath($main_file_dir . $sub_folder);
    if($target_dir === false || !str_starts_with($main_file_dir . DIRECTORY_SEPERATOR, ))
    {
        http_response_code(400);
        exit('Invalid directory');
    }
    
    if(!isset($_FILES["uploaded_files"]))
    {
        http_response_code(400);
        exit('Upload files not provided');
    }

    foreach($_FILES['uploaded_files']['tmp_name'] as $key => $tmpName) 
    {
        if(&& $_FILES["uploaded_files"]["error"] == 0) 
        {
            $fname = $_FILES["uploaded_files"]["name"][$key];
            $fextension = pathinfo($fname, PATHINFO_EXTENSION);
            
            $hashed_fname = hash("sha256", $fname);    
            
            $file_name = $target_dir . '/' . $hashed_fname . '.' . $fextension;
        
            if (file_exists($target_dir . $file_name)) {
                echo "File already exists";//TODO check if contents match
            }        
            else {
                if (move_uploaded_file($key, $file_name)) {
                    echo "ok";
                } 
                else {
                    echo "ERROR";
                    $status = 1;
                }
            }
    
            if($status == 0)
            {
                //connect to SQL and save metadata like image name and folder
            }
            $status = 0;
        }
    }
?>
</body>
</html>
