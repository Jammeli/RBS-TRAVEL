<?php
include('../connexion.php');



$id_tarif=$_REQUEST['id_tarif'];
$id_hotel=$_REQUEST['id_hotel'];
	
if(isset($_REQUEST['active'])) $etat=$_REQUEST['active'];	 else $etat=0;	
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
		}else{ $pourc="";$valo.="-".$valaff.'=x';$x='';}

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






$valo='D';
 $sql_tarifs=mysql_query("select suites from promotions where id_hotel='".$id_hotel."' ");          				
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
						if($k>2) {
							
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



		
mysql_query("UPDATE  `promotions` SET  
`etat` =  '$etat',
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


 WHERE  `id_hotel` ='$id_hotel';");		
		
		

header("location: ../hotels_menu.php?id_hotel=".$id_hotel);
	
?>
