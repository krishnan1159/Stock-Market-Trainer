<?php
	namespace gchart;
	session_start();
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="script/jquery-latest.js"></script>
<br>
<body style="background-image:url('img/noise.png');color:#fff;">
<h2 align="center">Buy Share</h2>
<div style="margin: 0px auto 0px auto; width: 400px; border: 1px solid Gray">
<form name="buy" class='form-vertical' action='#' style="padding:34px;">
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
	      <input type="text" id="share" value=0 style="height:30px;" disabled>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="bprice" id='bp_label'><h5>Fetching Base price..</h5></label>
	    <div class="controls">
	      <p id='bp'></p>
	      <span id='img'><img src="img/w8.gif"></span>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="total"><h5>Amount Needed</h5></label>
	    <div class="controls">
	      <p id='total' disabled>0</p>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="buy"></label>
	    <div class="controls">
	      <input type="button" class="btn btn-success" id="sub" value="Buy" style="height:30px;width:80px;margin-left:35%;margin-right:35%;" >
	    </div>
  	</div>
</form>
</div>
</body>

<script type="text/javascript">
$(document).ready(function()
{
	var code,comp,no_of_shares;
	comp=$('#comp option:selected').val();
	//alert(comp);
	$.post('findCode.php',{comp:comp},function(data)
		{
			code=data;
			//alert(code);
			$.post('basePrice.php',{code:code},function(data)
			{
				//alert(data);
				$('#bp_label').text('BASE PRICE : ')
				$('#bp').text(data);
				$('#img').text('');
				no_of_shares=$('#share').val();
				var total=no_of_shares * $('#bp').text();
				$('#total').text(total);
				$('#comp').removeAttr('disabled');
				$('#share').removeAttr('disabled');
			});
		});
	$('#comp').change(function()
	{
		$('#comp').attr('disabled','disabled');
		$('#share').attr('disabled','disabled');
		$('#img').text('');
		$('#img').append('<img src="img/w8.gif">');
		comp=$('#comp option:selected').val();
		//alert(comp);
		$.post('findCode.php',{comp:comp},function(data)
		{
			code=data;
			//alert(code);
			$.post('basePrice.php',{code:code},function(data)
			{
				//alert(data);
				$('#bp_label').text('BASE PRICE : ')
				$('#bp').text(data);
				$('#img').text('');
				no_of_shares=$('#share').val();
				var total=no_of_shares * $('#bp').text();
				$('#total').text(total);
					});
		});
		$('#comp').removeAttr('disabled');
		$('#share').removeAttr('disabled');
		//$('#comp').removeAttr('disabled');
	});
	$('#share').change(function()
	{
		no_of_shares=$('#share').val();
		var total=no_of_shares * $('#bp').text();
		$('#total').text(total);
	});
	$('#sub').click(function()
	{
		var total=$('#share').val();
		if(total == 0)
		{
			alert("Atleast one share must be selected");
			return;
		}
		var bp=$('#bp').text();
		var num=$('#share').val();
		//alert(num);
		$.post("submit1.php",{code:code,bp:bp,num:num},function(data)
		{
			if(data == 1)
			{
				alert("Stock is bought Successfully")
			}
			else
			{
				alert(data);
			}
		});
	});

});
</script>