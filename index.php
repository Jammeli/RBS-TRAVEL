
<?php include("connexion.php");

?>
<?php
$sqluser=mysql_query("select * from clients");
$nbuser=mysql_num_rows($sqluser);

$sqlvisite=mysql_query("select * from nb_visite");
$nbvisite=mysql_num_rows($sqlvisite);



$sqlhotattente=mysql_query("select * from demmande_hotel where etat='0'");
$sqlhotattente1=mysql_query("select * from demande_billetterie where etat='0'");
$sqlhotattente2=mysql_query("select * from demande_congre where lu='0'");
$sqlhotattente3=mysql_query("select * from demmande_cruise where etat='0'");


$sqlhoteleffect=mysql_query("select * from demmande_hotel where etat='1'");
$sqlhoteleffect1=mysql_query("select * from demande_billetterie where etat='1'");
$sqlhoteleffect2=mysql_query("select * from demande_congre where lu='1'");
$sqlhoteleffect3=mysql_query("select * from demmande_cruise where etat='1'");


$sqlhotelannuler=mysql_query("select * from demmande_hotel where etat='2'");
$sqlhotelannuler1=mysql_query("select * from demande_billetterie where etat='2'");
$sqlhotelannuler2=mysql_query("select * from demande_congre where lu='2'");
$sqlhotelannuler3=mysql_query("select * from demmande_cruise where etat='2'");



$nbhotattente=mysql_num_rows($sqlhotattente)+mysql_num_rows($sqlhotattente1)+mysql_num_rows($sqlhotattente2)+mysql_num_rows($sqlhotattente3);

$nbhoteleffect=mysql_num_rows($sqlhoteleffect)+mysql_num_rows($sqlhoteleffect1)+mysql_num_rows($sqlhoteleffect2)+mysql_num_rows($sqlhoteleffect3);

$nbhotelannule=mysql_num_rows($sqlhotelannuler)+mysql_num_rows($sqlhotelannuler1)+mysql_num_rows($sqlhotelannuler2)+mysql_num_rows($sqlhotelannuler3);




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
   <meta content="Mosaddek" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
   <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
   <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
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
         <!-- END SIDEBAR MENU -->
     
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
                     Tableau de bord
                   </h3>
                   
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <!--BEGIN METRO STATES-->
                <div class="metro-nav">
                    <div class="metro-nav-block nav-block-orange">
                        <a data-original-title="" href="#">
                            <i class="icon-user"></i>
                            <div class="info"><?php echo $nbuser;?></div>
                            <div class="status">Nombre utilisateur inscrit</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-green double">
                        <a data-original-title="" href="#">
                            <i class="icon-eye-open"></i>
                            <div class="info">+<?php echo $nbvisite;?></div>
                            <div class="status">Nombre de Visiteurs</div>
                        </a>
                    </div>
                    <!--
                    <div class="metro-nav-block nav-light-green">
                        <a data-original-title="" href="#">
                            <i class="icon-envelope"></i>
                            <div class="info">123</div>
                            <div class="status">Messages</div>
                        </a>
                    </div>
                    
                   
                    <div class="metro-nav-block nav-block-yellow">
                        <a data-original-title="" href="#">
                            <i class="icon-comments-alt"></i>
                            <div class="info">49</div>
                            <div class="status">Commentaires</div>
                        </a>
                    </div> 
                    
                    <div class="metro-nav-block nav-block-red">
                        <a data-original-title="" href="#">
                            <i class="icon-bar-chart"></i>
                            <div class="info">+288</div>
                            <div class="status">Statistiques</div>
                        </a>
                    </div>-->
                </div>
                <div class="metro-nav">
                    <div class="metro-nav-block nav-light-purple">
                        <a data-original-title="" href="#">
                            <i class="icon-shopping-cart"></i>
                            <div class="info"><?php echo $nbhotattente;?>

