<!DOCTYPE html>
<html lang="en">

<head><title>RBS TRAVEL| SéJOURS</title>
                <?php include("connexion.php");
				
							if(isset($_GET['datedepart']) &&$_GET['datedepart']!='' ){
					
					$x=$_GET['datedepart']; 
					$sql1= " and  apartir_de <= '".$x."'"; 
					
				}else $sql1="";
				
						
				if(isset($_GET['destination'])){
					
					$sql2= " and  libelle LIKE '%".mysql_real_escape_string($_GET['destination'])."%'"; 
					
				}else $sql2="";
				
				
				
			



				 $sql_circuis=mysql_query("select * from voyage where etat='1'$sql1 $sql2  ORDER BY id DESC");
				 
				 
				 ?>

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
    <link type="text/css" rel="stylesheet" href="assets/libs/nst-slider/css/jquery.nstSlider.min.css">
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
                <section class="page-banner cruises-result " style="background-image:url(assets/images/sejours.jpg); background-attachment: local;">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">Séjours</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">Séjours</h2></div>
                        </div>
                    </div>
                </section><?php include("recherche_multiple.php");?>
                <div class="page-main">
                    <div class="trip-info">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                        <div class="result-count-wrapper">Résultats touvées: <span class="result-count"><?php echo mysql_num_rows($sql_circuis);;?></span></div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="cruises-result-main padding-top padding-bottom">
                        <div class="container">
                            
                            <div class="result-body">
                                <div class="row">
                                    <div class="col-md-12 main-right">
                                        <div class="cruises-list">
                                            <div class="row">
                                             <?php 
	 $i=0;
	 while($resciecuit=mysql_fetch_array($sql_circuis)){?>
                                                <div class="col-sm-4 col-xs-4" >
                                                    <div class="cruises-layout">
                                                        <div class="image-wrapper"><a href="sejour-<?php echo $resciecuit['id'];?>.html" class="link" style="background-image:url(<?php echo image_profilEX( $resciecuit['id'], 'images_voyage', 'id_voyage');?>); background-position:center; background-size:cover; height:250px; width:100%;"></a>

                                                            
                                                        </div>
                                                        <div class="content-wrapper" style="height:350px;">
                                                            <div class="content">
<div style="height: 55px !important;"><a href="sejour-<?php echo $resciecuit['id'];?>.html" class="title"><?php echo $resciecuit['libelle'];?></a></div>
                                 <div> <p class="offers-content" >(<?php echo nb_vue($resciecuit['id'], 'voyage');?> visites)</p></div>
                                    
                                    
<div class="price"><span class="number"><?php echo $resciecuit['prix'];?><sup >DT</sup></span></div>
    <div style="height: 155px !important;">
    <p class="text" ><?php 
                            $chaine= strip_tags(mb_convert_encoding($resciecuit['description_courte'], "UTF-8", "HTML-ENTITIES"));
							affiche_courte($chaine);
    ?></p>
    </div>
    
<a href="sejour-<?php echo $resciecuit['id'];?>.html" class="btn btn-gray">Détails</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <?php  $i++; if($i==3) {$i=0; echo '<hr style="width:100%;">';}}?>
                                               
                                                     <?php if(mysql_num_rows($sql_circuis)==0){?>   <a href="index.html" class="uppercase full-width button btn-large">Pas de Séjours pour le moment</a><?php }?>
                                            </div>
                                        </div>
                                      <!--  <nav class="pagination-list margin-top70">
                                            <ul class="pagination">
                                                <li><a href="#" aria-label="Previous" class="btn-pagination previous"><span aria-hidden="true" class="fa fa-angle-left"></span></a></li>
                                                <li><a href="#" class="btn-pagination active">01</a></li>
                                                <li><a href="#" class="btn-pagination">02</a></li>
                                                <li><a href="#" class="btn-pagination">03</a></li>
                                                <li><a href="#" class="btn-pagination">...</a></li>
                                                <li><a href="#" aria-label="Next" class="btn-pagination next"><span aria-hidden="true" class="fa fa-angle-right"></span></a></li>
                                            </ul>
                                        </nav>-->
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
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
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
<script src="assets/libs/plus-minus-input/plus-minus-input.js"></script>
<script src="assets/js/pages/sidebar.js"></script>
<script src="assets/js/pages/result.js"></script>
</body>

</html>