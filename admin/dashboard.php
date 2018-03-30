<?php
	session_start();
	
	if(empty($_SESSION['session'])){
		echo "<script>window.location.replace('index.php')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<style type="text/css">
	#buttons{
		position: absolute;
		top: 270px;
		left: 430px;
	}
	body{
		font-family: Century Gothic;
	}
	.students
	{
		background-color: #006837;
		width: 300px;
		height: 150px;
		position: absolute;
		top: -95px;
		left: -90px;
		cursor: pointer;
	}
	.students:hover
		{
          -moz-box-shadow: inset 0 0 10px gray;
		   -webkit-box-shadow: inset 0 0 10px gray;
		   box-shadow: inset 0 0 10px gray;
		}
	.fac{
		background-color: #006837;
		width: 300px;
		height: 150px;
		position: absolute;
		top: -95px;
		left: 270px;
		cursor: pointer;
	}
	.fac:hover
		{
			-moz-box-shadow: inset 0 0 10px black;
			-webkit-box-shadow: inset 0 0 10px black;
			box-shadow: inset 0 0 10px gray;
		}
	.sub{
		background-color: #006837;
		width: 300px;
		height: 150px;
		position: absolute;
		top: -95px;
		left: 630px;
		cursor: pointer;
	}
	.sub:hover
		{
			-moz-box-shadow: inset 0 0 10px black;
			-webkit-box-shadow: inset 0 0 10px black;
			box-shadow: inset 0 0 10px gray;
		}
	.news
		{
		background-color: #006837;
		width: 300px;
		height: 150px;
		position: absolute;
		top: 100px;
		left: -90px;
		cursor: pointer;      
		}
	.news:hover	
		{ 
			-moz-box-shadow: inset 0 0 10px black;
			-webkit-box-shadow: inset 0 0 10px black;
			box-shadow: inset 0 0 10px gray;
		}
	.announce
	{
		
		background-color: #006837;
		width: 300px;
		height: 150px;
		position: absolute;
		top: 100px;
		left: 270px;
		cursor: pointer;      
		
	}
	.announce:hover
		{
          -moz-box-shadow: inset 0 0 10px gray;
		   -webkit-box-shadow: inset 0 0 10px gray;
		   box-shadow: inset 0 0 10px gray;
		}
	.messages
		{
		background-color: #006837;
		width: 300px;
		height: 150px;
		position: absolute;
		top: 100px;
		left: 630px;
		cursor: pointer;  
		}
	.cen{
		position: absolute;
		left: -50px;
	}
	.studentimg, .facimg, .subimg
	{
		position: absolute;
		left: 10px;
		height: 50px;
		margin-top: 30px;
		
	}
	.numberstudents, .numberprograms, .numberemployees, .numbernews, .numberannouncement
	{
		position: absolute;
		top: 70px;
		left: 250px;
		font-size: 60px;
		color: white;
		font-family: Arial;
	}
	a
	{
		text-decoration: none;
		color: white;
	}
	p
	{
		margin-top: -50px;
		margin-left: 100px;
	}
	tr
	{
		width: 100%;
		background-color: #9dd19f;
	}
	#stud
	{
		font-size: 	18px;
		font-weight: bold;
		margin-left: -90px;
		margin-top: 30px;
		
	}
	#comment
	{
		font-size: 13px;
		margin-left: -50px;
		margin-top: -20px;
	}
	#ann
	{
		font-size: 	18px;
		font-weight: bold;
		margin-left: -30px;
		margin-top: 30px;
	}
	#anncomment
	{
		font-size: 13px;
		margin-left: -0px;
		margin-top: -20px;
	}
	#mess
	{
		font-size: 	18px;
		font-weight: bold;
		margin-left: -76px;
		margin-top: 30px;
	}
	#messcomment
	{
		font-size: 13px;
		margin-left: -70px;
		margin-top: -20px;
	}
	#unread
	{	
		font-size: 13px;
		margin-left: -55px;
		margin-top: -5px;
	}
	#read
	{
		font-size: 13px;
		margin-left: -65px;
		margin-top: 15px;
	}
	.unreadmessages
	{
		position: absolute;
		top: 65px;
		left: 240px;
		font-size: 20px;
		color: white;
		font-family: Arial;
	}
	.readmessages
	{
		position: absolute;
		top: 95px;
		left: 240px;
		font-size: 20px;
		color: white;
		font-family: Arial;
	}
</style>
<body>
<div><?php include("includes/navigation.php"); ?></div>
	<div id="buttons">
		<center>
		
			<div class="cen">
				<a href="students.php"><div class="students"><img src="images/student.png.png" class="studentimg">
				<p id="stud">Students</p>
				<p id="comment">View/Edit Students</p>
				
						<div class="numberstudents">
							<?php
								$numberofstudents = mysql_query("SELECT Student_Number FROM tblstudent");
								$numrows = mysql_num_rows($numberofstudents);

								echo $numrows;
							?>
						</div>
				</div></a>
			
				<a href="faculty.php"><div class="fac"><img src="images/faculty.png" class="facimg">
				<p id="stud">Faculty</p>
				<p id="comment">View/Edit Faculty</p>
					<div class="numberemployees">
							<?php
								$numberofemployee = mysql_query("SELECT Employee_Number FROM tblemployee");
								$numrows = mysql_num_rows($numberofemployee);

								echo $numrows;
							?>
					</div>
				</div></a>

				<a href="program.php"><div class="sub"><img src="images/subj.png" class="subimg">
				<p id="stud">Subjects</p>
				<p id="comment">View/Edit Subjects</p>
						<div class="numberprograms">
							<?php
								$numberofprograms = mysql_query("SELECT Program_ID FROM tblprogram");
								$numrows = mysql_num_rows($numberofprograms);

								echo $numrows;
							?>
					</div>
				</div></a>

				<a href="view_news.php"><div class="news"><img src="images/news.png" class="subimg">
				<p id="stud">News</p>
				<p id="comment">View/Edit News</p>
					<div class="numbernews">
							<?php
								$numberofnews = mysql_query("SELECT news_id FROM tblnews");
								$numrows = mysql_num_rows($numberofnews);

								echo $numrows;
							?>
						</div>
					</div></a>

				<a href="view_announcement.php"><div class="announce"><img src="images/announce.png" class="subimg">
				<p id="ann">Announcement</p>
				<p id="anncomment">View/Edit Announcements</p>
				<div class="numberannouncement">
							<?php
								$numberofnews = mysql_query("SELECT announce_id FROM tblannouncements");
								$numrows = mysql_num_rows($numberofnews);

								echo $numrows;
							?>
						</div>
					</div></a>


				<a href="messages.php"><div class="messages"><img src="images/close-envelope.png" class="subimg">
				<p id="mess"> Messages</p>
				<p id="unread">Unread Messages</p>
					<div class="unreadmessages">
							<?php
								$unreadmessages = mysql_query("SELECT Message_ID FROM tblmessage where Message_Status = 'Unread'");
								$numrows = mysql_num_rows($unreadmessages);

								echo $numrows;
							?>
					</div>
				<p id="read">Read Messages</p>
					<div class="readmessages">
							<?php
								$unreadmessages = mysql_query("SELECT Message_ID FROM tblmessage where Message_Status = 'Read'");
								$numrows = mysql_num_rows($unreadmessages);

								echo $numrows;
							?>
					</div>
				</div></a>
			</div>
		</center>
	</div>
</body>
</html>