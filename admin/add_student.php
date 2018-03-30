<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
	<style type="text/css">
	body
	{
		font-family: Century Gothic;
	}
    .aboutstudent1
    {
       	margin-top: 150px;
        margin-left: 320px;
	    width: 500px;
        height: 280px;
    }
    .aboutstudent2
    {
       	margin-top: -345px;
        margin-left: 820px;
	    width: 500px;
        height: 280px;
    }
    input, textarea, select
	{
		font-family: century Gothic;
		font-size: 15px;
	}
	td
	{
		padding: 5px;
	}
	.programtable
	{
		margin-top: 70px;
        margin-left: 320px;
	    width: 860px;
        height: 100px;
	}
	.reg
	{
		margin-left: 900px;
		margin-top: -100px;
		position: absolute;
	}
	.errorname
	{
		margin-left: 320px;
		margin-top: -20px;
		position: absolute;
		color: red;
		font-size: 12px;
	}
	.error
	{
		color: red;
	}
	</style>
	</style>
	<script type="text/javascript">
		function getAge(){
   	 	var dob = document.getElementById('date').value;
    	dob = new Date(dob);
    	var today = new Date();
    	var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    	document.getElementById('age').value=age;
		}
	</script>
</head>
<body>
<div><?php include("includes/navigation.php"); ?></div>

 
 <form method="post" action="add_studentprocess.php" enctype="multipart/form-data">
 <span class="errorname"> * required fields </span>
 <table border="0" width="30%" class="aboutstudent1">
	<tr><td width="50%"> Student Number: <span class="error"> *</span></td>
	<td><?php 
		$output = mysql_query("SELECT num FROM tblstudent ORDER BY num DESC LIMIT 1;");
		$rowcount = mysql_num_rows($output);

		if ($rowcount == 0) {
				$num = "00001";

				echo $num;

				$_SESSION['studentnumber'] = $num;
			}
		else{
			while($outputhold=mysql_fetch_array($output)){
				$outputhold['num'];
				$num = $outputhold['num']+1;
				$numhold =  str_pad($num, 5, "0", STR_PAD_LEFT);
				echo $numhold;

				$_SESSION['studentnumber'] = $numhold;
			}
		}
		?></td></tr>
	<tr><td width="50%">Last Name: <span class="error"> *</span></td>
	<td><input type="text" name="lastname" required/></td></tr>
	<tr><td width="50%">First Name: <span class="error"> *</span></td>
	<td><input type="text" name="firstname" required/></td></tr>
	<tr><td width="50%">Middle Name: </td>
	<td><input type="text" name="middlename"/></td></tr>
	<tr><td width="50%">Street: <span class="error"> *</span></td>
	<td><input type="text" name="street" required/></td></tr>
	<tr><td width="50%">Barangay: <span class="error"> *</span></td>
	<td><input type="text" name="barangay" required/></td></tr>
	<tr><td width="50%">Municipality: <span class="error"> *</span></td>
	<td><input type="text" name="municipality" required/></td></tr>
	<tr><td width="50%">District: <span class="error"> *</span></td>
	<td><input type="text" name="district" required/></td></tr>
	<tr><td width="50%">Province: <span class="error"> *</span></td>
	<td><input type="text" name="province" required/></td></tr>
</table>
<table width="30%" border="0" class="aboutstudent2">
	<tr><td width="50%">Contact Number: <span class="error"> *</span></td>
	<td><input type="text" name="contactnum" required/></td></tr>
	<tr><td width="50%">Email Address: <span class="error"> *</span></td>
	<td><input type="text" name="emailadd" required/></td></tr>
	<tr><td width="50%">Gender: <span class="error"> *</span></td>
	<td width="50%"><select name="gender">
		<option>-</option>
		<option>Female</option>
		<option>Male</option>
	</select></td></tr>
	<tr><td width="50%">Date of Birth: <span class="error"> *</span></td>
	<td><input type="date" name="dob" id="date"onblur="getAge();" placeholder="MM-DD-YYYY" maxlength="10" required/></td></tr>
	<tr><td width="50%">Age: </td><td><input type="text" name="age" id="age"/></td></tr>
	<tr><td width="50%">Civil Status: <span class="error"> *</span></td>
	<td><select name="civilstatus">
		<option>-</option>
		<option>Single</option>
		<option>Married</option>
	</select></td></tr>
	<tr><td width="50%">Student Image:</td><td><input type="file" name="image"></td></tr>	
</table>
<table width="30%" border="0" class="programtable">
	<tr><td>Program<span class="error"> *</span></td>
	<td><select name="program">
		<?php
			$data = mysql_query("SELECT * FROM tblprogram");

			while($datahold =mysql_fetch_array($data)){
			echo"<option>";
			echo $datahold['Program_Title'];
			echo"</option>";

			$_SESSION['programcode'] = $datahold['Program_code'];

			}
		?>
	</select></td></tr>
	<tr><td>Batch:</td><td><input type="text" name="batch" required></td></tr>
</table>
	<input type="submit" value="Register" name="register" class="reg" />
</form>

</body>
</html>
