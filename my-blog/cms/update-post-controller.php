<?php
   
     session_start();
     $id=$_GET['post_id'];
     require ("../connection.php");
     
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
         $author = $_POST['author'];
         $content = $_POST['content'];
        //  $file = $_FILES['file'];

        //  $exts = ["png", "jpeg", "jpg"];
        //  print_r($file);
        //  if ($file['error'] === 0) {
        //      if ($file['size'] < 25000000) {
        //          $fileName = $file['name'];
        //          $nameArray = explode('.', $fileName);
        //          $ext = $nameArray[count($nameArray) - 1];
        //          // echo $ext;
        //          if (in_array($ext, $exts)) {
        //              $imageName = uniqid() . "img" . time() . "." . $ext;
                     
                     $con -> query("UPDATE posts set post_author='$author',
                                  post_content='$content' where post_id='$id'");
     
                     move_uploaded_file($file['tmp_name'], './images/' . $imageName);
     }
     

     header("Location:./cms-index.php");
             
            
        
    
?>