<?php  
include ("includes/connection.php");
session_start();

if(isset($_GET['message'])){
	$edit_id = $_GET['message'];
  	$edit_query = "SELECT * from tblmessage where Message_ID='$edit_id'";

  	$run_edit = mysql_query($edit_query);

  	while($row=mysql_fetch_array($run_edit)){
        $messagename = $row['Name'];
        $_SESSION['name'] = $messagename;
        $messagecontact = $row['Contact'];
        $messageemail = $row['Email'];
        $_SESSION['email'] = $messageemail;
        $messagesubject = $row['Subject'];
         $_SESSION['subject'] = $messagesubject;
        $message = $row['Message'];
        $messagedate = $row['Message_Date'];
      }

     $update= mysql_query("UPDATE tblmessage SET Message_Status='Read' WHERE Message_ID='$edit_id'");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
</head>
<style type="text/css">
	body
	{
		font-family: century gothic;
	}
	.date
	{
		margin-top: 10px;
		margin-left: -30px;
		text-align: center;
	}
	.message
	{
		margin-top: 50px;
		margin-left: 300px;
		vertical-align: center;
	}
	.reply
	{
		margin-left: 330px;
		margin-top: 30px;
		border: 0px;
		background-color: #006837;
 		box-shadow:none;
 		color: white;
		padding: 10px;
		width: 300px;
	}
	.back
	{
		border: 0px;
		background-color: #006837;
 		box-shadow:none;
		position: absolute;
		margin-top: -50px;
		margin-left: 300px;
		color: white;
		padding: 10px;
		width: 200px;
	}
	.heaad
		{
			background-color: #006837;
			height: 40px;
			width: 1000px;
			margin-left: 300px;
			margin-top: 150px;
			text-indent: 30px;
			color: white;
		}
		.linkes
		{
			border: 1px solid #cfcfcf;
			height: 400px;
			width: 998px;
			margin-left: 300px;
			margin-top: 0px;
		}
</style>
<body>
<div><?php include('includes/navigation.php'); ?></div>
<form method="post">
<input type="submit" name="back" value="Back" class="back">
<div class="heaad"><h2>View Message</h2></div>
<div class="linkes">
<div class="date"><?php echo "<p>$messagedate</p>"; ?></div>
<div class="tblmessage">
	<table class="message" style="width:50%">
		<tr><td>Name:</td><td><?php echo $messagename; ?></td></tr>
		<tr><td>Contact Number:</td><td><?php echo $messagecontact; ?></td></tr>
		<tr><td>Email:</td><td><?php echo $messageemail; ?></td></tr>
		<tr><td>Subject:</td><td><?php echo $messagesubject; ?></td></tr>
		<tr><td>Message:</td><td><?php echo $message; ?></td></tr>
	</table>
</div>
	<input type="submit" name="reply" value="Reply" class="reply">
	</div>
</form>
</body>
</html>
<?php
	if (isset($_POST['back'])) {
		echo "<script>window.location.replace('messages.php');</script>";
	}
	if (isset($_POST['reply'])) {
		echo "<script>window.location.replace('reply.php');</script>";
	}
?>