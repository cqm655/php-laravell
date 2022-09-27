<?php
session_start();
$_SESSION['response'] = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $url = 'https://api.deezer.com/search?q='.$_POST['name'];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
      'X-RapidAPI-Host: api.deezer.com',
      'X-RapidAPI-Key: access_token',
      'Content-Type: application/json'
    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    $data2 = json_decode($response);
    // print_r($data2->data[4]->title);
    
    

    $_SESSION['response'] = $response;
    $response = '';
    header("Location: index.php");
}

?>
