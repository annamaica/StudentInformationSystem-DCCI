<!DOCTYPE html>
<html>
<head>
	<title>Programs</title>
	<style type="text/css">
		body
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
		table
		{
			text-align: center;
			text-decoration: none;
		}
		.prog
		{
			margin-top: 150px;
        	margin-left: 250px;
		}	
		h2
		{
			position: absolute;
			top: 100px;
			left: 270px;
		}
		a
		{
			 text-decoration: none;
			 color: black;
		}
		.addprog
   		{
        	position: absolute;
        	margin-top: -50px;
        	margin-left: 1190px;
        	padding: 5px;
    	}
    	#button
    	{
    		border: 0px;
			background-color: #006837;
 			box-shadow:none;
			position: absolute;
			margin-top: 0px;
			margin-left: -41px;
			color: white;
			padding: 10px;
			width: 200px;
			font-family: Century Gothic;
    	}
	</style>
</head>
<body>
<div><?php include('includes/navigation.php'); ?></div>
<h2>Programs</h2>
<div class="addprog">
    <a href="add_program.php"><button id="button">Add Program</button></a>
</div>
<div class="prog">
	<table class="tblcolor" align="center" border="0">
		<tr>
			<th>Program Code</th>
			<th>Program Title</th>
		</tr>
			<?php
					$output = mysql_query("SELECT * FROM tblprogram");

					while ($row = mysql_fetch_array($output)) {
					$programid = $row['Program_ID'];
					$programcode = $row['Program_code'];
					$programtitle = $row['Program_Title'];

					echo "<tr><td><a href=\"#\"> $programcode </td>
						<td> $programtitle </td></tr>";
					}
			?>
	</table>
</div>
</body>
</html>