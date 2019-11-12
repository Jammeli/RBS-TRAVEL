<style>
.panier{ width:100%; border:1px solid #868686; border-collapse:collapse; color:#000; background-color:#fff;}
.panier td {border:1px solid #868686; padding:5px;}
.panier tr.toptable td{ background-color:#868686; color:#fff;border:1px solid #fff; }
.panier tr.toptable1 td{ background-color:#144f75; color:#fff;}
</style>
 <?php include("connexion.php");?>
 <?php 
 
 function affiche_options($table)	{ 
$text="";  
if(!empty($table )){
foreach ( $table as $valx){
	$chaine=explode(",",$valx); if(sizeof($chaine)>1) $text.="OPTIONS:<br>"; 
foreach ( $chaine as $val){  
if($val!="undefined"){
						$nomoptionsql=mysql_query("select nom from option_hotel where id='".$val."'");
						$exe=mysql_fetch_row($nomoptionsql);

$text.= '<font style="font-weight: 200;">'. $exe[0]."</font><br>";

}}}}
else
$text.= '<font style="font-weight: 200;">Pas d\'options</font>';

return $text;
}
function is_promos($date,$id_hotel){
	$sql=mysql_query("select id from promotions where
				 id_hotel='".$id_hotel."' and `date_depart` <= '".$date."' and `date_fin` >='".$date."'  	and etat='1' ");
				 
		if(mysql_num_rows($sql)!=0){
			$res=mysql_fetch_row($sql);
			return $res[0];
			}	else return false;
	
	
	}	
	
function is_tarifs($date,$id_hotel){
	$sql=mysql_query("select id from tarifs where
				 id_hotel='".$id_hotel."' and `date_depart` <= '".$date."' and `date_fin` >='".$date."'  ");
				 
		if(mysql_num_rows($sql)!=0){
			$res=mysql_fetch_row($sql);
			return $res[0];
			}	else return false;
	
	
	}	

function is_obligatoire_supplement($date,$id_supplement){
$unJour = 3600 * 24;
$date1v=strtotime($date);
//$date1v -= $unJour;

$numjour=date("w",$date1v);  
	$sql=mysql_query("select * from supplement_hotel where id='".$id_supplement."' and obligatoire='1' ");
		if(mysql_num_rows($sql)!=0){
			
			$res=mysql_fetch_array($sql);
			$liste=explode(',',$res['jours']);
			
			if($res['jours']!=''){	if(in_array("$numjour", $liste)) { return true;} else return false;}
			else{
				
				
				if($res['date1']!='' && $res['date2']!='' && strtotime($res['date1'])<=strtotime($date) && strtotime($res['date2'])>=strtotime($date)){ return true; }else return false;
				
			}
		
		
		}	else return false;
	
	
	}	
function is_obligatoire_reductions($id_reduction,$adultes){

	$sql=mysql_query("select * from reduction_hotel where id='".$id_reduction."'   ");
		if(mysql_num_rows($sql)!=0){
			$res=mysql_fetch_array($sql);
					if($res['avec']<=$adultes){

			$liste=array( $res['id'],$res['avec']);
			return $liste;
					} else return false;
		}	else return false;
	
	
}		
		
function montant_net_chambre($listecompletdate_promo,$listecompletdate_tarif,$dates_promo,$dates_tarifs, $adultes, $enfants, $arrangement,$nbrechambre,$type,$supplement_hotel_g,$options_g,$nbjourtotal){
	
	$textesupp="";
	$textesupp_net="";
	$table_supp=array();
	$table_reduc=array();	
	
	$table_supp_voucher=array();
	$table_reduc_voucher=array();
	$nbre_enfaff=0;

 	$tot=0;
	$affichejour="";
	
	$nbre_de_pax=nom_att('image','type_chambre','id',$type);
	foreach($listecompletdate_tarif as $att=>$val){
	$supplement_g_val=0;
		$id_tarif=$listecompletdate_tarif[$att];
		$r=mysql_query("select * from tarifs where id='".$id_tarif."' ");
		$rres=mysql_fetch_array($r);
		$prixbase=$rres['prix'];
		
		

		
		
		
		$suppsingle=$rres['suppsingle'];
		$arrangements=explode("-",$rres['arrangement']);
		$supplementss=explode("-",$rres['supplement_hotel']);
		$reductionss=explode("-",$rres['reductions']);
		foreach($arrangements as $att1=>$val1){
			if($val1!="D"){
				$t=explode("=", $val1); 
				if($arrangement==$t[0]  ){ 
				$valeur=$t[1]; 
				if(substr($valeur, -1)=="%"  ){
					$expl2=explode("%", $valeur);$mvaleur=($prixbase*$expl2[0]/100);$prixbase+=$mvaleur;}else{ $prixbase+=$valeur;}
				}
				
		
				
			}
		}
		/*__________________________________________________________$prixbase=montant tarif d'un jour /pax */
		$prixbasex=$prixbase;
						array_push($table_supp, '<font style="color:#f00 !important">Prix /Nuitée/PAX: '.$prixbase."dt</font>");



	/*__________________________________________________________reduction 3eme et 4eme lit */
			
		$reduction3emelit=0;
		$reduction4emelit=0;

		if($adultes>=3){
		if(substr($rres['red_troisieme'], -1)=="%"  ){
					$expl2=explode("%", $rres['red_troisieme']);$mvaleur=($prixbase*$expl2[0]/100);$reduction3emelit+=$mvaleur;
					 $redaff=$rres['red_troisieme'];}
					else{ $reduction3emelit+=$rres['red_troisieme']; $redaff=$rres['red_troisieme'].'dt';}
		 array_push($table_supp, 'Réduction 3éme Lit ('.$redaff.")");
		 array_push($table_supp_voucher, 'Réduction 3éme Lit');
		}
		
		if($adultes>=4){
		if(substr($rres['red_quatrieme'], -1)=="%"  ){
					$expl2=explode("%", $rres['red_quatrieme']);$mvaleur=($prixbase*$expl2[0]/100);$reduction4emelit+=$mvaleur;
					 $redaff=$rres['red_quatrieme'];}
					else{ $reduction4emelit+=$rres['red_quatrieme']; $redaff=$rres['red_quatrieme'].'dt';}
		 array_push($table_supp, 'Réduction 4éme Lit ('.$redaff.")");
		 array_push($table_supp_voucher, 'Réduction 4éme Lit');
		}
		
		
		 

		foreach($supplementss as $att2=>$val2){
			if($val2!="D"){
				$t=explode("=", $val2);
				if(is_obligatoire_supplement($dates_tarifs[$att],$t[0]) ){ 
				$valeur=$t[1]; 
				
				 $min_pax=nom_att('min_pax','supplement_hotel','id',$t[0]);
				 $pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$t[0]);
				 if($pax_chambre==1 && $nbre_de_pax>=$min_pax){$coifsupp=$nbre_de_pax; $afftypepar=" PAX";}else { $coifsupp=1; $afftypepar=" Chambre";}
				 
				if(substr($valeur, -1)=="%"  ){
					$suppaff=$valeur;
					$expl2=explode("%", $valeur);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$valeur; $suppaff=$valeur.'dt';}
					if($mvaleur!=0 && $mvaleur!=''){$supplement_g_val+=($mvaleur*$coifsupp);
							array_push($table_supp, nom_att('nom','supplement_hotel','id',$t[0]).'('.$suppaff.'/'.$afftypepar.')');
							array_push($table_supp_voucher, nom_att('nom','supplement_hotel','id',$t[0]));
					}

				}
				elseif(in_array($t[0] ,$supplement_hotel_g) ){ 
				
					
					$valeur=$t[1]; 
				 $min_pax=nom_att('min_pax','supplement_hotel','id',$t[0]);
				 $pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$t[0]);
				 
				 if($pax_chambre==1 && $nbre_de_pax>=$min_pax){$coifsupp=$nbre_de_pax; $afftypepar=" PAX";}else { $coifsupp=1; $afftypepar=" Chambre";}
				if(substr($valeur, -1)=="%"  ){
					$suppaff=$valeur;
					$expl2=explode("%", $valeur);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$valeur; $suppaff=$valeur.'dt';}if($mvaleur!=0 && $mvaleur!=''){
					$supplement_g_val+=($mvaleur*$coifsupp);
							array_push($table_supp, nom_att('nom','supplement_hotel','id',$t[0]).'('.$suppaff.'/'.$afftypepar.')');
							array_push($table_supp_voucher, nom_att('nom','supplement_hotel','id',$t[0]));
					}
					}
					
				
			}
		}
	   //supplement single
		if($adultes==1){
			
			if(substr($suppsingle, -1)=="%"  ){
					$suppaff=$suppsingle;
					$expl2=explode("%", $suppsingle);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$suppsingle;$suppaff=$suppsingle.'dt';}
				if($mvaleur!=0 && $mvaleur!=''){	$prixbase+=$mvaleur;	
			array_push($table_supp, "Supplément single".'('.$suppaff.')');
			array_push($table_supp_voucher, "Supplément single");}

			}
		
		//réductions obligatoire
		$liste_enfant=explode('_',$enfants); 
		$id_reduction=array();
		$nbreenfants=array();
		foreach($liste_enfant as $attx=>$valx){
			if($valx!="0"){
				$x=explode('=',$valx);
				array_push($id_reduction, $x[0]);  
				array_push($nbreenfants, $x[1]);
				//$nbre_enfaff+=$x[1]; 		
						

			}
		}
		
				
			$prixavecenfants=0;		
		foreach($reductionss as $att2=>$val2){ 
			if($val2!="D"){
				$t=explode("=", $val2); 
				$id_reducx=$t[0];
				$prix_enfant_1=$t[1];
				$prix_enfant_2=$t[2];
				$prix_enfant_3=$t[3];
				$res=is_obligatoire_reductions($id_reducx, $adultes);
				
				if($res!=false){ 
					$id_reduc=$res[0];
					$avec=$res[1];
					
					 $nbre_enf=0;
					 $key = array_search($id_reduc, $id_reduction); 
					 $nbre_enf=$nbreenfants[$key];

				if ($adultes==$avec && $adultes<=2 && $adultes>=0 && $avec <=2){
						if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0;}		
						elseif($nbre_enf==2){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= 0;$prix4= 0;   }		
						elseif($nbre_enf==3){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= 0;  }
						elseif($nbre_enf==4){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= $prixbasex; }
						else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
								
				}	
				elseif ($adultes>=$avec && $adultes>2 && $avec >=2){
					if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0; }		
					else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
				}else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;}
					
				
				if(substr($prix1, -1)=="%"  ){
					$expl1=explode("%", $prix1);$mvaleur1=($prixbasex*$expl1[0]/100);
				
				}else{ $mvaleur1=($prix1);
}				
					
				if(substr($prix2, -1)=="%"  ){
					$expl2=explode("%", $prix2);$mvaleur2=($prixbasex*$expl2[0]/100); 
				}else{ $mvaleur2=($prix2);}			
				
				if(substr($prix3, -1)=="%"  ){
					$expl3=explode("%", $prix3);$mvaleur3=($prixbasex*$expl3[0]/100); 
				}else{ $mvaleur3=($prix3);}
			
			
			$mvaleur4=($prix4);
			
			$totalenfant=($mvaleur1+$mvaleur2+$mvaleur3+$mvaleur4);
			
			$prixavecenfants+=$totalenfant;  
						if($prixavecenfants!=0){
							
							 array_push($table_supp, "Réduction enfant(s)".'('.$prixavecenfants.'dt)');
							 
						}

				}
				
				
				
			
				
			}
				//$prixavecenfants+=$prixbase*($adultes);
   
		}
		
 $prixavecenfants=$prixbasex*($nbre_enf)-$prixavecenfants; 
	

	$tot+=($prixbase*($adultes)+$prixavecenfants+$supplement_g_val); 
	$tot-=$reduction3emelit;
	$tot-=$reduction4emelit;
		

	 }
	 
		foreach($listecompletdate_promo as $att=>$val){
		
		
	$supplement_g_val=0;
		$id_tarif=$listecompletdate_promo[$att];
		$r=mysql_query("select * from promotions where id_hotel='".$_GET['id_hotel']."' ");
		$rres=mysql_fetch_array($r);
		$prixbase=$rres['prix'];
		
		

		
		
		
		$suppsingle=$rres['suppsingle'];
		$arrangements=explode("-",$rres['arrangement']);
		$supplementss=explode("-",$rres['supplement_hotel']);
		$reductionss=explode("-",$rres['reductions']);
		foreach($arrangements as $att1=>$val1){
			if($val1!="D"){
				$t=explode("=", $val1); 
				if($arrangement==$t[0]  ){ 
				$valeur=$t[1]; 
				if(substr($valeur, -1)=="%"  ){
					$expl2=explode("%", $valeur);$mvaleur=($prixbase*$expl2[0]/100);$prixbase+=$mvaleur;}else{ $prixbase+=$valeur;}
				}
				
		
				
			}
		}
		/*__________________________________________________________$prixbase=montant tarif d'un jour /pax */
		$prixbasex=$prixbase;
						array_push($table_supp, '<font style="color:#f00 !important">Prix /Nuitée/PAX: '.$prixbase."dt</font>");



	/*__________________________________________________________reduction 3eme et 4eme lit */
			
		$reduction3emelit=0;
		$reduction4emelit=0;

		if($adultes>=3){
		if(substr($rres['red_troisieme'], -1)=="%"  ){
					$expl2=explode("%", $rres['red_troisieme']);$mvaleur=($prixbase*$expl2[0]/100);$reduction3emelit+=$mvaleur;
					 $redaff=$rres['red_troisieme'];}
					else{ $reduction3emelit+=$rres['red_troisieme']; $redaff=$rres['red_troisieme'].'dt';}
		 array_push($table_supp, 'Réduction 3éme Lit ('.$redaff.")");
		 array_push($table_supp_voucher, 'Réduction 3éme Lit ');
		}
		
		if($adultes>=4){
		if(substr($rres['red_quatrieme'], -1)=="%"  ){
					$expl2=explode("%", $rres['red_quatrieme']);$mvaleur=($prixbase*$expl2[0]/100);$reduction4emelit+=$mvaleur;
					 $redaff=$rres['red_quatrieme'];}
					else{ $reduction4emelit+=$rres['red_quatrieme']; $redaff=$rres['red_quatrieme'].'dt';}
		 array_push($table_supp, 'Réduction 4éme Lit ('.$redaff.")");
		 		 array_push($table_supp_voucher, 'Réduction 4éme Lit ');

		}
		
		
		 

		foreach($supplementss as $att2=>$val2){
			if($val2!="D"){
				$t=explode("=", $val2);
				if(is_obligatoire_supplement($dates_tarifs[$att],$t[0]) ){ 
				$valeur=$t[1]; 
				
				 $min_pax=nom_att('min_pax','supplement_hotel','id',$t[0]);
				 $pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$t[0]);
				 if($pax_chambre==1 && $nbre_de_pax>=$min_pax){$coifsupp=$nbre_de_pax; $afftypepar=" PAX";}else { $coifsupp=1; $afftypepar=" Chambre";}
				 
				if(substr($valeur, -1)=="%"  ){
					$suppaff=$valeur;
					$expl2=explode("%", $valeur);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$valeur; $suppaff=$valeur.'dt';}
					if($mvaleur!=0 && $mvaleur!=''){$supplement_g_val+=($mvaleur*$coifsupp);
							array_push($table_supp, nom_att('nom','supplement_hotel','id',$t[0]).'('.$suppaff.'/'.$afftypepar.')');
							array_push($table_supp_voucher, nom_att('nom','supplement_hotel','id',$t[0]));
					}

				}
				elseif(in_array($t[0] ,$supplement_hotel_g) ){ 
				
					
					$valeur=$t[1]; 
				 $min_pax=nom_att('min_pax','supplement_hotel','id',$t[0]);
				 $pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$t[0]);
				 
				 if($pax_chambre==1 && $nbre_de_pax>=$min_pax){$coifsupp=$nbre_de_pax; $afftypepar=" PAX";}else { $coifsupp=1; $afftypepar=" Chambre";}
				if(substr($valeur, -1)=="%"  ){
					$suppaff=$valeur;
					$expl2=explode("%", $valeur);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$valeur; $suppaff=$valeur.'dt';}if($mvaleur!=0 && $mvaleur!=''){
					$supplement_g_val+=($mvaleur*$coifsupp);
							array_push($table_supp, nom_att('nom','supplement_hotel','id',$t[0]).'('.$suppaff.'/'.$afftypepar.')');
							array_push($table_supp_voucher, nom_att('nom','supplement_hotel','id',$t[0]));
					}
					}
					
				
			}
		}
	   //supplement single
		if($adultes==1){
			
			if(substr($suppsingle, -1)=="%"  ){
					$suppaff=$suppsingle;
					$expl2=explode("%", $suppsingle);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$suppsingle;$suppaff=$suppsingle.'dt';}
					
					if($mvaleur!=0 && $mvaleur!=''){	$prixbase+=$mvaleur;	
			array_push($table_supp, "Supplément single".'('.$suppaff.')');
			array_push($table_supp_voucher, "Supplément single");}

			}
		
		//réductions obligatoire
		$liste_enfant=explode('_',$enfants); 
		$id_reduction=array();
		$nbreenfants=array();
		foreach($liste_enfant as $attx=>$valx){
			if($valx!="0"){
				$x=explode('=',$valx);
				array_push($id_reduction, $x[0]);  
				array_push($nbreenfants, $x[1]);
				//$nbre_enfaff+=$x[1]; 		
						

			}
		}
		
				
			$prixavecenfants=0;		
		foreach($reductionss as $att2=>$val2){ 
			if($val2!="D"){
				$t=explode("=", $val2); 
				$id_reducx=$t[0];
				$prix_enfant_1=$t[1];
				$prix_enfant_2=$t[2];
				$prix_enfant_3=$t[3];
				$res=is_obligatoire_reductions($id_reducx, $adultes);
				
				if($res!=false){ 
					$id_reduc=$res[0];
					$avec=$res[1];
					
					 $nbre_enf=0;
					 $key = array_search($id_reduc, $id_reduction); 
					 $nbre_enf=$nbreenfants[$key];

				if ($adultes==$avec && $adultes<=2 && $adultes>=0 && $avec <=2){
						if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0;}		
						elseif($nbre_enf==2){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= 0;$prix4= 0;   }		
						elseif($nbre_enf==3){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= 0;  }
						elseif($nbre_enf==4){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= $prixbasex; }
						else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
								
				}	
				elseif ($adultes>=$avec && $adultes>2 && $avec >=2){
					if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0; }		
					else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
				}else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;}
					
				
				if(substr($prix1, -1)=="%"  ){
					$expl1=explode("%", $prix1);$mvaleur1=($prixbasex*$expl1[0]/100);
				
				}else{ $mvaleur1=($prix1);
}				
					
				if(substr($prix2, -1)=="%"  ){
					$expl2=explode("%", $prix2);$mvaleur2=($prixbasex*$expl2[0]/100); 
				}else{ $mvaleur2=($prix2);}			
				
				if(substr($prix3, -1)=="%"  ){
					$expl3=explode("%", $prix3);$mvaleur3=($prixbasex*$expl3[0]/100); 
				}else{ $mvaleur3=($prix3);}
			
			
			$mvaleur4=($prix4);
			
			$totalenfant=($mvaleur1+$mvaleur2+$mvaleur3+$mvaleur4);
			
			$prixavecenfants+=$totalenfant;  
						if($prixavecenfants!=0) array_push($table_supp, "Réduction enfant(s)".'('.$prixavecenfants.'dt)');

				}
				
				
				
			
				
			}
				//$prixavecenfants+=$prixbase*($adultes);
   
		}
		
 $prixavecenfants=$prixbasex*($nbre_enf)-$prixavecenfants; 
	

	$tot+=($prixbase*($adultes)+$prixavecenfants+$supplement_g_val); 
	$tot-=$reduction3emelit;
	$tot-=$reduction4emelit;
		

	 
		
		}
	
	
	
	 
	$table_supp_voucher = array_unique($table_supp_voucher);
	$table_reduc_voucher = array_unique($table_reduc_voucher);
	
		 
	$table_supp = array_unique($table_supp);
	$table_reduc = array_unique($table_reduc);
	
	

 	foreach($table_supp as $val){
		 $textesupp.=$val.'<br>';
		 }
	 foreach($table_reduc as $val){
		 $textesupp.=$val.'<br>';
		 }
		 
	foreach($table_supp_voucher as $val){
		 $textesupp_net.=$val.'<br>';
		 }
	 foreach($table_reduc_voucher  as $val){
		 $textesupp_net.=$val.'<br>';
		 }
		 

