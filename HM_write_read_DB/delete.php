<?php
require 'connection.php';

$sql = "DELETE from `cars` where id=".$_GET['id'];
    
        $connection->query($sql);
        header("Location: show_cars.php");

        ?>