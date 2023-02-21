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
    ?>
        <br/>
            <p>

            At this point in time there are many different payment gateways available for developers. Looking into the payment gateway “Stripe” they have incorporated many features and tools to help aid and speed up development. Some of these features include the use of CLI tools, testing tools to simulate payments and test integration and “No code options.” All these features have been made available with the purpose of making development easier in order to draw more people to the platform. <br/><br/>
            One of the key features available from the Stripe is the use the CLI (command line interface) tool. This allows developers to “build, test, and manage your integration with Stripe directly from the command line.” (stripe.com, n.d.)With this feature developers can implement CRUD (Create, Update, Retrieve and Delete) operations to Stripe resources while in test mode. The CLI tool also provides the ability to “Stream real-time API requests and events happening in your account” to allow monitoring of the current system (stripe.com, n.d.). This essentially means that developers can unit test the system and also monitor payment requests once the features have been rolled out to production. <br/><br/>
            During the testing stage of development. The Stripe service also allows for the use of test cards. This is where any string of the correct length will be classed as a valid card number, any future date is classed as a correct expiry date and any three-digit number is taken as a correct CVC. The service also provides test code to allow integration testing. 
            This allows for testing without the use of sensitive information such as a user’s card details. By the testing features allowing any data to be entered into the input fields this also allows for testing without the need for any of the user’s personal information (stripe.com, n.d.). <br/><br/>
            The final feature provided by Stripe is the use of “No-Code options.” This is where developers can use pre-made code from the Stripe service. This would allow developers to cut down on development time and leave all the security concerns to Stipe themselves. This is due to the fact that stipe provides payment portals for the customer to enter data. Obviously, this would aid in the security aspect of development as the development team don’t need to concern themselves with the security aspect of the card payment system. This also cuts down on development time as the developers don’t need to create the login forms or systems as Stripe have already provided all code required (stripe.com, n.d.). <br/><br/>
            <br/><br/>
            Stripe. (No Date) Get started with the Stripe CLI. Available at: https://stripe.com/docs/stripe-cli (Accessed: 29 October 2022)
            <br/><br/>
            Stripe. (No Date) No-code options for using Stripe. Available at: https://stripe.com/docs/no-code (Accessed: 30 October 2022)
            <br/><br/>
            Stripe. (No Date) Testing. Available at: https://stripe.com/docs/testing?testing-method=tokens (Accessed: 30 October 2022)


</p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>