foreach($liste_enfant as $attx=>$valx){if($valx!="0"){$x=explode('=',$valx);$nbre_enfaff+=$x[1]; }}
$message='';
$table_voucher='';	
$table_facture='';	
if($affichejour !="") $message.= '<tr><td></td><td colspan="4">'.$affichejour.'</td></tr>';
$message.= '<tr  class="toptable">
	<td colspan="1">'.$nbrechambre.'-'.nom_att('nom','type_chambre','id',$type).' </td>
	<td>'.$adultes.'</td>
	<td> '.$nbre_enfaff.'</td>
	<td>'.nom_att('nom','arrangement','id',$arrangement).'</td>
	<td >'.$tot.'<sup>DT</sup></td></tr>';
	
$message.= '<tr>	<td></td><td colspan="5">'.$textesupp.'</td></tr>';


$table_voucher.= '<tr  class="toptable">
	<td colspan="1">'.nom_att('nom ','clients','mail',$_SESSION['mail_connect']).' '.nom_att('prenom ','clients','mail',$_SESSION['mail_connect']).'
	 </td>
	
	<td>'.nom_att('nom','type_chambre','id',$type).'<br>
	
	'.$textesupp_net.'</td>
	<td>'.$adultes.'</td>
	<td>'.$nbre_enfaff.'</td>
	<td>'.nom_att('nom','arrangement','id',$arrangement).'</td>
	</tr>';




