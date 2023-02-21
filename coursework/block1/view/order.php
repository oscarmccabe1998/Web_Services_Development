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
    <style>
        table, th, td {
        border:1px solid black;
        }
</style>
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

        <?php

        if ($_SESSION["userauth"] == 1){
            echo "<p>Admin</p>";
        } elseif ($_SESSION["userauth"] == 0){
            header("Location: index.php");}
            error_reporting(2047); 
            ini_set("display_errors",1);
            $request = new stdClass();
            $request -> jsonrpc = "2.0" ;
            $request -> method = "getOrders" ;
            $request -> jid = "510572" ;
            $txt = json_encode($request) ;
            //echo $txt.'<br/><br/>' ;
            
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
            $itemtxt = json_decode($response);
            $item = $itemtxt->result;
            /*if (count($item) > 0)
            {
                echo'<table>';
                echo'<thread>';
                echo'<tr>';
                echo'<th>';
                echo implode('</th><th>', array_keys(current($item)));
                echo'</th>';
                echo '</tr>';
                echo '</thread>';
                echo'<tbody>';
                foreach ($item as $row): array_map('htmlentities', $row);
                echo '<tr>';
                echo '<td>';
                echo implode('</td><td>', $row);
                echo '</td';
                echo '</tr>';
                endforeach;
                echo'</tbody>';
                echo'</table>';
            }*/
            echo'<table style="width:100%">';
            echo'<tr>';
            echo'<th>id</th>';
            echo'<th>item</th>';
            echo'<th>total</th>';
            echo'<th>Firstname</th>';
            echo'<th>Surname</th>';
            echo'<th>email</th>';
            echo'<th>mobile number</th>';
            echo'<th>Address</th>';
            echo'<th>Post Code</th>';
            echo'</tr>';
            
            for ($i=0; $i<sizeof($item); $i++){
                echo'<tr>';
                echo'<td>'.$item[$i] -> id.'</td>';
                echo'<td>'.$item[$i] -> item.'</td>';
                echo'<td>'.$item[$i] -> total.'</td>';
                echo'<td>'.$item[$i] -> firstname.'</td>';
                echo'<td>'.$item[$i] -> surname.'</td>';
                echo'<td>'.$item[$i] -> email.'</td>';
                echo'<td>'.$item[$i] -> mobile_number.'</td>';
                echo'<td>'.$item[$i] -> address.'</td>';
                echo'<td>'.$item[$i] -> postcode.'</td>';
            }
            
            echo'</table>';
            //echo $response;
        ?>
 </div><!--products container-->
    </div><!--page container-->
    <!-- More Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>