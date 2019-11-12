<?php include("connexion.php");
// if(isset($_GET['id_hotel'])){
// {	
mysql_query("delete from tarifs where id='".$_GET['id_tarif']."'");

header("location: tarifs_hotel.php?id_hotel=".$_GET['id_hotel']);
// }


?>