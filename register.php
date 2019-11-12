<!DOCTYPE html>
<html lang="en">

<head>
<?php include("connexion.php");
if(isset($_POST['loginclientA']))
	{



 	
					

						if(isset($_POST['nom'])) $nom = $_POST['nom'];  else $nom='';
						if(isset($_POST['prenom'])) $nom = $_POST['nom']; else $prenom='';
						if(isset($_POST['mail'])) $mail = $_POST['mail']; else $mail='';
$test=mysql_query("select * from clients where mail='$mail'");
if(mysql_num_rows($test)==0){
						
						$from = 'inscription@rbstravel.com.tn';
						$code=genererMDP(18);
						$subject = "Confirmation d\'inscription RBS Travel";
						
						  $message = '
  
       <p>Merci de vous inscrire et ainsi joindre la famille RBS Travel!
Pour compl&eacute;ter l\'activation de votre compte, veuillez cliquer sur le lien ci-dessous :</p>
	   <p>test.rbstravel.com.tn/?activer='.$code.'&id='.$mail.'</p>
	   <p>Cordialement L\'&eacute;quipe de RBS Travel</p>
	   <p>www.rbstravel.com.tn</p>

     
     ';
						
						
						
		$headers = 'From: RBS Travel<'.$from.'>' . "\r\n" .
                    'Reply-To:'.$from. "\r\nContent-Type: text/html; charset=\"iso-8859-1\"\r\n"."X-Mailer: PHP/" . phpversion();
									
								if(mail($mail, $subject, $message, $headers, $additionalparam)){
				
											
											
					
					mysql_query("INSERT INTO `clients` (`id`, `nom`, `prenom`, `mail`, `tel`, `mdp`, `news`, `code`,`date`, `etat`)
					 VALUES (NULL, 
					 '".$_POST['nom']."',
					 '".$_POST['prenom']."',
					 '".$_POST['mail']."',
					 '".$_POST['tel']."',
					 '".md5($_POST['mdp'])."',
					 '".$_POST['news']."',
					 '".$code."',
					 '".date("Y-m-d H:i:s")."',
					 '0'
					 
					 
						  );") or die (mysql_error());	

						  $_SESSION['msj_erreur_singin']="";
						  		        ?><script>document.location.href='demande_inscription_reussite.html';</script><?php

								}else{ 
$_SESSION['msj_erreur_singin']="Erreur d'inscription!";
}	
									
} else{ 
$_SESSION['msj_erreur_singin']="Ce compte exite déja!";
}	
	
	}
?>
<title>RBS Travel | Inscription</title>
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
                <section class="page-banner contact-page" style="background-image:url(assets/images/bg-forgot-password.jpg); background-attachment: local;">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">Inscription</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">Inscription</h2></div>
                        </div>
                    </div>
                </section>
                
                <section class="contact style-1 page-contact-form padding-top padding-bottom">
                    <div class="container">
                        <div class="wrapper-login-form">
                            <div data-wow-delay="0.5s" class="contact-wrapper wow fadeInLeft">
                                <div class="contact-box"><h5 class="title">Inscription</h5>

                                     <div id="msjerreur" style="color:#f00;"><?php if(isset($_SESSION['msj_erreur_singin']))  echo $_SESSION['msj_erreur_singin']; unset($_SESSION['msj_erreur_singin']);?></div>

                                    <form class="login-form"  onSubmit="return test();" method="post">
                               
                                     

                             <input type="text" class="form-control form-input" placeholder="Nom" name="nom" id="nom" style="color:#000;">
 							<input type="text" class="form-control form-input" placeholder="Prenom" name="prenom" id="prenom" style="color:#000;">
                            <input type="text" class="form-control form-input" placeholder="Tel" name="tel" id="tel" style="color:#000;">
                            <input type="text" class="form-control form-input" placeholder="adresse email" name="mail" id="mail" style="color:#000;">
                            <input type="password" class="form-control form-input" placeholder="Mot de passe" name="mdp" id="mdp" style="color:#000;">
                            <input type="password" class="form-control form-input" placeholder="confirmer mot de passe" name="remdp" id="remdp" style="color:#000;">
                                    

                                        <div class="contact-submit">
                                            <button type="submit" data-hover="S'INSCRIRE"   name="loginclientA"class="btn btn-slide"><span class="text">S'INSCRIRE</span></button>
                                        </div>
                                        
                                      
                                        
                                       <a href="password_oublie.html"> Mot de passe oublier? </a><br>
                                       <a href="login.html">Vous avez déja un compte?  </a>
										
                                    </form>
                                    
                                    
                                    
                                </div>
                            </div>
                            <div data-wow-delay="0.5s" class="wrapper-form-images wow fadeInRight"><img src="assets/images/register.jpg" alt="" class="img-responsive"></div>
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

	var nom=document.getElementById('nom').value;
	var prenom=document.getElementById('prenom').value;
	var tel=document.getElementById('tel').value;
	var mail=document.getElementById('mail').value;
	var mdp=document.getElementById('mdp').value;
	var remdp=document.getElementById('remdp').value;


if(remdp!=mdp && remdp!=""&& mdp!="") {message('Les mots de passes ne sont pas identiques.');test=false;	}

if(remdp=="") {message('Retapez le mot de passe.');test=false;}
	if(mdp=="") { message('verifier le mot de passe.');test=false;	}
	if(mail=="") {message('verifier le email.');test=false;	}
	if(tel=="") { message('verifier le Tel.');test=false;	}
if(prenom=="") { message('verifier le prenom.');test=false;	}
if(nom=="") { message('verifier le nom.');test=false;	}	
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