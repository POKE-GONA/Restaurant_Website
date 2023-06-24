<?php 
session_start();
include('HeaderLogin.php');
include('connection.php');

if(isset($_POST['btnUpdate']))
 {
 	$MenuTypeID=$_POST['txtMenuTypeID'];
	$txtMenuTypeName=$_POST['txtMenuTypeName'];
	$txtPrice=$_POST['txtPrice'];

	//Update Menu Type Update Data in table
	$Update="UPDATE MenuType
			 SET 
			 MenuTypeName='$txtMenuTypeName',
			 Price='$txtPrice'
			 WHERE
			 MenuTypeID='$MenuTypeID'
			 ";
	$ret=mysqli_query($connection,$Update);

	if($ret) //True
	{
		echo "<script>window.alert('SUCCESS : MenuType Update.')</script>";
		echo "<script>window.location='MenuType.php'</script>";
	}
	else
	{
		echo "<p>Error : Something went wrong in MenyType Update" . mysqli_error($connection) . "</p>";
	}
}
	
if(isset($_GET['MenuTypeID']))
{
	$MenuTypeID=$_GET['MenuTypeID'];
	$Query="SELECT * FROM MenuType WHERE MenuTypeID='$MenuTypeID'";

	$ret=mysqli_query($connection,$Query);
	$rows=mysqli_fetch_array($ret);
	$MCount=mysqli_num_rows($ret);

	if ($MCount < 1) 
	{
		echo "<script>window.alert('ERROR : Menutype Not Found.')</script>";
		echo "<script>window.location='MenuType.php'</script>";
	}
}
else
{
	$MenuTypeID="";
	echo "<script>window.alert('Somthing went wrong | MenuTypeID not found')</script>";
	echo "<script>window.location='MenuType.php'</script>";
	exit();
}
 ?>
 
<head>
<title>Menu Update</title>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

</head>
<body>
	<form action="MenuTypeUpdate.php" method="POST">
	<fieldset>
		<h3><ins><i>Menu Type Update Information</i></ins></h3><br>
		
	<table>
		<tr>
			<td>Menu Type Name:</td>
				<td>
					<input type="text" name="txtMenuTypeName" value="<?php echo $rows['MenuTypeName'] ?>" required />
				</td>
			</tr>
				
			<tr>
				<td>Price:</td>
				<td>
					<input type="number" name="txtPrice" value="<?php echo $rows['Price'] ?>" required />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="txtMenuTypeID" value="<?php echo $MenuTypeID ?>" />
					<input type="submit" name="btnUpdate" value="Update" />
					<input type="reset" name="Clear" />
				</td>
			</tr>
		</table>
	</fieldset>
</form>
</body>

<?php include('FooterLogin.php') ?>