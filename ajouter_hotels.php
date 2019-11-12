
<?php include("connexion.php");
if(isset($_GET['id_hotel'])){
	
	if($_GET['id_hotel']=="") header("location: ajouter_hotels.php");
$select=mysql_query("select * from hotel where id_hotel='".$_GET['id_hotel']."'");
$resselect=mysql_fetch_array($select);
$id_hotel=$resselect['id_hotel'];
$nom=$resselect['nom'];

$regionid=$resselect['region'];
$selectregion=mysql_query("select region from regions where id='".$regionid."'");
$resregion=mysql_fetch_row($selectregion);

$region='<option  value="'.$resselect['region'].'" >'.$resregion[0].' </option>';

$amenagement=$resselect['amenagement'];
$etoile='<option  value="'.$resselect['etoile'].'" >'.$resselect['etoile'].' &eacute;toiles</option>';


$description_courte=$resselect['description_courte'];
$description_courte= str_replace( "?", "'", $description_courte);

/*___________________________________________________affichage type chambre*/
$val1=$resselect['supplement_hotel'];
$supplement_hotel="";
$chaine="(";
$val2=explode("-",$val1);
foreach($val2 as $value){
	
										
	$sql=mysql_query("select * from supplement_hotel where id='".$value."'");
	$res=mysql_fetch_array($sql);
	
	if($res['obligatoire']==1) $obl=" (Oblig) "; else $obl= "(Non Oblig)";
			if($res['pax_chambre']==1) $obl2=" (par pièce) "; else $obl2= "(Par PAX: mininum=".$res['min_pax'].")";

	$jour= '';
	$r=explode(',',$res['jours']);
									
									foreach($r as $val){
		
													if($val==1) $jour.= "Lu,";
                                                    if($val==2) $jour.=  "Ma,";
                                                    if($val==3) $jour.=  "Me,";
                                                    if($val==4) $jour.=  "Je,";
                                                    if($val==5) $jour.=  "Ve,";
                                                    if($val==6) $jour.=  "Sa,";
                                                    if($val==7) $jour.=  "Di,";
										}
										
	if($value!=0) {$supplement_hotel.='<option  value="'.$value.'" >'.$res['nom'].''.$obl.$obl2.''.$jour.'</option>';}
     $chaine.="$value ,";
	}
$chaine.=" 0)";

$supplement_hotel0="";
$sql1=mysql_query("select * from supplement_hotel where id NOT IN $chaine ");
while($res1=mysql_fetch_array($sql1)){
	$jour= '';
		if($res1['obligatoire']==1) $obl=" (Oblig) "; else $obl= "(Non Oblig)";
		if($res1['pax_chambre']==1) $obl2=" (par pièce) "; else $obl2= "(Par PAX: mininum=".$res1['min_pax'].")";

	$r=explode(',',$res1['jours']);
									
									foreach($r as $val){
		
													if($val==1) $jour.= "Lu,";
                                                    if($val==2) $jour.=  "Ma,";
                                                    if($val==3) $jour.=  "Me,";
                                                    if($val==4) $jour.=  "Je,";
                                                    if($val==5) $jour.=  "Ve,";
                                                    if($val==6) $jour.=  "Sa,";
                                                    if($val==7) $jour.=  "Di,";
										}
	$supplement_hotel0.='<option  value="'.$res1['id'].'" >'.$res1['nom'].''.$obl.''.''.$obl2.''.$jour.'</option>';
}

/*___________________________________________________ fin affichage type chambre*/




/*___________________________________________________affichage reduction chambre*/
$val1=$resselect['reductions'];
$reductions="";
$chaine="(";
$val2=explode("-",$val1);
foreach($val2 as $value){
	$sql_reduction=mysql_query("select nom,age1,age2 from reduction_hotel where id='".$value."'") or die(mysql_error());
	$res_reduction=mysql_fetch_row($sql_reduction);
	if($value!=0) {$reductions.='<option  value="'.$value.'" >'.$res_reduction[0].' de '.$res_reduction[1].' à '.$res_reduction[2].'ans</option>';}
     $chaine.="$value ,";
	}
$chaine.=" 0)";

$reductions0="";
$sql_reduction1=mysql_query("select * from reduction_hotel where id NOT IN $chaine ")or die(mysql_error());
while($res_reduction1=mysql_fetch_array($sql_reduction1)){
         $reductions0.='  <option value="'.$res_reduction1['id'].'">'. $res_reduction1['nom'].' de '.$res_reduction1['age1'].'à '.$res_reduction1['age2'].'ans</option>';
}
/*___________________________________________________ fin affichage reduction chambre*/

/*___________________________________________________affichage type chambre*/
$val1=$resselect['type_chambre'];
$type_chambre="";
$chaine="(";
$val2=explode("-",$val1);
foreach($val2 as $value){
	$sql=mysql_query("select nom from type_chambre where id='".$value."'");
	$res=mysql_fetch_row($sql);
	if($value!=0) {$type_chambre.='<option  value="'.$value.'" >'.$res[0].'</option>';}
     $chaine.="$value ,";
	}
$chaine.=" 0)";

$type_chambre0="";
$sql1=mysql_query("select * from type_chambre where id NOT IN $chaine ");
while($res1=mysql_fetch_array($sql1)){
         $type_chambre0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}

/*___________________________________________________ fin affichage type chambre*/


/*___________________________________________________affichage optient hotel*/
$val1=$resselect['options_hotel'];
$option_hotel="";
$chaine="(";
$val2=explode("-",$val1);
foreach($val2 as $value){
	$sql=mysql_query("select nom from option_hotel where id='".$value."'");
	$res=mysql_fetch_row($sql);
	if($value!=0) {$option_hotel.='<option  value="'.$value.'" >'.$res[0].'</option>';}
     $chaine.="$value ,";
	}
$chaine.=" 0)";


$option_hotel0="";
$sql1=mysql_query("select * from option_hotel where id NOT IN $chaine ") or die(mysql_error());
while($res1=mysql_fetch_array($sql1)){
         $option_hotel0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}

/*___________________________________________________ fin affichage optient hotel*/
/*___________________________________________________affichage localisation*/
$val1=$resselect['localisation'];
$localisation="";
$chaine="(";
$val2=explode("-",$val1);
foreach($val2 as $value){
	$sql=mysql_query("select nom from localisation where id='".$value."'");
	$res=mysql_fetch_row($sql);
	if($value!=0) {$localisation.='<option  value="'.$value.'" >'.$res[0].'</option>';}
     $chaine.="$value ,";
	}
$chaine.=" 0)";


$localisation0="";
$sql1=mysql_query("select * from localisation where id NOT IN $chaine ") or die(mysql_error());
while($res1=mysql_fetch_array($sql1)){
         $localisation0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}

/*___________________________________________________ fin affiche localisation*/

/*___________________________________________________affichage arrangement*/

$val1=$resselect['arrangement'];
$arrangement="";
$chaine="(";
$val2=explode("-",$val1);
foreach($val2 as $value){
	$sql=mysql_query("select nom from arrangement where id='".$value."'");
	$res=mysql_fetch_row($sql);
	if($value!=0) {$arrangement.='<option  value="'.$value.'" >'.$res[0].'</option>';}
     $chaine.="$value ,";
	}
$chaine.=" 0)";


$arrangement0="";
$sql1=mysql_query("select * from arrangement where id NOT IN $chaine ") or die(mysql_error());
while($res1=mysql_fetch_array($sql1)){
         $arrangement0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}

/*___________________________________________________ fin affiche arrangement*/


/*___________________________________________________affichage themes*/
$val1=$resselect['theme'];
$theme="";
$chaine="(";
$val2=explode("-",$val1);
foreach($val2 as $value){
	$sql=mysql_query("select nom from theme where id='".$value."'");
	$res=mysql_fetch_row($sql);
	if($value!=0) {$theme.='<option  value="'.$value.'" >'.$res[0].'</option>';}
     $chaine.="$value ,";
	}
$chaine.=" 0)";


$theme0="";
$sql1=mysql_query("select * from theme where id NOT IN $chaine ") or die(mysql_error());
while($res1=mysql_fetch_array($sql1)){
         $theme0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}

/*___________________________________________________ fin affiche themes*/

/*___________________________________________________affichage amenagement*/
$val1=$resselect['amenagement'];
$amenagement="";
$chaine="(";
$val2=explode("-",$val1);
foreach($val2 as $value){
	$sql=mysql_query("select nom from amenagement where id='".$value."'");
	$res=mysql_fetch_row($sql);
	if($value!=0) {$amenagement.='<option  value="'.$value.'" >'.$res[0].'</option>';}
     $chaine.="$value ,";
	}
$chaine.=" 0)";


$amenagement0="";
$sql1=mysql_query("select * from amenagement where id NOT IN $chaine ") or die(mysql_error());
while($res1=mysql_fetch_array($sql1)){
         $amenagement0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}

/*___________________________________________________ fin affiche amenagement*/


$gmap=$resselect['gmap'];
$etat=$resselect['etat'];
$promo=$resselect['promo'];
$code=$resselect['code'];
$tel=$resselect['tel'];
$fax=$resselect['fax'];
$email=$resselect['email'];
$site=$resselect['site'];
$adresse=$resselect['adresse'];
$description_longue=$resselect['description'];
$tel2=$resselect['tel2'];
$email2=$resselect['email2'];
}else{
$id_hotel="0";
$nom="";
$region='<option value="">S&eacute;l&eacute;ctionner la r&eacute;gion</option>';
$amenagement="";
$etoile='<option  value="" >S&eacute;l&eacute;ctionner Nombre d\'&eacute;toile</option>';
$description_courte="";
$gmap="";


/*______________________________________________________________________________________________________*/
$supplement_hotel="";
$supplement_hotel0="";
$sql1=mysql_query("select * from supplement_hotel");
while($res1=mysql_fetch_array($sql1)){
		
$jour= '';
		if($res1['obligatoire']==1) $obl=" (Oblig) "; else $obl= "(Non Oblig)";
		if($res1['pax_chambre']==1) $obl2=" (par pièce) "; else $obl2= "(Par PAX: mininum=".$res1['min_pax'].")";
		
					$r=explode(',',$res1['jours']);
									
									foreach($r as $val){
		
													if($val==1) $jour.= "Lu,";
                                                    if($val==2) $jour.=  "Ma,";
                                                    if($val==3) $jour.=  "Me,";
                                                    if($val==4) $jour.=  "Je,";
                                                    if($val==5) $jour.=  "Ve,";
                                                    if($val==6) $jour.=  "Sa,";
                                                    if($val==7) $jour.=  "Di,";
										}
		$supplement_hotel0.='<option  value="'.$res1['id'].'" >'.$res1['nom'].''.$obl.''.''.$obl2.''.$jour.'</option>';

}
/*______________________________________________________________________________________________________*/
/*______________________________________________________________________________________________________*/
$type_chambre="";
$type_chambre0="";
$sql1=mysql_query("select * from type_chambre");
while($res1=mysql_fetch_array($sql1)){
         $type_chambre0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}
/*______________________________________________________________________________________________________*/
/*______________________________________________________________________________________________________*/
$option_hotel="";
$option_hotel0="";
$sql1=mysql_query("select * from option_hotel");
while($res1=mysql_fetch_array($sql1)){
         $option_hotel0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}
/*______________________________________________________________________________________________________*/


/*______________________________________________________________________________________________________*/
$localisation="";
$localisation0="";
$sql1=mysql_query("select * from localisation");
while($res1=mysql_fetch_array($sql1)){
         $localisation0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}
/*______________________________________________________________________________________________________*/

/*______________________________________________________________________________________________________*/
$arrangement="";
$arrangement0="";
$sql1=mysql_query("select * from arrangement");
while($res1=mysql_fetch_array($sql1)){
         $arrangement0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}
/*______________________________________________________________________________________________________*/

/*______________________________________________________________________________________________________*/
$theme="";
$theme0="";
$sql1=mysql_query("select * from theme");
while($res1=mysql_fetch_array($sql1)){
         $theme0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}
/*______________________________________________________________________________________________________*/

/*______________________________________________________________________________________________________*/
$amenagement="";
$amenagement0="";
$sql1=mysql_query("select * from amenagement");
while($res1=mysql_fetch_array($sql1)){
         $amenagement0.='  <option value="'.$res1['id'].'">'. $res1['nom'].'</option>';
}
/*______________________________________________________________________________________________________*/
/*______________________________________________________________________________________________________*/
$reductions="";
$reductions0="";
$sqlreduction=mysql_query("select * from reduction_hotel");
while($res_reduction1=mysql_fetch_array($sqlreduction)){
$reductions0.='  <option value="'.$res_reduction1['id'].'">'. $res_reduction1['nom'].'de '.$res_reduction1['age1'].' à '.$res_reduction1['age2'].'ans</option>';

}
/*______________________________________________________________________________________________________*/


$options_hotel="";
$description="";
$etat="";

$promo="";
$code="";
$tel="";
$fax="";
$email="";
$site="";
$adresse="";
$description_longue="";
$gmap="";
	$tel2="";
$email2="";
	
	}


