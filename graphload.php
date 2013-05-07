<?php
	namespace gchart;
	session_start();
	require ('gChartInit.php');
	include 'YahooFinance.php';
	include 'db.php';
	$yf = new YahooFinance;
	class gLineChart extends gChart
	{
	    public function __construct($width = 200, $height = 200)
	    {
	        $this->setProperty('cht', 'lc');
	        $this->setDimensions($width, $height);
	    }
	    public function getUrl()
	    {
	        $retStr = parent::getUrl();
	        return $retStr;
	   }
	}

	$current=date("Y-m-d");
	$before=mktime(0,0,0,date("m"),date("d")-30,date("Y"));
	$before=date("Y-m-d",$before);
	$company=$_REQUEST['company'];
	$comp=array($company);

	//Retrieve Code
	$query="SELECT code FROM `foss`.`company` WHERE `name`='$company';";
	$result=mysqli_query($dbc,$query)or die("Error in query");
	$row=mysqli_fetch_array($result)or die("Error in fetch");
	$company=$row['code'];

	//Retrieve History
	$history = $yf->getHistoricalData($company, $before, $current);
	$history=json_decode($history,true);
	$data=array();

	foreach ($history['query']['results']['quote'] as $key => $value) 
		array_push($data, $value['High']);

	$lineChart = new gLineChart(600,500);
	$lineChart->addDataSet($data);
	$lineChart->setLegend($comp);
	$lineChart->setColors(array("ff3344"));
	$lineChart->setVisibleAxes(array('x','y'));
	$lineChart->setDataRange(10,100);
	$lineChart->addAxisRange(0, 1, 30, 1);
	$lineChart->addAxisRange(1, 15, 130);
	$lineChart->addLineFill('B','76A4FB',0,0);
?>
<img src="<?php print $lineChart->getUrl();  ?>" style="align:center;" /> <br> 