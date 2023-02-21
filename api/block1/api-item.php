<?php
    //Connect to the database
    include("connection.php");
    $conn = getDatabaseConnection();

    //function to get all the items for sale
    function getAllItems()
	{
		global $conn;
		$sql = "SELECT * FROM item LIMIT 6";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		return json_encode($rows);
	}

	function getOrders()
	{
		global $conn;
		$sql = "SELECT * FROM orders";
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

	function userDetail($id)
    {
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT firstname, surname, email, mobile_number FROM ShopUsers WHERE id= ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 's', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row=mysqli_fetch_array($result) ;  //there is only 1 row
		return json_encode($row);
    }

	//  function to delete a single item
	function deleteitemById($itemid)
	{
		deleteBasketByItem($itemid);
		global $conn ;
		$sql = "DELETE from item where id = ?" ;
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $itemid);
		$result = mysqli_stmt_execute($stmt);
		echo $itemid;
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	function deleteBasketByItem($itemid)
	{
		global $conn ;
		$sql = "DELETE from checkout where itemid = ?" ;
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $itemid);
		$result = mysqli_stmt_execute($stmt);
		echo $itemid;
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	function UpdateItem($txt) {
		// $txt must contain the data for all fields.
		global $conn ;
		$guitar = json_decode($txt) ;
		$stmt = $conn->prepare("update item SET StockLevel=? where id=? ");

		$stock = $guitar -> stock ;
		$id = $guitar -> id ;  
		$stmt->bind_param("ss", $stock, $id);
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	function createItem($txt) {
		global $conn ;
		$guitar = json_decode($txt) ;
		$stmt = $conn->prepare("insert into item (name, image, description, price) values (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $image, $description, $price);
		$name = $guitar -> name ;
		$image = $guitar -> image ;  
		$description = $guitar -> description ;
		$price = $guitar -> price ; 
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	function GetBasket($id){
		global $conn;
		$stmt = mysqli_stmt_init($conn);
		$sql = "SELECT item.name, item.price, ShopUsers.firstname, ShopUsers.surname, ShopUsers.email, ShopUsers.mobile_number FROM ((item INNER JOIN checkout ON item.id = checkout.itemid) INNER JOIN ShopUsers ON checkout.customerid=ShopUsers.id) WHERE ShopUsers.id = 1;";
		mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 's', $id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		$row=mysqli_fetch_array($result) ;  //there is only 1 row
		return json_encode($row);
		/*
SELECT
    item.name,
    item.price,
    ShopUsers.firstname,
    ShopUsers.surname,
    ShopUsers.email,
    ShopUsers.mobile_number
    FROM ((item INNER JOIN checkout ON item.id = checkout.itemid)
          INNER JOIN ShopUsers ON checkout.customerid=ShopUsers.id) WHERE ShopUsers.id = 1;

*/
	}


	function createOrder($txt) {
		error_reporting(2047); 
                    ini_set("display_errors",1);
		global $conn ;
		$info = json_decode($txt) ;
		$stmt = $conn->prepare("insert into orders (item, total, firstname, surname, email, mobile_number, address, postcode) values (?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssss", $item, $total, $firstname, $surname, $email, $mobile_number, $address, $postcode);
		//echo $info;
		/*$item = $info -> item ;
		$total = $info -> price ;  
		$firstname = $info -> firstname ;
		$surname = $info -> surname ; 
		$email = $info -> email;
		$mobile_number = $info -> mobile_number;
		$address = $info -> address;
		$postcode = $info -> postcode;*/
		$item = $info ->item;
		$total = $info ->price;
		$firstname = $info -> firstname;
		$surname = $info -> surname;
		$email = $info -> email;
		$mobile_number = $info -> mobile_number;
		$address = $info -> address;
		$postcode = $info -> postcode;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}	

	function deleteBasket($id)
	{
		global $conn ;
		$sql = "DELETE from checkout where customerid = ?" ;
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 's', $id);
		$result = mysqli_stmt_execute($stmt);
		echo $itemid;
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	function Checkout($id){

		global $conn ;
		$stmt = $conn->prepare("update item set Stocklevel = StockLevel-1 where id =(
			SELECT
			item.id
			FROM ((item INNER JOIN checkout ON item.id = checkout.itemid)
				  INNER JOIN ShopUsers ON checkout.customerid=ShopUsers.id) WHERE ShopUsers.id = ?); ");

		$stmt->bind_param("s", $id);
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}

	function AddtoBasket($txt) {
        global $conn;
		$basket = json_decode($txt);
		$customerid = $basket -> customerid ;
		$stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM checkout WHERE customerid= ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 's', $customerid);
		mysqli_stmt_execute($stmt);
		$searchresult = mysqli_stmt_get_result($stmt);
		$rows = array();
		while($r = mysqli_fetch_assoc($searchresult)) {
    		$rows[] = $r;
		}
		if(count($rows) >=1)
		{
			$result = "false";
			//return $result;
		} else {
			$newstmt = $conn->prepare("insert into checkout (customerid, itemid) values (?, ?)");
	
			$newstmt->bind_param("ss", $customerid, $itemid);
			$customerid = $basket -> customerid ;
			$itemid = $basket -> itemid ;  
			$result = $newstmt->execute();
			

			//return $result ;
			//$result = "Allowed";
		}
		if (!$result) {$result = 0 ;}
		return json_encode($result);

	}