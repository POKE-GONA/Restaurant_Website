<?php
session_start(); 
include('connection.php');

session_destroy();

echo "<script>alert('Staff Logout Sccessful!')</script>";
echo "<script> window.location = 'Staff_Login.php'</script>";

 ?>