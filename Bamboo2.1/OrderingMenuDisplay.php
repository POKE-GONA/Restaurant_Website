<?php 
//session_start();
	include('connection.php');
	include('HeaderDetail.php');
	
	if (isset($_REQUEST['MID'])) 
	{
		$MenuTypeID=$_REQUEST['MID'];
		$menu="SELECT * FROM Menu m,MenuType mt, Category c, MenuItem i
		WHERE m.MenuTypeID=mt.MenuTypeID
		AND m.MenuTypeID=i.MenuTypeID
		AND m.CategoryID=c.CategoryID
		AND mt.MenuTypeID='$MenuTypeID'";
			  
		$result=mysqli_query($connection,$menu);
		$count=mysqli_num_rows($result);

	 if ($count) 
	 {
	 	 $arr=mysqli_fetch_array($result);
	 	 $MenuTypeName=$arr['MenuTypeName'];
	 	 $MenuItemID=$arr['MenuItemID'];
	 	 $Price=$arr['Price'];
	 	 $CategoryName=$arr['CategoryName'];
	 	 $Status=$arr['Status'];
	 	 $Description=$arr['Description'];
	 	 $Image=$arr['MenuImage'];
	}
	else
	{
 			echo "Not Avaliable";
 			exit();
	}
}
?>

<head>
	<title></title>
</head>
<body>
		<form action="OItemDetail.php" method="GET" enctype="multipart/form-data">
		<input type="hidden" name="menuitem" value="<?php echo $MenuItemID ?>">
			
		<table align="center" width="1000px" height="300px">
			<tr>
				<td width="400px">
					<img src="<?php echo $Image?>" style="border:1px solid #000; margin:20px;" 
					width="300px" height="300px"></td>
				<td>
					<table width="500px" height="100px" border="1px">
						
						<tr>
							<td width="300px">MenuTypeName:</td>
							<td>
								<b><?php echo $MenuTypeName?></b>
							</td>
						</tr>

						<tr>
							<td>Brand Name:</td>
							<td>
								<b><?php echo $Price?></b>
							</td>
						</tr>

						<tr>
							<td>MenuItem:</td>
							<td>
								<b><?php echo $MenuItemID?></b>
							</td>
						</tr>

						<tr>
							<td>Brand Name:</td>
							<td>
								<b><?php echo $CategoryName?></b>
							</td>
						</tr>

						<tr>
							<td>Brand Name:</td>
							<td>
								<b><?php echo $Status?></b>
							</td>
						</tr>

						<tr>	
							<td>Description:</td>
							<td width="500px"><?php echo $Description;?></td>
						</tr>

						<tr>
							<td></td>
							<td>	
								<button><a href="OrderingDisplay.php">Back to Display</a></button>
								<input type="submit" name="btnchooseitem" value="Choose Item">
							</td>	
						</tr>

					</table>
				</td>
			</tr>
			
</table>
</form>
</body>

<?php include('FooterDetail.php'); ?>