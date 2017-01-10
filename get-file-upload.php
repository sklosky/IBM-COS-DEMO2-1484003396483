<html>
<head></head>
<body>
<form name="form1" method="post" action="upload-cos-object.php">
<form action="<?=$PHP_SELF?>" method="post" enctype="multipart/form-data"
<br><br>
Enter the bucket name
<br>
<input type="text" name="mybucket">
<br><br>
Choose file to upload
<input type="file" name="myfile">
<br><br>
<input type="submit" name="Submit" value="Submit">
</form>
</body>
</html>


