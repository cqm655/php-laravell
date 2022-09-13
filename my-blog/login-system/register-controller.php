<?php
require ("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $email = $_POST['email'];
    // password_hash()
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id = uniqid();

    $con -> query("INSERT INTO users (user_id, user_login, user_password, user_email) VALUES ('$id', '$login', '$password', '$email')");
    header ("Location: ./login.php");
} else {
    header ("Location: ../index.php");
}