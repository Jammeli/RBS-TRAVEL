<!DOCTYPE html>
<html lang="en">

<?php include("connexion.php");?>
<head><title>RBS Travel</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONT CSS-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link type="text/css" rel="stylesheet" href="assets/font/font-icon/font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="assets/font/font-icon/font-flaticon/flaticon.css">
    <!-- LIBRARY CSS-->
    <link type="text/css" rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/animate/animate.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/slick-slider/slick.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/slick-slider/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/selectbox/css/jquery.selectbox.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/please-wait/please-wait.css">
    <!-- STYLE CSS-->
    <link type="text/css" rel="stylesheet" href="assets/css/layout.css">
    <link type="text/css" rel="stylesheet" href="assets/css/components.css">
    <link type="text/css" rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
<div class="body-wrapper"><!-- MENU MOBILE-->
    <?php include("header_responsive.php");?>
    <!-- WRAPPER CONTENT-->
    <div class="wrapper-content"><!-- HEADER-->
            <?php include("header.php");?>

        <!-- WRAPPER-->
        <div id="wrapper-content"><!-- MAIN CONTENT-->
            <div class="main-content">
                <section class="page-banner homepage-04" >
                    <div class="homepage-hero-module">
                        <div class="video-container">
                            <div class="filter">
                                <video autoplay=1 loop controls muted="muted" class="video-embed fillWidth">
                                    <source src="assets/images/bg-video/mp4/mountain_converted.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="homepage-banner-warpper" style="padding-left:50px;padding-right:50px; ">
                        <div class="homepage-banner-content">
                         <!--   <div class="bg-image"><img src="assets/images/background/homepage-04-banner.jpg" alt="" class="img-responsive"></div>-->                            <div class="group-logo"><img src="assets/images/logo/logo.png" alt="" class="img-logo"></div>
                            

                               
                                                <?php include("recherche.php");?>

                                
                                
                      
                        </div>
                    </div>
                </section>
                <?php include("index_voyage.php");?>
                <?php include("index_promo_hotel.php");?>
                             <?php include("index_tourisme.php");?>

                
                
                
                  <?php include("index_services.php");?> 
                
                
                
                
                
                
            </div>
            <!-- BUTTON BACK TO TOP-->
            <div id="back-top"><a href="#top" class="link"><i class="fa fa-angle-double-up"></i></a></div>
        </div>
        <!-- FOOTER-->
            <?php include("footer.php");?>

    </div>
</div>


<!-- LIBRARY JS-->
<script src="assets/libs/jquery/jquery-2.2.3.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/libs/detect-browser/browser.js"></script>
<script src="assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
<script src="assets/libs/wow-js/wow.min.js"></script>
<script src="assets/libs/slick-slider/slick.min.js"></script>
<script src="assets/libs/selectbox/js/jquery.selectbox-0.2.js"></script>
<script src="assets/libs/please-wait/please-wait.min.js"></script>
<!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")--><!-- MAIN JS-->
<script src="assets/js/main.js"></script>
<!-- LOADING JS FOR PAGE-->
<script src="assets/js/pages/home-page.js"></script>
<script src="assets/libs/background-video/video-bg.js"></script>
<script src="assets/libs/parallax/TweenMax.min.js"></script>
<script src="assets/libs/parallax/jquery-parallax.js"></script>



<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
<script src="assets/libs/plus-minus-input/plus-minus-input.js"></script>
<script src="assets/js/pages/sidebar.js"></script>
<script src="assets/js/pages/result.js"></script>


</body>

</html>