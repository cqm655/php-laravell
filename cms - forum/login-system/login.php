<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login | My Blog</title>
</head>
<body>
<nav class="bg-dark text-align">
<a href="../index.php">Home</a>
   <a href="./login.php">Login</a>
   
</nav>
    <div class="main">
        <h1>Login</h1>
        <div class="container">
            <form action="login-controller.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-controll" name="login" placeholder="login">
                    <input type="password" class="form-controll" name="password" placeholder="password">
                    <button type="submit" class=" btn btn-success" >Login</button>
                    <a href="./register.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>