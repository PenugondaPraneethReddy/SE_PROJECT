<!DOCTYPE html>
<html>
<head>
	<title>Booking Details</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
	:root {
  --size: 1;
  --background: url(img/header2.jpg) no-repeat center center fixed; 
  --color1: #ccc;
  --color2: #ccc;
  --color3: #ccc;
  --color4: #ccc;
}

body {
  background: var(--background);
  color: white;
  font-family: Arial, Helvetica, sans-serif;
}

.ticket {
  width: 650px;
  height: 320px;
  margin: 100px auto;
  position: relative;
  transition: all 300ms cubic-bezier(0.03, 0.98, 0.53, 0.99) 0s;
  background: linear-gradient(
    to right,
    var(--color1),
    var(--color2),
    var(--color3),
    var(--color4)
  );
  border-radius: 20px;
  padding: 5px;
}

.ticket:before,
.ticket:after {
  content: '';
  display: block;
  position: absolute;
  top: 130px;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  z-index: 2;
  background-color: var(--background);
}

.ticket:before {
  border: 5px solid var(--color1);
  left: -35px;
}

.ticket:after {
  border: 5px solid var(--color4);
  right: -35px;
}

.ticket-content-wrapper {
  width: 100%;
  height: 100%;
  position: relative;
  background: #e0e0e0;
  border-radius: 15px;
  -moz-box-shadow:    3px 3px 5px 6px #ccc;
  -webkit-box-shadow: 3px 3px 5px 6px #ccc;
  box-shadow:         3px 3px 5px 6px #ccc;
}

.ticket:before {
  border: 5px solid var(--color1);
  left: -35px;
  clip-path: circle(65% at 100% 50%);
}

.ticket:after {
  border: 5px solid var(--color4);
  right: -35px;
  clip-path: circle(65% at 0 50%);
}

	</style>
</head>
<body>
<?php
  	session_start();
  	$conn = mysqli_connect("localhost","root","","Customer");
if(!$conn){  
  echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());
}
include("header2.php"); 
echo "<div class='ticket'>";
echo "<div class='ticket-content-wrapper'>";
$email=$_SESSION['user_info'];
$sql = "SELECT p_fname,p_lname FROM Customer WHERE email = '$email'";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
    $uts = mysqli_fetch_assoc($sql_result);
    echo "<p id=NAME>$uts[p_fname] $uts[p_lname]<p>";
    $srtr="<style>
    #NAME{
    position: relative;
    top : 15px;
    bottom: 0px;
    color: #000;
    font-size: 50px;
    font-weight: 900;
    right: 100px;
    font-family: 'Lucida Console', 'Courier New', monospace;
  }
    </style>";
    echo $srtr;
$sql = "SELECT t_no FROM Customer WHERE email = '$email'";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
    $use = mysqli_fetch_assoc($sql_result);
    echo "<p id='tkt'>SLOT NO: $use[t_no]<p>";
    $srtr="<style>
    #tkt{
    position: relative;
    top: 50px;
    bottom: 0px;
    color: #000;
    font-size: 30px;
    right: 100px;
    font-family: 'Lucida Console', 'Courier New', monospace;
  }
    </style>";
    echo $srtr;
    $sql = "SELECT location FROM Customer WHERE email = '$email'";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
    $us = mysqli_fetch_assoc($sql_result);
    echo "<p id=loc>LOCATION: $us[location]<p>";
    $srtr="<style>
    #loc{
    position: relative;
    top: 50px;
    bottom: 0px;
    color: #000;
    font-size: 30px;
    right: 100px;
    font-family: 'Lucida Console', 'Courier New', monospace;
  }
    </style>";
    echo $srtr;
 ?>
  </div>
</div>
</body>
</html>