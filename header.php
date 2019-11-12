<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php

$notif=mysql_query("select * from notifications where lu='0'  ORDER BY date DESC ") or die(mysql_error());
$nbnotif=mysql_num_rows($notif);

 $alert1=mysql_query("select * from notifications where  source='hotel' and lu='1' and id_element in(select id_commande from demmande_hotel where etat='0')  ORDER BY date DESC ") or die(mysql_error());
 
 $alert2=mysql_query("select * from notifications where  source='billetterie' and lu='1' and id_element in(select id from demande_billetterie where etat='0')  ORDER BY date DESC ") or die(mysql_error());
 
 		  $alert3=mysql_query("select * from notifications where  source='mice' and lu='1' and id_element in(select id from demande_congre where lu='0')  ORDER BY date DESC ") or die(mysql_error());
		  
  $alert4=mysql_query("select * from notifications where  source!='mice' and source!='billetterie' and source!='hotel' and lu='1' and id_element in(select id_commande from demmande_cruise where etat='0')  ORDER BY date DESC ") or die(mysql_error());


$nbalert=mysql_num_rows($alert1)+mysql_num_rows($alert2)+mysql_num_rows($alert3)+mysql_num_rows($alert4);

 ?>

                          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="index.php" style="color:#fff;">
                   RBS TRAVEL
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
               <div id="top_menu" class="nav notify-row">
                   <!-- BEGIN NOTIFICATION -->
                   <ul class="nav top-menu">
                       <!-- BEGIN SETTINGS -->
                       <li class="dropdown">
                           <a href="index.php#notifications" class="dropdown-toggle" >
                               <i class="icon-tasks"></i>
                               <span class="badge badge-important"><?php echo $nbnotif;?></span>
                           </a>
                           
                       </li>
                       <!-- END SETTINGS -->
                       <!-- BEGIN INBOX DROPDOWN 
                       <li class="dropdown" id="header_inbox_bar">
                           <a href="#notifications" class="dropdown-toggle" >
                               <i class="icon-envelope-alt"></i>
                               <span class="badge badge-important">0</span>
                           </a>
                           
                       </li>-->
                       <!-- END INBOX DROPDOWN -->
                       <!-- BEGIN NOTIFICATION DROPDOWN -->
                       <li class="dropdown" id="header_notification_bar">
                           <a href="index.php#notifications" class="dropdown-toggle" >

                               <i class="icon-bell-alt"></i>
                               <span class="badge badge-warning"><?php echo $nbalert;?></span>
                           </a>
                           
                       </li>
                       <!-- END NOTIFICATION DROPDOWN -->

                   </ul>
               </div>
               <!-- END  NOTIFICATION -->
               <div class="top-nav ">
                   <ul class="nav pull-right top-menu" >
                       <!-- BEGIN SUPPORT -->
                       
                       
                       <!-- END SUPPORT -->
                       <!-- BEGIN USER LOGIN DROPDOWN -->
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <img src="img/avatar-mini.png" alt="">
                               <span class="username">Admin</span>
                               <b class="caret"></b>
                           </a>
                           <ul class="dropdown-menu extended logout">
                               <li><a href="parametres.php"><i class="icon-user"></i> Mon Profile</a></li>
                               <li><a href="modepasse.php"><i class="icon-user"></i> Mot de passe</a></li>
                               <li><a href="images_sliders.php"><i class="icon-user"></i> Images Slider</a></li>
                               <li><a href="deconnexion.php"><i class="icon-key"></i>D&eacute;connexion</a></li>
                           </ul>
                       </li>
                       <!-- END USER LOGIN DROPDOWN -->
                   </ul>
                   <!-- END TOP NAVIGATION MENU -->
               </div>
           </div>
       </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>