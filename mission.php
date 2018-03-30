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

			$output= mysql_query("SELECT mission from tblabout");

			while ($row = mysql_fetch_assoc($output)) {
				$mission= $row['mission'];
			}
		?>

		Mission
		<?php echo $mission; ?>
	</div>
</form>
</body>
</html>
