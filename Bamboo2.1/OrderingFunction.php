<?php  

function AddOrdering($MenuTypeID,$txtOrderingquantity)
{
	include('connection.php');
	$query="SELECT * FROM MenuType WHERE MenuTypeID	='$MenuTypeID'";
	$result=mysqli_query($connection,$query);
	$count=mysqli_num_rows($result);

	if($count < 1) 
	{
		echo "<p>MenuType ID not found.</p>";
		exit();
	}
	$row=mysqli_fetch_array($result);
	$MenuTypeName=$row['MenuTypeName'];
	$Price=$row['Price'];

	if($txtOrderingquantity < 1) 
	{
		echo "<script>window.alert('Purchase Quantity Cannot be Zero (0)')</script>";
		echo "<script>window.location='OrderingList.php'</script>";
		exit();
	}

	if(isset($_SESSION['ShoppingCart_Functions'])) 
	{
		$Index=IndexOf($MenuTypeID);
		
		if($Index == -1) 
		{
			$size=count($_SESSION['ShoppingCart_Functions']);

			$_SESSION['ShoppingCart_Functions'][$size]['MenuTypeID']=$MenuTypeID;
			$_SESSION['ShoppingCart_Functions'][$size]['MenuTypeName']=$MenuTypeName;
			$_SESSION['ShoppingCart_Functions'][$size]['Price']=$Price;
			$_SESSION['ShoppingCart_Functions'][$size]['BuyQty']=$txtOrderingquantity;
			
		}
		else
		{
			$_SESSION['ShoppingCart_Functions'][$Index]['BuyQty']+=$txtOrderingquantity;
		}
	}
	else
	{
		$_SESSION['ShoppingCart_Functions']=array(); //Create Session Array

		$_SESSION['ShoppingCart_Functions'][0]['MenuTypeID']=$MenuTypeID;
		$_SESSION['ShoppingCart_Functions'][0]['MenuTypeName']=$MenuTypeName;
		$_SESSION['ShoppingCart_Functions'][0]['Price']=$Price;
		$_SESSION['ShoppingCart_Functions'][0]['BuyQty']=$txtOrderingquantity;
	}
	echo "<script>window.location='OrderingList.php'</script>";
}

function RemoveShoppingCart($MenuTypeID)
{
	$Index=IndexOf($MenuTypeID);
	unset($_SESSION['ShoppingCart_Functions'][$Index]);
	$_SESSION['ShoppingCart_Functions']=array_values($_SESSION['ShoppingCart_Functions']);

	echo "<script>window.location='OrderingList.php'</script>";
}

function ClearShoppingCart()
{	
	unset($_SESSION['ShoppingCart_Functions']);
	echo "<script>window.location='OrderingList.php'</script>";
}

function CalculateTotalAmount()
{
	$TotalAmount=0;

	$size=count($_SESSION['ShoppingCart_Functions']);

	for($i=0;$i<$size;$i++) 
	{ 
		$Price=$_SESSION['ShoppingCart_Functions'][$i]['Price'];
		$txtOrderingquantity=$_SESSION['ShoppingCart_Functions'][$i]['BuyQty'];
		$TotalAmount+=($Price * $txtOrderingquantity);
	}
	return $TotalAmount;
}

function CalculateTotalQuantity()
{
	$TotalQuantity=0;
	$size=count($_SESSION['ShoppingCart_Functions']);

	for ($i=0; $i <$size ; $i++) 
	{ 
		$txtOrderingquantity=$_SESSION['ShoppingCart_Functions'][$i]['BuyQty'];
		$TotalQuantity+=$txtOrderingquantity;
	}
	return $TotalQuantity;
}

function CalculateVAT()
{
	$VAT=0;

	$VAT=CalculateTotalAmount() * 0.05;

	return $VAT;
}

function IndexOf($MenuTypeID)
{
	if (!isset($_SESSION['ShoppingCart_Functions'])) 
	{
		return -1;
	}

	$size=count($_SESSION['ShoppingCart_Functions']);

	if ($size < 1) 
	{
		return -1;
	}

	for ($i=0;$i<$size;$i++) 
	{ 
		if($MenuTypeID == $_SESSION['ShoppingCart_Functions'][$i]['MenuTypeID']) 
		{
			return $i;
		}
	}
	return -1;
}

?>