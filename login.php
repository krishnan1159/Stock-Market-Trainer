<?php
session_start();
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<br>
<body style="background-image:url('img/noise.png');color:#fff;">
<div style="margin: 0px auto 0px auto; width: 400px; border: 1px solid Gray">
	<h2 align="center"> Login here... </h2>
<form id="myform" class="form-vertical" style="padding:45px;">
	<!--Enter name <input type='text' name='name' id='name' />-->
	<div class="control-group">
	    <label class="control-label" for="username"></label>
	    <div class="controls">
	    	<div class="input-prepend">
		    	<span class="add-on"><i class="icon-user"></i></span>	
		      	<input type="text" id="user" placeholder='Enter Username' style="height:30px;">
	      	<div>
	    </div>
  	</div>
	<div class="control-group">
	    <label class="control-label" for="password"></label>
	    <div class="controls">
	    	<div class="input-prepend">
		    	<span class="add-on"><i class="icon-briefcase"></i></span>	
		      	<input type="password" id="pass" placeholder='Enter Password' style="height:30px;">
	      	<div>
	    </div>
  	</div>
	<div class="control-group">
	    <label class="control-label" for="submit"></label>
	    <div class="controls">
	      <input type="button" class="btn btn-success" id="sub" value="submit" style="height:30px;">
	    </div>
  	</div>
</form>
</div>
</body>

<script type="text/javascript" src="script/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	//var name=$('#name').val();
	$('#sub').click(function()
	{
		var user=$('#user').val();
		var pass=$('#pass').val();
		//var email=$('#email').val();
		//var cpass=$('#cpass').val();
		if(user == "" || pass == "")
		{
			alert("Please fill in all the fields");
			return;
		}

		$.post("submit.php",{user:user,pass:pass},function(data)
		{
				if(data == 1)
				{
					alert("Logged in Succesfully");
					window.location.href="nav.php";
				}
				else
					alert("Login Error");
		});
		//alert("hari");

	});
});
</script>