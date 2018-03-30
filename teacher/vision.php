<!DOCTYPE html>
<html>
<head>
	<title>Vision</title>
	<style type="text/css">
	.vision
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
	<div class="vision">	
		<?php
			include('../admin/includes/connection.php');

			$output= mysql_query("SELECT vision from tblabout");

			while ($row = mysql_fetch_assoc($output)) {
				$vision= $row['vision'];
			}
		?>

		Vision
		<?php echo $vision; ?>
	</div>
</form>
</body>
</html>
