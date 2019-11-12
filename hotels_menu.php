
<?php include("connexion.php");?>

<?php 
if(isset($_GET['desactive'])){
	mysql_query("update hotel set etat='0' where id_hotel='".$_GET['desactive']."' ") or die(mysql_error());
		header("location: recherche_hotels.php");
	
}
if(isset($_GET['active'])){
	mysql_query("update hotel set etat='1' where id_hotel='".$_GET['active']."' ") or die(mysql_error());
		header("location: recherche_hotels.php");
	
}
$result = mysql_query("SELECT * FROM `hotel`   where id_hotel='".$_GET['id_hotel']."'  ORDER BY `id_hotel` DESC;") or die(mysql_error());
$resulta = mysql_fetch_array($result);
   				 

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
                      <?php echo $resulta['nom'];?> (<?php echo $resulta['etoile'];?> étoile)
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
                       <li class="active">
                           <?php echo $resulta['nom'];?> (<?php echo $resulta['etoile'];?> étoile)
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
                        <h4><i class="icon-reorder"></i><?php echo $resulta['nom'];?> (<?php echo $resulta['etoile'];?> étoile)</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                
                            </span>
                    </div>
                    
                    <div class="widget-body">
                   <center> <button class="btn"  style="background-color:#F90 ;width:20px; height:20px; ma"
											
											 ></button>Champs &agrave; v&eacute;rifier</center>

                        <table class="table table-striped table-bordered" id=" ">
       <thead>
                                        <tr>
                                            <th>Etat</th>
                         
                                            <th>Region</th>
                                            <th>Fiche</th>
                                            <th>Modifier</th>
                                            <th>Tarifs</th>
                                            <th>Allotement</th>
                                            <th>Promos</th>
                                            <th>Images</th>
                                            <th>Supprimer</th>
                                            <th>partage FB</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
   
      			  ?>
                                        <tr class="odd gradeX">
                                            <td>
                                            <form method="get">
                                            <button class="btn btn-<?php if( $resulta['etat']==1) echo "success"; else echo "danger";?>" type="submit" value="<?php echo $resulta['id_hotel'];?>" name="<?php if( $resulta['etat']==1) echo "desactive"; else echo "active";?>"><i class="icon-<?php if( $resulta['etat']==1) echo "ok"; else echo "ban-circle";?>"></i></button>
                                         </form>   </td>
                                     
                                            <td><?php 
		$sqlregion = mysql_query("SELECT region FROM regions where id='".$resulta['region']."' ") or die(mysql_error());
   		$resultregion = mysql_fetch_row($sqlregion);   				 
											
											
											echo $resultregion[0];?></td>
                                            <td> 
                                            
                                            <a href="fiche_hotel.php?id_hotel=<?php echo $resulta['id_hotel'];?>"><button class="btn btn-primary"><i class="icon-search"></i></button></a></td>
                                            <td><a   title="Modifier cet h&ocirc;tel" href="ajouter_hotels.php?id_hotel=<?php echo $resulta['id_hotel'];?>"><button class="btn btn-primary"><i class="icon-pencil"></i></button></a></td>
                                            <td><a  title="Tarifs"  href="tarifs_hotel.php?id_hotel=<?php echo $resulta['id_hotel'];?>"><button class="btn"  <?php
      $testtarif=mysql_query("select * from tarifs where id_hotel='".$resulta['id_hotel']."' and  date_depart <= '".date("Y-m-d")."' and date_fin >='".date("Y-m-d")."'");
	  if(mysql_num_rows($testtarif)==0) echo' style="background-color:#F90" ';
											
											?> ><i class="icon-money"></i></button></a>
                                            
                                            	</td>
                                            <td><a  title="Allotement"  href="allotement_hotel.php?id_hotel=<?php echo $resulta['id_hotel'];?>"><button class="btn"  <?php
      $testalot=mysql_query("select * from allotement where etat='1'and date_depart <= '".date("Y-m-d")."' and date_fin >='".date("Y-m-d")."'  and id_hotel='".$resulta['id_hotel']."'");
	  if(mysql_num_rows($testalot)==0) echo'style="background-color:#F90"';
											
											?> ><i class="icon-archive"></i></button></a>
                                            
                                          </td>
                                            <td><a  title="Promotion" href="promos_hotel.php?id_hotel=<?php echo $resulta['id_hotel'];?>"><button class="btn"  <?php
      $testpromo=mysql_query("select * from promotions where etat='1'and date_depart <= '".date("Y-m-d")."' and date_fin >='".date("Y-m-d")."' and id_hotel='".$resulta['id_hotel']."'");
	  if(mysql_num_rows($testpromo)==0) echo'style="background-color:#F90"';
											
											?> ><i class="icon-money"></i></button></a>
                                            
										
                                            </td>
                                            <td><a  title="Gestion des images"  href="images_hotels.php?id_hotel=<?php echo $resulta['id_hotel'];?>">
                                            <button  class="btn" <?php
      $testtarif=mysql_query("select * from images where  id_hotel='".$resulta['id_hotel']."'");
	  if(mysql_num_rows($testtarif)==0) echo'style="background-color:#F90"';
											
											?>><i class="icon-camera"></i></button></a>
                                             
                                            
                                            </td>
                                                                                        <td><a href="javascript: if(confirm('Supprimer cet H&ocirc;tel?')) document.location.href='supprimer_hotel.php?id_hotel=<?php echo $resulta['id_hotel'];?>'"><button class="btn btn-danger"><i class="icon-trash "></i></button></a></td>

                                            
                                       <td>
                                       
                                       
                                       <div class="fb-share-button" data-href="http://www.rbstravel.com.tn/hotel-details-<?php echo $resulta['id_hotel'];?>.html" data-layout="box_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Partager</a></div>
                                       
                       
                                            
                                              
                                        </tr>
                                        
                                       
                                        
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
   <script src="js/dynamic-table.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>