<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- local CSS -->
        <link rel="stylesheet" href="imp.css?v=2.0" />
        <title>CMP306 - Web Services Development Ecommerce site</title>
        </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <body>
        <!-- container for the page -->
        <div class="container">
            <!-- page header -->
            <div id="header" class="card text-center">
                <img src="../image/title01.jpg"/>
                <div class="card-img-overlay">
                <h1 class="card-title">CMP306 Web Services Development - 2022-23</h1>
                <h2 class="card-title">Oscar McCabe - 1603127</h2>
                <h3>This site is part of an asignment</h3>
            </div>
        </div> <!-- End of page header -->
        <?php
    	include("navbar.php");
    	?>
        <br/>
            <p>

            For block three of this class, we were asked to develop a simple IOT (Internet of Things) system that 1) records temperature information from the two on-board sensors and displays the recorded information within a webpage and 2) allows the end user to control two LEDs from the web application. For block three we were only asked to develop the system to operate for one user, on one device. In a real-world implementation there would be multiple users using the system with multiple devices linked to each user. We were encouraged to use a MySQL database to store the recorded information of the sensors and the state of the LEDs. <br/><br/>
            The key issue when using SQL within an IOT service is with scalability. If we were to scale our coursework to support multiple devices with multiple users with SQL as it is currently designed. As more devices and users that get added to the services would need more dedicated tables within the database. For example, if we were asked to link each device to a user. We would need a table for the state of each device (the LEDs), a table that stores the recorded data (the temperatures) and then create linking tables for each user and their devices. As you can probably imagine this gets big and messy very quickly taking up larger amounts of storage. <br/></br>
            If we were to use a NoSQL database instead to scale our application such as Firebase the issue of scalability is easier to deal with. Because more servers can just be brought in to deal with increased traffic and amount of data (Gupta, 2014). Whereas with SQL databases the common answer is to upgrade the hardware the database is held on. This is made possible by the fact SQL databases are relational and are built using tables. NoSQL databases Document based and usually store information in something like JSON where the lack of structure allows for quicker and easier data entry. <br/><br/>
            NoSQL database structures allow for a more efficient way of storing “key <-> value” data. As previously mentioned, NoSQL is not structured which allows for easier data entry. This is a result of not having individual tables taking up space. Since NoSQL doesn’t need to rely on “JOINS” to collect related information from elsewhere it can usually provide a faster service. Since NoSQL services are similarly structured to JSON it makes the job of linking data much easier.
            <br/>
            <br/>
            Gupta, S.(2014) Why NoSQL Scales better than SQL. Available at: https://blog.devgenius.io/why-nosql-scales-better-than-sql-eb0b46b4aac5 (Accessed: 29 November 2022)

            <br/>
            <br/>
            <img src="https://miro.medium.com/max/5298/1*n4QYyJGFjooo8xgze8qNIQ.png" alt="SQL vs NoSQL" style="width:1200px;height:600px;">
</p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>