<?php 
include('connection.php');
include('HeaderLogin.php');

if(isset($_POST['btnUpdate'])) 
{
	$txtcategoryid=$_POST['txtcategoryid'];
	$txtcategoryname= $_POST['txtcategoryname'];
	$rdostatus=$_POST['rdostatus'];

	//Update Category Update Data in table
	$update_data="UPDATE category 
				  SET 
				  CategoryName='$txtcategoryname',
				  Status='$rdostatus'
				  WHERE CategoryID='$txtcategoryid'
				  ";
	$result=mysqli_query($connection,$update_data);

	if($result) //True
	{
		echo "<script>window.alert('Category Update Successfully Updated!')</script>";
		echo "<script>window.location='Category.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Category Update" . mysqli_error($connection) . "</p>";
	}
}

if(isset($_GET['CategoryID'])) 
{
	$CategoryID=$_GET['CategoryID'];
	$query="SELECT * FROM Category WHERE CategoryID='$CategoryID'";
	$ret=mysqli_query($connection,$query);
	$rows=mysqli_fetch_array($ret);
	$count=mysqli_num_rows($ret);

	if($count < 1) 
	{
		echo "<script>window.alert('Category aleready exist!')</script>";
		echo "<script>window.location='Category.php'</script>";
		exit();
	}
}
else
{
	$CategoryID="";
	echo "<script>window.location='Category.php'</script>";
	exit();
}
 ?>

 <head>
<title>Category Update</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

</head>
<body>
<form action="CategoryUpdate.php" method="POST">

<fieldset>
<h3><ins><i>Enter Category Information for Update</i></ins></h3><br>

<table>
<tr>
	<td>Category Name</td>
	<td>
		<input name="txtcategoryname" type="text"  value="<?php echo $rows['CategoryName'] ?>" required />
		<input type="hidden" name="txtcategoryid" value="<?php echo $rows['CategoryID'] ?>" />
	</td>
</tr>

<tr>
	<td>Status</td>
	<td>
				
		<input type="radio" name="rdostatus" value="active">
		<?php if ($rows["Status"]=='active')
		{
			echo "checked";
		} ?> Active

		<input type="radio" name="rdostatus" value="inactive">
		<?php if ($rows["Status"]=='inactive')
		{
			echo "checked";
		} ?> Inactive

	</td>
</tr>

<tr>
	<td></td>
	<td>
		<input name="btnUpdate" type="submit" value="Update" />
		<input type="reset" value="Cancel" />
	</td>
</tr>
</table>
</fieldset>

</form>
</body>

<?php include('FooterLogin.php') ?>