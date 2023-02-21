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
  
  <div class="container signin">
    <p>Don't have an account? <a href="register-form.php">Sign up</a>.</p>
  </div>
</form>
    </div><!--form container-->
    </div><!--page container-->
        <!-- More Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
