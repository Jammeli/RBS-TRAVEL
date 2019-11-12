<?php
include('../connexion.php');
		$localisation = "0";
		if(isset($_POST['box2View'])){
		foreach ($_POST['box2View'] as $name => $value) {
			
			$localisation .=  "-".$value;
		}
		}



		$options = "0";
		if(isset($_POST['box2OptionsView'])){

		foreach ($_POST['box2OptionsView'] as $name => $value) {
			
			$options .=  "-".$value;
		}
		}
		// echo $options.'<br>';
		// exit;
		
				$Types = "0";

		if(isset($_POST['box2TypesView'])){
		foreach ($_POST['box2TypesView'] as $name => $value) {
			
			$Types .=  "-".$value;
		}
		}
		echo $Types.'<br>';



		$Arrangement = "0";
		if(isset($_POST['box2ArrangementView'])){
		foreach ($_POST['box2ArrangementView'] as $name => $value) {
			
			$Arrangement .=  "-".$value;
		}
		}
		
		// echo $Arrangement.'<br>';
		
		$Themes = "0";
		if(isset($_POST['box2ThemesView'])){
		foreach ($_POST['box2ThemesView'] as $name => $value) {
			
			$Themes .=  "-".$value;
		}
		}
		
		
		// echo $Themes.'<br>';
		
		
		$amenagement = "0";

		if(isset($_POST['box2amenagementView'])){
		foreach ($_POST['box2amenagementView'] as $name => $value) {
			
			$amenagement .=  "-".$value;
		}
		}
		// echo $amenagement.'<br>';
		
		
$id_voyage=$_REQUEST['id_voyage'];
$title=mysql_real_escape_string($_REQUEST['title']);
$promo=mysql_real_escape_string($_REQUEST['promo']);
$code=mysql_real_escape_string($_REQUEST['code']);
$tel=mysql_real_escape_string($_REQUEST['tel']);
$fax=mysql_real_escape_string($_REQUEST['fax']);
$email=mysql_real_escape_string($_REQUEST['email']);
$site=mysql_real_escape_string($_REQUEST['site']);
$adresse=mysql_real_escape_string($_REQUEST['adresse']);
$description_courte= mysql_real_escape_string($_REQUEST['description_courte']);
$description_longue=mysql_real_escape_string($_REQUEST['decription_longue']);
$tel2=mysql_real_escape_string($_REQUEST['tel2']);
$email2=mysql_real_escape_string($_REQUEST['email2']);
$prix=$_REQUEST['prix'];
$nbrj=$_REQUEST['nbrj'];
$datedepart=$_REQUEST['datedepart'];
if(isset($_REQUEST['active'])) $etat=$_REQUEST['active'];else $etat=0;

	if($id_voyage==0){		
			mysql_query("INSERT INTO `voyage` (`id`, `libelle`, `libelle_promo`, `code`, `tel`, `fax`, `email`, `site`, `description_courte`, `localisation`, `option`, `theme`, `amenagement`, `description_longue`, `apartir_de`, `prix`, `nbre_jour`, `etat`,`adresse`, `tel2`,`email2`) VALUES (NULL, '$title', '$promo', '$code', '$tel', '$fax', '$email', '$site', '$description_courte', '$localisation', '$options', '$Themes', '$amenagement', '$description_longue', '$datedepart', '$prix', '$nbrj', '$etat','$adresse', '$tel2','$email2');");

    

	}
	else{
		
		mysql_query("UPDATE `voyage` SET 
		
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

		`amenagement`='$amenagement' ,

		

		`description_courte`='$description_courte' ,

		

		`localisation`='$localisation' ,
		`option`='$options' ,
		

		`theme`='$Themes' ,

		

		`description_longue`='$description_longue' ,
 
		`etat`='$etat',
		`prix`='$prix',
		`nbre_jour`='$nbrj',
		`apartir_de`='$datedepart',
		`adresse`='$adresse'
		
		where `id`='$id_voyage'
;");		
		
		}

header('Location:../recherche_voyage.php');
?>
