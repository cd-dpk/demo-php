<html>
	<head>
		<title>Add a Category</title>
		<link rel="stylesheet" type="text/css" href= "link.css">
	</head>
	<body>
	<div width="100%" align="center">
		<a href="index.php">Home</a>	
	</div>
	<?php	
/*	$server_name = "localhost";
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
		
		$var_length =0;
		if($result == false){
			echo mysqli_error($conn);
		}
		else{
			if (mysqli_num_rows($result)>0){
				$var_length = mysqli_num_rows($result);
				$var_category .="[";
				while($row = mysqli_fetch_assoc($result)){
					if($var_category != "[") $var_category .= ",";
					$var_category = $var_category. "{"."\"category_id\":". $row["category_id"].","."\"category_name\":\"".$row["category_name"]."\"}";
				}
				$var_category .= "]";
			}
			else {
				$var_category ="{[]}";
			}
		}
	}
*/	
	echo '<div align ="center">';
	echo '<p>Add A New Category</p>';
	echo '<form action="insert_a_category.php" method="POST">';
		echo '<table>';
		echo '<tr><td>Category Name</td><td><input type="text" name="category_name"></input></td></tr>';
		echo '<tr><td colspan="2" align="center"><input type ="submit" value="ADD"></input></td></tr>';
	echo '</table></form>';	
	echo '</div>';
	?>	
	</body>
</html>
