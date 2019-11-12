<?php
$valo='D';
 $sql_tarifs=mysql_query("select suites from tarifs where id='".$_GET['id']."' ");          				
				   $restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("+", $restafis);
						foreach($affichetarif as $valaff){
							if($valaff!="D"){
								
						$chaine=substr($valaff,0,-1);
						$chaine=substr($chaine,1);
						$listetarif=explode("-", $chaine);
						$i=0;
						$idsuite=$listetarif[0];
						$prixbase=$_POST['prix_suite'];
						$listefinal="-(".$idsuite.'-'.$prixbase;
						foreach($listetarif as $valliste){
						if($k>1) {
							
							$val1=explode("=",$valliste);
							$valaff=$val1[0];
							  
							  
				if(  isset($_POST['tarifsuite_'.$idsuite.'_'.$valaff]))$pourcent=$_POST['tarifsuite_'.$idsuite.'_'.$valaff]; else $pourcent=''; 	

				if(  $_POST['tarifsuite_'.$idsuite.'_'.$valaff]!="" || $_POST['tarifsuite_'.$idsuite.'_'.$valaff]==0){ 	
								$prix=$_POST['tarifsuite_'.$val.'_'.$valaff].$pourcent;
				}		 else $prix='';  
						  
					$listefinal.='-'.$valaff.'='.$valaff;	  
						
						}
						$k++;
						
						}
						
				$listefinal=")";



                         ?>   
                            
                            
                      <?php }
					  
					  $valo.='-'.$listefinal;
					  }
					  
	$suitestarif= $valo;
	echo $suitestarif;				  
					  
				