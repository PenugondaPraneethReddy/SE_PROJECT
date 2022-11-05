<!DOCTYPE html>
<html>
<head>
  <title>Login</title><link rel="stylesheet" href="style.css">
	<style type="text/css">
		#buttons{
			margin-left: 500px;
			margin-bottom: 40px;
			margin-top: 30px
		}
    #Book{
      margin-left: 1100px;
      margin-bottom: 40px;
      margin-top: 30px
    }
	</style>
</head>
<body>
<?php
session_start();
if(empty($_SESSION['user_info'])){
    echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
    echo '<script>location.href = "Login.php";</script>';
  }
  $conn = mysqli_connect("localhost","root","","Customer");
if(!$conn){  
  echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());
    echo '<script>location.href = "booktkt.php";</script>';
}
$email=$_SESSION['user_info'];
$sql = "SELECT t_no FROM Customer WHERE email = '$email'";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
    $use = mysqli_fetch_assoc($sql_result);
    if($use['t_no']!=''){
      echo "<script type='text/javascript'>alert('Cannot Book more than one spot!!!!');</script>";
      echo "<script type='text/javascript'>alert('Please Check Here!!!!');</script>";
      echo '<script>location.href = "pnrstatus.php";</script>';
    }
include ('header2.php');
echo "<div id='buttons'>";
$result = mysqli_query($conn,"SELECT spot_id FROM sjt WHERE 1");
$postcodes = array();
while ($row = mysqli_fetch_array($result)) {
    $postcodes[] = $row[0];
}
$statuscodes = array();
$result1 = mysqli_query($conn,"SELECT status FROM sjt WHERE 1");
while ($stat = mysqli_fetch_array($result1)) {
    $statuscodes[] = $stat[0];
}
$_SESSION['b']='N';
$total = mysqli_num_rows($result);
echo "<form method='post'>";
for ($x = 0; $x <= $total-1; $x++) {
	if ($x%"5"=="0") {
		echo "<br>";
		echo "<br>";
    if ($statuscodes[$x]=='NBooked'){
	$str='<input type="submit" value="'.$postcodes[$x].'" name="bt'.$x.'"id="bt'.$x.'"/>&nbsp&nbsp';
	$str1='<style>
	#bt'.$x.'{
  padding: 90px 45px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #04AA6D;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

#bt'.$x.':hover {background-color: #3e8e41}

#bt'.$x.':active {
  background-color: grey;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>';
}
if($statuscodes[$x]!='NBooked'){
	$str='<input type="submit" value="'.$postcodes[$x].'" name="bt'.$x.'"id="bt'.$x.'"/>&nbsp&nbsp';
	$str1='<style>
	#bt'.$x.'{
  padding: 90px 45px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #FF4500;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}


#bt'.$x.':active {
  background-color: #DC143C;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>';
}
}
    else{
    if ($statuscodes[$x]=='NBooked'){
	$str='<input type="submit" value="'.$postcodes[$x].'" name="bt'.$x.'"id="bt'.$x.'"/>&nbsp&nbsp';
	$str1='<style>
	#bt'.$x.'{
  padding: 90px 45px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #04AA6D;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

#bt'.$x.':hover {background-color: #3e8e41}

#bt'.$x.':active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>';
}
if($statuscodes[$x]!='NBooked'){
	$str='<input type="submit" value="'.$postcodes[$x].'" name="bt'.$x.'"id="bt'.$x.'"/>&nbsp&nbsp';
	$str1='<style>
	#bt'.$x.'{
  padding: 90px 45px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #FF4500;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}


#bt'.$x.':active {
  background-color: #DC143C;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>';
}
}
echo $str;
echo $str1;
}
echo "</div>";
$bstr='<input type="submit" value="Book" name="Book"id="Book"/>';
  $bst1='<style>
  #Book{
  padding: 20px 20px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color:  #000000;
  background-color: #EBF0F0;
  border: none;
  border-radius: 10px;
  box-shadow: 0 2px #999;
}


#Book:active {
  background-color: #DC143C;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>';
echo $bstr;
echo $bst1;
for ($x = 0; $x <= $total-1; $x++) {
  $click=-1;
if(isset($_POST['bt'.$x.'']) && $statuscodes[$x]=="NBooked") {
            $str3='<style>
  #bt'.$x.'{
  padding: 90px 45px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #008CBA;;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}#bt'.$x.':hover {background-color: #3e8e41}

#bt'.$x.':active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>';
echo $str3;
$_SESSION['b']=$postcodes[$x];
echo $_SESSION['b'];
}
}
if(isset($_POST['Book'])) {
  echo $_SESSION['b'];
  if($_SESSION['b']!='N'){
  $mys=$_SESSION['b'];
$u=$_SESSION['user_info'];
$booking = mysqli_query($conn,"UPDATE sjt SET status ='Booked' WHERE spot_id='$mys'");
 if(!$conn){  
  echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());  
}

$booking = mysqli_query($conn,"UPDATE Customer SET t_no='$mys' WHERE email='$u';");
$bookin = mysqli_query($conn,"UPDATE Customer SET location='SJT' WHERE email='$u';");
 if(!$conn){  
  echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());  
}
  }
  $_SESSION['b']='N';
 }
 
echo "</form>";
?>
</body>
</html>