<?php
	session_start();
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/jquery-ui.css" />
<script type="text/javascript" src="script/jquery-latest.js"></script>
<script type="text/javascript" src="script/jquery-ui.js"></script>

<body style="background-image:url('img/noise.png');color:#0ff">
<h2 align="center">Share History</h2>
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
	    <label class="control-label" for="share"><h5>Start Date</h5></label>
	    <div class="controls">
	      <input type="text" id="datepicker" style="height:30px;" >
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="share"><h5>End Date</h5></label>
	    <div class="controls">
	      <input type="text" id="datepicker1" style="height:30px;" >
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="history"></label>
	    <div class="controls">
	      <input type="button" class="btn btn-warning" id="sub" value="Submit" >
	    </div>
  	</div>

</form>

</div><br><br>

<div id='history' style="align:center">
</div>
<input type="button" class="btn btn-link" id="back" value="Go back" style="display:none;" />
<script>
  $(function() {
    $( "#datepicker" ).datepicker({maxDate: "+0M +0D" });
    $('#datepicker').datepicker("option","dateFormat","yy-mm-dd");
  });
  </script>

<script type="text/javascript">
 $(document).ready(function()
 {
 	var start,end;

 /*	$('#datepicker').focusin(function()
 	{
 		$('#datepicker').datepicker({maxDate:"+0M +0D"});
 		$('#datepicker').datepicker("option","dateFormat","yy-mm-dd");
 	});

 	('#datepicker').focus(function()
 	{
 		$('#datepicker').datepicker({maxDate:"+0M +0D"});
 		$('#datepicker').datepicker("option","dateFormat","yy-mm-dd");
 	});*/

 	$('#datepicker1').focus(function()
 	{
 		start=$('#datepicker').val();
 		$('#datepicker1').datepicker("destroy");
 		
 		if(start != "")
 		{
 				$('#datepicker1').datepicker({minDate:new Date(start),maxDate:'+0M +0D'});
 				$('#datepicker1').datepicker("option","dateFormat","yy-mm-dd");
 				return;
 		}
 		else
 		{
 				alert("Select Start Date");
 				$('#datepicker').focus();
 				return;
 		}
 	});

 	$('#sub').click(function()
 	{
 		$('#history').text("");
 		$('#history').append('<h4 align="center">Fetching History Information..<br><br><img src="img/w8.gif"></img></h4>');
 		$('#tab').css("display","none");
 		$('#back').css("display","block");
 		end=$('#datepicker1').val();
 		if(start == "" || end == "")
 		{
 			alert("Please fill in all the fields");
 			return;
 		}
 		
 		var company=$('#comp option:selected').val();
 		$('#history').load("history.php",{start:start,end:end,company:company},function(data)
 		{
 			
 		});
 	});
 	$('#back').click(function()
 	{
 		$('#tab').css("display","block");
 		$('#back').css("display","none");
 		$('#history').text("");
 	});
 
 });
 </script>

</body>