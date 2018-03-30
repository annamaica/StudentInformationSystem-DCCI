<?php
include('includes/connection.php');
session_start();

	if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = md5($_POST["password"]);

		$output = mysql_query("SELECT * FROM tbladmin WHERE User_Name='$username' AND Pass_Word='$password'");
		$rowcount = mysql_num_rows($output);

		if($rowcount==1){

			$_SESSION['session']='Admin';
			echo "<script>alert('Login Successful!');
			window.location.replace('dashboard.php')</script>";
		}
		else{
			echo "<script>alert('Incorrect Username or Password');
			window.location.replace('index.php')</script>";
		}
	}
?>