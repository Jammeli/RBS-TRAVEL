
<?php include("connexion.php");


 if(!empty($_GET['session'])){

		if(isset($_GET['id'])) $id_tarif=$_GET['id']; else $id_tarif=0;
if(!empty($_SESSION['formtarif'][1])) $id_hotel=$_SESSION['formtarif'][1]; else $id_hotel="";

if(!empty($_SESSION['formtarif'][2]))
{
$ss=mysql_query("select nom from arrangement where id='".$_SESSION['formtarif'][2]."'");
$ssr=mysql_fetch_row($ss);
$nomarragement=$ssr[0];
$arrangement="<option  selected value=\"".$_SESSION['formtarif'][2]."\">".$nomarragement."</option>"; 
}
else $arrangement="";


if(!empty($_SESSION['formtarif'][3])) $datedepart=$_SESSION['formtarif'][3]; else $datedepart="";
if(!empty($_SESSION['formtarif'][4])) $datedefin=$_SESSION['formtarif'][4]; else $datedefin="";



if(!empty($_SESSION['formtarif'][5]))$delai_a=$_SESSION['formtarif'][5];else $delai_a="";  
if(!empty($_SESSION['formtarif'][6]))$delai_r=$_SESSION['formtarif'][6]; else $delai_r="";

if(!empty($_SESSION['formtarif'][7]))$nbre_nuit_min=$_SESSION['formtarif'][7];else $nbre_nuit_min=""; 
if(!empty($_SESSION['formtarif'][8]))$prix=$_SESSION['formtarif'][8];  else $prix="";

if(!empty($_SESSION['formtarif'][21]))$acompte=$_SESSION['formtarif'][21]; else $acompte="";
if(!empty($_SESSION['formtarif'][22]))$checkacompte=$_SESSION['formtarif'][22];  else $checkacompte="";

if(!empty($_SESSION['formtarif'][11]))$supp3emelit=$_SESSION['formtarif'][11];else $supp3emelit="";
if(!empty($_SESSION['formtarif'][12]))$check3emelit=$_SESSION['formtarif'][12];else $check3emelit="";
 
if(!empty($_SESSION['formtarif'][13]))$supp4emelit=$_SESSION['formtarif'][13];else $supp4emelit="";
if(!empty($_SESSION['formtarif'][14]))$check4emelit=$_SESSION['formtarif'][14];else $check4emelit="";

if(!empty($_SESSION['formtarif'][15]))$supp01=$_SESSION['formtarif'][15];else $supp01="";
if(!empty($_SESSION['formtarif'][16]))$checksupp01=$_SESSION['formtarif'][16];else $checksupp01="";

if(!empty($_SESSION['formtarif'][17]))$supp02=$_SESSION['formtarif'][17];else $supp02="";
if(!empty($_SESSION['formtarif'][18]))$checksupp02=$_SESSION['formtarif'][18];else $checksupp02="";

if(!empty($_SESSION['formtarif'][19]))$supp03=$_SESSION['formtarif'][19];else $supp03="";
if(!empty($_SESSION['formtarif'][20]))$checksupp03=$_SESSION['formtarif'][20];else $checksupp03="";

if(!empty($_SESSION['formtarif'][21]))$suppsingle=$_SESSION['formtarif'][9];else $suppsingle="";
if(!empty($_SESSION['formtarif'][22]))$checksuppsingle=$_SESSION['formtarif'][10];else $checksuppsingle="";
		
		
		
		}








/************************/

