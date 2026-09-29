<!DOCTYPE html>
<html>
<body>
echo phpinfo();
<form method="POST" enctype="multipart/form-data" action="/upload.php">
    <input type="hidden" id="directory" name="directory" value="">
    <input type="file" id="uploaded_files" name="uploaded_files" multiple>
    <input type="submit">
</form>
<?php 
echo "aa"
?>
</body>
</html>
