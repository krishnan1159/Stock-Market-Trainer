<?php
namespace gchart;
	require 'YahooFinance.php';
	 $yf = new YahooFinance;
	   $historicaldata = $yf->getHistoricalData('MSFT', '2013-01-01', '2013-01-31');
      $quotes     = $yf->getQuotes(array('ASX', 'WOW')); // multiple quotes
      	$quote = $yf->getQuotes('BA');	   		// single quote
      	
      	$e=json_decode($quote,true);
      	echo $quote;
      	echo "<br>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk<br>";
      	echo $e['query']['results']['quote']['symbol']."<br>";
      	echo $e['query']['results']['quote']['DaysHigh']."<br>";
      	echo $e['query']['results']['quote']['DaysLow']."<br>";
      	echo $e['query']['results']['quote']['Open']."<br>";
      	echo $e['query']['results']['quote']['Ask']."<br>";
      if(isset($e['query']))
         echo "true";
      print_r($historicaldata);

?>

 
 
