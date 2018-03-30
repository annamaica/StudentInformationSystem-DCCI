<!DOCTYPE html>
<html>
<head>
	<title>Account Picture</title>
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
		.editoptions
		{
			margin-top: 110px;
			margin-left: 300px;
		}
		#edit
		{
			position: absolute;
			margin-top: -100px;
			margin-left: 800px;
		}
		#cancel
		{
			margin-top: -20px;
			margin-left: 1000px;
			position: absolute;
		}
		 #prevpic
        {
        	border: 1px solid gray;
        }
	</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<input type="submit" name="cancel" value="Cancel" id="cancel">
<meta charset = "UTF-8">

<?php
	include('../admin/includes/connection.php');
	session_start();

	$username = $_SESSION['username'];
	$output = mysql_query("SELECT * FROM tbluser where User_Name = '$username'");

	while ($row = mysql_fetch_array($output)) {
				$id = $row['User_ID'];

				$a= mysql_query("SELECT * FROM tblemployee where Employee_Number = '$id'");

				while ($row = mysql_fetch_array($a)) {
					$id = $row['Employee_Number'];
					$lname = $row['Last_Name'];
					$fname = $row['First_Name'];
					$mname = $row['Middle_Name'];
					$picture = $row['Employee_Image'];

					$_SESSION['employeenum'] = $id;
				}
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
		<img src="../admin/images/<?php echo $picture; ?>" height="165px" width="165px" id="logo">
		<li><a href="dashboard_teacher.php">Dashboard</a></li>
		<li><a href="profile_teacher.php">Profile</a></li>
		<li><a href="courses_teacher.php">Courses</a></li>
		<li><a href="">News</a></li>
		<li><a href="account_settings.php">Settings</a></li>
	</ul>
</div>
<div class="editoptions">
<h2>Account Picture</h2>

		<img src="../admin/images/<?php echo $picture; ?>" width="200px" height="200px" id="prevpic">
		<img src="../admin/images/<?php echo $picture; ?>" width="100px" height="100px" id="prevpic">
		<img src="../admin/images/<?php echo $picture; ?>" width="50px" height="50px" id="prevpic">
		<br>
		<input type="file" name="image" id="file">
		<input type="submit" name="upload" value="Upload">
	
</div>
<div><?php include('includes/footer.php'); ?></div>
</form>
</body>
</html>
<?php
	if (isset($_POST['cancel'])) {
		echo "<script>window.location.replace('profile_teacher.php');</script>";
	}

	if (isset($_POST['upload'])) {

		$account_image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];

		$target_dir = "../admin/images/";
		$target_file = $target_dir . basename($_FILES['image']['name']);
		$imagefiletype = pathinfo($target_file,PATHINFO_EXTENSION);

		if($imagefiletype=="jpg" || $imagefiletype=="JPG" || $imagefiletype=="jpeg" || $imagefiletype=="JPEG" ||
			$imagefiletype=="png" || $imagefiletype=="PNG" || $imagefiletype=="bmp" ||$imagefiletype=="BMP"){


			if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
						mysql_query("UPDATE tblemployee set Employee_Image='$account_image' WHERE Employee_Number = '$id'");
						$register = mysql_affected_rows();

			 			echo "<script>alert('Account Image Updated!');
         					 window.location.replace('profile_teacher.php');</script>";
                    }
                }
            else {
				echo "<script>alert('Invalid Picture Format');
       					window.location.replace('edit_picture.php?account=$id');
       			</script>";
			}
  		}
?>


