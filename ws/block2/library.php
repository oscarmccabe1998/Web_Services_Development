<?php

	// Library of methods to support the Web Service	
	
	//  function to convert a single record from database to XML
	function convertToXML($query) {
		$txt ='<article>' ;
		$txt = $txt.'<id>'.$query["id"].'</id>' ;
		$txt = $txt.'<headline>'.$query["headline"].'</headline>' ;
		$txt = $txt.'<story>'.$query["body"].'</story>' ;
		$txt = $txt.'<link>'.$query["link"].'</link>' ;
		$txt = $txt.'</article>' ;
		return $txt ;
	}	


	function getAllarticles()
	{
		global $conn;
		$query="select * from articles order by id desc";
		$result=mysqli_query($conn, $query);
		$txt = '<articles>';
		while($row=mysqli_fetch_array($result))
		{
			$txt = $txt.convertToXML($row) ;
		}
		$txt = $txt.'</articles>' ;
		return $txt ;
	}

	

	function getarticle($id)
	{
		global $conn;
		$query="select * FROM articles where id=".$id ;
		$result=mysqli_query($conn, $query);
		$response = mysqli_fetch_array($result) ;
		$txt = convertToXML($response) ;
		return $txt ;
	}
	

	function insertarticle($xml)
	{
		global $conn;
		$data = simplexml_load_string($xml);
		$apikey=$data -> apikey;
		$userid=$data -> userid;
		$verify = verifyapi($apikey, $userid);
		if ($verify == 1)
		{
			$headline=$data -> article_headline;
			$body=$data -> article_body;
			$link=$data -> article_link;
			$query="INSERT INTO articles SET headline='".$headline."', body='".$body."', link='".$link."'";
			$response = mysqli_query($conn, $query) ;
			$last_id = mysqli_insert_id($conn) ;
			if($response)
			{
				$resp = $last_id ;
			}
			else
			{
				$resp = 0 ;
			}
		} else {
			$resp = 0;
		}
		return $resp ;
	}
	

	function updatearticle($id, $xml)
	{
		global $conn;
		$data = simplexml_load_string($xml);
		$apikey=$data -> apikey;
		$userid=$data -> userid;
		$verify = verifyapi($apikey, $userid);
		if ($verify == 1)
		{
			$article_headline=$data -> article_headline;
			$article_body=$data -> article_body;
			$article_link=$data -> article_link;
			$query="UPDATE articles SET headline='".$article_headline."', body='".$article_body."', link='".$article_link."' WHERE id=".$id;
			$response = mysqli_query($conn, $query) ;
			if($response)
			{
				$resp = 1 ;
			}
			else
			{
				$resp = 0 ;
			}
		} else {
			$resp = 0;
		}
		return $resp ;
	}
	

	function deletearticle($id, $apikey, $userid)
	{
		$verify = verifyapi($apikey, $userid);
		if ($verify == 1)
		{
			global $conn;
			echo "the id is".$id;
			$query="DELETE FROM articles WHERE id=".$id;
			$response = mysqli_query($conn, $query) ;
			if($response)
			{
				$resp = 1 ;
			}
			else
			{
				$resp = 0 ;
			} 
		} else {
				$resp = 0;
			}
		return $resp ;
	}

	function verifyapi($apikey, $userid)
	{
		require_once "config.php";
		$sql = "SELECT apikey FROM apikeys WHERE userid = ?";
		//$apikey = "123APIKEY";
		if ($stmt = $mysqli->prepare($sql)){
			$param_user = $userid;
			$stmt->bind_param("s", $param_user);
			if ($stmt->execute()){
				$stmt->store_result();
				if($stmt->num_rows == 1){
					$stmt->bind_result($key);
					if($stmt->fetch()){
						if(password_verify($apikey, $key)){
							$resp = 1;
						} else {
							$resp = 0;
						}
					}
				}
			} $stmt->close();
		}
		$mysqli->close();
		return $resp;
	}
	
?>