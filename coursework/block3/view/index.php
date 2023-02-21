<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- local CSS -->
        <link rel="stylesheet" href="imp.css?v=2.0" />
        <title>CMP306 - Web Services Development Ecommerce site</title>
        <?php
    	
    error_reporting(2047); 
    ini_set("display_errors",1);
    $request = new stdClass();
    $request -> jsonrpc = "2.0" ;
    $request -> method = "getTemps" ;
    $request -> jid = "510572" ;
    $txt = json_encode($request) ;

    $url = "https://mayar.abertay.ac.uk/~1603127/cmp306/coursework/block3/model/index.php";
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
    //var_dump($response)
    $itemtxt = json_decode($response);
    $item = $itemtxt -> result;
    //var_dump($item);
    $dateLabel = [];
    $temp1array = [];
    $temp2array = [];
    for ($i = 0; $i < sizeof($item); $i++){
        $temps = $item[$i] -> state;
        $results = json_decode($temps);
        $date = $item[$i] -> dttm;
        $date = date("H:i:s",strtotime($date));
        //echo $date;
        for ($y = 0; $y < sizeof($results); $y++)
        {
            //echo $results[$y]->pin;
            if ($results[$y] -> pin == 8)
            {
                $temp1 = $results[$y] -> value;
                array_push($temp1array, $temp1);
            } else if ($results[$y] -> pin == 9)
            {
                $temp2 = $results[$y] -> value;
                array_push($temp2array, $temp2);
            }
            
            
        }
        array_push($dateLabel, $date);
        
        
    }
    $chartdateLabel = json_encode($dateLabel);
    $temp1data = json_encode($temp1array);
    $temp2data = json_encode($temp2array);

    	
    ?>

    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <body>
        
        <!-- container for the page -->
        <div class="container">
            <!-- page header -->
            <div id="header" class="card text-center">
                <img src="../image/title01.jpg"/>
                <div class="card-img-overlay">
                <h1 class="card-title">CMP306 Web Services Development - 2022-23</h1>
                <h2 class="card-title">Oscar McCabe - 1603127</h2>
                <h3>This site is part of an asignment</h3>
            </div>
        </div> <!-- End of page header -->
        <br/>
        <?php
            include("navbar.php");
        ?>
        <div class="row">

<div class="col-lg-6 col-md-4 col-sm-6">
        <div class="card">
        <div class="card-header">
        <p>Graph showing Temp Readings</p>
        </div>
        <div class="card-block">
        <canvas id="myChart" style="width:100%;max-width:500px"></canvas>
        </div>
        <div class="card-footer">
        </div>
        </div>
        </div>


<script>
var xValues = <?php echo $chartdateLabel;?>//[100,200,300,400,500,600,700,800,900,1000];

window.onload = new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: <?php echo $temp1data; echo",";?>//[860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    }, { 
      data: <?php echo $temp2data; echo",";?>//[1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>

<?php

    $request = new stdClass();
    $request -> jsonrpc = "2.0" ;
    $request -> method = "getLEDs" ;
    $request -> jid = "510572" ;
    $txt = json_encode($request) ;

    $url = "https://mayar.abertay.ac.uk/~1603127/cmp306/coursework/block3/model/index.php";
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
        $newitem = $item[$i] -> devicestate;
        $state = json_decode($newitem);
        for ($mark = 0; $mark<sizeof($state); $mark ++){
            if ($state[$mark] -> led == 'RED'){
                $rcurrent = $state[$mark] -> state;
            } else if ($state[$mark] -> led == 'GREEN'){
                $gcurrent = $state[$mark] -> state;
            }
        }
        $id = $item[$i] -> deviceid;
        for ($indexes = 0; $indexes < sizeof($state); $indexes ++){
            echo '<div class="col-lg-6 col-md-4 col-sm-6">' ;
            echo '<div class="card">' ;
            echo '<div class="card-header">' ;
            if ($state[$indexes] -> led == "RED")
            {
                echo"<p>Red LED </p>";
            } else if ($state[$indexes] -> led == "GREEN")
            {
                echo"<p>Green LED </p>";
            }
            echo '</div>' ;
            echo '<div class="card-block">' ;
            if ($state[$indexes] -> state == "OFF"){
                echo"<p>The LED is currently off    </p>";
                $status = 0;
                echo '<span class="dot"></span>';
            } else if ($state[$indexes] -> state == "ON"){
                echo"<p>The LED is currently on    </p>";
                $status = 1;
                if ($state[$indexes] -> led == "RED")
                {  
                    echo'<div class="red">';
                    echo '<span class="red" style="color:red;"></span>';
                    echo'</div>';
                } else if ($state[$indexes] -> led == "GREEN")
                {
                    echo'<div class="green">';
                    echo '<span class="green"></span>';
                    echo '</div>';
                }
                
            }
            echo '</div>' ;
            echo '<div class="card-footer">' ;
            if ($state[$indexes] -> led == "RED")
            {
                $pin = 5;
                echo '<a href="LEDcontroll.php?pin=',urlencode($pin),'&state=',urlencode($status),'&id=',urlencode($id),'&other=',urlencode($gcurrent),'" class="btn btn-primary">Turn the LED on or off</a>' ;
            } else if ($state[$indexes] -> led == "GREEN")
            {
                $pin = 7;
                echo '<a href="LEDcontroll.php?pin=',urlencode($pin),'&state=',urlencode($status),'&id=',urlencode($id),'&other=',urlencode($rcurrent),'" class="btn btn-primary">Turn the LED on or off</a>' ;
            }
           
            echo '</div>' ;
            echo '</div>' ;
            echo '</div>' ;
           
        }
        
    }
    

    $request = new stdClass();
    $request -> jsonrpc = "2.0" ;
    $request -> method = "getLatestTemp" ;
    $request -> jid = "510572" ;
    $txt = json_encode($request) ;

    $url = "https://mayar.abertay.ac.uk/~1603127/cmp306/coursework/block3/model/index.php";
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
    $item = $itemtxt -> result;
    for ($i = 0; $i < sizeof($item); $i++){
        $temps = $item[$i] -> state;
        $results = json_decode($temps);
        $date = $item[$i] -> dttm;
        $date = date("d/m/Y H:i:s",strtotime($date));
        //$date = date_format(strtotime($date),"Y/m/d H:i:s");
        for ($x = 0; $x<sizeof($results); $x++){

            if  ($results[$x] -> pin == 8)
            {
                $temp1 = $results[$x] -> value;
            } else if ($results[$x] -> pin == 7)
            {
                $temp2 = $results[$x] -> value;
            }

        }

        echo '<div class="col-lg-6 col-md-4 col-sm-6">' ;
        echo '<div class="card">' ;
        echo '<div class="card-header">' ;
        echo '<p>Latest Temp Readings</p>';
        echo '</div>' ;
        echo '<div class="card-block">' ;
        echo "<p>Sensor 1 = '".$temp1."'</p>";
        echo "<p>Sensor 2 = '".$temp2."'</p>";
        echo '</div>' ;
        echo '<div class="card-footer">' ;
        echo "<p>Reading taken at '".$date."'</p>";
        echo '</div>' ;
        echo '</div>' ;
        echo '</div>' ;

    }

?>

 </div><!--products container-->
    </div><!--page container-->
    <!-- More Bootstrap -->
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    <script>
                setTimeout(() => {
        document.location.reload();
        }, 30000);

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>