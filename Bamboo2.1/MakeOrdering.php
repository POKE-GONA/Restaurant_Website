<?php  
session_start();  
include('connection.php');
include('HeaderDetail.php');
include('AutoID_Functions.php');
include('OrderingFunction.php');

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
	$txtOrderingID=$_POST['txtOrderingID'];
	$CustomerID=$_SESSION['CustomerID'];
	$txtOrderingDate=$_POST['txtOrderingDate'];
	$txtAddress=$_POST['txtAddress'];
	$txtPhone=$_POST['txtPhone'];
	$txtDeliveryCost=$_POST['txtDeliveryCost'];
	$txtTotalQuantity=$_POST['txtTotalQuantity'];
	$txtTotalAmount=$_POST['txtTotalAmount'];
	$txtGrandTotal=$_POST['txtGrandTotal'];
	$rdoPaymentType=$_POST['rdoPaymentType'];
	$txtCardNo=$_POST['txtCardNo'];
	$Status="Pending";
	$txtVAT=$_POST['txtVAT'];

	$Orderquery="INSERT INTO `ordering`
				(`OrderingID`,`CustomerID`,`OrderingDate`,`DeliveryAddress`,`DeliveryPhone`,`DeliveryCost`,`BuyQuantity`,`TotalAmount`,`GrandTotal`,`PaymentType`,`CardNo`,`Status`,`VAT`) 
				VALUES 
				('$txtOrderingID','$CustomerID','$txtOrderingDate','$txtAddress','$txtPhone','$txtDeliveryCost','$txtTotalQuantity','$txtTotalAmount','$txtGrandTotal','$rdoPaymentType','$txtCardNo','$Status','$txtVAT')
				";
	$result=mysqli_query($connection,$Orderquery);

	$size=count($_SESSION['ShoppingCart_Functions']);	

	for($i=0;$i<$size;$i++)
	{
		$MenuTypeID=$_SESSION['ShoppingCart_Functions'][$i]['MenuTypeID'];
		$BuyQty=$_SESSION['ShoppingCart_Functions'][$i]['BuyQty'];
		$Price=$_SESSION['ShoppingCart_Functions'][$i]['Price'];

		$ODquery="INSERT INTO `orderingdetail`
				  (`OrderingID`, `MenuTypeID`, `Price`, `OrderingQuantity`) 
				  VALUES
				  ('$txtOrderingID','$MenuTypeID','$Price','$BuyQty')
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

<html>
<head>
	<title>Secure Checkout</title>
	
<script type="text/javascript">
function ShowAddress()
{
	document.getElementById('Other').style.display="block";
}
function HideAddress()
{
	document.getElementById('Other').style.display="none";
}
function ShowPayment()
{
	document.getElementById('PaymentArea').style.display="block";
}
function HidePayment()
{
	document.getElementById('PaymentArea').style.display="none";
}
function GetDeliveryCost()
{
	var e=document.getElementById('cboTownshipID');
	var result=e.options[e.selectedIndex].value;
	document.getElementById('txtDeliveryCost').value=result;

	var TotalAmount=document.getElementById('txtTotalAmount').value;
	var VAT=document.getElementById('txtVAT').value;

	document.getElementById('txtGrandTotal').value=Number(result)+Number(TotalAmount)+Number(VAT);
}
</script>

</head>
<body>
<form action="MakeOrdering.php" method="POST">

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
			<td>Ordering No</td>
			<td>: 
			<input type="text" name="txtOrderingID" value="<?php echo AutoID('ordering','OrderingID','O-',6) ?>" readonly/>
			</td>
		</tr>

		<tr>
			<td>Ordering Date</td>
			<td>: 
			<input type="text" name="txtOrderingDate" value="<?php echo date('Y-m-d') ?>" readonly/>
			</td>
		</tr>

<tr>
	<td colspan="2">
	<hr/>
	<br/> VAT <br/>
	<input type="text" name="txtVAT" id="txtVAT" value="<?php echo CalculateVAT() ?>">

	<br/> Choose Township <br/>
	<select name="cboTownshipID" id="cboTownshipID" onchange="GetDeliveryCost()">
		<option>-Choose Township-</option>
		<?php 
		$T_query="SELECT * FROM township";
		$ret=mysqli_query($connection,$T_query);
		$count=mysqli_num_rows($ret);

		for($i=0;$i<$count;$i++) 
		{ 
			$rows=mysqli_fetch_array($ret);
			$TownshipID=$rows['TownshipID'];
			$TownshipName=$rows['TownshipName'];
			$DeliveryCost=$rows['DeliveryCost'];

			echo "<option value='$DeliveryCost'> $TownshipName - $DeliveryCost MMK </option>";
		}
		?>
	</select>
	<br/> Delivery Cost <br/>
	<input type="text" name="txtDeliveryCost" id="txtDeliveryCost" value="0" readonly /> MMK

	<br/> Total Quantity <br/>
	<input type="number" name="txtTotalQuantity" value="<?php echo CalculateTotalQuantity() ?>" readonly/> pcs

	<br/> Total Amount <br/>
	<input type="number" name="txtTotalAmount" id="txtTotalAmount" value="<?php echo CalculateTotalAmount() ?>" readonly/> MMK

	<br/> Grand Total <br/>
	<input type="text" name="txtGrandTotal" id="txtGrandTotal" value="0" readonly /> MMK

	<hr/>
	<input type="radio" name="rdoAddress" value="SameAddress" onclick="HideAddress()" checked />Same Address	
	<input type="radio" name="rdoAddress" value="OtherAddress" onclick="ShowAddress()" />Other Address	
	
	<div id="Other" style="display: none;">
		<p>Address :</p>
		<textarea name="txtAddress" cols="30"></textarea>
		<p>Phone Number :</p>
		<input type="text" name="txtPhone" placeholder="+95-----------">
		<hr/>
	</div>
<table cellpadding="5px">
	<tr>
		<td>Customer Name</td>
			<td>
				:<?php 
				echo $row['CustomerName']; ?>
			</td>
	</tr>

	<tr>
		<td>Customer Email</td>
			<td>
				:<?php 
				echo $row['Email']; ?>
			</td>
	</tr>

	<tr>
		<td>Customer Phone</td>
			<td>
				:<?php 
				echo $row['Phone']; ?>
			</td>
	</tr>

	<tr>
		<td>Customer Address</td>
			<td>
				:<?php 
				echo $row['Address']; ?>
			</td>
	</tr>
</table>
	</td>
</tr>

		<tr>
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

			<h4 align="center"><input type="submit" name="btnConfirm" value="Confirm Ordering"/> | 
			<a href="OrderingDisplay.php">Continue Ordering</a> | 
			<a href="OrderingFunction.php?action=clearall">Cancel Ordering</a>
			<hr/>
			</td>
		</tr>
</table>
</fieldset>

<fieldset>
<h3 align="center"><ins><i>(3) Ordering Cart Summary</i></ins></h3><br>

<?php  
	if(!isset($_SESSION['ShoppingCart_Functions'])) 
	{
		echo "<p>Empty Cart.</p>";
		echo "<a href='index.php'>Back</a>";
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

	$txtOrderingquantity=$_SESSION['ShoppingCart_Functions'][$i]['BuyQty'];

	$SubTotal=$Price * $txtOrderingquantity;

	echo "<tr>";
	echo "<td>$MenuTypeID</td>";
	echo "<td>$MenuTypeName</td>";
	echo "<td>$Price MMK</td>";
	echo "<td>$txtOrderingquantity pcs</td>";
	echo "<td>$SubTotal MMK</td>";
	echo "<td>
			<a href='OrderingList.php?MenuTypeID=$MenuTypeID&action=remove'>Remove</a>
		  </td>";
	echo "</tr>";
}
?>

	<tr>
		<td colspan="7" align="right">
			<hr>
			Total Quantity : <b><?php echo CalculateTotalQuantity() ?></b> pcs <br/>

			Total Amount : <b><?php echo CalculateTotalAmount() ?></b> MMK <br/>

			Gov Tox (VAT): : <b><?php echo CalculateVAT() ?> MMK</b>
			<hr>
		</td>
	</tr>
</table>


<?php  
}
?>
<hr/>
</fieldset>
</form>
</body>
<?php include('FooterDetail.php'); ?>