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
                <h2 class="card-title">Oscar McCabe - 1603127</h2>
            </div>
        </div><!-- Header  row -->
		<?php
    	include("navbar.php");
    	?>
        <br/><!--simple way to get some space -->     

  	    <?php 
  	    	//  connect to the live URL

  		      //$url = "https://api.openweathermap.org/data/2.5/weather?q=Glasgow&appid=".$api."&mode=xml" ;
  		    //  Or for testing use the local data
  		    //$url = "../model/glasgow-weather.xml" ;
  		    
  		    //$xmltxt = file_get_contents($url) ; 
		    //$xml = simplexml_load_string($xmltxt)  ;
		    
		    //  use the function to cache the data
			 include("../model/getweatherxml.php") ;
			 $xml = getweatherXML() ;
			
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
			echo '<br/>';
		    echo '</div>' ;
		    echo '</div>' ;

            //echo '</div>' ;
	    ?>
<!--<div class="row">-->
<div class="col-sm-4">
<div class="card">
<div class="card-header">Map of Glasgow</div>
<div class="card-body">

        <div class="card-header"><div id="googleMap" style="width:100%;height:400px;"></div>

        <script>
        function myMap() {
        var mapProp= {
        center:new google.maps.LatLng(55.8554602,-4.2324586),
        zoom:10,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=apiKey"></script>
    </div>
    </div>
    </div>
    <div class="card-footer">Data &#169;googlemaps.com</div>
	<br/>
	</div>

<div class="col-sm-4">
<div class="card">
<div class="card-header">Link to RSS Feed</div>
<div class="card-body">

<a href="https://mayar.abertay.ac.uk/~1603127/cmp306/ws/block2/article">Click here to Visit the RSS Feed</a>
    </div>
    </div>

    <div class="card-footer">Data &#169;1603127</div>
	<br/>
	</div>


		<?php 
  		$url = "http://feeds.bbci.co.uk/news/scotland/glasgow_and_west/rss.xml" ;
  		$xml = new DOMDocument() ;
  		$xml->load($url) ;
  		 //var_dump($xml) ;
  		$xsl = new DOMDocument() ;
  		$xsl->load("../xsl/rss.xsl") ;
  		//var_dump($xsl) ;
  		$proc = new XSLTProcessor() ;
  		$proc -> importStyleSheet($xsl) ;
  		$result = $proc -> transformtoXML($xml) ;
  		 //echo $result ;
		// echo "<br/><br/>" ;
		echo $result ;

	?>

	<?php
		include("../model/location.php") ;
		$url = $location ;

	$xml = new DOMDocument();
	$xml->load($url);
	$xsl = new DOMDocument() ;
	$xsl->load("../xsl/myrss.xsl") ;
	//var_dump($xml) ;
	$proc = new XSLTProcessor() ;
	$proc -> importStyleSheet($xsl) ;
	$result = $proc -> transformtoXML($xml) ;
	 //echo $result ;
  // echo "<br/><br/>" ;
  echo $result ;

	?>
    </div>
    </body>
</html>