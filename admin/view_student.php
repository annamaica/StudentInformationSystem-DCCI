<?php
include("includes/connection.php");

if(isset($_GET['student'])){
	$view_id = $_GET['student'];
	$view_query = "SELECT * from tblstudent where Student_Number='$view_id'";

	$run_view = mysql_query($view_query);

	while($row=mysql_fetch_array($run_view)){
	   $studentnum = $row['Student_Number'];
        $lastname = $row['Last_Name'];
        $studentfirstname = $row['First_Name'];
        $middlename= $row['Middle_Name'];
        $street = $row['Street'];
        $barangay = $row['Barangay'];
        $muni = $row['Municipality'];
        $district = $row['District'];
        $province = $row['Province'];
        $cnum = $row['Contact_Number'];
        $emailadd = $row['Email_Address'];
        $gender = $row['Gender'];
        $dob = $row['Date_of_Birth'];
        $age = $row['Age'];
        $civilstat = $row['Civil_Status'];
        $student_image = $row['Student_Image'];
        $program = $row['Program'];
        $batch = $row['Batch'];
        $num = $row['num'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>View Student</title>
</head>
<body>
<style type="text/css">
   body
            {
                font-family: Century Gothic;
            }
            .tblcolor{
                width:50%; 
                }
            .tblcolor td{
                padding:7px; 
            }
            .tblcolor tr{
                background: #bab9b9;
            }

            .tblcolor tr:nth-child(odd){ 
        background: #77aa78;
            }
            .tblcolor tr:nth-child(even){
                background: #f1f1f1;
            }
    .Students
        {
            margin-top: -600px;
            margin-left: 320px;
        }
    #students
        {
            margin-top: 12px;
             margin-left: 0px;
        }
    .studentimg
    {
        margin-left: 325px;
        position: absolute;
        top: 250px;
    }
    .tblcolor
    {
        position: absolute;
        top: 130px;
        left: 600px;

    }
    .info
    {
        position: absolute;
        top: 3px;
    }
    a
    {
        color: black;
        text-decoration: none;
    }
    .editstud
    {
        position: absolute;
        margin-left: 1215px;
        margin-top: 610px;
        padding: 15px;
    }
    .deletestud
    {
        position: absolute;
        margin-left: 1160px;
        margin-top: 610px;
        padding: 15px;
    }

</style>
<div><?php include("includes/navigation.php"); ?></div>

<div class="Students">
       <h3><a href="students.php"><b>Students</b></a> > Student Profile</h3>
</div>
<div class="editstud">
    <a href="edit_student.php?edit=<?php echo $studentnum; ?>"><img src="../icons/editicon.png" width="40px" height="35px"></a>
</div>
<div class="deletestud">
    <a onCLick="javascript:return confirm('Are you sure you want to delete the student?');" href="delete.php?deletestudent=<?php echo $studentnum; ?>"><img src="../icons/deleteicon.png" width="40px" height="35px"></a>
</div>

<form method="post" enctype="multipart/form-data">
<img src="images/<?php echo "$student_image"; ?>" style="width: 200px; height:200px;" class="studentimg">

<div id="students">
        <table border="0" width="80%" class="tblcolor">
                        <tr><td>Student Number:</td><td><?php echo $studentnum; ?></td></tr>
                        <tr><td>Last Name:</td><td><?php echo $lastname; ?></td></tr>
                        <tr><td>First Name:</td><td><?php echo $studentfirstname; ?></td></tr>
                        <tr><td>Middle Name:</td><td><?php echo $middlename; ?></td></tr>
                        <tr><td>Address:</td><td><?php echo $street." ".$barangay." ".$muni." ".$district." ".$province; ?></td></tr>
                        <tr><td>Contact Number:</td><td><?php echo $cnum; ?></td></tr>
                        <tr><td>Email Address:</td><td><?php echo $emailadd; ?></td></tr>
                        <tr><td>Gender:</td><td><?php echo $gender; ?></td></tr>
                        <tr><td>Date of Birth:</td><td><?php echo $dob; ?></td></tr>
                        <tr><td>Age:</td><td><?php echo $age; ?></td></tr>
                        <tr><td>Civil Status:</td><td><?php echo $civilstat; ?></td></tr>
                        <tr><td>Program:</td><td><?php echo $program; ?></td></tr>      
        </table>
</div>
</form>
</body>
</html>