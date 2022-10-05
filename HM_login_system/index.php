<?php
require "connect_DB.php";

$userName = $password = $usermess = $userpass = $messSucces = "";
$user = "";
$pass = "";



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (empty($_POST["user_name"]) || empty($_POST["user_password"])) {
        $usermess = "insert data";
        $messSucces = "insert data";
    } else {

        $select = "SELECT * FROM users";
        $result =    $conn->query($select);

        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {

                $user = $data["user_name"];
                $pass = $data["user_password"];
                if (($user === $_POST['user_name']) && ($pass === $_POST['user_password'])) {
                    $messSucces = "SUCCES";
                } else {
                    $messSucces = "Error";
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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <title>Login</title>
</head>

<body>

    <!-- the login form -->
    <div class="container" id="container">
        <div class="form">
            <div class="form-container sign-up-container">
                <form action="register.php" method="POST">
                    <h1>Create Account</h1>
                    <span>or use your email for registration</span>
                    <input type="text" name="user_name" id="user_name" placeholder="Name" required />
                    <input type="email" name="user_email" id="user_email" placeholder="Email" required />
                    <input type="password" name="user_password" id="user_password" placeholder="Password" required />
                    <input type="password" name="user_password_check" id="user_password_check" placeholder="Reenter password" required />

                    <button type="submit" id="btn">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="index.php" method="POST">
                    <h1>Sign in</h1>
                    <span>or use your account</span>
                    <input type="text" name="user_name" placeholder="insert username" required>
                    <input type="password" name="user_password" placeholder="insert password" required>
                    <a href="#">Forgot your password?</a>
                    <button type="submit">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button type="submit" class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- get the error message -->
    <input type="hidden" id="loginError" value='<?php echo $_SESSION['loginError'] ?>'>
    <input type="hidden" id="passError" value='<?php echo $_SESSION['passError'] ?>'>
    <input type="hidden" id="logPassError" value='<?php echo $_SESSION['logPassError'] ?>'>
    <input type="hidden" id="db_user" value='<?php echo $_SESSION['db_user'] ?>'>
    <input type="hidden" id="db_mail" value='<?php echo $_SESSION['db_mail'] ?>'>

</body>
<script src="app.js"></script>
<script>
    const login = document.getElementById("loginError").value;
    const passMatch = document.getElementById("passError").value;
    const logPassError = document.getElementById("logPassError").value;
    const db_user = document.getElementById("db_user").value;
    const db_mail = document.getElementById("db_mail").value;

    let a = '';

    if (login == 'error_on_login') {
        a = 1;
    }

    if (passMatch == 'error_on_pass') {
        a = 2;
    }

    if (logPassError == 'error_on_user_&_pass') {
        a = 3;
    }

    if (db_user == 'user_exist') {
        a = 4;
    }

    if (db_mail == 'mail_exist') {
        a = 5;
    }

    switch (a) {

        case 1:
            window.onload = () => {
                const signUpButton1 = document.getElementById('signUp');
                const container1 = document.getElementById('container');
                document.getElementById('user_name').placeholder = "must have min 6 ch, a-Z";
                document.getElementById('user_name').style.border = "1px solid red";
                container1.classList.add("right-panel-active");
            };
            break;

        case 2:
            window.onload = () => {

                const signUpButton2 = document.getElementById('signUp');
                const container2 = document.getElementById('container');
                document.getElementById('user_password').placeholder = "pass don`t";
                document.getElementById('user_password').style.border = "1px solid red";
                container2.classList.add("right-panel-active");

                const signUpButton3 = document.getElementById('signUp');
                const container3 = document.getElementById('container');
                document.getElementById('user_password_check').placeholder = "pass don`t";
                document.getElementById('user_password_check').style.border = "1px solid red";
                container3.classList.add("right-panel-active");
            };

            break;

        case 3:
            window.onload = () => {
                const signUpButton1 = document.getElementById('signUp');
                const container1 = document.getElementById('container');
                document.getElementById('user_name').placeholder = "must have min 6 ch, a-Z, 0-9";
                document.getElementById('user_name').style.border = "1px solid red";
                container1.classList.add("right-panel-active");

                const signUpButton2 = document.getElementById('signUp');
                const container2 = document.getElementById('container');
                document.getElementById('user_password').placeholder = "pass don`t";
                document.getElementById('user_password').style.border = "1px solid red";
                container2.classList.add("right-panel-active");

                const signUpButton3 = document.getElementById('signUp');
                const container3 = document.getElementById('container');
                document.getElementById('user_password_check').placeholder = "pass don`t";
                document.getElementById('user_password_check').style.border = "1px solid red";
                container3.classList.add("right-panel-active");
            };
            break;

        case 4:
            window.onload = () => {
                const signUpButton4 = document.getElementById('signUp');
                const container4 = document.getElementById('container');
                document.getElementById('user_name').placeholder = "username exist";
                document.getElementById('user_name').style.border = "1px solid red";
                container4.classList.add("right-panel-active");
            };
            break;

        case 5:
            window.onload = () => {
                const signUpButton5 = document.getElementById('signUp');
                const container5 = document.getElementById('container');
                document.getElementById('user_email').placeholder = "mail exist";
                document.getElementById('user_email').style.border = "1px solid red";
                container5.classList.add("right-panel-active");
            };
            break;
    }
</script>

</html>

<?php
$_SESSION['loginError'] = '';
$_SESSION['passError'] = '';
$_SESSION['logPassError'] = '';
$_SESSION['exist'] = '';
$_SESSION['db_user'] = '';
$_SESSION['db_mail'] = '';
?>