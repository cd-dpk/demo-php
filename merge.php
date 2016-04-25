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
		$sql_query = "select * from Invoice order by invoice_id desc";
		$result = mysqli_query($conn, $sql_query);
		if($result == false){
			echo mysqli_error($conn);
		}
		else{
			echo "<div align ='center'>";
			echo "<table border='1'> ";
			echo "<caption>Invoice List</caption>";
			echo "<tr>";
				echo "<th>INVOICE_ID</th><th>NAME</th><th>EMAIL</th><th>PHONE</th><th>ADDRESS</th><th>INVOICE_TIME</th><th>PRODUCT_ID</th><th>ORDERDES</th><th>QUANTITY</th>";
			echo "</tr>";
			if (mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					$sql_query1 = "select * from Orders where invoice_id = ".$row["invoice_id"];
					$result1 = mysqli_query($conn, $sql_query1);
					if($result1 == false){
						echo mysqli_error($conn);
					}
					else{
						echo "<tr><td rowspan =". mysqli_num_rows($result1).">" .$row["invoice_id"]."</td><td rowspan =". mysqli_num_rows($result1).">".$row["name"]."</td><td rowspan =". mysqli_num_rows($result1).">".$row["email"]."</td><td rowspan =". mysqli_num_rows($result1).">".$row["phone"]."</td><td rowspan =". mysqli_num_rows($result1).">".$row["address"]."</td><td rowspan =". mysqli_num_rows($result1).">".$row["invoice_time"]."</td>";
						if (mysqli_num_rows($result1)>0){
							while($row1 = mysqli_fetch_assoc($result1)){
								echo  "<td>".$row1["product_id"]. "</td><td>".$row1["order_des"]."</td><td>". $row1["quantity"]."</td></tr>";
							}
						}
						else {
							echo "<tr><td colspan='9'>0 results</td></tr>";
						}
					}
				}
			}
			else {
				echo "<tr><td colspan='9'>0 results</td></tr>";
			}
			echo "</table>";
			echo "</div>";
		}
	}
?>	
	
	</body>
</html>