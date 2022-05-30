<?php
    $post_id = $_GET['post_id'];

    // echo $post_id;
    require ("./connection.php");

    $result = $con -> query ("SELECT * FROM posts WHERE post_id = '$post_id' LIMIT 1");

    if ($result -> num_rows === 1) {
        $post = $result -> fetch_assoc(); // assoc array
    } else {
        header ("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .image {
            width: 100%;
            height: 80vh;
            background-color: lightgray;
            background-image: <?php echo "url(cms/images/$post[post_image])"; ?>;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <div class="container p-3">
        <a href="./index.php" class="btn btn-success">Main</a>

        <div class="image">

        </div>
        <p><?php echo $post['post_content']; ?></p>
        <p>- <em><?php echo $post['post_author']; ?></em></p>
    </div>
</body>
</html>