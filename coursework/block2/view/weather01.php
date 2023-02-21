<!DOCTYPE html> 
<html>
    <head>  
        <meta charset="utf-8">
	    <title>CMP306 Web Services Development - 2022-23</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	
	   	<!-- The site uses Bootstrap v5 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
		
    </head>

    <body>
  	    <!-- overall container for page -->
        <div class="container">

        <!-- header row -->
        <div id="header" class="card text-center">
            <img src="../image/title01.jpg" />
            <div class="card-img-overlay">
                <h1 class="card-title">CMP306Web Services Development - 2022-23</h1>
                <h2 class="card-title">Dr Geoffrey Lund - g510572</h2>
            </div>
        </div><!-- Header  row -->

        <br/><!--simple way to get some space -->     

  	    <?php 
  	    	//  connect to the live URL
              //$api = "bc6bf85a0eeebc789f5b2d626ca23c2a" ;
  		      //$url = "https://api.openweathermap.org/data/2.5/weather?q=Glasgow&appid=".$api."&mode=xml" ;
  		    //  Or for testing use the local data
  		    $url = "../model/glasgow-weather.xml" ;
  		    
  		    $xmltxt = file_get_contents($url) ; 
		    $xml = simplexml_load_string($xmltxt)  ;
		    
		    //  use the function to cache the data
			// include("../model/getweatherxml.php") ;
			// $xml = getweatherXML() ;
			
		    //var_dump($xml) ;
            echo '<div class="row">' ;
		
		    echo '<div class="col-sm-4">' ;
		    echo '<div class="card">' ;
		    echo '<div class="card-header">'.$xml ->  city["name"].'</div>' ;
		    echo '<div class="card-body">' ;
		    echo 'Update :'.$xml -> lastupdate["value"]."<br/>" ;
		    echo 'Sunrise :'.$xml -> city -> sun["rise"]."<br/>" ;
		    echo 'Sunset :'.$xml -> city -> sun["set"]."<br/>" ;
		    echo '<br/>' ;
		    echo 'Current Weather: <br/>' ;
		    $temperature = $xml -> temperature["value"] - 273 ;
		    echo 'temperature : '.$temperature."<br/>" ;
		    $wind = $xml -> wind ;
		    $speed = round($wind -> speed["value"] * 3.6) ;
		    echo 'wind : '.$wind -> speed["name"].' '.$speed.'kph '.$wind -> direction["code"].'<br/>' ;
		    echo '</div>' ;
		    echo '<div class="card-footer">Data &#169;openweathermap.org</div>' ;
		    echo '</div>' ;
		    echo '</div>' ;

            echo '</div>' ;
	    ?>
	    </div>

    </body>
</html>