<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="s1.css" type="text/css">
<style type="text/css">
	li {
		font-family: sans-serif;
		font-size:18px;
	}
html { 
  background: url(../img/backgroundimage.jpg) no-repeat center center fixed; 
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
            <ul id="navmenu">
            <li><A HREF="home.php">Home</A></li>
            <li><A HREF="addslot.php">Add Slot</A></li>
            <li><A HREF="removeslot.php">Remove Slot</A></li>
            <li><a href="blockslot.php">Block Slot</a></li>
            <li><?php  
				if(isset($_SESSION['user_info'])){
					echo '<div id="dropdown">'.$_SESSION['user_info'].'<div id="Logout" style="display:none">Logout</div>';
        }
				?>
			</li>
            </ul>
          </div>
        </div>
      </div>
</body>
</html>
