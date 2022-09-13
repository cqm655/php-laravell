<?php

    require ("../connection.php");
    

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Users- My Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
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
        <?php
            $result = $con -> query ("SELECT * FROM users");

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    echo "<div class='row p-2'>
                             <div class='col-sm'>
                        <a href='./delete_user_controller.php?user_id=$row[user_id]'>$row[user_login]   
                        </a>
                    </div>
                    </div>
                    ";
                    
                }
            } else {
                echo "<p>No users for now</p>";
            }
        ?>
    </div>


</body>
</html>

<?php

?>