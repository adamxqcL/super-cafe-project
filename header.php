<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HEADER</title>
</head>
<body>
</body>
<?php
    //extract($_POST);

    //connect to server

$connect = mysqli_connect("localhost","root","","super_cafe_project");

if(!$connect){
    die('ERROR: '.mysqli_connect_error());
}

?>
</body>
</html>