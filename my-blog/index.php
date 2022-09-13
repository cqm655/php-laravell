<?php
    session_start();
    require ("./connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        img {
            transition-duration: 0.5s;
            opacity: 0.8;
        }

        img:hover {
            transition-duration: 0.5s;
            opacity: 1;
        }
    </style>
</head>
<body>
    <nav class="nav bg-dark text-light">
        <a href="./index.php" class="p-3">Main</a>
        <?php
            if (isset($_SESSION['user_logged_in'])) {
                echo "<a href='./login-system/logout.php' class='p-3'>Logout</a>";
                
                if ($_SESSION['user_logged_in'] === "admin") {
                    echo "<a href='./cms/cms-index.php' class='p-3'>CMS</a>";
                }
            } else {
                echo '<a href="./login-system/login.php" class="p-3">Login</a>';
            }
        ?>
    </nav>
    <div class="main">
        <h1>Welcome to My Blog</h1>
        <?php
            $result = $con -> query ("SELECT * FROM postsimages");

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    echo "<div class='container border m-3'>
                        <a href='post.php?post_id=$row[post_id]' class=''><img src='cms/images/$row[post_image]' height='150px'></a>
                    </div>
                    ";
                }
            } else {
                echo "<p>No posts for now</p>";
            }
        ?>
    </div>
</body>
</html>