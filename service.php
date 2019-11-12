<!DOCTYPE html>
<html lang="en">

<head><?php include("connexion.php");?>
<?php 
if(empty($_GET['id']) ) header("index.html");


$sql=mysql_query("select * from services where id='".$_GET['id']."'  ") or die(mysql_error());

$res=mysql_fetch_array($sql);


	
?>
                                                
  <title>RBS Travel</title>
    

                           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<meta property="og:title" content="<?php echo $res['titre'];?> - RBS Travel"/>
<meta property="og:url" content="http://www.rbstravel.com.tn/sevice-<?php echo $_GET['id'];?>.html"/> 
<meta property="og:image" content="http://www.rbstravel.com.tn/<?php echo $res['image'];?>">

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
                <section class="page-banner hotel-view">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link"><?php echo $res['titre'];?></a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions"><?php echo $res['titre'];?></h2>

                                
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="hotel-view-main">
                        <div class="container">
                            <div class="journey-block">

                               
                                
                                 <div class="wrapper-journey" style="padding-bottom:45px;">
                                    
                                </div>
                            </div>     <div>
                        
                        <?php 
										   
										   
										   echo $res['texte'];?>
                                           
                                           
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
                                                        <div id="googleMap"><?php include("map_g.php");?></div>

                            
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
<!-- <script src="http://maps.googleapis.com/maps/api/js"></script>-->
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
	.liste1 select { height:30px;}
	.liste1 font{height:30px;}
	.liste1 label{height:30px;}
	font.total{ font-size:24px;}
	font.total fontl{ font-size:20px;}

	</style>
</html>