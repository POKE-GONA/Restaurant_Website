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

<hr/>
<head>
	<title></title>
</head>
<body>
		<form action="BItemDetail.php" method="GET" enctype="multipart/form-data">
		<input type="hidden" name="menuitem" value="<?php echo $MenuItemID ?>">
			
		<table align="center" width="1000px" height="300px">
			<tr>
				<td width="400px">
					<img src="<?php echo $Image?>" style="border:2px solid #000; margin:20px;" 
					width="400px" height="400px"></td>
				<td>
					<table width="500px" height="300px" border="2px">
						
						<tr>
							<td align="center" width="300px">MenuTypeName:</td>
							<td align="center">
								<b><?php echo $MenuTypeName?></b>
							</td>
						</tr>

						<tr>
							<td align="center">Brand Price:</td>
							<td align="center">
								<b><?php echo $Price?></b>
							</td>
						</tr>

						<tr>
							<td align="center">MenuItem:</td>
							<td align="center">
								<b><?php echo $MenuItemID?></b>
							</td>
						</tr>

						<tr>
							<td align="center">Brand Name:</td>
							<td align="center">
								<b><?php echo $CategoryName?></b>
							</td>
						</tr>

						<tr>
							<td align="center">Brand Action:</td>
							<td align="center">
								<b><?php echo $Status?></b>
							</td>
						</tr>

						<tr>	
							<td align="center">Description:</td>
							<td align="center" width="500px"><?php echo $Description;?></td>
						</tr>

						<tr>
							<td></td>
							<td align="center">	
								<button><a href="BookingDisplay.php">Back to Display</a></button>
								<input type="submit" name="btnchooseitem" value="Choose Item">
							</td>	
						</tr>

					</table>
				</td>
			</tr>
			
</table>
</form>
</body>
<hr/>

<?php include('FooterDetail.php'); ?>