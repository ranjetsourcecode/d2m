<?php 
    // include 'config.php';

    $utm_source = (isset($_GET['utm_source']) ? $_GET['utm_source'] : '');
    $utm_medium = (isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '');
    $utm_term = (isset($_GET['utm_term']) ? $_GET['utm_term'] : '');
    $utm_content = (isset($_GET['utm_content']) ? $_GET['utm_content'] : '');
    $utm_campaign = (isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '');
    $pageUrl = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>D2M</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <!-- <meta name="google-site-verification" content="xjUlEfEvBzxXcw4GRgqP7fcgGzFSZiPFYX8qWdUV5T8" /> -->
    <link rel="shortcut icon" href="assets/images/fav-icon.png">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png"/>

    <!-- Stylesheets
    ================================================== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/animate.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/magnific-popup.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/ohsnap.css"> -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body class="page">

    <div class="wrapper">
        <div class="header clearfix">            
            <div class="header-top">
                <div id="brand">
                    <a href="./">
                        <img src="assets/images/logo.png" alt="" title="">
                    </a>
                </div>
                <div class="contact-now">
                    <p>Contact us</p>
                    <a href="tel:9016118369"><img src="assets/images/phone-call.png" alt="">+91 9016118369</a>
                    <a href="mailto:Support@d2m.ooo"><img src="assets/images/email.png" class="email-img" alt="">Support@d2m.ooo</a>
                </div>
            </div>
        </div>
        <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3><span>One stop solution</span>for all vehicle needs, services delivered right to your doorstep</h3>
                    <p class="sub-title">Download D2M App</p>
                    <div class="download-app">
                        <a href="#"><img src="assets/images/app-store-google.svg" alt=""></a>
                        <a href="#"><img src="assets/images/app-store-apple.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-md-7">
                    <video width="320" height="240" autoplay="" loop="" muted=""> <source src="assets/images/video.mp4" type="video/mp4"> </video>
                </div>
            </div>
        </div>
        </div> <!-- ./ content -->
    </div> <!-- ./ wrapper -->
    
<div id="ohsnap"></div>
    <!-- scripts works here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/magnific-popup.js"></script> -->
    <!-- <script src="assets/js/owl.carousel.min.js"></script> -->
    <!-- <script src="assets/js/ohsnap.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->

    <!-- <script src="assets/js/main.js"></script> -->
</body>

</html>
