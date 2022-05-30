<?php
require("../connection.php");
$post_id=$_GET['post_id'];

$con->query("DELETE from posts where post_id='$post_id'");
header("location: ./cms-index.php");
?>