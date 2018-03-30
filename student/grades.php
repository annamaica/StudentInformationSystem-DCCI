<!DOCTYPE html>
<html>
<head>
	<title>Grade</title>
	<link rel="stylesheet" type="text/css" href="print.css" />
	<style type="text/css">
	#grade
	{
		margin-top: 100px;
		margin-left: 300px;
	}
	#gradeequivalent
	{
		margin-top: 100px;
		margin-left: 400px;
	}
	.btn
	{
		margin-top: 200px;
		margin-left: 400px;
	}
	</style>
	<script type="text/javascript">
		function PrintPreview() {

        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=1000,height=1000,location=no');
        
        popupWin.document.open();
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.close();
	}
	function hide(){
		var tohide = document.getElementById('printarea');

		tohide.style.display = "none";
	}
	</script>
</head>
<body onload="hide()">
<?php include ('includes/navigation.php');?>
<div id="studentgrade">
	<?php 
	$studentnumber = $_SESSION['studentnum'];

	$output = mysql_query("SELECT * FROM tblstudent_grade where Student_Number='$studentnumber'");

	while ($gradehold = mysql_fetch_array($output)) {
		echo "<div id='grade'>Grade: ".$gradehold['Grade']."</div>";
		echo "<div id='gradeequivalent'>Grade Equivalent: ".$gradehold['Grade_Equivalent']."</div>";
	}
?>
</div>

<div id="printarea">
<?php 
	$output = mysql_query("SELECT * FROM tblstudent_grade where Student_Number='$studentnumber'");

	while ($gradehold = mysql_fetch_array($output)) {
		echo "<div id='printgrade'>Grade: ".$gradehold['Grade']."</div>";
		echo "<div id='printgradeequivalent'>Grade Equivalent: ".$gradehold['Grade_Equivalent']."</div>";
	}

			$logopic = mysql_query("SELECT logo from tbldesign");

			while ($row=mysql_fetch_array($logopic)) {
				$pic = $row['logo'];
			}
?>
	<div class="header">
		<img src="../admin/images/<?php echo $pic; ?>" width="200px" height="200px" id="logodcci">
		<img src="../admin/images/citydasma.png" width="200px" height="200px" id="logodasma">
	</div>
</div>
<input type="button" value="Print Preview" class="btn" onclick="PrintPreview()"/>
</body>
</html>