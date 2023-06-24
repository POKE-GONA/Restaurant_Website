<?php  
session_start(); //Session Declare
include('connection.php');
include('HeaderSearch.php');
include('OrderingFunction.php');
include('AutoID_Functions.php');

if(isset($_POST['btnConfirm'])) 
{
	$txtOrderingID=$_POST['txtOrderingID'];

	$query=mysqli_query($connection,"SELECT * FROM orderingdetail WHERE OrderingID='$txtOrderingID'");

	while($row=mysqli_fetch_array($query)) 
	{
		$MenuTypeID=$row['MenuTypeID'];
		$OrderingQuantity=$row['OrderingQuantity'];

		$Update="UPDATE menutype
				 SET Quantity=Quantity - '$OrderingQuantity'
				 WHERE MenuTypeID='$MenuTypeID'
				 ";
		$ret=mysqli_query($connection,$Update);
		if(!$ret) 
		{
echo "<script>window.alert('Ordering are successfully Confirmed')</script>";
		echo "<script>window.location='OrderingReportList.php'</script>";		}
	}

	$UpdateStatus="UPDATE ordering
			 	   SET Status='Oconfirmed'
			 	   WHERE OrderingID='$txtOrderingID'
			 	   ";
	$ret=mysqli_query($connection,$UpdateStatus);

	if($ret) 
	{
		echo "<script>window.alert('Ordering are successfully Confirmed')</script>";
		echo "<script>window.location='OrderingReportList.php'</script>";
	}
	else
	{
		echo "<p>Something wrong in Ordering :" . mysqli_error($connection) . "</p>";
	}
}

$OrderingID=$_GET['OrderingID'];

if(isset($_SESSION['CustomerID'])) 
{
	$CustomerID=$_SESSION['CustomerID'];

	//Single Group------------------------------------------------------------
	$query1="SELECT ord.*, c.CustomerID,c.CustomerName
			FROM ordering ord,customer c
			WHERE ord.CustomerID='$CustomerID'
			AND ord.CustomerID=c.CustomerID
			AND ord.OrderingID='$OrderingID'
			";
	$result1=mysqli_query($connection,$query1);
	$row1=mysqli_fetch_array($result1);

	//Repeat Group------------------------------------------------------------
	$query2="SELECT ord.*, ordd.*, mt.MenuTypeID,mt.MenuTypeName
			FROM ordering ord,orderingdetail ordd,menutype mt
			WHERE ord.OrderingID=ordd.OrderingID
			AND ordd.MenuTypeID=mt.MenuTypeID
			AND ordd.OrderingID='$OrderingID'
			";
	$result2=mysqli_query($connection,$query2);
	$count=mysqli_num_rows($result2);		
}
elseif(isset($_SESSION['StaffID'])) 
{
	//Single Group------------------------------------------------------------
	$query1="SELECT ord.*, c.CustomerID,c.CustomerName
			FROM ordering ord,customer c
			WHERE ord.CustomerID=c.CustomerID
			AND ord.OrderingID='$OrderingID'
			";
	$result1=mysqli_query($connection,$query1);
	$row1=mysqli_fetch_array($result1);

	//Repeat Group------------------------------------------------------------
	$query2="SELECT ord.*, ordd.*, mt.MenuTypeID,mt.MenuTypeName
			FROM orders ord,orderdetails ordd,menutype mt
			WHERE ord.OrderingID=ordd.OrderingID
			AND ordd.MenuTypeID=mt.MenuTypeID
			AND ordd.OrderingID='$OrderingID'
			";
	$result2=mysqli_query($connection,$query2);
	$count=mysqli_num_rows($result2);	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Order Details :</title>
</head>
<body>
<form action="OrderingDetail.php" method="post">
<fieldset>
	<h3 align="Center"><ins><i>Ordering Details for : <?php echo $OrderingID ?></i></ins></h3><br>

<table align="center" border="1" cellpadding="5px" cellspacing="5px">
<tr>
	<td>OrderID</td>
	<td>
		: <b><?php echo $row1['OrderingID']  ?></b>
	</td>
	<td>Status</td>
	<td>
		: <b><?php echo $row1['Status']  ?></b>
	</td>
</tr>
<tr>
	<td>Order Date</td>
	<td>
		: <b><?php echo $row1['OrderingDate']  ?></b>
	</td>
	<td>Report Date</td>
	<td>
		: <b><?php echo date('Y-m-d')  ?></b>
	</td>
</tr>
<tr>
	<td>Customer Name</td>
	<td>
		: <b><?php echo $row1['CustomerName']  ?></b>
	</td>
	<td>Deliver Address</td>
	<td>
		: <b><?php echo $row1['DeliveryAddress'] . ' | ' . $row1['DeliveryPhone']  ?></b>
	</td>
</tr>
<tr>
	<td colspan="4">
	<table border="1" width="100%">
	<tr>
		<th>#</th>
		<th>O-MenuTypeID</th>
		<th>O-MenuTypeName</th>
		<th>O-Price</th>
		<th>O-Quantity</th>
		<th>Sub-Total</th>
	</tr>
	<?php  
	for($i=0;$i<$count;$i++) 
	{ 
		$row2=mysqli_fetch_array($result2);

		echo "<tr>";	
		echo "<td>" . ($i+1) . "</td>";
		echo "<td>" . $row2['MenuTypeID'] . "</td>";
		echo "<td>" . $row2['MenuTypeName'] . "</td>";
		echo "<td>" . $row2['Price'] . "</td>";
		echo "<td>" . $row2['BuyQuantity'] . "</td>";
		echo "<td>" . $row2['Price'] * $row2['BuyQuantity'] . "</td>";
		echo "</tr>";	
	}
	?>
	</table>
	</td>
</tr>
<tr>
	<td colspan="4" align="right">

	<p>TotalQuantity : <b><?php echo $row1['BuyQuantity'] ?></b> pcs</p>
	<p>TotalAmount : <b><?php echo $row1['TotalAmount'] ?></b> MMK</p>
	<p>VAT(5%) : <b><?php echo $row1['VAT'] ?></b> MMK</p>
	<p>GrandTotal : <b><?php echo $row1['GrandTotal'] ?></b> MMK</p>

	<input type="hidden" name="txtOrderingID" value="<?php echo $OrderingID ?>"/>
	</td>
</tr>
<tr>
	<td colspan="4" align="right">
	<!---Print--->
	<script>var pfHeaderImgUrl = '';var pfHeaderTagline = 'Order%20Report';var pfdisableClickToDel = 0;var pfHideImages = 0;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if('https:' == document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script>
	<a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onClick="window.print();return false;" title="Printer Friendly and PDF"><img style="border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-grnw20.png" alt="Print Friendly and PDF"/></a>
	<!---Print--->
			<?php 
			if($row1['Status']==="Pending")
			{
				echo "<input type='submit' name='btnConfirm' value='Oconfirm'/>";
			}
			else
			{
				echo "<input type='submit' name='btnConfirm' value='Oconfirm' disabled/>";
			}
			?>
	</td>	
</tr>
</table>

</fieldset>	

</form>
</body>

<?php include('FooterSearch.php'); ?>