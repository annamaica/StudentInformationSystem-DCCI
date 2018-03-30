<?php
include('includes/connection.php');
session_start();

	if(isset($_POST["update"])){
		if(empty($_POST["oldpword"])){
			$fname= $_POST["firstname"];
			$lname= $_POST["lastname"];
			$uname= $_POST["username"];
			$emailadd = $_POST["email"];
					$insert = mysql_query("UPDATE tbladmin SET First_Name='$fname', Last_Name='$lname', Email='$emailadd', User_Name='$uname'");

					echo "<script>alert('Account Updated Successfully!');
					window.location.replace('account_settings.php')</script>";
		}
		if(!empty($_POST["oldpword"])){
			if(md5($_POST["oldpword"])===$_SESSION["passwordold"]){
				if(!empty($_POST["newpword"]) && !empty($_POST['confirmpword'])){
					if($_POST["newpword"]===$_POST["confirmpword"]){
						$fname= $_POST["firstname"];
						$lname= $_POST["lastname"];
						$uname= $_POST["username"];
						$passhold = md5($_POST["confirmpword"]);
						
						$insert = mysql_query("UPDATE tbladmin SET First_Name='$fname',Last_Name='$lname',User_Name='$uname',Pass_Word='$passhold'");

						echo "<script>alert('Password Updated Successfully!');
						window.location.replace('account_settings.php')</script>";						
					}
					else{
						echo "<script>alert('Password do not match');
						window.location.replace('account_settings.php')</script>";
					}
				}
			}
			else{
				echo "<script>alert('Password is incorrect');
				window.location.replace('account_settings.php')</script>";
			}
		}
	}
?>