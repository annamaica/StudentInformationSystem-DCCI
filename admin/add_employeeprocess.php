<?php
	session_start();
	if(isset($_POST['register'])){
	
	$employeenum = $_SESSION['employeenumber'];
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
	$employee_image = $_FILES['upload']['name'];
	$image_tmp = $_FILES['upload']['tmp_name'];

	include("includes/connection.php");

		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES['upload']['name']);
		$imagefiletype = pathinfo($target_file,PATHINFO_EXTENSION);

		if($imagefiletype=="jpg" || $imagefiletype=="JPG" || $imagefiletype=="jpeg" || $imagefiletype=="JPEG" ||
			$imagefiletype=="png" || $imagefiletype=="PNG" || $imagefiletype=="bmp" ||$imagefiletype=="BMP"){


			if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_file)){

				if(!empty($_POST['checkbox'])) {
            		foreach($_POST['checkbox'] as $check) {
            			$date = date('Y');

						$employeenumber = $date."-".$employeenum;

						mysql_query("INSERT INTO tblemployee (Employee_Number,Last_Name,First_Name,Middle_Name,Street,Barangay,Municipality,District,Province,Contact_Number,Email_Address,Gender,Date_of_Birth,Age,Civil_Status,Employee_Image,num) values ('$employeenumber','$lastname','$firstname','$middlename','$street','$barangay','$municipality','$district','$province','$contactnum','$emailadd','$gender','$dob','$age','$civilstatus','$employee_image','$employeenum')");
						
						//password generator
							function passwordemployee($length = 8) {
   						 	
   						 	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    						$charactersLength = strlen($characters);
   				 			$randomString = '';
    							for ($i = 0; $i < $length; $i++) {
        							$randomString .= $characters[rand(0, $charactersLength - 1)];
   			 					}
    							return $randomString;	
    						}
    					$pword = passwordemployee();

						$passwordmd5 = md5($pword);
						mysql_query("INSERT INTO tbluser values ('$employeenumber','$employeenumber', '$passwordmd5','Teacher')");

						$a = mysql_query("SELECT Program_ID FROM tblprogram WHERE Program_ID='".$check."'");

                		while ($row1 = mysql_fetch_assoc($a)) {
                    		 $prognum1 = $row1['Program_ID'];

                    			 mysql_query("INSERT INTO tblsubjectteacher (Employee_Number,Program_ID) values ('$employeenumber','$prognum1')");
                		}

                		$register = mysql_affected_rows();
                		
							//sending email

    						$to = $emailadd;

							$subject = "Login Instructions";

							$message = '<html><body><p>
							An account has been created for you at Dasmariñas City Computer Institute Student Information System.
							Your username is: <strong>'.$employeenumber.'</strong> and your password is: <strong>'.$pword.'</strong>.<br>

							To log in to your account, click this link dccintitute.com then click the Log In button and enter your given username and password.

							</p></body></html>';	

							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
							$headers .= 'From: Maica Empeno<annamaica03@gmail.com>' . "\r\n";

    						echo $message;
                    }
                }
  			}
  			else
			{
				echo "<script>alert('Please fill out the information');
       					window.location.replace('add_employee.php');
       			</script>";
			}

		}
		else
		{
			echo "<script>alert('Invalid Picture Format');
       					window.location.replace('add_employee.php');
       			</script>";
		}
	}
?>