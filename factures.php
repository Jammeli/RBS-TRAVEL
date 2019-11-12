
<?php include("connexion.php");



?>



<?php if(isset($_GET['id'])){ mysql_query("update facture set etat='1' where numfact='".$_GET['id']."'");}?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <title>ADMIN_RBS</title>
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
                     Liste des factures
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a >Factures</a>
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
                        <h4><i class="icon-reorder"></i> Liste des factures</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                
                            </span>
                    </div>
                    <a href="nv_facture.php"><button id="editable-sample_new" class="btn green">
                                             Facture libre <i class="icon-plus"></i>
                                         </button></a>
                    <div class="widget-body">
                    <center>
				
                        <table class="table table-striped table-bordered" id="sample_1">
       <thead>
                                        <tr>
                                        <th>Date/H</th>

                                            <th>Etat</th>
                                            <th></th>
                                            <th>Client</th>
                                            <th>Source</th>
                                            <th>Total</th>
											<th>Facture</th>
 <th>modifier</th> 
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                 $result = mysql_query("SELECT * FROM `facture`       ORDER BY `id` DESC;") or die(mysql_error());
   				while($resulta = mysql_fetch_array($result))
   				 {?>
      			 
                                        <tr class="odd gradeX">
                                        
<td><?php echo $resulta['date'];?> <?php echo $resulta['heure'];?></td>

										
<td>
<?php $test=mysql_query("select etat from facture where id_commande='".$resulta['id']."'");
	 $restest=mysql_fetch_row($test);
	 
	 if($restest[0]!=1){?>
     <button class="btn btn-<?php if( $resulta['etat']==1) echo "success"; else echo "danger";?>" type="button" value="<?php echo $resulta['id'];?>" name="<?php if( $resulta['etat']==1) echo "desactive"; else echo "active";?>">
     <i class="icon-<?php if( $resulta['etat']==1) echo "ok"; else echo "ban-circle";?>" title=""></i>
	  <?php } else{?><button class="btn btn-success" type="button" ><i class="icon-ok" title=""></i> <?php }?>					 
</td>
              
<td><?php if( $resulta['etat']==1) echo "Imprimé"; else echo "En attente";?></td>
 <td><?php echo $resulta['nom'];?>(<?php echo $resulta['prenom'];?>)</td>
<td><?php echo $resulta['source'];?></td>
<td><?php echo $resulta['prixtot'];?></td>




<?php if( $resulta['source']=='manuel'){?>
<td><a href="javascript:window.open('facture_fiche.php?id=<?php echo $resulta['numfact'];?>','Facture   Num <?php echo $resulta['id_commande'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" ><?php if(isset($resulta['numfact'])) echo $resulta['numfact'];?></a></td>

<td><a href="facture_modifier.php?id=<?php echo   $resulta['numfact'];?>"><button class="btn btn-primary"><i class="icon-pencil "></i></button></a></td> <?php  }

elseif( $resulta['source']=='auto'){?>
<td><a href="javascript:window.open('facture_fiche_auto.php?id=<?php echo $resulta['numfact'];?>','Facture   Num <?php echo $resulta['id_commande'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" ><?php if(isset($resulta['numfact'])) echo $resulta['numfact'];?></a></td>

<td></td> <?php }?> 

    
                                            
                                        </tr>
                                        
                                       
                        <?php  }?>             
                                        
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
   <script>

   </script>
   <!-- BEGIN FOOTER -->
   <div id="footer">
       2016 &copy; RBS.
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
   <script src="js/dynamic-table.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>