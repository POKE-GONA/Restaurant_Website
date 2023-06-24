<?php  
session_start();
include'HeaderSearch2.php';
include('connection.php');

if (!isset($_SESSION['StaffID'])) 
	{
		echo "<script>alert('Please Login Account.');</script>";
		echo "<script>window.location='Staff_Login.php';</script>";
	}

if (isset($_SESSION['StaffID'])) 
{
	$StaffID=$_SESSION['StaffID'];
	$select="SELECT * from staff where StaffID='$StaffID'";
	$run=mysqli_query($connection,$select);
	$ret=mysqli_fetch_array($run);
	$StaffName=$ret['StaffName'];
	$StaffEmail=$ret['StaffEmail'];
	$StaffPassword=$ret['StaffPassword'];
	$StaffPhone=$ret['StaffPhone'];
	$StaffPosition=$ret['StaffPosition'];
	$StaffAddress=$ret['StaffAddress'];	
}

if(isset($_POST['btnUpdate'])) 
{
	$txtStaffID=$_POST['txtStaffID'];
	$txtstaffname=$_POST['txtstaffname'];
	$txtemail=$_POST['txtemail'];
	$txtpassword=$_POST['txtpassword'];
	$txtphone=$_POST['txtphone'];
	$sPosition=$_POST['sPosition'];
	$txtaddress=$_POST['txtaddress'];

	//Update Staff Update Data in table
	$update_data="UPDATE staff 
				  SET 
				  StaffName='$txtstaffname',
				  StaffEmail='$txtemail',
				  StaffPassword='$txtpassword',
				  StaffPhone='$txtphone',
				  StaffPosition='$sPosition',
				  StaffAddress='$txtaddress'
				  WHERE StaffID='$txtStaffID'
				  ";
	$result=mysqli_query($connection,$update_data);

	if($result) //True
	{
		echo "<script>window.alert('Staff account Successfully Updated!')</script>";
		echo "<script>window.location='Staff_Register.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Staff Update" . mysqli_error($connection) . "</p>";
	}
}

// if(isset($_GET['StaffID'])) 
// {
// 	$StaffID=$_GET['StaffID'];

// 	$query="SELECT * FROM staff WHERE StaffID='$StaffID'";
// 	$ret=mysqli_query($connection,$query);
// 	$rows=mysqli_fetch_array($ret);
// }
// else
// {
// 	$StaffID="";
// 	echo "<script>window.alert('Somthing went wrong | Staff_ID not found')</script>";
// 	echo "<script>window.location='Staff_Register.php'</script>";
// 	exit();
// }

?>

<head>
<title>Staff Update</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

</head>
<body>
<form action="Staff_Update.php" method="post">

<!-- <a href="Staff_Home.php">Staff Home >></a> -->

<fieldset>
	<h3><ins><i>Enter Staff Information for Update</i></ins></h3><br><br>

<table>
<tr>
	<td>Staff Name</td>
	<td>
		<input type="text" name="txtstaffname" value="<?php echo $StaffName ?>" required />
	</td>
</tr>
<tr>
	<td>Staff Email</td>
	<td>
		<input type="email" name="txtemail" value="<?php echo $StaffEmail ?>" required />
	</td>
</tr>
<tr>
	<td>Staff Password</td>
	<td>
		<input type="password" name="txtpassword" value="<?php echo $StaffPassword ?>" required />
	</td>
</tr>
<tr>
	<td>Staff Phone</td>
	<td>
		<input type="text" name="txtphone" value="<?php echo $StaffPhone ?>" required />
	</td>
</tr>
<tr>
	<td>Staff Position</td>
	<td>
		<select name="sPosition">
			<option><?php echo $StaffPosition ?></option>
			<option>-Choose Position-</option>
			<option>Manager</option>
			<option>Sale Manager</option>
			<option>Administrative Staff</option>
			<option>Website Control Staff</option>
			<option>Maintenance Staff Staff</option>
		</select>
	</td>
</tr>
<tr>
	<td>Staff Address</td>
	<td>
		<textarea name="txtaddress">
			<?php echo $StaffAddress ?>
		</textarea>
	</td>
</tr>
<tr>
	<td></td>
	<td>
		<input type="hidden" name="txtStaffID" value="<?php echo $StaffID ?>" />
		<input type="submit" value="Update" name="btnUpdate"/>
		<input type="reset" value="Clear" />
	</td>
</tr>
</table>
</fieldset>

</form>
</body>

 <?php 
    include'FooterSearch2.php';
 ?>