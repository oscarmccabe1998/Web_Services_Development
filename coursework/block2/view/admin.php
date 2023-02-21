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
        </div>
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
	//  PHP to get all the employees 
	//  URL of the web service
	include("../model/location.php") ;
	$url = $location ;
	//echo $url ;
	echo "<br/><br/>" ;
	
	//  set up the CURL
	$curl = curl_init($url) ;
  	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");                                                                                                                                     
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                                                                                           
  	$resp = curl_exec($curl) ;

  	//  Output the results
  	if (!$resp) {die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); }
  	curl_close($curl) ;	
	//echo $resp;
  	
  	$articles = simplexml_load_string($resp) ;
  	$article = $articles -> article ;
      //echo '<div class="row">' ;
  	//echo $article;
  	$n = sizeof($article) ;
  	//echo "There are ".$n." articles<br/>" ;
      echo '<div class="row">' ;
  	for ($i=0; $i<$n; $i++) {
        echo '<div class="col-sm-4">';
        echo '<div class="card">';
        echo '<div class="card-header">';
  		echo $article[$i]->id." " ;
  		echo $article[$i]->headline." " ;
        echo '</div>';
        echo '<div class="card-body">';
  		  	echo $article[$i]->story." " ;
  		echo $article[$i]->link ;
        echo '</div>';
        echo '<div class="form-container">';
        echo '<form action="../model/DeleteArticle.php" method="get">';
        echo'<input type="hidden" name="id" value='.$article[$i]->id.' />';
        echo '<button type="submit" class="registerbtn">Delete Article</button>';
        echo '</form>';
        echo '</div>';
        echo '<div class="form-container">';
        echo '<form action="../model/UpdateArticle.php" method="get">';
        echo '<div class="container">';
        echo'<input type="hidden" name="id" value='.$article[$i]->id.' />';
        echo '<label for="headline"><b>Headline</b></label>';
        echo '<input type="text" placeholder="Enter Headline" name="headline" id="headline" value="'.$article[$i]->headline.'" required>';
        echo '<label for="story"><b>Story</b></label>';
        echo '<input type="text" placeholder="Enter story" name="story" id="story" value="'.$article[$i]->story.'" required>';
        echo '<label for="link"><b>Link</b></label>';
        echo '<input type="text" placeholder="Enter Story URL" name="link" id="link" value='.$article[$i]->link.' required>';
        echo '<button type="submit" class="registerbtn">Update Article</button>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
  		//echo "<br/>" ;
  	}
?>
        <br/>
        <div class="col-sm-4">
        <div class="card">
        <div class="card-header">Add Article</div>
        <div class="card-body">
        <div class="form-container">
        <form action="../model/addArticle.php" method="post">
        <div class="container">
        <p>Please fill in this form to add an article.</p>
        <hr>


        <label for="headline"><b>Headline</b></label>
        <input type="text" placeholder="Enter Headline" name="headline" id="headline" required>

        <label for="story"><b>Story</b></label>
        <input type="text" placeholder="Enter story" name="story" id="story" required>

        <label for="link"><b>Link</b></label>
        <input type="text" placeholder="Enter Story URL" name="link" id="link" required>


        <hr>

        <button type="submit" class="registerbtn">Add Article</button>
    </div>
    

    </form>
        </div>

        <div class="card-footer">Inserst new story to db</div>
        </div>
        <br/>
        </div>
</div>

</div>
</div>

    </body>
</html>