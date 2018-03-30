<?php
include("includes/connection.php");

if(isset($_GET['news'])){
	$edit_id = $_GET['news'];
	$edit_query = "select * from tblnews where news_id='$edit_id'";

	$run_edit = mysql_query($edit_query);

	while($edit_row=mysql_fetch_array($run_edit)){
		$news_id = $edit_row['news_id'];
		$news_title = $edit_row['news_title'];
		$news_author = $edit_row['news_author'];
		$news_date = $edit_row['news_date'];
		$news_content = $edit_row['news_content'];
		$news_image = $edit_row['news_image'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit News</title>
	<style type="text/css">
		body
			{
				font-family: Century Gothic;
			}
			.tblcolor{
				width:90%; 
				}
			.tblcolor td{
				padding:7px; 
			}
			.tblcolor tr{
				background: #77aa78;
			}

			.tblcolor tr:nth-child(odd){ 
		background: #77aa78;
			}
			.tblcolor tr:nth-child(even){
				background: #f1f1f1;
			}
		.news
		{
			margin-top: 150px;
			margin-left: 260px;
			
		}
		input, textarea
		{
			font-family: century Gothic;
			font-size: 15px;
		}
		a
		{
			 text-decoration: none;
			 color: black;
		}
		h1
		{
			position: absolute;
			top: 70px;
			left: 330px;
		}
		#submit
    	{
    		border: 0px;
			background-color: #006837;
 			box-shadow:none;
			position: absolute;
			margin-top: 400px;
			margin-left: 837px;
			color: white;
			padding: 10px;
			width: 200px;
			font-family: Century Gothic;
    	}
	</style>
</head>
<body>
<div><?php include("includes/navigation.php"); ?></div>
<form method="post" action="edit_news.php?edit_form=<?php echo $news_id; ?>" enctype="multipart/form-data">
<h1><a href="view_news.php">News</a> > Edit News</h1>
<div class="news">
	<table class="tblcolor" align="center" border="0">
		<tr>
			<td align="right">News Title:</td>
			<td><input type="text" name="title" size="50" value="<?php echo $news_title; ?>" required></td>
		</tr>
		<tr>
			<td align="right">News Author:</td>
			<td><input type="text" name="author" size="50" value="<?php echo $news_author; ?>" required></td>
		</tr>
		<tr>
			<td align="right">News Content:</td>
			<td><textarea name="content" cols="80" rows="8"><?php echo $news_content; ?></textarea></td>
		</tr>
		<tr>
			<td align="right">News Image:</td>
			<td>
			<input type="file" name="image">
			<img src="images/<?php echo $news_image; ?>" width="100px" height="100px"></td>
		</tr>
		<input type="submit" name="submit" value="Update" id="submit">
		
	</table>
</div>
</form>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
		$update_id = $_GET['edit_form'];
		$news_title1 = $_POST['title'];
		$news_date1 = date('m-d-y');
		$news_author1 = $_POST['author'];
		$news_content1 = $_POST['content'];
		$news_image1 = $_FILES['image']['name'];
		$image_tmp = $_FILES['image']['tmp_name'];

		if($news_title1 && $news_author1 && $news_content1)
		{
			move_uploaded_file($image_tmp,"images/$news_image1");

			$update_query = "update tblnews set news_title='$news_title1',news_date='$news_date1',news_author='$news_author1',news_image='$news_image1',news_content='$news_content1' where news_id= '$update_id'";

			if(mysql_query($update_query))
			{
				echo "<script>alert('News Added!')</script>";
				header("Location:view_news.php");
			}
		}
	}
?>