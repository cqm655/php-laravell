<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | My Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="nav bg-dark text-light">
        <a href="../index.php">Main</a>
        <a href="./login.php">Login</a>
    </nav>
    <div class="main">
        <h1>Register</h1>
        <div class="container">
            <form action="register-controller.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="login" placeholder="Login">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
            <a href="./login.php">Login</a>
        </div>
    </div>
</body>
</html>