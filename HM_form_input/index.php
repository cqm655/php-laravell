
<?php 
$messName=$messSurname=$messAge=$message="";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!empty($_POST["name"])){

    }
   else {
    $messName="Insert Name !!!";
   }
   if(!empty($_POST["surname"])){

   }
   else {
    $messSurname="Insert Surname !!!";
   }
   if(!empty($_POST["age"])){
    
   }
   else {
    $messAge="Insert age !!!";
   }
   if(empty($_POST["name"]) && empty($_POST["surname"]) && empty($_POST["age"])){
       $message = "Completed";
   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>HM_input_form</title>
</head>
<body>
    <?php if(empty($message)) {?>
    <form action="index.php" method="POST">
    <h2>Complete Formular</h2>
        <div class="mb-3">
    <input type="text" class="form-control" name="name" placeholder="insert name... ">
    <span class="spanStyle"><?php echo $messName ?></span>

    <input type="text" class="form-control" name="surname" placeholder="insert surname... ">
    <span class="spanStyle"><?php echo $messSurname ?></span>
    <input type="number" class="form-control" name="age" placeholder="insert age... ">
    <span class="spanStyle"><?php echo $messAge ?></span>
  </div>
  <button type="submit" class="btn btn-primary"  >
 Submit
</button>
    </form>
<?php } else {?>
       <h3><?php echo $message ?> </h3>
   <?php } ?>

</body>
</html>






