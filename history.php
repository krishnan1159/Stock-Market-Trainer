<?php
	namespace gchart;
	session_start();
	include 'db.php';
	include 'YahooFinance.php';
	 $yf = new YahooFinance;

	$start=$_REQUEST['start'];
	$end=$_REQUEST['end'];
	$company=$_REQUEST['company'];
	
	$query="SELECT code FROM `foss`.`company` WHERE `name`='$company';";
	$result=mysqli_query($dbc,$query)or die("Error in query");
	$row=mysqli_fetch_array($result)or die("Error in fetch");
	$code=$row['code'];

	 $history = $yf->getHistoricalData($code, $start, $end);
	 $history=json_decode($history,true);

	//print_r($history['query']['results']['quote']);

	//Displaying It as a table//
	 echo "<h2> History of ".$company."</h2>";
	echo "<table class='table table-bordered span10'><tr><th>Date</th><th>Open Price</th><th>High Price</th><th>Low Price</th><th>Close Price</th></tr>";

	foreach ($history['query']['results']['quote'] as $key => $value) 
	{
		# code...
		echo "<tr>";
		echo "<td>";
		echo $value['date'];
		echo "</td>";

		echo "<td>";
		echo $value['Open'];
		echo "</td>";

		echo "<td>";
		echo $value['High'];
		echo "</td>";

		echo "<td>";
		echo $value['Low'];
		echo "</td>";

		echo "<td>";
		echo $value['Close'];
		echo "</td>";
		echo "</tr>";
	}

	echo "</table>"


?>
