<?php  
session_start();
include('connection.php');

$StaffID=$_GET['StaffID'];

$delete="DELETE FROM staff WHERE StaffID='$StaffID'";
$result=mysqli_query($connection,$delete);

if($result) //True
{
	echo "<script>window.alert('Staff Account Successfully Deleted!')</script>";
	echo "<script>window.location='Staff_Register.php'</script>";
}
else
{
	echo "<p>Something went wrong in Staff Delete" . mysqli_error($connection) . "</p>";
}
?>