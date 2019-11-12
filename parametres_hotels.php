
<?php include("connexion.php");


?>

<?php

 
//EXEMPLES
$table=$_GET['table']; 
?>

<?php
if(isset($_GET['idsupp'])){
	
	
   $sqldelete=mysql_query("select image from $table where id='".$_GET['idsupp']."'");
   $resdelete=mysql_fetch_row($sqldelete);
   unlink($resdelete[0]);

	mysql_query("delete from $table where id='".$_GET['idsupp']."'") or die(mysql_error());
	
			header("location: parametres_hotels.php?table=$table");

	}

if(isset($_GET['edit_profil'])){
	mysql_query("update images set type='simple' where id_hotel='".$_GET['id_hotel']."' and type='profil'") or die(mysql_error());

	mysql_query("update images set type='profil' where  id='".$_GET['edit_profil']."'and id_hotel='".$_GET['id_hotel']."'");
	header("location: parametres_hotels.php?table=$table");
	}
if(isset($_GET['edit_chambre'])){
	mysql_query("update images set type='chambre' where  id='".$_GET['edit_chambre']."'and id_hotel='".$_GET['id_hotel']."'");
		header("location: parametres_hotels.php?table=$table");

	}
if(isset($_GET['edit_simple'])){
	mysql_query("update images set type='simple' where  id='".$_GET['edit_chambre']."'and id_hotel='".$_GET['id_hotel']."'");
		header("location: parametres_hotels.php?table=$table");

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
                     Param&eacute;tres > <?php echo $table;?>
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           Param&eacute;tres H&ocirc;tels
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                          <?php echo $table;?>
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
                      <form class="form-horizontal"  enctype="multipart/form-data" method="post";>
                                
                                <div class="control-group">
                                    <div class="controls">
                                    
                                   <table>
                                   <tr>
                                   <td>Titre <input type="text" name="champs" id="champs"></td>
                                   
								
								   
								   <?php 	 if(isset($_GET['table']) && $_GET['table']=="equipements" ){
?>
                                   <td>     
                                        <div data-provides="fileupload" class="fileupload fileupload-new " >
                                            <span class="btn btn-file" > 
                                            <span class="fileupload-new" >Choisir l'icone</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" class="default"  name="monimage">
                                            </span>
                                            <span class="fileupload-preview"></span>
                                            <a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">�</a>
                                        </div>
                                
                                </td><?php }?>
                                        
                                    <td>    <input type="submit" name="envoyer" value="Envoyer" /></td>
                                    </tr>
                                    </table>
                                        
                                        <?php if(isset($_POST['envoyer'])){
											
											
											
	 if(isset($_GET['table']) && $_GET['table']=="equipements" ){
  $upload1 = upload('monimage','uploade/icones/',1048576, array('png','gif','jpg','jpeg'), $_GET['table'] );
	 }else {$upload1="";}
 if($upload1=="chargement"){ echo '<span class="label label-important">NOTE!</span>
                                         <span>';echo "Erreur de chargement";}
 elseif($upload1=="taille"){echo '<span class="label label-important">NOTE!</span>
                                         <span>'; echo "Erreur, la taille ne doit pas d&eacute;passer 1 mo";}
 elseif($upload1=="extension"){echo '<span class="label label-important">NOTE!</span>
                                         <span>';echo "L'extension doit &eacute;tre: .png,.gif,.jpg ou bien .jpeg ";}
 else{
	 	
	
	if(isset($_GET['table']) && $_GET['table']=="regions" ){ ;
	
	 mysql_query("INSERT INTO `$table` (`id`,  `zone`, `region`) VALUES (NULL, '0', '".$_POST['champs']."');");

	}else{

	 mysql_query("INSERT INTO `$table` (`id`,  `nom`, `image`) VALUES (NULL,  '".$_POST['champs']."', '".$upload1."');");
	 
	}
	 
	 }
 
	                                        echo ' </span>';

}

?>
                                    </div>
                                </div>     

                       </form>
                       
                       
                       <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget red">
                        <div class="widget-title">
                            <h4><i class="icon-asterisk"></i> Liste</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                     <div class="widget-body">
                               <form action="assets/dropzone/upload.php" class="dropzone" id="my-awesome-dropzone">
                            
                         
                                
                    		
                                
                               
                            
                            
                        <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                            <tr>
                                                              <?php 	 if(isset($_GET['table']) && $_GET['table']=="equipements" ){?>
     <th>Icone</th><?php }?>
                                <th class="hidden-phone">nom</th>
                                <th class="hidden-phone"></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
						   	$sqlall=mysql_query("select * from $table ") or die(mysql_error());
	
								while($reall=mysql_fetch_array($sqlall)){?>
                            <tr class="odd gradeX">
                            
								                                   <?php 	 if(isset($_GET['table']) && $_GET['table']=="equipements" ){
?><td><img  src="<?php echo $reall['image'];?>" width="50"></td>       <?php }?>                       
                                  <td><?php 
								   if(isset($_GET['table']) && $_GET['table']=="regions" ){ echo $reall['region'];}else{
								  echo $reall['nom'];}?></td>
                        <!--        <td><a id="supp<?php echo $reall['id'];?>"  
                                
                                  
                                    href="javascript: if(confirm('Voulez vous l\'effacer ?')) document .location.href='parametres_hotels.php?table=<?php echo $_GET['table'];?>&idsupp=<?php echo $reall['id'];?>'; " ><i class="icon-remove"   ></i></a></td>
                                    
                                    -->
                            </tr>
                            <?php }
								?> 
            
                         
                            </tbody>
                        </table>                            </form>

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


</body>
<!-- END BODY -->
</html>