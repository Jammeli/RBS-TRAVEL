<!DOCTYPE html>
<html lang="en">

<?php include("connexion.php");



    function aff_lien($id, $type){
		if($type=='hotel'){
			 return "hotel-details-".$id.".html";
		}
		elseif($type=='voyage'){
			 return "sejour-".$id.".html";
		}
		elseif($type=='circuit'){
			 return "circuit-".$id.".html";
		}
		elseif($type=='croisiere'){
			 return "croisiere-".$id.".html";
		}
		
		}
	function aff_image($id, $type){
		
		if($type=='hotel'){
			 return image_profil($id);
		}
		elseif($type=='voyage'){
			 return image_profilEX( $id, 'images_voyage', 'id_voyage');
		}
		elseif($type=='circuit'){
			 return image_profilEX( $id, 'images_circuit', 'id_circuit');
		}
		elseif($type=='croisiere'){
			 return image_profilEX( $id, 'images_croisiere', 'id_croisiere');
		}
		}
	function aff_titre($id,$type){
		if($type=='hotel'){
			 return "Hôtel (".region(nom_att('region','hotel','id_hotel',$id)).")";
		}
		elseif($type=='voyage'){
			 return "Voyage: ".nom_att('libelle','voyage','id',$id)."";
		}
		elseif($type=='circuit'){
			 return "Circuit: ".nom_att('libelle','circuit','id',$id)."";
		}
		elseif($type=='croisiere'){
			 return "Croisière: ".nom_att('libelle','croisiere','id',$id)."";
		}
		
	}
	 
	 











?>
<head><title>Resultats - </title>
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
                <section class="page-banner blog">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">Recheche</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">Résultats</h2></div>
                        </div>
                    </div>
      <?php

if(isset($_GET['q'])) $motcle=$_GET['q'];else $motcle='';
if(isset($_GET['limit'])){  $end=($_GET['limit']*10)-1;$star=$end-9; }else{ $star=0; $end=9;}

$condition=array();
$acceptedetat="   etat='1' ";

if(isset($motcle) && $motcle!="" ){$nomhotel=" nom LIKE '%".$motcle."%' ";$etoile="";}else{$nomhotel=""; }
$acceptedtarif="  id_hotel in(select id_hotel from tarifs where date_depart<='".date("Y-m-d")."' and date_fin>='".date("Y-m-d")."')";
array_push($condition, $acceptedetat);
if($nomhotel!="") array_push($condition, $nomhotel);
if($acceptedtarif!="")  array_push($condition, $acceptedtarif);
$result=implode(" and ",$condition);

if($result!="") $result=" where $result";


?>                        
                        
                        
                            <?php
			  
	 

$id=array();
$vue=array();
$type=array();
$titre=array(); 

$sql=mysql_query("select * from hotel $result ") or die(mysql_error());
while($rsql=mysql_fetch_array($sql)){
	array_push($vue, nb_vue($rsql['id_hotel'], 'hotel'));
	array_push($type, 'hotel');
	array_push($titre, $rsql['nom']);
	array_push($id, $rsql['id_hotel']);
}



$sql2=mysql_query("select * from croisiere where etat='1' and libelle LIKE '%".$motcle."%' ") or die(mysql_error());
while($rsql2=mysql_fetch_array($sql2)){
	array_push($vue, nb_vue($rsql2['id'], 'croisiere'));
	array_push($type, 'croisiere');
	array_push($titre, $rsql2['libelle']);
	array_push($id, $rsql2['id']);
}


$sql3=mysql_query("select * from circuit where etat='1'and libelle LIKE '%".$motcle."%'  ") or die(mysql_error());
while($rsql3=mysql_fetch_array($sql3)){
	array_push($vue, nb_vue($rsql3['id'], 'circuit'));
	array_push($type, 'circuit');
	array_push($titre, $rsql3['libelle']);
	array_push($id, $rsql3['id']);
}


$sql4=mysql_query("select * from voyage where etat='1'  and libelle LIKE '%".$motcle."%'") or die(mysql_error());
while($rsql4=mysql_fetch_array($sql4)){
	array_push($vue, nb_vue($rsql4['id'], 'voyage'));
	array_push($type, 'voyage');
	array_push($titre, $rsql4['libelle']);
	array_push($id, $rsql4['id']);
}




	
for($i=0; $i<sizeof($id)-1; $i++) {
 for($j=0; $j<(sizeof($id)-1-$i); $j++) {
 if ($vue[$j] < $vue[$j+1] ) {
	 
 $temp = $vue[$j+1];
 $vue[$j+1] = $vue[$j];
 $vue[$j] = $temp;
 
 
  $temp2 = $type[$j+1];
 $type[$j+1] = $type[$j];
 $type[$j] = $temp2;
 
  $temp3 = $titre[$j+1];
 $titre[$j+1] = $titre[$j];
 $titre[$j] = $temp3;
 
  $temp3 = $id[$j+1];
 $id[$j+1] = $id[$j];
 $id[$j] = $temp3;

 }
 }
 }

			
			  
			  ?>          </section>
                <section class="page-main padding-top padding-bottom">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-md-12 sidebar-widget">
                                
                                <div class="col-2">
                                    <div class="col-1">
                                        <div class="recent-post-widget widget">
                                            <div class="title-widget">
                                                <div class="title">Résultats</div>
                                            </div>
                                            <div class="content-widget">
                                                <div class="recent-post-list">

			  
			  <?php for($i=$star; $i<$end; $i++) {
				  if(isset($id[$i])){
				  ?>                              
                                                
                                                    <div class="single-widget-item">
                                                        <div class="single-recent-post-widget"><a href="<?php echo aff_lien($id[$i], $type[$i]);?>" class="thumb img-wrapper"><img src="<?php echo aff_image($id[$i], $type[$i]);?>" alt="recent post picture 1"></a>

                                                            <div class="post-info">
                                                                <div class="meta-info"><span><?php echo aff_titre($id[$i],$type[$i]);?></span><span class="sep">/</span><span class="fa fa-eye"> <?php echo $vue[$i];?></span></div>
                                                                <div class="single-rp-preview"><?php echo $titre[$i];?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php
			  }}?>
                                                   
                                                </div>
                      <?php $nbpage=sizeof($id)/10; if(sizeof($id)%10!=0) $nbpage++;  ?>
                                               
                                               <nav class="pagination-list margin-top70">
                                            <ul class="pagination">
                            	<?php 
										?>                
                        	<?php 
							for($i=1; $i<=$nbpage; $i++){?>
                            
                            <li><a class="btn-pagination  <?php 
											
											if(isset($_GET['limit']) && $_GET['limit']==$i){echo ' active ';}?>" href="resultats.html?limit=<?php echo $i?>" ><?php echo $i;?></a></li>
                                        	
                                    	<?php }?>                    
                                            
                                            
                                                
                                            </ul>
                                        </nav> 
                                            </div>
                                        </div>
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
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/libs/nst-slider/js/jquery.nstSlider.min.js"></script>
<script src="assets/libs/plus-minus-input/plus-minus-input.js"></script>
<script src="assets/js/pages/sidebar.js"></script>
<script src="assets/js/pages/blog.js"></script>
</body>

</html>