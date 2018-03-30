<!DOCTYPE html>
<html>
<head>
	<title>Students</title>
	<style type="text/css">
		.students
		{
			margin-left: 300px;
			margin-top: 110px;
		}
		#studid
		{
			color: black;
		}
	</style>
</head>
<body>
<?php include('includes/navigation.php'); ?>
<form method="post">
<div class="students">
<table>
	<th>Student Number</th>
	<th>Student Name</th>
	<?php

		$edit_id = $_GET['subjectstudent'];

		$output = mysql_query("SELECT * FROM tblstudent WHERE Program = '$edit_id'");

		while ($row = mysql_fetch_array($output)) {
			$studentid = $row['Student_Number'];
			$lname = $row['Last_Name'];
			$fname = $row['First_Name'];
			$mname = $row['Middle_Name'];

			echo "<tr><td><a href=\"edit_grades.php?studentgrade=$studentid\" id='studid'>$studentid</a></td><td>$lname</td><td>$fname</td><td>$mname</td></tr>";
		}
	?>
</table>
</div>	
</form>
</body>
</html>