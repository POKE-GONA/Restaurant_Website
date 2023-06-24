<?php
session_start(); 
include('connection.php');

session_destroy();

echo "<script>alert('Customer Logout Sccessful!')</script>";
echo "<script> window.location = 'Customer_Login.php'</script>";

 ?>