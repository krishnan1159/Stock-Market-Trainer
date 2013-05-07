<?php
	session_start();
?>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<script type="text/javascript" src="script/jquery-latest.js"></script>
<br>
<body style="background-image:url('img/noise.png');color:#fff;">
<div class="container" style="margin: 0px auto 0px auto; width: 400px; border: 1px solid Gray">
<h3 align="center">Registration Form</h3>
<form name="buy" class='form-vertical' action='#' style="padding:34px;">
	<div class="control-group">
	    <label class="control-label" for="username">Username</label>
	    <div class="controls">
	    	<div class="input-prepend">
		    	<span class="add-on"><i class="icon-leaf"></i></span>	
		      	<input type="text" id="user" placeholder='Enter Username' style="height:30px;">
	      	<div>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="password">Password</label>
	    <div class="controls">
	    	<div class="input-prepend">
		    	<span class="add-on"><i class="icon-briefcase"></i></span>	
		      	<input type="password" id="pass" placeholder='Enter Password' style="height:30px;">
	      	<div>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="cpassword">Retype-Password</label>
	    <div class="controls">
	     	<div class="input-prepend">
		    	<span class="add-on"><i class="icon-briefcase"></i></span>	
		      	<input type="password" id="cpass" placeholder='Retype Password' style="height:30px;">
	      	<div>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="name">Full Name</label>
	    <div class="controls">
	    	<div class="input-prepend">
		    	<span class="add-on"><i class="icon-user"></i></span>	
		      	<input type="text" id="name" placeholder='Enter Full name' style="height:30px;">
		    </div>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="email">Email</label>
	    <div class="controls">
	    	<div class="input-prepend">
		    	<span class="add-on"><i class="icon-envelope"></i></span>	
		      	<input type="email" id="email" placeholder='Enter email-id' style="height:30px;">
	      	</div>
	    </div>
  	</div>

  	<div class="control-group">
	    <label class="control-label" for="submit">Submit</label>
	    <div class="controls">
	      <input type="button" class="btn btn-primary" id="sub" value="submit" style="height:30px;">
	    </div>
  	</div>
</form>
</div>
</body>
<script type="text/javascript">
$(document).ready(function()
{
	$('#sub').click(function(data)
	{
		var user=$('#user').val();
		var pass=$('#pass').val();
		var cpass=$('#cpass').val();
		var name=$('#name').val();
		var email=$('#email').val();

		if(user == "" || pass == "" || cpass == "" || name == "" || email == "") 
		{
			alert("All the fields are Mandatory. Please Fill in!");
			return;
		}
		if(pass != cpass)
		{
			alert("Password Doesnot Match.");
			return;
		}

		$.post("rsubmit.php",{user:user,pass:pass,name:name,email:email},function(data)
		{
			if(data == 0)
			{
				alert("Username is already taken. Please type another username");
			}
			else if(data == 1)
			{
				alert("Registered Succesfully");
				window.location.href="login.php";
			}
		});
	});
});
</script>