elseif(isset($_GET['id']) ){
	
	if($_GET['id_hotel']=="" || $_GET['id']=="") header("location: ajouter_tarifs.php");
	
		$select=mysql_query("select * from tarifs where id_hotel='".$_GET['id_hotel']."' and id='".$_GET['id']."'" );
		$resselect=mysql_fetch_array($select);
		$id_hotel=$resselect['id_hotel'];
		$id_tarif=$resselect['id'];


		$datedepart1=explode("-" ,$resselect['date_depart']);
		$datedefin2=explode("-" ,$resselect['date_fin']);
		$datedepart=$datedepart1[2]."/".$datedepart1[1]."/".$datedepart1[0];
		$datedefin=$datedefin2[2]."/".$datedefin2[1]."/".$datedefin2[0];


		$delai_a=$resselect['delai_a'];  
		$delai_r=$resselect['delai_r']; 
		$nbre_nuit_min=$resselect['nb_nuit_min']; 
		$prix=$resselect['prix'];  

			/**/
			if($resselect['acompte']!=""){
				$acompte1=$resselect['acompte'][strlen ($resselect['acompte'])-1]; 
				if($acompte1=="%") {$acompte=substr($resselect['acompte'],0,-1); $checkacompte="%";} 
					else {$acompte=$resselect['acompte'];$checkacompte="";} 
			}
			else {$acompte=$resselect['acompte'];$checkacompte="";} 
			/**/
			if($resselect['red_troisieme']!=""){
			
			$supp3emelit1=$resselect['red_troisieme'][strlen ($resselect['red_troisieme'])-1]; 
			if($supp3emelit1=="%") {$supp3emelit=substr($resselect['red_troisieme'],0,-1); $check3emelit="%";} 
			else {$supp3emelit=$resselect['red_troisieme'];$check3emelit="";} 
			}
			else {$supp3emelit=$resselect['red_troisieme'];$check3emelit="";} 
			
			/**/
			if($resselect['red_quatrieme']!=""){
			
			$supp4emelit1=$resselect['red_quatrieme'][strlen ($resselect['red_quatrieme'])-1]; 
			if($supp4emelit1=="%") {$supp4emelit=substr($resselect['red_quatrieme'],0,-1); $check4emelit="%";} 
			else {$supp4emelit=$resselect['red_quatrieme'];$check4emelit="";} 
			}
			else {$supp4emelit=$resselect['red_quatrieme'];$check4emelit="";} 
			
			
			/**/
			if($resselect['red2']!=""){
			
			$checksupp01x=$resselect['red2'][strlen ($resselect['red2'])-1]; 
			if($checksupp01x=="%") {$supp01=substr($resselect['red2'],0,-1); $checksupp01="%";} 
			else {$supp01=$resselect['red2'];$checksupp01="";} 
			}
			else {$supp01=$resselect['red2'];$checksupp01="";} 
			
			/**/
			if($resselect['red3']!=""){
			
			$checksupp02x=$resselect['red3'][strlen ($resselect['red3'])-1]; 
			if($checksupp02x=="%") {$supp02=substr($resselect['red3'],0,-1); $checksupp02="%";} 
			else {$supp02=$resselect['red3'];$checksupp02="";} 
			}
			else {$supp02=$resselect['red3'];$checksupp02="";} 
			
			/**/
			if($resselect['red4']!=""){
			
			$checksupp03x=$resselect['red4'][strlen ($resselect['red4'])-1]; 
			if($checksupp03x=="%") {$supp03=substr($resselect['red4'],0,-1); $checksupp03="%";} 
			else {$supp03=$resselect['red4'];$checksupp03="";} 
			
			}
			else {$supp03=$resselect['red4'];$checksupp03="";} 

			/**/
			if($resselect['suppsingle']!=""){
			
			$suppsingle1=$resselect['suppsingle'][strlen ($resselect['suppsingle'])-1]; 
			if($suppsingle1=="%") {$suppsingle=substr($resselect['suppsingle'],0,-1); $checksuppsingle="%";} 
			else {$suppsingle=$resselect['suppsingle'];$checksuppsingle="";} 
			}
			else {$suppsingle=$resselect['suppsingle'];$checksuppsingle="";} 
			



 
			$ss=mysql_query("select nom from arrangement where id='".$resselect['arrangement']."'");
			$ssr=mysql_fetch_row($ss);
			$nomarragement=$ssr[0];
			if(isset($_SESSION['formtarif'][2]) )$arrangement="<option  selected value=\"".$_SESSION['formtarif'][2]."\">".$nomarragement."</option>"; 





}else{
$id_tarif="0";
$id_hotel=$_GET['id_hotel'];

$datedepart="";
$datedefin="";

$arrangement="";
$delai_a="";  
$delai_r=""; 
$nbre_nuit_min=""; 
$prix="";  

$acompte="";
$checkacompte=""; 

$supp3emelit="";
$check3emelit=""; 
$supp4emelit="";
$check4emelit="";

$supp01="";
$checksupp01="";

$supp02="";
$checksupp02="";

$supp03="";
$checksupp03="";
$suppsingle="";
$checksuppsingle=""; 
	
	}


?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>ADMIN_RBS_TRAVEL</title>
<script src="ckeditor/ckeditor.js"></script>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/style-default.css" rel="stylesheet" id="style_color" />

    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

    <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
    <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script type="text/javascript">
                <!--
