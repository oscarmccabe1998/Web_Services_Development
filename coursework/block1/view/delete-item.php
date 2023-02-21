<?php
            error_reporting(2047); 
            ini_set("display_errors",1);
    $url = ($_SERVER['REQUEST_URI']); 
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];
    echo $id; 
    //  set up the request
    $request = new stdClass();
    $request -> jsonrpc = "2.0" ;
    $request -> method = "deleteitemById" ;
    $request -> params = $id ;
    $request -> jid = "510572" ;
    $txt = json_encode($request) ;
    echo $txt.'<br/><br/>' ;
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
    
    header("location: UpdateItems.php");
?>