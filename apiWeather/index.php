<?php
$error = '';
$data ='';
if(!empty($_GET['city'])){
  $curl = curl_init();
    
  curl_setopt_array($curl, [
    CURLOPT_URL => 'https://bestweather.p.rapidapi.com/weather/'.$_GET['city'].'/today?unitGroup=us',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: bestweather.p.rapidapi.com",
        "X-RapidAPI-Key: 75cd2d2564msh2f67024f346f72bp1d88a0jsn1f969453e9a5"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response, true);
}
// print_r($data['currentConditions']['temp']);
}


if(!empty($data)) {
      
$error = "City not found";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
   <div class="containerr">
    <div class="title">
        <h1 class="title_text">My Weather app</h1>
        <div class="weather-body">
        <form action="index.php" method="GET" class="form-group">
            <span>City:</span> 
            <input type="text" name="city" required minlength="3" >
            <button type="submit" class="btn btn-outline-success">Go</button>
        </form>
        <span class="badge-danger"><?php echo $error ?></span>
        <hr>
        <br>
        <span>Temperature: </span> <h4><?php if(!empty( $data['currentConditions']['temp'])){echo print_r($data['currentConditions']['temp']);}  ?></h4>
        <span>Date: </span> <h4><?php if(!empty( $data['currentConditions']['datetime'])){ echo print_r($data['currentConditions']['datetime']); }?></h4>
        <span>Feels: </span> <h4><?php if(!empty( $data['currentConditions']['feelslike'])){ echo print_r($data['currentConditions']['feelslike']);} ?></h4>
        <span>Humidity: </span> <h4><?php if(!empty( $data['currentConditions']['humidity'])){echo print_r($data['currentConditions']['humidity']);} ?></h4>
        <span>Chance of rain: </span> <h4><?php if(!empty( $data['currentConditions']['precip'])){echo print_r($data['currentConditions']['precip']);} ?></h4>
        <span>Wind speed: </span> <h4><?php  if(!empty( $data['currentConditions']['windspeed'])){ echo print_r($data['currentConditions']['windspeed']);} ?></h4>
        <span>Condition: </span> <h4><?php if(!empty( $data['currentConditions']['conditions'])){ echo print_r($data['currentConditions']['conditions']); }?></h4>
    </div>
    </div>
   </div>
</body>
</html>

