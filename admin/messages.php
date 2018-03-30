<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
	<style type="text/css">
		body
			{
				font-family: Century Gothic;
			}
		.heaad
		{
			background-color: #006837;
			height: 100px;
			width: 1000px;
			margin-left: 300px;
			margin-top: 80px;
			text-indent: 30px;
			color: white;
		}
		.linkes
		{
			border: 1px solid #cfcfcf;
			height: 500px;
			width: 998px;
			margin-left: 300px;
			margin-top: 0px;
		}
		.tblcolor
		{
			text-align: center;
			
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
				padding: 20px;
			}
			.tblcolor td
			{
				padding: 2px;
			}
			.del
			{
				cursor: pointer;
			}
	</style>
	<script>
		function toggle(source) 
		{
    		var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    		for (var i = 0; i < checkboxes.length; i++)
    		{
        		if (checkboxes[i] != source)
        		{
            	checkboxes[i].checked = source.checked;

        		}
    		}
		}
	</script>
</head>
<body>
<div><?php include('includes/navigation.php'); ?></div>
<form method="post">
	<div class="heaad">
		<h2>Messages</h2>
		<input type="submit" name="delete" value="Delete"/>
	</div>
	<div class="linkes">
		<table class="tblcolor" style="width:100%; align="center" ">
			<th><input type="checkbox" onclick="toggle(this);" class= "checkall"></th>
			<th>Name</th>
			<th>Subject</th>
			<th>Status</th>
			<th>Date</th>

				<?php

					$output = mysql_query("SELECT * FROM tblmessage");

						while ($row = mysql_fetch_assoc($output)) {
							$messagenum = $row['Message_ID'];
							$name = $row['Name'];
							$subj = $row['Subject'];
							$status = $row['Message_Status'];
							$date = $row['Message_Date'];

								echo "<tr><td id='checkbox'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$row['Message_ID']."'></td>
								<td>$name</td><td><a href=\"message_view.php?message=$messagenum\"> $subj </a></td><td>$status</td><td>$date</td></tr>";
					}	
				?>
		</table>
	</div>
</form>
</body>
</html>

<?php
	if (isset($_POST['delete'])){
		if(!empty($_POST['checkbox'])) {
    		foreach($_POST['checkbox'] as $check) {
			mysql_query("DELETE FROM tblmessage WHERE Message_ID='".$check."'");
			echo "<script>('Message has been deleted!');
			window.location.replace('messages.php');
			</script>";
    		}
   		}
   	}
?>