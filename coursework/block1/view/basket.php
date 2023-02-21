<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- local CSS -->
        <link rel="stylesheet" href="ecommerce.css?v=2.0" />
        <title>CMP306 - Web Services Development Ecommerce site</title>
    </head>

    <body>
        <!-- container for the page -->
        <div class="container">
            <!-- page header -->
            <div id="header" class="card text-center">
                <img src="../image/title01.jpg"/>
                <div class="card-img-overlay">
                <h4 class="card-title">CMP306 Web Services Development - 2022-23</h4>
                <h5 class="card-title">Oscar McCabe - 1603127</h5>
                <h6>This site is part of an asignment - All images are copyright Reverb (reverb.com)</h6>
            </div>
        </div> <!-- End of page header -->
    <?php
    include("navbar.php");
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login_form.php");

        echo"test";
        exit;
        echo ($_SESSION["userauth"]);
        }
    ?>
    <?php
                    error_reporting(2047); 
                    ini_set("display_errors",1);
    $id = ($_SESSION["id"]);
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
    //echo $item;
    if (!$item){
        echo "Basket is empty";
    } else {
    echo '<div class="col-lg-12 col-md-12 col-sm-12">' ;
    echo '<div class="card">' ;
    echo '<div class="card-header">' ;
    echo '<p>Basket</p>' ;
    //$id = $item[$i] -> id;
    echo '</div>' ;
    echo '<div class="card-block">' ;
    echo '<p>'.$item -> name.'</p>' ; 
    echo '<p>Total &pound;'.$item -> price.'</p>' ; 
    echo '</div>' ;
    //echo '<div class="card-footer">' ;
    //echo '<a href="product-info.php?id=',urlencode($id),'" class="btn btn-primary">More Details</a>' ;
    //echo '</div>' ;
    //echo '</div>' ;
    //echo '</div>' ;
    
    //echo '<div class="col-lg-6 col-md-6 col-sm-6">' ;
    //echo '<div class="card">' ;
    echo '<div class="card-header">' ;
    echo '<p>Shipping info</p>' ;
    //$id = $item[$i] -> id;
    echo '</div>' ;
    echo '<div class="card-block">' ;
    echo '<p> Firstname: '.$item -> firstname.'</p>' ; 
    echo '<p>Surname: '.$item -> surname.'</p>' ; 
    echo '<p>Email: '.$item -> email.'</p>' ; 
    echo '<p>Number: '.$item -> mobile_number.'</p>' ; 
    echo '<div class="form-container">';
    echo '<form action="../model/payment.php" method="post">';
    echo '<div class="container">';
    echo '<h1>Address</h1>';
    echo '<p>Please fill in this form to add your adderss.</p>';
    echo '<hr>';
    echo '<label for="address"><b>Address</b></label>';
    echo '<input type="text" placeholder="Enter Address" name="address" id="address" required>';
    echo '<label for="postcode"><b>Postcode</b></label>';
    echo '<input type="text" placeholder="Enter Postcode" name="postcode" id="postcode" required>';
    $price = $item -> price;
    echo'<input type="hidden" name="item" value='.$price.' />';
    echo '<h1>Card Number</h1>';
    echo '<hr>';
    echo '<label for="cardnumber"><b>Card Number</b></label><br/>';
    echo '<input type="number" placeholder="Enter Card Number" name="card" id="card" min="1111111111111111" max="9999999999999999" required>';
    echo '<hr>';
    echo '<button type="submit" class="registerbtn">Checkout now</button>';
    echo '</div>';
    echo '</div>' ;
    echo '<div class="card-footer">' ;
    //echo '<a href="product-info.php?id=',urlencode($id),'" class="btn btn-primary">More Details</a>' ;
    echo '</div>' ;
    echo '</div>' ;
    echo '</div>' ;
    }
    ?>

</div><!--form container-->
        <br/>
    <!-- More Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>