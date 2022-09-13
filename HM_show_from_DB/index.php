<?php
       $connection = new mysqli("localhost", "root", "", "jysk");

       if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
 

      $sql = "SELECT * FROM `products`";
      $result=$connection->query($sql);
      echo "id   " . "Tip   "  . "Numar   ". "<br>";
      if($result->num_rows > 0){
          while($data = $result->fetch_assoc()){
              
              echo $data["id"]."  ".$data["Tip"]."   ".$data["Numar"]."<br>";
          }
      }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JYSK</title>
</head>
<body>
    <?php
       
    ?>
    
</body>
</html>