<?php
	session_start();
	
	if(empty($_SESSION['session'])){
		echo "<script>window.location.replace('index.php')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<style type="text/css">
	body
	{
		font-family: Century Gothic;
	}
		.buttons{
		position: absolute;
		top: 180px;
		left: 480px;
	}
		a
		{
			margin-right: 0px;
			text-decoration: none;
			color: white;
		}
		.imagess
		{
			position: absolute;
		left: 10px;
		height: 50px;
		margin-top: 30px;
		border-radius: 50px;
		background-color: #77aa78;
		height: 70px;
		padding: 10px;


		}
		.addstud
		{
			background-color: #006837;
		width: 350px;
		height: 150px;
		position: absolute;
		top: -95px;
		left: -90px;
		cursor: pointer;
		}
		.addemp
		{
			background-color: #006837;
		width: 350px;
		height: 150px;
		position: absolute;
		top: -95px;
		left: 400px;
		cursor: pointer;
		}
		.addsubj
		{
			background-color: #006837;
		width: 350px;
		height: 150px;
		position: absolute;
		top: 100px;
		left: -90px;
		cursor: pointer;
		}
		.addnews
		{
			background-color: #006837;
		width: 350px;
		height: 150px;
		position: absolute;
		top: 100px;
		left: 400px;
		cursor: pointer;
		}
		.addannounce
		{
			background-color: #006837;
		width: 350px;
		height: 150px;
		position: absolute;
		top: 300px;
		left: 150px;
		cursor: pointer;
		}
		#text
		{
			font-size: 18px;
			text-align: right;
			margin-right: 10px;
			margin-top: 100px;
			font-weight: bold;
		}

		
</style>
<body>
<div><?php include("includes/navigation.php"); ?></div>

<div class="buttons">
	<a href="add_student.php" id="but1"><div class="addstud">
		<img src="images/student.png.png" class="imagess">
		<p id="text">Add Students</p>
	</div></a>

	<a href="add_employee.php" id="but2"><div class="addemp">
		<img src="images/faculty.png" class="imagess">
		<p id="text">Add Faculty</p>
	</div></a>

	<a href="add_program.php" id="but3"><div class="addsubj">
		<img src="images/subj.png" class="imagess">
		<p id="text">Add Subject</p>
	</div></a>

	<a href="insert_news.php" id="but4"><div class="addnews">
		<img src="images/news.png" class="imagess">
		<p id="text">Add News</p>
	</div></a>

	<a href="add_announcement.php" id="but4"><div class="addannounce">
		<img src="images/announce.png" class="imagess">
		<p id="text">Post Announcement</p>
	</div></a>
</div>
	

</body>
</html>