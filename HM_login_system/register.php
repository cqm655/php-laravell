<?php
require 'connect_DB.php';
$login=$pass=$pass1=$passDontMatch=$passMatch="";


if($_SERVER["REQUEST_METHOD"] === "POST"){
    
   
   
       if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password1']))
       {
           echo "insert data";
           
       } else {
           $login = $_POST['username'];
           $pass = $_POST['password'];
           $pass1 = $_POST['password1'];

           if($pass != $pass1){
            $passDontMatch= "Password dont match";
            echo $pass . "  " . $pass1;
          } else {
              $passMatch ="Password match";
              $sql = "INSERT INTO connect (username, password) values ('$login','$pass')";
   
               $conn->query($sql);
               header("Location: succes_page.php");
           }
          }   
   }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background: yellow;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    
<div class="login position-relative position-absolute top-50 start-50 translate-middle">
<h1>Register new user</h1>
    <div class="container ">
        <form action="register.php" method="POST">
            Enter username:
            <div class="mb-3">
               <input type="text" name="username" placeholder="insert username"> <br>
            </div>
            Enter password:
            <div class="mb-3">
               <input type="password" name="password" placeholder="insert password"> <br>
            </div>
            
            <div class="mb-3">
            <span style="color: red"><?php  echo $passDontMatch; ?></span> <br>
            <span style="color: green"><?php  echo $passMatch; ?></span> <br>
               <input type="password" name="password1" placeholder="insert password"> <br>
            </div>
            <button type="submit" class="btn btn-outline-success" >OK</button>
            
        </form>
        <a href="./index.php">Already registered?</a>       
    </div>
    </div>
</body>
</html>

<?php


?>