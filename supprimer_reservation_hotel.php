<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

mysql_query("delete from demmande_hotel where id_commande='".$_GET['id']."' ");
mysql_query("delete from contenu_hotel where id_demande='".$_GET['id']."' ");


header("location: reservation_hotel.php");
// }


?>