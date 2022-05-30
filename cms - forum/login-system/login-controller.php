<?php

require("../connection.php");
session_start();

if($_SERVER['REQUEST_METHOD'] === "POST"){
   
    $login = $_POST['login'];
    $password = $_POST['password'];

    $result = $con -> query("select * from users where user_login = '$login' limit 1");

    if($result->num_rows>=1){
        $user=$result->fetch_assoc();
        if(password_verify($password, $user['user_passsword'])){
            $_SESSION['user_logged_in'] = $user['user_id'];
        }
    }

    header("Location: ./login.php");
} else {
    header("Location: ../index.php");
}