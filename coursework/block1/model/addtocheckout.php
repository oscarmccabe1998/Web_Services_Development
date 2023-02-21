<?php 
    session_start(); 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: ../view/login_form.php");
        echo"test";
        exit;
        echo ($_SESSION["userauth"]);
    }
    /*if ($_SESSION["userauth"] == 1){
        echo "<p>Admin</p>";
    } elseif ($_SESSION["userauth"] == 0){
        header("Location: index.php");}*/
        error_reporting(2047);
        ini_set("display_errors",1);
    $userid = ($_SESSION["id"]);
    $url = ($_SERVER['REQUEST_URI']); 
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $id = $params['id'];
    echo $id;
    echo $userid;

    $basket = new stdClass();
    $basket -> customerid = $userid;
    $basket -> itemid = $id;

    $request = new stdClass();
    $request -> jsonrpc = "2.0" ;
    $request -> method = "AddtoBasket" ;
    $request -> params = $basket ;
    $request -> jid = "510572" ;
    $txt = json_encode($request) ;
    echo $txt;
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
    //echo $response -> result;
    $item = $itemtxt->result;
    echo $item;
    if($item == "true")
    {
        echo "Added to basket";
        header("location: ../view/basket.php");

    } else
    {
        echo "Basket full";
        header("location: ../view/product-info.php?id=$id");
      // echo '<script>alert("I am an alert box!");</script>';


    }
?>
