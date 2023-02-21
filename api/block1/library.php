<?php

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
			case "getAllItems":
        		if ($params != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
			case "getOrders":
				if ($params != null) {
					$return -32602;
				}
				else {
					$return = 1 ;
				}
				  break;
    		case "getItemById":
        		if ($params -> id != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		} 
				break;
			case "deleteBasket":
				if ($params -> id != null) {
					$return -32602;
				}
				else {
					$return = 1 ;
				} 
				break;
			case "userDetail":
				if ($params -> id != null) {
					$return -32602;
				}
				else {
					$return = 1 ;
				} 
				break;
			case "Checkout":
				if ($params -> id != null) {
					$return -32602;
				}
				else {
					$return = 1 ;
				} 
				break;
			case "createOrder":
				if ($params -> id != null) {
					$return -32602;
				}
				else {
					$return = 1 ;
				} 
				break;
			case "GetBasket":
        		if ($params -> id != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		} 
				break;
			case "getExtraInformation":
				if ($params -> id != null) {
					$return -32602;
				}
				else {
					$return = 1 ;
				}
      			break;
    		case "createItem":
        		if ($params -> txt != null) {
        			$return -32602;
        		}
        		else {
        			$return = 1 ;
        		}
      			break;
			case "AddtoBasket":
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
    		case "UpdateItem":
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