function open_infos(page,nom,largeur,hauteur,input)
{
if(input=='nbre_arrangement' ) var cmp=document.getElementById('nbre_arrangement').value;
else if(input=='nbre_supplement' ) var cmp=document.getElementById('nbre_supplement').value;
else if(input=='nbre_reduction' ) var cmp=document.getElementById('nbre_reduction').value;
else if(input=='nbre_suites' ) var cmp=document.getElementById('nbre_suites').value;
 var url="&cmp="+cmp;
   if(window.innerWidth)
                                {
                                        var leftv = (window.innerWidth-largeur)/2;
                                        var topv = (window.innerHeight-hauteur)/2;
                                }
                                else
                                {
                                        var leftv = (document.body.clientWidth-largeur)/2;
                                        var topv = (document.body.clientHeight-hauteur)/2;
                                }						
								
window.open(page+url,nom,'menubar=no, scrollbars=no, top='+topv+', left='+leftv+', width='+largeur+', height='+hauteur+'');
}
</script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <?php include("header.php");?>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <?php include("menu.php");?>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     <?php if(empty($_GET['id'])) echo "Ajouter "; else echo "modifier ";?>saison
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="recherche_hotels.php">H&ocirc;tels</a>
                           <span class="divider">/</span>
                       </li>
                       
                        <li>
                           <a href="hotels_menu.php?id_hotel=<?php echo $_GET['id_hotel'];?>"><?php echo nom_att('nom','hotel','id_hotel',$_GET['id_hotel']);?></a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="tarifs_hotel.php?id_hotel=<?php echo $_GET['id_hotel'];?>">Tarifs</a>
                           <span class="divider">/</span>
                       </li>
                       
                       
                       <li class="active">
                           <?php if(empty($_GET['id'])) echo "Ajouter "; else echo "Modifier ";?>
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action='function/ajout_tarifs.php' onSubmit="return test();" id="chgdept">

            <input type="hidden" name="id_hotel" value="<?php echo $id_hotel;?>">
            <input type="hidden" name="id_tarif" value="<?php echo $id_tarif;?>">
            <div class="alert alert-error" id="erreurG" style="display:none;">
                                <strong>Erreur!</strong>
                                <div  id="erreur"></div>
                            </div>
                          <div class="widget ">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Dates et d&eacute;lais
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            
                             
                            
                             
                             <div class="control-group">
                                <label class="control-label"> Date D&eacute;part</label>
                                        <div class="input-append date" id="dpMonths" data-date="102/2012"
                                             data-date-format="dd/mm/yyyy" data-date-viewmode="days"
                                             data-date-minviewmode="months">
                                            <input   name="datedepart" id="datedepart" class="m-ctrl-medium disabled" size="16" type="text" value="<?php echo $datedepart;?>"  readonly   >
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                    
                                    <div class="control-group">
                                <label class="control-label"> Date Fin</label>
                                        <div class="input-append date" id="dpMonths1" data-date="102/2012"
                                             data-date-format="dd/mm/yyyy" data-date-viewmode="days"
                                             data-date-minviewmode="months">
                                            <input   name="datedefin" id="datedefin" class="m-ctrl-medium disabled" size="16" type="text" value="<?php echo $datedefin;?>"  readonly   >
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    

                             <div class="control-group">
                                <label class="control-label">D&eacute;lai d'annulation</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="delai_a" id="delai_a" value="<?php echo $delai_a;?>" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">D&eacute;lai de retrocession</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="delai_r" id="delai_r" value="<?php echo $delai_r;?>"/>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Nombre des nuits minimal</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="nbre_nuit_min" id="nbre_nuit_min" value="<?php echo $nbre_nuit_min;?>"/>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- END FORM-->
                        </div>
                           
                            
                        </div>
                        
                        
                        <div class="widget ">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Param&eacute;trages
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            
                             
                            <div class="control-group">
                                <label class="control-label">Acompte</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="acompte" id="acompte" value="<?php echo $acompte;?>" />
                                        
                                        <input type="checkbox" name="checkacompte" value="%"   <?php  if($checkacompte=="%") echo "checked";?>><span class="add-on">%</span>
                                    </div>
                                </div>
                            </div>

                            <!-- END FORM-->
                        </div>
                           
                            
                        </div>
                        
                        
                        <div class="widget ">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Prix 
                            </h4>
                            
                            
                             <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                            
                            <span class="tools">
                            <a href="javascript: open_infos('popup_parametres_hotels.php?table=arrangement&id_hotel=<?php echo $_GET['id_hotel'];?>','popup_parametres_hotels','800','800','nbre_arrangement')" aria-hidden="true"><font class="icon icon-plus"></font>Ajouter Arrangement</a>
                            </span>
                        </div>
                        <div class="widget-body"  >
             
                             <div class="control-group">
                                <label class="control-label">Prix</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="prix" id="prix" value="<?php if(isset($prix) && $prix!='' )echo $prix; else echo 0;?>" /><span class="add-on">DT</span>
                                    </div>
                                </div>
                            </div>
                            
                            
                                                   
                          
                   <div  id="liste_arrangement" >
         
                            
                  <?php
				  $nbre_arrangement=0;
				  if(!isset($_GET['session'])){
				   $sql_tarifs=mysql_query("select arrangement from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						foreach($affichetarif as $valaff){
							if($valaff!="0"){
						$sqlnomtarif=mysql_query("select nom from arrangement where id='".$valaff."'");
						$exe=mysql_fetch_row($sqlnomtarif);
						$nomtarif=$exe[0];
						
						if(isset($_GET['id'])){
						$sqlprixetcheck=mysql_query("select arrangement from tarifs where id='".$_GET['id']."'");
						$exeprixetcheck=mysql_fetch_row($sqlprixetcheck);
						$prixetcheck=explode("-", $exeprixetcheck[0]);
						
								foreach($prixetcheck as $vlio){
							
							if($vlio!="D" && !empty($vlio)){
								$prixcheck2=explode("=",$vlio);
								if($prixcheck2[0]==$valaff){
									
									  $val1=explode("=",$prixcheck2[1]);
									
									  $checkval1=$val1[0][strlen ($val1[0])-1];
									  if($checkval1=="%") {
										  
										  $vval=substr($val1[0],0,-1);$checkval="%"; 
										  
										   }else{$vval=$val1[0];$checkval=""; }
										  
									  
									  
									  }
							}else{$vval="";$checkval=""; }
						}
						}else{
							
							$vval=""; $checkval="";
							}


                         ?>   
                            <div  class="control-group">
                                <label class="control-label">Suppl&eacute;ment <?php echo $nomtarif;?></label>
                                <div  class="controls">
                                    <div  class="input-prepend input-append">
                                        <input class=" " type="text" name="tarif_<?php echo $valaff;?>"  id="tarif_<?php echo $nbre_arrangement;?>" value="<?php if($vval=='x') echo '';else  echo $vval;?>" />
                                        <input type="checkbox" name="checktarif_<?php echo $valaff;?>"  id="checktarif_<?php echo $nbre_arrangement;?>" value="%" <?php 
										if($checkval=="%" )echo " checked ";?> ><span class="add-on">%</span>
                                        
                                       <a style="margin-left:50px;" href="javascript: if(confirm('Supprimer?')) supprimer_arrangement('<?php echo $_GET['id_hotel'];?>','<?php echo $valaff;?>','<?php echo $nbre_arrangement;?>');" ><span class="add-on">X</span></a>
                                    </div>
                                </div>
                            </div>
                            
                      <?php  $nbre_arrangement++;}}
					  
					  
				  }else{ echo $_SESSION['tarif'];}?>
                            
                            </div>
                                                    
                           <input type="hidden" value="<?php echo $nbre_arrangement;?>" id="nbre_arrangement"> 
                            
                        </div>
                           
                            
                        </div>
                        
                        <div class="widget ">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Suppl&eacute;ment
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                            
                              <span class="tools">
                            <a href="javascript: open_infos('popup_supplement_hotel.php?table=arrangement&id_hotel=<?php echo $_GET['id_hotel'];?>','popup_supplement_hotel','800','800','nbre_supplement')" aria-hidden="true"><font class="icon icon-plus"></font>Ajouter Supplément</a>
                            </span>
                            
                            
                        </div>
                        <div class="widget-body" >
             
                             <div class="control-group">
                                <label class="control-label">Suppl&eacute;ment single</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                        <input class=" " type="text" name="suppsingle"  value="<?php echo $suppsingle;?>"/>
                        <input type="checkbox" name="checksuppsingle"  value="%" <?php  if($checksuppsingle=="%") echo "checked";?>><span class="add-on">%</span>

                                    </div>
                                </div>
                                
                      
                     
                            </div>
                            
                       
                              <!-- tarifsssssssssssssssss-->
                            
             <div  id="liste_supplement">
        
                  <?php
                  $nbre_supplement=0;
				  
				  if(!isset($_GET['session'])){
				   $sql_tarifs=mysql_query("select supplement_hotel from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						foreach($affichetarif as $valaff){
							if($valaff!="0"){
						$sqlnomtarif=mysql_query("select nom,min_pax,pax_chambre,obligatoire from supplement_hotel where id='".$valaff."'");
						$exe=mysql_fetch_row($sqlnomtarif);
						$nomtarif=$exe[0];
						$min_pax=$exe[1];
						$pax_chambre=$exe[2];
						$obligatoire=$exe[3];
						
						if($obligatoire==1) $obl=" (Oblig) "; else $obl= " (Non Oblig)";
		                if($pax_chambre==0) $obl2=" (par pièce) "; else $obl2= " (Par PAX: mininum=".$min_pax.")";
						$optionsupp=$obl.$obl2;
						
						
						if(isset($_GET['id'])){
						$sqlprixetcheck=mysql_query("select supplement_hotel from tarifs where id='".$_GET['id']."'");
						$exeprixetcheck=mysql_fetch_row($sqlprixetcheck);
						$prixetcheck=explode("-", $exeprixetcheck[0]);
						
								foreach($prixetcheck as $vlio){
							
							if($vlio!="D" && !empty($vlio)){
								$prixcheck2=explode("=",$vlio);
								if($prixcheck2[0]==$valaff){
									
									  $val1=explode("=",$prixcheck2[1]);
									
									  $checkval1=$val1[0][strlen ($val1[0])-1];
									  if($checkval1=="%") {
										  
										  $vval=substr($val1[0],0,-1);$checkval="%"; 
										  
										   }else{$vval=$val1[0];$checkval=""; }
										  
									  
									  
									  }
							}else{$vval="";$checkval=""; }
						}
						}else{
							
							$vval=""; $checkval="";
							}


                         ?>   
                            <div class="control-group">
                                <label class="control-label"><?php echo $nomtarif;?> <?php echo $optionsupp;?></label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" id="supplement_hotel_<?php echo $nbre_supplement;?>" name="supplement_hotel_<?php echo $valaff;?>" value="<?php echo $vval;?>" />
                                        <input type="checkbox" id="checksupplement_hotel_<?php echo $nbre_supplement;?>"  name="checksupplement_hotel_<?php echo $valaff;?>" value="%" <?php 
										if($checkval=="%" )echo " checked ";?> ><span class="add-on">%</span>
                                        
                                        <a style="margin-left:50px;" href="javascript: if(confirm('Supprimer?')) supprimer_supplement('<?php echo $_GET['id_hotel'];?>','<?php echo $valaff;?>','<?php echo $nbre_supplement;?>');" ><span class="add-on">X</span></a>
                                    </div>
                                </div>
                            </div>
                            
                      <?php $nbre_supplement++; }}
					  
					  
				  }else{ echo $_SESSION['supplement_hotel'];}?>
                            
                            </div>
                                                        <!-- fiiiiiiiiiin    tarifsssssssssssssssss-->
                            
                            
                            
                          
                              
                       
                           <input type="hidden" value="<?php echo $nbre_supplement;?>" id="nbre_supplement"> 
                           
                            
                            
                            
                            
                        </div>
                           
                            
                        </div>
                        
                        <div class="widget ">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> R&eacute;ductions
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                            
                              <span class="tools">
                            <a href="javascript: open_infos('popup_reduction_hotel.php?id_hotel=<?php echo $_GET['id_hotel'];?>','popup_reduction_hotel','800','800','nbre_reduction')" aria-hidden="true"><font class="icon icon-plus"></font>Ajouter Réduction</a>
                            </span>
                        </div>
                        <div class="widget-body">
                            
                                    <div class="control-group">
                                <label class="control-label">R&eacute;duction 3&eacute;me lit</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                        <input class=" " type="text" name="supp3emelit"  value="<?php echo $supp3emelit;?>"/>
                        <input type="checkbox" name="check3emelit"  value="%"   <?php  if($check3emelit=="%") echo "checked";?>><span class="add-on">%</span>

                                    </div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">R&eacute;duction 4&eacute;me lit</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                        <input class=" " type="text" name="supp4emelit" value="<?php echo $supp4emelit;?>"/>
                        <input type="checkbox" name="check4emelit"   value="%" <?php  if($check4emelit=="%") echo "checked";?>  ><span class="add-on">%</span>

                                    </div>
                                </div>
                            </div>
                            <div id="liste_reduction">
                            <?php
							$nbre_reduction=0;
                              $sql_tarifs=mysql_query("select reductions from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						foreach($affichetarif as $valaff){
						
							if($valaff!="0"){
						$sqlnomtarif=mysql_query("select nom,age1, age2, id from reduction_hotel where id='".$valaff."'");
						$exe=mysql_fetch_row($sqlnomtarif);
						$nomtarif=$exe[0].' entre '.$exe[1].' et '.$exe[2];
						
						if(isset($_GET['id'])){
						$sqlprixetcheck=mysql_query("select reductions from tarifs where id='".$_GET['id']."'");
						$exeprixetcheck=mysql_fetch_row($sqlprixetcheck);
						$prixetcheck=explode("-", $exeprixetcheck[0]);
						
								foreach($prixetcheck as $vlio){
							
							if($vlio!="D" && !empty($vlio)){
								$prixcheck2=explode("=",$vlio);
								$val1=explode("=",$vlio);
								if($prixcheck2[0]==$valaff){
									
									  $checkval11=$val1[1][strlen ($val1[1])-1];
									  $checkval12=$val1[2][strlen ($val1[2])-1];
									  $checkval13=$val1[3][strlen ($val1[3])-1];
									  if($checkval11=="%") {$vval1=substr($val1[1],0,-1);$checkval1="%";}else{$vval1=$val1[1];$checkval1=""; }
									  if($checkval12=="%") {$vval2=substr($val1[2],0,-1);$checkval2="%";}else{$vval2=$val1[2];$checkval2=""; }
									  if($checkval13=="%") {$vval3=substr($val1[3],0,-1);$checkval3="%";}else{$vval3=$val1[3];$checkval3=""; }
										  
									  
									  
									  }
							}else{$vval1="";$checkval1="";$vval2="";$checkval2="";$vval3="";$checkval3=""; }
						}
						}else{
							
							$vval1=""; $checkval1="";
							$vval2=""; $checkval2="";
							$vval3=""; $checkval3="";
							}


                         ?>   
                         
                         
                            <div class="control-group">
                                <label class="control-label"><?php echo $nomtarif;?></label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                       
                                  
                                     <input style="width:75px !important; " type="text" disabled  value=" 1e Enfant" />
            						 <input class=" " type="text" name="reduction_hotel_1<?php echo $valaff;?>" id="reduction_hotel_1<?php echo $nbre_reduction;?>" value="<?php echo $vval1;?>" />
                                        <input type="checkbox" name="checkreduction_hotel_1<?php echo $valaff;?>"  id="checkreduction_hotel_1<?php echo $nbre_reduction;?>" value="%" <?php 
										if($checkval1=="%" )echo " checked ";?> ><span class="add-on">%</span>
                                        
                                        
                                        
                                        <input style="width:95px !important; margin-left:10px;"  type="text" disabled  value="2ème Enfants" />   <input class=" " type="text" name="reduction_hotel_2<?php echo $valaff;?>"  id="reduction_hotel_2<?php echo $nbre_reduction;?>" value="<?php echo $vval2;?>" />
                                        <input type="checkbox" name="checkreduction_hotel_2<?php echo $valaff;?>"  id="checkreduction_hotel_2<?php echo $nbre_reduction;?>" value="%" <?php 
										if($checkval2=="%" )echo " checked ";?> ><span class="add-on">%</span>
                                        
                                        
                                        
                                          <input  style="width:95px !important; margin-left:10px;" type="text" disabled  value="3ème Enfants" /> <input class=" " type="text" name="reduction_hotel_3<?php echo $valaff;?>"  id="reduction_hotel_3<?php echo $nbre_reduction;?>" value="<?php echo $vval3;?>" />
                                        <input type="checkbox" name="checkreduction_hotel_3<?php echo $valaff;?>"  id="checkreduction_hotel_3<?php echo $nbre_reduction;?>" value="%" <?php 
										if($checkval3=="%" )echo " checked ";?> ><span class="add-on">%</span>
                                        <a style="margin-left:50px;" href="javascript: if(confirm('Supprimer?')) supprimer_reduction('<?php echo $_GET['id_hotel'];?>','<?php echo $valaff;?>','<?php echo $nbre_reduction;?>');" ><span class="add-on">X</span></a>
                                        
                                    </div>
                                </div>
                            </div>
                            
                      <?php  $nbre_reduction++;}}
					  
					  
					  
					  ?>
                            
                            
                            </div>
                            
                       
                       <input type="hidden" value="<?php echo $nbre_reduction;?>" id="nbre_reduction"> 

                          
                           
                          
                        </div>
                           
                            
                        </div>
                          
    <div class="widget ">
                        <div class="widget-title">
                            
                             <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                            
                         <?php if(isset( $_GET['id'])){?>   <span class="tools">
                            <a href="javascript: open_infos('popup_ajouter_suite.php?table=arrangement&id_hotel=<?php echo $_GET['id_hotel'];?>&id_tarif=<?php echo $_GET['id'];?>','popup_parametres_hotels','800','800','nbre_suites')" aria-hidden="true"><font class="icon icon-plus"></font>Ajouter suite</a>
                            </span><?php }?>
