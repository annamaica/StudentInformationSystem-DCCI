<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
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
	</style>
</head>
<body>
<form method="post">
<meta charset = "UTF-8";>

<?php
	include('../admin/includes/connection.php');

	$username = $_SESSION['username'];

	$output = mysql_query("SELECT * FROM tbluser where User_Name = '$username'");

	while ($row = mysql_fetch_array($output)) {
				$id = $row['User_ID'];
				$a = mysql_query("SELECT * FROM tblstudent where Student_Number = '$id'");

				while ($row = mysql_fetch_array($a)) {
					$id = $row['Student_Number'];
					$lname = $row['Last_Name'];
					$fname = $row['First_Name'];
					$mname = $row['Middle_Name'];
					$picture = $row['Student_Image'];

					$_SESSION['studentnum'] = $id;
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
		<?php
				$logopic = mysql_query("SELECT logo from tbldesign");

				while ($row=mysql_fetch_array($logopic)) {
					$pic = $row['logo'];
			}
		?>
		<img src="../admin/images/<?php echo $pic; ?>" height="160px" width="150px" id="logo">
		<li><a href="dashboard_student.php">Dashboard</a></li>
		<li><a href="grades.php">Grades</a></li>
		<li><a href="">News</a></li>
		<li><a href="profile_student.php">Profile</a></li>
		<li><a href="account_settings.php">Settings</a></li>
	</ul>
</div>
<div><?php include('includes/footer.php'); ?></div>
</form>
</body>
</html>