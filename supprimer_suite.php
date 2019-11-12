<?php
include("connexion.php");

 $bl=mysql_query("select type_chambre from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $test=explode('-', $sbl[0]);
 $ids="0";
$id=$_GET['id'];
foreach($test as $val){
	if($id!=$val && $val!=0){
	 $ids.="-".$val;
	}
}

 mysql_query("update   hotel set type_chambre='".$ids."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());
	


 $bl2=mysql_query("select suites from tarifs where id='".$_GET['id_tarif']."'"); 
 $sbl2=mysql_fetch_row($bl2);
 $bl2p=mysql_query("select suites from promotions where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl2p=mysql_fetch_row($bl2p);
  $ids2="D";
  $ids2p="D";

 $test2=explode('+', $sbl2[0]);
foreach($test2 as $valaff){
	if("D"!=$valaff){
			$chaine=substr($valaff,0,-1);
			$chaine=substr($chaine,1);
			$listetarif=explode("-", $chaine);
			$idsuite=$listetarif[0];
			if($idsuite!=$_GET['id']){$ids2.="+".$valaff;}
	 
	}
}

 $test2p=explode('+', $sbl2p[0]);
foreach($test2p as $valaff){
	if("D"!=$valaff){
			$chaine=substr($valaff,0,-1);
			$chaine=substr($chaine,1);
			$listetarif=explode("-", $chaine);
			$idsuite=$listetarif[0];
			if($idsuite!=$_GET['id']){$ids2p.="+".$valaff;}
	 
	}
}
 mysql_query("update   tarifs set suites='".$ids2."'  where id='".$_GET['id_tarif']."'") or die(mysql_error());
 mysql_query("update   promotions set suites='".$ids2p."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());


/*****************************************************************/
$cmp=0;
$division='';
                        
                        
	$nbre_arrangement=0;	
	
	
	
	
	
				   $sql_tarifs=mysql_query("select suites from tarifs where id='".$_GET['id_tarif']."' ");          				
				   $restafis1=mysql_fetch_row($sql_tarifs);
				  		$restafis=$restafis1[0];
				  		$affichetarif=explode("+", $restafis);
						foreach($affichetarif as $valaff){
							if($valaff!="D"){
								
						
								
								
								
						$chaine=substr($valaff,0,-1);
						$chaine=substr($chaine,1);
						$listetarif=explode("-", $chaine);
						
						
						$idsuite=$listetarif[0];
						$prixbase=$listetarif[1];
						$suppsingle_suite=$listetarif[2];
	$nom_piece=nom_att('nom','type_chambre','id',$idsuite);
	$calcul=nom_att('calcul','type_chambre','id',$idsuite);
	 if($calcul=='pax') $par=" par PAX"; else $par=" par suite";
	 			
						$liensupp="<span class=\"tools\"><a style=\"margin-left:50px;\" href=\"javascript: if(confirm('Supprimer?')) supprimer_suite('".$_GET['id_hotel']."','".$idsuite."','".$cmp."','".$_GET['id_tarif']."');\" ><span class=\"add-on\">X</span></a></span>";
		

	$division.='   <div class="widget "><div class="widget-title"><h4> <i class="icon-reorder"></i>'.$nom_piece.'</h4><span class="tools"><a href="javascript:;" class="icon-chevron-down"></a></span><span class="tools"><a  aria-hidden="true">( Les montants sera calculer '.$par.')</a></span>'.$liensupp.'</div><div class="widget-body"  >';
	
	
	
$i=0;

						
						foreach($listetarif as $valliste){
						//if($idsuite==$val){	
						if($i==1){
							if(isset($prixbase) && $prixbase!='' ) $prixaff= $prixbase; else echo $prixaff=0;
							$division.='<div class="control-group">
                                <label class="control-label">Prix</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="prix_suite_'.$idsuite.'" id="prix_suite_'.$idsuite.'" value="'.$prixaff.'" /><span class="add-on">DT</span>
                                    </div>
                                </div>
                            </div>';
							
						 }
						elseif($i==2){
							
							if(isset($suppsingle_suite) && $suppsingle_suite!='' ) $suppsingle_suitec= $suppsingle_suite; else echo $suppsingle_suitec=0;
							$division.='<div class="control-group">
                                <label class="control-label">Supplément single</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <input class=" " type="text" name="suppsingle_suite'. $idsuite.'" id="suppsingle_suite_'.$idsuite.'" value="'.$suppsingle_suitec.'" /><span class="add-on">DT</span>
                                    </div>
                                </div>
                            </div>';
							
						 }
						elseif($i>2) {
							$val1=explode("=",$valliste);
							 $nomtarif=nom_att('nom','arrangement','id',$val1[0]);
							$id_arr=$val1[0];
							
							
							if($id_arr!=''){
							if(isset($val1[1]) && $val1[1]!=''){
							  $checkval1=$val1[1][strlen ($val1[1])-1];
							  if($checkval1=="%") {
								  $vval=substr($val1[1],0,-1);$checkval="%"; 
										  
							  }else{$vval=$val1[1];$checkval=""; }
							  }else{$vval='';$checkval=""; }
							  
							  
							  
							  
							  
										   
						   if($vval=='x') $vvalx= '';else  $vvalx= $vval;
						   if($checkval=="%" ) $checked=' checked '; else  $checked = "";
						   
                          $division.=' <div  class="control-group">
                                <label class="control-label">Suppl&eacute;ment '.$nomtarif.'</label>
                                <div  class="controls">
                                    <div  class="input-prepend input-append">
                                        <input class=" " type="text" name="tarifsuite_'.$val.'_'.$id_arr.'"  id="tarif_suite_'.$val.'_'.$nbre_arrangement.'" value="'.$vvalx.'" />
                                        <input type="checkbox" name="checktarifsuite_'.$val.'_'.$id_arr.'"  id="checktarif_suite_'.$val.'_'. $nbre_arrangement.'" value="%" '.$checked.' ><span class="add-on">%</span>
                                        
                                       
                                    </div>
                                </div>
                            </div>
							'; 
                            
							}
						
						}
						
						
						$i++;
						
						//}
						
						}
						
						


                         ?>   
                            
                            
                      <?php  $nbre_arrangement++;
					  
					  
					  $division.='  </div>  </div>';		
$cmp++;
					  }}
					  
				 


echo $division;



?>