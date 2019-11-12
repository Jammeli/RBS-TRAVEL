<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	


$ss=mysql_query("select * from images where  id_hotel='".$_GET['id_hotel']."'");
while($res=mysql_fetch_array($ss)){ unlink($res['image']);}
mysql_query("delete from images where id_hotel='".$_GET['id_hotel']."'");


mysql_query("delete from hotel where id_hotel='".$_GET['id_hotel']."'");
mysql_query("delete from promotions where id_hotel='".$_GET['id_hotel']."'");
mysql_query("delete from tarifs where id_hotel='".$_GET['id_hotel']."'");
mysql_query("delete from allotement where id_hotel='".$_GET['id_hotel']."'");

header("location: recherche_hotels.php");
// }


?>