<!DOCTYPE html>
<html lang="en">

<head><?php include("connexion.php");?>
<?php 
if(empty($_GET['id_hotel'])) header("hotels_en_tunisie");

$sql=mysql_query("select * from hotel where id_hotel='".$_GET['id_hotel']."'  ") or die(mysql_error());
if(mysql_num_rows($sql)==0) header("hotels_en_tunisie");

$res=mysql_fetch_array($sql);

	
	
?>
 <title>RBS Travel</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="image_src" href="http://www.rbstravel.com.tn/<?php echo image_profil($res['id_hotel']);?>" />
<meta property="og:title" content="<?php echo $res['nom'];?> avec RBS Travel"/>
<meta property="og:url" content="http://www.rbstravel.com.tn/fiche_hotels.php?id_hotel=<?php echo $res['id_hotel'];?>"/> 
<meta property="og:image" content="http://www.rbstravel.com.tn/<?php echo image_profil($res['id_hotel']);?>">
 <meta property="og:image:type" content="image/jpeg">
 <meta property="og:image:width" content="3523">
 <meta property="og:image:height" content="2372">
<meta property="title" content="<?php echo $res['nom'];?> avec RBS Travel"/>
<meta property="url" content="http://www.rbstravel.com.tn/hotel-detailed.php?id_hotel=<?php echo $res['id_hotel'];?>"/> 
<meta property="image" content="http://www.rbstravel.com.tn/<?php echo image_profil($res['id_hotel']);?>">
 <meta property="image:type" content="image/jpeg">
 <meta property="image:width" content="3523">
 <meta property="image:height" content="2372">





    <meta name="description" content="RBS Travel - Agence de voyage">
    <meta name="author" content="THINK CREATIVE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <section class="page-banner hotel-view" style="background-image:url(<?php echo image_profil($res['id_hotel']);?>); background-color:rgba(153,153,153,1);">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li><a href="hotel_en_tunisie.html" class="link">Hotels</a></li>
                                    <li class="active"><a href="#" class="link"><?php echo $res['nom'];?></a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions"><?php echo substr($res['nom'], 0, 15);?></h2>

                                
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="hotel-view-main">
                        <div class="container">
                            <div class="journey-block">
<form class="content-widget" action="savecmd.php" id="formulaire" method="post">
                               
                                <div class="overview-block clearfix">

                                    <div class="timeline-container">
                                        <div class="timeline timeline-hotel-view">
                                            <div class="timeline-block">
                                                <div class="timeline-content">
                                                    <div class="row">
                                                        <div class="timeline-custom-col">
                                                            <div class="image-hotel-view-block">
                                                                <div class="slider-for group1">
<?php echo affiche_image_p($res['id_hotel'],1);?>
                                                                </div>
                                                                <div class="slider-nav group1">
<?php echo affiche_image_p($res['id_hotel'],2);?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-custom-col image-col hotels-layout">
                                                            <div class="content-wrapper">
                                                                <div class="content">
                                                                    <div class="title">
                                     
                                     <font style="font-size:16px;"><?php echo $res['nom'];?></font> <br>
                                     <font style="font-size:12px;"> à  partir de</font> <br>
                                     <font style="font-size:40px;"><?php echo prix_promo($res['id_hotel'],2);?></font>
                                     <font style="font-size:16px;"><?php echo arr_promo($res['id_hotel']); ?></font>
<br>
<br>
 <ul>
                                                                      
                                                <li><label>Type d'hôtel: </label> <?php echo $res['etoile'];?> &eacutetoiles</li>
                                             <li><label>Séjour minimum: </label> <?php echo minstay($res['id_hotel']);?></li>
                                                <li><label>Accompte: </label> <?php echo accompte($res['id_hotel']);?></li>
                                                <li><label>Pays: </label> Tunisie</li>
                                                <li><label>Ville: </label> <?php echo region($res['region']);?></li>
                                                <li><label>Annulation: </label> <?php echo annulation($res['id_hotel']);?> jours</li>
                                            </ul>  
                                                                    </div>
                                                                    

                                                                    <div class="group-btn-tours"><a href="#" class="left-btn btn-book-tour">Réserver</a></div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="timeline-custom-col full timeline-book-block" >
                                                            <div class="find-widget find-hotel-widget widget new-style" style="margin-left:10px; float:left; width:57%;">
                                                            <h4 class="title-widgets">Réservation</h4>

<input type="hidden" value="<?php if(isset($_GET['id_hotel'])) echo $_GET['id_hotel'];?>" id="id_hotel" name="id_hotel" >