</div>
                            <div class="status">R&eacute;servations en attente</div>
                        </a>
                    </div>
                    
                    <div class="metro-nav-block nav-olive">
                        <a data-original-title="" href="#">
                            <i class="icon-tags"></i>
                            <div class="info"><?php echo $nbhoteleffect;?></div>
                            <div class="status">Ventes</div>
                        </a>
                    </div>
                    
                    <div class="metro-nav-block nav-light-brown">
                        <a data-original-title="" href="#">
                            <i class="icon-remove-sign"></i>
                            <div class="info"><?php echo $nbhotelannule;?></div>
                            <div class="status">Annulations</div>
                        </a>
                    </div>
                    <!--
                    <div class="metro-nav-block nav-light-blue double">
                        <a data-original-title="" href="#">
                            <i class="icon-tasks"></i>
                            <div class="info">37624DT</div>
                            <div class="status">Total</div>
                        </a>
                    </div>
                    <div class="metro-nav-block nav-block-grey ">
                        <a data-original-title="" href="#">
                            <i class="icon-external-link"></i>
                            <div class="info">53412DT</div>
                            <div class="status">Chiffre d'affaire</div>
                        </a>
                    </div>-->
                </div>
                <div class="space10"></div>
                <!--END METRO STATES-->
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget ">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Nombre de vues / cat&eacute;gories</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <?php include("statistique/cercle.php");?>
                                
                            </div>
                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
                </div>
                <div class="span6">
                    <!-- BEGIN CHART PORTLET-->
                    <div class="widget green">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"> </i> Nombres de visites</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <?php include("statistique/line.php");?>
                            </div>
                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
                </div>
            </div>
                <!--BEGIN GENERAL STATISTICS

            <div class="row-fluid">
                <div class="span7">
                
                    <div class="widget orange">
                        <div class="widget-title">
                            <h4><i class="icon-tasks"></i> General Statistics </h4>
                         <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                         </span>
                            <div class="update-btn">
                                <a href="javascript:;" class="btn update-easy-pie-chart"><i class="icon-repeat"></i> Update</a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <div class="easy-pie-chart">
                                    <div class="percentage success" data-percent="55"><span>55</span>%</div>
                                    <div class="title">New visits</div>
                                </div>
                                <div class="easy-pie-chart">
                                    <div class="percentage" data-percent="46"><span>46</span>%</div>
                                    <div class="title">Bounce rate</div>
                                </div>
                                <div class="easy-pie-chart">
                                    <div class="percentage" data-percent="92"><span>92</span>%</div>
                                    <div class="title">Server load</div>
                                </div>
                                <div class="easy-pie-chart">
                                    <div class="percentage" data-percent="84"><span>752</span>MB</div>
                                    <div class="title">Used RAM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                </div>
                <div class="span5">
                    <div class="widget purple">
                        <div class="widget-title">
                            <h4><i class="icon-tasks"></i> General Statistics </h4>
                         <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                         </span>
                        </div>
                        <div class="widget-body">
                            <div class="row-fluid">
                                <div class="text-center">
                                    <div class="sparkline">
                                        <div id="metro-sparkline-type1"></div>
                                        <div class="sparkline-tittle">Server Load</div>
                                    </div>
                                    <div class="sparkline">
                                        <div id="metro-sparkline-type2"></div>
                                        <div class="sparkline-tittle">Network Load</div>
                                    </div>
                                    <div class="sparkline">
                                        <div id="metro-sparkline-type3"></div>
                                        <div class="sparkline-tittle">Visit Load</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
           -->
            <div class="row-fluid" id="notifications">
                 <div class="span6">
                     <!-- BEGIN NOTIFICATIONS PORTLET-->
                     <div class="widget blue">
                         <div class="widget-title">
                             <h4><i class="icon-bell"></i> Notifications </h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                               <a href="javascript:;" class="icon-remove"></a>
                           </span>
                         </div>
                         <div class="widget-body">
                             <ul class="item-list scroller padding"  style="overflow: hidden; width: auto; height: 320px;" data-always-visible="1">
                           
          <?php
		  $notif=mysql_query("select * from notifications where lu='0'  ORDER BY date DESC ") or die(mysql_error());
		  while($resnotif=mysql_fetch_array($notif)){
			  
			  $mode=$resnotif['mode'];
			  $source=$resnotif['source'];
			  
			  if($mode=='attente') $couleur='label-warning';  
			  elseif($mode=='valide') $couleur='label-success';  
			  elseif($mode=='danger') $couleur='label-important';  
			  
			  if($source=='hotel') $lien='fiche_reservation_hotel.php?id='.$resnotif['id_element'];  
			  elseif($source=='circuit') $lien='fiche_reservation.php?id='.$resnotif['id_element'].'&page=circuit';  
			  elseif($source=='excursion') $lien='fiche_reservation.php?id='.$resnotif['id_element'].'&page=excursion';  
			  elseif($source=='voyage') $lien='fiche_reservation.php?id='.$resnotif['id_element'].'&page=voyage';  
			  elseif($source=='omra') $lien='fiche_reservation.php?id='.$resnotif['id_element'].'&page=omra';  
			  elseif($source=='croisiere') $lien='fiche_reservation.php?id='.$resnotif['id_element'].'&page=croisiere';  
			  elseif($source=='mice') $lien='fiche_reservation_mice.php?id='.$resnotif['id_element'];  
			  elseif($source=='billetterie') $lien='fiche_reservation_billetterie.php?id='.$resnotif['id_element'];  

			    
         
		  ?>                       
                                 
                                 <li>
                                    <a 
href="javascript:window.open('<?php echo $lien;?>','Fiche <?php echo $resnotif['source'];?> Num <?php echo $resnotif['id_element'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" ><span class="label <?php echo $couleur;?> "><i class="icon-bell"></i></span></a>
                                     <span><?php echo $resnotif['text'];?></span>
                                     <div class="pull-right">
                                         <span class="small italic ">(<?php echo $resnotif['source'];?>)</span>
                                         <span class="small italic "><?php echo temp($resnotif['date']);?></span>

                                     </div>
                                     
                                 </li>
                                 
             <?php }?>
                                 
                                 
                                 
                                
                             </ul>
                             <div class="space10"></div>
                            
                          
                             <div class="clearfix no-top-space no-bottom-space"></div>
                         </div>
                     </div>
                     <!-- END NOTIFICATIONS PORTLET-->
                 </div>
                 <div class="span6">
                     <!-- BEGIN CHAT PORTLET-->
                     <div class="widget orange">
                        <div class="widget-title">
                            <h4><i class="icon-bell-alt"></i> Alertes</h4>
                            <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                        
                        <?php
		  $alert1=mysql_query("select * from notifications where  source='hotel' and lu='1' and id_element in(select id_commande from demmande_hotel where etat='0')  ORDER BY date DESC ") or die(mysql_error());
		  while($resalert1=mysql_fetch_array($alert1)){
			  			  $source=$resalert1['source'];

			  if($source=='hotel') {
				  $lien='fiche_reservation_hotel.php?id='.$resalert1['id_element'];  
			  	  $msj="R&eacute;servation d'h&ocirc;tel n'est pas trait&eacute; , cliquez pour l'affiche...";
			  }
			  ?>     
                            <div class="alert alert-error">
                               <a style="text-decoration:none;" href="javascript:window.open('<?php echo $lien;?>','Fiche <?php echo $resalert1['source'];?> Num <?php echo $resalert1['id_element'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" ><button data-dismiss="alert" class="close">x</button>
                                <strong>Attention!</strong><?php echo $msj;?></a>
                            </div>
                     <?php }?>
                            
     
     
     
                             <?php
		  $alert2=mysql_query("select * from notifications where  source='billetterie' and lu='1' and id_element in(select id from demande_billetterie where etat='0')  ORDER BY date DESC ") or die(mysql_error());
		  while($resalert2=mysql_fetch_array($alert2)){
			  			  $source=$resalert2['source'];
			  if($source=='billetterie') {
				   $lien='fiche_reservation_billetterie.php?id='.$resalert2['id_element']; 
			  	  $msj="R&eacute;servation d'une Billet n'est pas trait&eacute; , cliquez pour l'affiche...";
			  }
			  ?>     
                            <div class="alert alert-error">
                               <a style="text-decoration:none;" href="javascript:window.open('<?php echo $lien;?>','Fiche <?php echo $resalert2['source'];?> Num <?php echo $resalert2['id_element'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" ><button data-dismiss="alert" class="close">x</button>
                                <strong>Attention!</strong><?php echo $msj;?></a>
                            </div>
                     <?php }?>
                                                   
                          
                          
                          
                                <?php
		  $alert3=mysql_query("select * from notifications where  source='mice' and lu='1' and id_element in(select id from demande_congre where lu='0')  ORDER BY date DESC ") or die(mysql_error());
		  while($resalert3=mysql_fetch_array($alert3)){
			  			  $source=$resalert3['source'];
			  if($source=='mice') {
				   $lien='fiche_reservation_mice.php?id='.$resalert3['id_element']; 
			  	  $msj="R&eacute;servation d'un MICE n'est pas trait&eacute; , cliquez pour l'affiche...";
			  }
			  ?>     
                            <div class="alert alert-error">
                               <a style="text-decoration:none;" href="javascript:window.open('<?php echo $lien;?>','Fiche <?php echo $resalert3['source'];?> Num <?php echo $resalert3['id_element'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" ><button data-dismiss="alert" class="close">x</button>
                                <strong>Attention!</strong><?php echo $msj;?></a>
                            </div>
                     <?php }?>
                                                   
                                              
                                  <?php
		  $alert4=mysql_query("select * from notifications where  source!='mice' and source!='billetterie' and source!='hotel' and lu='1' and id_element in(select id_commande from demmande_cruise where etat='0')  ORDER BY date DESC ") or die(mysql_error());
		  while($resalert4=mysql_fetch_array($alert4)){
			  			  $source=$resalert4['source'];
			 if($source=='circuit'){
				   $lien='fiche_reservation.php?id='.$resalert4['id_element'].'&page=circuit';
			  	  $msj="R&eacute;servation d'un circuit n'est pas trait&eacute; , cliquez pour l'affiche...";
			  }
			  
			    
			  elseif($source=='excursion') {
				  $lien='fiche_reservation.php?id='.$resalert4['id_element'].'&page=excursion'; 
			  	  $msj="R&eacute;servation d'une excursion n'est pas trait&eacute; , cliquez pour l'affiche...";
			  }
			  
			  
			  elseif($source=='voyage'){
				   $lien='fiche_reservation.php?id='.$resalert4['id_element'].'&page=voyage';
			  	  $msj="R&eacute;servation d'un voyage n'est pas trait&eacute; , cliquez pour l'affiche...";
			  }
			  
			   
			  elseif($source=='omra') {
				  $lien='fiche_reservation.php?id='.$resalert4['id_element'].'&page=omra'; 
			  	  $msj="R&eacute;servation d'OMRA n'est pas trait&eacute; , cliquez pour l'affiche...";
			  }
			  
			   
			  elseif($source=='croisiere'){
				   $lien='fiche_reservation.php?id='.$resalert4['id_element'].'&page=croisiere';  
			  	  $msj="R&eacute;servation d'une croisière n'est pas trait&eacute; , cliquez pour l'affiche...";
			  }
			  
			  ?>     
                            <div class="alert alert-error">
                               <a style="text-decoration:none;" href="javascript:window.open('<?php echo $lien;?>','Fiche <?php echo $resalert4['source'];?> Num <?php echo $resalert4['id_element'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" ><button data-dismiss="alert" class="close">x</button>
                                <strong>Attention!</strong><?php echo $msj;?></a>
                            </div>
                     <?php }?>
                                                   
                        
                          
                            
                        </div>
                    </div>
                         <!--
                     <div class="widget red">
                         <div class="widget-title">
                             <h4><i class="icon-comments-alt"></i> Chats</h4>
									<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
									</span>
                         </div>
                         
                     
                         <div class="widget-body">
                             <div class="timeline-messages">
                               
                                 <div class="msg-time-chat">
                                     <a class="message-img" href="#"><img alt="" src="img/avatar1.jpg" class="avatar"></a>
                                     <div class="message-body msg-in">
                                         <span class="arrow"></span>
                                         <div class="text">
                                             <p class="attribution"><a href="#">Jhon Doe</a> at 1:55pm, 13th April 2013</p>
                                             <p>Hello, How are you brother?</p>
                                         </div>
                                     </div>
                                 </div>
                               
                                 <div class="msg-time-chat">
                                     <a class="message-img" href="#"><img alt="" src="img/avatar2.jpg" class="avatar"></a>
                                     <div class="message-body msg-out">
                                         <span class="arrow"></span>
                                         <div class="text">
                                             <p class="attribution"> <a href="#">Jonathan Smith</a> at 2:01pm, 13th April 2013</p>
                                             <p>I'm Fine, Thank you. What about you? How is going on?</p>
                                         </div>
                                     </div>
                                 </div>
                               
                                 <div class="msg-time-chat">
                                     <a class="message-img" href="#"><img alt="" src="img/avatar1.jpg" class="avatar"></a>
                                     <div class="message-body msg-in">
                                         <span class="arrow"></span>
                                         <div class="text">
                                             <p class="attribution"><a href="#">Jhon Doe</a> at 2:03pm, 13th April 2013</p>
                                             <p>Yeah I'm fine too. Everything is going fine here.</p>
                                         </div>
                                     </div>
                                 </div>
                                
                                 <div class="msg-time-chat">
                                     <a class="message-img" href="#"><img alt="" src="img/avatar2.jpg" class="avatar"></a>
                                     <div class="message-body msg-out">
                                         <span class="arrow"></span>
                                         <div class="text">
                                             <p class="attribution"><a href="#">Jonathan Smith</a> at 2:05pm, 13th April 2013</p>
                                             <p>well good to know that. anyway how much time you need to done your task?</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="chat-form">
                                 <div class="input-cont">
                                     <input type="text" placeholder="Type a message here..." />
                                 </div>
                                 <div class="btn-cont">
                                     <a href="javascript:;" class="btn btn-primary">Send</a>
                                 </div>
                             </div>
                         </div>
                         -->
                     </div>
                     <!-- END CHAT PORTLET-->
                 </div>
             </div>
            

            <!-- END PAGE CONTENT-->         
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
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
   <script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>

   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->

   <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
   <script src="js/jquery.sparkline.js" type="text/javascript"></script>
   <script src="assets/chart-master/Chart.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->

   <script src="js/easy-pie-chart.js"></script>
   <script src="js/sparkline-chart.js"></script>
   <script src="js/home-page-calender.js"></script>
   <script src="js/home-chartjs.js"></script>

   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>