if($nbre_enfaff!=0) $nbre_enfaffx="et $nbre_enfaff enfant(s)";else $nbre_enfaffx='';
if($adultes!=0) $adultesaff="$adultes adulte(s)";else $adultesaff='';
$table_facture.= '<tr  class="toptable">

	
	<td>'.nom_att('nom','type_chambre','id',$type).'<br>
	'.$adultesaff.$nbre_enfaffx.' </td>
	<td>'.nom_att('nom','arrangement','id',$arrangement).'</td>
	<td>'.$nbjourtotal.'</td>
	<td>'.$tot.'</td>
	</tr>';	
		
	
	return array($tot,$message,$table_voucher,$table_facture);
		
}




function montant_net_suite($listecompletdate_promo,$listecompletdate_tarif,$dates_promo,$dates_tarifs, $adultes, $enfants, $arrangement,$nbrechambre,$type,$supplement_hotel_g,$options_g,$nbjourtotal){


	
	$textesupp="";
		$textesupp_net="";

	$table_supp=array();
	$table_reduc=array();
	
		$table_supp_voucher=array();
	$table_reduc_voucher=array();
	$nbre_enfaff=0;
 	$tot=0;
	$affichejour="";
	$nbre_de_pax=nom_att('image','type_chambre','id',$type);	
	$modedepayement=nom_att('calcul','type_chambre','id',$type);
	
		$liste_enfant=explode('_',$enfants); 
		$id_reduction=array();
		$nbreenfants=array();
		foreach($liste_enfant as $attx=>$valx){
			if($valx!="0"){
				$x=explode('=',$valx);
				array_push($id_reduction, $x[0]);  
				array_push($nbreenfants, $x[1]);
				//$nbre_enfaff+=$x[1]; 		
						

			}
		}
/******************************************************************************************************************************** tarif*/

	foreach($listecompletdate_tarif as $att=>$val){
	$supplement_g_val=0;
		$id_tarif=$listecompletdate_tarif[$att];
		$r=mysql_query("select * from tarifs where id='".$id_tarif."' ");
		$rres=mysql_fetch_array($r);
		
		$arrangements=explode("-",$rres['arrangement']);
		$supplementss=explode("-",$rres['supplement_hotel']);
		$reductionss=explode("-",$rres['reductions']);
		$suites=explode("+",$rres['suites']);
		$prixbase=0;
		foreach($suites as $ssss){
			
	if("D"!=$ssss){
			$chaine=substr($ssss,0,-1);
			$chaine=substr($chaine,1);
			$listetarif=explode("-", $chaine);
			$idsuite=$listetarif[0];
			if($idsuite==$type){
			
				$prixbase=$listetarif[1];
				$prixbasesuite=$listetarif[1];
				$suppsingle=$listetarif[2];
				foreach($listetarif as $val){
					$tarifs=explode("=", $val);
					$idprix=$tarifs[0];
					if(isset($tarifs[1])) $supprix=$tarifs[1];else $supprix=0;
						if($idprix==$arrangement){
							$prixbase=$prixbasesuite+$supprix;
						}
					}
					
				}
	 
			}
		}


		$prixbasex=$prixbase;
		array_push($table_supp, '<font style="color:#f00 !important">Prix /Nuitée/'.$modedepayement.': '.$prixbase."dt</font>");

	  
		
		
		/*********************/	
	  
	 	 $supplement_g_val=0;//calcule	
  		$reduction3emelit=0;
		$reduction4emelit=0;	
		$prixavecenfants=0;		 
				foreach($supplementss as $att2=>$val2){
			if($val2!="D"){
				$t=explode("=", $val2);
				if(is_obligatoire_supplement($dates_tarifs[$att],$t[0]) ){ 
				$valeur=$t[1]; 
				
				 $min_pax=nom_att('min_pax','supplement_hotel','id',$t[0]);
				 $pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$t[0]);
				 if($pax_chambre==1 && $nbre_de_pax>=$min_pax){$coifsupp=$nbre_de_pax; $afftypepar=" PAX";}else { $coifsupp=1; $afftypepar=" Chambre";}
				 
				if(substr($valeur, -1)=="%"  ){
					$suppaff=$valeur;
					$expl2=explode("%", $valeur);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$valeur; $suppaff=$valeur.'dt';}if($mvaleur!=0 && $mvaleur!=''){
					$supplement_g_val+=($mvaleur*$coifsupp);
							array_push($table_supp, nom_att('nom','supplement_hotel','id',$t[0]).'('.$suppaff.'/'.$afftypepar.')');
							array_push($table_supp_voucher, nom_att('nom','supplement_hotel','id',$t[0]));
					}
				}
				elseif(in_array($t[0] ,$supplement_hotel_g) ){ 
				
					
					$valeur=$t[1]; 
				 $min_pax=nom_att('min_pax','supplement_hotel','id',$t[0]);
				 $pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$t[0]);
				 
				 if($pax_chambre==1 && $nbre_de_pax>=$min_pax){$coifsupp=$nbre_de_pax; $afftypepar=" PAX";}else { $coifsupp=1; $afftypepar=" Chambre";}
				if(substr($valeur, -1)=="%"  ){
					$suppaff=$valeur;
					$expl2=explode("%", $valeur);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$valeur; $suppaff=$valeur.'dt';}if($mvaleur!=0 && $mvaleur!=''){
					$supplement_g_val+=($mvaleur*$coifsupp);
							array_push($table_supp, nom_att('nom','supplement_hotel','id',$t[0]).'('.$suppaff.'/'.$afftypepar.')');
							array_push($table_supp_voucher, nom_att('nom','supplement_hotel','id',$t[0]));
					}
					}
					
				
			}
		}
		
	
			
			
			  //supplement single
		if($adultes==1){
			
			if(substr($suppsingle, -1)=="%"  ){
				$suppaff=$suppsingle;
					$expl2=explode("%", $suppsingle);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$suppsingle;$suppaff=$suppsingle.'dt';}
					if($mvaleur!=0 && $mvaleur!=''){$prixbase+=$mvaleur;
			array_push($table_supp, "Supplément single".'('.$suppaff.')');}
	
			}
			
	   // reduction 3eme et 4eme
	  

		if($adultes>=3){
		if(substr($rres['red_troisieme'], -1)=="%"  ){
					$expl2=explode("%", $rres['red_troisieme']);$mvaleur=($prixbase*$expl2[0]/100);$reduction3emelit+=$mvaleur;
					 $redaff=$rres['red_troisieme'];}
					else{ $reduction3emelit+=$rres['red_troisieme']; $redaff=$rres['red_troisieme'].'dt';}
		 array_push($table_supp, 'Réduction 3éme Lit ('.$redaff.")");
		}
		
		if($adultes>=4){
		if(substr($rres['red_quatrieme'], -1)=="%"  ){
					$expl2=explode("%", $rres['red_quatrieme']);$mvaleur=($prixbase*$expl2[0]/100);$reduction4emelit+=$mvaleur;
					 $redaff=$rres['red_quatrieme'];}
					else{ $reduction4emelit+=$rres['red_quatrieme']; $redaff=$rres['red_quatrieme'].'dt';}
		 array_push($table_supp, 'Réduction 4éme Lit ('.$redaff.")");
		}
		
		
		/*********************/	
							
				
		
   		
			if(	$modedepayement=='pax'){
	
			$multiple=$adultes;

		    $prixavecenfants=$prixbasex*($nbre_enf)-$prixavecenfants; 
			 
		}else{
			$multiple=1;
			$prixavecenfants=0;
		}
