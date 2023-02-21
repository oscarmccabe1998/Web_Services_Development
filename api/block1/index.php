<?php
//  managing the employee table with JSON-RPC
include("api-item.php") ; // contains the CRUD procedures
include("library.php") ;  //  general methods for JSON-TPC error checking

// read the contents of the POST data and convert this to JSON
$body = file_get_contents('php://input') ;
$request = json_decode($body);

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
		case "getAllItems":
			$resjson = getAllItems() ; 
       		$resobj = json_decode($resjson) ;
       		$response -> result = $resobj ;
        	break;
		case "getOrders":
			$resjson = getOrders() ; 
			$resobj = json_decode($resjson) ;
			$response -> result = $resobj ;
			break;
    	case "getItemById":
       		$resjson = getItemById($params) ;
       		$resobj = json_decode($resjson) ;
       		$response -> result = $resobj ;
        	break;
		case "Checkout":
			$resjson = Checkout($params) ;
       		$resobj = json_decode($resjson) ;
       		$response -> result = $resobj ;
        	break;
		case "createOrder":
			$txt = json_encode($params) ;
			$response -> result = createOrder($txt) ;
		    //$resobj = json_decode($resjson) ;
		    //$response -> result = $resobj ;
			break;
		case "userDetail":
			$resjson = userDetail($params) ;
			$resobj = json_decode($resjson) ;
			$response -> result = $resobj ;
			break;
	    case "GetBasket":
			$resjson = GetBasket($params) ;
			$resobj = json_decode($resjson) ;
			$response -> result = $resobj ;
			break;
		case "getExtraInformation":
			$resjson = getExtraInformation($params) ;
			$resobj = json_decode($resjson) ;
			$response -> result = $resobj ;
			break;
    	case "createItem":
        	$txt = json_encode($params) ;
        	$response -> result =  createItem($txt) ; 
        	break;
		case "AddtoBasket":
        	$txt = json_encode($params) ;
        	$response -> result =  AddtoBasket($txt) ; 
        	break;
    	case "deleteitemById":
        	$response -> result = deleteitemById($params) ;
        	break;
		case "deleteBasket":
			$response -> result = deleteBasket($params) ;
			break;
    	case "UpdateItem":
    		$txt = json_encode($params) ;
        	$response -> result = UpdateItem($txt) ;
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