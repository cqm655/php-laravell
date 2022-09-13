<?php
    $nameMessage = $emailMessage = $passMessage = "";
    $userMessage = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST["name"])) {
            
        } else {
            $nameMessage = "Introdu un nume";
        }

        if (!empty($_POST["email"])) {
            //
        } else {
            $emailMessage = "Introdu un email";
        }

        if (!empty($_POST["password"])) {
            //
        } else {
            $passMessage = "Introdu o parola";
        }

        if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            $userMessage = "$_POST[name], bine ai venit!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP</h1>

    <!-- <h3><?php echo $userMessage ?></h3> -->

    <?php if (empty($userMessage)) { ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" placeholder="Name...">
            <span><?php echo $nameMessage ?></span>
            <br>
            <input type="email" name="email" placeholder="E-Mail...">
            <span><?php echo $emailMessage ?></span>
            <br>
            <input type="password" name="password" placeholder="Password...">
            <span><?php echo $passMessage ?></span>
            <br>
            <button type="submit">Trimite</button>
        </form>
    <?php } else { ?>
        <h3><?php echo $userMessage ?></h3>
    <?php } ?>




















    <?php
        // $number = 19;

        // if ( $number > 18 ) {
        //     echo "Poti cumpara alcool";
        // } else if ( $number === 18 ) {
        //     echo "Welcome!";
        // } else {
        //     echo "Esti prea mic";
        // }

        // $message = $number > 18 ? "Poti cumpara alcool" : "Esti prea mic";

        // echo $message;

        // print ($number > 18) ? "Poti cumpara alcool" : "Esti prea mic";

        // $month = "July";

        // switch ($month) {
        //     case "June":
        //         echo "Prima luna a verii";
        //         break;
        //     case "July":
        //         echo "Happy birthday!";
        //         break;
        //     case "August":
        //         echo "Ultima luna :(";
        //         break;
        //     default:
        //         echo "idk";
        // }

        // $x = 1;

        // while ($x <= 5) {
        //     echo $x . " ";
        //     $x++;
        // }

        // $x = 0;

        // do {
        //     echo $x . " ";
        //     $x++;
        // } while ($x <= 5);

        // $x = 0;

        // for ($x = 1; $x <= 5; $x++) {
        //     if ($x % 2 === 0) {
        //         break;
        //     } else {
        //         echo $x . " ";
        //     }
        // }

        // $colors = ["red", "green", "blue"];

        // foreach ($colors as $color) {
        //     echo "$color <br>";
        // }

        // $companies = ["company_1" => "Google", "company_2" => "Amazon", "company_3" => "Facebook"];

        // foreach ($companies as $number => $company_name) {
        //     echo "$number - $company_name <br>";
        // }

        // function greeting (int $age, $name = "User") {
        //     return "Hello $name, you are $age years old";
        // }

        // echo greeting ("19");

        $cars = ["Honda", "Porsche", "BMW"];
        // sort($cars);
        // rsort($cars);
        // print_r($cars);
        // echo "<br>";
        // var_dump($cars);

        $people = ["person_1" => "Ion Rusu", "person_2" => "John Doe", "person_3" => "Andrei."];
        // asort($people);
        // arsort($people);
        ksort($people);
        // krsort($people);
        // print_r($people);
        
        // function sum () {
        //     $GLOBALS["number"] = 2 + 2;
        // }

        // sum ();
        // echo $number;

        // print_r($_SERVER);
        // echo $_SERVER["PHP_SELF"];
        // echo "<br>";
        // echo $_SERVER["SERVER_NAME"];
        // HTTP_HOST
        // HTTP_REFERER
        // HTTP_USER_AGENT
        // SCRIPT_NAME
        // REQUEST_METHOD
    ?>

</body>
</html>