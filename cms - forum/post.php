<?php
$post_id = $_GET['post_id'];

require("./connection.php");

$result = $con->query("SELECT * from posts where post_id= '$post_id' LIMIT 1" );

if($result->num_rows === 1){
    $post = $result ->fetch_assoc();
} else {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Post</title>
    <style>
        .image{
            width: 100%;
            height: 60vh;
            background-color: lightgray;
            background-image: <?php echo "url(cms/images/$post[post_image])"; ?>;
            background: cover;
            background-position: center; 
        }
    </style>
</head>

<body>
<div class="container p-3">
<a href="index.php" class="btn btn-success">Main</a>

<div class="image">

</div>
<p><?php echo $post['post_content']; ?></p>
<p>- <em><?php echo $post['post_author']; ?></em></p>
</div>

   
</body>
</html>