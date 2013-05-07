<?php
	session_start();
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery-ui.css" />
<script type="text/javascript" src="script/jquery-latest.js"></script>
<script type="text/javascript" src="script/jquery-ui.js"></script>

<body style="background-image:url('img/noise.png');color:#0ff">
<h2 align="center">Sell Share</h2>
<div style="margin: 0px auto 0px auto; width: 400px; border: 1px solid Gray" id='tab'>

<form class="form-vertical" style="padding:40px;">
	<div class="control-group">
	    <label class="control-label" for="company"><h5>Company</h5></label>
	    <div class="controls">
	    	<select id='comp'>
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
	    <label class="control-label" for="share"><h5>No. Of Shares</h5></label>
	    <div class="controls">
	      <input type="text" id="share" value=0 style="height:30px;" >
	    </div>
  	</div>
  	<div class="control-group">
	    <label class="control-label" for="sell"></label>
	    <div class="controls">
	      <input type="button" class="btn btn-warning" id="sub" value="Submit" >
	    </div>
  	</div>

</form>
<div id='temp'>

</div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
	$('#sub').click(function()
	{
		var company=$('#comp option:selected').val();
		var num=$('#share').val();
		$.post('sellshare.php',{company:company,num:num},function(data)
		{
			alert(data);
			if(data == 2)
			{
				alert("You have not purchased this stock");
			}
			else if(data == 0)
			{
				alert(" You have to sell atlease one share");
			}
			else if(data == 1)
			{
				alert("Share was successfully sold");
			}
			else if(data == 3)
			{
				alert("You dont have enough shares");
			}
		});
	});
});
 </script>

</body>