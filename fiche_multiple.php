<!DOCTYPE html>
<html lang="en">

<head><?php include("connexion.php");?>
<?php 
if(empty($_GET['id']) || empty($_GET['page'])) header("index.html");

$table=$_GET['page'];

$sql=mysql_query("select * from $table where id='".$_GET['id']."'  ") or die(mysql_error());
if(mysql_num_rows($sql)==0) header("index.html");

$res=mysql_fetch_array($sql);

					visite($_GET['id'], $_GET['page']);

	
?>
                                                
  <title>RBS Travel</title>
    

                           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<meta property="og:title" content="<?php echo $res['libelle'];?> avec RBS Travel"/>
<meta property="og:url" content="http://www.rbstravel.com.tn/<?php echo $_GET['page'];?>.php?id=<?php echo $_GET['id'];?>"/> 
<meta property="og:image" content="http://www.rbstravel.com.tn/<?php echo image_profilEX($_GET['id'], 'images_'.$_GET['page'], 'id_'.$_GET['page']);?>">

 <meta property="og:image:type" content="image/jpeg">
 <meta property="og:image:width" content="3523">
 <meta property="og:image:height" content="2372">





    <meta name="description" content="RBS Travel - Agence de voyage">
    <meta name="author" content="THINK CREATIVE">




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
    <link type="text/css" rel="stylesheet" href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
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
                <section class="page-banner hotel-view"  style="background-image:url(<?php echo image_profilEX($_GET['id'], 'images_'.$_GET['page'], 'id_'.$_GET['page']);?>)">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li><a href="hotel_en_tunisie" class="link"><?php
					
					if($_GET['page']=="voyage") echo "Voyage";
					if($_GET['page']=="circuit") echo "Circuit";
					if($_GET['page']=="croisiere") echo "Croisière";
					 
					 
					 ?></a></li>
                                    <li class="active"><a href="#" class="link"><?php echo $res['libelle'];?></a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions"><?php
					
					if($_GET['page']=="voyage") echo "Voyage";
					if($_GET['page']=="circuit") echo "Circuit";
					if($_GET['page']=="croisiere") echo "Croisière";
					 
					 
					 ?></h2>

                                
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="hotel-view-main">
                        <div class="container">
                            <div class="journey-block">

                               
                                <div class="overview-block clearfix"><h3 class="title-style-3">Détails</h3>

                                    <div class="timeline-container">
                                        <div class="timeline timeline-hotel-view">
                                            <div class="timeline-block">
                                                <div class="timeline-content">
                                                    <div class="row">
                                                        <div class="timeline-custom-col">
                                                            <div class="image-hotel-view-block">
                                                                <div class="slider-for group1">
<?php echo affiche_image_pEX($_GET['id'],1 , 'images_'.$_GET['page'], 'id_'.$_GET['page']);?>
                                                                </div>
                                                                <div class="slider-nav group1">
<?php echo affiche_image_pEX($_GET['id'],2 , 'images_'.$_GET['page'], 'id_'.$_GET['page']);?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-custom-col image-col hotels-layout">
                                                            <div class="content-wrapper">
                                                                <div class="content">
                                                                    <div class="title">
                                     
                                     <font style="font-size:12px;"> à  partir de</font><br>
                                     <font style="font-size:40px;"><?php echo $res['prix'];?></font>
                          <br>
