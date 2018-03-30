<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
</head>
<style type="text/css">
	.heaad
	{
		margin-top: 100px;
		margin-left: 300px;
	}
</style>
<body>
<div>
<?php include('includes/navigation.php'); 
	$employee_id = $_SESSION['employeenum'];
	$query = mysql_query("SELECT * FROM tbluser WHERE User_ID = '$employee_id'");

		while ($userhold = mysql_fetch_array($query)) {
			$userid = $userhold['User_ID'];
			$user_name = $userhold['User_Name'];
			$_SESSION["passwordold"] = $userhold['Pword'];
		}

?>
</div>
<form method="post">
<div class="heaad"><h2>User Setting</h2>
	<table class="info">
		<tr><td width="50%">Default Username:</td>
		<td><?php echo $id; ?></td></tr>
		<tr><td width="50%">Old Password: <span class="error"> *</span></td>
		<td><input type="password" name="oldpassword"></td></tr>
		<tr><td width="50%">New Password: <span class="error"> *</span></td>
		<td><input type="password" name="newpassword"></td></tr>
		<tr><td width="50%">Confirm Password: <span class="error"> *</span></td>
		<td><input type="password" name="confirmpassword"></td></tr>
		<tr><td><input type="submit" name="update" value="Update" id="update"></td></tr>
	</table>
</div>
</form>
</body>
</html>

<?php
	if(isset($_POST["update"])){
			if(md5($_POST["oldpassword"])===$_SESSION["passwordold"]){
				if(!empty($_POST["newpassword"]) && !empty($_POST['confirmpassword'])){
					if($_POST["newpassword"]===$_POST["confirmpassword"]){
						if(strlen($_POST['confirmpassword'])>3){

							$passhold = md5($_POST["confirmpassword"]);
						
							$insert = mysql_query("UPDATE tbluser SET Pword='$passhold' WHERE User_ID='$employee_id'");

							echo "<script>alert('Password Updated Successfully!');
							window.location.replace('account_settings.php')</script>";
						}
						else{
							echo "<script>alert('Password Must Be More Than 3 Characters!')</script>";
						}						
					}
					else{
						echo "<script>alert('Password do not match')</script>";
					}
				}
			}
			else{
				echo "<script>alert('Password is incorrect')</script>";
			}
	}
?>