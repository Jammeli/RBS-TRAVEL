<?php include("connexion.php");

// if(isset($_GET['id_hotel'])){
// {	

mysql_query("delete from demande_congre where id='".$_GET['id']."' ");


header("location: reservation_mice.php");
// }


?>