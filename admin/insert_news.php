<!DOCTYPE html>
<html>
<head>
	<title>Insert News</title>
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
		div
		{
			margin-top: 150px;
		}
		.news
		{
			margin-top: -10px;
			margin-left: 260px;
			
		}
		table
		{
			text-decoration: none;
		}
		a
		{
			 text-decoration: none;
			 color: black;
		}
		#search
		{
			margin-top: -50px;
			width: 99.6%;
			background-color: #bab9b9;
			margin-left: 2px;
		}
		label
		{
			margin-left: 77%;
		}
		h1
		{
			position: absolute;
			top: 80px;
			left: 330px;
		}
		input, textarea
		{
			font-family: century Gothic;
			font-size: 15px;
		}
		#submit
    	{
    		border: 0px;
			background-color: #006837;
 			box-shadow:none;
			position: absolute;
			margin-top: 0px;
			margin-left: 835px;
			color: white;
			padding: 10px;
			width: 200px;
			font-family: Century Gothic;
    	}
	</style>
</head>
<body>
<div><?php include("includes/navigation.php"); ?></div>
<form method="post" enctype="multipart/form-data">
<h1>Insert News</h1>
<div class="news">
	<table class="tblcolor" align="center" border="0">
			<td align="right">News Title:</td>
			<td><input type="text" name="title" size="50" required></td>
		</tr>
		<tr>
			<td align="right">News Author:</td>
			<td><input type="text" name="author" size="50" required></td>
		</tr>
		<tr>
			<td align="right">News Content:</td>
			<td><textarea name="content" cols="60" rows="15"></textarea></td>
		</tr>
		<tr>
			<td align="right">News Image:</td>
			<td><input type="file" name="image"></td>
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
	$news_title = $_POST['title'];
	$news_author = $_POST['author'];
	$news_date = date('F d, Y');
	$news_content = $_POST['content'];
	$news_image = $_FILES['image']['name'];
	$image_tmp = $_FILES['image']['tmp_name'];

	if($news_title && $news_author && $news_content)
	{
		move_uploaded_file($image_tmp, "images/$news_image");

		$insert_query = "insert into tblnews(news_title, news_author, news_date, news_content, news_image) values ('$news_title', '$news_author','$news_date','$news_content','$news_image')";
		if(mysql_query($insert_query))
		{
			echo "<script>alert('News Added!'); 
			window.location.replace('view_news.php')</script>";
		}
	}

}

?>