<?php
	session_start();
	
	if(empty($_SESSION['session'])){
		echo "<script>window.location.replace('index.php')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Content</title>
	<script src="//cdn.ckeditor.com/4.5.10/full/ckeditor.js"></script>
</head>
<style type="text/css">
		body
		{
			font-family: Century Gothic;
		}
        #schoollogo
        {
        	margin-top: 100px;
        	margin-left: 600px;
        	position: absolute;
			display: none;
        }
        #mission, #vision, #values, #aboutus
        {
        	margin-top: 50px;
        	margin-left: 325px;
        	position: absolute;
			display: none;
        }
        .logobtn
        {
        	margin-top: 10px;
        	margin-left: 30px;
        	position: absolute;
        	cursor: pointer;
        }
        .missionbtn
        {
        	margin-top: 10px;
        	margin-left: 280px;
        	position: absolute;
        	cursor: pointer;
        }
        .visionbtn
        {
        	margin-top: 10px;
        	margin-left: 430px;
        	position: absolute;
        	cursor: pointer;
        }
        .valuesbtn
        {
        	margin-top: 10px;
        	margin-left: 570px;
        	position: absolute;
        	cursor: pointer;
        }
        
        #prevpic
        {
        	border: 1px solid gray;
        }
        p
        {
        	font-size: 20px;
        }
        #cmshr
        {
        	border: 0;
			border-top:1px solid black;
			height:1px;
			margin: 0px;
			position: absolute;
			top: 20px;
			left: 300px;
		}
		
		#file
		{
			margin-left: 45px;
		}
		.heaad
		{
			background-color: #006837;
			height: 40px;
			width: 1000px;
			margin-left: 300px;
			margin-top: 100px;
			text-indent: 30px;
			color: white;
		}
		.linkes
		{
			border: 1px solid #cfcfcf;
			height: 40px;
			width: 998px;
			margin-left: 300px;
			margin-top: 0px;
		}
		.aboutusbtn
		{
			margin-top: 10px;
        	margin-left: 710px;
        	position: absolute;
        	cursor: pointer;
		}
		.sliderbtn
		{
			margin-top: 10px;
        	margin-left: 150px;
        	position: absolute;
        	cursor: pointer;
		}
		.contactusbtn
		{
			margin-top: 10px;
        	margin-left: 860px;
        	position: absolute;
        	cursor: pointer;
		}
		#slider
		{
			margin-top: 50px;
		}
		#sliderbuttonprevious
		{
			position: absolute;
			margin-left: 300px;
			margin-top: -150px;
		}
		#sliderbuttonnext
		{
			position: absolute;
			margin-left: 1250px;
			margin-top: -150px;
		}
		.selectimage
		{
			position: absolute;
			margin-left: 550px;
			margin-top: 15px;
		}
		.tblcontactus
		{
			margin-left: 300px;
			margin-top: 100px;
			position: absolute;
		}
</style>
<script>
	function startlogo(){
			var logo = document.getElementById("schoollogo");
			var slider = document.getElementById("slider");
			var mission = document.getElementById("mission");
			var vision = document.getElementById("vision");
			var values = document.getElementById("values");
			var aboutus = document.getElementById("aboutus");
			var contactus = document.getElementById("contactus");

			logo.style.display = "block";
			slider.style.display = "none";
			mission.style.display = "none";
			vision.style.display = "none";
			values.style.display = "none";
			aboutus.style.display = "none";
			contactus.style.display = "none";
		}
	function slider(){
			var logo = document.getElementById("schoollogo");
			var slider = document.getElementById("slider");
			var mission = document.getElementById("mission");
			var vision = document.getElementById("vision");
			var values = document.getElementById("values");
			var aboutus = document.getElementById("aboutus");
			var contactus = document.getElementById("contactus");

			slider.style.display = "block";
			mission.style.display = "none";
			logo.style.display = "none";
			vision.style.display = "none";
			values.style.display = "none";
			aboutus.style.display = "none";
			contactus.style.display = "none";
		}
	function mission(){
			var logo = document.getElementById("schoollogo");
			var slider = document.getElementById("slider");
			var mission = document.getElementById("mission");
			var vision = document.getElementById("vision");
			var values = document.getElementById("values");
			var aboutus = document.getElementById("aboutus");
			var contactus = document.getElementById("contactus");

			mission.style.display = "block";
			logo.style.display = "none";
			slider.style.display = "none";
			vision.style.display = "none";
			values.style.display = "none";
			aboutus.style.display = "none";
			contactus.style.display = "none";
		}
	function vision(){
			var logo = document.getElementById("schoollogo");
			var slider = document.getElementById("slider");
			var mission = document.getElementById("mission");
			var vision = document.getElementById("vision");
			var values = document.getElementById("values");
			var aboutus = document.getElementById("aboutus");
			var contactus = document.getElementById("contactus");

			vision.style.display = "block";
			logo.style.display = "none";
			slider.style.display = "none";
			mission.style.display = "none";
			values.style.display = "none";
			aboutus.style.display = "none";
			contactus.style.display = "none";
		}
	function values(){
			var logo = document.getElementById("schoollogo");
			var slider = document.getElementById("slider");
			var mission = document.getElementById("mission");
			var vision = document.getElementById("vision");
			var values = document.getElementById("values");
			var aboutus = document.getElementById("aboutus");
			var contactus = document.getElementById("contactus");

			values.style.display = "block";
			logo.style.display = "none";
			slider.style.display = "none";
			mission.style.display = "none";
			vision.style.display = "none";
			aboutus.style.display = "none";
			contactus.style.display = "none";
		}
		function aboutus(){
			var logo = document.getElementById("schoollogo");
			var slider = document.getElementById("slider");
			var mission = document.getElementById("mission");
			var vision = document.getElementById("vision");
			var values = document.getElementById("values");
			var aboutus = document.getElementById("aboutus");
			var contactus = document.getElementById("contactus");

			aboutus.style.display = "block";
			values.style.display = "none";
			logo.style.display = "none";
			slider.style.display = "none";
			mission.style.display = "none";
			vision.style.display = "none";
			contactus.style.display = "none";
		}
		function contactus(){
			var logo = document.getElementById("schoollogo");
			var slider = document.getElementById("slider");
			var mission = document.getElementById("mission");
			var vision = document.getElementById("vision");
			var values = document.getElementById("values");
			var aboutus = document.getElementById("aboutus");
			var contactus = document.getElementById("contactus");

			contactus.style.display = "block";
			aboutus.style.display = "none";
			values.style.display = "none";
			logo.style.display = "none";
			slider.style.display = "none";
			mission.style.display = "none";
			vision.style.display = "none";
		}
</script>
<body onload="startlogo()">
<div><?php include("includes/navigation.php"); ?></div>
<div class="heaad">
<h2>Manage Content</h2>
</div>
<div class="linkes">
<p class="logobtn" onclick="startlogo()"> Logo </p>
<p class="sliderbtn" onclick="slider()">Slider </p>
<p class="missionbtn" onclick="mission()"> Mission </p> 
<p class="visionbtn" onclick="vision()"> Vision </p>
<p class="valuesbtn" onclick="values()">Values </p>
<p class="contactusbtn" onclick="contactus()">Contact Us </p>
<p class="aboutusbtn" onclick="aboutus()">About Us </p>
</div>
<div id="schoollogo">
	<form method="post" enctype="multipart/form-data" action="cmsprocess.php">
		<?php

			$logopic = mysql_query("SELECT logo from tbldesign");

			while ($row=mysql_fetch_array($logopic)) {
				$pic = $row['logo'];
			}
		?>
		<img src="images/<?php echo $pic; ?>" width="200px" height="200px" id="prevpic">
		<img src="images/<?php echo $pic; ?>" width="100px" height="100px" id="prevpic">
		<img src="images/<?php echo $pic; ?>" width="50px" height="50px" id="prevpic">
		<br>
		<input type="file" name="image" id="file">
		<input type="submit" name="submit" value="Upload">
	</form>
</div>
<div id="mission">
	<form method="post" enctype="multipart/form-data" action="cmsprocess.php">
			<?php

				$query = "select * from tblabout";
				$run = mysql_query($query);

				while($row = mysql_fetch_array($run)){
					$mission = $row['mission'];
			}
			?>
			<textarea name="textarea1" cols="20" rows="20"><?php echo $mission; ?></textarea>
			<script>
    	        	CKEDITOR.replace( 'textarea1' );
			</script>
			<input type="submit" name="updatemission" value="Update">
	</form>
</div>
<div id="vision">
	<form method="post" enctype="multipart/form-data" action="cmsprocess.php">
			<?php

				$query = "select * from tblabout";
				$run = mysql_query($query);

				while($row = mysql_fetch_array($run)){
					$vision = $row['vision'];
			}
			?>
			<textarea name="textarea2" cols="50" rows="20"><?php echo $vision; ?></textarea>
			<input type="submit" name="updatevision" value="Update">
			<script>
    	        	CKEDITOR.replace( 'textarea2' );
			</script>
	</form>	
</div>
<div id="values">
	<form method="post" enctype="multipart/form-data" action="cmsprocess.php">
			<?php

				$query = "select * from tblabout";
				$run = mysql_query($query);

				while($row = mysql_fetch_array($run)){
					$values = $row['about_values'];
			}
			?>
			<textarea name="textarea3" cols="50" rows="20"><?php echo $values; ?></textarea>
			<input type="submit" name="updatevalues" value="Update">
			<script>
    	        	CKEDITOR.replace( 'textarea3' );
			</script>
	</form>	
</div>
<div id="aboutus">
	<form method="post" enctype="multipart/form-data" action="cmsprocess.php">
			<?php

				$query = "select * from tblabout";
				$run = mysql_query($query);

				while($row = mysql_fetch_array($run)){
					$aboutus = $row['about_us'];
			}
			?>
			<textarea name="textarea4" cols="50" rows="20"><?php echo $aboutus; ?></textarea>
			<input type="submit" name="updateaboutus" value="Update">
			<script>
    	        	CKEDITOR.replace( 'textarea4' );
			</script>
	</form>	
</div>
<div id="slider">
	<?php

	$slider1= mysql_query("SELECT*FROM tblslider");
	$slider2= mysql_query("SELECT*FROM tblslider");
	$slider3= mysql_query("SELECT*FROM tblslider");
	$slider4= mysql_query("SELECT*FROM tblslider");
	?>
		<div id= "sliderphoto">
			<div class= "sliderchange">
					<?php
						while ($sliderhold1 = mysql_fetch_array($slider1))
						{
							echo "<img src='".$sliderhold1['slider1']."'style='width: 900px; height: 300px; margin-left: 350px;'>";
						}
					?>  
					<form method="POST" enctype="multipart/form-data" action="cmsprocess.php"> 	
						<div class="selectimage">
							<label class= "lblselectimg1">Select image to upload:</label>
    						<input type="file" name="fileToUpload11" id="fileToUpload1" required>
    						<input type="submit" name= "submitslider1" id= "submitslider1" value="Save">
    					</div>
    				</form>
    			</div>

    			<div class= "sliderchange">
					<?php
						while ($sliderhold2 = mysql_fetch_array($slider2))
						{
						echo "<img src='".$sliderhold2['slider2']."'style='width: 900px; height: 300px; margin-left: 350px;'>";
						}
					?>
					<form method="POST" enctype="multipart/form-data" action="cmsprocess.php"> 	
						<div class="selectimage">
							<label class= "lblselectimg2">Select image to upload:</label>
    						<input type="file" name="fileToUpload2" id="fileToUpload2">
    						<input type="submit" name= "submitslider2" id= "submitslider2" value="Save">
    					</div>
    				</form>
    			</div>

    			<div class= "sliderchange">
					<?php
						while ($sliderhold3 = mysql_fetch_array($slider3))
						{
						echo "<img src='".$sliderhold3['slider3']."'style='width: 900px; height: 300px; margin-left: 350px;'>";
						}
					?>
					<form method="POST" enctype="multipart/form-data" action="cmsprocess.php"> 	
						<div class="selectimage">
							<label class= "lblselectimg2">Select image to upload:</label>
    						<input type="file" name="fileToUpload3" id="fileToUpload3">
    						<input type="submit" name= "submitslider3" id= "submitslider3" value="Save">
    					</div>
    				</form>
    			</div>

    			<div class= "sliderchange">
					<?php
						while ($sliderhold4 = mysql_fetch_array($slider4))
						{
						echo "<img src='".$sliderhold4['slider4']."'style='width: 900px; height: 300px; margin-left: 350px;'>";
						}
					?>
					<form method="POST" enctype="multipart/form-data" action="cmsprocess.php">
						<div class="selectimage"> 	
							<label class= "lblselectimg2">Select image to upload:</label>
    						<input type="file" name="fileToUpload4" id="fileToUpload4">
    						<input type="submit" name= "submitslider4" id= "submitslider4" value="Save">
    					</div>
    				</form>
    			</div>

    			<div id="sliderbuttonprevious">
				<img src= "images/previous.png" style= "width: 50px; height: 50px" onclick="plusDivs(-1)" />
			</div>
			<div id= "sliderbuttonnext">
				<img src= "images/next.png" style= "width: 50px; height: 50px" onclick="plusDivs(1)" />
			</div>
		</div>
</div>
<div id="contactus">
<form method="post" enctype="multipart/form-data" action="cmsprocess.php">
<?php
	$about = mysql_query("SELECT * FROM tblcontactus");

	while ($abouthold = mysql_fetch_array($about)) {
		$cnumber = $abouthold['contact_number'];
		$caddress = $abouthold['contact_address'];
		$cemail = $abouthold['contact_email'];
		$cimage = $abouthold['contact_location'];
	}
?>
	<table class="tblcontactus">
		<tr><td>Contact Number:</td><td><input type="text" name="txtcontact" value="<?php echo $cnumber; ?>" required></td></tr>
		<tr><td>Address:</td><td><input type="text" name="txtaddress" value="<?php echo $caddress; ?>" required></td></tr>
		<tr><td>Email:</td><td><input type="text" name="txtemail" value="<?php echo $cemail; ?>" required></td></tr>
		<tr><td><input type="submit" name="updatedetails" id="update" value="Update"></td></tr>

		<tr><td>Location:</td><td><img src="<?php echo $cimage; ?>" width="150px" height="150px"></td></tr>
		<tr><td><input type="file" name="filelocation" id="location"></td></tr>
		<tr><td><input type="submit" name="updatelocation" id="update" value="Update"></td></tr>
	</table>
</form>
</div>

		<script type="text/javascript">
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n){
  			showDivs(slideIndex += n);
		}

		function currentDiv(n){
  			showDivs(slideIndex = n);
		}	
		function showDivs(n){
  			var i;
  			var x = document.getElementsByClassName("sliderchange");
  			if (n > x.length){
  				slideIndex = 1
  			}
  			if (n < 1) {
  				slideIndex = x.length
  			}
  			for (i = 0; i < x.length; i++) {
     			x[i].style.display = "none";
     		}
     		 x[slideIndex-1].style.display = "block";
     	}

     	$("#fileToUpload1").change(function()
     	{
        	readURL(this);
    	});
    	function readURL(input) 
    	{
        	if (input.files && input.files[0]) {
            	var reader = new FileReader();
            
            	reader.onload = function (e) {
                	$('#fileimage1').attr('src', e.target.result);
            	}
            	reader.readAsDataURL(input.files[0]);
        	}
    	}

    	$("#fileToUpload2").change(function()
     	{
        	readURL2(this);
    	});
    	function readURL2(input) 
    	{
        	if (input.files && input.files[0]) {
            	var reader = new FileReader();
            
            	reader.onload = function (e) {
                	$('#fileimage2').attr('src', e.target.result);
            	}
            	reader.readAsDataURL(input.files[0]);
        	}
    	}

    	$("#fileToUpload3").change(function()
     	{
        	readURL3(this);
    	});
    	function readURL3(input) 
    	{
        	if (input.files && input.files[0]) {
            	var reader = new FileReader();
            
            	reader.onload = function (e) {
                	$('#fileimage3').attr('src', e.target.result);
            	}
            	reader.readAsDataURL(input.files[0]);
        	}
    	}   

    	$("#fileToUpload4").change(function()
     	{
        	readURL4(this);
    	});
    	function readURL4(input) 
    	{
        	if (input.files && input.files[0]) {
            	var reader = new FileReader();
            
            	reader.onload = function (e) {
                	$('#fileimage4').attr('src', e.target.result);
            	}
            	reader.readAsDataURL(input.files[0]);
        	}
    	}   
	</script>
</div>
</body>
</html>