</div><br>
<br>
                            <div id="liste_suites">

         <!-- menna-->
         <?php $type_chambre=nom_att('type_chambre','hotel','id_hotel',$_GET['id_hotel']);
		 
$liste=explode("-",$type_chambre);
$cmp=0;
foreach($liste as $val){
	$type_piece=nom_att('type','type_chambre','id',$val);
	if($type_piece=='suite'){	
	
	
		$nom_piece=nom_att('nom','type_chambre','id',$val);
		$calcul=nom_att('calcul','type_chambre','id',$val);
	 if($calcul=='pax') $par=" par PAX"; else $par=" par suite";
		 ?>
				         
                          <div class="widget ">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> <?php echo $nom_piece;?> 
                            </h4>
                            
                            
                             <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                            
                            <span class="tools">
                            <a  aria-hidden="true">( Les montants sera calculer <?php echo $par;?>)</a>
                            </span>       
                            
                            
                             <?php if(isset( $_GET['id'])){?><span class="tools">
                            <a style="margin-left:50px;" href="javascript: if(confirm('Supprimer?')) supprimer_suite('<?php echo $_GET['id_hotel'];?>','<?php echo $val;?>','<?php echo $cmp;?>','<?php echo $_GET['id'];?>');" ><span class="add-on">X</span></a>
                            </span><?php }?>
                            

                        </div>
                        <div class="widget-body"  >
             
                             
                            
                            
                                                   
                          
         
                            
                  <?php
				  $nbre_suites=0;
				 if(isset($_GET['id'])){
				   $sql_tarifs=mysql_query("select suites from tarifs where id='".$_GET['id']."' ");          				
				   $restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("+", $restafis);
						foreach($affichetarif as $valaff){
							if($valaff!="D"){
								
						$chaine=substr($valaff,0,-1);
						$chaine=substr($chaine,1);
						$listetarif=explode("-", $chaine);
						$i=0;
							if(isset($listetarif[0])) $idsuite=$listetarif[0]; else $idsuite=0;
						if(isset($listetarif[1])) $prixbase=$listetarif[1]; else $prixbase=0;
						if(isset($listetarif[2])) $suppsingle_suite=$listetarif[2]; else $suppsingle_suite=0;
						foreach($listetarif as $valliste){
							
					

							
							
						if($idsuite==$val){	
						if($i==1){?>
							
							<div class="control-group">
                                <label class="control-label">Prix</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="prix_suite_<?php echo $idsuite;?>" id="prix_suite_<?php echo $idsuite;?>" value="<?php if(isset($prixbase) && $prixbase!='' )echo $prixbase; else echo 0;?>" /><span class="add-on">DT</span>
                                    </div>
                                </div>
                            </div>
							
							<?php }
						elseif($i==2){?>
							
							<div class="control-group">
                                <label class="control-label">Supplément single</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="suppsingle_suite_<?php echo $idsuite;?>" id="suppsingle_suite_<?php echo $idsuite;?>" value="<?php if(isset($suppsingle_suite) && $suppsingle_suite!='' )echo $suppsingle_suite; else echo '';?>" /><span class="add-on">DT</span>
                                    </div>
                                </div>
                            </div>
							
							<?php }
						if($i>2) {
							
							$val1=explode("=",$valliste);
							 $nomtarif=nom_att('nom','arrangement','id',$val1[0]);
							$id_arr=$val1[0];
							
							if(isset($val1[1]) && $val1[1]!=''){
							  $checkval1=$val1[1][strlen ($val1[1])-1];
							  if($checkval1=="%") {
								  $vval=substr($val1[1],0,-1);$checkval="%"; 
										  
							  }else{$vval=$val1[1];$checkval=""; }
							  }else{$vval='';$checkval=""; }
							  
							  
							  
							  
							  
										   
						   ?>   
                            <div  class="control-group">
                                <label class="control-label">Suppl&eacute;ment <?php echo $nomtarif;?></label>
                                <div  class="controls">
                                    <div  class="input-prepend input-append">
                                        <input class=" " type="text" name="tarifsuite_<?php echo $val;?>_<?php echo $id_arr;?>"  id="tarif_suite_<?php echo $val;?>_<?php echo $nbre_arrangement;?>" value="<?php if($vval=='x') echo '';else  echo $vval;?>" />
                                        <input type="checkbox" name="checktarifsuite_<?php echo $val;?>_<?php echo $id_arr;?>"  id="checktarif_suite_<?php echo $val;?>_<?php echo $nbre_arrangement;?>" value="%" <?php 
										if($checkval=="%" )echo " checked ";?> ><span class="add-on">%</span>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            
                      <?php 
						
						}
						
						
						$i++;
						
						}
						
						
						
					
						}
						
						


                         ?>   
                            
                            
                      <?php  $nbre_arrangement++;}}
					  
				 }
				 
				 else{?>
                 <div class="control-group">
                                <label class="control-label">Prix</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="prix_suite_<?php echo $val;?>" id="prix_suite_<?php echo $val;?>" value="" /><span class="add-on">DT</span>
                                    </div>
                                </div>
                            </div>
				
                <div class="control-group">
                                <label class="control-label">Supplément single</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="suppsingle_suite_<?php echo $val;?>" id="suppsingle_suite_<?php echo $suppsingle_suite;?>" value="" /><span class="add-on">DT</span>
                                    </div>
                                </div>
                            </div>			
							
							<?php


						$nbre_suites=0;
						
						  $sql_tarifs=mysql_query("select arrangement from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$listetarif=explode("-", $restafis);
						foreach($listetarif as $valliste){
							if($valliste!="0"){
							
														  
							 $nomtarif=nom_att('nom','arrangement','id',$valliste);

										   
					   ?><div  class="control-group">
                                <label class="control-label">Suppl&eacute;ment <?php echo $nomtarif;?></label>
                                <div  class="controls">
                                    <div  class="input-prepend input-append">
                                        <input class=" " type="text" name="tarifsuite_<?php echo $val;?>_<?php echo $valliste;?>"  id="tarif_suite_<?php echo $val;?>_<?php echo $nbre_suites;?>" value="" />
                                        <input type="checkbox" name="checktarifsuite_<?php echo $val;?>_<?php echo $valliste;?>"  id="checktarif_suite_<?php echo $val;?>_<?php echo $nbre_arrangement;?>" value="%" ><span class="add-on">%</span>
                                        
                                       
                                    </div>
                                </div>
                            </div><?php 
						
						}}
					 
					 
					 
					 
					 }
				?>
                                                    
                            
                        </div>
                           
                            
                        </div>  
                        
                        
<?php $cmp++; $nbre_suites++; }?>  

                                  
<?php } ?>                                    
         <!-- fin menna-->
</div>
                       <input type="hidden" value="<?php if(isset($nbre_suites)) echo $nbre_suites;?>" id="nbre_suites"> 
				
				<div class="control-group">
					<div class="controls">
						
						<button type="submit"  name="ajouter" class="btn">Enregistrer</button>
					</div>
				</div>
                            
                            </form>

         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
</div>

   <!-- BEGIN FOOTER -->
   <div id="footer">
        RBS TRAVEL.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->

   <script src="js/jquery-1.8.2.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="js/jquery.blockui.js"></script>

   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <script src="js/jQuery.dualListBox-1.3.js" language="javascript" type="text/javascript"></script>


   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>



   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page-->
   <script src="js/form-component.js"></script>
  <!-- END JAVASCRIPTS -->

   <script language="javascript" type="text/javascript">

       $(function() {

           $.configureBoxes();

       });

   </script>

<script  type="text/javascript">
	
function supprimer_arrangement(id_hotel,id,num)
{
var nbre_arrangement=document.getElementById('nbre_arrangement').value;
var values =new Array();
var checked =new Array();

for(var i=0; i<nbre_arrangement;i++){
values[i]= document.getElementById('tarif_'+i).value;
if(document.getElementById('checktarif_'+i).checked==true) checked[i]= 1; else checked[i]= 0;

}
        if(texte = file('supprimer_arrangement.php?id_hotel='+escape(id_hotel)+'&id='+escape(id)))
        {
		
		
    			 document.getElementById('liste_arrangement').innerHTML=texte;
				 
				values.splice(num, 1);
				checked.splice(num, 1);
				
				 var x=document.getElementById('nbre_arrangement').value;
				 x=parseInt(x)-1;
				 document.getElementById('nbre_arrangement').value=x;

				 for(var i=0; i<x;i++){
					
						if(values[i]!='') document.getElementById('tarif_'+i).value=values[i];
						if(checked[i]==1) document.getElementById('checktarif_'+i).checked=true; 
						 else document.getElementById('checktarif_'+i).checked=false;
					
				
				} 
				
        }

 
}



	
function supprimer_supplement(id_hotel,id,num)
{
var nbre_supplement=document.getElementById('nbre_supplement').value;
var values =new Array();
var checked =new Array();

for(var i=0; i<nbre_supplement;i++){
values[i]= document.getElementById('supplement_hotel_'+i).value;
if(document.getElementById('checksupplement_hotel_'+i).checked==true) checked[i]= 1; else checked[i]= 0;

}
        if(texte = file('supprimer_supplement.php?id_hotel='+escape(id_hotel)+'&id='+escape(id)))
        {
		
		
    			 document.getElementById('liste_supplement').innerHTML=texte;
				 
				values.splice(num, 1);
				checked.splice(num, 1);
				
				 var x=document.getElementById('nbre_supplement').value;
				 x=parseInt(x)-1;
				 document.getElementById('nbre_supplement').value=x;

				 for(var i=0; i<x;i++){
					
						if(values[i]!='') document.getElementById('supplement_hotel_'+i).value=values[i];
						if(checked[i]==1) document.getElementById('checksupplement_hotel_'+i).checked=true; 
						 else document.getElementById('checksupplement_hotel_'+i).checked=false;
					
				
				} 
				
        }

 
}


function supprimer_reduction(id_hotel,id,num)
{
var nbre_reduction=document.getElementById('nbre_reduction').value;
var values1 =new Array();
var checked1 =new Array();
var values2 =new Array();
var checked2 =new Array();
var values3 =new Array();
var checked3 =new Array();

for(var i=0; i<nbre_reduction;i++){
values1[i]= document.getElementById('reduction_hotel_1'+i).value;
if(document.getElementById('checkreduction_hotel_1'+i).checked==true) checked1[i]= 1; else checked1[i]= 0;

values2[i]= document.getElementById('reduction_hotel_2'+i).value;
if(document.getElementById('checkreduction_hotel_2'+i).checked==true) checked2[i]= 1; else checked2[i]= 0;

values3[i]= document.getElementById('reduction_hotel_3'+i).value;
if(document.getElementById('checkreduction_hotel_3'+i).checked==true) checked3[i]= 1; else checked3[i]= 0;


}
        if(texte = file('supprimer_reduction.php?id_hotel='+escape(id_hotel)+'&id='+escape(id)))
        {
		
		
    			 document.getElementById('liste_reduction').innerHTML=texte;
				 
				values1.splice(num, 1);
				checked1.splice(num, 1);
				
				values2.splice(num, 1);
				checked2.splice(num, 1);
				
				values3.splice(num, 1);
				checked3.splice(num, 1);
				
				 var x=document.getElementById('nbre_reduction').value;
				 x=parseInt(x)-1;
				 document.getElementById('nbre_reduction').value=x;

				 for(var i=0; i<x;i++){
					
						if(values1[i]!='') document.getElementById('reduction_hotel_1'+i).value=values1[i];
						if(checked1[i]==1) document.getElementById('checkreduction_hotel_1'+i).checked=true; 
						 else document.getElementById('checkreduction_hotel_1'+i).checked=false;
					
						if(values2[i]!='') document.getElementById('reduction_hotel_2'+i).value=values2[i];
						if(checked2[i]==1) document.getElementById('checkreduction_hotel_2'+i).checked=true; 
						 else document.getElementById('checkreduction_hotel_2'+i).checked=false;
					
						if(values3[i]!='') document.getElementById('reduction_hotel_3'+i).value=values3[i];
						if(checked3[i]==1) document.getElementById('checkreduction_hotel_3'+i).checked=true; 
						 else document.getElementById('checkreduction_hotel_3'+i).checked=false;
					
				
				} 
				
        }

 
}




function supprimer_suite(id_hotel,id,num,id_tarif)
{
var nbre_supplement=document.getElementById('nbre_suites').value;
var values =new Array();
var checked =new Array();

for(var i=0; i<nbre_suites;i++){
values[i]= document.getElementById('tarifsuite_'+i).value;
if(document.getElementById('checktarifsuite_'+i).checked==true) checked[i]= 1; else checked[i]= 0;

}
        if(texte = file('supprimer_suite.php?id_hotel='+escape(id_hotel)+'&id='+escape(id)+'&id_tarif='+escape(id_tarif)))
        {
		
		
    			 document.getElementById('liste_suites').innerHTML=texte;
				 
				values.splice(num, 1);
				checked.splice(num, 1);
				
				 var x=document.getElementById('nbre_suites').value;
				 x=parseInt(x)-1;
				 document.getElementById('nbre_suites').value=x;

				 for(var i=0; i<x;i++){
					
						if(values[i]!='') document.getElementById('tarifsuite_'+i).value=values[i];
						if(checked[i]==1) document.getElementById('checktarifsuite_'+i).checked=true; 
						 else document.getElementById('checktarifsuite_'+i).checked=false;
					
				
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
	
	var test=true;
	
	 document.getElementById("erreur").innerHTML="";
	var datedepart=document.getElementById('datedepart').value;
	var datedefin=document.getElementById('datedefin').value;
	var delai_a=document.getElementById('delai_a').value;
	var delai_r=document.getElementById('delai_r').value;
	var nbre_nuit_min=document.getElementById('nbre_nuit_min').value;
	var acompte=document.getElementById('acompte').value;
	var prix=document.getElementById('prix').value;
	
		

	
	
	
	if(datedepart=="") {	

					document.getElementById("erreur").innerHTML += "Vous avez oublier la date de debut!.<br>";
					
					test=false;
	}
	if(datedefin=="") {	

					document.getElementById("erreur").innerHTML += "Vous avez oublier la date de fin!.<br>";
					test=false;
	}
		
	
var sdate2 = document.getElementById('datedefin').value
var date2 = new Date();
date2.setFullYear(sdate2.substr(6,4));
date2.setMonth(sdate2.substr(3,2));
date2.setDate(sdate2.substr(0,2));
date2.setHours(0);
date2.setMinutes(0);
date2.setSeconds(0);
date2.setMilliseconds(0);
var d2=date2.getTime()

var sdate1 = document.getElementById('datedepart').value
var date1 = new Date();
date1.setFullYear(sdate1.substr(6,4));
date1.setMonth(sdate1.substr(3,2));
date1.setDate(sdate1.substr(0,2));
date1.setHours(0);
date1.setMinutes(0);
date1.setSeconds(0);
date1.setMilliseconds(0);
var d1=date1.getTime()	
	
	
	if(d2 <= d1)
	 {	

					document.getElementById("erreur").innerHTML += "Verifier l'intervale des dates!.<br>";
					test=false;
	}
	
	
	
	
	if(delai_a=="") {	

							document.getElementById("erreur").innerHTML += "Vous avez oublier le d&eacute;lai  d'annulation !.<br>";
					
					test=false;
	}
	
	if(delai_r=="") {	

							document.getElementById("erreur").innerHTML += "Vous avez oublier le D&eacute;lai de retrocession !.<br>";
					
					test=false;
	}
	
	
	if(nbre_nuit_min=="") {	

					document.getElementById("erreur").innerHTML += "Vous avez oublier le Nombre des nuits minimal!.<br>";
					
					test=false;
	}
	
		if(acompte=="") {	

					document.getElementById("erreur").innerHTML += "Vous avez oublier l'acompte!.<br>";
					
					test=false;
	}
	
		if(prix=="") {	

					document.getElementById("erreur").innerHTML += "Le prix est obligatoire!.<br>";
					
					test=false;
	}
	
	

	
	
	
	
		if(test==false) {					
			document.getElementById("erreurG").style.display="";
			document.location.href="#";
		}else{document.getElementById("erreurG").style.display="none";}
	
	
	return test;
	
	
	
	}
	
	



</script>
<?php if(isset($_GET['session'])){?><script>alert('P&eacute;riode existe d&eacute;ja! veillez choisir une autre p&eacute;riode!');</script><?php }
?>
</body>
<!-- END BODY -->
</html>