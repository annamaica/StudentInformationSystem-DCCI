<?php
include('admin/includes/connection.php');

    $slider1= mysql_query("SELECT * FROM tblslider");
    $slider2= mysql_query("SELECT * FROM tblslider");
    $slider3= mysql_query("SELECT * FROM tblslider");
    $slider4= mysql_query("SELECT * FROM tblslider");
?>
<!DOCTYPE html>
<html>
<head>
	<title>DCCI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        #uname
        {
            font-family: century gothic;
            font-size: 15px;
            padding: 5px;
            height: 20px;
            border: 1px solid black;
        }
        #pword
        {
            font-family: century gothic;
            font-size: 15px;
            padding: 5px;
            height: 20px;
            border: 1px solid black;
        }
        #loginbtn
        {
            border: 0;
            box-shadow:none;
            background-color: rgb(206,255,206);
            margin: 15px;
            width: 300px;
            height: 30px;
            font-style:'Century Gothic';
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
                  }   

        #loginbtn:hover {
        background-color: rgba(206,255,206,0.5);
        color: white;
        }
    </style>
</head>
<body>
<form method="post" action="loginprocess.php">	
<meta charset = "UTF-8";>

<div><?php include('includes/footer.php'); ?></div>
		<ul>
  			<li><a id="myBtn">Login</a></li>
		</ul>
			<div id="myModal" class="modal">

  <!-- Modal content -->
  			<div class="modal-content">
   			 <span class="close">x</span>
    			<table>
    			    <br>

    				<tr>    
    					<td> 
                            Username <input type="text" id="uname" name="uname" required>
                        </td>
    				</tr>

                    <tr>
    					<td> 
                            Password <input type="password" id="pword" name="pword" required>
    					</td>
    				</tr>

    				<tr>

    					<td>
    					   <input type="submit" name="login" value="Log In" id="loginbtn">
    					</td>
    				</tr>

    			</table>
  				</div>

</div>
		<div id="slider">
	        <?php
                while ($sliderhold1 = mysql_fetch_array($slider1))
                {
                        echo "<img class= 'mySlides' src='admin/".$sliderhold1['slider1']."'style='width: 100%; height: 550px'>";
                }
                ?> 

                <?php
                while ($sliderhold2 = mysql_fetch_array($slider2))
                {
                        echo "<img class= 'mySlides' src='admin/".$sliderhold2['slider2']."'style='width: 100%; height: 550px'>";
                }
                ?>

                <?php
                while ($sliderhold3 = mysql_fetch_array($slider3))
                {
                        echo "<img class= 'mySlides' src='admin/".$sliderhold3['slider3']."'style='width: 100%; height: 550px'>";
                }
                ?>
                <?php
                while ($sliderhold4 = mysql_fetch_array($slider4))
                {
                        echo "<img class= 'mySlides' src='admin/".$sliderhold4['slider4']."'style='width: 100%; height: 550px'>";
                }
                ?> 
		</div>
		<script>
		var modal = document.getElementById('myModal');

// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
		btn.onclick = function() {
    	modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
    	modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 5500);
}
		</script>
</form>
</body>
</html>