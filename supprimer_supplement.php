<?php
include("connexion.php");

 $bl=mysql_query("select supplement_hotel from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $test=explode('-', $sbl[0]);
 $id=$_GET['id'];
 $division='';
 
 
 $ids="0";
$cmp=0;

foreach($test as $val){
	if($id!=$val && $val!=0){
		
		
	$nomtarif=nom_att('nom','supplement_hotel','id',$val);
	$obligatoire=nom_att('obligatoire','supplement_hotel','id',$val);
	$pax_chambre=nom_att('pax_chambre','supplement_hotel','id',$val);
	$min_pax=nom_att('min_pax','supplement_hotel','id',$val);
						
						if($obligatoire==1) $obl=" (Oblig) "; else $obl= " (Non Oblig)";
		                if($pax_chambre==0) $obl2=" (par pièce) "; else $obl2= " (Par PAX: mininum=".$min_pax.")";
						
						
	$liensupp="<a style=\"margin-left:50px;\" href=\"javascript: if(confirm('Supprimer?')) supprimer_supplement('".$_GET['id_hotel']."','".$val."','".$cmp."');\" ><span class=\"add-on\">X</span></a>";





	$division.='<div class="control-group"><label class="control-label">'.$nomtarif.' '.$obl.''.$obl2.'</label><div class="controls"><div class="input-prepend input-append"><input class=" " type="text" name="supplement_hotel_'.$val.'"  id="supplement_hotel_'.$cmp.'" value="" /><input type="checkbox" name="checksupplement_hotel_'.$val.'"  id="checksupplement_hotel_'.$cmp.'" value="%"  ><span class="add-on">%</span>'.$liensupp.'</div></div></div>';	
	 $ids.="-".$val;
$cmp++;
	}

}

	echo $division;
	
		

 mysql_query("update   hotel set supplement_hotel='".$ids."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());
?>
