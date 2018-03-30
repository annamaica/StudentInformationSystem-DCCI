<?php
	session_start();
	
	if(empty($_SESSION['session'])){
		echo "<script>window.location.replace('index.php')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
	<style type="text/css">
		body
		{
			font-family: century gothic;
		}
		.info
		{
			margin-left: 250px;
			margin-top: 100px;
		}
		.heaad
		{
			background-color: #006837;
			height: 40px;
			width: 1000px;
			margin-left: 300px;
			margin-top: 100px;
			text-indent: 30px;
			color: white;
		}
		.linkes
		{
			border: 1px solid #cfcfcf;
			height: 460px;
			width: 998px;
			margin-left: 300px;
			margin-top: 0px;
			font-size: 20px;
		}
	</style>
</head>
<body>
<?php include('includes/navigation.php'); 
	$edit_query = "SELECT * from tbladmin";

  	$run_edit = mysql_query($edit_query);

  	while($row=mysql_fetch_array($run_edit)){
        $firstname = $row['First_Name'];
        $lastname = $row['Last_Name'];
        $_SESSION['adminname'] = $firstname." ".$lastname;
        $username = $row['User_Name'];
        $email = $row['Email'];
        $_SESSION["email"] = $email;
        $_SESSION["passwordold"] = $row['Pass_Word'];
    }
?>
<form method="post" action="account_settings_process.php">
<div class="heaad"><h2>User Setting</h2></div>
<div class="linkes">
<table class="info">
	<tr><td width="50%">First Name: <span class="error"> *</span></td>
	<td><input type="text" name="firstname" value="<?php echo $firstname; ?>" required></td></tr>
	<tr><td width="50%">Last Name: <span class="error"> *</span></td>
	<td><input type="text" name="lastname" value="<?php echo $lastname; ?>" required></td></tr>
	<tr><td width="50%">Email Address: <span class="error"> *</span></td>
	<td><input type="text" name="email" value="<?php echo $email; ?>" required></td></tr>
	<tr><td width="50%">User Name: <span class="error"> *</span></td>
	<td><input type="text" name="username" value="<?php echo $username; ?>" required></td></tr>
	<tr><td width="50%">Old Password: <span class="error"> *</span></td>
	<td><input type="password" name="oldpword"></td></tr>
	<tr><td width="50%">New Password: <span class="error"> *</span></td>
	<td><input type="password" name="newpword"></td></tr>
	<tr><td width="50%">Confirm Password: <span class="error"> *</span></td>
	<td><input type="password" name="confirmpword"></td></tr>
	<tr><td><input type="submit" name="update" value="Update" id="update"></td></tr>
</table>
</div>
</form>
</body>
</html>