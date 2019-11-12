
<?php include("connexion.php");

	
	if($_GET['id_hotel']=="") header("location: recherche_hotels.php");
	
$select=mysql_query("select * from allotement where id_hotel='".$_GET['id_hotel']."'" ) or die(mysql_error());
$resselect=mysql_fetch_array($select);
$id_hotel=$resselect['id_hotel'];
$id_promo=$resselect['id'];
$etat=$resselect['etat'];

$datedepart1=explode("-" ,$resselect['date_depart']);
$datedefin2=explode("-" ,$resselect['date_fin']);
$datedepart=$datedepart1[2]."/".$datedepart1[1]."/".$datedepart1[0];
$datedefin=$datedefin2[2]."/".$datedefin2[1]."/".$datedefin2[0];



 


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
                     Allotement
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
                           <a href="tarifs_hotel.php">Allotement</a>
                           <span class="divider">/</span>
                       </li>
                       
                       
                       <li class="active">
Promo                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action='function/update_allotement.php' onSubmit="return test();" id="chgdept">

            <input type="hidden" name="id_hotel" value="<?php echo $id_hotel;?>">
            <input type="hidden" name="id_promo" value="<?php echo $id_promo;?>">
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
                                        <label class="control-label">Etat</label>
                                        <div class="controls">
                                           

                                            <div id="transition-value-toggle-button">
                                                <input type="checkbox" name="active" value="1" <?php if($etat==1) echo 'checked="checked"';?>>
                                            </div>
                                        </div>
                                    </div>          
                             
                             
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
                                    
                                    
                                    
                                    
            
                  <?php
				  
				  
				   $sql_tarifs=mysql_query("select type_chambre from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						foreach($affichetarif as $valaff){
							if($valaff!="0"){
						$sqlnomtarif=mysql_query("select nom from type_chambre where id='".$valaff."'");
						$exe=mysql_fetch_row($sqlnomtarif);
						$nomtarif=$exe[0];
						
						if(isset($_GET['id_hotel'])){
						$sqlprixetcheck=mysql_query("select allotement from allotement where id_hotel='".$_GET['id_hotel']."'");
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
                                <label class="control-label"> <?php echo $nomtarif;?></label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="tarif_<?php echo $valaff;?>" value="<?php echo $vval;?>" /><span class="add-on">Nombre des chambres</span>
                                       
                                    </div>
                                </div>
                            </div>
                            
                      <?php }}
					  
					  
				  ?>
                                                         
                            
                            
                            
                            
                            <!-- END FORM-->
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
	var datedepart=document.getElementById('datedepart').value;
	var datedefin=document.getElementById('datedefin').value;
	
		

	
	
	
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