<input type="hidden" value="<?php if(isset($_SESSION['id_connect'])) echo $_SESSION['id_connect'];?>" id="id_client" name="id_client" >
<div class="text-input small-margin-top">
<div class="input-daterange col-sm-6 col-md-12" style="width:100% !important;padding-bottom: 30px;">
<div class="text-box-wrapper half"><label class="tb-label">Check in</label>

<div class="input-group"><input  onChange="calcul_hotel()" type="text" placeholder="JJ/MM/AAAA" id="checkin" name="checkin" class="tb-input"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
</div>
                                                                            <div class="text-box-wrapper half"><label class="tb-label">Check out</label>

                                                                                <div class="input-group"><input type="text" placeholder="JJ/MM/AAAA"  id="checkout" name="checkout"    onChange="calcul_hotel()" class="tb-input"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        
     <input type="hidden" value="<?php if(isset($_GET['id_hotel'])) echo $_GET['id_hotel'];?>" id="id_hotel" name="id_hotel" >

<input type="hidden" value="<?php if(isset($_SESSION['id_connect'])) echo $_SESSION['id_connect'];?>" id="id_client" name="id_client" >
<div class="text-input small-margin-top">

                                                                        
                                                                        
                                                                        
                                                                        
     <?php 
				   $sql_cmd=mysql_query("select type_chambre from hotel where id_hotel='".$_GET['id_hotel']."'");
				   $re_cmd=mysql_fetch_row($sql_cmd);
				   $types_chambre=explode('-', $re_cmd[0]);
				   foreach($types_chambre as $val_type_chambre){
					   if($val_type_chambre!=0){
						   
						             
				   $sql_cmd_att=mysql_query("select id, image, nom from type_chambre where id='".$val_type_chambre."'");
				   $sql_cmd_attr=mysql_fetch_row($sql_cmd_att);
				   $nbre_max_pax=$sql_cmd_attr[1];
				   $nom_type_chambre=$sql_cmd_attr[0];
				   $nomaffiche_type_chambre=$sql_cmd_attr[2];
  
  
  
		 ?>
                   
                       
                                    
                           <div class="col-sm-6 col-md-12 liste1" style="text-align:left;">
                                        <hr>
                                       <table class="nbrechambre"><tr>
                                       <td style="width:200px;">
                                            <label><?php echo $nomaffiche_type_chambre;?></label></td><td>
                                                <select  onChange="display('<?php echo $nom_type_chambre;?>', this.options[this.selectedIndex].value)" name="nb_chambre_<?php echo $nom_type_chambre;?>" id="nb_chambre_<?php echo $nom_type_chambre;?>" style="">

   <?php
						if(isset($_POST["nb_chambre_$nom_type_chambre"])){
							echo '<option  selected  value="'.$_POST["nb_chambre_$nom_type_chambre"].'" >'.$_POST["nb_chambre_$nom_type_chambre"].'</option>';
							}else
						
						?>    
<?php for($k=0; $k<20; $k++){?>

                											<option  value="<?php echo $k;?>"><?php echo $k;?></option>

<?php }?>                                                    
                                                    
                                                </select></td></tr></table>
                                       <br>
                                   
                                  <?php for($i=0; $i<20; $i++){
									  
									
									  ?> 
                                    <div class="form-group row" id="<?php echo $nom_type_chambre;?><?php echo $i;?>" 
          <?php if((isset($_POST["adultes_$nom_type_chambre$i"]) ||  isset($_POST["enfants_$nom_type_chambre$i"])) && isset($_POST["nb_chambre_$nom_type_chambre"]) && $_POST["nb_chambre_$nom_type_chambre"]!=0){}else{echo 'style="display:none;"';}                          
                                    
                                    
                             ?>   >    
                                    
                                    
                                   
                                      <div class="col-sm-6 col-md-12">
             <table class="col-md-12">
                <tr style="border-bottom:1px solid #ccc; height:45px;">
                  <td>Chambre <?php echo $i+1;?>  en  <select  onChange="calcul_hotel()" name="id_arrangement_<?php echo $nom_type_chambre;?><?php echo $i;?>"  id="id_arrangement_<?php echo $nom_type_chambre;?><?php echo $i;?>" class="full-width">
                                                    
                                                          <?php
						if(isset($_POST["id_arrangement_$nom_type_chambre$i"])){
							echo '<option  selected  value="'.$_POST["id_arrangement_$nom_type_chambre$i"].'" >'.nom_tarif($_POST["id_arrangement_$nom_type_chambre$i"]).'</option>';
							}
						
						?>  
<?php                            $sql_tarifs=mysql_query("select arrangement from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						foreach($affichetarif as $valaff){
							if($valaff!="0"){
						$sqlnomtarif=mysql_query("select nom from arrangement where id='".$valaff."'");
						$exe=mysql_fetch_row($sqlnomtarif);
						$nomtarif=$exe[0];
						?>
                                                            
                      
                        <option value="<?php echo $valaff;?>"><?php echo $nomtarif;?></option>
                        
                        <?php
						
							}}
						
						?></select></td>
                </tr>
                <?php 
				
				$reductions=$res['reductions'];
		  $reductions1=explode("-", $reductions);
		  $listereductions=implode(",", $reductions1);
		  
		   $sql_reductions=mysql_query("select * from reduction_hotel  where id in(".$listereductions.") GROUP BY age1,age2 ");   
		   $num=mysql_num_rows($sql_reductions);  
		   
		   ?>                            
               <tr style="height:45px;">   
                <td></td>  
                <td colspan="3"><font>Adultes</font></td>
                <td> <select 
               onChange="change_single('adultes','<?php echo $nom_type_chambre;?>',<?php echo $i;?>,<?php echo $num;?>,<?php echo $num;?> ,this.options[this.selectedIndex].value,<?php echo $nbre_max_pax;?>);" 
               
               id="adultes_<?php echo $nom_type_chambre;?><?php echo $i;?>" name="adultes_<?php echo $nom_type_chambre;?><?php echo $i;?>" >
    <?php
						if(isset($_POST["adultes_$nom_type_chambre$i"]) && isset($_POST["nb_chambre_$nom_type_chambre"]) && $_POST["nb_chambre_$nom_type_chambre"]!=0){
							echo '<option  selected  value="'.$_POST["adultes_$nom_type_chambre$i"].'" >'.$_POST["adultes_$nom_type_chambre$i"].' adulte(s)</option>';
							}else{
								
								
								}
						
						?>                             
                                 
                                 
                                                                                         <?php for($k=0; $k<=$nbre_max_pax;$k++){?>    
                											<option  value="<?php echo $k;?>"><?php echo $k;?> adulte(s)</option>
                                                            <?php }?>
                                                    </select></td>    </tr>
                                                                                      

             
                                                          
                  <?php 
                     $numen=0;				
                  while($rsql_reductions=mysql_fetch_array($sql_reductions)){  
                  
                  ?> 
                   <tr  style="height:45px;">  
                   <td></td>                        
                     <td colspan="3"> 
                  <font>Enfant(s) entre <?php echo $rsql_reductions['age1'];?> et <?php echo $rsql_reductions['age2'];?></font>                </td><td>                    
                    <select id="enfants_<?php echo $nom_type_chambre;?><?php echo $i;?><?php echo $numen;?>" 
                    name="enfants_<?php echo $nom_type_chambre;?><?php echo $i;?><?php echo $numen;?>"  class="full-width" 
                            onChange="change_single('enfants','<?php echo $nom_type_chambre;?>',<?php echo $i;?>,<?php echo $numen;?>,<?php echo $num;?> ,this.options[this.selectedIndex].value,<?php echo $nbre_max_pax;?>);" >
                                                             
                             <?php for($k=0; $k<=$nbre_max_pax;$k++){?>    
                            <option  value="<?php echo $k;?>"><?php echo $k;?> enfant(s)</option>
                               <?php }?>
                  </select>
                                                            
                                     </td>
                                                       
                                
                                                </tr>                                      
                   <?php  $numen++;}?>                        
                                                    
                                                    
                                                    
                                     
              </table>
                                        
                                        
          </div>
                                        </div>
                                    <?php }?>
  <!-- fin chambre sungle-->                                  
                             </div>
                    <?php }}?>                                                                      
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                    
                                                                        
                                                                        
                                                                    </div>
              <div class="form-group" style="width:100%; text-align:left;" >
                                        
                                        
                                        
  <?php                           
   $sql_option=mysql_query("select options_hotel from hotel where id_hotel='".$_GET['id_hotel']."' ");        
   $resoption1=mysql_fetch_row($sql_option);
				  		$resoption=$resoption1[0];
				if(mysql_num_rows($sql_option)!=0) echo "Options:<br>";

				  		$afficheoption=explode("-", $resoption);
						$iops=0;
						foreach($afficheoption as $valaffs){
							if($valaffs!="0"){
						$sqlnomop=mysql_query("select nom , id from option_hotel where id='".$valaffs."'");
						$exes=mysql_fetch_row($sqlnomop);
						$nomoption=$exes[0];
						$id_option=$exes[1];
						?>                                      
                                        
                                        
                                        <div class="checkbox" >
                                            <label>
<input onClick="calcul_hotel()" type="checkbox" name="options" id="options<?php echo $iops;?>" value="<?php echo $id_option;?>"> <span class="skin-color"> <?php echo $nomoption;?> </span> 
  </label>
                                        </div>
                            <?php $iops++;}}$totaloptions=$iops;?>  
                            
      
        <?php                           
   $sql_option=mysql_query("select supplement_hotel from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$resoption1=mysql_fetch_row($sql_option);
				  		$resoption=$resoption1[0];
						if(mysql_num_rows($sql_option)!=0) echo "Suppléments:<br>";
				  		$afficheoption=explode("-", $resoption);
						$isup=0;
						foreach($afficheoption as $valaffs){
							if($valaffs!="0"){
						$sqlnomop=mysql_query("select nom , id from supplement_hotel where id='".$valaffs."'");
						$exes=mysql_fetch_row($sqlnomop);
						$nomoption=$exes[0];
						$id_option=$exes[1];
						?>                                      
                                        
                                        
                                        <div class="checkbox" >
                                            <label>
<input onClick="calcul_hotel()" type="checkbox" name="supplement_hotel" id="supplement_hotel<?php echo $isup;?>" value="<?php echo $id_option;?>"> <span class="skin-color"> <?php echo $nomoption;?> </span> 
  </label>
                                        </div>
                            <?php $isup++; }} $totalsupp=$isup;?>           
                                    </div >
                                                        
                                                            </div>
                                                     
                                                            <div class="find-widget find-hotel-widget widget new-style" style="margin-left:10px; float:left; width:39%; background-color: #ffffff;">
                                                            <h4 class="title-widgets" style="color:#144f75">Panier</h4>
                                                            
                                                                 
                                                                 <div id="affichage"></div>
                                                                 
                                                                
                                                                 
    
						
					
						
                      <button type="button" onClick="javascript: test()" data-hover="Réserver" class="btn btn-slide"   style="background-color:#144f75;"><span class="text"  style="color:#fff !important; ">Réserver</span></button>
					 
						 
                                                                                   
                          <div id="msjerreur" style="color:#F00;"></div>                                       
                                                                 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>    
                                
                                    </form>
                                 <div class="wrapper-journey" style="padding-bottom:45px;">
                                    
                                   <?php echo arrangement($res['id_hotel']);?>
                                </div>
                            </div>     
                            
                            <div><h3 class="title-style-3">Description</h3>
                        
                        <?php 
										   
										   
										   echo $res['description'];?>
                                           
                                           
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
        <?php include("assets2/js/pages/hotel-view.php");?>

<!--<script src="assets/js/pages/hotel-view.js"></script>-->

	
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
		function change_single(selecto,idarr,i,numen,nummax,val,maxval){
		var reste=parseInt(maxval)-parseInt(val);
		
		if(selecto=='adultes')
		{
			
			for(var j=0; j<nummax;j++){
				if(reste>0) {document.getElementById('enfants_'+idarr+i+j).value = reste;reste=0;	}
                 else   { document.getElementById('enfants_'+idarr+i+j).value = 0;	}

			}
		}
		
		 else if(selecto=='enfants'){
			var adulte=document.getElementById('adultes_'+idarr+i).value;
			var maxu=parseInt(maxval)-parseInt(adulte);
			if(val<=maxu) var reste=parseInt(maxval)-parseInt(adulte)-parseInt(val);
			 else 
			{   document.getElementById('enfants_'+idarr+i+numen).value=maxu;
				var reste=0;
			}
			for(var j=0; j<nummax;j++){
            if(j!=numen){
				 if(reste>0) {document.getElementById('enfants_'+idarr+i+j).value = reste;}
				 else{ document.getElementById('enfants_'+idarr+i+j).value = 0;}
			}
			
			}
			
		}
				
       calcul_hotel();	
		}
		
		
		

function calcul_hotel()
{
var checkin=document.getElementById('checkin').value;
var checkout=document.getElementById('checkout').value;

var supplement_hotel='0';
var options_g='0';
var varl='x';
for ( i0=0;i0< <?php echo $totalsupp;?>;i0++)
{
    if(document.getElementById('supplement_hotel'+i0).checked)
    {        
    supplement_hotel+=', '+document.getElementById('supplement_hotel'+i0).value;       
    }
}


for ( i1=0;i1< <?php echo $totaloptions;?>;i1++)
{
    if(document.getElementById('options'+i1).checked)
    {        
    options_g+=', '+document.getElementById('options'+i1).value;       
    }
}
       

var resulte = file('vide_save_result.php');
if(checkin=='' ||checkout==''){message('Selectionner les dates');}else{
     var tot=1;                                                              
<?php 
				   $sql_cmds=mysql_query("select type_chambre from hotel where id_hotel='".$_GET['id_hotel']."'");
				   $re_cmds=mysql_fetch_row($sql_cmds);
				   $types_chambres=explode('-', $re_cmds[0]);
				   foreach($types_chambres as $val_type_chambres){
					   if($val_type_chambres!=0){
						   
						             
				   $sql_cmd_atts=mysql_query("select id, image, nom from type_chambre where id='".$val_type_chambres."'");
				   $sql_cmd_attrs=mysql_fetch_row($sql_cmd_atts);
				   $nbre_max_paxs=$sql_cmd_attrs[1];
				   $nom_type_chambres=$sql_cmd_attrs[0];
				   $nomaffiche_type_chambres=$sql_cmd_attrs[2];
 ?>
                   
                   var selectt=  document.getElementById('nb_chambre_<?php echo $nom_type_chambres;?>');
				   var nbrechambre=selectt.options[selectt.selectedIndex].value;
				   for(var i=0; i<nbrechambre; i++){
					   
				   var selectadulte=  document.getElementById('adultes_<?php echo $nom_type_chambres;?>'+i);
				   var nbreadulte=selectadulte.options[selectadulte.selectedIndex].value;
				  
				  var nbreenfantl="0";
				  
				   <?php 
				   
				   	
		  $reductions=$res['reductions'];
		  $reductions1=explode("-", $reductions);
		  $listereductions=implode(",", $reductions1);
		   $sql_reductions=mysql_query("select * from reduction_hotel  where id in(".$listereductions.") GROUP BY age1,age2 ");   
		   $num=mysql_num_rows($sql_reductions);  
                     $numen=0;				
                  while($rsql_reductions=mysql_fetch_array($sql_reductions)){  
                  ?> 
				   var selectenfant=  document.getElementById('enfants_<?php echo $nom_type_chambres;?>'+i+'<?php echo $numen;?>');
				   var nbreenfant=selectenfant.options[selectenfant.selectedIndex].value;
				   	 nbreenfantl+="_<?php echo $rsql_reductions['id']?>="+nbreenfant;

				   <?php  $numen++;}?>
				   
				    var sarrangement=  document.getElementById('id_arrangement_<?php echo $nom_type_chambres;?>'+i);
				   var arrangement=sarrangement.options[sarrangement.selectedIndex].value;
				   
				     resulte="-(<?php echo $nom_type_chambres;?>,"+nbrechambre+","+nbreadulte+","+nbreenfantl+","+arrangement+")";
					 					 var resultex = file('save_result.php?id_hotel='+resulte+'&taille='+tot);
tot++;
				   }
	<?php }?>
	
					 					
	<?php }?>			   
					   
    var resultex = file('savetotal.php?taille='+tot);
        if(texte = file('calcul_hotel.php?id_hotel='+escape(<?php echo $_GET['id_hotel'];?>)+'&checkin='+escape(checkin)+'&checkout='+escape(checkout)+'&supplement_hotel='+escape(supplement_hotel)+'&options_g='+escape(options_g)))
        {
			if(texte != 0){
			 document.getElementById('affichage').innerHTML=texte;
			}
			
 
        }
    
}
}
	function file(fichier)
{
     if(window.XMLHttpRequest) // FIREFOX
          xhr_object = new XMLHttpRequest();
     else if(window.ActiveXObject) // IE
          xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
     else
          return(false);
     xhr_object.open("GET", fichier, false);
     xhr_object.send(null);
     if(xhr_object.readyState == 4) return(xhr_object.responseText);
     else return(false);
}


function test(){
<?php if(empty($_SESSION['id_connect']))
		{echo "message('Vous devez vous connecter!')";}
	  else 
	     {echo "if(!document.getElementById('total') ){message('Panier vide!');}
		 		else if(document.getElementById('total').value==0 ){message('Panier vide!');}
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
	.liste1 input {  color:#000;}
	.liste1 font{height:30px;}
	.liste1 label{height:30px;}
	font.total{ font-size:24px;}
	font.total fontl{ font-size:20px;}

	</style>
</html>