?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>

    <title>ADMIN_RBS_TRAVEL</title>
                              <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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


<style type="text/css">
.obligatoire {
	color: #F00;
}.obligatoire2{
	color: #FFF;
}
</style>
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
                     <?php if(empty($_GET['id_hotel'])) echo "Ajouter "; else echo "Modifier d'";?>un H&ocirc;tel
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
                       
                        <?php if(isset( $_GET['id_hotel'])) {?><li>
                           <a href="hotels_menu.php?id_hotel=<?php echo $_GET['id_hotel'];?>"><?php echo nom_att('nom','hotel','id_hotel',$_GET['id_hotel']);?></a>
                           <span class="divider">/</span>
                       </li><?php }?>
                       <li class="active">
                           <?php if(empty($_GET['id_hotel'])) echo "Ajouter "; else echo "Modifier ";?>
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action='function/ajout.php' onSubmit="return test();">
            <input type="hidden" name="id_hotel" value="<?php if(isset($id_hotel))  echo $id_hotel;?>">
            <div class="alert alert-error" id="erreurG" style="display:none;">
                                <strong>Erreur!</strong>
                                <div  id="erreur"></div>
                            </div>
                          <div class="widget ">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Informations g&eacute;n&eacute;rales
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                           <div class="control-group">
                                <label class="control-label">Ville <span class="obligatoire">( * )</span></label>
                                <div class="controls">
                                    <select class="span6 " data-placeholder="Choose a Category" tabindex="1" name="region" id="region">
