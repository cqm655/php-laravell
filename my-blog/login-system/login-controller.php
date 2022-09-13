<?php
require ("../connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    // password_hash()
    $password = $_POST['password'];

    $result = $con -> query ("SELECT * FROM users WHERE user_login = '$login' LIMIT 1");
    
    if ($result -> num_rows >= 1) {
        $user = $result -> fetch_assoc();
        if (password_verify($password, $user['user_password'])) {
            $_SESSION['user_logged_in'] = "admin";
        }
        
    }
    header ("Location: ../index.php");
} else {
    header ("Location: ../error.php");
}