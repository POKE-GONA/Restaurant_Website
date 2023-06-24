<?php  
session_start();
include('connection.php');
include('HeaderLogin.php');

if(isset($_POST['btnsave'])) 
{
	$txttownshipname=$_POST['txttownshipname'];
	$txtdeliverycost=$_POST['txtdeliverycost'];

	//Check Township Name Already exist or not
	$check_name="SELECT * FROM township WHERE TownshipName='$txttownshipname'";
	$run=mysqli_query($connection,$check_name);
	$count=mysqli_num_rows($run);

	if($count > 0) 
	{
		echo "<script>window.alert('Township Name $txttownshipname aleready exist!')</script>";
		echo "<script>window.location='Staff_Register.php'</script>";
		exit();
	}

	//Insert Township Data in table
	$create="INSERT INTO township
				  (TownshipName,DeliveryCost)
				  VALUES
				  ('$txttownshipname','$txtdeliverycost')
				  ";
	$run=mysqli_query($connection,$create);

	if($run) //True
	{
		echo "<script>window.alert('Township Data Successfully Created!')</script>";
		echo "<script>window.location='Staff_Login.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Township Data" . mysqli_error($connection) . "</p>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Township</title>
</head>
<body>

<form action="Township.php" method="POST">
<fieldset>
	<h3><ins><i>Enter Township Information from Staff :</i></ins></h3><br><br>

<table>
<tr>
	<td>Township Name:</td>
	<td>
		<input name="txttownshipname" type="text"  placeholder="Enter Township Name" required />
	</td>
</tr>

<tr>
	<td>Delivery Cost:</td>
	<td>
		<input name="txtdeliverycost" type="text"  placeholder="Enter Delivery Cost" required />
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<input name="btnsave" type="submit" value="Save" />
		<input type="reset" value="clear" />
	</td>
</tr>

</table>
</form>

</body>
</html>
<?php include('FooterLogin.php') ?>