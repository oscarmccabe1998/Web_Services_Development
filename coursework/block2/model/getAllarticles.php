<?php
	//  PHP to get all the employees 
	//  URL of the web service
	include("location.php") ;
	$url = $location ;
	echo $url ;
	echo "<br/><br/>" ;
	
	//  set up the CURL
	$curl = curl_init($url) ;
  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                     
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                                                                                           
  	$resp = curl_exec($curl) ;

  	//  Output the results
  	if (!$resp) {die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); }
  	curl_close($curl) ;	
	echo $resp;
  	
  	$articles = simplexml_load_string($resp) ;
  	$article = $articles -> article ;
  	echo $article;
  	$n = sizeof($article) ;
  	echo "There are ".$n." articles<br/>" ;
  	for ($i=0; $i<$n; $i++) {
  		echo $article[$i]->id." " ;
  		echo $article[$i]->headline." " ;
  		  	echo $article[$i]->story." " ;
  		echo $article[$i]->link ;
  		echo "<br/>" ;
  	}
?>
