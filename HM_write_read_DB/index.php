<?php
include 'header.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Main Page</title>
    
</head>
<body>
    <form action="index.php" method="POST">
     
        <h3>Car Sharing Formular:</h3>
        <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label">Brand</label>
           </div>
              <div class="col-auto">
                  <input type="text" class="form-control" name="brand">
                </div>
        </div>
        <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label">Model</label>
           </div>
              <div class="col-auto">
                  <input type="text" class="form-control" name="model">
                </div>
        </div>
        <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label">Car Number</label>
           </div>
              <div class="col-auto">
                  <input type="text" class="form-control" name="car_number">
                </div>
        </div>
        <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label">Owner Data</label>
           </div>
              <div class="col-auto">
                  <input type="text" class="form-control" name="owner_data">
                </div>
        </div>
        <button type="submit"  class="btn btn-primary" name="btn">Submit</button>
        
    </form>
    
    
    <?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $car_number = $_POST['car_number'];
    $owner = $_POST['owner_data'];

   
   if(empty($brand) || empty($model) || empty($car_number) || empty($owner)){
       echo "insert data";
   } else {
             $sql = "INSERT INTO cars (brand,model, nr_inmatriculare,proprietar) VALUES ('$brand','$model','$car_number','$owner')";
           
             if(mysqli_query($connection,$sql)){
              echo "new record added";
           } 
      mysqli_close($connection);
      if(isset($_POST['btn'])){
        header('Location: show_cars.php');
    }
        } 
        
   }     
    ?>


</body>
</html>

