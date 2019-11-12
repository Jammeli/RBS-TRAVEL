<?php
include('../connexion.php');
		
		
$id_omra=$_REQUEST['id_omra'];
$title=mysql_real_escape_string($_REQUEST['title']);
$promo=mysql_real_escape_string($_REQUEST['promo']);
$code=mysql_real_escape_string($_REQUEST['code']);
$tel=mysql_real_escape_string($_REQUEST['tel']);
$fax=mysql_real_escape_string($_REQUEST['fax']);
$email=mysql_real_escape_string($_REQUEST['email']);
$site=mysql_real_escape_string($_REQUEST['site']);
$adresse=mysql_real_escape_string($_REQUEST['adresse']);
$tel2=mysql_real_escape_string($_REQUEST['tel2']);
$email2=mysql_real_escape_string($_REQUEST['email2']);

$description_courte=  mysql_real_escape_string($_REQUEST['description_courte']);
$description_longue=mysql_real_escape_string($_REQUEST['decription_longue']) ;

$prix=$_REQUEST['prix'];
$nbrj=$_REQUEST['nbrj'];
$datedepart=$_REQUEST['datedepart'];
if(isset($_REQUEST['active'])) $etat=$_REQUEST['active'];else $etat=0;

	if($id_omra==0){		
			mysql_query("INSERT INTO `omra` (`id`, `libelle`, `libelle_promo`, `code`, `tel`, `fax`, `email`, `site`, `description_courte`,  `description_longue`, `apartir_de`, `prix`, `nbre_jour`, `etat`,`adresse`, `tel2`,`email2`) 
			
			VALUES (NULL, '$title', '$promo', '$code', '$tel', '$fax', '$email', '$site', '$description_courte',   '$description_longue', '$datedepart', '$prix', '$nbrj', '$etat','$adresse', '$tel2','$email2');");

    

	}
	else{
		
		mysql_query("UPDATE `omra` SET 
		
		 `libelle`='$title' ,

		 `code`='$code' ,

		 `libelle_promo`='$promo' ,

		 `tel`='$tel' ,
`tel2`='$te2l' ,
`email2`='$email2' ,
 
	     `fax`='$fax' ,

		 `email`='$email' ,

		`site`='$site' ,
 
		`adresse`='$adresse' ,

		

		

		`description_courte`='$description_courte' ,

		

	
		

		`description_longue`='$description_longue' ,
 
		`etat`='$etat',
		`prix`='$prix',
		`nbre_jour`='$nbrj',
		`apartir_de`='$datedepart',
		`adresse`='$adresse'
		
		where `id`='$id_omra'
;");		
		
		}

header('Location:../recherche_omra.php');
?>
