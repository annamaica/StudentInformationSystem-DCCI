<!DOCTYPE html>
<html>
<head>
	<title>Mission</title>
	<style type="text/css">
	.missiontbl
	{
		font-family: century gothic;
		margin-left: 300px;
		color: black;
		margin-top: 200px;
	}
	</style>
</head>
<body>
<form method="post">
<?php include('includes/footer.php'); ?>
	<div class="missiontbl">	
		<?php
			include('admin/includes/connection.php');

			$output= mysql_query("SELECT about_values from tblabout");

			while ($row = mysql_fetch_assoc($output)) {
				$values= $row['about_values'];
			}
		?>

		Values
		<?php echo $values; ?>
	</div>
</form>
</body>
</html>
