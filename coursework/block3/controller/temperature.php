<?php
//include_once("../model/api.php") ;
//get the new data
$message = file_get_contents('php://input') ;
echo $message;
$deviceid = "236eb3b236a7c9ee";
$information = new stdClass();
$information -> deviceid = $deviceid;
$information -> dttm = date('Y-m-d H:i:s');
$information -> state = $message;
//echo $information -> dttm;
//$res = createMessage($information) ;
//echo "Added Record - ".$res ;

$request = new stdClass();
$request -> jsonrpc = "2.0" ;
$request -> method = "createMessage" ;
$request -> params = $information ;
$request -> jid = "510572" ;
$txt = json_encode($request) ;
$url = "https://mayar.abertay.ac.uk/~1603127/cmp306/coursework/block3/model/index.php" ;
$ch = curl_init($url) ;
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
$headers = array (
        'Content-Type: application/json', 
        'Content-Length: ' . strlen($txt) ) ;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers) ;
curl_setopt($ch, CURLOPT_POSTFIELDS, $txt);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo $response;
curl_close($ch) ;
$itemtxt = json_decode($response) ;
$item = $itemtxt->result;
?>