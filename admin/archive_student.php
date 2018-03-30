<!DOCTYPE html>
<html>
<head>
	<title>Archive</title>
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
		.Students
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
<body>
<?php include('includes/navigation.php'); ?>
<h1>Students</h1>
<div class="Students">
	<div id="search">
	 	<label class="search">Search:</label>
			<input type="text" name="txtSearch" class="txtsearch">
	</div>
	<div class="buttons">
	<form method="post">
		<input type="submit" name="delete" value="Permanently Delete"/>
		<input type="submit" name="restore" value="Restore"/>
	</div>
	<table class="tblcolor" align="center" border="0">
		<tr>
			<th><input type="checkbox" onclick="toggle(this);" class= "checkall"></th>
			<th>Student Number</th>
			<th>Student Name</th>
			<th>Program</th>
		</tr>
		<tr border="0" align="center">
			<?php

					$per_page = 5;
					$pages_query = mysql_query("SELECT COUNT('Student_Number') FROM archive_student");
					$pages = ceil(mysql_result($pages_query, 0) / $per_page);
	
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_page;
	
					$output = mysql_query("SELECT * FROM archive_student LIMIT $start, $per_page");


						while ($row = mysql_fetch_assoc($output)) {
						$studentnum = $row['Student_Number'];
						$lastname = $row['Last_Name'];
						$firstname = $row['First_Name'];
						$middlename= $row['Middle_Name'];
						$street = $row['Street'];
        				$barangay = $row['Barangay'];
        				$muni = $row['Municipality'];
        				$district = $row['District'];
        				$province = $row['Province'];
        				$cnum = $row['Contact_Number'];
        				$emailadd = $row['Email_Address'];
        				$gender = $row['Gender'];
        				$dob = $row['Date_of_Birth'];
        				$age = $row['Age'];
        				$civilstat = $row['Civil_Status'];
        				$student_image = $row['Student_Image'];
        				$program = $row['Program'];
        				$batch = $row['Batch'];
        				$num = $row['num'];
        				$grade = $row['Grade'];
						$grade_equi = $row['Grade_Equivalent'];
						$username = $row['User_Name'];
						$pword = $row['Pword'];
						$type = $row['User_Type'];

						echo "<tr><td id='checkbox'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$row['Student_Number']."'></td>
						<td>$studentnum</td>
						<td> $lastname $firstname $middlename </td><td> $program </td></tr>";
				}
			?>
	</table>
	<center>
			<?php  
				$prev = $page - 1;
				$next = $page + 1;
	
				if(!($page<=1)){
				echo "<a href='students.php?page=$prev'>Prev</a> ";
				}

				if($pages>=1 && $page<=$pages){
	
				for($x=1;$x<=$pages;$x++){
				echo ($x == $page) ? '<strong><a href="?page='.$x.'">'.$x.'</a></strong> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
			
				}
	
			}
			
			if(!($page>=$pages)){
				echo "<a href='students.php?page=$next'>Next</a>";
			}
			?>
	</center>
</form>
</div>
</body>
</html>

<?php
	if (isset($_POST['delete'])){
		if(!empty($_POST['checkbox'])) {
    		foreach($_POST['checkbox'] as $check) {
			mysql_query("DELETE FROM archive_student WHERE Student_Number='".$check."'");
			echo "<script>alert('Student has been deleted!');
			window.location.replace('archive_student.php');
			</script>";
    		}
   		}
   	}

   	if (isset($_POST['restore'])){
		if(!empty($_POST['checkbox'])) {
    		foreach($_POST['checkbox'] as $check) {
			mysql_query("INSERT INTO tblstudent (Student_Number,Last_Name,First_Name,Middle_Name,Street,Barangay,Municipality,District,Province,Contact_Number,Email_Address,Gender,Date_of_Birth,Age,Civil_Status,Student_Image,Program,Batch,num) values ('$studentnum','$lastname','$firstname','$middlename','$street','$barangay','$muni','$district','$province','$cnum','$emailadd','$gender','$dob','$age','$civilstat','$student_image','$program','$batch','$num')");
			mysql_query("INSERT INTO tblstudent_grade values ('$studentnum', '$grade', '$grade_equi')");
			mysql_query("INSERT INTO tbluser values ('$studentnum','$username','$pword','$type')");

			mysql_query("DELETE FROM archive_student WHERE Student_Number='".$check."'");

			echo "<script>alert('Student has been restored!');
			window.location.replace('archive_student.php');
			</script>";
    		}
   		}
   	}


?>