$prixavecenfants=0;		
		foreach($reductionss as $att2=>$val2){ 
			if($val2!="D"){
				$t=explode("=", $val2); 
				$id_reducx=$t[0];
				$prix_enfant_1=$t[1];
				$prix_enfant_2=$t[2];
				$prix_enfant_3=$t[3];
				$res=is_obligatoire_reductions($id_reducx, $adultes);
				
				if($res!=false){ 
					$id_reduc=$res[0];
					$avec=$res[1];
					
					 $nbre_enf=0;
					 $key = array_search($id_reduc, $id_reduction); 
					 $nbre_enf=$nbreenfants[$key];

				if ($adultes==$avec && $adultes<=2 && $adultes>=0 && $avec <=2){
						if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0;}		
						elseif($nbre_enf==2){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= 0;$prix4= 0;   }		
						elseif($nbre_enf==3){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= 0;  }
						elseif($nbre_enf==4){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= $prixbasex; }
						else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
								
				}	
				elseif ($adultes>=$avec && $adultes>2 && $avec >=2){
					if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0; }		
					else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
				}else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;}
					
				
				if(substr($prix1, -1)=="%"  ){
					$expl1=explode("%", $prix1);$mvaleur1=($prixbasex*$expl1[0]/100);
				
				}else{ $mvaleur1=($prix1);
}				
					
				if(substr($prix2, -1)=="%"  ){
					$expl2=explode("%", $prix2);$mvaleur2=($prixbasex*$expl2[0]/100); 
				}else{ $mvaleur2=($prix2);}			
				
				if(substr($prix3, -1)=="%"  ){
					$expl3=explode("%", $prix3);$mvaleur3=($prixbasex*$expl3[0]/100); 
				}else{ $mvaleur3=($prix3);}
			
			
			$mvaleur4=($prix4);
			
			$totalenfant=($mvaleur1+$mvaleur2+$mvaleur3+$mvaleur4);
			
			$prixavecenfants+=$totalenfant;  
						if($prixavecenfants!=0){
							
							 array_push($table_supp, "Réduction enfant(s)".'('.$prixavecenfants.'dt)');
							 
						}

				}
				
				
				
			
				
			}
				//$prixavecenfants+=$prixbase*($adultes);
   
		}
		
 $prixavecenfants=$prixbasex*($nbre_enf)-$prixavecenfants; 
			
			$tot+=($prixbase*($multiple)+$prixavecenfants+$supplement_g_val); 
			$tot-=$reduction3emelit;
			$tot-=$reduction4emelit;
		

	 }
	 
	 
	
	foreach($listecompletdate_promo as $att=>$val){
	$supplement_g_val=0;
		$id_tarif=$listecompletdate_promo[$att];
		$r=mysql_query("select * from promotions where id_hotel='".$_GET['id_hotel']."' ");
		$rres=mysql_fetch_array($r);
		
		$arrangements=explode("-",$rres['arrangement']);
		$supplementss=explode("-",$rres['supplement_hotel']);
		$reductionss=explode("-",$rres['reductions']);
		$suites=explode("+",$rres['suites']);
		$prixbase=0;
		foreach($suites as $ssss){
			
	if("D"!=$ssss){
			$chaine=substr($ssss,0,-1);
			$chaine=substr($chaine,1);
			$listetarif=explode("-", $chaine);
			$idsuite=$listetarif[0];
			if($idsuite==$type){
			
				$prixbase=$listetarif[1];
				$prixbasesuite=$listetarif[1];
				$suppsingle=$listetarif[2];
				foreach($listetarif as $val){
					$tarifs=explode("=", $val);
					$idprix=$tarifs[0];
					if(isset($tarifs[1])) $supprix=$tarifs[1];else $supprix=0;
						if($idprix==$arrangement){
							$prixbase=$prixbasesuite+$supprix;
						}
					}
					
				}
	 
			}
		}


		$prixbasex=$prixbase;
		array_push($table_supp, '<font style="color:#f00 !important">Prix /Nuitée/'.$modedepayement.': '.$prixbase."dt</font>");

	  
		
		
		/*********************/	
	  
	 	 $supplement_g_val=0;//calcule	
  		$reduction3emelit=0;
		$reduction4emelit=0;	
		$prixavecenfants=0;		 
							foreach($supplementss as $att2=>$val2){
			if($val2!="D"){
				$t=explode("=", $val2);
				if(is_obligatoire_supplement($dates_tarifs[$att],$t[0]) ){ 
				$valeur=$t[1]; 
				
				 $min_pax=nom_att('min_pax','supplement_hotel','id',$t[0]);
				 $pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$t[0]);
				 if($pax_chambre==1 && $nbre_de_pax>=$min_pax){$coifsupp=$nbre_de_pax; $afftypepar=" PAX";}else { $coifsupp=1; $afftypepar=" Chambre";}
				 
				if(substr($valeur, -1)=="%"  ){
					$suppaff=$valeur;
					$expl2=explode("%", $valeur);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$valeur; $suppaff=$valeur.'dt';}
					if($mvaleur!=0 && $mvaleur!=''){$supplement_g_val+=($mvaleur*$coifsupp);
							array_push($table_supp, nom_att('nom','supplement_hotel','id',$t[0]).'('.$suppaff.'/'.$afftypepar.')');
							array_push($table_supp_voucher, nom_att('nom','supplement_hotel','id',$t[0]));
					}
				}
				elseif(in_array($t[0] ,$supplement_hotel_g) ){ 
				
					
					$valeur=$t[1]; 
				 $min_pax=nom_att('min_pax','supplement_hotel','id',$t[0]);
				 $pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$t[0]);
				 
				 if($pax_chambre==1 && $nbre_de_pax>=$min_pax){$coifsupp=$nbre_de_pax; $afftypepar=" PAX";}else { $coifsupp=1; $afftypepar=" Chambre";}
				if(substr($valeur, -1)=="%"  ){
					$suppaff=$valeur;
					$expl2=explode("%", $valeur);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$valeur; $suppaff=$valeur.'dt';}
					if($mvaleur!=0 && $mvaleur!=''){$supplement_g_val+=($mvaleur*$coifsupp);
							array_push($table_supp, nom_att('nom','supplement_hotel','id',$t[0]).'('.$suppaff.'/'.$afftypepar.')');
							array_push($table_supp_voucher, nom_att('nom','supplement_hotel','id',$t[0]));
					}
					}
					
				
			}
		}

		
			
			
			  //supplement single
		if($adultes==1){
			
			if(substr($suppsingle, -1)=="%"  ){
				$suppaff=$suppsingle;
					$expl2=explode("%", $suppsingle);$mvaleur=($prixbasex*$expl2[0]/100);}else{ $mvaleur=$suppsingle;$suppaff=$suppsingle.'dt';}
				if($mvaleur!=0 && $mvaleur!=''){	$prixbase+=$mvaleur;
			array_push($table_supp, "Supplément single".'('.$suppaff.')');}
	
			}
			
	   // reduction 3eme et 4eme
	  

		if($adultes>=3){
		if(substr($rres['red_troisieme'], -1)=="%"  ){
					$expl2=explode("%", $rres['red_troisieme']);$mvaleur=($prixbase*$expl2[0]/100);$reduction3emelit+=$mvaleur;
					 $redaff=$rres['red_troisieme'];}
					else{ $reduction3emelit+=$rres['red_troisieme']; $redaff=$rres['red_troisieme'].'dt';}
		 array_push($table_supp, 'Réduction 3éme Lit ('.$redaff.")");
		}
		
		if($adultes>=4){
		if(substr($rres['red_quatrieme'], -1)=="%"  ){
					$expl2=explode("%", $rres['red_quatrieme']);$mvaleur=($prixbase*$expl2[0]/100);$reduction4emelit+=$mvaleur;
					 $redaff=$rres['red_quatrieme'];}
					else{ $reduction4emelit+=$rres['red_quatrieme']; $redaff=$rres['red_quatrieme'].'dt';}
		 array_push($table_supp, 'Réduction 4éme Lit ('.$redaff.")");
		}
		
		
		/*********************/	
				
				
		
   			
		foreach($reductionss as $att2=>$val2){ 
			if($val2!="D"){
				$t=explode("=", $val2); 
				$id_reducx=$t[0];
				$prix_enfant_1=$t[1];
				$prix_enfant_2=$t[2];
				$prix_enfant_3=$t[3];
				$res=is_obligatoire_reductions($id_reducx, $adultes);
				
				if($res!=false){ 
					$id_reduc=$res[0];
					$avec=$res[1];
					
					 $nbre_enf=0;
					 $key = array_search($id_reduc, $id_reduction); 
					 $nbre_enf=$nbreenfants[$key];
				
				if ($adultes==$avec && $adultes<=2 && $adultes>=0 && $avec <=2){
						if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0;}		
						elseif($nbre_enf==2){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= 0;$prix4= 0;   }		
						elseif($nbre_enf==3){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= 0;  }
						elseif($nbre_enf==4){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= $prixbasex; }
						else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
								
				}	
				elseif ($adultes>=$avec && $adultes>2 && $avec >=2){
					if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0; }		
					else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
				}else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;}
					
				
				if(substr($prix1, -1)=="%"  ){
					$expl1=explode("%", $prix1);$mvaleur1=($prixbasex*$expl1[0]/100);
				
				}else{ $mvaleur1=($prix1);
}				
					
				if(substr($prix2, -1)=="%"  ){
					$expl2=explode("%", $prix2);$mvaleur2=($prixbasex*$expl2[0]/100); 
				}else{ $mvaleur2=($prix2);}			
				
				if(substr($prix3, -1)=="%"  ){
					$expl3=explode("%", $prix3);$mvaleur3=($prixbasex*$expl3[0]/100); 
				}else{ $mvaleur3=($prix3);}
			
			
			$mvaleur4=($prix4);
			
			$totalenfant=($mvaleur1+$mvaleur2+$mvaleur3+$mvaleur4);
			
			$prixavecenfants+=$totalenfant;  
				}
				
				
				
			
				
			}
				//$prixavecenfants+=$prixbase*($adultes);
   
		}
	
	if(	$modedepayement=='pax'){
			$multiple=$adultes;

		    $prixavecenfants=$prixbasex*($nbre_enf)-$prixavecenfants; 
			 
		}else{
			$multiple=1;
			$prixavecenfants=0;
		}
		$prixavecenfants=0;		
		foreach($reductionss as $att2=>$val2){ 
			if($val2!="D"){
				$t=explode("=", $val2); 
				$id_reducx=$t[0];
				$prix_enfant_1=$t[1];
				$prix_enfant_2=$t[2];
				$prix_enfant_3=$t[3];
				$res=is_obligatoire_reductions($id_reducx, $adultes);
				
				if($res!=false){ 
					$id_reduc=$res[0];
					$avec=$res[1];
					
					 $nbre_enf=0;
					 $key = array_search($id_reduc, $id_reduction); 
					 $nbre_enf=$nbreenfants[$key];

				if ($adultes==$avec && $adultes<=2 && $adultes>=0 && $avec <=2){
						if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0;}		
						elseif($nbre_enf==2){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= 0;$prix4= 0;   }		
						elseif($nbre_enf==3){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= 0;  }
						elseif($nbre_enf==4){ $prix1= $prix_enfant_1; $prix2= $prix_enfant_2; $prix3= $prix_enfant_3;$prix4= $prixbasex; }
						else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
								
				}	
				elseif ($adultes>=$avec && $adultes>2 && $avec >=2){
					if($nbre_enf==1){ $prix1= $prix_enfant_1; $prix2=0; $prix3=0;$prix4= 0; }		
					else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;  }
				}else 		{ $prix1= 0; $prix2= 0; $prix3= 0;$prix4= 0;}
					
				
				if(substr($prix1, -1)=="%"  ){
					$expl1=explode("%", $prix1);$mvaleur1=($prixbasex*$expl1[0]/100);
				
				}else{ $mvaleur1=($prix1);
}				
					
				if(substr($prix2, -1)=="%"  ){
					$expl2=explode("%", $prix2);$mvaleur2=($prixbasex*$expl2[0]/100); 
				}else{ $mvaleur2=($prix2);}			
				
				if(substr($prix3, -1)=="%"  ){
					$expl3=explode("%", $prix3);$mvaleur3=($prixbasex*$expl3[0]/100); 
				}else{ $mvaleur3=($prix3);}
			
			
			$mvaleur4=($prix4);
			
			$totalenfant=($mvaleur1+$mvaleur2+$mvaleur3+$mvaleur4);
			
			$prixavecenfants+=$totalenfant;  
						if($prixavecenfants!=0){
							
							 array_push($table_supp, "Réduction enfant(s)".'('.$prixavecenfants.'dt)');
							 
						}

				}
				
				
				
			
				
			}
				//$prixavecenfants+=$prixbase*($adultes);
   
		}
		
 $prixavecenfants=$prixbasex*($nbre_enf)-$prixavecenfants; 
		
			$tot+=($prixbase*($multiple)+$prixavecenfants+$supplement_g_val); 
			$tot-=$reduction3emelit;
			$tot-=$reduction4emelit;
		

	 }

	 
