<?php
include('HeaderMenu.php'); 
include('connection.php');

 ?>

<hr/>
<head>
	<title></title>
</head>
<body>
	<fieldset>
		<h3><ins><i>Booking Display</i></ins></h3><br>
		<table id="tableid" class="display" width="100%" border="1">
<thead>
<tr>
    <th>Menu Type Name</th>
    <th>Menu Type Price</th>
    <th>Action</th>
</tr>   
</thead>
<tbody>
		<?php 
			$query="SELECT * FROM MenuType ORDER BY MenuTypeID DESC";
			$ret=mysqli_query($connection,$query);
			$count=mysqli_num_rows($ret);
			if ($count==0) 
			{
				echo "<p>No Menu Found.</p>";
				exit();
			}
			else
			{
				for ($a=0; $a <$count ; $a+=3) 
				{ 
					$query1="SELECT * FROM MenuType 
					ORDER BY MenuTypeID DESC LIMIT $a,3";
					$ret1=mysqli_query($connection,$query1);
					$count1=mysqli_num_rows($ret1);

					echo "<tr>";
					for ($i=0; $i <$count1 ; $i++) 
					{ 
						$data=mysqli_fetch_array($ret1);
						$MenuTypeID=$data['MenuTypeID'];
						$MenuTypeName=$data['MenuTypeName'];
						$Price=$data['Price'];

						echo "<tr>";
                                echo "<td>".$data['MenuTypeName']."</td>";
                                echo "<td>".$data['Price']."</td>";
								echo "<td> 
								<a href='BookingMenuDisplay.php?MID=$MenuTypeID'>FoodDetail</a></td>";	
					}
					echo "</tr>";
				}
			}
		?>
		</table>
	</fieldset>
</body>
<hr/>

<?php include('FooterMenu.php') ?>