<br>
<ul>                                

                                                <li><?php echo $res['libelle'];?></li>
                                                <li><label>Date de départ</label><?php echo $res['apartir_de'];?> </li>
                                                <li><label>Nombre de jours</label><?php echo $res['nbre_jour'];?> </li>
                                            </ul> 
                                                                    </div>
                                                                    

                                                                    <div class="group-btn-tours"><a href="#" class="left-btn btn-book-tour">Réserver</a></div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="timeline-custom-col full timeline-book-block" >
                                                            <div class="find-widget find-hotel-widget widget new-style" style="margin-left:10px; float:left; width:100%;">
                                                            <h4 class="title-widgets">Réservation</h4>
                                                                
                                                                                                
                                        <?php
                                            if(isset($_SESSION['mail_connect'])) {
                                            $sql_user=mysql_query("select * from clients where mail='".$_SESSION['mail_connect']."'");
                                            $resuser=mysql_fetch_array($sql_user);
                                            
                                                $nom=$resuser['nom'];
                                                $prenom=$resuser['prenom'];
                                                $tel=$resuser['tel'];
                                                $mail=$resuser['mail'];
                                    
                                            
                                            
                                            }else{
                                                
                                                $nom="";
                                                $prenom="";
                                                $tel="";
                                                $mail="";
                                                }
                                                     ?>
                                                       
                                                                                                         
                                                                                                
                                    <form class="content-widget" action="savecmd_multiple.php" id="formulaire" method="post">
                                    
                                    <input type="hidden" value="<?php if(isset($_SESSION['id_connect'])) echo $_SESSION['id_connect'];?>" id="id_client" name="id_client" >
                                    <div class="text-input small-margin-top">
                                    <div class="input-daterange col-sm-6 col-md-12" style="width:100% !important;padding-bottom: 30px;">
                                    <div class="text-box-wrapper half">
                                    <label class="tb-label">Nombre d'adultes</label>
                                    
                                    <div class="input-group">
                                     <select name="adulte"   id="adulte"  class="tb-input">
                                                                                            <option value="0">0</option>
                                                                                            <option value="1">01</option>
                                                                                            <option value="2">02</option>
                                                                                            <option value="3">03</option>
                                                                                            <option value="4">04</option>
                                                                                        </select><i class="tb-icon fa fa-user input-group-addon"></i>
                                    
                                    </div>
                                    </div>
                                     <div class="text-box-wrapper half">
                                    <label class="tb-label">Nombre d'enfants</label>
                                    
                                    <div class="input-group">
                                     <select name="enfant" id="enfant"  class="tb-input">
                                                                                            <option value="0">0</option>
                                                                                            <option value="1">01</option>
                                                                                            <option value="2">02</option>
                                                                                            <option value="3">03</option>
                                                                                            <option value="4">04</option>
                                                                                        </select><i class="tb-icon fa fa-user input-group-addon"></i>
                                    
                                    </div>
                                    </div>       
                                    </div>
                                    <div><hr style="width:100%; margin-top:50px;"></div>
                                    <div>
                                                                        <h2>Informations personnel</h2>
                                    
                                    <div class="text-box-wrapper half">
                                    <label class="tb-label">Nom</label>
                                    
                                    <div class="input-group">
                                    <input type="text" class="tb-input" value="<?php echo $nom;?>" placeholder="" disabled/>
                                    <i class="tb-icon fa fa-user "></i></div>
                                    </div>
                                    <div class="text-box-wrapper half">
                                    <label class="tb-label">Prenom</label>
                                    
                                    <div class="input-group">
                                    <input type="text" class="tb-input" value="<?php echo $prenom;?>" placeholder="" disabled/> 
                                    <i class="tb-icon fa fa-user input-group-addon"></i></div>
                                    </div>
                                    <div class="text-box-wrapper half">
                                    <label class="tb-label">Email</label>
                                    
                                    <div class="input-group">
                                    <input type="text" class="tb-input" value="<?php echo $mail;?>" placeholder="" disabled/> 
                                    <i class="tb-icon fa  fa-envelope-o input-group-addon"></i></div>
                                    </div>
                                    <div class="text-box-wrapper half">
                                    <label class="tb-label">Tel</label>
                                    
                                    <div class="input-group">
                                    <input type="text" class="tb-input" value="<?php echo $tel;?>" placeholder="" disabled/> 
                                    <i class="tb-icon fa fa-phone input-group-addon"></i></div>
                                    </div>
                                    
                                      </div>                                                         
                                                                                                     
                                                                                                    
                                                                                                     
                                        
                                                            
                                                        
                                                            
                                                          <button type="button" onClick="javascript: test()" data-hover="Réserver" class="btn btn-slide" ><span class="text">Réserver</span></button>
                                                           <div id="msjerreur" style="color:#F00;"></div>    
                                                                                                      
                                                                                                            </div>
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                         
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                        </div>
                                                <input type="hidden" name="id_article" value="<?php echo $_GET['id'];?>" >        
                                                <input type="hidden" name="page" value="<?php echo $_GET['page'];?>" >        
                                               
                                                                                                    </form>                                
                                                            </div>
                                                     
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                 <div><h3 class="title-style-3">Description</h3>
                        
                        <?php 
										   
										   
										   echo nl2br($res['description_longue']);?>
                                           
                                           
                         </div>
                            </div>     
                        </div>
                        
                                    
                      
                           
                                           
                                                                   <div class="map-block">
                            <div class="map-info"><h3 class="title-style-2">Contacter</h3>

                                <p class="address">RBS TRAVEL </p>
                                <p class="address"><i class="fa fa-map-marker"></i> <?php echo $restotparametres['adresse'];?></p>

                                <p class="phone"><i class="fa fa-phone"></i> <?php echo $restotparametres['tel'];?></p>

                                <p class="mail"><a href="mailto:<?php echo $restotparametres['email'];?>"> <i class="fa fa-envelope-o"></i><?php echo $restotparametres['email'];?></a></p>

                                <div class="footer-block"><a class="btn btn-open-map">Ouvrir map</a></div>
                            </div>
                                                        <div id="googleMap"></div>

                                           <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDS0oVV5q5fKAPk8tEmTReDK3xPSqtMzqM&signed_in=true&callback=initMap" async defer>
    </script>
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
        <?php include("assets2/js/pages/contact2.php");?>
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
</body>
<script language="javascript">
	function display(id,nb){
		i=0;
		while(i<nb){
			document.getElementById(id+i).style.display='';
			
			i++;
			}
		j=i;
		while(j<20){
			document.getElementById(id+j).style.display='none';
			
			j++;
			}
					calcul_hotel();		

		}
		function change_single(od,id,val, MaxPax){
		var y=MaxPax-val	
            document.getElementById(od+id).value = y;	
			calcul_hotel();		
		}
		
		
		
		

	function file(fichier)
{
}


function test(){
	
<?php if(empty($_SESSION['id_connect']))
		{echo "message('Vous devez vous connecter!')";}
	  else 
	     {echo " if(document.getElementById('adulte').value==0 ){message('Séléctionner le nombre d\'adulte!');}
				else{
					
					
					document.getElementById('formulaire').submit();
					
					
					}
				
				
				
				
				
				
		 ";}
		 ?>	
	
	
	

	
	}
function message(msj){
	
document.getElementById('msjerreur').innerHTML = msj;
 setTimeout(function() {
  document.getElementById('msjerreur').innerHTML = "";
},5000);	
	
}
	</script>
    <style>
	.nbrechambre{ width:70%}
	.nbrechambre td{ text-align:left;}
	.liste1{padding-left:30px !important; }
	.liste1 form-group{padding-left:20px !important; padding-right:20px !important;}
	
	.liste1 table {margin-left: 29px;    width: 90%;}
	.liste1 select { height:30px; color:#000;}
	.liste1 input {  color:#000;}	.liste1 font{height:30px;}
	.liste1 label{height:30px;}
	font.total{ font-size:24px;}
	font.total fontl{ font-size:20px;}

	</style>
</html>