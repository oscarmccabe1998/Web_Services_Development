<?php
    //Connect to the database
    include("connection.php");
    $conn = getDatabaseConnection();

    //function to get all the items for sale
    function getAllItems()
	{
		global $conn;
		$sql = "SELECT * FROM item";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}

    //function to get a single item for sale
    function getItemById($id)
    {
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM item WHERE id= ? LIMIT 1";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 's', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row=mysqli_fetch_array($result) ;  //there is only 1 row
		return json_encode($row);
    }

    function getExtraInformation($id)
    {
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM StockInformation WHERE itemid= ? LIMIT 1";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 's', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row=mysqli_fetch_array($result) ;  //there is only 1 row
		return json_encode($row);
    }