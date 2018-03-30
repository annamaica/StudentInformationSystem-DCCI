<!DOCTYPE html>
<html>
<head>
	<title>Add Program</title>
	<style type="text/css">
	body
	{
		font-family: century gothic;
	}
	.prog
    {
       	margin-top: 300px;
        margin-left: 520px;
	    width: 800px;
        height: 280px;
    }
    #addprogram
    {
    	border: 0;
		background-color: #006837;
 		box-shadow:none;
 		border-radius: 0px;
 		margin: 15px;
 		width: 200px;
 		height: 40px;
 		font-style: century gothic;
 		font-size: 18px;
 		margin-left: 350px;
 		color: white;
    }
    input
	{
		font-family: century Gothic;
		font-size: 15px;
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
			height: 400px;
			width: 998px;
			margin-left: 300px;
			margin-top: 0px;
		}
		table
		{
			margin-top: 100px;
			margin-left: 300px;
		}
	</style>
</head>
<body>
<div><?php include('includes/navigation.php'); ?></div>
<form method="post">
<div class="heaad"><h2>Add Program</h2></div>
	 <div class="linkes">
	 	<table border="0" width="70%">
	 		<tr><td width="20%">Program Code:</td><td><input type="text" name="programcode"></td></tr>
	 		<tr><td width="20%">Program Title:</td><td><input type="text" name="programtitle"></td></tr>
	 	</table>
	 	<input type="submit" name="addprogram" id="addprogram" value="Add Program">
	 </div>
</form>
</body>
</html>

<?php

if(isset($_POST['addprogram'])){
	$programcode = $_POST['programcode'];
	$programtitle = $_POST['programtitle'];

	mysql_query("INSERT INTO tblprogram(Program_code, Program_Title) VALUES ('$programcode','$programtitle')");

	$register = mysql_affected_rows();

	echo "<script>alert('Program Added!')</script>";
	header('Location:program.php');

}
?>