<?php
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
if ($detect->isMobile() === true || $detect->isTablet()) {
    header("Location: m.php"); //TODO: uncomment this file to rediect to download app page.
}
?>
<!DOCTYPE html>

<html lang="en" style="overflow-x: visible;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>Bhaktinow: Home Page</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width">

        <!-- Style Sheets -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <!-- Font Icons -->
        <!-- 	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/socicon-styles.css">	
        <!-- Font Icons -->
        <link rel="stylesheet" href="assets/css/hover-min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/css-menu.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/loader.css">

        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Sans" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <!-- Scripts -->
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery-1.12.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="assets/js/css-menu.js"></script>
        <script src="assets/js/jquery.validate.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/custom.js"></script>	
        <script src="assets/js/slim-scroll.js"></script>
        <link rel='stylesheet prefetch' href='//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>
        <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
		
    </head>
    <body class="malabar_theme">

        <!-- Loader -->
        <div id="loader-container1" style="display: none; position: fixed;">
            <div id="loader" style="position: fixed;">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <!-- Loader -->

        <div id="wrapper">
            <div id="main-content">
