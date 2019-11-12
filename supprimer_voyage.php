<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

$ss=mysql_query("select * from images_voyage where  id_voyage='".$_GET['id_voyage']."'");
while($res=mysql_fetch_array($ss)){ unlink($res['image']);}
mysql_query("delete from images_voyage where id_excursion='".$_GET['id_voyage']."'");



mysql_query("delete from voyage where id='".$_GET['id_voyage']."'");

mysql_query("delete from affiche_en_index where id_article='".$_GET['id_voyage']."'");

header("location: recherche_voyage.php");
// }


?>