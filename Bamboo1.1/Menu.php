<?php
session_start();  
include("connection.php");
include('HeaderSearch.php');

if(isset($_POST['btnSave'])) 
{
	$cboCategoryID=$_POST['cboCategoryID'];
	$cboType=$_POST['cboType'];
	$txtmenuname=$_POST['txtmenuname'];
	$txtaddi=$_POST['txtaddi'];
	$txtDes=$_POST['txtDes'];

	//image upload ----------
	$image1=$_FILES['Menuimage']['name'];
	$folder='image/';
	
	if($image1)
	{
		$filename=$folder."_".$image1;
		$copied=copy($_FILES['Menuimage']['tmp_name'],$filename);

		if(!$copied)
		{
			exit("Problem occured.Cannot Upload Event Image.");
		}
	}

$select="SELECT * From Menu where MenuName='$txtmenuname'";
$ret=mysqli_query($connection,$select);
$count=mysqli_num_rows($ret);

if($count>0)
{
	$row=mysqli_fetch_array($ret);
	echo "<script>window.alert('Menu cannot Register!')</script>";
		echo "<script>window.location='Menu.php'</script>";
exit();
}
		else{

	$query="INSERT INTO Menu
			(CategoryID,MenuTypeID,MenuName,AdditionalCost,Description,MenuImage) 
			VALUES
			('$cboCategoryID','$cboType','$txtmenuname','$txtaddi','$txtDes','$filename')
			";
	$result=mysqli_query($connection,$query);
}
	if($result) //Check Condition True 
	{
		echo "<script>window.alert('Product Registration Completed.')</script>";
		echo "<script>window.location='Menu.php'</script>";
	}
	else
	{
		echo "<p>Error in Menu Entry : " . mysqli_error($connection) . "</p>";
	}
}

?>

<head>
	<title>Product Entry</title>
</head>
<body>
<form action="Menu.php" method="post" enctype="multipart/form-data">
<fieldset>
	<legend>
		<h3><ins><i>Product Information</i></ins></h3>
	</legend>

<table>
<tr>
	<td>Choose CategoryID:</td>
	<td>
	<select name="cboCategoryID">
		<option>Choose Category ID</option>
		<?php 
		$query="SELECT * FROM Category";
		$ret=mysqli_query($connection,$query);
		$count=mysqli_num_rows($ret);

		for ($i=0; $i <$count ; $i++) 
		{ 
			$row=mysqli_fetch_array($ret);
			$CategoryID=$row['CategoryID'];
			$CategoryName=$row['CategoryName'];

			echo "<option value='$CategoryID'> $CategoryName </option>";
		}

		 ?>
	</select>
	</td>
</tr>

<tr>
	<td>Choose MenuTypeID:</td>
	<td>
	<select name="cboType" class="form-control">
		<option>Choose MenuType ID</option>
		<?php 
		$query="SELECT * FROM MenuType";
		$ret=mysqli_query($connection,$query);
		$count=mysqli_num_rows($ret);

		for ($i=0; $i <$count ; $i++) 
		{ 
			$row=mysqli_fetch_array($ret);
			$Type_ID=$row['MenuTypeID'];
			$TypeName=$row['MenuTypeName'];

			echo "<option value='$Type_ID'>$TypeName </option>";
		}

		 ?>
	</select>
	</td>
</tr>

<tr>
	<td>Menu Name:</td>
	<td>
	<input type="text" name="txtmenuname" class="form-control" placeholder="Pls Enter Product Name" required />
	</td>
</tr>

<tr>
	<td>Additional Cost:</td>
	<td>
	<input type="number" name="txtaddi" class="form-control" placeholder="Pls Enter Amount" min="0"/>
	</td>
</tr>

<tr>
	<td>Menu Description:</td>
	<td>
	<textarea name="txtDes" class="form-control" required /></textarea>
	</td>
</tr>

<tr>
	<td>Menu Image:</td>
	<td>
	<input type="file" name="Menuimage" placeholder="Choose File" required />
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