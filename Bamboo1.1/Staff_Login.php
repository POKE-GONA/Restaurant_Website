<?php 

session_start(); //Session Declare
include('HeaderLogin.php');
include('connection.php');

if(isset($_SESSION['loginCount']))
	{
	if($_SESSION ['loginCount'] >=3)
	{
		echo "<script>window.alert('Please Try Again in 10 Minutes')</script>";
		echo "<script>window.location='LoginTimer.php'</script>";
	}
	}
	else if(!isset($_SESSION['loginCount']))
	{
	$_SESSION['loginCount']=0;
	}

if(isset($_POST['btnlogin'])) 
{
	$name=$_POST['txtname'];
	$password=$_POST['txtpassword'];

	$select="SELECT * FROM staff WHERE StaffName='$name' And StaffPassword='$password'";
	$run=mysqli_query($connection,$select); //Run the Query for Staff Name and Password Checking
	$count=mysqli_num_rows($run);
	
	if($count==1) 
	{
		
		$ret=mysqli_fetch_array($run);

		$_SESSION['StaffID']=$ret['StaffID'];
		$_SESSION['StaffName']=$ret['StaffName'];
		$_SESSION['StaffPassword']=$ret['StaffPassword'];

		echo "<script>alert('Staff Login Successful')</script>";
		unset($_SESSION['loginCount']);
		echo "<script>window.location='index.php'</script>";
	}
	else
	{
		$_SESSION['loginCount']++;
 		echo "<script> window.alert ('Invalid! Login Attempt:".$_SESSION['loginCount']."')</script>";
 		echo" <script>alert ('Invalid Staff') </script>";
	}
}
?>


<head>
	<title>Staff Login</title>
</head>
<body>

<form action="Staff_Login.php" method="POST">
<fieldset>
<h3><ins><i>Enter Staff Login Information</i></ins></h3><br>

<table>
<tr>
	<td>Staff Name</td>
	<td>
		<input type="text" name="txtname" placeholder="Enter Staff Name" required>
	</td>
</tr>

<tr>
	<td>Password</td>
	<td>
		<input type="password" name="txtpassword" placeholder="***********" required>
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