<html>
	<head>
		<title>Invoice List</title>
		<link rel="stylesheet" type="text/css" href= "link.css">
	</head>
	<body>
	<div width="100%" align="center">
		<a href="index.php">Home</a><a href="categories.php">Category</a> <a href="products.php">Product</a> <a href="invoices.php">Invoice</a> <a href="orders.php">Orders</a> <a href="merge.php">Invoice&Orders</a>
	</div>
<?php
	$server_name = "localhost";
	$user_name = "root";
	$user_pass = "";
	
	$database_name ="bagdoomdb";
	$conn = mysqli_connect($server_name, $user_name, $user_pass);
	
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
	}
	else{
		mysqli_select_db($conn, $database_name);
		$sql_query = "select * from Invoice";
		$result = mysqli_query($conn, $sql_query);
		
		if($result == false){
			echo mysqli_error($conn);
		}
		else{
			echo "<div align ='center'>";
			echo "<table border='1'> ";
			echo "<caption>Invoice List</caption>";
			echo "<tr>";
				echo "<th>INVOICE_ID</th><th>NAME</th><th>EMAIL</th><th>PHONE</th><th>ADDRESS</th><th>INVOICE_TIME</th>";
			echo "</tr>";
			if (mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr><td>" .$row["invoice_id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td><td>".$row["invoice_time"]."</td></tr>";
				}
			}
			else {
				echo "<tr><td colspan='6'>0 results</td></tr>";
			}
			echo "</table>";
			echo "</div>";
		}
	}
?>
	</body>
</html>