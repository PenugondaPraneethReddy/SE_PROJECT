<?php 
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
	}
if (isset($_POST['submit']))
{
if(isset($_POST['Location'])){
	$trains=$_POST['Location'];
if($trains=='sjt')
{
 echo '<script>location.href = "slot.php";</script>';   
}
if($trains=='Mens_H')
{
 echo '<script>location.href = "slotmensh.php";</script>';   
}
if($trains=='VIT_M')
{
 echo '<script>location.href = "slotvitm.php";</script>';   
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a Spot</title>
	<link rel="stylesheet" href="style.css">
	<style type="text/css">
		#booktkt	{
			margin:auto;
			margin-top: 50px;
			width: 40%;
			height: 60%;
			padding: auto;
			padding-top: 50px;
			padding-left: 50px;
			background-color: rgba(0,0,0,0.3);
			border-radius: 25px;
		}
		html { 
		  background: url(img/wallpaper1.jpg) no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#journeytext	{
			color: white;
			font-size: 28px;
			font-family:"Comic Sans MS", cursive, sans-serif;
		}
		#trains	{
			margin-left: 90px;
			font-size: 15px;
		}
		#submit	{
			margin-left: 150px;
			margin-bottom: 40px;
			margin-top: 30px
		}
	</style>
</head>
<body>
	<?php
		include ('header2.php');
	?>
	<div id="booktkt">
	<h1 align="center" id="journeytext">Choose your Location</h1><br/><br/>
	<form method="post" name="journeyform">
		<select id="Location" name="Location" required>
			<option selected disabled>-------------------Select Parking Spot here----------------------</option>
			<option value="sjt" >SJT </option>
			<option value="Mens_H" >MENS HOSTEL</option>
			<option value="VIT_M">VIT MAIN GATE</option>
		</select>
		<br/><br/>
		<input type="submit" name="submit" id="submit" class="button" />
	</form>
	</div>
	</body>
	</html>