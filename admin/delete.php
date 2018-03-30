<?php
include("includes/connection.php");

if(isset($_GET['deletenews']))
{
	$delete_id = $_GET['deletenews'];
	$delete_query = "delete from tblnews where news_id='$delete_id'";

	if(mysql_query($delete_query))
	{
		echo "<script>alert('News has been deleted')</script>";
		echo "<script>window.open('view_news.php','_self')</script>";
	}
}

if(isset($_GET['deletestudent']))
{
	$delete_id = $_GET['deletestudent'];
	$view_query = "SELECT * from tblstudent where Student_Number='$delete_id'";

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

	$student_grade = mysql_query("SELECT * FROM tblstudent_grade where Student_Number='$delete_id'");

	while ($gradehold = mysql_fetch_array($student_grade)) {
		$grade = $gradehold['Grade'];
		$grade_equi = $gradehold['Grade_Equivalent'];
	}
	
	$user = mysql_query("SELECT * FROM tbluser where User_ID='$delete_id'");

	while ($userhold = mysql_fetch_array($user)) {
		$username = $userhold['User_Name'];
		$pword = $userhold['Pword'];
		$type = $userhold['User_Type'];
	}

	//delete

	mysql_query("DELETE from tblstudent where Student_Number='$delete_id'");
	mysql_query("DELETE from tbluser where User_ID='$delete_id'");
	mysql_query("DELETE from tblstudent_grade where Student_Number='$delete_id'");

	//archive

	mysql_query("INSERT INTO archive_student (Student_Number,Last_Name,First_Name,Middle_Name,Street,Barangay,Municipality,District,Province,Contact_Number,Email_Address,Gender,Date_of_Birth,Age,Civil_Status,Student_Image,Program,Batch,num,Grade,Grade_Equivalent,User_Name,Pword,User_Type) values ('$studentnum','$lastname','$studentfirstname','$middlename','$street','$barangay','$muni','$district','$province','$cnum','$emailadd','$gender','$dob','$age','$civilstat','$student_image','$program','$batch','$num','$grade','$grade_equi','$username','$pword','$type')");

		echo "<script>alert('Student has been deleted')</script>";
		echo "<script>window.open('students.php','_self')</script>";
}

if(isset($_GET['deleteemployee']))
{
	$delete_id = $_GET['deleteemployee'];
	mysql_query("DELETE from tblemployee where Employee_Number='$delete_id'");
	mysql_query("DELETE from tbluser where User_ID='$delete_id'");
	mysql_query("DELETE from tblsubjectteacher where Employee_Number='$delete_id'");

		echo "<script>alert('Faculty has been deleted')</script>";
		echo "<script>window.open('faculty.php','_self')</script>";
}

if(isset($_GET['deleteannoucement']))
{
	$delete_id = $_GET['deleteannoucement'];
	$delete_query = "DELETE from tblannouncements where announce_id='$delete_id'";

	if(mysql_query($delete_query))
	{
		echo "<script>alert('Announcement has been deleted')</script>";
		echo "<script>window.location.replace('view_announcement.php')</script>";
	}
}
?>