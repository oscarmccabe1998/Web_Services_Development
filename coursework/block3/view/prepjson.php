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
        $time = date("H:i:s",strtotime($date));
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
        array_push($dateLabel, $time);
        
        
    }
    //print_r($dateLabel);
    print_r($temp1array);
    $chartdateLabel = json_encode($dateLabel);
    $temp1data = json_encode($temp1array);
    $temp2data = json_encode($temp2array);
        /*echo $date;
        echo " ";
        echo $temp1;
        echo " ";
        echo $temp2;
        echo " ";*/
        //echo "['".$date."', '".$temp1."', '".$temp2."'],";
        //$input_array = Array($date, $temp1, $temp2);
        //$result = array_map("floatval", $input_array);
        //echo($result);
    	
    ?>
    <!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:1500px"></canvas>

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

</body>
</html>


   