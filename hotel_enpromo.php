

<!DOCTYPE html>
<html lang="en">
<?php include("connexion.php");
$condition=array();$conditionpromo=array();

if(isset($_GET['mode']) &&isset($_GET['orderby']) ){$orderbymodenom=" ORDER BY ".$_GET['orderby']." ".$_GET['mode']." " ;}else{$orderbymodenom="";}



$acceptedetat="  etat='1' ";
if(isset($_GET['nomhotel']) && $_GET['nomhotel']!="" ){$nomhotel=" nom LIKE '%".$_GET['nomhotel']."%' ";$etoile="";}else{$nomhotel=""; 
if(isset($_GET['etoile']) && $_GET['etoile']!="" ){$etoile=" etoile='".$_GET['etoile']."' ";} else $etoile='';
}

if(isset($_GET['region']) && $_GET['region']!=""&& $_GET['region']!="all" ){$region=" region='".$_GET['region']."' ";}else{$region="";}

if(isset($_GET['region2']) && $_GET['region2']!="" ){$region2="  region in (select id from regions where region LIKE '%".$_GET['region2']."%' ) ";}else{$region2="";}





if(isset($_GET['checkout']) && $_GET['checkout']!="" ){
	
$datedefin2=explode("/" ,$_GET['checkout']);
$datedefin=$datedefin2[2]."-".$datedefin2[1]."-".$datedefin2[0];
$checkout= "date_fin>= '".$datedefin."'  ";}
else{ $checkout='';}

if(isset($_GET['checkin']) && $_GET['checkin']!="" ){
$datedebut2=explode("/" ,$_GET['checkin']);
$datedebut=$datedebut2[2]."-".$datedebut2[1]."-".$datedebut2[0];
$checkin=" date_depart<= '".$datedebut."' and date_fin> '".$datedebut."'  ";}

else{$checkin="date_depart<= '".date("Y-m-d")."' and date_fin> '".date("Y-m-d")."'  ";}

array_push($conditionpromo, " etat='1' ");	
if($checkout!="") array_push($conditionpromo, $checkout);
if($checkin!="")  array_push($conditionpromo, $checkin);






	
array_push($condition, $acceptedetat);

if($nomhotel!="") array_push($condition, $nomhotel);
if($etoile!="") array_push($condition, $etoile);
if($region!="") array_push($condition, $region);
if($region2!="")  array_push($condition, $region2);

$result=implode(" and ",$condition);
$resultpromo=implode(" and ",$conditionpromo);


if($result!="") $result=" where $result";
if($resultpromo!="") $resultpromo=" where $resultpromo";

if(isset($_GET['limit'])){ $limit='LIMIT '.$_GET['limit']; }else{ $limit='LIMIT 0,10';}

$sql=mysql_query("select * from hotel  $result  and id_hotel in(select id_hotel from promotions $resultpromo   )   $limit") or die(mysql_error());
$sqltot=mysql_query("select * from hotel  $result  and id_hotel in(select id_hotel from promotions $resultpromo   ) ") or die(mysql_error());




?>

 <?php $nb=0;  while($resx=mysql_fetch_array($sqltot)){		
				
				 if((isset($_GET['maxprix']) && isset($_GET['minprix']) && $_GET['minprix']!='' && $_GET['maxprix']!=''  && prixfinal($resx['id_hotel'],1)<=$_GET['maxprix']&& prixfinal($resx['id_hotel'])>=$_GET['minprix']) || (empty($_GET['maxprix']) && empty($_GET['minprix']) ))
				{ $nb++; }}?>

