<?php
include('../connexion.php');

function existe($datedepart, $datedefin,$id_tarif, $id_hotel){ 
$testi=true;
$sql=mysql_query("select * from tarifs where id_hotel='$id_hotel' and id!='$id_tarif'");
while($exe=mysql_fetch_array($sql)){
	/**/
	$date_debut_periode=$exe['date_depart'];
	$date_fin_periode=$exe['date_fin'];
	
$tDebut = explode("-", $date_debut_periode); 
$tFin = explode("-", $date_fin_periode); 
$tEmbauche = explode("-", $datedepart); 
$tEmbauchefin = explode("-", $datedefin); 
$date_embauche = mktime(0, 0, 0, $tEmbauche[1], $tEmbauche[2], $tEmbauche[0]); 
$date_embauchefin = mktime(0, 0, 0, $tEmbauchefin[1], $tEmbauchefin[2], $tEmbauchefin[0]); 
$date1 = mktime(0, 0, 0, $tDebut[1], $tDebut[2], $tDebut[0]); 
$date2 = mktime(0, 0, 0, $tFin[1], $tFin[2], $tFin[0]) ; 
	if (( $date_embauche <= $date1  && $date_embauchefin <= $date1  && $date_embauche<=$date_embauchefin ) ||
	( $date_embauche >= $date2  && $date_embauchefin >= $date2  && $date_embauche<=$date_embauchefin )) {  } else echo $testi=false;

	
	/**/
	
	}









return $testi;
}


$id_tarif=$_REQUEST['id_tarif'];
$id_hotel=$_REQUEST['id_hotel'];		
$_SESSION['formtarif'][0]=	$id_tarif;
$_SESSION['formtarif'][1]=	$id_hotel;


		//test????
$_SESSION['tarif']="";
$sql_tarifs=mysql_query("select arrangement from hotel where id_hotel='".$id_hotel."' ");          		
		$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						$valo="D";
						foreach($affichetarif as $valaff){
							if($valaff!=0){
							
					
if(  $_POST['tarif_'.$valaff]!=''){ 
$xx=$_POST['tarif_'.$valaff];


					if(isset($_POST['checktarif_'.$valaff])){ $pourc=$_POST['checktarif_'.$valaff];}else{ $pourc="";}
					if($_POST['tarif_'.$valaff]==0) $x=0; else $x=$_POST['tarif_'.$valaff];
					$valo.="-".$valaff.'='.$x.$pourc;
		}else{ $pourc="";$valo.="-".$valaff.'=x'; $x='';}

							$sqlnomtarif=mysql_query("select nom from arrangement where id='".$valaff."'");
													$exe=mysql_fetch_row($sqlnomtarif);
													$nomtarif=$exe[0];

							$_SESSION['tarif'].='<div class="control-group">
															<label class="control-label">Suppl&eacute;ment '.$nomtarif.'</label>
															<div class="controls">
																<div class="input-prepend input-append">
																	<input class=" " type="text" name="tarif_'.$valaff.'"" value="'.$x.'" />
																	<input type="checkbox" name="checktarif_'.$valaff.'"" value="%" '.$pourc.' >
																	<span class="add-on">%</span>
																</div>
															</div>
														</div>';
				
							}
							
						}

		 $arrangement=$valo;



								
					
	
						
		//test????
$_SESSION['supplement_hotel']="";
$sql_tarifs=mysql_query("select supplement_hotel from hotel where id_hotel='".$id_hotel."' ");          		
		$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						$valo="D";
						foreach($affichetarif as $valaff){
							if($valaff!=0){
							
					
										
if(  $_POST['supplement_hotel_'.$valaff]!="" || $_POST['supplement_hotel_'.$valaff]==0){ 
$xx=$_POST['supplement_hotel_'.$valaff];


					if(isset($_POST['checksupplement_hotel_'.$valaff])){ $pourc=$_POST['checksupplement_hotel_'.$valaff];}else{ $pourc="";}
					if($_POST['supplement_hotel_'.$valaff]==0) $x=0; else $x=$_POST['supplement_hotel_'.$valaff];
					$valo.="-".$valaff.'='.$x.$pourc;
		}else{ $pourc="";}

$sqlnomtarif=mysql_query("select nom from supplement_hotel where id='".$valaff."'");
						$exe=mysql_fetch_row($sqlnomtarif);
						$nomtarif=$exe[0];

$_SESSION['supplement_hotel'].='<div class="control-group">
                                <label class="control-label">Suppl&eacute;ment '.$nomtarif.'</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="supplement_hotel_'.$valaff.'"" value="'.$x.'" />
                                        <input type="checkbox" name="checksupplement_hotel_'.$valaff.'"" value="%" '.$pourc.' >
										<span class="add-on">%</span>
                                    </div>
                                </div>
                            </div>';
				
							}
							
						}

		 $supplement_hotel=$valo;



