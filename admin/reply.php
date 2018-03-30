<?php
	session_start();
	$replyname = $_SESSION['name'];
	$replyemail = $_SESSION['email'];
	$replysubj = $_SESSION['subject'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reply</title>
	<style type="text/css">
		body
		{
			font-family: century gothic;
		}
		.replytable
		{
			margin-left: 250px;
			margin-top: 50px;
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
	.send
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
	</style>
</head>
<body>
<div><?php include('includes/navigation.php'); ?></div>


<form method="post">
<input type="submit" name="back" value="Back" class="back">
<div class="heaad"><h2>Reply</h2></div>
<div class="linkes">
<table class="replytable" style="width:70%">
	<tr><td>To:</td><td><?php echo $replyemail; ?></td></tr>
	<tr><td>Subject:</td><td>Re: <?php echo $replysubj; ?></td></tr>
	<tr><td>Message:</td>
	<td><textarea cols="50" rows="10"></textarea></td></tr>
</table>
	<input type="submit" name="send" value="Send" class="send">
</div>
</form>
</body>
</html>
<?php
	if (isset($_POST['back'])) {
		echo "<script>window.location.replace('messages.php');</script>";
	}
?>