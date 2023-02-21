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


        <div class="row">
            <!--Display products for sale-->
            <?php
            

            if ($_SESSION["userauth"] == 1){
                echo "<p>Admin Page, Plaese scroll down to find a form to add a new guitar to the inventory  <a href='order.php'>Click here to view orders</a> </p>";
            } elseif ($_SESSION["userauth"] == 0){
                header("Location: index.php");}
            //echo "<br/>";
            $request = new stdClass();
            $request -> jsonrpc = "2.0" ;
            $request -> method = "getAllItems" ;
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

                for ($i=0 ; $i<sizeof($item) ; $i++){
                    echo '<div class="col-lg-4 col-md-4 col-sm-4">' ;
                    echo '<div class="card">' ;
                    echo '<div class="card-header">' ;
                    echo $item[$i] -> name ;
                    $id = $item[$i] -> id;
                    echo '</div>' ;
                    echo '<div class="card-block">' ;
                    echo '<img class="img-fluid" src="../image/'.$item[$i]->image.'" />' ;
                    echo '<p>'.$item[$i] -> description.'</p>' ; 
                    echo '<p>Price &pound;'.$item[$i] -> price.'</p>' ; 
                    echo '</div>' ;
                    echo '<div class="card-footer">' ;
                    echo '<a href="admin-item.php?id=',urlencode($id),'" class="btn btn-primary">Update or Delete Item</a>' ;
                    echo '</div>' ;
                    echo '</div>' ;
                    echo '</div>' ;
                }
            ?>
        </div><!--products container-->
    </div><!--page container-->

    <div class="form-container">
    <form action="../model/Additem.php" method="post">
  <div class="container">
    <h1>Add a guitar for sale</h1>
    <p>Please fill in this form to add a guitar for sale.</p>
    <hr>


    <label for="Name"><b>Name</b></label>
    <input type="text" placeholder="Enter Guitar Name" name="Name" id="Name" required>

    <label for="image">Choose an image:</label>
    <select name="Image" id="Image">
        <option value="item1.jpg">PRS</option>
        <option value="item2.jpg">Strat</option>
        <option value="item3.jpg">Telecaster</option>
        <option value="item4.jpg">PRS Custom</option>
        <option value="item5.jpg">Martin</option>
        <option value="item6.jpg">Gibson</option>

    </select> <br/><br/>

    <label for="description"><b>Guitar Description</b></label>
    <input type="text" placeholder="Enter Description for the Guitar" name="Description" id="Description" required>

    <label for="Price"><b>Price</b></label> <br/>
    <input type="number" step="0.01" min="0" placeholder="Enter Guitar Price" name="Price" id="Price" required>

    <hr>
    <!--<input type="submit" value="Submit">-->
    <button type="submit" class="registerbtn" value="Submit">Add Guitar</button>
  </div>
  
</form>
    </div><!--form container-->
        <br/>
    <!-- More Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>