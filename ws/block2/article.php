<?php
	// Connect to database
	include("connection.php");
	$conn =  getDatabaseConnection();
	
	// library contains all the methods required from the Web Service
	include("library.php") ;
 
	$request_method=$_SERVER["REQUEST_METHOD"];
	// $call = $_SERVER["PHP_SELF"];
	// $request = $_SERVER['REQUEST_URI'];
	
	switch($request_method)
	{
		case 'GET':
			// Retrive articles
			if(isset($_GET['id']))
			{
				$id=$_GET["id"];
				$resp = getarticle($id);
				header('Content-Type: text/xml');
				echo $resp ;
			}
			else
			{
				$resp = getAllarticles();
				header('Content-Type: text/xml');
				echo $resp ;
			}
			break;
		case 'POST':
			// Insert articles
			$xml = file_get_contents('php://input') ;
			$resp = insertarticle($xml);
			echo $resp ;
			break;
		case 'PUT':
			// Update articles
			$id=$_GET["id"];
			$xml = file_get_contents('php://input') ;
			$resp = updatearticle($id, $xml);
			echo $resp ;
			break;	
		case 'DELETE':
			// Delete articles
			$id=$_GET['id'];
			$apikey=$_GET['apikey'];
			$userid=$_GET['userid'];
			echo $id;
			$resp = deletearticle($id, $apikey, $userid);
			echo $resp ;
			break;
		
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

?>