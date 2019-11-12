
<?php include("connexion.php");?>

<?php
if(isset($_GET['idsupp'])){
	
	
   $sqldelete=mysql_query("select image from images_sliders where id='".$_GET['idsupp']."'");
   $resdelete=mysql_fetch_row($sqldelete);
   unlink($resdelete[0]);

	mysql_query("delete from images_sliders  where id='".$_GET['idsupp']."'") or die(mysql_error());
	
			header("location: images_sliders.php");

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
                     Images Slider
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                     
                       <li class="active">
                           Images Slider
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
                      <form class="form-horizontal" action="#" enctype="multipart/form-data" method="post";>
                                
                                <div class="control-group">
                                    <div class="controls">
                             Text 1:<input type="text" name="text1" maxlength="25"  style="width:200px;" >(25L max)<br>
                             Text 2:<input type="text" name="text2" maxlength="50"   style="width:400px;"  >(50L max)<br>
                             
                             Rang: <select name="rang">
                             		<option value="1">1</option>
                             		<option value="2">2</option>
                             		<option value="3">3</option>
                             		<option value="4">4</option>
                             		<option value="5">5</option>
									</select><br>

                                        <div data-provides="fileupload" class="fileupload fileupload-new">
                                            <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
                                                <img alt="" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image">
                                            </div>
                                            <div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                                            <div>
                                               <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                                               <span class="fileupload-exists">Change</span>
                                               <input type="file" name="monimage" class="default"></span>
                                                <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <?php if(isset($_POST['envoyer'])){
											
											
											
	
  $upload1 = upload('monimage','uploade/', array('png','gif','jpg','jpeg') );
  
 if($upload1=="chargement"){ echo '<span class="label label-important">NOTE!</span>
                                         <span>';echo "Erreur de chargement";}
 elseif($upload1=="taille"){echo '<span class="label label-important">NOTE!</span>
                                         <span>'; echo "Erreur, la taille ne doit pas d&eacute;passer 1 mo";}
 elseif($upload1=="extension"){echo '<span class="label label-important">NOTE!</span>
                                         <span>';echo "L'extension doit &eacute;tre: .png,.gif,.jpg ou bien .jpeg ";}
 elseif($upload1=="erreur"){echo '<span class="label label-important">NOTE!</span>
                                         <span>';echo "erreur";}
 else{
	 	
	
	
	
	 mysql_query("INSERT INTO images_sliders (`id`, `image`, `text1`, `text2`, `rang`) VALUES (NULL, '".$upload1."', '".$_POST['text1']."', '".$_POST['text2']."', '".$_POST['rang']."');") or die(mysql_error());
	 
	 
	 
	 }
 
	                                        echo ' </span>';

}

?>
                                    </div>
                                </div>     <input type="submit" name="envoyer" value="Envoyer" />

                       </form>
                       
                       
                       <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget red">
                        <div class="widget-title">
                            <h4><i class="icon-asterisk"></i> Liste des images</h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body form">
                            <form action="assets/dropzone/upload.php" class="dropzone" id="my-awesome-dropzone">
                            
                           <?php
						   	$sqlall=mysql_query("select * from images_sliders ") or die(mysql_error());
	
								while($reall=mysql_fetch_array($sqlall)){?>
                                
                                <img 
                                 onMouseOver="document.getElementById('supp<?php echo $reall['id'];?>').style.display='' 
                                 document.getElementById('edit<?php echo $reall['id'];?>').style.display='';"
                                  onMouseOut="document.getElementById('supp<?php echo $reall['id'];?>').style.display='none' ;
                                  document.getElementById('edit<?php echo $reall['id'];?>').style.display='none';
                                  
                                  "
                                  src="<?php echo $reall['image'];?>" width="300" height="150"
                                  
                                  title="<?php echo $reall['text1'];?>-<?php echo $reall['text2'];?>"  style="cursor:pointer; height:150px !important; ">
                                  
                                <a id="supp<?php echo $reall['id'];?>"  
                                
                                  
                                   onMouseOver="document.getElementById('supp<?php echo $reall['id'];?>').style.display='';"
                                style="position:absolute; margin-left:-25px; display:none; background-color:#FFF; height:20px; width:20px; margin-top:5px; text-align:center; text-decoration:none;" href="javascript: if(confirm('Voulez vous effacer l\'image?')) document .location.href='images_sliders.php?idsupp=<?php echo $reall['id'];?>'; " ><i class="icon-remove"   ></i></a>
                                
                                
                          <a id="edit<?php echo $reall['id'];?>"  
                                
                                  
                                   onMouseOver="document.getElementById('edit<?php echo $reall['id'];?>').style.display='';"
                                style="position:absolute; margin-left:-50px; display:none; background-color:#FFF; height:20px; width:20px; margin-top:5px; text-align:center; text-decoration:none;" href="javascript:document .location.href='edit_images_sliders.php?id=<?php echo $reall['id'];?>'; " ><i class="icon-edit"   ></i></a>
                                
                                
                    		<?php ?>
                                
                                <?php }
								?> 
                            
                            </form>
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