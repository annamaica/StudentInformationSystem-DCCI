<?php
if(isset($_POST['submit'])){
    $update_id = $_GET['edit'];
    $newstudentnum = $_SESSION['studentnum'];
    $newlastname = $_POST['lastname'];
    $newfirstname = $_POST['firstname'];
    $newmiddlename= $_POST['middlename'];
    $newstreet = $_POST['street'];
    $newbarangay = $_POST['barangay'];
    $newmunicipality = $_POST['municipality'];
    $newdistrict = $_POST['district'];
    $newprovince = $_POST['province'];
    $newcontactnum = $_POST['contactnum'];
    $newemailadd = $_POST['emailadd'];
    $newgender = $_POST['gender'];
    $newdob = $_POST['dob'];
    $newage = $_POST['age'];
    $newcivilstatus = $_POST['civilstatus'];
    $newprogram = $_POST['program'];

    if($newstudentnum && $newlastname && $newfirstname || $newmiddlename && $newstreet && $newbarangay && $newmunicipality && $newdistrict && $newprovince && $newcontactnum && $newemailadd && $newgender && $newdob && $newage && $newcivilstatus && $newprogram)
    {
      $update_query = "UPDATE tblstudent set Student_Number='$newstudentnum',Last_Name='$newlastname',First_Name='$newfirstname',Middle_Name='$newmiddlename',Street='$newstreet',Barangay='$newbarangay',Municipality='$newmunicipality',District='$newdistrict',Province='$newprovince',Contact_Number='$newcontactnum',Email_Address='$newemailadd',Gender='$newgender',Date_of_Birth='$newdob',Age='$newage',Civil_Status='$newcivilstatus', Program='$newprogram' where Student_Number='$update_id'";

        if(mysql_query($update_query))
        {
          echo "<script>alert('Student Updated!');
          window.location.replace('view_student.php?student=$update_id');</script>";
        }
    }
    else
    {
      echo "<script>alert('Any of the fields are empty')</script>";
    }
}
if (isset($_POST['upload'])) {
    $update_id = $_GET['edit'];
    $account_image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $imagefiletype = pathinfo($target_file,PATHINFO_EXTENSION);

        if($imagefiletype=="jpg" || $imagefiletype=="JPG" || $imagefiletype=="jpeg" || $imagefiletype=="JPEG" ||
            $imagefiletype=="png" || $imagefiletype=="PNG" || $imagefiletype=="bmp" ||$imagefiletype=="BMP"){


            if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
                        mysql_query("UPDATE tblstudent set Student_Image='$account_image' WHERE Student_Number = '$update_id'");
                        $register = mysql_affected_rows();

                        echo "<script>alert('Account Image Updated!');
                             window.location.replace('view_student.php?student=$update_id');</script>";
                    }
                }
            else {
                echo "<script>alert('Invalid Picture Format');
                </script>";
            }
}
?>