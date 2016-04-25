<?php
	$server_name = "localhost";
	$user_name = "root";
	$user_pass = "";
	
	$database_name ="bagdoomdb";
	$file_name ="insert.txt";
	$conn = mysqli_connect($server_name, $user_name, $user_pass);
	
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
	}
	else{
		mysqli_select_db($conn, $database_name);
		$myfile = fopen($file_name, "r") or die("Unable to Open File");
		$sql_query = "";
		while(!feof($myfile)) {
			$sql_query = fgets($myfile);
			echo $sql_query;
			$result = mysqli_query($conn,$sql_query);
			if($result == false){
				echo "Why?";
				echo mysqli_error($conn);
			}
			else{
				echo "Okay";
			
			}
		}
		fclose($myfile);
		echo $sql_query;
	}
?>