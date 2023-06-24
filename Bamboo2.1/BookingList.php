<?php  
session_start();
include('connection.php');
include('HeaderDetail.php');
include('AutoID_Functions.php');
include('BookingFunction.php');

if(isset($_REQUEST['action'])) 
{
	$action=$_REQUEST['action'];

	if($action === "book")
	{
		$MenuTypeID=$_REQUEST['MenuTypeID'];
		$txtBookingquantity=$_REQUEST['txtBookingquantity'];
		AddBooking($MenuTypeID,$txtBookingquantity);
	}
	else if($action === "remove")
	{
		$MenuTypeID=$_REQUEST['MenuTypeID'];
		RemoveShoppingCart($MenuTypeID);
	}
	else
	{
		ClearShoppingCart();
	}
}
	else
	{
	$action="";
	}
?>

<hr/>
<head>
	<title>Booking List</title>
</head>
<body>
<form>

<fieldset>
<h3 align="center"><ins><i>Booking List</i></ins></h3><br>

<?php  
if(!isset($_SESSION['ShoppingCart_Functions'])) 
{
	echo "<p>Customer Shopping Cart is Empty!</p>";
	exit();
}
?>

<table align="center" width="550px" height="400px"  border="1px">
<tr>
	<th>Menu Type ID</th>
	<th>Menu Type Name</th>
	<th>Price <small>(MMK)</small></th>
	<th>BookingQuantity <small>(pcs)</small></th>
	<th>Sub-Total <small>(MMK)</small></th>
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
		echo "<td>$txtBookingquantity</td>";
		echo "<td>$SubTotal</td>";
		echo "<td>
			  <a href='BookingList.php?action=remove&MenuTypeID=$MenuTypeID'>Remove</a>
			  </td>";
		echo "</tr>";
	}
?>

<tr>
	<td colspan="7" align="right">
	<a href="BookingList.php?action=ClearAll">ClearAll</a> |
	<a href="BookingDisplay.php">BookingAgain</a> |
	<a href="MakeBooking.php">Booking</a> 
	</td>
</tr>

</table>
</fieldset>
</form>
</body>
<hr/>
<?php include('FooterDetail.php'); ?>