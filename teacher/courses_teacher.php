<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
	<style type="text/css">
	.subjects
	{
		margin-left: 300px;
		margin-top: 200px;
		color: black;
	}
	#subj
	{
		color: black;
	}
	#entry{
	border: 1px solid gray;
	padding: 20px;
	width: 580px;
	position: fixed;
	top: 160px;
	left: 350px;
	z-index: 1;
	background-color: #85cc00;
	display: none;
}
	</style>
</head>
<body>
<form method="post">
<div class="subjects">
	<table>
			<th>Program Code</th>
			<th>Program Title</th>
	<?php
		include('includes/navigation.php');

		$employee_subjects = $_SESSION['employeenum'];

		$output = mysql_query("SELECT * FROM tblsubjectteacher where Employee_Number = '$employee_subjects'");

		while($viewsubjecthold=mysql_fetch_array($output)){
				$subjid= $viewsubjecthold["Program_ID"];

				$a = mysql_query("SELECT * FROM tblprogram WHERE Program_ID = '$subjid'");


				while ($row = mysql_fetch_array($a)) {
					$subjectcode = $row['Program_code'];
					$subjecttile = $row['Program_Title'];

					
					echo "<tr><td>$subjectcode</td>
					<td><a href=\"subject_students.php?subjectstudent=$subjecttile\" id='subj'>$subjecttile</a>"."</td></tr>";
				}
			}
	?>
</table>
</div>
</form>
</body>
</html>