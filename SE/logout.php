<?php
session_start();
unset($_SESSION['user_info']);
echo'<script>location.href = "index.php";</script>';
?>