<head><title>RBS Travel</title>
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
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
                <section class="page-banner hotel-result" style="background-image:url(assets/images/hotels.jpg); background-attachment: local;">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="./" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">H&ocirc;tels en promos</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">PROMOS</h2></div>
                        </div>
                    </div>
                </section>
                <div class="page-main">
                    <div class="trip-info">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="label-route-widget"><span class="departure"><span class="city">Région</span></span><i class="fa fa-long-arrow-right"></i><span class="arrival"><span class="country">
                                    
                                     <?php if(isset($_GET['region']) && $_GET['region']!='' ){
										 $regionsqlt=mysql_query("select region from regions where id='".$_GET['region']."' ");
									    $exeregiont=mysql_fetch_row($regionsqlt);
										echo $exeregiont[0]; }else echo "Toute la Tunisie";?>
                                    
                                    </span></span></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="label-time-widget">
                                     <?php if(isset($_GET['checkin']) && $_GET['checkin']!='' ){?>
                                    De <span class="departure"><span class="date"><?php echo $_GET['checkin'];?> </span>à <span class="hour">12H00</span></span> 
                                    <?php }?>
                                        <?php if(isset($_GET['checkout']) && $_GET['checkout']!='' ){?>
                                    to <span class="arrival"><span class="date"><?php echo $_GET['checkout'];?> </span>à <span class="hour">12H00</span></span>
                                    <?php }?>
                                    
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="hotel-result-main padding-top padding-bottom">
                        <div class="container">
                            
                            <div class="result-body">
                                <div class="row">
                                    <div class="col-md-8 main-right">
                                        <div class="hotel-list">
                                            <div class="row">
                                            
   
                 <?php while($res=mysql_fetch_array($sql)){		
				 $promo=pourcent_promo($res['id_hotel']); 
				 if((isset($_GET['maxprix']) && isset($_GET['minprix']) && $_GET['minprix']!='' && $_GET['maxprix']!=''  && prixfinal($res['id_hotel'],1)<=$_GET['maxprix']&& prixfinal($res['id_hotel'])>=$_GET['minprix']) || (empty($_GET['maxprix']) && empty($_GET['minprix']) ))
				{ ?>				
                                            
                           <div class="col-sm-12">
                                                    <div class="hotels-layout">
                                                        <div class="image-wrapper"><a href="hotel-details-<?php echo $res['id_hotel'];?>.html" class="link" style="background-image:url(<?php echo image_profil($res['id_hotel']);?>); background-size:cover; background-position:center;"></a>

                                                           <?php if($promo!=100 && $promo!=0){?> <div class="label-sale"><p class="text">Promo</p>

                                                                <p class="number"><?php if($promo!=100 && $promo!=0){echo "-".pourcent_promo($res['id_hotel'])."%";}?></p></div><?php }?>
                                                            <div class="title-wrapper">
                                                            <a href="hotel-details-<?php echo $res['id_hotel'];?>.html" class="title">
															<?php echo $res['nom'];?></a>
                                                            <?php 
										$regionsql=mysql_query("select region from regions where id='".$res['region']."' ");
									    $exeregion=mysql_fetch_row($regionsql);
										echo $exeregion[0];?>

                                               <div title="<?php if( $res['etoile']<=5){ echo $res['etoile']."étoiles";}?>" class="star-rating">
                                                
                                                    
                                               <span class="width-<?php if( $res['etoile']<=5){ echo ($res['etoile']*2)."0";}?>"><strong class="rating"></strong></span>
                                               
                                               </div>
                                               </div>
                                               
                                                        </div>
                                                        <div class="content-wrapper">
                                                            <div class="content">
                                                                <div class="title">
                                                                    <div class="price"><span class="number"><?php
									echo prix_promo($res['id_hotel'],1);						
												?></span></div>
                                                                    <p class="for-price"><?php echo arr_promo($res['id_hotel']);?></p></div>
                                                                <p class="text"><?php 
						$chaine= mb_convert_encoding($res['description_courte'], "UTF-8", "HTML-ENTITIES");
						$chaine=substr($chaine, 0, 150);echo $chaine.'...';
						?>
</p>

                                                                <div class="group-btn-tours"><a href="hotel-details-<?php echo $res['id_hotel'];?>.html" class="left-btn">Réserver</a></div>
                                                            </div>
                                                            <ul class="list-info list-unstyled">
                                                                <li><a href="#" class="link"><i class="icons hidden-icon fa fa-eye"></i><span class="number"><?php echo nb_vue($res['id_hotel'], 'hotel');?></span></a></li>
                                                                                                                             
                                                               
                                                                <li><a href="#" class="link"><i class="icons fa fa-map-marker"></i></a></li>
                                                                <li></li>
                                                                <li></li>
                    <li class="fb-share-button" data-href="http://www.rbstravel.com.tn/hotel-<?php echo $res['id_hotel'];?>.html" data-layout="icon" data-mobile-iframe="true" style="width:100%;">
                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://www.rbstravel.com.tn/hotel-<?php echo $res['id_hotel'];?>.html&src=sdkpreparse"><i class="icons fa fa-share-alt"></i></a>
                     
                                                                    
                                                                </li>
                                                        </ul>
                                                        </div>
                                                    </div>
                             </div>
                             <?php }}?>
                                              
                                            </div>
                                        </div>
                                        <nav class="pagination-list margin-top70">
                                            <ul class="pagination">
                            	<?php $nb=mysql_num_rows($sqltot);
										$nbpage=$nb/10;
										if($nb%10!=0)$nbpage++;
										?>                
                        	<?php 
							for($i=1; $i<=$nbpage;$i++){?>
                            
                            <li><a class="btn-pagination  <?php 
											
											if(isset($_GET['limit'])){ $x=explode(",",$_GET['limit']);$y=$x[0]; $z=$y/10;
											 if($z==$i-1) echo ' active '; 
											  }
											  else{if(1==$i) echo ' active '; 
}											  $lt=(($i-1)*10).",10";
											 ?>" href="hotels_en_tunisie?limit=<?php echo $lt?>" ><?php echo $i;?></a></li>
                                        	
                                    	<?php }?>                    
                                            
                                            
                                                
                                            </ul>
                                        </nav>
                                    </div>
									
									<?php include("outil_recherche.php");?> 
                                   
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