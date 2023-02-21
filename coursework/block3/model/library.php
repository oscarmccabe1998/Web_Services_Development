<?php
//error_reporting(2047); 
//ini_set("display_errors",1);
	function jsonRpcFormatCheck($request) {
	//  function to check that the JSON-RPC parameters are there and correct
		$jsonrpc = $request -> jsonrpc ;
		$method = $request -> method ;
		$jid = $request -> jid ;
		if ( ($jsonrpc != "2.0" ) or ($method == NULL) or ($jid == NULL)) {
			$return = 0 ;
		}
		else {
			$return = 1 ;
		}
		return $return ;
	} ;
	
	function checkMethodParams($method, $params) {
		switch ($method) {
			case "getTemps":
        		if ($params != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
			case "getLatestTemp";
				if ($params != null) {
					$return -32602;
				}
				else {
					$return = 1 ;
				}
				break;
    		case "getLEDs":
        		if ($params -> id != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		} 
				break;
    		case "createMessage":
        		if ($params -> txt != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
    		case "deleteitemById":
    			if ($params -> id != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
    		case "UpdateLED":
    			if ($params-> txt != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
			default :
    		// method not found
        		$return = -32601;
        	break ;
        }
        return $return ;
} 
	
?>