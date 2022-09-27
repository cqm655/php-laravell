<?php
session_start();

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
    <div class="nav-bar">
        <div class="logo">
            <span class="title">Deezer Search</span>
        </div>
    </div>
    <section>
        <!-- background area -->
        <div class="bg-img" id="bg-img">
            <div class="bg-text">
                <div class="title-search">
                    <h2>Search By:</h2>
                </div>
                <form action="api.php" method="post">
                    <div class="checkbox">
                        <input class="inputSyle" type="text" placeholder="name" name="name">
                        <input class="inputSyle" type="text" placeholder="genre" name="genre">
                        <button type="submit" class="formBtn" >Search</button>
                    </div>
                </form>
            </div>
            <div class="showContent">
                



                <table id="content">
                    
                    <tr>
                        <th>Name</th>
                        <th>Genre</th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- end background area -->
        <?php
        // second argument for making as an array
$value = json_decode($_SESSION['response'],true);

foreach($value as $key => $v){
//    print_r($value['data']); 

}
// get parameters from url 
$url_components = parse_url($v);
parse_str($url_components['query'], $params);
// get value from parameter
$len = $params['index'];

while($len>0){
     echo   '<h1>'.$value['data'][$len-1]['title'] . '</h1><br><hr>';
     $len--;
}
   


?>
    </section>
</body>

</html>

<?php
$_SESSION['response'] = '';

?>