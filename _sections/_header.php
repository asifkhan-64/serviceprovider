<?php

    include './Admin/_stream/config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Service Provider</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="./images/bg_1.jpg">
    
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script>
        $(function(){
            var current = location.pathname;
            $('#navId .nav-item .nav-link').each(function(){
                var $this = $(this);
                if($this.attr('href').indexOf(current) !== -1){
                    $this.removeClass('nav-link');
                    $this.addClass('nav-link active');
                    // console.log("Here")
                }
            })
        })
    </script>

<style>
    html {
        scroll-behavior: smooth;
    }

    .btnClass {
        width: 48%;
    }



    .navClassCustom {
        background-color: black !important;
        margin-top: -23px;
        padding-top: 25px;
        /* padding: 10px 0px; */
    }

    .loginForm {
        padding-top: 30%;
    }

    @media only screen and (max-width: 425px) {
        .loginForm {
            padding-top: 80%;
        }

        .btnClass {
            width: 100%;
        }
    }

    @media only screen and (max-width: 1024px) {
        .loginForm {
            padding-top: 40%;
        }

        .btnClass {
            width: 100%;
        }
    }

    

   
</style>
    
</head>


<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light navClassCustom" id="ftco-navbar nav">
    <div class="container">
        <a class="navbar-brand" href="index.php">Service<span> Provider</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto" id="navId">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                <!-- <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li> -->
                <li class="nav-item"><a href="car.php" class="nav-link">Our Fleet</a></li>
                <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link"> Login <i class="fa fa-sign-in"></i> </a></li>
            </ul>
        </div>
    </div>
</nav>