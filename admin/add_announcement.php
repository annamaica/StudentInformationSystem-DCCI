<!DOCTYPE html>
<html>
<head>
	<title>Add Announcement</title>
	<style type="text/css">
		body
			{
				font-family: Century Gothic;
			}
			.tblcolor{
				width:90%; 
				}
			.tblcolor td{
				padding:7px; 
			}
			.tblcolor tr{
				background: #77aa78;
			}

			.tblcolor tr:nth-child(odd){ 
				background: #77aa78;
			}
			.tblcolor tr:nth-child(even){
				background: #f1f1f1;
			}
		.announcement
		{
			margin-top: 200px;
			margin-left: 260px;
			
		}
		h1
		{
			position: absolute;
			top: 80px;
			left: 330px;
		}
	</style>
</head>
<body>
<div><?php include("includes/navigation.php"); ?></div>
<form method="post">
<h1>Add Announcement</h1>
<div class="announcement">
	<table class="tblcolor" align="center" border="0">
			<td align="right">Announcement Title:</td>
			<td><input type="text" name="title" size="50" required></td>
		</tr>
		<tr>
			<td align="right">Announcement Content:</td>
			<td><textarea name="content" cols="60" rows="15"></textarea></td>
		</tr>
		<tr>
			<td align="right">Type:</td>
			<td><select name="type">
				<option>Students</option>
				<option>Faculty</option>
				<option>All</option>
			</select></td>
		</tr>
	</table>
	<input type="submit" name="submit" value="Publish" id="submit">
</div>
</form>
</body>
</html>

<?php
include("includes/connection.php");

if(isset($_POST['submit']))
{
	$announcement_title = $_POST['title'];
	$announcement_content = $_POST['content'];
	$announcement_type = $_POST['type'];
	date_default_timezone_set("Asia/Manila");
	$announcement_date = date('F d, Y, g: i a');

	if($announcement_title && $announcement_content)
	{

		$insert_query = "INSERT INTO tblannouncements(announcement_title,announcement,announce_date,announce_type) values ('$announcement_title','$announcement_content','$announcement_date', '$announcement_type')";
		
		if(mysql_query($insert_query))
		{
			echo "<script>alert('Announcement Added!'); 
			window.location.replace('view_announcement.php')</script>";
		}
	}

}

?>