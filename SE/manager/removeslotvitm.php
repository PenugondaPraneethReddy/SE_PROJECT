<!DOCTYPE html>
<html>
<head>
  <title>VIT MAIN GATE</title><link rel="stylesheet" href="style.css">
	<style type="text/css">
		#buttons{
			margin-left: 500px;
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
    echo '<script>location.href = "removeslot.php";</script>';
}
$email=$_SESSION['user_info'];
include ('mheader.php');
echo "<div id='buttons'>";
$result = mysqli_query($conn,"SELECT spot_id FROM vit_m WHERE 1");
$postcodes = array();
while ($row = mysqli_fetch_array($result)) {
    $postcodes[] = $row[0];
}
$statuscodes = array();
$result1 = mysqli_query($conn,"SELECT status FROM vit_m WHERE 1");
while ($stat = mysqli_fetch_array($result1)) {
    $statuscodes[] = $stat[0];
}
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
$mys=$postcodes[$x];
$u=$_SESSION['user_info'];
$booking = mysqli_query($conn,"DELETE FROM vit_m WHERE spot_id=".$postcodes[$x]."");
 if(!$conn){  
  echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());  
}
}
}
echo "</form>";
?>
</div>
</body>
</html>