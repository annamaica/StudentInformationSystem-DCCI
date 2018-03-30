<?php
include("includes/connection.php");

if(isset($_GET['faculty'])){
	$view_id = $_GET['faculty'];
	$view_query = "SELECT * from tblemployee where Employee_Number='$view_id'";

	$run_view = mysql_query($view_query);

	while($row=mysql_fetch_array($run_view)){
	   $employeenum = $row['Employee_Number'];
        $lastname = $row['Last_Name'];
        $employeefirstname = $row['First_Name'];
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
        $employee_image = $row['Employee_Image'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>View Faculty</title>
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
    .Faculty
        {
            margin-top: 100px;
            margin-left: 320px;
        }
    #faculty
        {
            margin-top: 12px;
             margin-left: 0px;
        }
    .employeeimg
    {
        margin-left: 325px;
        position: absolute;
        top: 250px;
    }
    .tblcolor
    {
        position: absolute;
        top: 170px;
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
        margin-top: -60px;
        padding: 15px;
    }
    .deletestud
    {
        position: absolute;
        margin-left: 1160px;
        margin-top: -60px;
        padding: 15px;
    }
</style>
<div><?php include("includes/navigation.php"); ?></div>

<div class="Faculty">
       <h3><a href="faculty.php"><b>Faculty</b></a> > Faculty Profile</h3>
</div>
<div class="editstud">
    <a href="edit_faculty.php?edit=<?php echo $employeenum; ?>"><img src="../icons/editicon.png" width="40px" height="35px"></a>
</div>
<div class="deletestud">
    <a onCLick="javascript:return confirm('Are you sure you want to delete the faculty member?');" href="delete.php?deleteemployee=<?php echo $employeenum; ?>"><img src="../icons/deleteicon.png" width="40px" height="35px"></a>
</div>

<form method="post" enctype="multipart/form-data">
<img src="images/<?php echo "$employee_image"; ?>" style="width: 200px; height:200px;" class="employeeimg">

<div id="faculty">
        <table border="0" width="80%" class="tblcolor">
                        <tr><td>Employee Number:</td><td><?php echo $employeenum; ?></td></tr>
                        <tr><td>Last Name:</td><td><?php echo $lastname; ?></td></tr>
                        <tr><td>First Name:</td><td><?php echo $employeefirstname; ?></td></tr>
                        <tr><td>Middle Name:</td><td><?php echo $middlename; ?></td></tr>
                        <tr><td>Address:</td><td><?php echo $street." ".$barangay." ".$muni." ".$district." ".$province; ?></td></tr>
                        <tr><td>Contact Number:</td><td><?php echo $cnum; ?></td></tr>
                        <tr><td>Email Address:</td><td><?php echo $emailadd; ?></td></tr>
                        <tr><td>Gender:</td><td><?php echo $gender; ?></td></tr>
                        <tr><td>Date of Birth:</td><td><?php echo $dob; ?></td></tr>
                        <tr><td>Age:</td><td><?php echo $age; ?></td></tr>
                        <tr><td>Civil Status:</td><td><?php echo $civilstat; ?></td></tr> 
        </table>
</div>
</form>
</body>
</html>