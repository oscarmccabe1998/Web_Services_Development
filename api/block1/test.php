<?php
//  employee13.php retrieve all employee records using JSON-API
error_reporting(E_ALL);

//  set up the request
$request = new stdClass();
$request -> jsonrpc = "2.0" ;
$request -> method = "getAllItems" ;
$request -> jid = "510572" ;
$txt = json_encode($request) ;
echo $txt.'<br/><br/>' ;

//  set up for the curl
// $url = "localhost/mayar.abertay.ac.uk/cmp306/jsonrpc/index.php" ;
$url = "https://mayar.abertay.ac.uk/~1603127/cmp306/api/block1/index.php" ;
$ch = curl_init($url) ;
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
$headers = array (
	'Content-Type: application/json', 
	'Content-Length: ' . strlen($txt) ) ;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers) ;
curl_setopt($ch, CURLOPT_POSTFIELDS, $txt);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch) ;

//  display the result of the call
echo $response ;
$responsedata= json_decode($response) ;
echo $responsedata;

?>