<?php echo $region;?>
<?php 
$selectregionall=mysql_query("select * from regions  ORDER BY region ASC");
while($resregionall=mysql_fetch_array($selectregionall)){?>

								<option value="<?php echo $resregionall['id'];?>"><?php echo $resregionall['region'];?></option>
							
							<?php }?>
                                        
                                        
                                    </select>
                                </div>
                            </div> 
                           <div class="control-group">
                                <label class="control-label">Nombre d'&eacute;toiles<span class="obligatoire">( * )</span></label>
                                <div class="controls">
                                    <select class="span6 " data-placeholder="Choose a Category" tabindex="1" name="etoile" id="etoile">
                                     <?php echo $etoile;?>
							<option value="3">3 &eacute;toiles</option>
							<option value="4">4 &eacute;toiles</option>
							<option value="5">5 &eacute;toiles</option>
							<option value="6">Appart H&ocirc;tel</option>
							<option value="7">H&ocirc;tel de charme</option>

                                    </select>
                                </div>
                            </div>  
                           <div class="control-group">
                                <label class="control-label">Nom de l'H&ocirc;tel<span class="obligatoire">( * )</span></label>
                                <div class="controls">
                                    <input type="text" value="<?php echo $nom;?>" class="span6 " name="hotel" id="hotel" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Libell&eacute; de la promotion :
