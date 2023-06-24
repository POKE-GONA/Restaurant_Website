<?php 
include('connection.php');
include('HeaderSearch.php');

if (isset($_POST['btnSave']))
{
	$txtmenutypename=$_POST['txtmenutypename'];
	$numPrice=$_POST['numPrice'];
	$Insert="INSERT INTO MenuType
		(MenuTypeName, Price) VALUES
			('$txtmenutypename','$numPrice') ";
		$ret=mysqli_query($connection,$Insert);

		if($ret) //True
		{
			echo "<script>window.alert('SUCCESS : Menutype inserted.')</script>";
			echo "<script>window.location='MenuType.php'</script>";
		}
		else
		{
			echo "<p>Error : Something went wrong in Menutype Entry" . mysqli_error($connection) . "</p>";
		}
}
 ?>

<head>
	<title>MenuType Entry</title>
	<script type="text/javascript" src="js/jquery-3.1.1.slim.min.js"></script>
	<script type="text/javascript" src="DataTables/datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
</head>
<body>
	<script>
	$(document).ready( function () {
		$('#tableid').DataTable();
	} );
</script>
	<form action="MenuType.php" method="POST" />
	<fieldset>
	<legend>
		<h3><ins><i>Enter Menu Type Information</i></ins></h3>
	</legend>

		<table>
			<tr>
			<td>MenuTypeName:</td>
			<td>
				<input type="text" name="txtmenutypename" placeholder="Enter menutype Name " required />
			</td>
			</tr>
		
			<tr>
				<td>Price:</td>
				<td><input type="number" name="numPrice" required /></td>
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
		<br>
		<br>
		<br>

		<fieldset>
			<legend>
				<h3><ins><i>Menutype Listing</i></ins></h3>
			</legend>
			
	<?php 
		$MenutypeList="SELECT * FROM MenuType 
			WHERE MenuTypeID=MenuTypeID";
			
			$Menutype_ret=mysqli_query($connection,$MenutypeList);
			$Menutype_Count=mysqli_num_rows($Menutype_ret);

			if($Menutype_Count<1)
			{
				echo "<p> No Menutype Records Found </p>.";
			}
			else
			{

			 ?>
			 <table id="tableid" class="display" border="2">
			 	<thead>	
			 	<tr>
			 		<th>No.</th>
			 		<th>Menu Type ID</th>
			 		<th>Type</th>
			 		<th>Price</th>
			 		<th>Action</th>
			 	</tr>
			 </thead>
			 	<?php 

			 	for($i=0;$i<$Menutype_Count;$i++)
			 	{
			 		$arr=mysqli_fetch_array($Menutype_ret);
			 		$MenuTypeID=$arr['MenuTypeID'];
			 		echo "<tr>";
			 		echo "<td>" . ($i+1) . "</td>";
			 		echo "<td>$MenuTypeID</td>";

			 		echo "<td>" . $arr['MenuTypeName'] . "</td>";
			 		
			 		echo "<td>" . $arr['Price'] . "</td>";
			 		
			 		echo "<td>
			 				<a href='MenuTypeUpdate.php?MenuTypeID=$MenuTypeID'> Update</a> |
			 				<a href='MenuTypeDelete.php?MenuTypeID=$MenuTypeID'>Delete</a>
			 				</td>";

			 		echo "</tr>";
			 	}

			 	 ?>
			 </table>
	<?php 
			}

			  ?>
		</fieldset>
		<hr/>
	</form>

</body>

<?php include('FooterSearch.php'); ?>