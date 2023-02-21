<?php
require_once "config.php";

$sql = "INSERT INTO apikeys (userid, apikey) VALUES (?, ?)";
if ($stmt = $mysqli->prepare($sql)){
	$stmt->bind_param("ss", $param_userid, $param_key);
	$key = "123APIKEY";
	$param_userid = "2";
	$param_key = password_hash($key, PASSWORD_DEFAULT);

	if($stmt->execute()){
		echo"data added";
	} else {
		echo"something went wrong";
	}
	$stmt->close();

}
$mysqli->close();
?>
