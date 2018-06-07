<?php
    session_start();
    session_unset();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="css/tether.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Meal Ticketing System</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="padding:0;">
                <img src="images/IMG-20180309-WA0002.jpg" alt="Amala with Egusi Soup" title="Welcome to Iya Moriya" style="width:100%;">
                <div class="content text-center">
                    <p>Welcome to Iya Moriya</p>
                    <p>Meal Ticketing System</p>
                    <a class="order" href="Views/orders.php" style="padding-right: 8px; padding-left: 8px;">Place Your Order Today!</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding:0;">
                <img src="images/IMG-20180309-WA0000.jpg" alt="Chicken" title="About Us" style="width:100%;">
                <div class="row content text-center about" id="ab">
                    <p class="col-sm-6 about" id="center">About Us</p>
                    <p class="col-sm-6 about" id="mon">We prepare the best Nigerian dishes on campus. Just ask anyone!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding:0;">
                <img src="images/IMG-20180309-WA0001.jpg" alt="Contact Us" title="Contact Us" style="width:100%;">
                <div class="content text-center about pl">
                    <p id="place">Place your order, pay online, get a meal ticket and come to pick up your food without having to worry about change or whether your favourite dish is out of stock!</p>
                    <a class="order" href="Views/orders.php" style="padding-right: 8px; padding-left: 8px;">Place Your Order Today!</a>
                </div>
            </div>
        </div>
    </div>
    <section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-8" style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">

        <div class="container">
            <div class="row">
                <div class="mbr-footer-content col-xs-12 col-md-3">
                    <div><img src="assets/images/logo.png"></div>
                </div>
                <div class="mbr-footer-content col-xs-12 col-md-3">
                    <p><strong>Address</strong><br> Distance Learning Institute<br> Beside Lecture Theatre, Unilag, Akoka</p>
                </div>
                <div class="mbr-footer-content col-xs-12 col-md-3">
                    <p><strong>Contacts</strong><br> Email: support@iyamoriya.com<br> Phone: +234 803 9572 957<br></p>
                </div>
                <div class="mbr-footer-content col-xs-12 col-md-3">
                    <p><strong>Links</strong><br>
                        <a class="text-primary" href="index.php">Home</a><br>
                        <a class="text-primary" href="Views/orders.php">Order Here</a><br>
                </div>

            </div>
        </div>
    </section>

</body>

</html>