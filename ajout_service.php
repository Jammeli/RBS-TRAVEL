<?php
include('../connexion.php');
	
 
$id=$_REQUEST['id'];
$titre=mysql_real_escape_string($_REQUEST['titre']);
$texte=  mysql_real_escape_string($_REQUEST['texte']);
if(isset($_REQUEST['active'])) if(isset($_REQUEST['active'])) $etat=$_REQUEST['active'];else $etat=0;else $etat=0;

	if($id==0){	
	
	
	
	$upload1 = upload2('monimage','uploade/', array('png','gif','jpg','jpeg') );
  
	
	
	 mysql_query("INSERT INTO `services` (`id`, `titre`, `image`, `texte`, `etat`) VALUES (NULL, '".$titre."', '".$upload1."', '".$texte."', '".$etat."');") or die(mysql_error());
	 
	
	}
	else{
		
	if($_FILES['monimage']['error']==0){
		echo "hhh";	
			$upload1 = upload2('monimage','uploade/', array('png','gif','jpg','jpeg') );
		
			if($upload1!="chargement" && $upload1!="taille"&& $upload1!="extension"&& $upload1!="erreur"){ 
	       $sqlll=mysql_query("select image from services where id='".$id."'");
			$ss=mysql_fetch_row($sqlll);
			unlink("../".$ss[0]);
					mysql_query("update services set image='".$upload1."' where id='".$id."' ") or die(mysql_error());
	
  			}
		}
		mysql_query("UPDATE `services` SET `etat`='$etat',`texte`='$texte',`titre`='$titre' where `id`='$id' ;") or die(mysql_error());		
	}
header('Location:../recherche_service.php');
?>
