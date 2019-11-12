<!DOCTYPE html>
<html lang="en">

            <?php include("connexion.php");?>
<head><title>RBS Travel </title>
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
                <section class="page-banner about-us-page">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">Demande envoyée</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">Demande envoyée</h2></div>
                        </div>
                    </div>
                </section>
                <section class="about-us layout-2 padding-top padding-bottom about-us-4">
                    <div class="container">
                        <div class="row">
                            <div class="wrapper-contact-style">
                                <div class="col-lg-6 col-md-8"><h3 class="title-style-2">Demande envoyée</h3>

                                    <div class="about-us-wrapper">
                   <?php if($_GET['page']=="mdp"){?>                  
<p class="text">
Votre demande à été bien envoyée, vous recevez un email de récuperation de mot de passe.</p>
    <p class="text"><a > Consultez votre email</a></p>
    
    
    <?php }else if($_GET['page']=="inscription") {?>                     
<p class="text">
Inscription réussite,  vous recevez un email de confirmation  sur votre email.</p>
    
    
    <?php }else if($_GET['page']=="contact") {?>                     
<p class="text">
Votre message à été bien envoyée, vous recevez une reponse le plus tôt possible.</p>
    <p class="text"><a > Consultez votre email</a></p>
    
    <?php }
	else {?>                  
<p class="text">
Merci pour votre demande. Votre commande à été bien envoyée, vous recevez un email de confirmation ou bien un appel téléphonique de notre part.</p>
    <p class="text"><a href="espace_client.html"> Consultez votre compte</a></p>
    
    
    <?php }?>
                                     

                                        
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                
              
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
<script src="assets/js/pages/about-us.js"></script>
</body>

<!-- Mirrored from swlabs.co/exploore/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jul 2016 14:56:22 GMT -->
</html>