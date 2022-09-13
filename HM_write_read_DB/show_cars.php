<?php

include 'header.php';

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

    

    <?php
    
          $sql = "SELECT * FROM cars";
          $result=$connection->query($sql);
          if($result->num_rows > 0){
              while($data = $result->fetch_assoc()){
                  ?>
                  <form action="update.php" method="POST">
                  <div class="showData">
                  <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label"></label>
           </div>
              <div class="col-auto hidden">
                  <input type="hidden" class="form-control" name="brand" value="<?php echo $data['id']?>">
                </div>
        </div>
                  <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label">Brand</label>
           </div>
              <div class="col-auto">
                  <input type="text" class="form-control" name="brand" value="<?php echo $data['brand']?>">
                </div>
        </div>
        <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label">Model</label>
           </div>
              <div class="col-auto">
                  <input type="text" class="form-control" name="model" value="<?php echo $data['model']?>">
                </div>
        </div>
        <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label">Car Number</label>
           </div>
              <div class="col-auto">
                  <input type="text" class="form-control" name="car_number" value="<?php echo $data['nr_inmatriculare']?>">
                </div>
        </div>
        <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label  class="col-form-label">Owner Data</label>
           </div>
              <div class="col-auto">
                  <input type="text" class="form-control" name="owner_data" value="<?php echo $data['proprietar']?>">
                </div>
        </div>
                  <a href="./update.php?id=<?php echo $data['id']?>" class="btn btn-primary">EDIT</a>
                  </form>
                  
                </div>
                <?php
              }
          }
    ?>





</body>
</html>