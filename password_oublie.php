<!DOCTYPE html>
<html lang="en">

<head>
<?php include("connexion.php");
if(isset($_POST['loginclientA']))
	{
	$testconfirmmail=mysql_query("select * from clients where mail='".$_POST['mailchange']."'") or die(mysql_error());

	if(mysql_num_rows($testconfirmmail)==1 ){
		$a=mysql_fetch_array($testconfirmid);
		$codenv=genererMDP(18);
		$sqm=mysql_query("select * from  clients  where mail='".$_POST['mailchange']."'");
		$ress=mysql_fetch_array($sqm);
		$codenv=$ress['code'];
		$mail=$_POST['mailchange'];
		$from='inscription@rbstravel.com.tn';
		$subject = "Changement de votre mot de passe  RBS Travel";
						
						  $message = '
  
       <p>Suite &agrave; votre demande de changement de votre mot de passe RBS !
 veuillez cliquer sur le lien ci-dessous pour le changer :</p>
	   <p>test.rbstravel.com.tn/changer_mdp.php?changer='.$codenv.'&id='.$mail.'</p>
	   <p>Cordialement l\'&eacute;quipe de RBS Travel</p>
	   <p>www.rbstravel.com.tn</p>

     
     ';
			 $headers = 'From: RBS Travel<'.$from.'>' . "\r\n" .
                    'Reply-To:'.$from. "\r\nContent-Type: text/html; charset=\"iso-8859-1\"\r\n"."X-Mailer: PHP/" . phpversion();
					
							
						$additionalparam = "-t " . $from;
						
						
								mail($mail, $subject, $message, $headers, $additionalparam);
										        ?><script>document.location.href='demande_mdp_reussite.html ';</script><?php

				
	}
		else{		
					$_SESSION['msj_erreur_singin']="Vous n'étes pas inscrit!";
		        ?><script>document.location.href='password_oublie.html';</script><?php

				}
	
	}
?>
<title>RBS Travel | Login</title>
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
    
    <style>
.login-form input, .login-form textarea,.login-form button{ margin-top:20px !important;}
.login-form msjerreur{ margin-top:20px !important;margin-bottom:20px !important;}

</style>
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
                <section class="page-banner contact-page"  style="background-image:url(assets/images/bg-forgot-password.jpg); background-attachment: local;" >
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">Récupération de mot de passe</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">Récupération</h2></div>
                        </div>
                    </div>
                </section>
                
                <section class="contact style-1 page-contact-form padding-top padding-bottom">
                    <div class="container">
                        <div class="wrapper-login-form">
                            <div data-wow-delay="0.5s" class="contact-wrapper wow fadeInLeft">
                                <div class="contact-box"><h5 class="title">Récupération de mot de passe</h5>
                                <p style="color:#fff"> Tapez votre email pour vous envoyez l'accés pour changer votre mot de passe!</p>

                                     <div id="msjerreur" style="color:#f00;"><?php if(isset($_SESSION['msj_erreur_singin']))  echo $_SESSION['msj_erreur_singin']; unset($_SESSION['msj_erreur_singin']);?></div>

                                    <form class="login-form"  onSubmit="return test();" method="post">
                                     <input type="email" placeholder="Votre Email" name="mailchange" id="mailchange" class="form-control form-input" style="color:#000;">
                                    
                                    

                                        <div class="contact-submit">
                                            <button type="submit" data-hover="Récuperer"   name="loginclientA" class="btn btn-slide"><span class="text">Récuperer</span></button>
                                        </div>
                                        
                                      
                                        
                                       <a href="register.html">Vous n'avez pas un compte? S'ENREGISTRER </a>
										
                                    </form>
                                    
                                    
                                    
                                </div>
                            </div>
                            <div data-wow-delay="0.5s" class="wrapper-form-images wow fadeInRight"><img src="assets/images/bg-forgot-password2.jpg" alt="" class="img-responsive"></div>
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
<script src="assets/js/pages/contact.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>

function test(){

	var test=true;
	var mail=document.getElementById('mailchange').value;


if(mail=="") {message('verifier l\'email.');test=false;	}

	return test;
		
}
function message(msj){
	
document.getElementById('msjerreur').innerHTML = msj;
 setTimeout(function() {
  document.getElementById('msjerreur').innerHTML = "";
},5000);	
	
}
	</script>
</body>

</html>