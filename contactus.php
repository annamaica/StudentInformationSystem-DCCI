<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
</head>
<script src='https://www.google.com/recaptcha/api.js'></script>
<style type="text/css">
	body{
		font-family: 'Century Gothic';
		background-color: rgb(209,209,209);
	}
	nav {
		padding: 20px;
		background-color: #006837;
		color: white;
	}
	.tblmessage{
		margin-left: 100px;
		margin-top: 15px;
	}
	.tblocation{
		margin-left: 600px;
		position: absolute;
		margin-top: -300px;
	}
</style>
<body>
<form method="post" action="contactus_process.php">
<div><?php include('includes/footer.php'); ?></div>
<meta charset = "UTF-8";>

<nav> Contact Us</nav>
<div class="messagecont">
<table class="tblmessage">
	<tr><td>Name</td></tr>
	<tr><td><input type="text" id="name" name="name" maxlength="30" required></td></tr>
	<tr><td>Contact Number</td></tr>
	<tr><td><input type="text" id="contactnum" name="contactnum" maxlength="30" required></td></tr>
	<tr><td>Email</td></tr>
	<tr><td><input type="email" id="email" name="email" maxlength="30" required></td></tr>
	<tr><td>Subject</td></tr>
	<tr><td><input type="text" id="subj" name="subject" maxlength="30" required></td></tr>
	<tr><td>Message</td></tr>
	<tr><td><textarea rows="10" cols="50" name="message" id="message" required></textarea></td></tr>
	<tr><td><div class="g-recaptcha" data-sitekey="6LcrtAcUAAAAAGzpmvg7d4pYYYOw57TWaMD6IZv2"></div></td></tr>
	<tr><td><input type="submit" id="send" name="send" value="Send"></td></tr>
</table>
</div>
<div class="location">
<?php
include('admin/includes/connection.php');
	$output = mysql_query("SELECT * FROM tblcontactus");

	while ($row = mysql_fetch_array($output)) {
		$cnumber = $row['contact_number'];
		$caddress = $row['contact_address'];
		$cemail = $row['contact_email'];
		$clocation = $row['contact_location'];
	}
?>
	<table class="tblocation">
		<tr><td>Contact Number:</td><td><?php echo $cnumber;?></td></tr>
		<tr><td>Address:</td><td><?php echo $caddress;?></td></tr>
		<tr><td>Email:</td><td><?php echo $cemail;?></td></tr>
		<tr><td>Location:</td><td><img src="admin/<?php echo $clocation ?>" width="150px" height="150px"></td></tr>

	</table>
</div>
</form>
</body>
</html>