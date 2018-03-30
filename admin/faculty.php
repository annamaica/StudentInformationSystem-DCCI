<?php
	session_start();
	
	if(empty($_SESSION['session'])){
		echo "<script>window.location.replace('index.php')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Students</title>
</head>
		<style type="text/css">
			body, option
			{
				font-family: Century Gothic;
			}
			.tblcolor{
				width:100%; 
				margin: 5px;
				}
			.tblcolor td{
				padding:5px; 
			}
			.tblcolor tr{
				background: #bab9b9;
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
		.Faculty
		{
			margin-top: 290px;
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
			margin-top: -50px;
			width: 99.6%;
			background-color: #77aa78;
			margin-left: 7px;
			height: 40px;
			padding: 10px;
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
		.search
		{
			margin-left: 618px;
		}
		.txtsearch
		{
			width: 200px;
			font-size: 15px;
			font-family: Century Gothic;
			padding: 3px;
			margin-left: 5px;
		}
		#search
		{
			width: 1076px;
		}
		</style>
<body>
<div><?php include("includes/navigation.php"); ?></div>
<h1>Faculty</h1>
<div class="Faculty">
	<div id="search">
	 	<label class="search">Search:</label>
			<input type="text" name="txtSearch" class="txtsearch">
	</div>
	<table class="tblcolor" align="center" border="0">
		<tr>
			<th>Employee Number</th>
			<th>Employee Name</th>
		</tr>
		<tr border="0" align="center">
			<?php

					$per_page = 5;
					$pages_query = mysql_query("SELECT COUNT('Employee_Number') FROM tblemployee");
					$pages = ceil(mysql_result($pages_query, 0) / $per_page);
	
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_page;
	
					$output = mysql_query("SELECT * FROM tblemployee LIMIT $start, $per_page");


						while ($row = mysql_fetch_assoc($output)) {
						$employeenum = $row['Employee_Number'];
						$lastname = $row['Last_Name'];
						$firstname = $row['First_Name'];
						$middlename= $row['Middle_Name'];

						echo "<tr><td><a href=\"view_faculty.php?faculty=$employeenum\"> $employeenum </td>
						<td> $lastname $firstname $middlename </td></tr>";
				}
			?>
	</table>
	<center>
			<?php  
				$prev = $page - 1;
				$next = $page + 1;
	
				if(!($page<=1)){
				echo "<a href='faculty.php?page=$prev'>Prev</a> ";
				}

				if($pages>=1 && $page<=$pages){
	
				for($x=1;$x<=$pages;$x++){
				echo ($x == $page) ? '<strong><a href="?page='.$x.'">'.$x.'</a></strong> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
			
				}
	
			}
			
			if(!($page>=$pages)){
				echo "<a href='faculty.php?page=$next'>Next</a>";
			}
			?>
	</center>
</div>
</body>
</html>