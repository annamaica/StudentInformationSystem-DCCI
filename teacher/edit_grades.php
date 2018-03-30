<!DOCTYPE html>
<html>
<head>
	<title>Edit Grade</title>
	<style type="text/css">
		.editgrade
		{
			margin-top: 150px;
			margin-left: 300px;
		}
	</style>
</head>
<body>
<div><?php include('includes/navigation.php'); ?></div>
<form method="post">
<div class="editgrade">
	<?php

		$edit_id = $_GET['studentgrade'];

		$output = mysql_query("SELECT * FROM tblstudent_grade WHERE Student_Number = '$edit_id'");

		while ($row = mysql_fetch_array($output)) {
			$grade = $row['Grade'];
			echo "Final Grade: <input type='text' name='txtgrade' value='$grade'>";
		}

?>
	<input type="submit" name="submit" value="Save">
</div>
</form>
</body>
</html>
<?php
	if (isset($_POST['submit'])) {
		$gradehold = $_POST['txtgrade'];

		if ($gradehold >= 75) {
			mysql_query("UPDATE tblstudent_grade SET Grade='$gradehold' WHERE Student_Number='$edit_id'");
			mysql_query("UPDATE tblstudent_grade SET Grade_Equivalent='Competent' WHERE Student_Number='$edit_id'");

			echo "<script>alert('Grade Updated!');
			window.location.replace('courses_teacher.php'); </script>";
		}
		else
		{
			mysql_query("UPDATE tblstudent_grade SET Grade='$gradehold' WHERE Student_Number='$edit_id'");
			mysql_query("UPDATE tblstudent_grade SET Grade_Equivalent='Not Yet Competent' WHERE Student_Number='$edit_id'");
			echo "<script>alert('Grade Updated!');
			window.location.replace('courses_teacher.php'); </script>";
		}

	}
?>