</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="promo" id="promo"  value="<?php echo $promo;?>"/>
                                    
                                </div>
                            </div>
                        </div>
                    		</div>
                          
                            
            <div class="widget yellow">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Coordonn&eacute;es
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">                
                          
                            
                             
                             <div class="control-group">
                                <label class="control-label">Adresse<span class="obligatoire">( * )</span></label>
                                <div class="controls">
                                    <textarea class="span6 " rows="3" name="adresse" id="adresse"><?php echo $adresse;?></textarea>
                                </div>
                            </div>                       
                              <div class="control-group">
                                <label class="control-label">Code postal</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="code" id="code" value="<?php echo $code;?>" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Coordonn&eacute;es GOOGLE MAP</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="gmap" id="gmap" value="<?php echo $gmap;?>" />
                                </div>
                            </div>           
                             <div class="control-group">
                                    <label class="control-label">T&eacute;l</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" data-mask="99-999-999" class="span5" name="tel" id="tel" value="<?php echo $tel;?>">
                                        <span class="help-inline">99-999-999</span>
                                    </div>
                                </div>
                                
                                   <div class="control-group">
                                    <label class="control-label">T&eacute;l 2</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" data-mask="99-999-999" class="span5" name="tel2" id="tel2" value="<?php echo $tel2;?>">
                                        <span class="help-inline">99-999-999</span>
                                    </div>
                                </div>
                              <div class="control-group">
                                    <label class="control-label">Fax</label>
                                    <div class="controls">
                                        <input type="text" placeholder="" data-mask="99-999-999" class="span5" name="fax" id="fax"  value="<?php echo $fax;?>">
                                        <span class="help-inline">99-999-999</span>
                                    </div>
                                </div>      
                              <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="icon-envelope"></i>
                                        <input class=" " type="text" placeholder="Email Address"  name="email"  id="email"  value="<?php echo $email;?>"/>
                                    </div>
                                </div>
                            </div>
                       <div class="control-group">
                                <label class="control-label">Email 2</label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="icon-envelope"></i>
                                        <input class=" " type="text" placeholder="Email Address"  name="email2"  id="email2"  value="<?php echo $email2;?>"/>
                                    </div>
                                </div>
                            </div>      
                            
                            <div class="control-group">
                                <label class="control-label">Site web</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="site"  id="site"   value="<?php echo $site;?>"/>
                                    
                                </div>
                            </div>      
                       </div>
                    </div>        
                      <div class="widget red" >
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Description Courte<span class="obligatoire">( * )</span></h4>
                       <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div  class="widget-body form">
                                <div class="control-group">
                                    
                                    <div class="controls">
                                        <textarea class="span12 ckeditor" rows="5" name="description_courte" id="description_courte"><?php echo $description_courte;?></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>  
                    
                    
          <!--debut -->
      
                   <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Suppl&eacute;ment H&ocirc;tel
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <div>
                                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk5MjI0ODUwOWRkJySmk0TGHOhSY+d9BU9NHeCKW6o=" />
                                </div>
                                <div>
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box1Types2Filter" />
                                                    <button type="button" class="btn" id="box1Types2Clear">X</button>
                                                </div>

                                                <select id="box1Types2View" name="box1Types2View" multiple style="height:150px;width:100%">
