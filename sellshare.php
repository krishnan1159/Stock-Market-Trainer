<?php
	namespace gchart;
	session_start();
	include 'db.php';
	require 'YahooFinance.php';
	$yf = new YahooFinance;
	$user=$_SESSION['user'];
	$company=$_REQUEST['company'];
	$num=$_REQUEST['num'];
	//echo $num;

	//Num == 0

	if($num == 0)
	{
		echo 0;
		return;
	}

	
	//Get the code;
	$query="SELECT code FROM `foss`.`company` WHERE `name`='$company';";
	$result=mysqli_query($dbc,$query)or die("Error in query");
	$row=mysqli_fetch_array($result)or die("Error in fetch");
	$code=$row['code'];

	//Current Market Price//
	$quote=$yf->getQuotes($code);
	$quote=json_decode($quote,true);
	$mktprice=$quote['query']['results']['quote']['AskRealtime'];

	//Get the shares bought by the user//
	$query="SELECT * FROM `foss`.`profile` WHERE `username`='$user';";
	$result=mysqli_query($dbc,$query)or die("Error in User");
	$result=mysqli_fetch_array($result)or die("Error in User Fetch");
	$share=$result['string'];
	$amount=$result['money'];

	//Decode it
	$share=json_decode($share,true);

	//Comparison Function//
	function compare($a,$b)
	{
		if($a['bp']==$b['bp'])
			return 0;
		return ($a['bp']<$b['bp'])?-1:1;
	}

	//Checking whether He has enough Shares
	$flag=0;
	$total=0;
	foreach ($share as $key => $value)
		if(0 == strcmp($code, $key))
		{
			$flag=1;
			foreach ($value as $key1 => $value1) 
				$total+=$value1['num'];
		}

	if($flag == 0)
	{
		echo 2;
		return;
	}

	
	if($num > $total)
	{
		echo 3;
		return;
	}

	//Data of Share that matches//
	foreach ($share as $key => $value) 
	{
		if(0 == strcmp($code, $key))
		{
			uasort($value, "gchart\compare");
			while($num > 0)
			{
				foreach ($value as $key1 => $value1) 
				{
					if( ($num-$value1['num']) >= 0)
					{
						$num-=$value1['num'];
						$amount+=$mktprice*$value1['num'];
						unset($share[$key][$key1]);
					}
					else
					{
						$share[$key][$key1]['num']-=$num;
						$amount+=$mktprice*$num;
						$num=0;
					}
				}
			}
		}
	}

	
	$share=json_encode($share);
	$query="UPDATE `foss`.`profile` SET `money`='$amount',`string`='$share' WHERE `username`='$user'";
	$result=mysqli_query($dbc,$query) or die('Error in update');

	echo 1;
?>