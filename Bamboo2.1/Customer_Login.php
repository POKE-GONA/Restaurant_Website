<?php 

session_start();
include('HeaderLogin.php');
include('connection.php');
 
if(isset($_SESSION['loginCount']))
	{
	if($_SESSION ['loginCount'] >=3)
	{
		echo "<script> window.alert ('Please Try Again in 10 Minutes')</script>";
		echo "<script> window.location = 'LoginTimer.php'</script>";
	}
	}
	else if(!isset($_SESSION['loginCount']))
	{
	$_SESSION['loginCount']=0;
	}
	
if(isset($_POST['btnlogin'])) 
{
	$email=$_POST['txtemail'];
	$password=$_POST['pw'];

	$select="SELECT * FROM customer where Email='$email' AND Password='$password'";
	$run=mysqli_query($connection,$select);
	$count=mysqli_num_rows($run);

	if($count==1) 
	{
		$ret=mysqli_fetch_array($run);

		$_SESSION['CustomerID']=$ret['CustomerID'];
		$_SESSION['Email']=$ret['Email'];
		$_SESSION['Password']=$ret['Password'];

		echo "<script>alert('Customer Login Successful')</script>";
		unset($_SESSION['loginCount']);
		echo "<script>window.location='index.php'</script>";
	}
	else
	{
		$_SESSION['loginCount']++;
 		echo "<script> window.alert ('Invalid! Login Attempt:".$_SESSION['loginCount']."')</script>";
 		echo" <script>alert ('Invalid Customer') </script>";
	}
}
?>

<head>
	<title>Customer Login</title>
</head>
<body>

<form action="Customer_Login.php" method="POST">
<fieldset>
<h3><ins><i>Enter Customer Login Information</i></ins></h3><br>

<table>
<tr>
	<td>Customer Email</td>
	<td>
		<input name="txtemail" type="email"  placeholder="example@email.com" required />
	</td>
</tr>

<tr>
	<td>Customer Password</td>
	<td>
		<input name="pw" type="password" placeholder="***********" required>
	</td>
</tr>

<tr>
	<td></td>
	<td>
		<input type="submit" name="btnlogin" value="Login">
	</td>
</tr>

</table>
</form>

</body>

<?php include('FooterLogin.php') ?>