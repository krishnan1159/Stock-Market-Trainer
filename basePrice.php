<?php
namespace gchart;
session_start();
require 'YahooFinance.php';
$yf = new YahooFinance;
$code=$_REQUEST['code'];
//echo $code;
$quote=$yf->getQuotes($code);
//echo $quote;
$quote=json_decode($quote,true);
echo $quote['query']['results']['quote']['AskRealtime'];
?>