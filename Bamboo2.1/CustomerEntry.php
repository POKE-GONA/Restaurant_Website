<?php 
include('connection.php');
include'HeaderEntry.php';

if (isset($_POST['btnSave']))
{
	$txtCustomerName=$_POST['txtCustomerName'];
	$txtEmail=$_POST['txtEmail'];
	$txtPassword=$_POST['txtPassword'];
	$txtPhone=$_POST['txtPhone'];
	$txtAddress=$_POST['txtAddress'];

	$checkEmail="SELECT * FROM customer WHERE Email='$txtEmail'";
	$ret=mysqli_query($connection,$checkEmail) or die(mysqli_error($connection));
	$count=mysqli_num_rows($ret);

	if($count > 0) 
	{
		echo "<script>window.alert('ERROR : Email Address already exist.')</script>";
		echo "<script>window.location='CustomerEntry.php'</script>";
	}
	else
	{
		 $Insert="INSERT INTO  `customer`(`CustomerName`, `Email`, `Password`, `Phone`, `Address`) VALUES 
				 ('$txtCustomerName','$txtEmail','$txtPassword','$txtPhone','$txtAddress') ";
		$ret=mysqli_query($connection,$Insert);

		if($ret) //True
		{
			echo "<script>window.alert('SUCCESS : Customer Account Created.')</script>";
			echo "<script>window.location='CustomerEntry.php'</script>";
		}
		else
		{
			echo "<p>Error : Something went wrong in Customer Entry" . mysqli_error($connection) . "</p>";
		}

	}

}

 ?>

<head>
	<title>Customer Entry</title>
	<script type="text/javascript" src="DatePicker/datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="DatePicker/datepicker.css"/>
	
	
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
</head>
<body background="gray">

	<script>
	$(document).ready( function () {
		$('#tableid').DataTable();
	} );
</script>

	<form action="CustomerEntry.php" method="POST" enctype="multipart/form-data">
	<fieldset>
		<h2><ins><i>Enter Customer Information</i></ins></h2><br>
		<table>
			<tr>
				<td>Customer Name:</td>
				<td>
					<input type="text" name="txtCustomerName" placeholder="Enter Customer Name" required />
				</td>
			</tr>

			<tr>
				<td>Email :</td>
				<td>
					<input type="email" name="txtEmail" placeholder="Enter Customer Email Address" required />
				</td>			
			</tr>

			<tr>
				<td>Password :</td>
				<td>
					<input type="password" name="txtPassword" placeholder="Enter Customer Password" required />
				</td>
			</tr>

			<tr>
				<td>Phone :</td>
				<td>
					<input type="text" name="txtPhone" placeholder="+95- - - - - - - - - - " required />
				</td>
			</tr>

			<tr>
					<td>Address :</td>
					<td><textarea name="txtAddress"></textarea></td>
			</tr>

			<tr>
					<td></td>
					<td>
						<input type="submit" name="btnSave" value="Save" required />
						<input type="reset" name="Clear" required />
					</td>
			</tr>

		</table>
	</fieldset>
	
</form>
</body>
 <?php 
    include'FooterEntry.php';
 ?>