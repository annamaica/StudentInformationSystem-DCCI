<?php
	session_start();

	if(isset($_POST['register'])){
	
	$studentnum = $_SESSION['studentnumber'];
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];	
	$middlename= $_POST['middlename'];
	$street = $_POST['street'];
	$barangay = $_POST['barangay'];
	$municipality = $_POST['municipality'];
	$district = $_POST['district'];
	$province = $_POST['province'];
	$contactnum = $_POST['contactnum'];
	$emailadd = $_POST['emailadd'];
	$gender = $_POST['gender'];
	$dob = $_POST['dob'];
	$age = $_POST['age'];
	$civilstatus = $_POST['civilstatus'];
	$student_image = $_FILES['image']['name'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$program = $_POST['program'];
	$batch = $_POST['batch'];
	$date = date('Y');
	$fulldate = date('F d, Y, g: i a');

		move_uploaded_file($image_tmp, "images/$student_image");

		include("includes/connection.php");

		$program = $_POST['program'];

			$programquery = mysql_query("SELECT * FROM tblprogram WHERE Program_Title = '$program'");

			while($programqueryhold = mysql_fetch_array($programquery)){
				$program2= $programqueryhold['Program_code'];

							$studentnumber = $program2."-".$studentnum."-".$date."-".$_POST['batch'];	

							mysql_query("INSERT INTO tblstudent (Student_Number,Last_Name,First_Name,Middle_Name,Street,Barangay,Municipality,District,Province,Contact_Number,Email_Address,Gender,Date_of_Birth,Age,Civil_Status,Student_Image,Program,Batch,num) values ('$studentnumber','$lastname','$firstname','$middlename','$street','$barangay','$municipality','$district','$province','$contactnum','$emailadd','$gender','$dob','$age','$civilstatus','$student_image','$program','$batch','$studentnum')");
							
							//password generator
							function password($length = 8) {
   						 	
   						 	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    						$charactersLength = strlen($characters);
   				 			$randomString = '';
    							for ($i = 0; $i < $length; $i++) {
        							$randomString .= $characters[rand(0, $charactersLength - 1)];
   			 					}
    							return $randomString;	
    						}
    						
    						$pword = password();

							$passwordmd5 = md5($pword);

							mysql_query("INSERT INTO tbluser values ('$studentnumber','$studentnumber','$passwordmd5','Student')");
							mysql_query("INSERT INTO tblstudent_grade(Student_Number) values ('$studentnumber')");

							$register = mysql_affected_rows();


    						//sending email

    						$to = $emailadd;

							$subject = "Login Instructions";

							$message = '<html><body><p>
							An account has been created for you at Dasmariñas City Computer Institute Student Information System.
							Your username is: <strong>'.$studentnumber.'</strong> and your password is: <strong>'.$pword.'</strong>.<br>

							To log in to your account, click this link dccintitute.com then click the Log In button and enter your given username and password.

							</p></body></html>';	

							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							$headers .= 'From: Maica Empeno<annamaica03@gmail.com>' . "\r\n";

    						echo $message;
    					}
	}
	else
	{
		echo "<script type = 'text/javascript'>alert('Please fill out the information');
        window.location.replace('add_student.php');
        </script>";
	}
?>