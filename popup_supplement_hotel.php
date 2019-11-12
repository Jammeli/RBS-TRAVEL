
<?php include("connexion.php");


if(isset($_POST['id_add'])){

 $bl=mysql_query("select supplement_hotel from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $test=explode('-', $sbl[0]);
 $nv=$sbl[0]."-".$_POST['id_add'];
$x=$_POST['id_add'];
$cmp=$_GET['cmp'];

if(!in_array($x,$test)){
	$liensupp="<a style=\"margin-left:50px;\" href=\"javascript: if(confirm(\'Supprimer?\')) supprimer_supplement(\'".$_GET['id_hotel']."\',\'".$_POST['id_add']."\',\'".$cmp."\');\" ><span class=\"add-on\">X</span></a>";
	
 mysql_query("update   hotel set supplement_hotel='".$nv."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());
$nomtarif=nom_att('nom','supplement_hotel','id',$_POST['id_add']);

$obligatoire=nom_att('obligatoire','supplement_hotel','id',$_POST['id_add']);
$pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$_POST['id_add']);
$min_pax=nom_att('min_pax','supplement_hotel','id',$_POST['id_add']);
						
						if($obligatoire==1) $obl=" (Oblig) "; else $obl= " (Non Oblig)";
		                if($pax_chambre==0) $obl2=" (par pièce) "; else $obl2= " (Par PAX: mininum=".$min_pax.")";



	$division='<div class="control-group"><label class="control-label">Suppl&eacute;ment '.$nomtarif.$obl.$obl2.'</label><div class="controls"><div class="input-prepend input-append"><input class=" " type="text" name="supplement_hotel_'.$_POST['id_add'].'" id="supplement_hotel_'.$cmp.'" value="" /><input type="checkbox" name="checksupplement_hotel_'.$_POST['id_add'].'" id="checksupplement_hotel_'.$cmp.'" value="%"  ><span class="add-on">%</span>'.$liensupp.'</div></div></div>';	
	?>
	<script>
	 var x=window.opener.document.getElementById('nbre_supplement').value;
	 x=parseInt(x)+1;
	 window.opener.document.getElementById('nbre_supplement').value=x;
</script><?php 
} else $division='';
	
	?><script>
	
		var varx='<?php echo $division;?>';
		window.opener.document.getElementById('liste_supplement').innerHTML+=varx;
		window.close();
        </script><?php 
		

}
?>

<?php

 
//EXEMPLES
$table='supplement_hotel'; 
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
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
           
                      
          <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget red">
                        <div class="widget-title">
                            <h4><i class="icon-asterisk"></i>Nouveau</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                     <div class="widget-body">
                               <form class="form-horizontal"  enctype="multipart/form-data" method="post";>
                                
                                <div class="control-group">
                                    <div class="controls">
                                    
                                   <table  class="table table-striped table-bordered" style="width:50%;">
                                   <tr>
                                   <td>Titre</td><td> <input type="text" name="champs" id="champs"></td></tr>
<tr><td>Obligatoire</td><td> <input value="1"  checked type="radio" name="obligatoire"  > Oui <input value="0" type="radio" name="obligatoire"  > Non</td>
</tr>
<tr><td>Appliquer au nombre de pax supérieur à </td><td><input value="0"  checked type="number" name="min_pax"  ></td></tr>
<tr><td>Appliquer par</td><td> <input value="1"  checked type="radio" name="pax_chambre"  > PAX <input value="0" type="radio" name="pax_chambre"  > Pièce</td></tr>

</tr>
                                   <tr>
                                   
                                    <td colspan="2">Appliquer sur<br>
<input value="1"  onClick="masque_jour('1');" checked type="radio" name="jours"  >Toute les jours de la période<br>
												 
<input value="3"   onClick="masque_jour('3');"   type="radio" name="jours"  >Les Weekend (Vendredi & samedi)<br>
<input value="2"  onClick="masque_jour('2');"    type="radio" name="jours"  >Les jours suivants:<br>
                                                 <div id="jours" style="display:none;">
                                                  <input value="1"   type="checkbox" name="joursx[]" >Lundi<br>
                                                  <input value="2"   type="checkbox" name="joursx[]"  >Mardi<br>
                                                  <input value="3"   type="checkbox" name="joursx[]"  >Mercredi<br>
                                                  <input value="4"   type="checkbox" name="joursx[]"  >Jeudi<br>
                                                  <input value="5"   type="checkbox" name="joursx[]"  >Vendredi<br>
                                                  <input value="6"   type="checkbox" name="joursx[]"  >Samedi<br>
                                                  <input value="7"   type="checkbox" name="joursx[]"  >Dimanche<br>

                                                 </div>
<input value="4"  onClick="masque_jour('4');"    type="radio" name="jours"  >Une période spécifique:<br>
                                                 
         <div id="dates" style="display:none;">
                                                  Date départ<input value=""   type="date" name="date1" ><br>
                                                  Date fin <input value=""   type="date" name="date2"  ><br>
                                               

                                                 </div>                                        
                                                 </td>

                                   </tr>
						
                                        
                                    <td colspan="2">    <input type="submit" name="envoyer" value="Envoyer" /></td>
                                    </tr>
                                    </table>
                                        
                                        <?php if(isset($_POST['envoyer'])){
											
											
	$date1='';
	$date2='';
											
$jours=$_POST['jours'];
$pax_chambre=$_POST['pax_chambre'];

$tableq=array();
if($jours==1) {$joursx="1,2,3,4,5,6,7";}
elseif($jours==3) {$joursx="5,6";}
elseif($jours==4){ $joursx="";$date1=$_POST['date1'];	$date2=$_POST['date2'];}
else {
	foreach($_POST['joursx'] as $val){
		array_push($tableq, $val);
		
		}
	$joursx=implode(",", $tableq);
	}
echo $joursx;

	 mysql_query("INSERT INTO `$table` (`id`, `nom`, `obligatoire`, `jours`, `pax_chambre`, `date1`, `date2`) VALUES (NULL,  '".mysql_real_escape_string($_POST['champs'])."',  '".$_POST['obligatoire']."',  '".$joursx."','".$pax_chambre."',  '".$date1."',  '".$date2."');");
	 
		 $x=mysql_insert_id();

	 
 

 $bl=mysql_query("select supplement_hotel from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $test=explode('-', $sbl[0]);
 $nv=$sbl[0]."-".$x;
$cmp=$_GET['cmp'];

if(!in_array($x,$test)){
	$liensupp="<a style=\"margin-left:50px;\" href=\"javascript: if(confirm(\'Supprimer?\')) supprimer_supplement(\'".$_GET['id_hotel']."\',\'".$x."\',\'".$cmp."\');\" ><span class=\"add-on\">X</span></a>";
	
 mysql_query("update   hotel set supplement_hotel='".$nv."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());
$nomtarif=nom_att('nom','supplement_hotel','id',$x);

$obligatoire=nom_att('obligatoire','supplement_hotel','id',$x);
$pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$x);
$min_pax=nom_att('min_pax','supplement_hotel','id',$x);
						
						if($obligatoire==1) $obl=" (Oblig) "; else $obl= " (Non Oblig)";
		                if($pax_chambre==0) $obl2=" (par pièce) "; else $obl2= " (Par PAX: mininum=".$min_pax.")";



	$division='<div class="control-group"><label class="control-label">Suppl&eacute;ment '.$nomtarif.$obl.$obl2.'</label><div class="controls"><div class="input-prepend input-append"><input class=" " type="text" name="supplement_hotel_'.$x.'" id="supplement_hotel_'.$cmp.'" value="" /><input type="checkbox" name="checksupplement_hotel_'.$x.'" id="checksupplement_hotel_'.$cmp.'" value="%"  ><span class="add-on">%</span>'.$liensupp.'</div></div></div>';	
	?>
	<script>
	 var x=window.opener.document.getElementById('nbre_supplement').value;
	 x=parseInt(x)+1;
	 window.opener.document.getElementById('nbre_supplement').value=x;
</script><?php 
} else $division='';
	
	?><script>
	
		var varx='<?php echo $division;?>';
		window.opener.document.getElementById('liste_supplement').innerHTML+=varx;
		window.close();
        </script><?php 
		



}

?>
                                    </div>
                                </div>     

                       </form>

                    </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>             
                       
                       <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget red">
                        <div class="widget-title">
                            <h4><i class="icon-asterisk"></i> à partir de la Liste</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                     <div class="widget-body">
                            
                         
                                
                    		
                                
                               
                            
                            
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                                            
                                <th class="hidden-phone">Titre</th>
                                <th class="hidden-phone">Obligatoire</th>
                                <th class="hidden-phone">Min pax</th>
                                <th class="hidden-phone">Par</th>
                                <th class="hidden-phone">Jours</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
						   	$sqlall=mysql_query("select * from $table ") or die(mysql_error());
	
								while($reall=mysql_fetch_array($sqlall)){?>
                            <tr class="odd gradeX">
                            
								                                             
                       <td class="hidden-phone"><?php echo $reall['nom'];?></td>
                                <td class="hidden-phone"><?php if($reall['obligatoire']==1) echo "Oui"; else echo "Non";?></td>
                                <td class="hidden-phone"><?php if($reall['pax_chambre']==0) echo "-"; else echo $reall['min_pax'];;?></td>
                                <td class="hidden-phone"><?php if($reall['pax_chambre']==0) echo "Pièce"; else echo "PAX";?></td>
                                <td class="hidden-phone"><?php if( $reall['jours']!=''){
									$r=explode(',',$reall['jours']);
									
									foreach($r as $val){
		
													if($val==1) echo "Lundi,";
                                                    if($val==2) echo "Mardi,";
                                                    if($val==3) echo "Mercredi,";
                                                    if($val==4) echo "Jeudi,";
                                                    if($val==5) echo "Vendredi,";
                                                    if($val==6) echo "Samedi,";
                                                    if($val==7) echo "Dimanche,";
										}
								}	else{
									if($reall['date1']!=$reall['date2']){
									 echo "De ".$reall['date1'].' à '.$reall['date2'];
									}
									else echo $reall['date1'];
									 
								}?></td>
                                
                                <td><a href="javascript: document.getElementById('add_<?php echo $reall['id'];?>').submit();" ><font class="icon icon-plus"></font></a><form id="add_<?php echo $reall['id'];?>" method="post";><input  type="hidden" value="<?php echo $reall['id'];?>" name="id_add"></form></td>
                            </tr>
                            <?php }?> 
            
                         
                            </tbody>
                        </table>                           

                    </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>

         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
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

function masque_jour(num){
	if(num==1 || num==3) {document.getElementById('jours').style.display='none';document.getElementById('dates').style.display='none';}
	else if(num==2){ document.getElementById('jours').style.display='';document.getElementById('dates').style.display='none';}
	else if(num==4){ document.getElementById('dates').style.display='';document.getElementById('jours').style.display='none';}
	
	
	}
   </script>


</body>
<!-- END BODY -->
</html>