<?php

include("connexion.php");



 		$depart= $_POST["depart3"];              
        $destination=$_POST["destination3"];           
        $datedepart= $_POST["datedepart3"];                  
        $modedepart= $_POST["modedepart3"];                   
        $datearriver=  $_POST["datearriver3"];                  
        $modearriver=  $_POST["modearriver3"];                 
        $adulte= $_POST["adulte3"];               
        $enfants=  $_POST["enfants3"];
		 
		  if($_POST["datearriver3"]!="") $mode= "Aller et retour"; else $mode="Aller simple"; 
		  
	mysql_query("INSERT INTO `demande_billetterie` (`id`,`client`, `depart`, `destination`, `datedepart`, `dateretour`, `modealler`, `moderetour`, `adulte`, `enfant`, `mode`, `datedemande`, `heuredemande`, `etat`) 
	
	VALUES ('', '".$_SESSION['mail_connect']."','$depart', '$destination', '$datedepart', '$datearriver', '$modedepart', '$modearriver', '$adulte', '$enfants', '$mode','".date("d-m-Y")."','".date("H:i:s")."', '0');")or die (mysql_error());
	
		$id_billetterie=mysql_insert_id();
	 
	for($i=1;$i<=$adulte;$i++)
{
	
      $nomprenom= $_POST["personne_".$i];
      $passeport=$_POST["passeport_".$i];
	  $date=$_POST["age_annee_".$i]."-".$_POST["age_mois_".$i]."-".$_POST["age_jour_".$i];
	  $type="adulte";
	  mysql_query("INSERT INTO `contenu_billeterie` (`id`, `id_demande`, `nomprenom`, `date_naissance`, `passeport`, `type`) VALUES (NULL, '$id_billetterie', '$nomprenom', '$date', '$passeport', '$type');");
 }		
	
for($i=1;$i<=$enfants;$i++)
{
	
	   $nomprenom= $_POST["personne_enfant_".$i];
      $passeport=$_POST["passeport_enfant_".$i];
	  $date=$_POST["age_annee_enfant_".$i]."-".$_POST["age_mois_enfant_".$i]."-".$_POST["age_jour_enfant_".$i];
	  $type="enfant";
mysql_query("INSERT INTO `contenu_billeterie` (`id`, `id_demande`, `nomprenom`, `date_naissance`, `passeport`, `type`) VALUES (NULL, '$id_billetterie', '$nomprenom', '$date', '$passeport', '$type');");

 }		
 
 			 notification($id_billetterie,'billetterie','attente','reservation en attente .','');

	header("location: demande_vols_reussite.html");  	 