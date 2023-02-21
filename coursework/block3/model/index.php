<?php
//  managing the employee table with JSON-RPC
include("api.php") ; // contains the CRUD procedures
include("library.php") ;  //  general methods for JSON-TPC error checking
//error_reporting(2047); 
//ini_set("display_errors",1);

// read the contents of the POST data and convert this to JSON
$body = file_get_contents('php://input') ;
$request = json_decode($body);
//$request;

//  check the POST data is in JSON format
if ($request == null) {
	$response = new stdClass();
	$response -> jsonrpc = "2.0" ;
	$response -> error -> code = -32700 ;
	$response -> error  -> message = "Parse Error" ;
	$response -> jid = null ;
}
//  check the JSON is a valid request object
else if (!jsonRpcFormatCheck($request)){
	$response = new stdClass();
	$response -> jsonrpc = "2.0" ;
	$response -> error -> code = -32600 ;
	$response -> error  -> message = "Invalid Request" ;
	$response -> jid = $request -> jid ;
}
// There are other checks that can be included here
// Check for the correct methods
// Check for the correct parameters
else {
	// the data passed to the API is in valid JSON-API format
	
	$method = $request -> method ;
	$params = $request -> params ;
	$response = new stdClass();
	$response -> jsonrpc = "2.0" ;
	$response-> jid = $request -> jid ;
	switch ($method) {
		case "getTemps":
			$resjson = getTemps() ; 
       		$resobj = json_decode($resjson) ;
       		$response -> result = $resobj ;
        	break;
		case "getLatestTemp";
			$resjson = getLatestTemp() ; 
			$resobj = json_decode($resjson) ;
			$response -> result = $resobj ;
			break;
    	case "getLEDs":
       		$resjson = getLEDs() ;
       		$resobj = json_decode($resjson) ;
       		$response -> result = $resobj ;
			//echo $response ;
			//var_dump($response -> result);
        	break;
    	case "createMessage":
        	$txt = json_encode($params) ;
        	$response -> result =  createMessage($txt) ; 
        	break;
    	case "deleteitemById":
        	$response -> result = deleteitemById($params) ;
        	break;
    	case "UpdateLED":
    		$txt = json_encode($params) ;
        	$response -> result = UpdateLED($txt) ;
       		break;
		default:
    		// method not found
        	$response -> error -> code = -32601 ;
        	$response -> error -> message = "Method not found" ;
        	break ;
	} 
}
echo json_encode($response)  ; 
?>