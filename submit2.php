<?php session_start(); ?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="script/jquery-latest.js"></script>
<br>
<?php
$user=$_SESSION['user'];
include 'db.php';
$company=trim($_REQUEST['comp']);
//echo $company;
$query="SELECT `code` from `foss`.`company` WHERE `name`='$company'";
$result=mysqli_query($dbc,$query) or die("View Query Error");
$row=mysqli_fetch_array($result);
$code=$row['code'];
//echo $code;
//We have got the code now//

$query="SELECT `string` FROM `foss`.`profile` WHERE `username`='$user'";
$result=mysqli_query($dbc,$query) or die("Query 2 Error");
$row=mysqli_fetch_array($result)or die("Fetch 2 Error");
$stock=$row['string'];
// We have got the string now//

$stock=json_decode($stock,true);
if(isset($stock[$code]))
{
	echo "<br>";
	echo "<h2> Stock Info Of ".$company."</h2>";
	echo "<table class='table table-bordered table-hover span10'><tr><th>Base Price</th><th>No. Of Shares</th><th>Date of Purchase</th></tr>";
	foreach ($stock[$code] as $key => $value) 
	{
		echo "<tr>";
		foreach ($value as $key1 => $value1) {
			echo "<td>";
			echo $value1;
			echo "</td>";
			# code...
		}
		echo "</tr>";
	}
	echo "</table>";

}
else
	echo "<h1> You Have not Purchased this Stock </h1>";
//print_r($stock);
?>