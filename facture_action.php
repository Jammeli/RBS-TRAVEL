<?php
include('connexion.php');
		
		
 $nbreligne=$_REQUEST['nbreligne'];
 
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
//$cin=$_REQUEST['cin'];
//$email=$_REQUEST['email'];
$adresse=$_REQUEST['adresse'];
$date=date("Y-m-d");
$heure=date("H:i:s");
$total=$_REQUEST['total'];
$numfact=numero('facture');
$id_commande=0;
	
			mysql_query("INSERT INTO `facture` (`numfact`, `date`,`heure`,`nom`,`prenom`,`cin`,`tel`,`email`,`prixtot`,`etat`,`id_commande`,`source`) 
			VALUES ('$numfact', '$date', '$heure','$nom','$prenom','','$adresse','','$total','0','$id_commande', 'manuel');") or die(mysql_error());
			for($i=0;$i<$nbreligne;$i++)
			{ 
			mysql_query("INSERT INTO `facture_contenu` (`id`, `numfact`, `clients`, `arrangement`, `pax`, `pu`, `qte`, `id_commande`) VALUES (NULL,'$numfact','".$_REQUEST['designation'.$i]."','".$_REQUEST['arrangement'.$i]."','".$_REQUEST['pax'.$i]."','".$_REQUEST['pu'.$i]."','".$_REQUEST['qte'.$i]."','$id_commande')") or die(mysql_error()); 
		
			}
	

?>
<script type="text/javascript" language="Javascript">window.open('<?php echo 'facture_fiche.php?id='.$numfact;?>');</script>
<script type="text/javascript" language="Javascript">document.location.href='factures.php';</script>
		<?php
?>
