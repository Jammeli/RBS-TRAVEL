<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

$ss=mysql_query("select * from images_omra where  id_omra='".$_GET['id_omra']."'");
while($res=mysql_fetch_array($ss)){ unlink($res['image']);}
mysql_query("delete from images_omra where id_omra='".$_GET['id_omra']."'");

mysql_query("delete from omra where id='".$_GET['id_omra']."'");


header("location: recherche_omra.php");
// }


?>