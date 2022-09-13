<?php
    session_start();
     $post_id = $_GET['post_id'];

     require ("../connection.php");
  

     $result = $con -> query ("SELECT * FROM posts WHERE post_id = '$post_id' LIMIT 1");

     if ($result -> num_rows === 1) {
         $post = $result -> fetch_assoc(); // assoc array
         
     } else {
         echo "error";
     }

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
        .image {
            width: 30%;
            height: 30vh;
            background-color: lightgray;
            background-image: <?php echo "url(images/$post[post_image])"; ?>;
            background-size: cover;
            background-position: center;
        }
    </style>
    <style>
        .img_container{
            width: 200px;
            height: 150px;
        }
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
        <div class="container p-3">
        <a href="./cms-index.php" class="btn btn-dark">CMS Main</a>

        <form action="./update-post-controller.php?post_id=<?php echo $post_id?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                Change content: <textarea type="text" class="form-control" name="content" placeholder="Content"
                ><?php echo $post['post_content'] ?></textarea>
            </div>
            <div class="form-group">
               Change author:  <input type="text" class="form-control" name="author" placeholder="Author" 
                value= <?php echo $post['post_author'] ?>>
            </div>
           <!-- Change photo:  <a href="update-photo.php" class="image" ><div class="image"></div></a> -->
           <!-- <div class="form-group">
               Change author:  <input type="file" class="form-control" name="file" placeholder="Author" 
                value= <?php echo $post['post_author'] ?>>
            </div> -->
        
            <button type="submit" class="btn btn-success">Update post</button>
            
        </form>
    </div>
</body>
</html>




