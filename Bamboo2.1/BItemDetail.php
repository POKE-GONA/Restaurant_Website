<?php 
session_start();
include('connection.php');
include('HeaderDetail.php');
if(isset($_GET['menuitem'])) 
{
	$menuitem=$_GET['menuitem'];
	$select="SELECT * FROM MenuType mt, MenuItem mi
			WHERE mt.MenuTypeID=mi.MenuTypeID
			AND   mt.MenuTypeID='$menuitem'";
	$query=mysqli_query($connection,$select);
	$count=mysqli_num_rows($query);

	if($count) 
	 {
	 	 $arr=mysqli_fetch_array($query);
	 	 $MenuTypeName=$arr['MenuTypeName'];
	 	 $meat=$arr['Meat'];
	 	 $Vegetables=$arr['Vegetables'];
	 	 $Seafood=$arr['Seafood'];
	 	 $Seafood2=$arr['Seafood2'];
	 	 $add=$arr['Additionalfood'];
	 	 $Description=$arr['Descriptions'];	
	 }
}
?>

<hr/>
<head>
	<title>BItem Detail</title>
</head>
<body>
		<form align="center" action="BookingList.php" method="GET">
			<input type="hidden" name="action" value="book"/>
			<input type="hidden" name="MenuTypeID" value="<?php echo $menuitem ?>"/>
			<tr>
				<td>
				<table align="center" width="600px" height="400px" border="2px">
						
						<tr>
							<td align="center" width="300px">MenuTypeName:</td>
							<td align="center">
								<b><?php echo $MenuTypeName?></b>
							</td>
						</tr>

						<tr>
							<td align="center">Meat:</td>
							<td align="center">
								<b><?php echo $meat?></b>
							</td>
						</tr>

						<tr>
							<td align="center">Vegetables:</td>
							<td align="center">
								<b><?php echo $Vegetables?></b>
							</td>
						</tr>

						<tr>
							<td align="center">Seafood:</td>
							<td align="center">
								<b><?php echo $Seafood?></b>
							</td>
						</tr>

						<tr>
							<td align="center">Seafood2:</td>
							<td align="center">
								<b><?php echo $Seafood2?></b>
							</td>
						</tr>
						
						<tr>
							<td align="center">AdditionalFood:</td>
							<td align="center">
								<b><?php echo $add?></b>
							</td>
						</tr>

						<tr>	
							<td align="center">Descriptions:</td>
							<td align="center" width="500px"><?php echo $Description;?></td>
						</tr>

						<tr>
							<td align="center">Booking Set</td>
							<td align="center">
							<input type="number" name="txtBookingquantity" min="1">
							</td>
						</tr>

						<tr>
							<td></td>
							<td align="center">	
							<input type="submit" name="btnadd" value="Add to Booking"/></td>
						</tr>
				</table>
				</tr>
				</td>
</form>
</body>
<hr/>
<?php include('FooterDetail.php'); ?>