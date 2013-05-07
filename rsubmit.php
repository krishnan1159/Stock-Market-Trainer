<?php
session_start();
include 'db.php';

$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];

$query="INSERT INTO `foss`.`user` VALUES('$user','$pass','$name','$email');";
mysqli_query($dbc,$query) or die("0");
$query="INSERT INTO `foss`.`profile` VALUES('$user','10000.00','');";
mysqli_query($dbc,$query) or die("1");
echo 1;
?>