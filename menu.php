<?php

$page=explode("/",$_SERVER['PHP_SELF']);
$encour= $page[sizeof($page)-1];
?>


     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse" >

<ul class="sidebar-menu">
          <div id="sidebar" class="nav-collapse collapse">

              <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
              
              <!-- END RESPONSIVE QUICK SEARCH FORM -->
              <!-- BEGIN SIDEBAR MENU -->
              <ul class="sidebar-menu  ">
              <li class="sub-menu <?php if($encour== "index.php") echo " active ";?>">
                  <a class="" href="index.php">
                      <i class="icon-dashboard"></i>
                      <span>Tableau de bord</span>
                  </a>
              </li>
              <li class="sub-menu  <?php if($encour=="tarifs_hotel.php"||$encour=="allotement_hotel.php"||$encour=="promos_hotel.php"||$encour== "images_hotels.php" ||$encour== "recherche_hotels.php" ||$encour== "fiche_hotel.php" || $encour== "ajouter_hotels.php") echo " active ";?>  ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>H&ocirc;tels</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
                      <li class=" <?php if($encour== "ajouter_hotels.php") echo " active ";?>"><a class="" href="ajouter_hotels.php">Ajouter</a></li>
                      <li class="<?php if($encour== "recherche_hotels.php") echo " active ";?>"><a class="" href="recherche_hotels.php">Recherche</a></li>
                 
                      
                  </ul>
              </li>
              <?php if(isset($_GET['table'])) $encourp=$_GET['table']; else $encourp="";?>
              <li class="sub-menu  <?php if($encour== "parametres_hotels.php" ||($encour== "parametres_reductions.php") ||($encour== "parametres_supplements.php") ||($encour== "parametres_type_chambre.php")) echo " active ";?>  ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Param&eacute;tres</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
                      <li class=" <?php if($encourp== "localisation") echo " active ";?>"><a class="" href="parametres_hotels.php?table=localisation"> Localisation</a></li>

                      <li class=" <?php if($encourp== "amenagement") echo " active ";?>"><a class="" href="parametres_hotels.php?table=amenagement"> Amenagements</a></li>
                      <li class=" <?php if($encourp== "arrangement") echo " active ";?>"><a class="" href="parametres_hotels.php?table=arrangement"> Arrangements</a></li>
                      <li class=" <?php if($encourp== "equipements") echo " active ";?>"><a class="" href="parametres_hotels.php?table=equipements"> Equipements</a></li>
                      <li class=" <?php if($encourp== "option_hotel") echo " active ";?>"><a class="" href="parametres_hotels.php?table=option_hotel"> Options h&ocirc;tel</a></li>
                      <li class=" <?php if($encour== "parametres_type_chambre.php") echo " active ";?>"><a class="" href="parametres_type_chambre.php"> Types chambre</a></li>
                      <li class=" <?php if($encour== "parametres_supplements.php") echo " active ";?>"><a class="" href="parametres_supplements.php"> Suppl&eacute;ments H&ocirc;tel</a></li>
                      <li class=" <?php if($encour== "parametres_reductions.php") echo " active ";?>"><a class="" href="parametres_reductions.php"> R&eacute;ductions H&ocirc;tel</a></li>
                      <li class=" <?php if($encourp== "ville") echo " active ";?>"><a class="" href="parametres_hotels.php?table=regions"> Villes</a></li>


 
 
 
 
                  
                      
                  </ul>
              </li>
             <!--
              <li class="sub-menu <?php if($encour== "ajouter_excursion.php" || $encour== "recherche_excursion.php" ||$encour== "fiche_excursion.php" || $encour== "images_excursion.php" ) echo " active ";?> ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Excursions</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub    ">
                      <li class=" <?php if($encour== "ajouter_excursion.php") echo " active ";?>"><a class="" href="ajouter_excursion.php">Ajouter</a></li>
                      <li  class=" <?php if($encour== "recherche_excursion.php") echo " active ";?>"><a class="" href="recherche_excursion.php">Recherche</a></li>
                      
                  </ul>
              </li>
              
              -->
              <li class="sub-menu  <?php if($encour== "ajouter_circuit.php" || $encour== "recherche_circuit.php" ||$encour== "fiche_circuit.php" || $encour== "images_circuit.php") echo " active ";?>   ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Circuits</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub   ">
                      <li  class=" <?php if($encour== "ajouter_circuit.php") echo " active ";?>"><a class="" href="ajouter_circuit.php">Ajouter</a></li>
                      <li  class=" <?php if($encour== "recherche_circuit.php") echo " active ";?>"><a class="" href="recherche_circuit.php">Recherche</a></li>
                      
                  </ul>
              </li>
              
              
              <li class="sub-menu   <?php if($encour== "ajouter_voyage.php" || $encour== "recherche_voyage.php" ||$encour== "fiche_voyage.php" || $encour== "images_voyage.php" ) echo " active ";?>   ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Voyages &agrave; l'&eacute;tranger</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
                      <li  class=" <?php if($encour== "ajouter_voyage.php") echo " active ";?>" ><a class="" href="ajouter_voyage.php">Ajouter</a></li>
                      <li  class=" <?php if($encour== "recherche_voyage.php") echo " active ";?>"><a class="" href="recherche_voyage.php">Recherche</a></li>
                      
                  </ul>
              </li>
              
              <li class="sub-menu   <?php if($encour== "ajouter_croisiere.php" || $encour== "recherche_croisiere.php" ||$encour== "fiche_croisiere.php" || $encour== "images_croisiere.php" ) echo " active ";?>   ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Croisi&eacute;res</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
                      <li  class=" <?php if($encour== "ajouter_croisiere.php") echo " active ";?>" ><a class="" href="ajouter_croisiere.php">Ajouter</a></li>
                      <li  class=" <?php if($encour== "recherche_croisiere.php") echo " active ";?>"><a class="" href="recherche_croisiere.php">Recherche</a></li>
                      
                  </ul>
              </li>
              
              <li class="sub-menu   <?php if($encour== "ajouter_omra.php" || $encour== "recherche_omra.php" ||$encour== "fiche_fiche.php" || $encour== "images_omra.php" ) echo " active ";?>   ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>OMRA</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
                      <li  class=" <?php if($encour== "ajouter_omra.php") echo " active ";?>" ><a class="" href="ajouter_omra.php">Ajouter</a></li>
                      <li  class=" <?php if($encour== "recherche_omra.php") echo " active ";?>"><a class="" href="recherche_omra.php">Recherche</a></li>
                      
                  </ul>
              </li>
              
             
              
              
              
              <li class="sub-menu <?php if(isset($_GET['page']) || $encour== "reservation_hotel.php" || $encour== "reservation_billetterie.php" || $encour== "reservation_mice.php" || $encour== "reservation_omra.php") echo " active "; ?> ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>R&eacute;servations</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
                  
                           <?php if(isset($_GET['page'])) $encourpa=$_GET['page']; else $encourpa="";?>
                      <li class="">
                      <a class="<?php if($encour== "reservation_hotel.php") echo " active ";?>"
                       href="reservation_hotel.php"> H&ocirc;tels</a></li>
                       
                     <!-- <li class="<?php if($encourpa== "excursion") echo " active ";?>"><a 
                       href="reservation_cruise.php?page=excursion"> Excursions</a></li>-->
                       
                      <li class="<?php if($encourpa== "circuit") echo " active ";?>"><a  
                      href="reservation_cruise.php?page=circuit"> Circuits</a></li>
                      
                      <li class="<?php if($encourpa== "croisiere") echo " active ";?>"><a 
                       href="reservation_cruise.php?page=croisiere"> Croisiere</a></li>
                       
                      <li class="<?php if($encourpa== "voyage") echo " active ";?>"><a  
                      href="reservation_cruise.php?page=voyage"> Voyages &agrave; l'&eacute;tranger</a></li>
                      
                      <li class="<?php if($encour== "reservation_billetterie.php") echo " active ";?>"><a  
                      href="reservation_billetterie.php"> Billetterie</a></li>
                      
                      <li class="<?php if($encour== "reservation_mice.php") echo " active ";?>"><a  href="reservation_mice.php"> MICE</a></li>
                      <li class="<?php if($encourpa== "omra") echo " active ";?>"><a href="reservation_cruise.php?page=omra"> OMRA</a></li>
                  </ul>
              </li>
              
              
                 <li class="sub-menu   <?php if($encour== "voucher_nv.php" || $encour== "voucher.php"|| $encour== "voucher_modifier.php"  ) echo " active ";?>   ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Vouchers</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
