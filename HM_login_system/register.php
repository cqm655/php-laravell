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

        // validate password
        $number = preg_match('@[0-9]@', $pass);
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $specialChars = preg_match('@[^\w]@', $pass);
        //  verify login and mail in DB
        $select = "select * from users";
        $result =  $conn->query($select);

        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {

                $DB_user = $data["user_name"];
                $DB_mail = $data["user_email"];

                if (($DB_user === $login)) {

                    $_SESSION['db_user'] = 'user_exist';
                    header("Location: index.php");
                } else if ($DB_mail === $mail) {

                    $_SESSION['db_mail'] = 'mail_exist';
                    header("Location: index.php");
                } else {

                    if (!preg_match("[a-zA-Z]", $login) && $pass != $pass1 && (strlen($pass) < 8 || !$number) || (!$uppercase) || (!$lowercase) || (!$specialChars)) {

                        $_SESSION['logPassError'] = "error_on_user_&_pass";
                        header("Location: index.php");
                    } else if (!preg_match("[a-zA-Z]", $login) && strlen($login) <= 6) {

                        $_SESSION['loginError'] = "error_on_login";
                        header("Location: index.php");
                    } else if ($pass != $pass1) {

                        $_SESSION['passError'] = 'error_on_pass';
                        header("Location: index.php");
                    } else {

                        $sql = "INSERT INTO users (user_name, user_password, user_email) values ('$login','$pass','$mail')";

                        $conn->query($sql);
                        header("Location: succes_page.php");
                    }
                }
            }
        }
        $conn->close();
    }
}
