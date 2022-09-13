<?php
    // echo $_SERVER["REQUEST_METHOD"];
    // print_r($_GET);
    // echo "$_GET[name] $_GET[email] $_GET[password]";

    if ( $_SERVER["REQUEST_METHOD"] === "GET" ) {
        if ( !empty($_GET["name"]) ) {
            echo $_GET["name"] . "<br>";
        } else {
            echo "Enter a name";
        }

        if ( !empty($_GET["email"]) ) {
            echo $_GET["email"] . "<br>";
        } else {
            echo "Enter an email";
        }

        if ( !empty($_GET["password"]) ) {
            echo $_GET["password"] . "<br>";
        } else {
            echo "Enter a password";
        }
    }
?>