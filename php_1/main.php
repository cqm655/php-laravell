<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 1</title>
</head>
<body>
    <h1>PHP</h1>

    <?php 
    echo "hello world!";
    echo "<br>";
    
    $car1 = "volvo xc60";
    $car2 = "audi S7";
    $car3 = "skoda wrs";
    $wishList = array("prima masina"=> $car1, "a doua " => $car2, "a treia" => $car3);
    var_dump($wishList);
    echo "<br>";

    $laptopBrand = "Asus";
    $name = "Ion";

    echo $name . " are " . " laptop " . $laptopBrand;

    $name ="Maria";
    $surname ="Rusu";
    $surname2 ="Ursu";
    echo "<br>";
    echo $name . " " . $surname;
    echo "<br>";
    echo $name . " " . $surname = str_replace($surname, $surname2, $surname);

    $pass = "unudoitrei";
    echo "<br>";
    echo $pass = "pass " . strrev($pass) . "<br>";

    $adress = "Petru Zadnipru";
    echo $adress = "adresa " . strrev($adress);
    
  
    ?>
</body>
</html>