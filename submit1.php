<?php
session_start();

$user=$_SESSION['user'];
//$user='krishnan1159';
include 'db.php';
$code=$_REQUEST['code'];
$bp=$_REQUEST['bp'];
$num=$_REQUEST['num'];
$amount=$bp*$num;

$query="SELECT * from `foss`.`profile` WHERE `username`='$user'";
$result=mysqli_query($dbc,$query) or die("Query Execution Error");
$row=mysqli_fetch_array($result) or die("Query Fetch Error");
$stock=$row['string'];
$amount=$row['money']-$amount;
if($amount < 0)
	return 2;
$stock=json_decode($stock,true);
date_default_timezone_set("Asia/Calcutta");
$d=date('y-m-d h-i-s');
//$stock=trim($stock);
//echo $stock;
if(empty($stock))
{
	$stock=array($code=>array(array("bp"=>$bp,"num"=>$num,"date"=>$d)));
}
else
{
	if(isset($stock[$code]))
	{
		array_push($stock[$code],array("bp"=>$bp,"num"=>$num,"date"=>$d));
	}
	else
	{
		$temp=array($code=>array(array("bp"=>$bp,"num"=>$num,"date"=>$d)));
		$stock+=$temp;
	}
}

//ESSENTIAL COMMENTS//

/*$code=trim("MSFT");
$bp=24;
$num=5;

$stock = array($code=>array(array("bp"=>$bp,"num"=>$num)));
$code=trim("CAT");
$bp=23;
$num=2;
print_r( $stock);
$temp=array($code=>array(array("bp"=>$bp,"num"=>$num)));
print_r( $temp);

array_push($stock['MSFT'], array("bp"=>$bp,"num"=>$num));
$stock+=$temp;
echo"<br>";
print_r($stock['MSFT'][0]);*/

//ESSENTIAL COMMENT ENDS

$stock=json_encode($stock);
$query="UPDATE `foss`.`profile` SET `string`='$stock',`money`='$amount' WHERE `username`='$user'";
mysqli_query($dbc,$query) or die("Update Error");
echo 1;

?>