<li  class=" <?php if($encour== "voucher_nv.php") echo " active ";?>" ><a class="" href="voucher_nv.php">Ajouter</a></li>
<li  class=" <?php if($encour== "voucher.php") echo " active ";?>"><a class="" href="voucher.php">Recherche</a></li>
                      
                  </ul>
              </li>
              
              
              <li class="sub-menu   <?php if($encour== "facture_nv.php" || $encour== "factures.php"|| $encour== "facture_modifier.php"  ) echo " active ";?>   ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Factures</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
<li  class=" <?php if($encour== "facture_nv.php") echo " active ";?>" ><a class="" href="facture_nv.php">Ajouter</a></li>
<li  class=" <?php if($encour== "factures.php") echo " active ";?>"><a class="" href="factures.php">Recherche</a></li>
                      
                  </ul>
              </li>
                <li class="<?php if($encour== "clients.php" ) echo " active ";?>  ">
                  <a href="clients.php" class="">
                      <i class="icon-book"></i>
                      <span>CLIENTS</span>
                      <span class="arrow"></span>
                  </a>
                      
                  
              </li>
              
              <li class="sub-menu   <?php if($encour== "ajouter_service.php" || $encour== "recherche_service.php"  ) echo " active ";?>   ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Services</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
<li  class=" <?php if($encour== "ajouter_service.php") echo " active ";?>" ><a class="" href="ajouter_service.php">Ajouter</a></li>
<li  class=" <?php if($encour== "recherche_service.php") echo " active ";?>"><a class="" href="recherche_service.php">Recherche</a></li>
                      
                  </ul>
              </li>
              
              
              <li class="sub-menu   <?php if($encour== "tourisme_medical.php" || $encour== "tourisme_medical_g.php"  ) echo " active ";?>   ">
                  <a href="javascript:;" class="">
                      <i class="icon-book"></i>
                      <span>Tourisme médical</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub ">
<li  class=" <?php if($encour== "tourisme_medical.php") echo " active ";?>" ><a class="" href="tourisme_medical.php">Modifier</a></li>
<li  class=" <?php if($encour== "tourisme_medical_g.php") echo " active ";?>"><a class="" href="tourisme_medical_g.php">Gallerie</a></li>
                      
                  </ul>
              </li>
         <!--       
              <li class="sub-menu   <?php if($encour== "partenaires.php"   ) echo " active ";?>   ">
                  <a href="partenaires.php" class="">
                      <i class="icon-book"></i>
                      <span>Partenaires</span>
                      <span class="arrow"></span>
                  </a>
                  
              </li>
              -->
          </ul>
              <!-- END SIDEBAR MENU -->
          </div>
     </ul></div></div>