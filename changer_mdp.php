<!DOCTYPE html>
<html lang="en">

<head>
<?php include("connexion.php");?>
<?php 
function genererMDPx ($longueur = 18){
	// initialiser la variable $mdp
	$mdp = "";
 
	// Définir tout les caractères possibles dans le mot de passe, 
	// Il est possible de rajouter des voyelles ou bien des caractères spéciaux
	$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
 
	// obtenir le nombre de caractères dans la chaîne précédente
	// cette valeur sera utilisé plus tard
	$longueurMax = strlen($possible);
 
	if ($longueur > $longueurMax) {
		$longueur = $longueurMax;
	}
 
	// initialiser le compteur
	$i = 0;
 
	// ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
	while ($i < $longueur) {
		// prendre un caractère aléatoire
		$caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
 
		// vérifier si le caractère est déjà utilisé dans $mdp
		if (!strstr($mdp, $caractere)) {
			// Si non, ajouter le caractère à $mdp et augmenter le compteur
			$mdp .= $caractere;
			$i++;
		}
	}
 
	// retourner le résultat final
	return $mdp;
}


if(isset($_GET['changer'])&& isset($_GET['id'])){
	
	
	$testconfirm=mysql_query("select * from clients where mail='".$_GET['id']."' and code='".$_GET['changer']."'");
	if(mysql_num_rows($testconfirm)==1){
		
		


		




?>




<?php
if(isset($_POST['loginclientA']))
	{
	if(isset($_POST['newpass']) &&isset($_POST['renewpass']) &&($_POST['newpass']==$_POST['renewpass'] )){
			$new=md5($_POST['newpass']);
			
			
			$codenv=genererMDPx(18);
			
			$_SESSION['id_connect']=$codenv;
		$_SESSION['mail_connect']=$_GET['id'];
			mysql_query("update  clients  set  code='$codenv', mdp='$new' where mail='".$_SESSION['mail_connect']."'");
		
		
			header("location: espace_client.php");
			
	
	
	}
	
	}
?>
<title>RBS Travel | Changement de mot de passe</title>
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
                <section class="page-banner contact-page">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">Changement de mot de passe</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">Changement de mot de passe</h2></div>
                        </div>
                    </div>
                </section>
                
                <section class="contact style-1 page-contact-form padding-top padding-bottom">
                    <div class="container">
                        <div class="wrapper-login-form">
                            <div data-wow-delay="0.5s" class="contact-wrapper wow fadeInLeft">
                                <div class="contact-box"><h5 class="title">Changement de mot de passe</h5>

                                     <div id="msjerreur" style="color:#f00;"><?php if(isset($_SESSION['msj_erreur_singin']))  echo $_SESSION['msj_erreur_singin']; unset($_SESSION['msj_erreur_singin']);?></div>

                                    <form class="login-form"  onSubmit="return test();" method="post">
                                     <input type="password" placeholder="Votre mot de passe" name="newpass" id="newpass" class="form-control form-input" style="color:#000;">
                                     <input type="password" placeholder="Retapper mot de passe" name="renewpass" id="renewpass" class="form-control form-input" style="color:#000;">
                                    

                                        <div class="contact-submit">
                                            <button type="submit" data-hover="Changer"   name="loginclientA" class="btn btn-slide"><span class="text">Changer </span></button>
                                        </div>
                                        
                                      
                                        
										
                                    </form>
                                    
                                    
                                    
                                </div>
                            </div>
                            <div data-wow-delay="0.5s" class="wrapper-form-images wow fadeInRight"><img src="assets/images/background/bg-banner-contact-form.jpg" alt="" class="img-responsive"></div>
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
	var mail=document.getElementById('newpass').value;
	var mdp=document.getElementById('renewpass').value;


if(mail=="") {message('Saisir le mot de passe.');test=false;	}
else{ if(mdp=="") {message('Retapez le mot de passe.'); test=false;}
else if(mdp!=mail) {message('mots de passe  non équivalent.'); test=false;}

}

	return test;
		
}
function message(msj){
	
document.getElementById('msjerreur').innerHTML = msj;
 setTimeout(function() {
  document.getElementById('msjerreur').innerHTML = "";
},5000);	
	
}
	</script>
    
    <script  type="text/javascript">

function test_compte(){
	
	var test=true;
	
	 document.getElementById("erreurnomprofil").innerHTML="";
	 document.getElementById("erreurprenomprofil").innerHTML="";
	 document.getElementById("erreurtelprofil").innerHTML="";
	
	
	var nom=document.getElementById('nomprofil').value;
	var prenom=document.getElementById('prenomprofil').value;
	var tel=document.getElementById('telprofil').value;


if(nom=="") {document.getElementById("erreurnomprofil").innerHTML += "verifier le nom.<br>";
					test=false;
					document.getElementById("erreurnomprofil").style.display="";
					
	}else document.getElementById("erreurnomprofil").style.display="none";


	
if(prenom=="") {document.getElementById("erreurprenomprofil").innerHTML += "verifier le nom.<br>";
					test=false;
					document.getElementById("erreurprenomprofil").style.display="";
					
	}else document.getElementById("erreurprenomprofil").style.display="none";


	
if(tel=="") {document.getElementById("erreurtelprofil").innerHTML += "verifier le Telephone.<br>";
					test=false;
					document.getElementById("erreurtelprofil").style.display="";
					
	}else document.getElementById("erreurtelprofil").style.display="none";


	return test;
	
	
	
	}
	
	





function test_renew(){
	
	var test=true;
	
	 document.getElementById("newpasserreur").innerHTML="";
	 document.getElementById("renewpasserreur").innerHTML="";
	
	
	var newpass=document.getElementById('newpass').value;
	var renewpass=document.getElementById('renewpass').value;



	
if(newpass=="") {document.getElementById("newpasserreur").innerHTML += "verifier le nouveau mot de passe.<br>";
					test=false;
					document.getElementById("newpasserreur").style.display="";
					
	}else document.getElementById("newpasserreur").style.display="none";


		
	
		
if(renewpass=="") {document.getElementById("renewpasserreur").innerHTML += "Retapez le nouveau  mot de passe.<br>";
					test=false;
					document.getElementById("renewpasserreur").style.display="";
					
	}else document.getElementById("renewpasserreur").style.display="none";


if(renewpass!=newpass && renewpass!=""&& newpass!="") {document.getElementById("erreuridentik").innerHTML += "Les mots de passes ne sont pas identiques.<br>";
					test=false;
					document.getElementById("erreuridentik").style.display="";
					
	}else document.getElementById("erreuridentik").style.display="none";
return test;
		
}
	
	

</script>
</body>

</html><?php }else {
	echo "Ce lien n'est pas valide veillez relancer la demande de changement de mot de passe!";
	?> <a href="index.html">Retour</a><?php 
	 }?>
		
        
        <?php }else {
	?>
        <script>document.location.href='index.html';</script>
        <?php }?>