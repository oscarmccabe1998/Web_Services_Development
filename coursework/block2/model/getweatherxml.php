<?php //  function to get the weather- cached
function getWeatherXML() {
	$api = "apiKey" ;
  	$url = "https://api.openweathermap.org/data/2.5/weather?q=Glasgow&appid=".$api."&mode=xml" ;
	$cache_file = "../model/glasgow-weather.xml" ;
		
	// cache file for 5 mins
	if (filemtime($cache_file) > (time() - 60 * 5 )) {
		$xml = simplexml_load_file($cache_file);
	} else {
		 $file = file_get_contents($url);
		 file_put_contents($cache_file, $file, LOCK_EX);
		 $xml = simplexml_load_string($file) ; 
	}
		
	return $xml ;
}
?>