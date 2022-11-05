<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="h1s.css" type="text/css">
<style type="text/css">
	li {
		font-family: sans-serif;
		font-size:18px;
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
            <li><A HREF="index.php">Home</A></li>
			<li><A HREF="login.php">Login</A></li>
            <li><A HREF="register.php">Register</A></li>
            </ul>
          </div>
        </div>
      </div>
</body>
</html>
