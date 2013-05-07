<?php
include('foss1connect.php');
$query="select * from admin";
$result=mysql_query($query,$con);
$numcolumns=mysql_num_fields($result);
echo "<h2>User Registration</h2><br/>";
echo "<form action=\"userstore.php\" method=\"post\">";
for($i=0;$i<$numcolumns;$i++)
{
	$column=mysql_field_name($result,$i);
	echo "<div>".$column."</div>";
	echo "<input type=\"text\" id=\"".$column."\">";

}echo "<input type=\"submit\" value=\"Submit!\">";
echo "</form>";
?>