<?php
	session_start();
	include 'db.php';
	include 'YahooFinance.php';
	$comp=$_REQUEST['comp'];
	$query="SELECT code FROM `foss`.`company` WHERE `name`='$comp';";
	$result=mysqli_query($dbc,$query)or die("Error in query");
	$row=mysqli_fetch_array($result)or die("Error in fetch");
	echo $row['code'];

?>