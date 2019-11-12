
<?php include("connexion.php");
	
if(isset($_POST['renewpasssubmit'])){
	if(isset($_POST['newpass']) &&isset($_POST['renewpass']) &&isset($_POST['login']) &&($_POST['newpass']==$_POST['renewpass'] )){
			$new=md5($_POST['newpass']);
			$login=$_POST['login'];
			
						mysql_query("update  admin  set  mot_de_passe='$new', login='$login' where id='1' ")
						 or die (mysql_error());
		
					
	
	
	}
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
                    Param&eacute;tres
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                      
                       <li class="active">
                       Param&eacute;tres
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            
            
            
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action='' onSubmit="return test_renew();">
            <div class="alert alert-error" id="erreurG" style="display:none;">
                                <strong>Erreur!</strong>
                                <div  id="erreur"></div>
                            </div>
                          
                          
                            
            <div class="widget yellow">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-reorder"></i>Changement de mot de passe
                            </h4>
                            <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
                        <div class="widget-body">                
                          
                            
                             
                          <table style="width:300px;">
                          
                          <tr><td>
                                   
                                            <label>Tapez le nouveau Login</label>
                                          <font id="loginerreur" style="color:#F00;"></font>
                                            <input name="login"  id="login" type="text" class="input-text full-width">
                                 </td></tr>
                                    
                                 <tr><td>
                                   
                                            <label>Tapez le nouveau mot de passe</label>
                                          <font id="newpasserreur" style="color:#F00;"></font>
                                            <input name="newpass"  id="newpass" type="text" class="input-text full-width">
                                 </td></tr>
                                    <tr><td>
                                            <label>Confirmez  le nouveau mot de passe</label>
                                          <font id="renewpasserreur" style="color:#F00;"></font>
                                          <font id="erreuridentik" style="color:#F00;"></font>
                                            <input  name="renewpass"  id="renewpass" type="text" class="input-text full-width">
                                             </td></tr>
                                    <tr><td>
                                    <div class="form-group">
                                        <button  name="renewpasssubmit"class="btn-medium">Remplacer le mot de passe</button>
                                    </div>
                                    </td></tr></table>    
                        
                            </div>      
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


function test_renew(){
	
	var test=true;
	
	 document.getElementById("newpasserreur").innerHTML="";
	 document.getElementById("renewpasserreur").innerHTML="";
	
	
	var newpass=document.getElementById('newpass').value;
	var renewpass=document.getElementById('renewpass').value;
	var login=document.getElementById('login').value;



	
if(login=="") {document.getElementById("loginerreur").innerHTML = "verifier le login.<br>";
					test=false;
					document.getElementById("loginerreur").style.display="";
					
	}else document.getElementById("loginerreur").style.display="none";
	
	
	

	

if(newpass=="") {document.getElementById("newpasserreur").innerHTML = "verifier le nouveau mot de passe.<br>";
					test=false;
					document.getElementById("newpasserreur").style.display="";
					
	}else document.getElementById("newpasserreur").style.display="none";


		
	
		
if(renewpass=="") {document.getElementById("renewpasserreur").innerHTML = "Retapez le nouveau  mot de passe.<br>";
					test=false;
					document.getElementById("renewpasserreur").style.display="";
					
	}else document.getElementById("renewpasserreur").style.display="none";


if(renewpass!=newpass && renewpass!=""&& newpass!="") {document.getElementById("erreuridentik").innerHTML = "Les mots de passes ne sont pas identiques.<br>";
					test=false;
					document.getElementById("erreuridentik").style.display="";
					
	}else document.getElementById("erreuridentik").style.display="none";
return test;
		
}
</script>

</body>
<!-- END BODY -->
</html>