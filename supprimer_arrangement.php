<?php
include("connexion.php");

 $bl=mysql_query("select arrangement from hotel where id_hotel='".$_GET['id_hotel']."'"); 
 $sbl=mysql_fetch_row($bl);
 $test=explode('-', $sbl[0]);
 $id=$_GET['id'];
 $division='';
 $ids="0";
$cmp=0;
foreach($test as $val){
	if($id!=$val && $val!=0){
		
		
	$nomtarif=nom_att('nom','arrangement','id',$val);
	$division.='<div class="control-group"><label class="control-label">Suppl&eacute;ment '.$nomtarif.'</label><div class="controls"><div class="input-prepend input-append"><input class=" " type="text" name="tarif_'.$val.'" id="tarif_'.$cmp.'" value="" /><input type="checkbox" name="checktarif_'.$val.'" id="checktarif_'.$cmp.'" value="%"  ><span class="add-on">%</span> <a style="margin-left:50px;" href="javascript: if(confirm(\'Supprimer?\')) supprimer_arrangement(\''.$_GET['id_hotel'].'\',\''.$val.'\',\''.$cmp.'\');" ><span class="add-on">X</span></a></div></div></div>';	
	 $ids.="-".$val;

	$cmp++; }

}

	echo $division;
	
		

 mysql_query("update   hotel set arrangement='".$ids."'  where id_hotel='".$_GET['id_hotel']."'") or die(mysql_error());
?>
