<?php
session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login_form.php");

        echo"test";
        exit;
        echo ($_SESSION["userauth"]);
        }

        if ($_SESSION["userauth"] == 1){
            echo "<p>Admin</p>";
        } elseif ($_SESSION["userauth"] == 0){
            header("Location: ../index.php");}

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $userid = $_SESSION["id"];
                $headline = $_POST["headline"];
                $story = $_POST["story"];
                $link = $_POST["link"];
                $apikey = "123APIKEY";
                echo $headline;
                echo $story;
                echo $link;
                include("location.php") ;
                $url = $location ;
                echo $url ;
                echo "<br/><br/>" ;
                
                //  create data in XML format
                $data = '<article>' ;
                $data = $data.'<apikey>'.$apikey.'</apikey>';
                $data = $data.'<userid>'.$userid.'</userid>';
                $data = $data.'<article_headline>'.$headline.'</article_headline>' ;
                $data = $data.'<article_body>'.$story.'</article_body>' ;
                $data = $data.'<article_link>'.$link.'</article_link>' ;
                $data = $data.'</article>' ;
                echo $data ;
                echo "<br/><br>" ;
                
                //  set up the curl
                $curl = curl_init($url) ;
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                                                                  
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                                      
                curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
                    'Content-Type: text/xml',                                                                                
                    'Content-Length: ' . strlen($data))                                                                       
                );                 
                  $resp = curl_exec($curl) ;
                  
                  if (!$resp) 
                  {
                      die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); 
                  }
                  else 
                  {
                      echo $resp ;
                  }
                  curl_close($curl) ;	
                  header("Location: ../view/admin.php");    
            }
?>