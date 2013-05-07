<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="script/jquery-latest.js"></script>
<br>
<body style="background-image:url('img/noise.png');color:#0ff">
<h1 align="center">Online Stock Market Trainer</h1>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2" >
			<ul class="nav nav-pills nav-stacked">
				<li class="active" id='home' style="padding:15px 3px;"><button type="button" class="btn-success " style="width:190px;" >Home</button></li>
				<li id="buy" style="padding:15px 3px;"><button type="button" class="btn btn-success" style="width:190px;" >Buy Share</button></li>
				<li id="view" style="padding:15px 3px;"><button type="button" class="btn btn-success " style="width:190px;" >View Shares</button></li>
				<li id="hist" style="padding:15px 3px;"><button type="button" class="btn btn-success " style="width:190px;" >View History</button></li>
				<li id="reg" style="padding:15px 3px;"><button type="button" class="btn btn-success " style="width:190px;" >Register</button></li>
				<li id="sell" style="padding:15px 3px;"><button type="button" class="btn btn-success " style="width:190px;" >Sell</button></li>
				<li id="graph" style="padding:15px 3px;"><button type="button" class="btn btn-success " style="width:190px;" >Graphical Analysis</button></li>
				<!--<li id="predict" style="padding:15px 3px;"><button type="button" class="btn btn-success " style="width:190px;" >Prediction</button></li>-->
			</ul>
		</div>
		<div class="span10" id='cont' >
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function()
{
	$('#buy,#view,#home,#hist,#reg,#sell,#graph,#predict').click(function()
	{
		$('.active').removeClass("active");
		$(this).addClass("active");
		var tx=$(this).text();
		if(tx == "Buy Share")
		{
			$('#cont').load('buy.php');
		}
		else if(tx == "View Shares")
		{
			$('#cont').load('view.php');
		}
		else if(tx == "Graphical Analysis")
		{
			$('#cont').load('graph.php');	
		}
		else if(tx == "View History")
		{
			$('#cont').load('date.php');
		}
		else if(tx == "Register")
		{
			$('#cont').load('register.php');
		}
		else if(tx == "Home")
		{
			$('#cont').load('login.php');
		}
		else if(tx == "Sell")
		{
			$('#cont').load('sell.php');	
		}
		else if(tx == "Prediction")
		{
			alert('cli');
			$('#cont').load('predict_p.php');
		}
	});
	
});
</script>