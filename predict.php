<?php
namespace gchart;
session_start();
require 'YahooFinance.php';
$yf = new YahooFinance;
include 'db.php';
$company=trim($_REQUEST['comp']);

echo "<h2>Info About P/E Ratio of ".$company."</h2>";
echo "<table class='table table-bordered table-hover span12'><tr><th>P/E Ratio</th><th>Info</th></tr>";
echo "<tr><td>N/A</td><td>A company with no earnings has an undefined P/E ratio</td></tr>";
echo "<tr><td>0-10</td><td>The company's earnings are thought to be in decline or the company may have profited from selling assets.</td></tr>";
echo "<tr><td>10-17</td><td>For many companies a P/E ratio in this range may be considered fair value.</td></tr>";
echo "<tr><td>17-25</td><td>The company's earnings have increased since the last earnings figure was published</td></tr>";
echo "<tr><td>25+</td><td>The Stock has higher expected future growth rate in earnings</td></tr>";


$query="SELECT `code` from `foss`.`company` WHERE `name`='$company'";
$result=mysqli_query($dbc,$query) or die("View Query Error");
$row=mysqli_fetch_array($result);
$code=$row['code'];

$query="SELECT `code` from `foss`.`company` WHERE `dba`='$annual'";
$result=mysqli_query($dbc,$query);

$quote=$yf->getQuotes($code);
$quote=json_decode($quote,true);

echo "The P/E Ratio for the Share is ".$quote['query']['results']['quote']['PERatio'];
?>