<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<style type="text/css">
	.news
	{
		height: 400px;
		width: 230px;
		margin-left: 1100px;
		margin-top: 100px;
		background-color: gray;
	}
	.date
	{
		font-size: 12px;
	}
	.newshead
	{
		text-align: center;
		margin: 10px;
	}
</style>
<body>
<div><?php include('includes/navigation.php'); ?></div>
<div class="news">
	<h2 class="newshead">News</h2>
	<?php

		$select_news = mysql_query("SELECT * from tblnews");
		
		while ($row=mysql_fetch_array($select_news)) {

			$news_id = $row['news_id'];
			$news_title = $row['news_title'];
			$news_author = $row['news_author'];
			$news_date = $row['news_date'];
			$news_content = substr($row['news_content'],0,100);
			$news_image = $row['news_image'];

			echo "<table>";
			echo "<tr><td><a href='pages.php?newsnumber=$news_id'>$news_title</a></td></tr>
			<tr><td class='date'>$news_date</td></tr>
			<tr><td>$news_content</td></tr>";
		}
	?>
</div>
<div class="announcements">
	
</div>
</body>
</html>