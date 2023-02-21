<?php 
require_once "config.php";
$sql = "SELECT apikey FROM apikeys WHERE userid = ?";
$apikey = "123APIKEY";
if ($stmt = $mysqli->prepare($sql)){
	$param_user = '2';
	$stmt->bind_param("s", $param_user);
	if ($stmt->execute()){
		$stmt->store_result();
		if($stmt->num_rows == 1){
			$stmt->bind_result($key);
			if($stmt->fetch()){
				if(password_verify($apikey, $key)){
					echo "valid";
				} else {
					echo "invalid";
				}
			}
		}
	} $stmt->close();
}
$mysqli->close();
?>
