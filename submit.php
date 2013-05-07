<?php
	session_start();
	include 'db.php';
	$name=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];
	$query="SELECT * FROM `foss`.`user` WHERE `username`='$name' and `pass`='$pass'";
	$result=mysqli_query($dbc,$query) or die("Login query error");
	$row=mysqli_num_rows($result);
	if($row == 1)
	{
		$_SESSION['user']=$name;
		echo 1;
	}
	else
		echo 0;
?>