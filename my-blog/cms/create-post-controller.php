<?php
require ("../connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $author = $_POST['author'];
    $file = $_FILES['file'];

    $exts = ["png", "jpeg", "jpg"];
    print_r($file);
    if ($file['error'] === 0) {
        if ($file['size'] < 25000000) {
            $fileName = $file['name'];
            $nameArray = explode('.', $fileName);
            $ext = $nameArray[count($nameArray) - 1];
            // echo $ext;
            if (in_array($ext, $exts)) {
                $imageName = uniqid() . "img" . time() . "." . $ext;
                
                $id = uniqid();

                $con -> query("INSERT INTO posts (post_id, post_content, post_author, post_image) VALUES ('$id', '$content', '$author', '$imageName')");

                move_uploaded_file($file['tmp_name'], './images/' . $imageName);
                header ("Location: ../post.php?post_id=$id");
            }
        }
    }
} else {
    header ("Location: ../index.php");
}