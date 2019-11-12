<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

mysql_query("delete from demande_billetterie where id='".$_GET['id']."' ");
mysql_query("delete from contenu_billeterie where id_demande='".$_GET['id']."' ");


header("location: reservation_billetterie.php");
// }


?>