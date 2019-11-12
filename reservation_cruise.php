
<?php include("connexion.php");?>

<?php 
if(isset($_GET['desactive'])){
	mysql_query("update hotel set etat='0' where id_hotel='".$_GET['desactive']."' ") or die(mysql_error());
		header("location: reservation_cruise.php");
	
}
if(isset($_GET['active'])){
	mysql_query("update hotel set etat='1' where id_hotel='".$_GET['active']."' ") or die(mysql_error());
		header("location: reservation_cruise.php");
	
}


?><!DOCTYPE html>
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
      <div class="sidebar-scroll">
          <div id="sidebar" class="nav-collapse collapse">

              <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
              <div class="navbar-inverse">
                  <form class="navbar-search visible-phone">
                      <input type="text"  class="search-query" placeholder="Search" />
                  </form>
              </div>
             <?php include("menu.php");?>
          </div>
      </div>
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
                     Liste des R&eacute;servations
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="reservation_cruise.php">R&eacute;servations</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Recherche
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Liste des R&eacute;servation</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                
                            </span>
                    </div>
                    
                    <div class="widget-body">
                   <center> 
                   
      <button class="btn"  style="background-color:#F90 ; font-size:16px; font-weight:bold; color:#FFF;width:32px; height:28px;">!</button>En attente
		<button class="btn btn-success" type="submit" value=""><i class="icon-ok"></i></button>Pay&eacute;
		<button class="btn btn-danger" type="submit" value=""><i class="icon-ban-circle"></i></button>Annul&eacute;e
        </center>
                        <table class="table table-striped table-bordered" id="sample_1">
       <thead>
                                        <tr>
                                            <th>Etat</th>
                                            <th>Client</th>
                                            <th>total</th>
                                            <th>Nb adultes</th>
                                            <th>Nb enfants</th>
                                            <th>Date demande</th>
                                            <th>Heure demande</th>
                                           <th>Fiche</th>

                                          <!--  <th>Supprimer</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                 $result = mysql_query("SELECT * FROM `demmande_cruise`  where page='".$_GET['page']."'   ORDER BY `id_commande` DESC;") or die(mysql_error());
   				while($resulta = mysql_fetch_array($result))
   				 {
      			  ?>
                                        <tr class="odd gradeX">
                                            <td>
         <?php 
		 if( $resulta['etat']==0){?><button class="btn"  style="background-color:#F90 ; font-size:16px; font-weight:bold; color:#FFF;width:32px; height:28px;">!</button><?php }
		 elseif( $resulta['etat']==2){?><button class="btn btn-danger" type="submit" value=""><i class="icon-ban-circle"></i></button><?php }
		 elseif( $resulta['etat']==1){?><button class="btn btn-success" type="submit" value=""><i class="icon-ok"></i></button><?php }?>
          
		
         
         <?php
		 
		 
		 ?>                                   
                                            
                                            </td>
                                            <td><?php echo $resulta['id_client'];?></td>
                                            <td><?php echo $resulta['total'];?></td>
                                            <td><?php echo $resulta['adulte'];?></td>
                                            <td><?php echo $resulta['enfant'];?></td>
                                            <td><?php echo $resulta['datedemmande'];?></td>
                                            <td><?php echo $resulta['heuredemmande'];?></td>
                                            <td><a href="javascript:window.open('fiche_reservation.php?id=<?php echo $resulta['id_commande'];?>&page=<?php echo $_GET['page'];?>','Fiche <?php echo $_GET['page'];?> Num <?php echo $resulta['id'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" >Fiche</a></td>
                                             <!--   <td><a href="javascript: if(confirm('Supprimer cette r&eacute;servation ?')) document.location.href='supprimer_reservation_cruise.php?id=<?php echo $resulta['id_commande'];?>&page=<?php echo $resulta['page'];?>'"><button class="btn btn-danger"><i class="icon-trash "></i></button></a></td>-->

                                            
                                       
                                            
                                              
                                        </tr>
                                        
                                       
                        <?php }?>             
                                        
                                    </tbody>                       </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
        RBS TRAVEL.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->
   <script src="js/dynamic-table.js">
 function open_infos()
                        {
     window.open('fiche_reservation.php','Fiche ','menubar=no, scrollbars=no, top=100, left=100, width=300, height=200');
                        }
              
                </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>