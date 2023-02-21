<?php
	function getDatabaseConnection() {
		//  Database connections 
		$servername = "Server Name";
		$username = "User Name";
		$password = "Password";
		$dbname = "Database Name";
		$conn = mysqli_connect($servername, $username, $password, $dbname) ;
		return $conn ;
		}
?>