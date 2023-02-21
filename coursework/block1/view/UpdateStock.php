<?php
                   error_reporting(2047); 
                   ini_set("display_errors",1);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = ($_POST["id"]);
            $StockLevel = ($_POST["StockLevel"]);
            $guitar = new stdClass();
            $guitar -> id = $id;
            $guitar -> stock = $StockLevel;

            $request = new stdClass();
            $request -> jsonrpc = "2.0" ;
            $request -> method = "UpdateItem" ;
            $request -> params = $guitar ;
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
            echo $response;
            header("location: admin-item.php?id=$id");

        }
?>