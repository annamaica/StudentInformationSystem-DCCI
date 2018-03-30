<?php
include('admin/includes/connection.php');

	if (isset($_POST['send'])) {
		 if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
            //your site secret key
            $secret = '6LcrtAcUAAAAAHsXTdUDFss3re9RuXFbIeDk-GKq';
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if($responseData->success){

                $name= $_POST['name'];
		          $contactnum= $_POST['contactnum'];
		          $email= $_POST['email'];
                $subject= $_POST['subject'];
                $message= $_POST['message'];
                $message2= htmlspecialchars($message,ENT_QUOTES,'UTF-8');
                date_default_timezone_set("Asia/Manila");
                $messagedate= date("M-d-Y h:i:s a");

                $result = mysql_query("INSERT INTO tblmessage(Name,Contact,Email,Subject,Message,Message_Status,Message_Date) VALUES
                    ('$name','$contactnum','$email','$subject','$message2','Unread','$messagedate')")
                    or die ("failed to query database". mysql_error());
                echo"<script>alert('Message Sent Successfully!'); 
                window.location.replace('contactus.php');
                </script>";
            }
            else{
                 echo"<script>alert('Verification failed, please try again!');
                 window.location.replace('contactus.php');</script>";
            }
        }
        else{
            echo"<script>alert('Please click on the reCAPTCHA box');
            window.location.replace('contactus.php');</script>";
        }
	}
?>