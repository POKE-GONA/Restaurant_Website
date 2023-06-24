<?php 

include('connection.php');
$MenuTypeID=$_GET['MenuTypeID'];
$Delete="DELETE FROM MenuType WHERE MenuTypeID='$MenuTypeID'";
$result=mysqli_query($connection,$Delete);


if($result) //True
{
	echo "<script>window.alert('SUCCESS : MenuType Account Deleted.')</script>";
	echo "<script>window.location='MenuType.php'</script>";
}
else
{
	echo "<p>Error : Something went wrong in RawMaterials Delete" . mysqli_error($connection) . "</p>";
}
?>

