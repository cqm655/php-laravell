<?php

include 'header.php';


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $car_nr = $_POST['car_number'];
        $owner = $_POST['owner_data'];
        
        $sql = "UPDATE cars set brand='$brand', model='$model', nr_inmatriculare='$car_nr',
               proprietar='$owner' where id='$id'";
        $connection->query($sql);
        header("Location: show_cars.php");
    } else {
        $sql = "SELECT * from `cars` where id = " . $_GET['id'];
        $result = $connection->query($sql);
        $client = $result -> fetch_assoc();
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Show-Cars</title>
</head>
<body>

  <div class="container">
      <form action="./update.php" method="POST">
          
          <input type="hidden" name="id" value="<?php echo $client['id'] ?>">
          <input  type="text" class="form-control m-2" name="brand" value="<?php echo $client['brand']?>">
          <input type="text" class="form-control m-2" name="model" value="<?php echo $client['model']?>">
          <input type="text" class="form-control m-2" name="car_number" value="<?php echo $client['nr_inmatriculare']?>">
          <input type="text" class="form-control m-2" name="owner_data" value="<?php echo $client['proprietar']?>">
          <button  class="btn btn-outline-success m-2">OK</button>
          <a type="button" href="./delete.php?id=<?php echo $client['id']?>"  class="btn btn-outline-danger" onclick="del()">DELETE</a>
      </form>
  </div>

  






</body>
</html>