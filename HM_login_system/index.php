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
                    $_SESSION["userID"] = $data["id"];
                    $_SESSION["user_name"] = $data["user_name"];
                    $messSucces = "ok";
                    header("Location: succes_page.php");
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
  
    <div class="container" id="container">
        <div class="form">
            <div class="form-container sign-up-container">
		<form action="/register.php" method="POST">
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" name="user_name" placeholder="Name" required/>
			<input type="email" name="user_email" placeholder="Email" required/>
			<input type="password" name="user_password" placeholder="Password" required />
			<button type="submit">Sign Up</button>
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
</body>
<script src="app.js"></script>
</html>

<?php


?>