<?php 
include('connection.php');
include('HeaderSearch.php');

if (isset($_POST['btnSave']))
{
	$txtcategoryname= $_POST['txtcategoryname'];
	$rdostatus=$_POST['rdostatus'];

	$Insert="INSERT INTO category
		(CategoryName,Status) VALUES
		('$txtcategoryname','$rdostatus') ";
	$ret=mysqli_query($connection,$Insert);

		if($ret) 
		{
			echo "<script>window.alert('SUCCESS : Menutype Category inserted.')</script>";
			echo "<script>window.location='Category.php'</script>";
		}
		else
		{
			echo "<p>Error : Something went wrong in Menutype Entry" . mysqli_error($connection) . "</p>";
		}
}

 ?>

<head>
	<title>Menu Category Entry</title>
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
	<form action="Category.php" method="POST" />
	<fieldset>
	<legend>
		<h3><ins><i>Enter Menu Type Category Information</i></ins></h3>
	</legend>

		<table>
			<tr>
				<td>CategoryName</td>
				<td>
					<input type="text" name="txtcategoryname" required />
				</td>
			</tr>

  			<tr>
				<td>Status</td>
				<td>	
					<input type="radio" name="rdostatus" value="active" checked/>Active
					<input type="radio" name="rdostatus" value="inactive"/>Inactive
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
	<br><br><br><br>

	<fieldset>
		<legend>
			<h3><ins><i>Category Listing</i></ins></h3>
		</legend>
			
			<?php 
	
			$CategoryList="SELECT * FROM category";
			$Category_ret=mysqli_query($connection,$CategoryList);
			$Category_Count=mysqli_num_rows($Category_ret);

			if($Category_Count<1)
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
			 		<th>Category ID</th>
			 		<th>Type</th>
			 		<th>Status</th>
			 		<th>Action</th>
			 	</tr>
			 </thead>
			 	<?php 

			 	for($i=0;$i<$Category_Count;$i++)
			 	{
			 		$arr=mysqli_fetch_array($Category_ret);
			 		$CategoryID=$arr['CategoryID'];
			 		echo "<tr>";
			 		echo "<td>" . ($i+1) . "</td>";
			 		echo "<td>$CategoryID</td>";

			 		echo "<td>" . $arr['CategoryName'] . "</td>";
			 		
			 		echo "<td>" . $arr['Status'] . "</td>";
			 		
			 		echo "<td>
			 				<a href='CategoryUpdate.php?CategoryID=$CategoryID'> Update</a> |
			 				<a href='Category_Delete.php?CategoryID=$CategoryID'>Delete</a>
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