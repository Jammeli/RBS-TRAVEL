<!DOCTYPE html>
<html lang="en">

<head><?php include("connexion.php");

	
	function gallerie_tourisme($mode){
$images="";
	$select2=mysql_query("select * from tourisme_medical_g ");
	
	while($exe1=mysql_fetch_array($select2)){
	$image=$exe1['image'];
	
	if($mode==1){
	$images.='<div class="item" style="background-image:url('.$image.'); background-position:center; background-size:cover; height:380px; "></div>';

	}
	elseif($mode==2){
	$images.='<div class="item" style="background-image:url('.$image.'); background-position:center; background-size:cover; height:60px; width:70px;"></div>';

	}
	
	}
	
	return $images;
		
	
	
	}
function image_profil_tourisme(){
	
	$select=mysql_query("select image from tourisme_medical_g where     type='profil'");
	$exe1=mysql_fetch_row($select);
	
	if(mysql_num_rows($select)!=0) return $exe1[0];
	else return "assets/images/tourisme.jpg";


										
}

?>
<?php 

$table="tourisme_medical";

$sql=mysql_query("select * from $table  ") or die(mysql_error());
if(mysql_num_rows($sql)==0) header("index.html");

$res=mysql_fetch_array($sql);


	
?>
                                                
  <title>RBS Travel</title>
    

                           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<meta property="og:title" content="Tourisme médical avec RBS Travel"/>
<meta property="og:url" content="http://www.rbstravel.com.tn/tourisme_medical.php"/> 
<?php if( image_profil_tourisme()!=''){echo ' <meta property="og:image" content="http://www.rbstravel.com.tn/'.image_profil_tourisme().'">'; }?>

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
                <section class="page-banner hotel-view" <?php if( image_profil_tourisme()!=''){echo ' style="background-image:url('.image_profil_tourisme().')"'; }?>>
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">Tourisme médical</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">Tourisme médical</h2>

                                
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="hotel-view-main">
                        <div class="container">
                            <div class="journey-block">

                         <?php /* if(mysql_num_rows($select2)!=0){*/?>      
                                <div class="overview-block clearfix"><h3 class="title-style-3">Détails</h3>

                                    <div class="timeline-container">
                                        <div class="timeline timeline-hotel-view">
                                            <div class="timeline-block">
                                                <div class="timeline-content">
                                                    <div class="row">
                                                        <div class="timeline-custom-col">
                                                            <div class="image-hotel-view-block">
                                                                <div class="slider-for group1">
<?php echo gallerie_tourisme(1);?>
                                                                </div>
                                                                <div class="slider-nav group1">
<?php echo gallerie_tourisme(2);?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php /* }*/?>
                                 <div><br>
<h3 class="title-style-3">Description</h3>
                        
                        <?php 
										   
										   
										   echo nl2br($res['texte']);?>
                                           
                                           
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
        <?php include("assets2/js/pages/contact_tourisme.php");?>
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