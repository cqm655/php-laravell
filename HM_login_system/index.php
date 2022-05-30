<?php
   require "connect_DB.php";

   $userName=$password=$usermess=$userpass=$messSucces="";
   $user = "";
   $pass = "";

  

   if($_SERVER["REQUEST_METHOD"] === "POST"){
  
    if(empty($_POST["username"]) || empty($_POST["password"])){
        $usermess = "insert data";
        $messSucces= "insert data";
    } else {

        $select = "SELECT * FROM connect";
        $result =    $conn->query($select);
        
        if($result->num_rows>0){
            while($data = $result->fetch_assoc()){
                
                $user=$data["username"];
                $pass=$data["password"];
                if(($user === $_POST['username']) && ($pass === $_POST['password'])){
                    $messSucces="SUCCES";
                    $_SESSION["userID"]=$data["id"];
                    $_SESSION["userName"]=$data["username"];
                    $messSucces = "ok";
                    header("Location: succes_page.php");
                } else {
                   $messSucces="Error";
                    
                }
            }   
        }
        $conn->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body{
           background: green; 
        }
        .login{
            background: white;
            padding: 20px;
            
        }
        .alert{
            color: red;
            padding: 1px;
            top: 10px;
        }
    </style>
</head>
<body>
    <div class="login position-relative position-absolute top-50 start-50 translate-middle">
    <div class="container ">
        <form action="index.php" method="POST">
            <div class="mb-3">
            
               <input type="text" name="username" placeholder="insert username"> <br>
               <span class="alert"><?php echo $usermess ?></span> <br>
            </div>
            <div class="mb-3">
            <span ><?php echo $userpass ?></span>
               <input type="password" name="password" placeholder="insert password"> <br>
               <span class="alert"><?php echo $messSucces ?></span>
            </div><br>
            
            <br>
            <button type="submit" class="btn btn-outline-success" >OK</button>
            <a href="./register.php">Not registered?</a><br>
          
        </form>
    </div>
    </div>
</body>
</html>

<?php


?>


