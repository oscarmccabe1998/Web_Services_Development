<?php
        /*if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
          header("location: login_form.php");
          echo"test";
          exit;
          echo ($_SESSION["userauth"]);
      }
      if ($_SESSION["userauth"] == 0){
          header("Location: ../index.php");}*/
       if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = ($_POST["Name"]);
            $image = ($_POST["Image"]);
            $description = ($_POST["Description"]);
            $price = ($_POST["Price"]);
            echo $name;
            echo $image;
            echo $description;
            echo $price;
            $guitar = new stdClass();
            $guitar -> name = $name;
            $guitar -> image = $image;
            $guitar -> description = $description;
            $guitar -> price = $price;

            $request = new stdClass();
            $request -> jsonrpc = "2.0" ;
            $request -> method = "createItem" ;
            $request -> params = $guitar ;
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
            header("location: ../view/UpdateItems.php");

          
       }
?>

