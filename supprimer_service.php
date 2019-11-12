<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

$ss=mysql_query("select * from services where  id='".$_GET['id']."'");
while($res=mysql_fetch_array($ss)){ unlink($res['image']);}

mysql_query("delete from services where id='".$_GET['id']."'");


header("location: recherche_service.php");
// }


?>