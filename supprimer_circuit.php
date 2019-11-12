<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

$ss=mysql_query("select * from images_circuit where  id_circuit='".$_GET['id_circuit']."'");
while($res=mysql_fetch_array($ss)){ unlink($res['image']);}
mysql_query("delete from images_circuit where id_circuit='".$_GET['id_circuit']."'");

mysql_query("delete from circuit where id='".$_GET['id_circuit']."'");


header("location: recherche_circuit.php");
// }


?>