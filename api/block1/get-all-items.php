<?php
    //Connect to the database
    include("connection.php");
    $conn = getDatabaseConnection();

    //function to get all the items for sale

		global $conn;
		$sql = "SELECT * FROM item";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}

		return json_encode($rows);
	
    ?>