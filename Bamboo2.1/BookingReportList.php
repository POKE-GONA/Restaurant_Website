<?php  
session_start(); 
include('connection.php');
include('HeaderSearch.php');
//include('AutoID.php');

if(isset($_POST['btnSearch'])) 
{
	$rdoSearchType=$_POST['rdoSearchType'];

	if($rdoSearchType == 1) 
	{
		$lstMenuTypeID=$_POST['lstMenuTypeID'];

		$query="SELECT b.*, c.CustomerID,c.CustomerName 
				FROM booking b, customer c
				WHERE b.BookingID='$lstMenuTypeID'
				AND b.CustomerID=c.CustomerID
				";

		$result=mysqli_query($connection,$query);
		$count=mysqli_num_rows($result);
	}
	elseif($rdoSearchType == 2) 
	{
		$txtFrom=date('Y-m-d',strtotime($_POST['txtFrom']));
		$txtTo=date('Y-m-d',strtotime($_POST['txtTo']));

		$query="SELECT b.*, c.CustomerID,c.CustomerName 
				FROM booking b, customer c, bookingdetail bd
				WHERE b.BookingDate BETWEEN '$txtFrom' AND '$txtTo'
				AND b.BookingID=bd.BookingID
				";
		$result=mysqli_query($connection,$query);
		$count=mysqli_num_rows($result);
	}
	else
	{
		$cboStatus=$_POST['cboStatus'];

		$query="SELECT b.*, c.CustomerID,c.CustomerName 
				FROM booking b, customer c
				WHERE b.Status='$cboStatus'
				AND b.CustomerID=c.CustomerID
				";
		$result=mysqli_query($connection,$query);
		$count=mysqli_num_rows($result);
	}

}		
elseif(isset($_POST['btnShowAll'])) 
{
	$query="SELECT b.*, c.CustomerID,c.CustomerName 
			FROM booking b, customer c, bookingdetail bd
			WHERE c.CustomerID=b.CustomerID
			";
	$result=mysqli_query($connection,$query);
	$count=mysqli_num_rows($result);

}
else
{
	$TodayDate=date('Y-m-d');

	$query="SELECT b.*, c.CustomerID,c.CustomerName 
			FROM booking b, customer c
			WHERE b.BookingDate='$TodayDate'
			AND c.CustomerID=b.CustomerID
			";
	$result=mysqli_query($connection,$query);
	$count=mysqli_num_rows($result);
	
}

?>

<head>
	<title>Order List</title>
	<script type="text/javascript" src="DatePicker/datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="DatePicker/datepicker.css"/>
</head>
<body>
<form action="BookingReportList.php" method="post">
<fieldset>
<h3><ins><i>Search Option</i></ins></h3><br>

<table cellpadding="5px">
<tr>
	<td>
	<input type="radio" name="rdoSearchType" value="1" checked/>Search By BookingID---
	<!-- <br/> -->
	<input list="lstMenuTypeID" name="lstMenuTypeID">
		<datalist id="lstMenuTypeID">
		<?php  
		$POquery="SELECT * FROM booking";
		$ret=mysqli_query($connection,$POquery);
		$POcount=mysqli_num_rows($ret);

		for($z=0;$z<$POcount;$z++) 
		{ 
			$POrow=mysqli_fetch_array($ret);
			$Booking_ID=$POrow['BookingID'];
			echo "<option value='$Booking_ID'>";
		}
		?>
		</datalist>
	</td>
</tr>

<tr>
	<td>
		<br>
		<input type="radio" name="rdoSearchType" value="2"/>Search By Date---
		From:<input type="text" name="txtFrom" value="<?php echo date('Y-m-d') ?>" maxlength="5" size="20" OnClick="showCalender(calender,this)" readonly/>
		To:<input type="text" name="txtTo" value="<?php echo date('Y-m-d') ?>" maxlength="5" size="20" OnClick="showCalender(calender,this)" readonly/>
	</td>
</tr>

<tr>
	<td>
		<br>
		<input type="radio" name="rdoSearchType" value="3"/>Search By Status---------   
	
		<select name="cboStatus">
			<option>Pending</option>
			<option>Confirmed</option>
		</select>
	</td>
</tr>
	
	<td>
		<br>
		<input type="submit" name="btnSearch" value="Search"/>
		<input type="submit" name="btnShowAll" value="Show All"/>
		<input type="reset" value="clear" />
	</td>
</tr>
</table>
</fieldset>
<hr/>

<fieldset>
<h3><ins><i>Search Results</i></ins></h3><br>

<?php  
if($count<1) 
{
	echo "<p>No Booking Found.</p>";
}
else
{
?>
	<table width="1150px" height="350px" border="1" cellpadding="5px">
	<tr>
		<th>Booking_ID</th>
		<th>Date</th>
		<th>CustomerName</th>
		<th>BookingQuantity</th>
		<th>TotalAmount</th>
		<th>Status</th>
		<th>~</th>
	</tr>
	<?php 
	for ($i=0;$i<$count;$i++) 
	{ 
		$row=mysqli_fetch_array($result);
		$Booking_ID=$row['BookingID'];

		echo "<tr>";
		echo "<td>$Booking_ID</td>";
		echo "<td>" . $row['BookingDate'] . "</td>";
		echo "<td>" . $row['CustomerName'] . "</td>";
		echo "<td>" . $row['BuyQuantity'] . "</td>";
		echo "<td>" . $row['TotalAmount'] . "</td>";
		echo "<td>" . $row['Status'] . "</td>";
		echo "<td><a href='BookingDetail.php?BookingID=$Booking_ID'>Details</a></td>";
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

<?php include('FooterSearch.php'); ?>