<!DOCTYPE html>
<html>
<head>
  <title>Unbook</title><link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
if(empty($_SESSION['user_info'])){
    echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
    echo '<script>location.href = "Login.php";</script>';
  }
else{
  $conn = mysqli_connect("localhost","root","","Customer");
if(!$conn){  
  echo "<script type='text/javascript'>alert('Database failed');</script>";
    die('Could not connect: '.mysqli_connect_error());
    echo '<script>location.href = "booktkt.php";</script>';
}
$email=$_SESSION['user_info'];
$sql = "SELECT t_no,location FROM Customer WHERE email = '$email'";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
    $use = mysqli_fetch_assoc($sql_result);
    if($use['t_no']!=""){
    $i=$use['t_no'];
    $j=$use['location'];
$sql1 ="UPDATE Customer SET t_no=NULL,location=NULL  WHERE t_no = $i";
$sql_result1 = mysqli_query ($conn, $sql1) or die ('request "Could not execute SQL query" '.$sql);
if($j=="SJT"){
  $sql2 ="UPDATE sjt SET status='NBooked'  WHERE spot_id = $i";
  $sql_result2 = mysqli_query ($conn, $sql2) or die ('request "Could not execute SQL query" '.$sql);
  echo "<script type='text/javascript'>alert('Sucessfull!');</script>";
}
if($j=="MENS HOSTEL"){
  $sql3 ="UPDATE mensh SET status='NBooked'  WHERE spot_id = $i";
  $sql_result3 = mysqli_query ($conn, $sql2) or die ('request "Could not execute SQL query" '.$sql);
  echo "<script type='text/javascript'>alert('Sucessfull!');</script>";
}
if($j=="MENS HOSTEL"){
  $sql3 ="UPDATE vit_m SET status='NBooked'  WHERE spot_id = $i";
  $sql_result3 = mysqli_query ($conn, $sql2) or die ('request "Could not execute SQL query" '.$sql);
  echo "<script type='text/javascript'>alert('Sucessfull!');</script>";
}
echo '<script>location.href = "booktkt.php";</script>';
}
else{
  echo "<script type='text/javascript'>alert('Book before ubooking');</script>";
  echo '<script>location.href = "booktkt.php";</script>';
}
}
?>
</div>
</body>
</html>