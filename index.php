
<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://weatherbit-v1-mashape.p.rapidapi.com/forecast/3hourly?lat=47.01&lon=28.86",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: weatherbit-v1-mashape.p.rapidapi.com",
		"X-RapidAPI-Key: 75cd2d2564msh2f67024f346f72bp1d88a0jsn1f969453e9a5"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
$data = '';
curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	// echo $response;
    $data = json_decode($response,true);
}
print_r($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <div class="container">
    <div class="title">
        <h1 class="title_text">My Weather app</h1>
        <div class="weather-body">
        <span>City: Chisinau</span>
        <br>
        <hr>
        <span>Temperature: <?php print_r($data['data'][0]['temp']); ?> </span>
        <br>
        <hr>
        <span>Humidity: <?php print_r($data['data'][0]['weather']['description']); ?></span>
        <br>
        <hr>
        <span>Chance of rain: <?php print_r($data['data'][0]['precip']); ?>%</span>
        <br>
        <hr>
        <span>Wind direction: <?php print_r($data['data'][0]['wind_cdir']); ?></span>
        <br>
        <hr>
        <span>Wind speed: <?php print_r($data['data'][0]['wind_gust_spd']); ?> m/s</span>
    </div>
    </div>
    
   </div>
</body>
</html>