$table_supp = array_unique($table_supp);
$table_reduc = array_unique($table_reduc);

	$table_supp_voucher = array_unique($table_supp_voucher);
	$table_reduc_voucher = array_unique($table_reduc_voucher);

foreach($table_supp as $val){
		 $textesupp.=$val.'<br>';
		 }
foreach($table_reduc as $val){
		 $textesupp.=$val.'<br>';
		 }
foreach($table_supp_voucher as $val){
		 $textesupp_net.=$val.'<br>';
		 }
	 foreach($table_reduc_voucher  as $val){
		 $textesupp_net.=$val.'<br>';
		 }
		 		 

foreach($liste_enfant as $attx=>$valx){if($valx!="0"){$x=explode('=',$valx);$nbre_enfaff+=$x[1]; }}
$message='';
$table_voucher='';
$table_facture='';
		
if($affichejour !="") $message.= '<tr><td></td><td colspan="4">'.$affichejour.'</td></tr>';
$message.= '<tr  class="toptable">
	<td colspan="1">'.$nbrechambre.'-'.nom_att('nom','type_chambre','id',$type).' </td>
	<td>Adulte(s): '.$adultes.'</td>
	<td>Enfants(s):  '.$nbre_enfaff.'</td>
	<td>'.nom_att('nom','arrangement','id',$arrangement).'</td>
	<td >'.$tot.'<sup>DT</sup></td></tr>';

		

