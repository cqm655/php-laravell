<?php
session_start();
require("./connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>MY Blog</title>
</head>
<body>
    <nav class="bg-dark text-align">
        <a href="./index.php">Main</a>
        <?php 
           if(isset($_SESSION['user_logged_in'])){
            echo "<a href=`./login-system/logout.php`>Logout</a>";
        } else {
            echo "<a href=`./login-system/login.php`>Login</a>";
        }

        if($_SESSION['user_logged_in'] === 'abc123admin'){
            echo "<a href=`./cms/cms-index.php`>CMS</a>";
        } else {
            echo '<a href=`./login-system/login.php">Login</a>';
        }
        ?>
        <a href="./login-system/login.php">Login</a>
     </nav>
    <div class="main">
        <h1>Welcome to My Blog</h1>
        <?php
           $result = $con -> query("SELECT * from posts");

           if($result -> num_rows>0){
                while($row= $result-> fetch_assoc()){
                    echo "<div class='container botder m-3' height='150px'>
                    <img src='cms/images/$row[post_image]'>
                    <p> $row[post_author]</p>
                    <a href='post.php?post_id=$row[post_id]' class='btn btn-primary'>See post</a>
                    </div>"
                }
           } else {
               echo "<p> No Posts fro now </p>";           }

        ?>
    </div>
</body>
</html>