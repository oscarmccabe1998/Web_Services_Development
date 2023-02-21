<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login_form.php");

        echo"test";
        exit;
        echo ($_SESSION["userauth"]);
        }
        error_reporting(2047); 
                    ini_set("display_errors",1);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $address = ($_POST["address"]);
            $postcode = ($_POST["postcode"]);
            $card = ($_POST["card"]);
            $price = ($_POST["item"]);
            echo $price;
            echo $address;
            echo $postcode;
            echo $card;
            $data = new stdClass();
            $data -> vendor = "1603127" ; // student number
            $data -> transaction = "gl123456" ; // string of length 8
            $data -> amount = $price ; // amount less than 100
            $data -> card = $card ; // 16 digit number

            $request = json_encode($data) ;

            // echo $request ;

            $url = "URL to payment gateway" ;
            $ch = curl_init() ;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($request)) );
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);

            echo $response ; 
            $itemtxt = json_decode($response);
            $item = $itemtxt -> errortxt;
            echo $item;
            if ($item == "Card Payment Rejected")
            {
                header("location: ../view/basket.php");
            } elseif ($item == "OK")
            {
                echo "Payment Sucessful";
                $id = ($_SESSION["id"]);

                $request = new stdClass();
                $request -> jsonrpc = "2.0" ;
                $request -> method = "Checkout" ;
                $request -> params = $id ;
                $request -> jid = "510572" ;
                $txt = json_encode($request) ;
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
                //echo $ch;
                //echo $response;
                
                //  display the result of the call
                $itemtxt = json_decode($response) ;
                $item = $itemtxt->result;
                if ($item == 1)
                {
                    echo "it works";
                    $request = new stdClass();
                    $request -> jsonrpc = "2.0" ;
                    $request -> method = "GetBasket" ;
                    $request -> params = $id ;
                    $request -> jid = "510572" ;
                    $txt = json_encode($request) ;
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
                    //echo $response;
                    $itemtxt = json_decode($response) ;
                    $item = $itemtxt->result;
                    $name = $item -> name;
                    $price = $item -> price;
                    $firstname = $item -> firstname;
                    $surname = $item -> surname;
                    $email = $item -> email;
                    $mobile_number = $item -> mobile_number;
                    echo $address;
                    echo $postcode;
                    $info = new stdClass();
                    $info ->item = $name;
                    $info ->price = $price;
                    $info -> firstname = $firstname;
                    $info -> surname = $surname;
                    $info -> email = $email;
                    $info -> mobile_number = $mobile_number;
                    $info -> address = $address;
                    $info -> postcode = $postcode;
                    echo $info -> item;
                    
                    $request = new stdClass();
                    $request -> jsonrpc = "2.0" ;
                    $request -> method = "createOrder" ;
                    $request -> params = $info ;
                    $request -> jid = "510572" ;
                    $txt = json_encode($request) ;
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
                    //echo $ch;
                    echo $response;
                    
                    //  display the result of the call
                    $itemtxt = json_decode($response) ;
                    $item = $itemtxt->result;
                    echo $item;
                    if ($item == 1)
                    {
                        echo "added to orders";
                        $request = new stdClass();
                        $request -> jsonrpc = "2.0" ;
                        $request -> method = "deleteBasket" ;
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
                        header("location: ../view/basket.php");
                    }

                }
            }
        }
?>