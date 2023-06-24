<?php  
session_start();  
include('connection.php');
include('HeaderDetail.php');
include('AutoID_Functions.php');
include('BookingFunction.php');

if(!isset($_SESSION['CustomerID']))
{
	echo "<script>window.alert('Please login first to continue.')</script>";
	echo "<script>window.location='Customer_Login.php'</script>";
	exit();
}
else
{
	$CustomerID=$_SESSION['CustomerID'];
	$query="SELECT * FROM customer WHERE CustomerID='$CustomerID'";
	$ret=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($ret);
}

if(isset($_POST['btnConfirm'])) 
{	
	$txtBookingID=$_POST['txtBookingID'];
	$CustomerID=$_SESSION['CustomerID'];
	$txtBookingDate=$_POST['txtBookingDate'];
	$Status="Pending";
	$txtTotalQuantity=$_POST['txtTotalQuantity'];
	$txtTotalAmount=$_POST['txtTotalAmount'];
	$rdoPaymentType=$_POST['rdoPaymentType'];
	$txtCardNo=$_POST['txtCardNo'];

	$Orderquery="INSERT INTO `Booking`
				(`BookingID`,`CustomerID`,`BookingDate`,`Status`,`BuyQuantity`,`TotalAmount`,`PaymentType`,`CardNo`) 
				VALUES 
				('$txtBookingID','$CustomerID','$txtBookingDate','$Status','$txtTotalQuantity','$txtTotalAmount','$rdoPaymentType','$txtCardNo')";
	$result=mysqli_query($connection,$Orderquery);

	$size=count($_SESSION['ShoppingCart_Functions']);	

	for($i=0;$i<$size;$i++)
	{
		$MenuTypeID=$_SESSION['ShoppingCart_Functions'][$i]['MenuTypeID'];
		$BuyQty=$_SESSION['ShoppingCart_Functions'][$i]['BuyQty'];
		$Price=$_SESSION['ShoppingCart_Functions'][$i]['Price'];

		$ODquery="INSERT INTO `bookingdetail`
				  (`BookingID`, `MenuTypeID`, `Price`, `Quantity`) 
				  VALUES
				  ('$txtBookingID','$MenuTypeID','$Price','$BuyQty')
				  ";
		$result=mysqli_query($connection,$ODquery);

		$update="Update MenuType
		         set Quantity=Quantity-'$txtTotalQuantity'
		         Where MenuTypeID='$MenuTypeID'";
		         $updateret=mysqli_query($connection,$update);        
	}

	if($result) 
	{
		unset($_SESSION['ShoppingCart_Functions']);
		echo "<script>window.alert('Checkout Process Completed.')</script>";
		//echo "<script>window.location='Customer_Home.php'</script>";
	}
	else
	{
		echo "<p>Something wrong in Checkout :" . mysqli_error($connection) . "</p>";
	}
}
?>

<head>
	<title>Secure Checkout</title>
<script type="text/javascript">
function ShowPayment()
{
	document.getElementById('PaymentArea').style.display="block";
}
function HidePayment()
{
	document.getElementById('PaymentArea').style.display="none";
}
</script>

</head>
<body>
<form action="MakeBooking.php" method="POST">

<fieldset>
	<hr/>
<h3 align="center"><ins><i>(1) Your Personal Information</i></ins></h3><br>

<table align="center">
		<tr>
			<td>Customer Name</td>
			<td>: 
			<?php echo $row['CustomerName'] ?>
			</td>
		</tr>

		<tr>
			<td>Phone Number</td>
			<td>: 
			<?php echo $row['Phone']?>
			</td>
		</tr>

		<tr>
			<td>Email</td>
			<td>: 
			<?php echo $row['Email']?>
			</td>
		</tr>

		<tr>
			<td>Address</td>
			<td>: 
			<?php echo $row['Address']?>
			</td>
		</tr>

</table>
</fieldset> 
<hr/>

<fieldset>
<h3 align="center"><ins><i>(2) Checkout Details</i></ins></h3><br>

