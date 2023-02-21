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

        <p>
        At current, if any company or developer want to provide a service that makes use of data from outside sources, it’s very rarely free. The most common way to make use of outside data is by making use of APIs (Application Programming Interface). APIs allow for developers to get relevant and concise information relating to what they are implementing, such as local weather, maps, train times etc. The majority of services provide payment tears for developers wanting access to their data, while some are available at a standard fee and even fewer provide the data for free. <br/><br/>
        If we take the API services available from Google (Google, n.d.), which ranges from access to maps, image analysis (Google, n.d.) and payment gateways (Google, n.d.). All of these are paid for services (if we don’t consider any free trials). Some of the less demanding services, such as google maps, provide a payment configuration tool (Google, n.d.). This allows for estimates on the amount of traffic that will be sent to the API and provides pricing estimates (to a point, it will eventually tell you to “Contact Sales”). From this we can see that google charge for services based on the amount of traffic getting sent to their services. From this, developers can either choose a fixed rate for access to services which will charge extra if traffic exceeds expectation or opt for a pay-as-you-go model where you pay for what you use. <br/><br/>
        Other companies such as the BBC don’t charge for access to their APIs. This is due to the fact they receive payment from things like TV licences making any of the APIs available free to use. However, the APIs available from the BBC are substantially less demanding than the ones provided by Google. I imagine if the BBC produced more demanding APIs, they wouldn’t be free to use (BBC, n.d.). <br/><br/>
        Personally, if I were to monetise a service, I would follow a similar path to Google. Where if I was giving access to API’s I created, I would allow the users to purchase an API key and monitor the amount of traffic coming from that users account and bill them accordingly. This is due to the fact that paying for servers to handle large volumes of requests don’t come cheap. On the other hand, if I were maintaining a site that made use of external APIs, I would charge for access to the service via a subscription fee. <br/><br/>




        Google. (No Date) Google APIs Explorer. Available at: https://developers.google.com/apis-explorer (Accessed: 10 November 2022)
        <br/><br/>
        Google. (No Date) Vision AI. Available at:  https://cloud.google.com/vision (Accessed: 11 November 2022)
        <br/><br/>
        Google. (No Date) Pricing that scales to fit your needs. Available at: https://mapsplatform.google.com/pricing/?_gl=1*d8c4og*_ga*MjA0MTIwOTM5Ny4xNjY3ODMzNjA3*_ga_NRWSTWS78N*MTY3MDI0NjM4Ni4zLjAuMTY3MDI0NjM4Ny4wLjAuMA.. 
        (Accessed: 11 November 2022)
        <br/><br/>
        Google. (No Date) Seamless payments in your apps or websites. Available at: https://developers.google.com/pay/api (Accessed: 12 November 2022)

        BBC. (No Date) Developer. Available at: https://www.bbc.co.uk/developer/technology/apis.html (Accessed: 12 November 2022)





        </p>

        </div>
    </body>
</html>