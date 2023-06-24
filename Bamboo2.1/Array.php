<?php 
include('connection.php');

if (isset($_POST['btnSave']))
{
	
	$txtStatus=$_POST['txtStatus'];
	$chkcategory = $_POST['chkcategory'];
 	 if(empty($chkcategory)) 
  {
    echo("You didn't select any.");
  } 
  else 
  {
    $N = count($chkcategory);

    for($i=0; $i < $N; $i++)
    {
      echo($chkcategory[$i] . " ");

      $Insert="INSERT INTO Category
		(CategoryName, Status) VALUES
			('$chkcategory[$i]','$txtStatus') ";
		$ret=mysqli_query($connection,$Insert);

    }

}
 //  }

	// $Insert="INSERT INTO Category
	// 	(CategoryName, Status) VALUES
	// 		('$chkcategory','$txtStatus') ";
	// 	$ret=mysqli_query($connection,$Insert);

		if($ret) //True
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

 <!DOCTYPE html>
<html>
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
	
	<legend>Enter Menu Type Category Information:</legend>
		<table>
			<tr>CategoryName</tr>
		<input type="checkbox" name="chkcategory[]" value="Pork">Pork

  		<input type="checkbox" name="chkcategory[]" value="Chicken">Chicken
  		<input type="checkbox" name="chkcategory[]" value="Breef" >Breef
  		<tr>
				<td>Status</td>
				<td>:<input type="text" name="txtStatus" required /></td>
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
			<legend>Category Listing: </legend>
			<?php 
	
		$MenutypeList="SELECT * FROM Category";
			
			
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
			 		<th>ID</th>
			 		<th>Type</th>
			 		<th>Status</th>
			 		<th>Action</th>
			 	</tr>
			 </thead>
			 	<?php 

			 	for($i=0;$i<$Menutype_Count;$i++)
			 	{
			 		$arr=mysqli_fetch_array($Menutype_ret);
			 		$chkcategory=$arr['CategoryNo'];
			 		echo "<tr>";
			 		echo "<td>" . ($i+1) . "</td>";
			 		echo "<td>$chkcategory</td>";

			 		echo "<td>" . $arr['CategoryName'] . "</td>";
			 		
			 		echo "<td>" . $arr['Status'] . "</td>";
			 		
			 		echo "<td>
			 				<a href='MenuTypeUpdate.php?CategoryNo=$chkcategory'> Update</a> |
			 				<a href='MenuTypeDelete.php?CategoryNo=$chkcategory'>Delete</a>
			 				</td>";

			 		echo "</tr>";
			 	}

			 	 ?>
			 </table>
			 <?php 
			}

			  ?>
		</fieldset>
	</form>

</body>
</html>
