<?php
echo date("Y-m-d");
echo "<br>";
$before=mktime(0,0,0,date("m"),date("d")-30,date("Y"));
echo date("Y-m-d",$before);
?>