<?php echo $supplement_hotel0;?>

                                                    
                                                </select><br/>

                                                <span id="box1Types2Counter" class="countLabel"></span>

                                                <select id="box1Types2Storage">

                                                </select>
                                            </td>
                                            <td style="width: 21%; vertical-align: middle">
                                                <button id="to2Types2" class="btn" type="button">&nbsp;>&nbsp;</button>

                                                <button id="allTo2Types2" class="btn" type="button">&nbsp;>>&nbsp;</button>

                                                <button id="allTo1Types2" class="btn" type="button">&nbsp;<<&nbsp;</button>

                                                <button id="to1Types2" class="btn" type="button">&nbsp;<&nbsp;</button>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box2Types2Filter" />
                                                    <button type="button" class="btn" id="box2Types2Clear">X</button>
                                                </div>

                                                <select id="box2Types2View"  name="box2Types2View[]" multiple style="height:150px;width:100%;">
                                                <?php echo $supplement_hotel;?>

                                                </select><br/>

                                                <span id="box2Types2Counter" class="countLabel"></span>

                                                <select id="box2Types2Storage"   name="box2Types2Storage">

                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                           
                        </div>
                    </div> 
                
         <!--fin -->
         
          <!--debut -->
      
                   <!--debut  Reductions      -->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Reductionss<span class="obligatoire2">( au moin une )</span>
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <div>
                                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk5MjI0ODUwOWRkJySmk0TGHOhSY+d9BU9NHeCKW6o=" />
                                </div>
                                <div>
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box1ReductionsFilter" />
                                                    <button type="button" class="btn" id="box1ReductionsClear">X</button>
                                                </div>

                                                <select id="box1ReductionsView" name="box1ReductionsView" multiple style="height:150px;width:100%">
<?php echo $reductions0;?>
                                                    
                                                </select><br/>

                                                <span id="box1ReductionsCounter" class="countLabel"></span>

                                                <select id="box1ReductionsStorage">

                                                </select>
                                            </td>
                                            <td style="width: 21%; vertical-align: middle">
                                                <button id="to2Reductions" class="btn" type="button">&nbsp;>&nbsp;</button>

                                                <button id="allTo2Reductions" class="btn" type="button">&nbsp;>>&nbsp;</button>

                                                <button id="allTo1Reductions" class="btn" type="button">&nbsp;<<&nbsp;</button>

                                                <button id="to1Reductions" class="btn" type="button">&nbsp;<&nbsp;</button>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box2ReductionsFilter" />
                                                    <button type="button" class="btn" id="box2ReductionsClear">X</button>
                                                </div>

                                                <select id="box2ReductionsView"  name="box2ReductionsView[]" multiple style="height:150px;width:100%;">
