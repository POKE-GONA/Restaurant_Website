<?php  
session_start(); 
include('connection.php');
include('HeaderSearch.php');
//include('AutoID.php');

if(isset($_POST['btnConfirm'])) 
{
	$txtBooking_ID=$_POST['txtBooking_ID'];

	$query=mysqli_query($connection,"SELECT * FROM bookingdetail WHERE BookingID='$txtBooking_ID'");

	while($row=mysqli_fetch_array($query)) 
	{
		$MenuTypeID=$row['MenuTypeID'];
		$Quantity=$row['Quantity'];

		$Update="UPDATE menutype
				 SET Quantity=Quantity - '$Quantity'
				 WHERE MenuTypeID='$MenuTypeID'
				 ";
		$ret=mysqli_query($connection,$Update);
		if(!$ret) 
		{
echo "<script>window.alert('Booking are successfully Confirmed')</script>";
		echo "<script>window.location='BookingReportList.php'</script>";		}
	}

	$UpdateStatus="UPDATE booking
			 	   SET Status='Bconfirmed'
			 	   WHERE bookingID='$txtBooking_ID'
			 	   ";
	$ret=mysqli_query($connection,$UpdateStatus);

	if($ret) 
	{
		echo "<script>window.alert('Booking are successfully Confirmed')</script>";
		echo "<script>window.location='BookingReportList.php'</script>";
	}
	else
	{
		echo "<p>Something wrong in Booking :" . mysqli_error($connection) . "</p>";
	}
}

if(isset($_GET['BookingID'])) 
{
	$Booking_ID=$_GET['BookingID'];

	$query1="SELECT b.*, c.CustomerID,c.CustomerName
			FROM booking b, customer c
			WHERE b.BookingID='$Booking_ID'
			AND c.CustomerID=b.CustomerID
			";
	$result1=mysqli_query($connection,$query1);
	$row=mysqli_fetch_array($result1);

	$query2="SELECT b.*, bd.*, mt.MenuTypeID,mt.MenuTypeName,mt.Price 
			FROM booking b, bookingdetail bd, menutype mt
			WHERE b.BookingID='$Booking_ID'
			AND b.BookingID=bd.BookingID
			AND bd.MenuTypeID=mt.MenuTypeID
			";
	$result2=mysqli_query($connection,$query2);
	$count=mysqli_num_rows($result2);
}
else
{
	$Booking_ID="";
	echo "<script>window.alert('Error 404, No Booking Found.')</script>";
	//echo "<script>window.location='Order_List.php'</script>";
}

?>
<html>
<head>
	<title>Booking Details</title>
</head>
<body>
<form action="BookingDetail.php" method="post">
<fieldset>
<h3><ins><i>Booking Report for : <?php echo $row['BookingID'] ?></i></ins></h3><br>

<table align="center">
<tr>
	<td>
		<table width="1100px" height="300px" align="center" border="1" width="100%">
		<tr>
			<td>
				Booking_ID:
				<b><?php echo $row['BookingID'] ?></b>
			</td>
			<td>
				ReportDate:
				<b><?php echo date('Y-m-d') ?></b>
			</td>
		</tr>
		<tr>
			<td>
				CustomerName:
				<b><?php echo $row['CustomerName'] ?></b>
			</td>
			<td>
				BookingDate:
				<b><?php echo $row['BookingDate'] ?></b>
			</td>
		</tr>
		<tr>
			<td>
				Status:
				<b><?php echo $row['Status'] ?></b>
			</td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td>
		<table width="1100px" height="300px" border="1" width="100%">
		<tr>
			<th>BookingName</th>
			<th>B_Price (MMK)</th>
			<th>B-Quantity (pcs)</th>
			<th>Sub-Total (MMK)</th>
		</tr>
		<?php  
		for ($i=0; $i < $count; $i++) 
		{ 
			$row2=mysqli_fetch_array($result2);

			echo "<tr>";
			echo "<td>" . $row2['MenuTypeName'] . "</td>";
			echo "<td>" . $row2['Price'] . "</td>";
			echo "<td>" . $row2['BuyQuantity'] . " </td>";
			echo "<td>" . $row2['Price'] * $row2['BuyQuantity']  . "</td>";
			echo "</tr>";
		}
		?>
		</table>
	</td>
</tr>
<tr>
	<td align="right">
	<hr>
	TotalAmount : <b><?php echo $row['TotalAmount'] ?></b> MMK <br/>

	<hr>
	<input type="hidden" name="txtBooking_ID" value="<?php echo $row['BookingID'] ?>"/>
	<?php 
	if($row['Status']==="Pending")
	{
		echo "<input type='submit' name='btnConfirm' value='Bconfirm'/>";
	}
	else
	{
		echo "<input type='submit' name='btnConfirm' value='Bconfirm' disabled/>";
	}
	?>
	</td>
</tr>
</table>	



</fieldset>

</form>
</body>
</html>

<script>var pfHeaderImgUrl = '';var pfHeaderTagline = 'Order%20Report';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script>
    <a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onClick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-grnw20.png" alt="Print Friendly and PDF"/></a>

<?php include('FooterSearch.php'); ?>