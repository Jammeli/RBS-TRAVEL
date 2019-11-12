<!DOCTYPE html>
<html lang="en">

<?php include("connexion.php");


if(isset($_POST['loginclientA']))
				
{
	


	
		$nom=$_POST['nom'];
		$mail=$_POST['email'];
		$message=$_POST['message'];
		$from='contact@rbstravel.com.tn';
		$to='contact@rbstravel.com.tn';

		$subject = "web contact  de ".$nom;
						
						  $message = '
  
       
	   '.$message.'

     
     ';
			 $headers = 'From: '.$nom.' <'.$mail.'>' . "\r\n" .
                    'Reply-To:'.$mail. "\r\n Content-Type:\"text/html\"; charset=\"iso-8859-1\"\r\n"."X-Mailer: PHP/" . phpversion();
					
							
						$additionalparam = "-t " . $from;
						
						
								if(mail($to, $subject, $message, $headers, $additionalparam)){
										        ?><script>document.location.href='demande_contact_reussite.html ';</script><?php
												
								}

				
	
	
		
}

?>
<head><title>RBS | Contact</title>
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
                <section class="page-banner contact-page" style="background-image:url(assets/images/background/contact.png);">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">contact</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">contact</h2></div>
                        </div>
                    </div>
                </section>
                
                <section class="contact style-1 page-contact-form padding-top padding-bottom">
                    <div class="container">
                        <div class="wrapper-contact-form">
                            <div data-wow-delay="0.5s" class="contact-wrapper wow fadeInLeft">
                                <div class="contact-box"><h5 class="title">CONTACTEZ-NOUS</h5>


                                    <form class="contact-form" method="post">
                                    <input type="text" name="nom" placeholder="Nom" class="form-control form-input">
                                    <!--label.control-label.form-label.warning-label(for="") Warning for the above !-->
                                    <input type="email"  name="email"placeholder="Email" class="form-control form-input">
                                    <!--label.control-label.form-label.warning-label(for="") Warning for the above !-->
                                    <textarea  name="message" placeholder="Message" class="form-control form-input"></textarea>

                                        <div class="contact-submit">
                                            <button name="loginclientA" type="submit" data-hover="Envoyer" class="btn btn-slide"><span class="text">Envoyer </span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div data-wow-delay="0.5s" class="wrapper-form-images wow fadeInRight"><img src="assets/images/background/bg-banner-contact-form.jpg" alt="" class="img-responsive"></div>
                        </div>
                    </div>
                </section>
                <section class="page-contact-map">
                    <div class="map-block">
                        <div class="wrapper-info">
                        
                            <div class="map-info"><h3 class="title-style-2">CONTACT</h3>

                                <p class="address"><i class="fa fa-map-marker"></i> <?php echo $restotparametres['adresse'];?></p>

                                <p class="phone"><i class="fa fa-phone"></i> <?php echo $restotparametres['tel'];?></p>

                                <p class="mail"><a href="mailto:<?php echo $restotparametres['email'];?>"> <i class="fa fa-envelope-o"></i><?php echo $restotparametres['email'];?></a></p>

                                <div class="footer-block"><a class="btn btn-open-map">Ouvrir Map</a></div>
                            </div>
                        </div>
                        <div id="googleMap"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS0oVV5q5fKAPk8tEmTReDK3xPSqtMzqM&signed_in=true&callback=initMap" async defer>
    </script>
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
        <?php include("assets2/js/pages/contact.php");?>

</body>

</html>