<?php echo $reductions;?>
                                                </select><br/>

                                                <span id="box2ReductionsCounter" class="countLabel"></span>

                                                <select id="box2ReductionsStorage"   name="box2ReductionsStorage">

                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                           
                        </div>
                    </div>
                
         <!--fin --> 
                
         <!--fin -->    
         
         
         
         
         
           
         
         
         
         
         
         
                      
      <!--debut -->
      
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Localisation
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <div>
                                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk5MjI0ODUwOWRkJySmk0TGHOhSY+d9BU9NHeCKW6o=" />
                                </div>
                                <div>
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box1Filter" />
                                                    <button type="button" class="btn" id="box1Clear">X</button>
                                                </div>

                                                <select id="box1View" name="box1View" multiple style="height:150px;width:75%">
<?php echo $localisation0;?>

                                                    
                                                </select><br/>

                                                <span id="box1Counter" class="countLabel"></span>

                                                <select id="box1Storage">

                                                </select>
                                            </td>
                                            <td style="width: 21%; vertical-align: middle">
                                                <button id="to2" class="btn" type="button">&nbsp;>&nbsp;</button>

                                                <button id="allTo2" class="btn" type="button">&nbsp;>>&nbsp;</button>

                                                <button id="allTo1" class="btn" type="button">&nbsp;<<&nbsp;</button>

                                                <button id="to1" class="btn" type="button">&nbsp;<&nbsp;</button>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box2Filter" />
                                                    <button type="button" class="btn" id="box2Clear">X</button>
                                                </div>

                                                <select id="box2View"  name="box2View[]" multiple style="height:150px;width:75%;">
<?php echo $localisation;?>
                                                </select><br/>

                                                <span id="box2Counter" class="countLabel"></span>

                                                <select id="box2Storage"   name="box2Storage">

                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                           
                        </div>
                    </div>
                
         <!--fin -->


     <!--debut -->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Options d'h&ocirc;tel
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <div>
                                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk5MjI0ODUwOWRkJySmk0TGHOhSY+d9BU9NHeCKW6o=" />
                                </div>
                                <div>
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box1OptionsFilter" />
                                                    <button type="button" class="btn" id="box1OptionsClear">X</button>
                                                </div>

                                                <select id="box1OptionsView" name="box1OptionsView" multiple style="height:150px;width:75%">
<?php echo $option_hotel0;?>

                                                    
                                                </select><br/>

                                                <span id="box1OptionsCounter" class="countLabel"></span>

                                                <select id="box1OptionsStorage">

                                                </select>
                                            </td>
                                            <td style="width: 21%; vertical-align: middle">
                                                <button id="to2Options" class="btn" type="button">&nbsp;>&nbsp;</button>

                                                <button id="allTo2Options" class="btn" type="button">&nbsp;>>&nbsp;</button>

                                                <button id="allTo1Options" class="btn" type="button">&nbsp;<<&nbsp;</button>

                                                <button id="to1Options" class="btn" type="button">&nbsp;<&nbsp;</button>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box2OptionsFilter" />
                                                    <button type="button" class="btn" id="box2OptionsClear">X</button>
                                                </div>

                                                <select id="box2OptionsView"  name="box2OptionsView[]" multiple style="height:150px;width:75%;">
<?php echo $option_hotel;?>
                                                </select><br/>

                                                <span id="box2OptionsCounter" class="countLabel"></span>

                                                <select id="box2OptionsStorage"   name="box2OptionsStorage">

                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                           
                        </div>
                    </div>
                
         <!--fin -->
         
         
         
          <!--debut  types      -->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Types des chambres<span class="obligatoire2">( au moin une )</span>
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <div>
                                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk5MjI0ODUwOWRkJySmk0TGHOhSY+d9BU9NHeCKW6o=" />
                                </div>
                                <div>
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box1TypesFilter" />
                                                    <button type="button" class="btn" id="box1TypesClear">X</button>
                                                </div>

                                                <select id="box1TypesView" name="box1TypesView" multiple style="height:150px;width:75%">
