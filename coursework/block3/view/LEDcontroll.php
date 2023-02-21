<?php
    error_reporting(2047); 
    ini_set("display_errors",1);
    $url = ($_SERVER['REQUEST_URI']); 
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $pin = $params['pin'];
    $state = $params['state'];
    $id = $params['id'];
    $otherLED = $params['other'];
    if ($state == 0){
        $status = 1;
        $returnstate = "ON";
    } else if ($state == 1){
        $status = 0;
        $returnstate = "OFF";
    }
    echo $pin;
    echo $state;
    $url = 'https://agent.electricimp.com/N_OjdQTApxq0?pin='.urlencode($pin).'&state='.urlencode($status).'';
    echo $url;
    $ch = curl_init($url) ;
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch) ;
    if ($pin == 5){
        $datafordb =  '[ {"led" : "RED" , "state" : "'.$returnstate.'"} , {"led" : "GREEN" , "state" : "'.$otherLED.'"} ]';
    } else if ($pin == 7){
        $datafordb =  '[ {"led" : "RED" , "state" : "'.$otherLED.'"} , {"led" : "GREEN" , "state" : "'.$returnstate.'"} ]';
    }
    //var_dump($datafordb);
    $data = new stdClass();
    $data -> date = date('Y-m-d H:i:s');
    $data -> state = $datafordb;
    $data -> deviceid = $id;

    $request = new stdClass();
    $request -> jsonrpc = "2.0" ;
    $request -> method = "UpdateLED" ;
    $request -> params = $data ;
    $request -> jid = "510572" ;
    $txt = json_encode($request) ;
    echo $txt.'<br/><br/>' ;
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
    curl_close($ch) ;
    echo $response;
    //header("location: admin-item.php?id=$id");


    header("Location: index.php"); 
?>