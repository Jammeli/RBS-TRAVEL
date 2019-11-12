
<?php include("connexion.php");

$listex='';
if(isset($_POST['id_add'])){
	$val=$_POST['id_add'];
$nom_piece=nom_att('nom','type_chambre','id',$_POST['id_add']);
$par=nom_att('calcul','type_chambre','id',$_POST['id_add']);


						
						
 $bl=mysql_query("select type_chambre from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $test=explode('-', $sbl[0]);
 $nv=$sbl[0]."-".$_POST['id_add'];
$x=$_POST['id_add'];
$cmp=$_GET['cmp'];
mysql_query("update   hotel set type_chambre='".$nv."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());




 $bl=mysql_query("select arrangement from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $testo=explode('-', $sbl[0]);
 foreach($testo as $valo){
	 if($valo!='0'&& $valo!=''){
 		$listex.='-'.$valo."=";
	 }
 }



	$liste='('.$_POST['id_add'].'-0-0'.$listex.')';					
 $bl2=mysql_query("select suites from tarifs where id='".$_GET['id_tarif']."'"); 
 $sbl2=mysql_fetch_row($bl2);
 $test2=explode('-', $sbl2[0]);
 $nv2=$sbl2[0]."+".$liste;
 
  $bl2p=mysql_query("select suites from promotions where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl2p=mysql_fetch_row($bl2p);
 $nv2p=$sbl2p[0]."+".$liste;

mysql_query("update   tarifs set suites='".$nv2."'  where id='".$_GET['id_tarif']."'") or die(mysql_error());
mysql_query("update   promotions set suites='".$nv2p."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());
















if(!in_array($x,$test)){
		$liensupp="<span class=\"tools\"><a style=\"margin-left:50px;\" href=\"javascript: if(confirm(\'Supprimer?\')) supprimer_suite(\'".$_GET['id_hotel']."\',\'".$_POST['id_add']."\',\'".$cmp."\',\'".$_GET['id_tarif']."\');\" ><span class=\"add-on\">X</span></a></span>";
		

	$division='   <div class="widget "><div class="widget-title"><h4> <i class="icon-reorder"></i>'.$nom_piece.'</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a></span><span class="tools"><a  aria-hidden="true">( Les montants sera calculer '.$par.')</a></span>'.$liensupp.'</div><div class="widget-body"  >';
	

	



    $division.='<div class="control-group"><label class="control-label">Prix</label><div class="controls"><div class="input-prepend input-append"><input class=" " type="text" name="prix_suite_'.$val.'" id="prix_suite_'.$val.'" value="" /><span class="add-on">DT</span></div></div></div>';
    $division.='<div class="control-group"><label class="control-label">Supplément single</label><div class="controls"><div class="input-prepend input-append"><input class=" " type="text" name="suppsingle_suite_'.$val.'" id="suppsingle_suite_'.$val.'" value="" /><span class="add-on">DT</span></div></div></div>';
    



						$nbre_suites=$cmp;
						
						  $sql_tarifs=mysql_query("select arrangement from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$listetarif=explode("-", $restafis);
						foreach($listetarif as $valliste){
							if($valliste!="0"){
							
														  
							 $nomtarif=nom_att('nom','arrangement','id',$valliste);

										   
					    $division.='<div  class="control-group"><label class="control-label">Suppl&eacute;ment '.$nomtarif.'</label><div  class="controls"><div  class="input-prepend input-append"><input class=" " type="text" name="tarifsuite_'.$val.'_'.$valliste.'"  id="tarif_suite_'.$val.'_'.$nbre_suites.'" value="" /><input type="checkbox" name="checktarifsuite_'.$val.'_'.$valliste.'"  id="checktarif_suite_'.$val.'_'.$nbre_suites.'" value="%" ><span class="add-on">%</span></div></div></div>';
							
						
						}}



	$division.='   </div></div>';

	
		
	?>
	<script>
	 var x=window.opener.document.getElementById('nbre_suites').value;
	 x=parseInt(x)+1;
	 window.opener.document.getElementById('nbre_suites').value=x;
</script><?php 
} else $division='';
	
	?><script>
	
		var varx='<?php echo $division;?>';
		window.opener.document.getElementById('liste_suites').innerHTML+=varx;
		window.close();
        </script><?php 
		

}
?>

<?php

 
//EXEMPLES
$table='type_chambre'; 
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
                                    
                                   <table>

<tr><td>Titre <input type="text" name="champs" id="champs"></td></tr>
<tr><td>Calcul par  <input value="piece"   type="radio" name="calcul"  > pièce<input value="pax"    type="radio" name="calcul"  checked > PAX </td></tr>

<tr><td>Capacité maximum <input type="text" name="image" id="image"></td></tr>

<tr  id="divmin_adulte" ><td>Nombre d'adulte minimal <input type="text" name="min_adulte" id="min_adulte"></td></tr>
<tr  id="divmax_adulte" ><td>Nombre d'adulte maximum <input type="text" name="max_adulte" id="max_adulte"></td></tr>



								
                              
                                        
                                    <td>    <input type="submit" name="envoyer" value="Envoyer" /></td>
                                    </tr>
                                    </table>
                                        
                                        <?php if(isset($_POST['envoyer'])){
											
											
$nom=mysql_real_escape_string($_POST['champs']);
$calcul=$_POST['calcul'];
$type='suite';
$min_adulte=$_POST['min_adulte'];
$max_adulte=$_POST['max_adulte'];
$image=$_POST['image'];
$max_enfant=$image-$min_adulte;

	 mysql_query("INSERT INTO `$table` (`id`, `nom`, `image`, `type`, `min_adulte`, `max_adulte`, `max_enfant`, `calcul`)
	  VALUES (NULL,  '".$nom."', '".$image."', '".$type."', '".$min_adulte."', '".$max_adulte."', '".$max_enfant."', '".$calcul."');");
	 
	

	$val=mysql_insert_id();
$nom_piece=nom_att('nom','type_chambre','id',$val);
$par=nom_att('calcul','type_chambre','id',$val);


						
						
 $bl=mysql_query("select type_chambre from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $test=explode('-', $sbl[0]);
 $nv=$sbl[0]."-".$val;
$x=$val;
$cmp=$_GET['cmp'];
mysql_query("update   hotel set type_chambre='".$nv."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());




 $bl=mysql_query("select arrangement from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $testo=explode('-', $sbl[0]);
 foreach($testo as $valo){
	 if($valo!='0'&& $valo!=''){
 		$listex.='-'.$valo."=";
	 }
 }



	$liste='('.$val.'-0-0'.$listex.')';					
 $bl2=mysql_query("select suites from tarifs where id='".$_GET['id_tarif']."'"); 
 $sbl2=mysql_fetch_row($bl2);
 $test2=explode('-', $sbl2[0]);
 $nv2=$sbl2[0]."+".$liste;


 $bl2p=mysql_query("select suites from promotions where id='".$_GET['id_hotel']."'"); 
 $sbl2p=mysql_fetch_row($bl2p);
 $nv2p=$sbl2[0]."+".$liste;
 
mysql_query("update   tarifs set suites='".$nv2."'  where id='".$_GET['id_tarif']."'") or die(mysql_error());
mysql_query("update   promotions set suites='".$nv2p."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());
















if(!in_array($x,$test)){
		$liensupp="<span class=\"tools\"><a style=\"margin-left:50px;\" href=\"javascript: if(confirm(\'Supprimer?\')) supprimer_suite(\'".$_GET['id_hotel']."\',\'".$val."\',\'".$cmp."\',\'".$_GET['id_tarif']."\');\" ><span class=\"add-on\">X</span></a></span>";
		

	$division='   <div class="widget "><div class="widget-title"><h4> <i class="icon-reorder"></i>'.$nom_piece.'</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a></span><span class="tools"><a  aria-hidden="true">( Les montants sera calculer '.$par.')</a></span>'.$liensupp.'</div><div class="widget-body"  >';
	

	



    $division.='<div class="control-group"><label class="control-label">Prix</label><div class="controls"><div class="input-prepend input-append"><input class=" " type="text" name="prix_suite_'.$val.'" id="prix_suite_'.$val.'" value="" /><span class="add-on">DT</span></div></div></div>';
    $division.='<div class="control-group"><label class="control-label">Supplément single</label><div class="controls"><div class="input-prepend input-append"><input class=" " type="text" name="suppsingle_suite_'.$val.'" id="suppsingle_suite_'.$val.'" value="" /><span class="add-on">DT</span></div></div></div>';
    



						$nbre_suites=$cmp;
						
						  $sql_tarifs=mysql_query("select arrangement from hotel where id_hotel='".$_GET['id_hotel']."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$listetarif=explode("-", $restafis);
						foreach($listetarif as $valliste){
							if($valliste!="0"){
							
														  
							 $nomtarif=nom_att('nom','arrangement','id',$valliste);

										   
					    $division.='<div  class="control-group"><label class="control-label">Suppl&eacute;ment '.$nomtarif.'</label><div  class="controls"><div  class="input-prepend input-append"><input class=" " type="text" name="tarifsuite_'.$val.'_'.$valliste.'"  id="tarif_suite_'.$val.'_'.$nbre_suites.'" value="" /><input type="checkbox" name="checktarifsuite_'.$val.'_'.$valliste.'"  id="checktarif_suite_'.$val.'_'.$nbre_suites.'" value="%" ><span class="add-on">%</span></div></div></div>';
							
						
						}}



	$division.='   </div></div>';

	
		
	?>
	<script>
	 var x=window.opener.document.getElementById('nbre_suites').value;
	 x=parseInt(x)+1;
	 window.opener.document.getElementById('nbre_suites').value=x;
</script><?php 
} else $division='';
	
	?><script>
	
		var varx='<?php echo $division;?>';
		window.opener.document.getElementById('liste_suites').innerHTML+=varx;
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
                                <th class="hidden-phone">Nom</th>
                                <th class="hidden-phone">Type</th>
                                <th class="hidden-phone">Calcul par</th>
                                <th class="hidden-phone">Capacité</th>
                                <th class="hidden-phone">Min adulte</th>
                                <th class="hidden-phone">Max adulte</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
						   	$sqlall=mysql_query("select * from $table  where type='suite' ") or die(mysql_error());
	
								while($reall=mysql_fetch_array($sqlall)){?>
                            <tr class="odd gradeX">
                            
								                                                     
                                  <td><?php echo $reall['nom'];?></td>
                                  <td><?php echo $reall['type'];?></td>        
                                                            <td><?php echo $reall['calcul'];?></td>

                                  <td><?php echo $reall['image'];?></td>
                                  <td><?php echo $reall['min_adulte'];?></td>
                                  <td><?php echo $reall['max_adulte'];?></td>
                       <td><a href="javascript: document.getElementById('add_<?php echo $reall['id'];?>').submit();" ><font class="icon icon-plus"></font></a><form id="add_<?php echo $reall['id'];?>" method="post";><input  type="hidden" value="<?php echo $reall['id'];?>" name="id_add"></form></td>
                            </tr>
                            <?php }
								?> 
            
                         
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
	if(num==1) document.getElementById('jours').style.display='none';
	else if(num==2) document.getElementById('jours').style.display='';
	
	
	}
   </script>


</body>
<!-- END BODY -->
</html>