$table_voucher.= '<tr  class="toptable">
	<td colspan="1">'.nom_att('nom ','clients','mail',$_SESSION['mail_connect']).' '.nom_att('prenom ','clients','mail',$_SESSION['mail_connect']).'<br>
	
	'.$textesupp_net.'
	 </td>
	
	<td>'.nom_att('nom','type_chambre','id',$type).'</td>
	<td>'.$adultes.'</td>
	<td>'.$nbre_enfaff.'</td>
	<td>'.nom_att('nom','arrangement','id',$arrangement).'</td>
	</tr>';
	
	
	
if($nbre_enfaff!=0) $nbre_enfaffx="et $nbre_enfaff enfant(s)";else $nbre_enfaffx='';
if($adultes!=0) $adultesaff="$adultes adulte(s)";else $adultesaff='';
$table_facture.= '<tr  class="toptable">

	
	<td>'.nom_att('nom','type_chambre','id',$type).'<br>
	'.$adultesaff.$nbre_enfaffx.' </td>
	<td>'.nom_att('nom','arrangement','id',$arrangement).'</td>
	<td>'.$nbjourtotal.'</td>
	<td>'.$tot.'</td>
	</tr>';		
	
	
	
$message.= '<tr>	<td></td><td colspan="5">'.$textesupp.'</td></tr>';


	
	return array($tot,$message,$table_voucher,$table_facture);
	
	

}




