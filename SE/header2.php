<!DOCTYPE html>
<html>
<head>
<title>Vit Parking System</title>
<link rel="stylesheet" href="s1.css" type="text/css">
<style type="text/css">
	li {
        font-family: sans-serif;
        font-size:18px;
    }

html { 
  background: url(img/header2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}	
	 
</style>
<script src="jquery.js"></script>
        <script>
            $(document).ready(function(){
              $("#Logout").hide();
            };
            $(document).ready(function(){
                $("#user").hover(function(){
                    $("#Logout").toggle("slow");
                });
            });
        </script>
</head>
<body link="white" alink="white" vlink="white">
     <div class="container dark">
        <div class="wrapper">
          <div class="Menu">
             <nav>
                <a href="uhome.php">Home</a>
            <a href="booktkt.php">Book Spot</a>
            <a href="pnrstatus.php">Booking Details</a>
            <a href="location.php">Location</a>
            <a href="unbook.php">Unbook</a>
            <a href="logout.php">Logout</a>
    <div class="animation start-home"></div>
</nav>
          </div>
        </div>
      </div>
</html>

            