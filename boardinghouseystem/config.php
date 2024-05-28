<?php

	 $server = "localhost";
	 $username = "root";
	 $password = "";
	 $db_name = "boarding_house";

	 if ($conn = mysqli_connect($server,$username,$password)) {
	 	$sqlquery = "CREATE DATABASE IF NOT EXISTS $db_name";

	 	if (mysqli_query($conn, $sqlquery)) {
	 		$conn = mysqli_connect($server,$username,$password, $db_name);
	 		//include 'migrations.php';
	 	}
	 }
?>