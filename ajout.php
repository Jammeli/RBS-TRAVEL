<?php
include('../connexion.php');
function existe_deja($idencour,$id_hotel){
	
	$rech=mysql_query("select suites from promotions where id_hotel='".$id_hotel."'  ");
	$rrech=mysql_fetch_row($rech);
	$anciensuites=$rrech[0];
	
	$ddd=explode('+',$anciensuites);
	foreach($ddd as $valtype){
		if($valtype!='D'){
			
			$chaine=substr($valtype,0,-1);
			$chaine=substr($chaine,1);
			$hhhh=explode("-", $chaine);
			$id=$hhhh[0];
			if($id==$idencour){ return $valtype; break;}
				
				
		}
	}

	return false;
}
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
		
		
				$reductions = "0";
		if(isset($_POST['box2ReductionsView'])){

		foreach ($_POST['box2ReductionsView'] as $name => $value) {
			
			$reductions .=  "-".$value;
		}
		}
		
		
	$Types = "0";

		if(isset($_POST['box2TypesView'])){
		foreach ($_POST['box2TypesView'] as $name => $value) {
			
			$Types .=  "-".$value;
			
		}
		}
		
	
		
	
$Types2 = "0";

		if(isset($_POST['box2Types2View'])){
		foreach ($_POST['box2Types2View'] as $name => $value) {
			
			$Types2 .=  "-".$value;
		}
		}


		$Arrangement = "0";
		if(isset($_POST['box2ArrangementView'])){
		foreach ($_POST['box2ArrangementView'] as $name => $value) {
			
			$Arrangement .=  "-".$value;
		}
		}
		
		
		
		$Themes = "0";
		if(isset($_POST['box2ThemesView'])){
		foreach ($_POST['box2ThemesView'] as $name => $value) {
			
			$Themes .=  "-".$value;
		}
		}
		
		
		
		
		
		$amenagement = "0";

		if(isset($_POST['box2amenagementView'])){
		foreach ($_POST['box2amenagementView'] as $name => $value) {
			
			$amenagement .=  "-".$value;
		}
		}
		
 
$gmap=mysql_real_escape_string($_REQUEST['gmap']);
$id_hotel=$_REQUEST['id_hotel'];
$region=mysql_real_escape_string($_REQUEST['region']);
$etoile=mysql_real_escape_string($_REQUEST['etoile']);
$hotel=mysql_real_escape_string($_REQUEST['hotel']);
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
$description_longue=mysql_real_escape_string($_REQUEST['decription_longue']);
if(isset($_REQUEST['active'])) $etat=$_REQUEST['active'];else $etat=0;
	if($id_hotel==0){	
				$suites='D';

				$type=explode('-',$Types);
				$arrangement=explode('-',$Arrangement);
				foreach($type as $valtype){
					if($valtype!='0'){
						$select=mysql_query("select * from type_chambre where type='suite' && id='".$valtype."'");
					if(mysql_num_rows($select)!=0){
						
						$suites.='+('.$valtype.'-0-0';
						foreach($arrangement as $valarr){
							if($valarr!='0'){
							    $suites.="-".$valarr."=";

							}
						}
					$suites.=')';
					}
					}
				}

					
		
				
				
			mysql_query("INSERT INTO `hotel` (`id_hotel`, `nom`, `code`, `promo`, `region`, `tel`, `fax`, `email`, `site`, `adresse`, `amenagement`, `etoile`, `description_courte`, `min_enf`, `max_enf`, `type_chambre`, `options_hotel`, `localisation`, `theme`, `arrangement`, `description`, `etat`, `gmap`,`supplement_hotel`, `tel2`,`email2`,`reductions`) VALUES (NULL, '$hotel', '$code', '$promo', '$region', '$tel',  '$fax', '$email', '$site',  '$adresse','$amenagement', '$etoile', '$description_courte', '2', '12', '$Types', '$options', '$localisation', '$Themes', '$Arrangement', '$description_longue', '$etat', '$gmap','$Types2', '$tel2','$email2','$reductions');") or die(mysql_error());


	$idhot=mysql_insert_id();


	mysql_query("INSERT INTO `promotions`(`id`, `date_depart`, `date_fin`, `id_hotel`, `delai_a`, `delai_r`, `nb_nuit_min`, `prix`, `acompte`, `red_troisieme`, `red_quatrieme`, `red1`, `red2`, `red3`, `red4`, `suppsingle`, `arrangement`, `supplement_hotel`, `reductions`, `suites`, `etat`) 
	values('id', '".date("Y-m-d")."', '".date("Y-m-d")."', '$idhot', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$suites', '0')") or die(mysql_error());



mysql_query("INSERT INTO `allotement` (`id`, `id_hotel`, `date_depart`, `date_fin`, `allotement`, `etat`) VALUES (NULL, '$idhot', '0', '0', 'D','0');");
	}
	else{
		
			$suites='D';
				
				$type=explode('-',$Types);
				$arrangement=explode('-',$Arrangement);
				foreach($type as $valtype){
					
					if($valtype!='0'){
						
					if(existe_deja($valtype, $id_hotel)!=false){
					
						$suites.='+'.existe_deja($valtype, $id_hotel);
					
					}
					else{
						
						
						
						
						$select=mysql_query("select * from type_chambre where type='suite' && id='".$valtype."'");
					if(mysql_num_rows($select)!=0){
						
						$suites.='+('.$valtype.'-0-0';
						foreach($arrangement as $valarr){
							if($valarr!='0'){
							    $suites.="-".$valarr."=";

							}
						}
					$suites.=')';
					}
					
					
					
					
					}
					
					}
				}
				
			echo $suites;			

		mysql_query("UPDATE `hotel` SET 
		
		 `nom`='$hotel' ,

		 `code`='$code' ,

		 `promo`='$promo' ,

		 `region`='$region' ,

		 `tel`='$tel' ,
		 `tel2`='$tel2' ,
		 `email2`='$email2' ,
 
	     `fax`='$fax' ,

		 `email`='$email' ,

		`site`='$site' ,
 
		`adresse`='$adresse' ,

		`amenagement`='$amenagement' ,

		`etoile`='$etoile' ,

		`description_courte`='$description_courte' ,

		`min_enf`='2' ,

		 `max_enf`='12' ,

		`type_chambre`='$Types' ,

		`options_hotel`='$options' ,

		`localisation`='$localisation' ,

		`theme`='$Themes' ,
		`reductions`='$reductions' ,

		`arrangement`='$Arrangement' ,

		`description`='$description_longue' ,
 
		`etat`='$etat',
		`gmap`='$gmap', 
		`supplement_hotel`='$Types2' 

		
		where `id_hotel`='$id_hotel'
;") or die(mysql_error());

		mysql_query("UPDATE `promotions` SET		 `suites`='$suites'		where `id_hotel`='$id_hotel';") or die(mysql_error());		
		echo "<br>"."UPDATE `promotions` SET		 `suites`='$suites'		where `id_hotel`='$id_hotel';";
				$idhot=$id_hotel;

		}

header('Location:../hotels_menu.php?id_hotel='.$idhot);
?>
