<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

mysql_query("delete from demmande_cruise where id_commande='".$_GET['id']."' and page='".$_GET['page']."'");


header("location: reservation_cruise.php?page=".$_GET['page']);
// }


?>