/*________________________________________________________________________________________________________________________________________________*/
 $supplement_hotel_g=explode(',',$_GET['supplement_hotel']);
$options_g=explode(',',$_GET['options_g']);
$id_hotel=$_GET['id_hotel'];
$message='';
$messagefact='';
$voucher_affiche='';


 if(isset($_GET['checkin'])) $ddd1=explode("/", $_GET['checkin']);
 if(isset($_GET['checkout'])) $ddd2=explode("/", $_GET['checkout']);
	$ddd1=$ddd1[2]."-".$ddd1[1]."-".$ddd1[0];
	$ddd2=$ddd2[2]."-".$ddd2[1]."-".$ddd2[0];
 $date1v=strtotime($ddd1);$date2v=strtotime($ddd2);

 if(isset($_SESSION['mail_connect'])){
 if($ddd1<$ddd2){
	 $message.= '<div style="text-align:left;">';
	 $voucher_affiche.='<div style="text-align:left;">';

$message.= '<table class="panier">
<tr class="toptable1"><td colspan="1"><strong>Chambre(s)</strong></td><td colspan="1"><strong>Adulte(s)</strong></td><td colspan="1"><strong>Enfants(s)</strong></td><td><strong>Arrang.</strong></td><td><strong>Total</strong></td></tr>'; 
$messagefact.= '<table class="panier">
<tr class="toptable1"><td colspan="1"><strong>Désignations</strong></td><td colspan="1"><strong>Nuitée(s)</strong></td><td><strong>Arrang.</strong></td><td><strong>Total</strong></td></tr>'; 

$voucher_affiche.= '<table class="panier">
<tr class="toptable1"><td colspan="1"><strong>GUEST</strong></td><td colspan="1"><strong>ROOM</strong></td><td colspan="1"><strong>ADULTS</strong></td><td colspan="1"><strong>CHILDRENS</strong></td><td><strong>BOARD</strong></td></tr>';

	$unJour = 3600 * 24;$ts3=$date1v;$reduction=0;$sp=0;$msjresuction="";$repeat=1;
	$listecompletdate_tarif=array();$listecompletdate_promo=array();$listedatesuspondu=array();$dates_tarifs=array();$dates_promo=array();
	while($ts3!=$date2v){

			
			$datelimit3=date('Y-m-d', $ts3);
			$ispromo=is_promos($datelimit3,$id_hotel);//si promo elle retourne id promo
			$istarif=is_tarifs($datelimit3,$id_hotel);//si promo elle retourne id tarif
			
			if($ispromo)      {array_push($listecompletdate_promo, $ispromo);array_push($dates_promo, $datelimit3); }
			elseif($istarif)  {array_push($listecompletdate_tarif, $istarif);array_push($dates_tarifs, $datelimit3);}
			else             {array_push($listedatesuspondu, $datelimit3);}
			$ts3 += $unJour;
	}
	
$affichejour="";
$nbjoursimple=sizeof($listecompletdate_tarif);
$nbjourpromo=sizeof($listecompletdate_promo); 
$nbjourtotal=$nbjoursimple+$nbjourpromo;	

echo $_SESSION['save_result'];
$liste=explode("-",$_SESSION['save_result']);
$total=0;
	$nbrechambre=0;
foreach($liste as $val){
	$totalchambre=0;
	if($val!="(0,0,0,0,0)"){
	$liste2=explode(",",$val);
	if(isset($liste2[0])) $type = substr($liste2[0],1); //id_type_chambre
	if(isset($liste2[1])) $nbchb=$liste2[1];  //nbre chambre
	if(isset($liste2[2])) $adultes=$liste2[2];//parent
	if(isset($liste2[3])) $enfants=$liste2[3];//enfant
	
	if(isset($liste2[4])) $arrangement = substr($liste2[4],0,-1); //arrangement
	if($adultes!="Adultes"  && $nbchb!=0 && $type!=0){
		if(nom_att('type','type_chambre','id',$type)=="chambre"){
		$table=montant_net_chambre($listecompletdate_promo,$listecompletdate_tarif,$dates_promo,$dates_tarifs, $adultes, $enfants, $arrangement,$nbrechambre,$type,$supplement_hotel_g,$options_g,$nbjourtotal);
		
		}else		if(nom_att('type','type_chambre','id',$type)=="suite"){
		$table=montant_net_suite($listecompletdate_promo,$listecompletdate_tarif,$dates_promo,$dates_tarifs, $adultes, $enfants, $arrangement,$nbrechambre,$type,$supplement_hotel_g,$options_g,$nbjourtotal);

		}
	$totalchambre+=$table[0];
	$voucher_affiche.=$table[2];
	$message.=$table[1];
	$messagefact.=$table[3];
	



	}$nbrechambre++;
	}
	
	$total+=$totalchambre;
	
}


		$message.= '<tr><td colspan="4">total</td><td colspan="1">'.$total.'<sup>DT</sup></td></td></tr>';
		
$messagefact.= '<tr style="border:0px;"><td></td><td></td><td></td><td></tr></table>';
$tnv=$total+0.5; 
$t=($tnv-0.5);
$tnv=sprintf('%.03F',$tnv);

$ht=((($t/116)*100)/101)*100;$ht=sprintf('%.03F',$ht);
$fd= ($ht/100); $fd=sprintf('%.03F',$fd);
$t=$fd+$ht;
$tva=($t/100)*16;$tva=sprintf('%.03F',$tva);
 			
$messagefact.= '<table class="toptableprix" >

<tr><td>prix ht</td><td id="td2">'.$ht.'</td></tr>
<tr><td>FDCST(1%)</td><td>'.$fd.'</td></tr>
<tr><td>TVA=6%</td><td>'.$tva.'</td></tr>
<tr><td>timbre fiscale</td><td>0.500</td></tr>
<tr><td>net &Atilde;&nbsp; payer</td><td>'.$tnv.'</td></tr>
<tr><td colspan="2" style="height:55px;"><div id=""></div></td></td></tr>
</table>';
		
	




$affichejour.= '<font style="color:#f00 !important;">Votre panier contient:</font><br>';

if($nbjourtotal!=0) $affichejour.=$nbjourtotal.'nuit(s)';	
if($nbjourpromo!=0) $affichejour.='dont '.$nbjourpromo.'nuit(s) en promos';
$affichejour.='<br>';

if(sizeof($listedatesuspondu)!=0){
	$affichejour.= '<font style="color:#f00 !important;">Les dates suivants ne sont pas inclus dans le prix!</font><br>';
	foreach($listedatesuspondu as $val){
			 $affichejour.= $val.'<br>';
	}
}	
if(affiche_options ( $options_g ) !="") $message.= '<tr><td colspan="5"><div style="font-weight: bold;">OPTIONS:'.affiche_options ( $options_g ).'</div></td></tr>';
if($affichejour !="") $message.= '<tr><td colspan="5">'.$affichejour.'</td></tr>';
	$message.= '</table>';
		$message.= '</div>';	
	
 } else{
	  $message.= '<div style="text-align:center;"><font style="color:#f00 !important;">Verifier les dates !.</font></div>'; 
 }
 
 }else{
	  $message.= '<div style="text-align:center;"><font style="color:#f00 !important;">Vous devez connecter !.</font></div>'; 
 }
 $voucher_affiche.= '</table></div>';

 
 echo $message;
 
	
if(empty($total)) $total=0;
if(empty($voucher_affiche)) $voucher_affiche='';
if(empty($nbjourtotal)) $nbjourtotal=0;
if(empty($message)) $message='';

	
	
?>
<input name="nbre_nuit"  id="nbre_nuit" type="hidden" value="<?php echo $nbjourtotal;?>" />
<input name="total"  id="total" type="hidden" value="<?php echo $total;?>" />
<input name="message" id="message" type="hidden" value="<?php echo htmlentities($message);?>" />
<input name="facture" id="facture" type="hidden" value="<?php echo htmlentities($messagefact);?>" />
<input name="voucher_affiche" id="voucher_affiche" type="hidden" value="<?php echo htmlentities($voucher_affiche);?>" />
