<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
		ul {
	    list-style-type: none;
	    margin: 170px;
	    margin-left: 0px;
	    padding: 0;
	    width: 250px;
	    height: 71%;
	    background-color: #77aa78;
	    padding-top: 135px; 
	    position: absolute;
	    left: 0px;
	    top: 0px;
	    bottom: 0px;
	    margin-top: 50px;
	    margin-bottom: 0px;
	    z-index: 1;
	}

	li a {
		padding: 20px;
	    display: block;
	    color: white;
	    padding: 20px;
	    text-decoration: none;
	    font-size: 16px;
	    border-bottom: 1px solid white;
	    text-indent: 10px;
	    ;	
	}
	li a:hover {
	    background-color: #9dd19f;
	    color: black;
	}	
	#logo{
		margin-top: -100px;
		margin-left: 50px;
		
	}
	.nav{
			font-size: 20px;
			font-family: century gothic;
			background-color: #006837;
			width: 100%;
			height: 30px;
			padding: 10px;
			color: white;
			position: fixed;
			top: 0px;
			left: 0px;

			z-index: 2;
	}
	.dropbtn {
    		cursor: pointer;
    		margin-top: -10px;
    		margin-right: 30px;
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
    	padding: 12px 16px;
    	text-decoration: none;
    	display: block;
		}

		.dropdown:hover .dropdown-content {
	    		display: block;
	    		background-color: #f1f1f1
		}
		#logout
		{
			font-family: "Century Gothic";
 			border: 0px;
			background-color: #6dd99b;
 			box-shadow:none;
 			height: 40px;
 			width: 150px;
	    	font-size: 17px;
	    	cursor: pointer;
		}
		.name
		{
			margin-left: 1140px;
		}
		hr
		{
			border: 0;
			border-top:1px solid white;
			height:1px;
			margin: 0px;

		}
		#ic
		{
			padding-right: 10px;

		}
	</style>
<body>
<form method="post">
<nav class = "nav">
	<label class="name">
		<?php
			include("connection.php");
				 $name = "SELECT First_Name FROM tbladmin";
				 $log = mysql_query($name);

				 while($row=mysql_fetch_array($log)){
					$firstname = $row['First_Name'];

					echo $firstname;
			}
		?>
	</label>		
	<div class="dropdown">
  			<img src="images/dropdown.png" height="50px" width="50px" class="dropbtn">
  				<div class="dropdown-content">
    				<input type="submit" value="Log Out" id="logout" name="logout">
  				</div>
	</div>
</nav>
		<?php
			 $query = "SELECT logo FROM tbldesign";
			 $log = mysql_query($query);

			 while($row=mysql_fetch_array($log)){
				$schoollogo = $row['logo'];
			}
		?>
		<ul>

			<img src="images/<?php echo $schoollogo; ?>" width="150px" height= "160px" id = "logo">
			<br><br><br>
			<li><a href="dashboard.php"><img src="images/dashboard.png" height="20px" id="ic">Dashboard</a></li>
			<li><a href="home.php"><img src="images/home-button.png" height="20px" id="ic">Home</a></li>
			<li><a href="cms.php"><img src="images/pencil.png" height="20px" id="ic">Manage Content</a></li>
			<li><a href="account_settings.php"><img src="images/setting.png" height="20px" id="ic">Settings</a></li>
		</ul>
</form>
</body>
</html>
<?php
	if(isset($_POST['logout'])){
		session_destroy();
		echo "<script>window.location.replace('index.php')</script>";
	}
?>
	

		


