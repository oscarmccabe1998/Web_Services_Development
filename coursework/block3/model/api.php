<?php
    //Connect to the database
    //error_reporting(2047); 
    //ini_set("display_errors",1);
    include("connection.php");
    $conn = getDatabaseConnection();
    function createMessage($txt) {
		global $conn ;
		$information = json_decode($txt) ;
		$stmt = $conn->prepare("insert into electricimp1 (devicedid , dttm , state) values (?, ?, ?)");
		$stmt->bind_param("sss", $deviceid, $dttm, $state);
		$deviceid = $information -> deviceid;
		$dttm = $information -> dttm ;  
		$state = $information -> state ;
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}
	function getTemps()
	{
		
		global $conn;
		$sql = "SELECT * FROM electricimp1 order by dttm desc LIMIT 144";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		//var_dump(json_encode($rows));
		//echo json_encode($rows);
		return json_encode($rows);
	}

	function getLatestTemp()
	{
		global $conn;
		$sql = "SELECT * FROM electricimp1 order by id desc LIMIT 1";
		$result = mysqli_query($conn, $sql);
		//  convert to JSON
		$rows = array();
		while($r = mysqli_fetch_assoc($result)) {
    		$rows[] = $r;
		}
		//var_dump(json_encode($rows));
		//echo json_encode($rows);
		return json_encode($rows);
	}

	function getLEDs()
	{
		global $conn;
		$sql = "SELECT * FROM electricimp2;";
		$result = mysqli_query($conn, $sql);
		$rows = array();
		while($r = mysqli_fetch_assoc($result)){
			$rows[] = $r;
		}
		//echo json_encode($rows);
		return json_encode($rows);

	}
	function UpdateLED($txt)
	{
		global $conn;
		$data = json_decode($txt) ;
		$stmt = $conn->prepare("update electricimp2 SET dttm = ?, devicestate = ? where deviceid =? ");

		$date = $data -> date ;
		$devicestate = $data -> state ;  
		$deviceid = $data -> deviceid;
		$stmt->bind_param("sss", $date, $devicestate, $deviceid);
		$result = $stmt->execute();
		if (!$result) {$result = 0 ;}
		return $result ;
	}
	
?>