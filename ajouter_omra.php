
<?php include("connexion.php");
if(isset($_GET['id_omra'])){
	
	if($_GET['id_omra']=="") header("location: ajouter_omra.php");
$select=mysql_query("select * from omra where id='".$_GET['id_omra']."'");
$resselect=mysql_fetch_array($select);
$id_omra=$resselect['id'];
$titre=$resselect['libelle'];

// echo "select * from omra where id='".$_GET['id_omra']."'";

// exit;

$description_courte=$resselect['description_courte'];
$description_courte= str_replace( "?", "'", $description_courte);





$etat=$resselect['etat'];
$promo=$resselect['libelle_promo'];
$code=$resselect['code'];
$tel=$resselect['tel'];
$fax=$resselect['fax'];
$email=$resselect['email'];
$site=$resselect['site'];
$adresse=$resselect['adresse'];
$prix=$resselect['prix'];
$datedepart=$resselect['apartir_de'];
$nbrjour=$resselect['nbre_jour'];
$tel2=$resselect['tel2'];
$email2=$resselect['email2'];

$description_longue=$resselect['description_longue'];
}else{
$id_omra="0";
$titre="";
$region='<option value="">S&eacute;l&eacute;ctionner la r&eacute;gion</option>';
$amenagement="";
$etoile='<option  value="" >S&eacute;l&eacute;ctionner Nombre d\'&eacute;toile</option>';
$description_courte="";



$options_hotel="";
$description="";
$etat="";
$datedepart="";
$promo="";
$code="";
$tel="";
$fax="";
$email="";
$site="";
$adresse="";
$description_longue="";
$nbrjour ="";
$prix="";
$datedepart="";
$titre="";
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
                     <?php if(empty($_GET['id_omra'])) echo "Ajouter "; else echo "Modifier d'";?>une OMRA
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="recherche_omra.php">Omra</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           <?php if(empty($_GET['id_omra'])) echo "Ajouter "; else echo "Modifier ";?>
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action='function/enregistrer_omra.php' onSubmit="return test();">
            <input type="hidden" name="id_omra" value="<?php echo $id_omra;?>">
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
                                <label class="control-label">Titre <span class="obligatoire">( * )</span></label>
                                <div class="controls">
                                    <input type='text' name='title'  id='title' value='<?php  echo $titre;?>' class="span6" data-placeholder="Titre...">
                                </div>
                            </div> 
                           
                            <div class="control-group">
                                <label class="control-label">Libell&eacute; de la promotion :
</label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="promo" id="promo"  value="<?php echo $promo;?>"/>
                                    
                                </div>
                            </div>
							
							 <div class="control-group">
                                <label class="control-label"> Date D&eacute;part<span class="obligatoire">( * )</span></label>
                                        <div class="controls date" id="dpMonths" data-date="102/2012"
                                             data-date-format="dd/mm/yyyy" data-date-viewmode="days"
                                             data-date-minviewmode="months">
                                            <input   name="datedepart" id="datedepart" class="m-ctrl-medium disabled" size="16" type="text" value="<?php echo $datedepart;?>"  readonly   >
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
						<div class="control-group">
                                <label class="control-label">Nombre des jours<span class="obligatoire">( * )</span></label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="nbrj" value='<?php  echo $nbrjour;?>' id="nbrj"  />
                                </div>
                            </div> 
							
						<div class="control-group">
                                <label class="control-label">Prix<span class="obligatoire">( * )</span></label>
                                <div class="controls">
                                    <input type="text" class="span6 " name="prix" value='<?php  echo $prix;?>'  id="prix"  />
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
	var decrc=document.getElementById('description_courte').value;
	var decription_longue=document.getElementById('decription_longue').value;
	var datedepart=document.getElementById('datedepart').value;
	var title=document.getElementById('title').value;
	var nbrj=document.getElementById('nbrj').value;
	var prix=document.getElementById('prix').value;
	
	
	
	


	
	
	if(title=="") {document.getElementById("erreur").innerHTML += "Vous avez oublier de Titre.<br>";
					test=false;
	}
	if(datedepart=="") {	
					document.getElementById("erreur").innerHTML += "Vous avez oublier la date de d&eacute;part!.<br>";
					test=false;
	}
		if(prix=="") {	
					document.getElementById("erreur").innerHTML += "Vous avez oublier le prix!.<br>";
					test=false;
	}
		if(nbrj=="") {	
					document.getElementById("erreur").innerHTML += "Vous avez oublier le nombre des jours.<br>";
					test=false;
	}
	
	if(decrc=="") {	document.getElementById("erreur").innerHTML += "Vous avez oublier la description courte!.<br>";
					test=false;
	}
	
	
	
	
	if(decription_longue=="") {	

					document.getElementById("erreur").innerHTML += "Vous avez oublier la description longue!.<br>";
					
					test=false;
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