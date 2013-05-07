<?php
	session_start();
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="script/jquery-latest.js"></script>
<br>

<div style="margin: 0px auto 0px auto; width: 400px; border: 1px solid Gray">
	<h3 align="center">Stock Information</h3>
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
	      <input type="button" class="btn btn-success" id="sub" value="View Stock info" style="height:30px;width:140px;" >
	    </div>
  	</div>
</form>
</div>
<div id='content'>
  	</div>
<script type="text/javascript">
$(document).ready(function()
{
	$('#sub').click(function()
	{
		$('#content').append('<img src="img/w8.gif">');
		var comp=$('#comp option:selected').val();
		$('#content').load('submit2.php',{comp:comp},function(data)
		{

		});
	});
});
</script>