$sql_tarifs=mysql_query("select reductions from hotel where id_hotel='".$id_hotel."' ");          		
		$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("-", $restafis);
						$valo="D";
						foreach($affichetarif as $valaff){
							if($valaff!=0){
							$nvvalo='-'.$valaff;
/**********************************************************************************/					
										
if(  $_POST['reduction_hotel_1'.$valaff]!="" || $_POST['reduction_hotel_1'.$valaff]==0){ 
$xx=$_POST['reduction_hotel_1'.$valaff];

echo $_POST['reduction_hotel_1'.$valaff];
					if(isset($_POST['checkreduction_hotel_1'.$valaff])){ $pourc=$_POST['checkreduction_hotel_1'.$valaff];}else{ $pourc="";}
					if($_POST['reduction_hotel_1'.$valaff]==0) $x=0; else $x=$_POST['reduction_hotel_1'.$valaff];
					$nvvalo.='='.$x.$pourc;
		}else{ $pourc="";}
/**********************************************************************************/					
/**********************************************************************************/					
										
if(  $_POST['reduction_hotel_2'.$valaff]!="" || $_POST['reduction_hotel_2'.$valaff]==0){ 
$xx=$_POST['reduction_hotel_2'.$valaff];


					if(isset($_POST['checkreduction_hotel_2'.$valaff])){ $pourc=$_POST['checkreduction_hotel_2'.$valaff];}else{ $pourc="";}
					if($_POST['reduction_hotel_2'.$valaff]==0) $x=0; else $x=$_POST['reduction_hotel_2'.$valaff];
					$nvvalo.='='.$x.$pourc;
		}else{ $pourc="";}
/**********************************************************************************/					
/**********************************************************************************/					
										
if(  $_POST['reduction_hotel_3'.$valaff]!="" || $_POST['reduction_hotel_3'.$valaff]==0){ 
$xx=$_POST['reduction_hotel_3'.$valaff];


					if(isset($_POST['checkreduction_hotel_3'.$valaff])){ $pourc=$_POST['checkreduction_hotel_3'.$valaff];}else{ $pourc="";}
					if($_POST['reduction_hotel_3'.$valaff]==0) $x=0; else $x=$_POST['reduction_hotel_3'.$valaff];
					$nvvalo.='='.$x.$pourc;
		}else{ $pourc="";}
/**********************************************************************************/					
$valo.=$nvvalo;

							}
							
						}

		 $reduction_hotel=$valo;



$datedepart1=explode("/" ,$_REQUEST['datedepart']);
$datedefin2=explode("/" ,$_REQUEST['datedefin']);

$_SESSION['formtarif'][3]=	$_REQUEST['datedepart'];
$_SESSION['formtarif'][4]=	$_REQUEST['datedefin'];


$datedepart=$datedepart1[2]."-".$datedepart1[1]."-".$datedepart1[0];
$datedefin=$datedefin2[2]."-".$datedefin2[1]."-".$datedefin2[0];



$delai_a=$_REQUEST['delai_a'];$_SESSION['formtarif'][5]=	$_REQUEST['delai_a'];

$delai_r=$_REQUEST['delai_r'];$_SESSION['formtarif'][6]=	$_REQUEST['delai_r'];

$nbre_nuit_min=$_REQUEST['nbre_nuit_min'];$_SESSION['formtarif'][7]=	$_REQUEST['nbre_nuit_min'];

$prixt=$_REQUEST['prix'];$_SESSION['formtarif'][8]=	$_REQUEST['prix'];