<table align="center">
		<tr>
			<td>Booking No</td>
			<td>: 
			<input type="text" name="txtBookingID" value="<?php echo AutoID('booking','BookingID','B-',6) ?>" readonly/>
			</td>
		</tr>

		<tr>
			<td>Booking Date</td>
			<td>: 
			<input type="text" name="txtBookingDate" value="<?php echo date('Y-m-d') ?>" readonly/>
			</td>
		</tr>

		<tr>
			<td>TotalQuantity</td>
			<td> :
			<input type="number" name="txtTotalQuantity" value="<?php echo CalculateTotalQuantity() ?>" readonly/> pcs
			</td>
		</tr>

		<tr>
			<td>TotalAmount</td>
			<td> :
			<input type="number" name="txtTotalAmount" value="<?php echo CalculateTotalAmount() ?>" readonly/> MMK
			</td>
		</tr>

		<tr>
			<td>PaymentType</td>
			<tr>
					<td colspan="4">
					<hr/>
					Choose Payment Type:

					<input type="radio" name="rdoPaymentType" value="Cash Payment" checked onclick="HidePayment()"/>
					<img src="image/COD.png" width="50px" height="50px"/>

					<input type="radio" name="rdoPaymentType" value="VISA" onclick="ShowPayment()" />
					<img src="image/VISA.png" width="50px" height="35px"/>

					<input type="radio" name="rdoPaymentType" value="MPU" onclick="ShowPayment()"/>
					<img src="image/MPU.png" width="50px" height="25px"/>

					<input type="radio" name="rdoPaymentType" value="KBZPAY" onclick="ShowPayment()"/>
					<img src="image/KBZPAY.png" width="50px" height="50px"/>
					<hr/>
					</td>
			</tr>
			<tr>
					<td colspan="4">

					<div id="PaymentArea" class="PaymentArea" style="background-color: #CCC;display: none;">

					Card No : <input type="text" name="txtCardNo" placeholder="---- ---- ---- ----"/>
					Expires : 
					<select name="cboMonth">
						<option>Month</option>
						<option>December</option>
					</select>
					<select name="cboYear">
						<option>Year</option>
						<option>2020</option>
					</select>
					</div>
					
					</td>
			</tr>
			</tr>

</table>

</fieldset>
		<tr>
			<td>
			
			<h4 align="center"><input type="submit" name="btnConfirm" value="Confirm Booking"/>
			<a href="BookingDisplay.php">Continue Booking</a></h4>
			<hr/>
			</td>
		</tr>
</table>
</fieldset>

<fieldset>
<h3 align="center"><ins><i>(3) Booking List Summary</i></ins></h3><br>

<?php  
	if(!isset($_SESSION['ShoppingCart_Functions'])) 
	{
		echo "<p>Empty Cart.</p>";
		echo "<a href='Customer_Login.php'>Back</a>";
	}
	else
	{
?>

<table align="center" border="1">
<tr>
	<th>ProductID</th>
	<th>Description</th>
	<th>Price</th>
	<th>BuyQuantity</th>
	<th>Sub_Total</th>
	<th>Action</th>
</tr>

<?php
$size=count($_SESSION['ShoppingCart_Functions']);

for($i=0;$i<$size;$i++) 
{ 
	
	$MenuTypeID=$_SESSION['ShoppingCart_Functions'][$i]['MenuTypeID'];

	$MenuTypeName=$_SESSION['ShoppingCart_Functions'][$i]['MenuTypeName'];

	$Price=$_SESSION['ShoppingCart_Functions'][$i]['Price'];

	$txtBookingquantity=$_SESSION['ShoppingCart_Functions'][$i]['BuyQty'];

	$SubTotal=$Price * $txtBookingquantity;

	echo "<tr>";
	echo "<td>$MenuTypeID</td>";
	echo "<td>$MenuTypeName</td>";
	echo "<td>$Price MMK</td>";
	echo "<td>$txtBookingquantity pcs</td>";
	echo "<td>$SubTotal MMK</td>";
	echo "<td>
			<a href='BookingList.php?MenuTypeID=$MenuTypeID&action=remove'>Remove</a>
		  </td>";
	echo "</tr>";
}
?>

	<tr>
		<td colspan="7" align="right">
			<hr>
			Total Amount : <b><?php echo CalculateTotalAmount() ?></b> MMK <br/>
			
			Total Quantity : <b><?php echo CalculateTotalQuantity() ?> pcs</b>
			<hr>
		</td>
	</tr>
</table>
<hr/>

<?php  
}
?>

</fieldset>
</form>
</body>
<?php include('FooterDetail.php'); ?>