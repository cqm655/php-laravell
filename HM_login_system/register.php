<?php
require 'connect_DB.php';
$login = $pass = $pass1 = $passDontMatch = $passMatch = $passMail = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST['user_name']) || empty($_POST['user_password']) || empty($_POST['user_password_check'] || empty($_POST['user_email']))) {
        echo "insert data";
    } else {
        $login = $_POST['user_name'];
        $mail = $_POST['user_email'];
        $pass = $_POST['user_password'];
        $pass1 = $_POST['user_password_check'];




        if (  !preg_match("[abc] ", $login) && $pass != $pass1) {
            $_SESSION['logPassError'] = "errorC";
            header("Location: index.php");
        } else if (!preg_match("[abc]", $login) && strlen($login)>=1  ) {
            $_SESSION['loginError'] = "errorA";
            header("Location: index.php");
        } else if($pass != $pass1){
            $_SESSION['passError'] = 'errorB';
            header("Location: index.php");
        } else{

            $sql = "INSERT INTO users (user_name, user_password, user_email) values ('$login','$pass','$mail')";

            $conn->query($sql);
            header("Location: succes_page.php");
        }
    }
}
