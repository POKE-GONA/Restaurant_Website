<?php  
session_start();
include('connection.php');

$CategoryID=$_GET['CategoryID'];

$delete="DELETE FROM category WHERE CategoryID='$CategoryID'";
$result=mysqli_query($connection,$delete);

if($result) //True
{
	echo "<script>window.alert('Category Lists Successfully Deleted!')</script>";
	echo "<script>window.location='Category.php'</script>";
}
else
{
	echo "<p>Something went wrong in Category Delete" . mysqli_error($connection) . "</p>";
}
?>