if(isset($_REQUEST['checksupp02']) && !empty($_REQUEST['supp02']))$checksupp02= $_REQUEST['checksupp02']; else $checksupp02=""; 
if(isset($_REQUEST['checksupp01']) && !empty($_REQUEST['supp01']))$checksupp01= $_REQUEST['checksupp01']; else $checksupp01=""; 
if(isset($_REQUEST['checksupp03']) && !empty($_REQUEST['supp03']))$checksupp03= $_REQUEST['checksupp03']; else $checksupp03=""; 
if(isset($_REQUEST['checksuppsingle']) && !empty($_REQUEST['suppsingle']))$checksuppsingle= $_REQUEST['checksuppsingle']; else $checksuppsingle=""; 
if(isset($_REQUEST['check3emelit']) && !empty($_REQUEST['supp3emelit']))$check3emelit= $_REQUEST['check3emelit']; else $check3emelit=""; 
if(isset($_REQUEST['check4emelit']) && !empty($_REQUEST['supp4emelit']))$check4emelit= $_REQUEST['check4emelit']; else $check4emelit=""; 

if(isset($_REQUEST['checkacompte']) && !empty($_REQUEST['acompte']))$checkacompte= $_REQUEST['checkacompte']; else $checkacompte=""; 



$acompte=$_REQUEST['acompte'].$checkacompte;


$suppsingle=$_REQUEST['suppsingle'].$checksuppsingle;
$supp3emelit=$_REQUEST['supp3emelit'].$check3emelit;
$supp4emelit=$_REQUEST['supp4emelit'].$check4emelit;
if(isset($_REQUEST['supp01'])) $supp01=$_REQUEST['supp01'].$checksupp01;else $supp01='';
if(isset($_REQUEST['supp02'])) $supp02=$_REQUEST['supp02'].$checksupp02;else $supp02='';
if(isset($_REQUEST['supp03'])) $supp03=$_REQUEST['supp03'].$checksupp03;else $supp03='';
$_SESSION['formtarif'][9]=	$_REQUEST['suppsingle'];$_SESSION['formtarif'][10]=$checksuppsingle;
$_SESSION['formtarif'][11]=	$_REQUEST['supp3emelit'];$_SESSION['formtarif'][12]=$check3emelit;
$_SESSION['formtarif'][13]=	$_REQUEST['supp4emelit'];$_SESSION['formtarif'][14]=$check4emelit;
$_SESSION['formtarif'][15]=	$supp01;
$_SESSION['formtarif'][16]=$checksupp01;
$_SESSION['formtarif'][17]=	$supp02;
$_SESSION['formtarif'][18]=$checksupp02;
$_SESSION['formtarif'][19]=	$supp03;
$_SESSION['formtarif'][20]=$checksupp03;
$_SESSION['formtarif'][21]=	$_REQUEST['acompte'];$_SESSION['formtarif'][22]=$checkacompte;




