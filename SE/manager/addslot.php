<?php
session_start();
	$conn = mysqli_connect("localhost","root","","Customer");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if(isset($_POST['submit'])){
	$email=$_POST['emal'];
	$trains=$_POST['Location'];
if($trains=='sjt')
{
 $sql = "INSERT INTO SJT (status, spot_id) VALUES ('NBooked',$email)";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not be executed" '.$sql);
$sql = "SELECT * FROM SJT";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not be executed" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$message='ADDED successfully';
		}
		else{
			$message = 'Enter Correct details';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";   
}
if($trains=='Mens_H')
{
 $sql = "INSERT INTO mensh (status, spot_id) VALUES ('NBooked',$email)";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not be executed" '.$sql);
$sql = "SELECT * FROM mensh";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not be executed" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$message='ADDED successfully';
		}
		else{
			$message = 'Enter Correct details';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";   
}
if($trains=='VIT_M')
{
 $sql = "INSERT INTO vit_m (status, spot_id) VALUES ('NBooked',$email)";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not be executed" '.$sql);
$sql = "SELECT * FROM vit_m";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not be executed" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$message='ADDED successfully';
		}
		else{
			$message = 'Enter Correct details';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";   
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Slot</title>
</head>
<style type="text/css">
	#loginarea{
		background-color: white;
		width: 30%;
		margin: auto;
		border-radius: 25px;
		border: 2px solid blue;
		margin-top: 100px;
		background-color: rgba(0,0,0,0.2);
	    box-shadow: inset -2px -2px rgba(0,0,0,0.5);
	    padding: 40px;
	    font-family:sans-serif;
		font-size: 20px;
		color: white;
	}
	html { 
		background: url(img/wallpaper1.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	#submit	{
		border-radius: 5px;
		background-color: rgba(0,0,0,0);
		padding: 7px 7px 7px 7px;
		box-shadow: inset -1px -1px rgba(0,0,0,0.5);
		font-family:"Comic Sans MS", cursive, sans-serif;
		font-size: 17px;
		margin:auto;
		margin-top: 20px;
  		display:block;
  		color: white;
	}
	#logintext	{
		text-align: center;
	}
	.data	{
		color: white;
	}
</style>
<body>
	<?php include("mheader.php") ?>
	<div id="loginarea">
	<form id="login" action="addslot.php"  method="post" name="login">
	<div id="logintext">ADD SLOT!</div><br/><br/>
	<table>
		<div class="data">Enter Slot ID:</div><input type="number" id="emal" name="emal" size="30" min="1" maxlength="3"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><select id="Location" name="Location" required>
			<option selected disabled>-------------------Select Parking Spot here----------------------</option>
			<option value="sjt" >SJT </option>
			<option value="Mens_H" >MENS HOSTEL</option>
			<option value="VIT_M">VIT MAIN GATE</option>
		</select></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
	<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button">
	</form></div>
</body>
</html>
