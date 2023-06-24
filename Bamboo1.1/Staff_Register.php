<?php  
session_start();
include'HeaderSearch2.php';
include('connection.php');

if(isset($_POST['btnsave'])) 
{
	$txtStaffName=$_POST['txtstaffname'];
	$txtEmail=$_POST['txtemail'];
	$txtPassword=$_POST['txtpassword'];
	$txtPhone=$_POST['txtphone'];

	$image1=$_FILES['staffimage']['name'];
	$folder='staffimage/';
	

	if($image1)
	{
		$filename=$folder."_".$image1;
		$copied=copy($_FILES['staffimage']['tmp_name'],$filename);

		if(!$copied)
		{
			exit("Problem occured.Cannot Upload Event Image.");
		}
	}

	$sPosition=$_POST['sPosition'];
	$txtAddress=$_POST['txtaddress'];

	//Check Staff Email Already exist or not
	$check_email="SELECT * FROM staff WHERE StaffEmail='$txtEmail'";
	$run=mysqli_query($connection,$check_email);
	$count=mysqli_num_rows($run);

	if($count > 0) 
	{
		echo "<script>window.alert('Staff Email $txtemail aleready exist!')</script>";
		echo "<script>window.location='Staff_Register.php'</script>";
		exit();
	}

	//Insert Staff Data in table
	$create="INSERT INTO staff
				  (StaffName,StaffEmail,StaffPassword,StaffPhone,StaffImage,StaffPosition,StaffAddress)
				  VALUES
				  ('$txtStaffName','$txtEmail','$txtPassword','$txtPhone','$filename','$sPosition','$txtAddress')
				  ";
	$run=mysqli_query($connection,$create);

	if($run) //True
	{
		echo "<script>window.alert('Staff Account Successfully Created!')</script>";
		echo "<script>window.location='Staff_Login.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Staff Register" . mysqli_error($connection) . "</p>";
	}
}

?>

<head>
	<title>Staff Register</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

</head>
<body>

<script>
	$(document).ready( function (){
		$('#tableid').DataTable();
	} );
</script>

<form action="Staff_Register.php" method="POST" enctype="multipart/form-data">

<fieldset>
<legend>
	<h3><ins><i>Enter Staff Register Information</i></ins></h3><br><br>
</legend>

<table>
<tr>
	<td>Staff Name:</td>
	<td>
		<input name="txtstaffname" type="text"  placeholder="Enter Staff Name" required />
	</td>
</tr>

<tr>
	<td>Staff Email:</td>
	<td>
		<input name="txtemail" type="email"  placeholder="example@email.com" required />
	</td>
</tr>

<tr>
	<td>Password:</td>
	<td>
		<input name="txtpassword" type="password" id="password" minlength="8" placeholder="***********" required />
	</td>
</tr>

<tr>
	<td>Phone:</td>
	<td>
		<input name="txtphone" type="text"  placeholder="[+95] Enter number" required />
	</td>
</tr><p>

<th><tr>
	<td>Image:</td>
	<td>
		<input name="staffimage" type="file"  placeholder="Choose File" required />
	</td>
</tr></th>

<tr>
	<td>Position:</td>
	<td>
		<select name="sPosition">
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
	<td>Address:</td>
	<td>
		<textarea name="txtaddress"></textarea>
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<input name="btnsave" type="submit" value="Save" /> 
		<input type="reset" value="clear" />
		<p>Already have an account?  <a href="login.html"> Login Now!</a></p>
	</td>
</tr>
</table>
</fieldset>
<br>
<br>
<br>

<fieldset>
<h3><ins><i>Staff Listing</i></ins></h3><br>

<table id="tableid" class="display" width="100%" border="1">
<thead>
<tr>
	<th>Staff Name</th>
	<th>Staff Phone</th>
	<th>Staff Image</th>
	<th>Staff Email</th>
	<th>Staff Positions</th>
	<th>Action</th>
</tr>	
</thead>
<tbody>
<?php  
	
	$staff_select="SELECT * FROM staff";
	$staff_ret=mysqli_query($connection,$staff_select);
	$staff_count=mysqli_num_rows($staff_ret);

	for($i=0;$i<$staff_count;$i++) 
	{ 
		$rows=mysqli_fetch_array($staff_ret);
		$StaffID=$rows['StaffID'];
		$image1=$rows['StaffImage'];

		echo "<tr>";
			echo "<td>" . $rows['StaffName'] . "</td>";
			echo "<td>" . $rows['StaffPhone'] . "</td>";
			echo "<th><img src='$image1' width='100px' height='100px'/></th>";
			echo "<td>" . $rows['StaffEmail'] . "</td>";
			echo "<td>" . $rows['StaffPosition'] . "</td>";
			echo "<th>
				  <a href='Staff_Update.php?StaffID=$StaffID'>Update</a> |
				  <a href='Staff_Delete.php?StaffID=$StaffID'>Delete</a>
				  </th>";
		echo "</tr>";
	}

?>
</tbody>
</table>

</fieldset>

</form>
</body>

 <?php 
    include'FooterSearch2.php';
 ?>