<?php
session_start();  
include("connection.php");
include('HeaderSearch.php');

if(isset($_POST['btnSave'])) 
{
	$cboMenuTypeID=$_POST['cboMenuTypeID'];
	$txtmeat=$_POST['txtmeat'];
	$txtveg=$_POST['txtveg'];
	$txtsea=$_POST['txtsea'];
	$txtsea2=$_POST['txtsea2'];
	$txtadd=$_POST['txtadd'];
	$txtdes=$_POST['txtdes'];

	$query="INSERT INTO MenuItem
			(MenuTypeID,Meat,Vegetables,Seafood, Seafood2, AdditionalFood, Descriptions) 
			VALUES
			('$cboMenuTypeID','$txtmeat','$txtveg','$txtsea', '$txtsea2', '$txtadd','$txtdes')
			";
	$result=mysqli_query($connection,$query);

	if($result)
	{
		echo "<script>window.alert('Item Registration Completed.')</script>";
		echo "<script>window.location='MenuItem.php'</script>";
	}
	else
	{
		echo "<p>Error in Product Entry : " . mysqli_error($connection) . "</p>";
	}
}

?>

<head>
	<title>Item Entry</title>
</head>
<body>
<form action="MenuItem.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>
	<h3><ins><i>BBQ Display</i></ins></h3>
</legend>

<table>
<tr>
	<td>Choose MenuType:</td>
	<td>
	<select name="cboMenuTypeID">
		<option>Choose Category ID</option>
		<?php 
		$query="SELECT * FROM MenuType";
		$ret=mysqli_query($connection,$query);
		$count=mysqli_num_rows($ret);

		for ($i=0; $i <$count ; $i++) 
		{ 
			$row=mysqli_fetch_array($ret);
			$CategoryNo=$row['MenuTypeID'];
			$CategoryName=$row['MenuTypeName'];

			echo "<option value='$CategoryNo'> $CategoryName </option>";
		}

		 ?>
	</select>
	</td>
</tr>

<tr>
	<td>Meat:</td>
	<td>
	<input type="text" name="txtmeat" required />
	</td>
</tr>

<tr>
	<td>Vegetables:</td>
	<td>
	<input type="text" name="txtveg"/>
	</td>
</tr>

<tr>
	<td>Seafood:</td>
	<td>
	<input type="text" name="txtsea"/>
	</td>
</tr>

<tr>
	<td>Seafood2:</td>
	<td>
	<input type="text" name="txtsea2"/>
	</td>
</tr>

<tr>
	<td>AdditionalFood:</td>
	<td>
	<input type="text" name="txtadd"/>
	</td>
</tr>

<tr>
	<td>Description:</td>
	<td>
	<input type="text" name="txtdes" required />
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<input type="submit" name="btnSave" value="Save"/>
		<input type="reset" value="Clear"/>
	</td>
</tr>

</table>
</fieldset>
<hr/>
</form>
</body>

<?php include('FooterSearch.php'); ?>