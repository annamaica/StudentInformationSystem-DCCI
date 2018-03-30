<?php
	include('admin/includes/connection.php');
	session_start();

		if(isset($_POST['login'])) {
			$username = $_POST['uname'];
			$password = md5($_POST['pword']);

			$username = stripcslashes($username);
			$password = stripcslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);

			$result = mysql_query("SELECT * from tbluser where User_Name= '$username' AND Pword= '$password'")
						or die ("failed to execute database".mysql_error());
			$rowcount = mysql_num_rows($result);

			if($rowcount>0){
				while ($row = mysql_fetch_array($result)) {
					$type = $row['User_Type'];

					if($type == "Student")
					{	
						$_SESSION['session']="User";
						$_SESSION['username'] = $username;
						$_SESSION['password'] = $password;
						echo "<script>alert('Successful you will be redirected');
						window.location.replace('student/dashboard_student.php')</script>";
					}	
					if($type == "Teacher")
					{	
						$_SESSION['session']="User";
						$_SESSION['username'] = $username;
						$_SESSION['password'] = $password;
						echo "<script>alert('Successful you will be redirected');
						window.location.replace('teacher/dashboard_teacher.php')</script>";
					}
				}
			}
			else{
				echo"<script>alert('Invalid Username and Password');
				window.location.replace('index.php');</script>";
			}
		}		
?>