if(isset($_GET['id'])){

$valo='D';
 $sql_tarifs=mysql_query("select suites from tarifs where id='".$id_tarif."' ");          				
				   $restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("+", $restafis);
						foreach($affichetarif as $valaff){
							if($valaff!="D"){
								
						$chaine=substr($valaff,0,-1);
						$chaine=substr($chaine,1);
						$listetarif=explode("-", $chaine);
						$k=0;
						$idsuite=$listetarif[0];
						$prixbase=$_POST['prix_suite_'.$idsuite];
						$suppsingle_suite=$_POST['suppsingle_suite_'.$idsuite];
						$listefinal="(".$idsuite.'-'.$prixbase.'-'.$suppsingle_suite;
						
						foreach($listetarif as $valliste){
						if($k>1) {
							
							$val1=explode("=",$valliste);
							$valaff=$val1[0];
							  
							  
				
				if(  $_POST['tarifsuite_'.$idsuite.'_'.$valaff]!="" || $_POST['tarifsuite_'.$idsuite.'_'.$valaff]==0){ 	
				if(  isset($_POST['checktarifsuite_'.$idsuite.'_'.$valaff]))$pourcent=$_POST['checktarifsuite_'.$idsuite.'_'.$valaff]; else $pourcent=''; 	
								$prix=$_POST['tarifsuite_'.$idsuite.'_'.$valaff].$pourcent;
				}		 else $prix='';  
						  
					$listefinal.='-'.$valaff.'='.$prix;	  
						
						}
						$k++;
						
						}
						
				$listefinal.=")";

 $valo.='+'.$listefinal;

                         ?>   
                            
                            
                      <?php }
					  
					 
					  }
					  
	$suitestarif= $valo;
}
else{
	$valo='D';
 $nbre_suites=0;
$type_chambre=nom_att('type_chambre','hotel','id_hotel',$id_hotel);
		 
$liste=explode("-",$type_chambre);

foreach($liste as $val){
	$type_piece=nom_att('type','type_chambre','id',$val);
	if($type_piece=='suite'){	
	
						$prixbase=$_POST['prix_suite_'.$val];
						$suppsingle_suite=$_POST['suppsingle_suite_'.$val];
						
						
						$listefinal="(".$val.'-'.$prixbase.'-'.$suppsingle_suite;


						
						
						  $sql_tarifs=mysql_query("select arrangement from hotel where id_hotel='".$id_hotel."' ");          				$restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$listetarif=explode("-", $restafis);
						foreach($listetarif as $valliste){
							if($valliste!="0"){
							
														  
							 $nomtarif=nom_att('nom','arrangement','id',$valliste);

										   
									  
				
				if(  $_POST['tarifsuite_'.$val.'_'.$valliste]!="" || $_POST['tarifsuite_'.$val.'_'.$valliste]==0){ 	
				if(  isset($_POST['checktarifsuite_'.$val.'_'.$valliste]))$pourcent=$_POST['checktarifsuite_'.$val.'_'.$valliste]; else $pourcent=''; 	
								$prix=$_POST['tarifsuite_'.$val.'_'.$valliste].$pourcent;
				}		 else $prix='';  
						  
					$listefinal.='-'.$valliste.'='.$prix;	  
					
					
					
						
						}}
					 
					 
					 
			$listefinal.=")";

 $valo.='+'.$listefinal;		 
	}
	
}
			
				

					  
	$suitestarif= $valo;
				
	}

if(existe($datedepart, $datedefin,$id_tarif,$id_hotel)){	

	if($id_tarif==0){		
			mysql_query("INSERT INTO `tarifs` (`id`, `date_depart`, `date_fin`, `id_hotel`, `delai_a`, `delai_r`, `nb_nuit_min`, `prix`, `acompte`, `red_troisieme`, `red_quatrieme`, `red1`, `red2`, `red3`, `red4`, `suppsingle`, `arrangement`, `supplement_hotel`, `reductions`, `suites`) VALUES (NULL, '$datedepart', '$datedefin', '$id_hotel', '$delai_a', '$delai_r', '$nbre_nuit_min', '$prixt', '$acompte', '$supp3emelit', '$supp4emelit', '100%', '$supp01', '$supp02', '$supp03', '$suppsingle', '$arrangement', '$supplement_hotel', '$reduction_hotel', '$suitestarif');");

  

	}
	else{
		
		mysql_query("UPDATE  `tarifs` SET  
`date_depart` =  '$datedepart',
`date_fin` =  '$datedefin',
`id_hotel` =  '$id_hotel',
`delai_a` =  '$delai_a',
`delai_r` =  '$delai_r',
`nb_nuit_min` =  '$nbre_nuit_min',
`prix` =  '$prixt',
`acompte` =  '$acompte',
`red_troisieme` =  '$supp3emelit',
`red_quatrieme` =  '$supp4emelit',
`red1` =  '100%',
`red2` =  '$supp01',
`red3` =  '$supp02',
`red4` =  '$supp03',
`suppsingle` =  '$suppsingle',
`arrangement` =  '$arrangement',
`supplement_hotel` =  '$supplement_hotel',
`suites` =  '$suitestarif',
`reductions` =  '$reduction_hotel'


 WHERE  `id` ='$id_tarif';");		
		
		}
header("Location:../tarifs_hotel.php?id_hotel=".$id_hotel."");

}  else{
	
	
	?>

	<?php
	if($id_tarif==0){
		
header("Location:../ajouter_tarifs.php?id_hotel=".$id_hotel."&session=on");
		}
		
		else{
			
header("Location:../ajouter_tarifs.php?id_hotel=".$id_hotel."&id=".$id_tarif."&session=on");
			
			}
	

	} 	
	
	
?>
