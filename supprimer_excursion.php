<?php include("connexion.php");
echo $_GET['id_hotel'];
// if(isset($_GET['id_hotel'])){
// {	

$ss=mysql_query("select * from images_excursion where  id_excursion='".$_GET['id_excursion']."'");
while($res=mysql_fetch_array($ss)){ unlink($res['image']);}
mysql_query("delete from images_excursion where id_excursion='".$_GET['id_excursion']."'");


mysql_query("delete from excursion where id='".$_GET['id_excursion']."'");


header("location: recherche_excursion.php");
// }


?>