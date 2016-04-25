<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php	
	
	$server_name = "localhost";
	$user_name = "root";
	$user_pass = "";
	
	$database_name ="bagdoomdb";
	$conn = mysqli_connect($server_name, $user_name, $user_pass);

	$var_category="";
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
	}
	else{
		mysqli_select_db($conn, $database_name);
		$sql_query = "select * from Category";
		$result = mysqli_query($conn, $sql_query);
		
		if($result == false){
			echo mysqli_error($conn);
		}
		$var_length =0;
		else{
			if (mysqli_num_rows($result)>0){
				$var_length = mysqli_num_rows($result);
				$var_category .="{[";
				while($row = mysqli_fetch_assoc($result)){
					if($var_category != "{[") $var_category .= ",";
					$var_category = $var_category. "{"."\"category_id\":". $row["category_id"].","."\"category_name\":".$row["category_name"]."}";
				}
				$var_category .= "]}";
			}
			else {
				$var_category ="{[]}"
			}
		}
	}

	echo '<form action="#" method="POST">';
	echo '<table>';
	echo '<tr><td>Category ID</td>';
	echo '<td>';
	echo '<select name="category_id">';
	$json_arr= json_decode($var_category,true);
	for($x =0; $x < $var_length; $x++){
		echo "<option>". $json_arr[$x]["category_id"];
	}
	echo "</select>"
	echo '</select>';
	echo '</td></tr>';
	echo '<tr><td>Product Name</td><td><input name="product_name"></input></td></tr>';
	echo '<tr><td>Product Des</td><td><input name="product_description"></input></td></tr>';
	echo '<tr><td>Price</td><td><input name="price"></input></td></tr>';
	echo '<tr><td>Special Price</td><td><input name="special_price"></input></td></tr>';
	echo '<tr><td>Quantity</td><td><input name="quantity"></input></td></tr>';
	echo '<tr><td colspan="2"><input type="submit"/></td></tr>';
	echo '</table></form>';	
	?>	
	</body>
</html>