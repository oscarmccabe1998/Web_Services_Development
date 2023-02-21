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
        error_reporting(2047); 
               ini_set("display_errors",1);
        session_start();
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login_form.php");
            echo"test";
            exit;
            echo ($_SESSION["userauth"]);
        }
        ?>
        <br/>
        <div class="row">
            <!--Display products for sale-->
            <?php

            if ($_SESSION["userauth"] == 1){
                echo "<p>Admin</p>";
            } elseif ($_SESSION["userauth"] == 0){
                header("Location: index.php");}
            //echo "<br/>";
               $url = ($_SERVER['REQUEST_URI']); 
               $url_components = parse_url($url);
               parse_str($url_components['query'], $params);
               $id = $params['id'];
               error_reporting(2047); 
               ini_set("display_errors",1);
               $request = new stdClass();
               $request -> jsonrpc = "2.0" ;
               $request -> method = "getItemById" ;
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
               //echo $item;
               
               /*include("../model/api-item.php");
               $itemtxt = getItemById($id);
               $item = json_decode($itemtxt);
               $additionalinfotxt = getExtraInformation($id);*/
               //$extrainfo = json_decode($additionalinfotxt);
               echo '<div class="col-lg-6 col-md-6 col-sm-6">' ;
               echo '<div class="card">' ;
               echo '<div class="card-header">' ;
               echo $item -> name ;
               #$id = $item[$i] -> id;
               echo '</div>' ;
               echo '<div class="card-block">' ;
               echo '<img class="img-fluid" src="../image/'.$item->image.'" />' ;
               echo '<p>'.$item -> description.'</p>' ; 
               echo '<p>Price &pound;'.$item -> price.'</p>' ; 
               echo '</div>' ;
               echo '<div class="card-footer">' ;
               //echo '<a href="product-info.php?id=',urlencode($id),'" class="btn btn-primary">More Details</a>' ;
               echo '</div>' ;
               echo '</div>' ;
               echo '</div>' ;
               
               echo '<div class="col-lg-6 col-md-6 col-sm-6">' ;
               echo '<div class="card">' ;
               echo '<div class="card-header">' ;
               echo 'Check Stock or delete item';
               echo '</div>';
               echo '<div class="card-block">' ;
               echo '<p> Amount of units left: </p>';
               echo '<p>'.$item -> StockLevel.'</p>';
               echo '<p>Overall customer rating out of five:';
               echo '<p>'.$item -> Rating.'</p>';
               echo '<div class="card-footer">' ;
               echo '<a href="delete-item.php?id=',urlencode($id),'" class="btn btn-primary">Delete Item</a>' ;//Change to checkout 
               echo '</div>' ;
               echo '</div>' ;
               echo '</div>' ;


            ?>

            <div class="form-container">
                <form action="UpdateStock.php" method="post">
            <div class="container">
                <h1>Update Stock</h1>
                <p>Please fill in this form to Update the Stock Level for this item.</p>
                <hr>
                <?php 
                $url = ($_SERVER['REQUEST_URI']); 
                $url_components = parse_url($url);
                parse_str($url_components['query'], $params);
                $id = $params['id'];
                echo'<input type="hidden" name="id" value='.$id.' />';
                ?>
                <label for="StockLevel"><b>StockLevel</b></label>
                <input type="number" min="0" placeholder="Stock Level" name="StockLevel" id="StockLevel" required>

                <hr>
                
                <button type="submit" class="registerbtn">Update Stock Level</button>
               </form>
                </div>
            </div>
        </div><!--products container-->
    </div><!--page container-->
    <!-- More Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>