<?php echo $type_chambre0;?>

                                                    
                                                </select><br/>

                                                <span id="box1TypesCounter" class="countLabel"></span>

                                                <select id="box1TypesStorage">

                                                </select>
                                            </td>
                                            <td style="width: 21%; vertical-align: middle">
                                                <button id="to2Types" class="btn" type="button">&nbsp;>&nbsp;</button>

                                                <button id="allTo2Types" class="btn" type="button">&nbsp;>>&nbsp;</button>

                                                <button id="allTo1Types" class="btn" type="button">&nbsp;<<&nbsp;</button>

                                                <button id="to1Types" class="btn" type="button">&nbsp;<&nbsp;</button>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box2TypesFilter" />
                                                    <button type="button" class="btn" id="box2TypesClear">X</button>
                                                </div>

                                                <select id="box2TypesView"  name="box2TypesView[]" multiple style="height:150px;width:75%;">
                                                <?php echo $type_chambre;?>

                                                </select><br/>

                                                <span id="box2TypesCounter" class="countLabel"></span>

                                                <select id="box2TypesStorage"   name="box2TypesStorage">

                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                           
                        </div>
                    </div>
                
         <!--fin -->
      
               
          <!--debut  arrangement      -->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Arrangements<span class="obligatoire2">( au moin une )</span>
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <div>
                                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk5MjI0ODUwOWRkJySmk0TGHOhSY+d9BU9NHeCKW6o=" />
                                </div>
                                <div>
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box1ArrangementFilter" />
                                                    <button type="button" class="btn" id="box1ArrangementClear">X</button>
                                                </div>

                                                <select id="box1ArrangementView" name="box1ArrangementView" multiple style="height:150px;width:75%">
<?php echo $arrangement0;?>
                                                    
                                                </select><br/>

                                                <span id="box1ArrangementCounter" class="countLabel"></span>

                                                <select id="box1ArrangementStorage">

                                                </select>
                                            </td>
                                            <td style="width: 21%; vertical-align: middle">
                                                <button id="to2Arrangement" class="btn" type="button">&nbsp;>&nbsp;</button>

                                                <button id="allTo2Arrangement" class="btn" type="button">&nbsp;>>&nbsp;</button>

                                                <button id="allTo1Arrangement" class="btn" type="button">&nbsp;<<&nbsp;</button>

                                                <button id="to1Arrangement" class="btn" type="button">&nbsp;<&nbsp;</button>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box2ArrangementFilter" />
                                                    <button type="button" class="btn" id="box2ArrangementClear">X</button>
                                                </div>

                                                <select id="box2ArrangementView"  name="box2ArrangementView[]" multiple style="height:150px;width:75%;">
<?php echo $arrangement;?>
                                                </select><br/>

                                                <span id="box2ArrangementCounter" class="countLabel"></span>

                                                <select id="box2ArrangementStorage"   name="box2ArrangementStorage">

                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                           
                        </div>
                    </div>
                
         <!--fin -->
      
				
                
                
                
                      <!--debut  theme      -->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Th&eacute;mes
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <div>
                                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk5MjI0ODUwOWRkJySmk0TGHOhSY+d9BU9NHeCKW6o=" />
                                </div>
                                <div>
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box1ThemesFilter" />
                                                    <button type="button" class="btn" id="box1ThemesClear">X</button>
                                                </div>

                                                <select id="box1ThemesView" name="box1ThemesView" multiple style="height:150px;width:75%">
<?php echo $theme0;?>

                                                    
                                                </select><br/>

                                                <span id="box1ThemesCounter" class="countLabel"></span>

                                                <select id="box1ThemesStorage">

                                                </select>
                                            </td>
                                            <td style="width: 21%; vertical-align: middle">
                                                <button id="to2Themes" class="btn" type="button">&nbsp;>&nbsp;</button>

                                                <button id="allTo2Themes" class="btn" type="button">&nbsp;>>&nbsp;</button>

                                                <button id="allTo1Themes" class="btn" type="button">&nbsp;<<&nbsp;</button>

                                                <button id="to1Themes" class="btn" type="button">&nbsp;<&nbsp;</button>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box2ThemesFilter" />
                                                    <button type="button" class="btn" id="box2ThemesClear">X</button>
                                                </div>

                                                <select id="box2ThemesView"  name="box2ThemesView[]" multiple style="height:150px;width:75%;">
<?php echo $theme;?>

                                                </select><br/>

                                                <span id="box2ThemesCounter" class="countLabel"></span>

                                                <select id="box2ThemesStorage"   name="box2ThemesStorage">

                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                           
                        </div>
                    </div>
                
         <!--fin -->
         
                      <!--debut  amenagement      -->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Am&eacute;nagement
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <div>
                                    <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTk5MjI0ODUwOWRkJySmk0TGHOhSY+d9BU9NHeCKW6o=" />
                                </div>
                                <div>
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box1amenagementFilter" />
                                                    <button type="button" class="btn" id="box1amenagementClear">X</button>
                                                </div>

                                                <select id="box1amenagementView" name="box1amenagementView" multiple style="height:150px;width:75%">
