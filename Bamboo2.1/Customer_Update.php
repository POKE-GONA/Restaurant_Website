<?php  
session_start();
include('HeaderLogin.php');
include('connection.php');

if (!isset($_SESSION['CustomerID'])) 
	{
		echo "<script>alert('Please Login Account.');</script>";
		echo "<script>window.location='Customer_Login.php';</script>";
	}

if (isset($_SESSION['CustomerID'])) 
{
	$CustomerID=$_SESSION['CustomerID'];
	$select="SELECT * from customer where CustomerID='$CustomerID'";
	$run=mysqli_query($connection,$select);
	$ret=mysqli_fetch_array($run);
	$CustomerName=$ret['CustomerName'];
	$Email=$ret['Email'];
	$Password=$ret['Password'];
	$Phone=$ret['Phone'];
	$Address=$ret['Address'];
	
}

if(isset($_POST['btnUpdate'])) 
{
	$CustomerID=$_POST['CustomerID'];
	$txtCustomerName=$_POST['txtCustomerName'];
	$txtEmail=$_POST['txtEmail'];
	$txtPassword=$_POST['txtPassword'];
	$txtPhone=$_POST['txtPhone'];
	$txtAddress=$_POST['txtAddress'];

	//Update Customer Data in table
	$update_data="UPDATE customer 
				  SET 
				  CustomerName='$txtCustomerName',
				  Email='$txtEmail',
				  Password='$txtPassword',
				  Phone='$txtPhone',
				  Address='$txtAddress'
				  WHERE CustomerID='$CustomerID'
				  ";
	$result=mysqli_query($connection,$update_data);

	if($result) //True
	{
		echo "<script>window.alert('Customer Account Successfully Updated!')</script>";
		echo "<script>window.location='Customer_Login.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Customer Update" . mysqli_error($connection) . "</p>";
	}
}

// if(isset($_GET['CustomerID'])) 
// {
// 	$txtCustomerID=$_GET['CustomerID'];

// 	$query="SELECT * FROM customer WHERE CustomerID='$txtCustomerID'";
// 	$ret=mysqli_query($connection,$query);
// 	$rows=mysqli_fetch_array($ret);
// }
// else
// {
// 	$txtCustomerID="";
// 	echo "<script>window.alert('Somthing went wrong | CustomerID not found')</script>";
// 	echo "<script>window.location='Customer_Login.php'</script>";
// 	exit();
// }

?>

<head>
<title>Customer Update</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

</head>
<body>
<form action="Customer_Update.php" method="POST">

<fieldset>
<h3><ins><i>Enter Customer Information for Update</i></ins></h3><br>

<table>

<tr>
	<td>Customer Name</td>
	<td>
		<input name="txtCustomerName" type="text"  value="<?php echo $CustomerName ?>" required />
	</td>
</tr>

<tr>
	<td>Email :</td>
	<td>
		<input name="txtEmail" type="email"  value="<?php echo $Email ?>" required />
	</td>
</tr>

<tr>
	<td>Password :</td>
	<td>
		<input name="txtPassword" type="password"  value="<?php echo $Password ?>" required />
	</td>
</tr>

<tr>
	<td>Phone :</td>
	<td>
		<input name="txtPhone" type="text"  value="<?php echo $Phone ?>" required />
	</td>
</tr>

<tr>
	<td>Address :</td>
	<td>
		<textarea name="txtAddress">
			<?php echo $Address ?>
		</textarea>
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<input type="hidden" name="CustomerID" value="<?php echo $CustomerID ?>" />
		<input type="submit" value="Update" name="btnUpdate"/>
		<input type="reset" value="Clear" />
	</td>
</tr>

</table>
</fieldset>

</form>
</body>

<?php include('FooterLogin.php') ?>