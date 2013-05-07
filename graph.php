<?php
	session_start();
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="script/jquery-latest.js"></script>
<br>
<body style="background-image:url('img/noise.png');color:#fff;">
<h2 align="center">Graphical Analysis</h2>
<div style="margin: 0px auto 0px auto; width: 400px; border: 1px solid Gray" id='star'>
<form name="buy" class='form-vertical' action='submit2.php' style="padding:34px;" method="POST">
	<div class="control-group">
	    <label class="control-label" for="company">Company</label>
	    <div class="controls">
	    	<select id='comp' name='comp'>
				<?php 
					include 'db.php';
					$query="SELECT * FROM `foss`.`company`";
					$result=mysqli_query($dbc,$query) or die("Select Error");
					while($row=mysqli_fetch_array($result))
						echo "<option>". $row['name']. "</option>";
				?>
			</select>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="buy"></label>
	    <div class="controls">
	      <input type="button" class="btn btn-success" id="sub" value="View Graph" style="height:30px;width:140px;" >
	    </div>
  	</div>
</form>
<br><br>
</div>

<div id='graph1' style="margin: 0px auto 0px auto;" >
</div>
<input type="button" class="btn btn-link" id="back" value="Go back" style="display:none; width: 400px;" />
</body>

<script type="text/javascript">
$(document).ready(function()
{
	//alert("Hari");
	$('#sub').click(function()
	{
		//alert('click');
		$('#graph1').append('<h4 align="center">Generating Graph..<br><br><img src="img/w8.gif"></img></h4>');
		$('#back').css('display','block');
		$('#star').css('display','none');
		var company=$('#comp option:selected').val();
		//alert(company);
		$('#graph1').load('graphload.php',{company:company},function(data)
		{
		});
	});

	$('#back').click(function()
	{
		$('#star').css("display","block");
 		$('#back').css("display","none");
 		$('#graph1').text("");
	});
});
</script>