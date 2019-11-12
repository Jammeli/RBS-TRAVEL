
<?php include("connexion.php");
if(isset($_GET['id_voyage'])){
	
	if($_GET['id_voyage']=="") header("location: ajouter_voyage.php");
$select=mysql_query("select * from voyage where id='".$_GET['id_voyage']."'");
$resselect=mysql_fetch_array($select);
$id_voyage=$resselect['id'];
$titre=$resselect['libelle'];


$description_courte=$resselect['description_courte'];



/*___________________________________________________affichage optient hotel*/
$val1=$resselect['option'];
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

$prix=$resselect['prix'];
$datedepart=$resselect['apartir_de'];
$nbrjour=$resselect['nbre_jour'];
$etat=$resselect['etat'];
$promo=$resselect['libelle_promo'];
$code=$resselect['code'];
$tel=$resselect['tel'];
$fax=$resselect['fax'];
$email=$resselect['email'];
$site=$resselect['site'];
$adresse=$resselect['adresse'];
$description_longue=$resselect['description_longue'];
}else{
$id_voyage="0";
$titre="";


/*______________________________________________________________________________________________________*/

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
                     Fiche voyage
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           Voyages
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                          Fiche
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action='function/ajout.php' onSubmit="return test();">
            <input type="hidden" name="id_voyage" value="<?php echo $id_voyage;?>">
            <div class="alert alert-error" id="erreurG" style="display:none;">
                                <strong>Erreur!</strong>
                                <div  id="erreur"></div>
                            </div>
                          
                            <div class="widget green">
                            
                            
                             <div class="widget-title">
                            <h4>
                            </h4>
<div class="actions">
                               <a href="ajouter_voyage.php?id_voyage=<?php echo $_GET['id_voyage'];?>" class="btn btn-success"><i class="icon-pencil"></i> Modifier</a>
                            </div>                            
                            
                        </div>
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
                                <label class="control-label">Titre</label>
                                <div class="controls">
                                    <input type="text" disabled  value="<?php echo $titre;?>" class="span6 " name="hotel" id="hotel" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Libell&eacute; de la promotion :
</label>
                                <div class="controls">
                                    <input type="text" disabled  class="span6 " name="promo" id="promo"  value="<?php echo $promo;?>"/>
                                    
                                </div>
                            </div>
							<div class="control-group">
                                <label class="control-label"> Date D&eacute;part</label>
                                        <div class="controls" id="dpMonths" data-date="102/2012"
                                             data-date-format="dd/mm/yyyy" data-date-viewmode="days"
                                             data-date-minviewmode="months">
                                            <input   name="datedepart" id="datedepart" class="m-ctrl-medium disabled" size="16" type="text" value="<?php echo $datedepart;?>"  readonly   >
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
						<div class="control-group">
                                <label class="control-label">Nombre des jours</label>
                                <div class="controls">
                                    <input type="text" disabled class="span6 " name="nbrj" value='<?php  echo $nbrjour;?>' id="nbrj" value="" />
                                </div>
                            </div> 
							
						<div class="control-group">
                                <label class="control-label">Prix</label>
                                <div class="controls">
                                    <input type="text" class="span6 " disabled name="prix" value='<?php  echo $prix;?>'  id="prix" value="" />
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
                                <label class="control-label">Adresse</label>
                                <div class="controls">
                                    <textarea disabled class="span6 "  name="adresse" id="adresse"><?php echo $adresse;?></textarea>
                                </div>
                            </div>                       
                              <div class="control-group">
                                <label class="control-label">Code postal</label>
                                <div class="controls">
                                    <input type="text" disabled  class="span6 " name="code" id="code" value="<?php echo $code;?>" />
                                </div>
                            </div>           
                             <div class="control-group">
                                    <label class="control-label">T&eacute;l</label>
                                    <div class="controls">
                                        <input type="text" disabled  placeholder="" data-mask="99-999-999" class="span5" name="tel" id="tel" value="<?php echo $tel;?>">
                                        <span class="help-inline">99-999-999</span>
                                    </div>
                                </div>
                              <div class="control-group">
                                    <label class="control-label">Fax</label>
                                    <div class="controls">
                                        <input type="text" disabled  placeholder="" data-mask="99-999-999" class="span5" name="fax" id="fax"  value="<?php echo $fax;?>">
                                        <span class="help-inline">99-999-999</span>
                                    </div>
                                </div>      
                              <div class="control-group">
                                <label  class="control-label">Email</label>
                                <div class="controls">
                                    <div class="input-icon left">
                                        <i class="icon-envelope"></i>
                                        <input class=" " style="width:350px;" type="text" disabled placeholder="Email Address"  name="email"  id="email"  value="<?php echo $email;?>"/>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="control-group">
                                <label class="control-label">Site web</label>
                                <div class="controls">
                                    <input type="text" disabled  class="span6 " name="site"  id="site"   value="<?php echo $site;?>"/>
                                    
                                </div>
                            </div>      
                       </div>
                    </div>        
                      <div class="widget red" >
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Description Courte</h4>
                       <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div  class="widget-body form">
                                <div class="control-group">
                                    
                                    <div class="controls">
                                         <?php 
										

																				 echo html_entity_decode($description_courte);

										 ?>
                                    </div>
                                </div>
                        </div>
                    </div>  
                    
                    
                    
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
                         
                               <?php echo $localisation;?>
                                
                           
                        </div>
                    </div>
                
         <!--fin -->


     <!--debut -->
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i> Options d'voyage
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                         
                                <?php echo $option_hotel;?>
                                
                           
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
                         <?php echo $theme;?>
                           
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
                         
                                <?php echo $amenagement;?>

                                
                                
                           
                        </div>
                    </div>
                
         <!--fin -->
         
         <div class="widget yellow">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> D&eacute;scription Longue</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           </span>
                        </div>
                        <div class="widget-body form">
                            <!-- BEGIN FORM-->
                                <div class="control-group">
                                    <div class="controls">
                                        <?php echo $description_longue;?>
                                         
                                         
                                    </div>
                                </div>
                            <!-- END FORM-->
                        </div>
                    </div>
         
				        
                                                                
<div class="control-group">
                                        <label class="control-label">Etat</label>
                                        <div class="controls">
                                           

                                            <div id="transition-value-toggle-button">
                                                <input disabled type="checkbox" name="active" value="1" <?php if($etat==1) echo 'checked="checked"';?>>
                                            </div>
                                        </div>
                                    </div>
				
				<div class="control-group">
					<div class="controls">
						
					 <a href="ajouter_voyage.php?id_voyage=<?php echo $_GET['id_voyage'];?>">	<button type="button"  name="ajouter" class="btn">Modifier</button></a>
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
	
	

	
	
	if(box2View.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option de Localisation !.<br>";test=false;
	}
	/*if(box2OptionsView=="") {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option d'options d'h&ocirc;tel !.<br>";test=false;
	}*/
	if(box2TypesView.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option de Type d'h&ocirc;tel !.<br>";test=false;
	}
	if(box2ArrangementView.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option d'arrangement !.<br>";test=false;
	}
	if(box2ThemesView.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option de Th&eacute;mes !.<br>";test=false;
	}
	if(box2amenagementView.length==0) {	document.getElementById("erreur").innerHTML += "Vous devez s&eacute;l&eacute;ctionner au moin une option d'am&eacute;nagement !.<br>";test=false;
	}
	
	
	
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