<?php echo $amenagement0;?>


                                                    
                                                </select><br/>

                                                <span id="box1amenagementCounter" class="countLabel"></span>

                                                <select id="box1amenagementStorage">

                                                </select>
                                            </td>
                                            <td style="width: 21%; vertical-align: middle">
                                                <button id="to2amenagement" class="btn" type="button">&nbsp;>&nbsp;</button>

                                                <button id="allTo2amenagement" class="btn" type="button">&nbsp;>>&nbsp;</button>

                                                <button id="allTo1amenagement" class="btn" type="button">&nbsp;<<&nbsp;</button>

                                                <button id="to1amenagement" class="btn" type="button">&nbsp;<&nbsp;</button>
                                            </td>
                                            <td style="width: 35%">
                                                <div class="d-sel-filter">
                                                    <span>Filter:</span>
                                                    <input type="text" id="box2amenagementFilter" />
                                                    <button type="button" class="btn" id="box2amenagementClear">X</button>
                                                </div>

                                                <select id="box2amenagementView"  name="box2amenagementView[]" multiple style="height:150px;width:75%;">
<?php echo $amenagement;?>

                                                </select><br/>

                                                <span id="box2amenagementCounter" class="countLabel"></span>

                                                <select id="box2amenagementStorage"   name="box2amenagementStorage">

                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                           
                        </div>
                    </div>
                
         <!--fin -->
         
         <div class="widget yellow">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> D&eacute;scription Longue<span class="obligatoire2">( * )</span></h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           </span>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                                <div class="control-group">
                                    <div class="controls">
                                        <textarea class="span12 ckeditor" name="decription_longue"  id="decription_longue" rows="6"><?php echo $description_longue;?></textarea>
                                    </div>
                                </div>
                            <!-- END FORM-->
                        </div>
                    </div>
         
				         
                                                                
<div class="control-group">
                                        <label class="control-label">Etat</label>
                                        <div class="controls">
                                           

                                            <div id="transition-value-toggle-button">
                                                <input type="checkbox" name="active" value="1" <?php if($etat==1) echo 'checked="checked"';?>>
                                            </div>
                                        </div>
                                    </div>
				
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

function test(){
	
	var test=true;
	
	 document.getElementById("erreur").innerHTML="";
	var hotel=document.getElementById('hotel').value;
	var decrc=document.getElementById('description_courte').value;
	var decription_longue=document.getElementById('decription_longue').value;
	var region=document.getElementById('region').value;
	var adresse=document.getElementById('adresse').value;
	
		var box2View=document.getElementById('box2View');

		var box2OptionsView=document.getElementById('box2OptionsView');

		var box2TypesView=document.getElementById('box2TypesView');

		var box2ArrangementView=document.getElementById('box2ArrangementView');

		var box2ThemesView=document.getElementById('box2ThemesView');

		var box2amenagementView=document.getElementById('box2amenagementView');
		


	
	
	if(region=="") {	

					document.getElementById("erreur").innerHTML += "Vous avez oublier de selectionner r&eacute;gion!.<br>";
					
					test=false;
	}
	if(hotel=="") {	

					document.getElementById("erreur").innerHTML += "Vous avez oublier le nom de lh&ocirc;tel!.<br>";
					
					test=false;
	}
	
	if(decrc=="") {	

							document.getElementById("erreur").innerHTML += "Vous avez oublier la description courte!.<br>";
					
					test=false;
	}
	
	if(adresse=="") {	

							document.getElementById("erreur").innerHTML += "Vous avez oublier l adresse!.<br>";
					
					test=false;
	}
	
	
	if(decription_longue=="") {	

					document.getElementById("erreur").innerHTML += "Vous avez oublier la description longue!.<br>";
					
					test=false;
	}
	
	

	
	/*
	if(box2View.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option de Localisation !.<br>";test=false;
	}
	if(box2OptionsView=="") {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option d'options d'h&ocirc;tel !.<br>";test=false;
	}*/
	if(box2TypesView.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option de Type de chambre !.<br>";test=false;
	}
	if(box2ArrangementView.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option d'arrangement !.<br>";test=false;
	}
	/*if(box2ThemesView.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option de Th&eacute;mes !.<br>";test=false;
	}
	if(box2amenagementView.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option d'am&eacute;nagement !.<br>";test=false;
	}*/
	
	
	
		if(test==false) {					
			document.getElementById("erreurG").style.display="";
			document.location.href="#";
		}else{document.getElementById("erreurG").style.display="none";}
	
	
	return test;
	
	
	
	}
</script>

</body>
<!-- END BODY -->
</html>