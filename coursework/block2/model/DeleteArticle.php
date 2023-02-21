<?php
    	include("navbar.php");
        session_start();
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login_form.php");
    
            echo"test";
            exit;
            echo ($_SESSION["userauth"]);
            }
                $id = $_GET["id"] ;
                $userid = $_SESSION["id"];
                echo $id;
                $apikey = "123APIKEY";
                include("location.php") ;
                $url = $location.'?id='.$id.'&apikey='.$apikey.'&userid='.$userid ;
                echo $url ;
                echo "<br/><br/>" ;
                
                //  set up the CURL
                $curl = curl_init($url) ;
                  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");                                                                                                                                  
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                                                                                                         
                  $resp = curl_exec($curl) ;
                  
                  if (!$resp) 
                  {
                      die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); 
                  }
                  else 
                  {
                      echo $resp ;
                      header("Location: ../view/admin.php");
                  }
                  curl_close($curl) ;
            
    	?>