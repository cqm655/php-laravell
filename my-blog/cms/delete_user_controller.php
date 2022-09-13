<?php
require("../connection.php");
$user_id=$_GET['user_id'];

$con->query("DELETE from users where user_id='$user_id'");
header("location: ./cms-index.php");
?>