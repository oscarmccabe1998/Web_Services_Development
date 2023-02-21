<?php
    	include("navbar.php");
        session_start();
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: login_form.php");
    
            echo"test";
            exit;
            echo ($_SESSION["userauth"]);
            }
            $userid = $_SESSION["id"];
            $apikey = "123APIKEY";
            $headline = $_GET["headline"] ;
            $story = $_GET["story"];
            $link = $_GET["link"];
            $id = $_GET["id"] ;
            include("location.php") ;
            $url = $location.'?id='.$id ;
            echo $url ;
            echo "<br/><br/>" ;
            
            //  create data in XML format
            $data = '<article>' ;
            $data = $data.'<userid>'.$userid.'</userid>';
            $data = $data.'<apikey>'.$apikey.'</apikey>';
            $data = $data.'<article_headline>'.$headline.'</article_headline>' ;
            $data = $data.'<article_body>'.$story.'</article_body>' ;
            $data = $data.'<article_link>'.$link.'</article_link>' ;
            $data = $data.'</article>' ;
            echo $data ;
            
            //  set up the Curl
            $curl = curl_init($url) ;
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");                                                                     
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
                header("Location: ../view/admin.php");
            }
            curl_close($curl) ;	

?>