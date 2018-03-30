<?php
include('includes/connection.php');

	if(isset($_POST['submit'])){
		$logo_image = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];

		if(empty($logo_image)){
			
			echo "<script>alert('Choose an image');
         	 window.location.replace('cms.php');</script>";
		}
		else
		{
			 move_uploaded_file($image_tmp,"images/$logo_image");
			 mysql_query("UPDATE tbldesign set logo='$logo_image'");
			 $register = mysql_affected_rows();

			 echo "<script>alert('Logo Updated!');
         	 window.location.replace('cms.php');</script>";
		}
	}

		if(isset($_POST['updatemission'])){
		$mission1 = $_POST['textarea1'];
		$_SESSION['missionstatement'] = $mission1;

			if(empty($mission1))
			{
				echo "<script>alert('Empty')</script>";
			}
			else
			{
				$update_query = "UPDATE tblabout set mission='$mission1'";

				if(mysql_query($update_query))
				{
					echo "<script>alert('Mission Updated!');
					window.location.replace('cms.php');</script>";
				}
			}
		}

		if(isset($_POST['updatevision'])){
		$vision = $_POST['textarea2'];
		$_SESSION['visionstatement'] = $vision;

			if(empty($vision))
			{
				echo "<script>alert('Empty')</script>";
			}
			else
			{
				$update_query = "UPDATE tblabout set vision='$vision'";

				if(mysql_query($update_query))
				{
					echo "<script>alert('Vision Updated!');
					window.location.replace('cms.php');</script>";
				}
			}
		}

		if(isset($_POST['updatevalues'])){
		$values = $_POST['textarea3'];
		$_SESSION['valuesstatement'] = $values;

			if(empty($values))
			{
				echo "<script>alert('Empty')</script>";
			}
			else
			{
				$update_query = "UPDATE tblabout set about_values='$values'";

				if(mysql_query($update_query))
				{
					echo "<script>alert('Values Updated!');
					window.location.replace('cms.php');</script>";
				}
			}
		}

        if(isset($_POST['updateaboutus'])){
        $aboutus = $_POST['textarea4'];
        $_SESSION['aboutusstatement'] = $aboutus;

            if(empty($aboutus))
            {
                echo "<script>alert('Empty')</script>";
            }
            else
            {
                $update_query = "UPDATE tblabout set about_us='$aboutus'";

                if(mysql_query($update_query))
                {
                    echo "<script>alert('About Us Updated!');
                    window.location.replace('cms.php');</script>";
                }
            }
        }

		//slider

		if (isset($_POST['submitslider1']))
		{
			$target_dir = "slider/";
			$target_file = $target_dir . basename($_FILES["fileToUpload11"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
        	$check = getimagesize($_FILES["fileToUpload11"]["tmp_name"]);
		if ($check == false)
    	{
        	echo "<script type = 'text/javascript>alert'>alert('File is not an Image');
        	window.location.replace('cms.php');
        	</script>";
        	$uploadOk = 0;
    	}
    	if ($_FILES["fileToUpload11"]["size"] > 10000000) 
    	{
    		echo "<script type = 'text/javascript'>alert('Sorry, your file is too large');
    		window.location.replace('cms.php');
    		</script>";
    		$uploadOk = 0;
    	}
    	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" &&
    	$imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) 
    	{
    		echo "<script type = 'text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
    		window.location.replace('cms.php');
    		</script>";
    		$uploadOk = 0;
    	}
    	if ($uploadOk == 0) 
    	{
    		echo "<script type = 'text/javascript'>alert('Sorry, your file was not uploaded.');
    		window.location.replace('cms.php');
    		</script>";
    	}
    	else 
    	{
    		if (move_uploaded_file($_FILES["fileToUpload11"]["tmp_name"], $target_file)) 
    		{
				mysql_query("UPDATE tblslider SET slider1='".$target_file."'");
						
				echo"<script type='text/javascript'>alert('Updated Successfully'); 
       			window.location.replace('cms.php');
    			</script>";
    		} 
    		else 
    		{
        		echo "<script type = 'text/javascript'>alert('Sorry, there was an error uploading your file.');
        		window.location.replace('cms.php');
        		</script>";
    		}
        }
	}
    if (isset($_POST['submitslider2']))
    {
        $target_dir = "slider/";
        $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
        if ($check == false)
        {
            echo "<script type = 'text/javascript>alert'>alert('File is not an Image');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload2"]["size"] > 9000000) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, your file is too large');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" &&
        $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, your file was not uploaded.');
            window.location.replace('cms.php');
            </script>";
        }
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) 
            {
                mysql_query("UPDATE tblslider SET slider2='".$target_file."'");
              
                echo"<script type='text/javascript'>alert('Updated Successfully'); 
                window.location.replace('cms.php');
                </script>";
            } 
            else 
            {
                echo "<script type = 'text/javascript'>alert('Sorry, there was an error uploading your file.');
                window.location.replace('cms.php');
                </script>";
            }
        }
    }

    if (isset($_POST['submitslider3']))
    {
        $target_dir = "slider/";
        $target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        $check = getimagesize($_FILES["fileToUpload3"]["tmp_name"]);
        if ($check == false)
        {
            echo "<script type = 'text/javascript>alert'>alert('File is not an Image');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload3"]["size"] > 9000000) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, your file is too large');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" &&
        $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, your file was not uploaded.');
            window.location.replace('cms.php');
            </script>";
        }
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) 
            {
                mysql_query("UPDATE tblslider SET slider3='".$target_file."'");
              
                echo"<script type='text/javascript'>alert('Updated Successfully'); 
                window.location.replace('cms.php');
                </script>";
            } 
            else 
            {
                echo "<script type = 'text/javascript'>alert('Sorry, there was an error uploading your file.');
                window.location.replace('cms.php');
                </script>";
            }
        }
    }
    if (isset($_POST['submitslider4']))
    {
        $target_dir = "slider/";
        $target_file = $target_dir . basename($_FILES["fileToUpload4"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        $check = getimagesize($_FILES["fileToUpload4"]["tmp_name"]);
        if ($check == false)
        {
            echo "<script type = 'text/javascript>alert'>alert('File is not an Image');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if ($_FILES["fileToUpload4"]["size"] > 10000000) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, your file is too large');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" &&
        $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, your file was not uploaded.');
            window.location.replace('cms.php');
            </script>";
        }
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file)) 
            {
                mysql_query("UPDATE tblslider SET slider4='".$target_file."'");
              
                echo"<script type='text/javascript'>alert('Updated Successfully'); 
                window.location.replace('cms.php');
                </script>";
            } 
            else 
            {
                echo "<script type = 'text/javascript'>alert('Sorry, there was an error uploading your file.');
                window.location.replace('cms.php');
                </script>";
            }
        }
    }


    //contact us

    if (isset($_POST['updatedetails'])) {
        $cnumber = $_POST['txtcontact'];
        $caddress = $_POST['txtaddress'];
        $cemail = $_POST['txtemail'];

        if ($cnumber && $caddress && $cemail) {
           $update = mysql_query("UPDATE tblcontactus set contact_number='$cnumber',contact_address='$caddress',contact_email='$cemail'");

           echo"<script type='text/javascript'>alert('Updated Successfully'); 
                window.location.replace('cms.php');
                </script>";
        }
    }

    //contact Us location
     if (isset($_POST['updatelocation'])) {
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["filelocation"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        $check = getimagesize($_FILES["filelocation"]["tmp_name"]);
        if ($check == false)
        {
            echo "<script type = 'text/javascript>alert'>alert('File is not an Image');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if ($_FILES["filelocation"]["size"] > 10000000) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, your file is too large');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" &&
        $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF" ) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
            window.location.replace('cms.php');
            </script>";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) 
        {
            echo "<script type = 'text/javascript'>alert('Sorry, your file was not uploaded.');
            window.location.replace('cms.php');
            </script>";
        }
        else 
        {
            if (move_uploaded_file($_FILES["filelocation"]["tmp_name"], $target_file)) 
            {
                mysql_query("UPDATE tblcontactus SET contact_location='".$target_file."'");
              
                echo"<script type='text/javascript'>alert('Updated Successfully'); 
                window.location.replace('cms.php');
                </script>";
            } 
            else 
            {
                echo "<script type = 'text/javascript'>alert('Sorry, there was an error uploading your file.');
                window.location.replace('cms.php');
                </script>";
            }
        }
     }
?>