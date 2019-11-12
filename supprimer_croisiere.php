<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

$ss=mysql_query("select * from images_croisiere where  id_croisiere='".$_GET['id_croisiere']."'");
while($res=mysql_fetch_array($ss)){ unlink($res['image']);}
mysql_query("delete from images_croisiere where id_excursion='".$_GET['id_croisiere']."'");



mysql_query("delete from croisiere where id='".$_GET['id_croisiere']."'");


header("location: recherche_croisiere.php");
// }


?>