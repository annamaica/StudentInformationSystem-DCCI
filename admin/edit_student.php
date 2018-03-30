<?php  
include ("includes/connection.php");
session_start();

if(isset($_GET['edit'])){
  $edit_id = $_GET['edit'];
  $edit_query = "SELECT * from tblstudent where Student_Number='$edit_id'";

  $run_edit = mysql_query($edit_query);

  while($row=mysql_fetch_array($run_edit)){
        $studentnum = $row['Student_Number'];
        $_SESSION['studentnum'] = $studentnum;
        $lastname = $row['Last_Name'];
        $studentfirstname = $row['First_Name'];
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
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Student</title>
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
	#image
	{
		position: absolute;
		left: 940px;
		top: 455px;
	}
	#update
	{
		position: absolute;
		left: 950px;
		margin-top: -100px;
	}
	.linkes
    {
        border: 1px solid #cfcfcf;
        height: 40px;
        width: 998px;
        margin-left: 300px;
        margin-top: 0px;
    }
     .personalinfo
    {
        margin-top: 100px;
        margin-left: 50px;
        position: absolute;
        cursor: pointer;
    }
        .picture
    {
        margin-top: 100px;
        margin-left: 230px;
        position: absolute;
        cursor: pointer;
    }
    #picture
    {
    	margin-left: 500px;
    	margin-top: 200px;
    }
     #prevpic
    {
        border: 1px solid gray;
    }
    #updatephoto
    {
    	margin-top: 250px;
    	position: absolute;
    	left: 700px;
    }

	</style>
	<script type="text/javascript">
		function getAge(){
   	 	var dob = document.getElementById('date').value;
    	dob = new Date(dob);
    	var today = new Date();
    	var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
    	document.getElementById('age').value=age;
		}

		function info(){
			var info = document.getElementById("personalinfo");
			var picture = document.getElementById("picture");

			info.style.display = "block";
			picture.style.display = "none";
		}
		function picture(){
			var info = document.getElementById("personalinfo");
			var picture = document.getElementById("picture");

			info.style.display = "none";
			picture.style.display = "block";
		}
	</script>
</head>
<body onload="info()">
<div><?php include("includes/navigation.php"); ?></div>

 <form method="post" enctype="multipart/form-data">
 <?php
  include('edit_studentprocess.php');
 ?>
<div class="linkes">
<p class="personalinfo" onclick="info()"> Personal Info </p> 
<p class="picture" onclick="picture()"> Picture </p> 
</div>

<div id="personalinfo">
	<span class="errorname"> * required fields </span>
 <table border="0" width="30%" class="aboutstudent1">
	<tr><td width="50%"> Student Number: <span class="error"> *</span></td>
	<td><?php echo $studentnum; ?></td></tr>
	<tr><td width="50%">Last Name: <span class="error"> *</span></td>
	<td><input type="text" name="lastname" value="<?php echo $lastname; ?>" required/></td></tr>
	<tr><td width="50%">First Name: <span class="error"> *</span></td>
	<td><input type="text" name="firstname" value="<?php echo $studentfirstname; ?>" required/></td></tr>
	<tr><td width="50%">Middle Name: </td>
	<td><input type="text" name="middlename" value="<?php echo $middlename; ?>" /></td></tr>
	<tr><td width="50%">Street: <span class="error"> *</span></td>
	<td><input type="text" name="street" value="<?php echo $street; ?>" required/></td></tr>
	<tr><td width="50%">Barangay: <span class="error"> *</span></td>
	<td><input type="text" name="barangay" value="<?php echo $barangay; ?>" required/></td></tr>
	<tr><td width="50%">Municipality: <span class="error"> *</span></td>
	<td><input type="text" name="municipality" value="<?php echo $muni; ?>" required/></td></tr>
	<tr><td width="50%">District: <span class="error"> *</span></td>
	<td><input type="text" name="district" value="<?php echo $district; ?>" required/></td></tr>
	<tr><td width="50%">Province: <span class="error"> *</span></td>
	<td><input type="text" name="province" value="<?php echo $province; ?>" required/></td></tr>
</table>
<table width="30%" border="0" class="aboutstudent2">
	<tr><td width="50%">Contact Number: <span class="error"> *</span></td>
	<td><input type="text" name="contactnum" value="<?php echo $cnum; ?>" required/></td></tr>
	<tr><td width="50%">Email Address: <span class="error"> *</span></td>
	<td><input type="text" name="emailadd" value="<?php echo $emailadd; ?>" required/></td></tr>
	<tr><td width="50%">Gender: <span class="error"> *</span></td>
	<td width="50%"><select name="gender" value="<?php echo $gender; ?>" >
		<option>-</option>
		<?php
			if($gender =='Male'){
				echo "<option selected='true'>Male</option>";
				echo "<option>Female</option>";
			}
			if($gender=='Female'){
				echo "<option>Male</option>";
				echo "<option selected='true'>Female</option>";			
			}
		?>
	</select></td></tr>
	<tr><td width="50%">Date of Birth: <span class="error"> *</span></td>
	<td><input type="date" name="dob" id="date"onblur="getAge();" placeholder="MM-DD-YYYY" maxlength="10" value="<?php 

echo $dob; ?>" required/></td></tr>
	<tr><td width="50%">Age: </td><td><input type="text" name="age" id="age" value="<?php echo $age; ?>" /></td></tr>
	<tr><td width="50%">Civil Status: <span class="error"> *</span></td>
	<td><select name="civilstatus" value="<?php echo $civilstat; ?>" >
		<option>-</option>
		<?php
			if($civilstat =='Single'){
				echo "<option selected='true'>Single</option>";
				echo "<option>Married</option>";
			}
			if($civilstat =='Married'){
				echo "<option>Single</option>";
				echo "<option selected='true'>Married</option>";			
			}
		?>
	</select></td></tr>
</table>
<table width="30%" border="0" class="programtable">
	<tr><td>Program<span class="error"> *</span></td>
	<td><select name="program" value="<?php echo $program; ?>">
		<?php
			include('includes/connection.php');
			$data = mysql_query("SELECT * FROM tblprogram");

			while($datahold =mysql_fetch_array($data)){
				if($program==$datahold['Program_Title']){
					echo"<option selected='true'>";
					echo $datahold['Program_Title'];
					echo"</option>";
				}
				else{
					echo"<option>";
					echo $datahold['Program_Title'];
					echo"</option>";
				}
			}
		?>
	</select></td></tr>
</table>
	<input type="submit" name="submit" id="update" value="Update">
</div>
<div id="picture">
	Student Image:
	
	<input type="file" name="image">

	<img src="images/<?php echo $student_image; ?>" width="200px" height="200px" id="prevpic">
	<img src="images/<?php echo $student_image; ?>" width="100px" height="100px" id="prevpic">
	<img src="images/<?php echo $student_image;; ?>" width="50px" height="50px" id="prevpic">
	<input type="submit" name="upload" id="updatephoto" value="Update">
</div>
</form>
</body>
</html>