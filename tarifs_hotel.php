
<?php include("connexion.php");?>

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
<script type="text/javascript">
                <!--
function open_infos(page,nom,largeur,hauteur)
{

   if(window.innerWidth)
                                {
                                        var leftv = (window.innerWidth-largeur)/2;
                                        var topv = (window.innerHeight-hauteur)/2;
                                }
                                else
                                {
                                        var leftv = (document.body.clientWidth-largeur)/2;
                                        var topv = (document.body.clientHeight-hauteur)/2;
                                }						
								
window.open(page,nom,'menubar=no, scrollbars=no, top='+topv+', left='+leftv+', width='+largeur+', height='+hauteur+'');
}
</script>
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
                     Tarifs de saisons
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

                       <li class="active">
                           Tarifs
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
                        <h4><i class="icon-reorder"></i> Liste des -</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                
                            </span>
                    </div>
                    <a href="ajouter_tarifs.php?id_hotel=<?php echo $_GET['id_hotel'];?>"><button id="editable-sample_new" class="btn green">
                                             Ajouter une saison <i class="icon-plus"></i>
                                         </button></a>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered" id="sample_1">
       <thead>
                                        <tr>
                                            <th>Etat</th>
                                            <th>Date d&eacute;part</th>
                                            <th>Date fin</th>
                                          
                                            <th>Modifier</th>
                                           
                                            <th>Supprimer</th>
                                            
                                            <th>Copier</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                 $result = mysql_query("SELECT * FROM `tarifs`  where id_hotel='".$_GET['id_hotel']."'   ORDER BY `date_depart` DESC;") or die(mysql_error());
   				while($resulta = mysql_fetch_array($result))
   				 {
      			  ?>
                                        <tr class="odd gradeX">
                                            <td>
                                          
                                            <button class="btn btn-<?php if( $resulta['date_fin'] >= date("Y-m-d") ) echo "success"; else echo "danger";?>"  value="<?php echo $resulta['id_hotel'];?>" name="<?php if( $resulta['date_fin'] >= date("Y-m-d") )echo "desactive"; else echo "active";?>"><i class="icon-<?php if( $resulta['date_fin'] >= date("Y-m-d") ) echo "ok"; else echo "ban-circle";?>"></i></button>
                                         </td>
                                            <td><?php echo $resulta['date_depart'];?></td>
                                            <td><?php echo $resulta['date_fin'];?></td>
                                            
                                            
                                            <td><a href="ajouter_tarifs.php?id_hotel=<?php echo $resulta['id_hotel'];?>&id=<?php echo $resulta['id'];?>"><button class="btn btn-primary"><i class="icon-pencil"></i></button></a></td>
                                            
                                            
                                                                                        <td><a href="javascript: if(confirm('Supprimer cette p&eacute;riode?')) document.location.href='supprimer_tarif.php?id_hotel=<?php echo $resulta['id_hotel'];?>&id_tarif=<?php echo $resulta['id'];?>'"><button class="btn btn-danger"><i class="icon-trash "></i></button></a></td>

                                      
                                      
                                      <td>
                                            
                                            
                            <a href="javascript: open_infos('dupliquer_tarif.php?id_hotel=<?php echo $_GET['id_hotel'];?>&idtarif=<?php echo $resulta['id'];?>','popup_parametres_hotels','800','300')" aria-hidden="true"><font class="icon icon-duplicate"></font>Copier</a>                
										
                                            </td>
                                            
                                                  
                                            
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
   <script src="js/dynamic-table.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>