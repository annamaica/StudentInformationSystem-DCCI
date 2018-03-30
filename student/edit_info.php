<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		body
		{
			font-family: Century Gothic;
			color: black;
		}
		.welcome
		{
			font-size: 15px;
			font-family: 'century gothic';
			background-color: #006837;
			width: 100%;
			height: 30px;
			padding: 15px;
			color: white;
			position: fixed;
			top: 0px;
			left: 0px;
			z-index: 2;
			padding-bottom: 10px;	
		}
		label
		{
			margin-left: 1100px;
			margin-top: 10px;
		}
		#picture
		{
			position: absolute;
			left: 1070px;
			top: 8px;
			border: 1px solid white;
			
		}
		.footer
		{
			font-size: 15px;
			font-family: century gothic;
			background-color: #006837;
			width: 98.55%;
			padding: 10px;
			color: white;
			position: absolute;
			left: 0px;
			bottom: 0px;
			right: 0px;
			z-index: 3;
		
		}
		.links
		{
			position: absolute;
			left: 900px;
			top: 20px;
			text-decoration: none;
			color: white;
			font-size: 15px;
		}
		
		.sidebar
		{
			position: absolute;
			left: 0px;
			bottom: 0px;
			top: 34px;
			z-index: 1;
			
		}
		hr
		{
			color: white;
			position: absolute;
			top: 100px;
			left: 160px;
			width: 500px
		}
		p
		{
			position: absolute;
			color: black;
			top: 60px;
			left: 200px;
		}
		a
		{
			text-decoration: none;
			color: white;
		}
		#logo
		{
			position: absolute;
			top: 20px;
			left: 45px;
		}
		ul 
		{
	    	list-style-type: none;
	    	margin-left: 0px;
	   		padding-left: 0px;
	   		padding-top: 170px;
	    	width: 250px;
	    	height: 375px;
	    	background-color: #e8e8e8;
	    	margin-bottom: 0;
	    ;
		}
		li a 
		{
	    	display: block;
	    	color: #000;
	    	margin: 2px;
	    	padding: 19px;
	    	text-decoration: none;
	    	font-size: 15px;
	    	text-align: left;	
	    	border-bottom: 1px solid gray;
		}
		li a:hover 
		{
	    	background-color: rgb(101,169,137);
	    	padding: 22px;
	   	 	color: white;
		}	
		.social
		{
			margin-left: 1201px;
		}

		#fb:hover {
        	background-color: rgba(0,0,0,0.5);
        	border-radius: 20px;
        }
        #twitter:hover {
        	background-color: rgba(0,0,0,0.5);
        	border-radius: 20px;
        }
        #ig:hover {
        	background-color: rgba(0,0,0,0.5);
        	border-radius: 20px;
        }
		.dropbtn {
    		cursor: pointer;
    		position: absolute;
    		right: 25px;
    		bottom: -35px;
		}
		.dropdown {
    		
    		float: right;
    		position: relative;
    		display: inline-block;
		}
		.dropdown-content {
   			display: none;
    		position: absolute;
    		background-color: #f9f9f9;
    		min-width: 160px;
    		overflow: auto;
    		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    		right: 0;
		}

		.dropdown-content a {
    		color: black;
	    	padding: 5px;
	    	text-decoration: none;
	    	display: block;
		}

		.dropdown:hover .dropdown-content {
	    		display: block;
	    		background-color: rgb(206,255,206);
	    		position: absolute;
	    		top: 30px;
		}
		.programmers{
			position: absolute;
			top: 20px;
		}
		.editinfo
		{
			margin-top: 110px;
			margin-left: 300px;
		}
		#cancel
		{
			margin-top: -20px;
			margin-left: 1000px;
			position: absolute;
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
	</script>
</head>
<body>
<form method="post">
<input type="submit" name="cancel" value="Cancel" id="cancel">
<meta charset = "UTF-8">

<?php
	include('../admin/includes/connection.php');

				$edit_id = $_GET['account'];

				$a= mysql_query("SELECT * FROM tblstudent where Student_Number = '$edit_id'");

				while ($row = mysql_fetch_array($a)) {
					$id = $row['Student_Number'];
					$lname = $row['Last_Name'];
					$fname = $row['First_Name'];
					$mname = $row['Middle_Name'];
					$street = $row['Street'];
					$barangay = $row['Barangay'];
					$muni = $row['Municipality'];
					$district = $row['District'];
					$prov = $row['Province'];
					$contact = $row['Contact_Number'];
					$email = $row['Email_Address'];
					$gender = $row['Gender'];
					$dob = $row['Date_of_Birth'];
					$age = $row['Age'];
					$civilstat = $row['Civil_Status'];
					$picture = $row['Student_Image'];
				
			}
	?>
<div class="welcome">
	<img src="../admin/images/<?php echo $picture; ?>" width="30px" height="30px" id="picture">
	<label><?php echo $fname." ".$lname; ?></label>
	<div class="dropdown">
  		<img src="../icons/dropdown.png" height="50px" width="50px" class="dropbtn">
  		<div class="dropdown-content">
  			<a href="#">Logout</a>
  		</div>
  </div>
</div>
<div class="sidebar">
	<ul>
		<img src="../admin/images/<?php echo $picture; ?>" height="160px" width="150px" id="logo">
		<li><a href="dashboard_student.php">Dashboard</a></li>
		<li><a href="grades.php">Grades</a></li>
		<li><a href="">News</a></li>
		<li><a href="profile_student.php">Profile</a></li>
		<li><a href="account_settings.php">Settings</a></li>
</div>
<div class="editinfo">
	<h2>Edit Information</h2>
	<table>
		<tr><td>First Name:</td><td><input type="text" name="txtfname" value="<?php echo $fname; ?>" required></td></tr>
		<tr><td>Middle Name:</td><td><input type="text" name="txtmname" value="<?php echo $mname; ?>"></td></tr>
		<tr><td>Last Name:</td><td><input type="text" name="txtlname" value="<?php echo $lname; ?>" required></td></tr>
		<tr><td>Street:</td><td><input type="text" name="txtstreet" value="<?php echo $street; ?>"></td></tr>
		<tr><td>Barangay:</td><td><input type="text" name="txtbarangay" value="<?php echo $barangay; ?>"></td></tr>
		<tr><td>Municipality:</td><td><input type="text" name="txtmuni" value="<?php echo $muni; ?>"></td></tr>
		<tr><td>District:</td><td><input type="text" name="txtdistrict" value="<?php echo $district; ?>"></td></tr>
		<tr><td>Province:</td><td><input type="text" name="txtprov" value="<?php echo $prov; ?>"></td></tr>
		<tr><td>Contact Number:</td><td><input type="text" name="txtcontact" value="<?php echo $contact; ?>" required></td></tr>
		<tr><td>Email:</td><td><input type="email" name="txtemail" value="<?php echo $email; ?>" required></td></tr>
		<tr><td>Gender:</td><td><input type="text" name="txtgender" value="<?php echo $gender; ?>" required></td></tr>
		<tr><td>Date of Birth:</td><td><input type="date" name="dob" id="date" onchange="getAge();" placeholder="MM-DD-YYYY" maxlength="10" value="<?php echo $dob; ?>"></td></tr>
		<tr><td>Age:</td><td><input type="text" name="age" id="age" value="<?php echo $age; ?>"></td></tr>
		<tr><td>Civil Status:</td><td><select name="civilstatus" value="<?php echo $civilstat; ?>" required>
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
	<input type="submit" name="submit" id="update" value="Update">
</div>
<div><?php include('includes/footer.php'); ?></div>
</form>
</body>
</html>
<?php
	if (isset($_POST['cancel'])) {
		echo "<script>window.location.replace('profile_student.php');</script>";
	}

	if(isset($_POST['submit'])){
    $update_id = $_GET['account'];
    $newlastname = $_POST['txtlname'];
    $newfirstname = $_POST['txtfname'];
    $newmiddlename= $_POST['txtmname'];
    $newstreet = $_POST['txtstreet'];
    $newbarangay = $_POST['txtbarangay'];
    $newmunicipality = $_POST['txtmuni'];
    $newdistrict = $_POST['txtdistrict'];
    $newprovince = $_POST['txtprov'];
    $newcontactnum = $_POST['txtcontact'];
    $newemailadd = $_POST['txtemail'];
    $newgender = $_POST['txtemail'];
    $newdob = $_POST['dob'];
    $newage = $_POST['age'];
    $newcivilstatus = $_POST['civilstatus'];


    if($newlastname && $newfirstname || $newmiddlename && $newstreet && $newbarangay && $newmunicipality && $newdistrict && $newprovince && $newcontactnum && $newemailadd && $newgender && $newdob && $newage && $newcivilstatus)
    {
      $update_query = "UPDATE tblstudent set Last_Name='$newlastname',First_Name='$newfirstname',Middle_Name='$newmiddlename',Street='$newstreet',Barangay='$newbarangay',Municipality='$newmunicipality',District='$newdistrict',Province='$newprovince',Contact_Number='$newcontactnum',Email_Address='$newemailadd',Gender='$newgender',Date_of_Birth='$newdob',Age='$newage',Civil_Status='$newcivilstatus'where Student_Number='$update_id'";

        if(mysql_query($update_query))
        {
          echo "<script>alert('Student Updated!');
          window.location.replace('profile_student.php');</script>";
        }
    }
    else
    {
      echo "<script>alert('Any of the fields are empty')</script>";
    }
  }
?>