
<?php
include("connexion.php");

 $bl=mysql_query("select reductions from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $test=explode('-', $sbl[0]);
 $id=$_GET['id'];
 $division='';
 
 
 $ids="0";
$cmp=0;

foreach($test as $val){
	if($id!=$val && $val!=0){
		
		
	$nomtarif=nom_att('nom','reduction_hotel','id',$val).' entre '.nom_att('age1','reduction_hotel','id',$val).' et '.nom_att('age2','reduction_hotel','id',$val);
						
		


	$liensupp="<a style=\"margin-left:50px;\" href=\"javascript: if(confirm('Supprimer?')) supprimer_reduction('".$_GET['id_hotel']."','".$val."','".$cmp."');\" ><span class=\"add-on\">X</span></a>";
	
	$division.='<div class="control-group"><label class="control-label">'.$nomtarif.'</label><div class="controls"><div class="input-prepend input-append"><input style="width:75px !important; " type="text" disabled  value=" 1e Enfant" /><input class=" " type="text" name="reduction_hotel_1'.$val.'"  id="reduction_hotel_1'.$cmp.'" value="" /><input type="checkbox" name="checkreduction_hotel_1'.$val.'"  id="checkreduction_hotel_1'.$cmp.'" value="%"  ><span class="add-on">%</span><input style="width:95px !important; margin-left:10px;"  type="text" disabled  value="2ème Enfants" /><input class=" " type="text" name="reduction_hotel_2'.$val.'"  id="reduction_hotel_2'.$cmp.'" value="" /><input type="checkbox" name="checkreduction_hotel_2'.$val.'" id="checkreduction_hotel_2'.$cmp.'" value="%" ><span class="add-on">%</span><input  style="width:95px !important; margin-left:10px;" type="text" disabled  value="3ème Enfants" /> <input class=" " type="text" name="reduction_hotel_3'.$val.'" id="reduction_hotel_3'.$cmp.'" value="" /><input type="checkbox" name="checkreduction_hotel_3'.$val.'"  id="checkreduction_hotel_3'.$cmp.'" value="%" ><span class="add-on">%</span>'.$liensupp.'</div></div></div>';


	 $ids.="-".$val;
$cmp++;
	}

}

	echo $division;
	
		

 mysql_query("update   hotel set reductions='".$ids."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());
?>
