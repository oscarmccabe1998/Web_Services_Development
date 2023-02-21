<?php
function getDatabaseConnection() {
		//  Database connections 
		$servername = "Server Name";
		$username = "User Name";
		$password = "Password";
		$database = "Database Name";
		$conn = mysqli_connect($servername,$username,$password,$database);
		// Check connection
		if (mysqli_connect_errno()) {
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
		}
		return $conn ;
		}
?>