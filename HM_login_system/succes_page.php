<?php
require 'connect_DB.php';
echo "Succes" . "<br>";

echo "Welcome dear ". $_SESSION["userName"] ."<br>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succes</title>
</head>
<body>
    <a href="./index.php">Go To Main Page</a>
</body>
</html>