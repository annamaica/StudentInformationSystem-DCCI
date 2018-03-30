<!DOCTYPE html>
<html>
<head>
	<title>News</title>
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
			.tblcolor th
			{
				padding: 10px;
			}
		.news
		{
			margin-top: 220px;
        	margin-left: 250px;
			
		}
		table
		{
			text-align: center;
			text-decoration: none;
		}
		a
		{
			 text-decoration: none;
			 color: black;
		}
		#search
		{
			margin-top: 20px;
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
			top: 150px;
			left: 330px;
		}
		#button
    	{
    		border: 0px;
			background-color: #006837;
 			box-shadow:none;
			position: absolute;
			margin-top: -40px;
			margin-left: 1093px;
			color: white;
			padding: 10px;
			width: 200px;
			font-family: Century Gothic;
    	}
	</style>
</head>
<body>
<div><?php include("includes/navigation.php"); ?></div>
<h1>News</h1>
	<a href="insert_news.php"><button id="button">Insert News</button></a>
<div class="news">
	<table class="tblcolor" align="center" border="0">
		<tr>
			<th>News Title</th>
			<th>News Author</th>
			<th>News Date</th>
			<th>News Content</th>
			<th>News Image</th>
			<th>Command</th>
		</tr>
		<tr border="0" align="center">
			<?php
					include("includes/connection.php");

					$output = mysql_query("SELECT * FROM tblnews");

					while ($row = mysql_fetch_array($output)) {
							$news_id = $row['news_id'];
							$newstitle = $row['news_title'];
							$newsauthor = $row['news_author'];
							$newsdate = $row['news_date'];
							$newscontent = $row['news_content'];
							$newsimage = $row['news_image'];

							echo "<tr><td><a href=\"edit_news.php?news=$news_id\"> $newstitle </td>
							<td> $newsauthor</td><td> $newsdate </td><td> $newscontent </td><td><img src='images/$newsimage' width='80px' height '80px'></td><td><a onCLick=\"javascript:return confirm('Are you sure you want to delete the news?');\" href=\"delete.php?deletenews=$news_id\"><img src='../icons/deleteicon.png' width='20px' height='18px'></a></td></tr>";
					}
			?>
</table>
</div>
</body>
</html>