<?php
include("connexion.php");

$sql=mysql_query("select * from promotions");
while($res=mysql_fetch_array($sql)){
	if($res['arrangement']!=0){
	$ancienid=$res['arrangement'];
	$ancienprix=$res['prix'];
	$nvchaine1="$ancienid";
	$nvchaine2="$ancienprix";
	}else{
		
		$nvchaine1="x";
		$nvchaine2="x";
		
		}
	$sql2=mysql_query("select arrangement from hotel where id_hotel='".$res['id_hotel']."' ");
	$res2=mysql_fetch_row($sql2);
	$arrangementtar=explode("-",$res2[0]);
	foreach($arrangementtar as $att=>$val){
			if($val!=0 && $ancienid!=$val){
				
				$nvchaine1.="-".$val;
				$nvchaine2.="-x";
			}
	}
	echo $res['id']."=>".$nvchaine1."/".$nvchaine2."<br>";
	
mysql_query("update  promotions set arrangement='$nvchaine1',prix='".$nvchaine2."' where id='".$res['id']."'  ") or die(mysql_error());
}