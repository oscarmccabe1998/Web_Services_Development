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
        
        // Check if the user is already logged in, if yes then redirect him to welcome page
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: ../model/login.php");
            exit;
        }
        ?>
    <div class="form-container">
    <form action="../model/login.php" method="post">
  <div class="container">
    <h1>Log in</h1>
    <p>Please fill in this form to log in.</p>
    <hr>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>


    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>


    <hr>

    <button type="submit" class="registerbtn">Log in</button>
  </div>
  

</form>
    </div><!--form container-->
    </div><!--page container-->
        <!-- More Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>