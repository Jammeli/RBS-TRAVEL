<?php include("connexion_s.php");
$_SESSION['save_result']='(0,0,0,0,0)';
for($i=1; $i<$_GET['taille']; $i++){
	$_SESSION['save_result'].='-'.$_SESSION['save_resultx'.$i];
}
		
 	?>