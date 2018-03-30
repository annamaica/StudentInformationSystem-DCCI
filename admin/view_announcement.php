<!DOCTYPE html>
<html>
<head>
	<title>Announcements</title>
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
	</style>
</head>
<body>
<?php include('includes/navigation.php'); ?>
<h1>Announcements</h1>
<div class="news">
	<table class="tblcolor" align="center" border="0">
		<tr>
			<th>Announcement Title</th>
			<th>Announcement Content</th>
			<th>Announcement Date</th>
			<th>Announcement Type</th>
			<th>Command</th>
		</tr>
		<tr border="0" align="center">
			<?php
					include("includes/connection.php");

					$output = mysql_query("SELECT * FROM tblannouncements");

					while ($row = mysql_fetch_array($output)) {
							$announcement_id = $row['announce_id'];
							$announcement_title = $row['announcement_title'];
							$announcement = $row['announcement'];
							$announcement_date = $row['announce_date'];
							$announcement_type = $row['announce_type'];

							echo "<tr><td><a href=\"edit_announcement.php?news=$announcement_id\"> $announcement_title </td>
							<td> $announcement </td><td> $announcement_date </td><td> $announcement_type </td><td><a onCLick=\"javascript:return confirm('Are you sure you want to delete the announcement?');\" href=\"delete.php?deleteannoucement=$announcement_id\"><img src='../icons/deleteicon.png' width='20px' height='18px'></a></td></tr>";
					}
			?>
</table>
</div>
</body>
</html>