<?php
include('../connexion.php');





$id_hotel=$_REQUEST['id_hotel'];		
$active=$_REQUEST['active'];		


		//test????
$sql_tarifs=mysql_query("select type_chambre from hotel where id_hotel='".$id_hotel."' ");          		
		$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						$valo="D";
						foreach($affichetarif as $valaff){
							if($valaff!=0){
							
					
										
if(  $_POST['tarif_'.$valaff]!="" || $_POST['tarif_'.$valaff]==0){ 
$xx=$_POST['tarif_'.$valaff];


					if(isset($_POST['checktarif_'.$valaff])){ $pourc=$_POST['checktarif_'.$valaff];}else{ $pourc="";}
					if($_POST['tarif_'.$valaff]==0) $x=0; else $x=$_POST['tarif_'.$valaff];
					$valo.="-".$valaff.'='.$x.$pourc;
		}else{ $pourc="";}

$sqlnomtarif=mysql_query("select nom from type_chambre where id='".$valaff."'");
						$exe=mysql_fetch_row($sqlnomtarif);
						$nomtarif=$exe[0];


				
							}
							
						}

		 $arrangement=$valo;



								
					
	
						




$datedepart1=explode("/" ,$_REQUEST['datedepart']);
$datedefin2=explode("/" ,$_REQUEST['datedefin']);


$datedepart=$datedepart1[2]."-".$datedepart1[1]."-".$datedepart1[0];
$datedefin=$datedefin2[2]."-".$datedefin2[1]."-".$datedefin2[0];
















		
		mysql_query("UPDATE  `allotement` SET  
`date_depart` =  '$datedepart',
`date_fin` =  '$datedefin',
`allotement` =  '$arrangement',
`etat` =  '$active' WHERE  `id_hotel` ='$id_hotel';
");		
		
	
header("Location:../recherche_hotels.php");
			
		
	
	
?>
