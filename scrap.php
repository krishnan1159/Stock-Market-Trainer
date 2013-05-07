<?php
$ch=curl_init();
$url="http://www.bseindia.com/xml-data/ScripNewDebtBond.txt";
$ref="http://www.bseindia.com/stockreach/stockreach.htm?scripcd=507685";
curl_setopt($ch, CURLOPT_REFERER, $ref);
curl_setopt($ch,CURLOPT_AUTOREFERER,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,0);
curl_setopt($ch, CURLOPT_URL,$url );
$html=curl_exec($ch);
echo $html;
?>