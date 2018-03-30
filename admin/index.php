<?php
	session_start();

	if(!empty($_SESSION['session'])){
		echo "<script>window.location.replace('dashboard.php')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DCCI Admin</title>
	<style type="text/css">
		body
		{
			background-color: rgb(39,40,34);
			font-family: "Century Gothic";
		}
		.container
		{
			margin-top: 200px;
			margin-left: 410px;
			width: 500px;
			height: 200px;
			background-color: rgb(81,83,73);
		}
		img
		{
			margin-top: 5px;
			margin-left: 100px;
		}
		table
		{
			padding-top: 30px;
		}
		.text
		{
			margin-left: 120px;
			padding-top: 18px;
		}
		#uname, #pword
		{
			font-family: Century Gothic;
			font-size: 15px;
		}
		#login
		{
 			font-family: "Century Gothic";
 			border: 0px;
			background-color: #6dd99b;
 			box-shadow:none;
 			padding: 5px;
 			height: 40px;
 			width: 250px;
	    	cursor: pointer;
	    	font-size: 17px;
	    	margin-top: 10px;
	    	margin-left: 10px;
		}

	</style>
</head>
<body>
<form method="post" action="loginprocess.php">
	<div class="container">
	<div class="text">
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" id="uname" name="username" required/></td>
		</tr>
		<tr></tr> <tr></tr>
		<tr>
			<td>Password:</td>
			<td><input type = "password" id="pword" name="password" required/></td>
		</tr>

	</table>
			<input type="submit" name="login" id="login" value="Log In">
	</div>
	</div>
</form>
</body>
</html>