<?php
include('../connexion.php');






$id_tarif=$_REQUEST['id_tarif'];
$id_hotel=$_REQUEST['id_hotel'];		

 $nb_enfant_min=$_REQUEST['nb_enfant_min'];
 $age_enfant_min=$_REQUEST['age_enfant_min'];
 $age_enfant_max=$_REQUEST['age_enfant_max'];
 if(isset($_REQUEST['pourcentage'])) $pourcentage=$_REQUEST['pourcentage']; else $pourcentage='';
 $montant=$_REQUEST['montant'].$pourcentage;

	 $titre=mysql_real_escape_string($_REQUEST['titre']);

			mysql_query("INSERT INTO `special_reduction` (`id`, `id_tarif`,  `titre`, `nb_enfant_min`, `age_enfant_min`, `age_enfant_max`, `montant`) VALUES (NULL, '$id_tarif','$titre', '$nb_enfant_min', '$age_enfant_min', '$age_enfant_max', '$montant');");

  

	

header("Location:../r_spec.php?id_tarif=".$id_tarif."&id_hotel=".$id_hotel."");

?>
