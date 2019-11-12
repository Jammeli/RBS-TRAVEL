
<?php

session_start();
date_default_timezone_set('Africa/Tunis');
$database_connexionLogin 	= "rbstravelcom_wafa";
$username_connexionLogin	= "rbstravelcom_wafa";
$password_connexionLogin	="wafa2018";  
$hostname_connexionLogin	= "localhost";
/*
$database_connexionLogin 	= "rbs_travel";
$username_connexionLogin	= "root";
$password_connexionLogin	= "";
$hostname_connexionLogin	= "localhost";

*/


$connexionLogin = @mysql_connect($hostname_connexionLogin, $username_connexionLogin, $password_connexionLogin) or trigger_error(mysql_error(),E_USER_ERROR);
 	mysql_set_charset('utf8',$connexionLogin);
@mysql_select_db($database_connexionLogin, $connexionLogin) or die(mysql_error());
	


echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");



$sqltotal=mysql_query("select * from parametres_g");
$restotparametres=mysql_fetch_array($sqltotal);



function affiche_courte($chaine){
	$lettre=0;
	$resultat='';
	$liste=explode(" ", $chaine);
	foreach($liste as $val){
		if($lettre<150){
			
			$resultat.=$val.' ';
			$lettre+=strlen($val);
		}else break;
	}
      echo $resultat.'...';                     
							
}
 	function notification($id_elm,$source,$mode,$text,$id_client){
	
	mysql_query("INSERT INTO `notifications` (`id`, `id_element`, `source`, `mode`, `date`, `text`, `lu`, `id_client`) 
	VALUES (NULL,
	 '".$id_elm."',
	 '".$source."',
	 '".$mode."',
	 '".date("Y-m-d H:i:s")."',
	 '".$text."',
	
	 '0',
	  '".$id_client."'
	 );");
	 
	 
	 $from=nom_att( 'email', 'parametres_g', 'id',1); 
	 $mail=nom_att( 'email', 'parametres_g', 'id',1); 
	$subject = "Réservation ".$source." sur  RBS Travel";
						
	$message = '
  
       <p>Vous avez une demande de réservation  '.$source.', verifier votre administration!</p>
	   <p>www.rbstravel.com.tn/index.php</p>
	   <p>www.rbstravel.com.tn</p>

     
     ';
	
	$headers = 'From: RBS Notification  <'.$from.'>' . "\r\n" .
    'Reply-To:'.$from. "\r\nContent-Type: text/html; charset=\"iso-8859-1\"\r\n"."X-Mailer: PHP/" . phpversion();
					
	$additionalparam = "-t " . $from;
	mail($mail, $subject, $message, $headers, $additionalparam);
	
	
	
	}


function verif_gmap($gmap){
	
	if($gmap!=""){
		$test=explode(",",$gmap );
		if(!empty($test[0]) && !empty($test[1])) return true;
		else return false;
		
		
	}else return false;
	
	
	}
	
	
function visite_site(){
	
	$ip= $_SERVER["REMOTE_ADDR"];
	$select=mysql_query("select date from nb_visite where ip='$ip' ORDER BY id DESC");
	$rexe=mysql_fetch_row($select);
	$date=explode(" ",$rexe[0] );
	$dt=explode("-", $date[0]);
	$ht=explode(":", $date[1]);
	$my_new_date= mktime($ht[0], $ht[1], $ht[2]+1200, $dt[1], $dt[2], $dt[0]);
	$aujourdui= mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
	
	
	if($aujourdui > $my_new_date )
mysql_query("INSERT INTO `nb_visite` (`id`, `ip`, `date`) VALUES (NULL, '$ip', '".date("Y-m-d H:i:s")."');	")	;

}
function visite($id,$type){
	
	$ip= $_SERVER["REMOTE_ADDR"];
	$select=mysql_query("select date from views where ip='$ip' ORDER BY id DESC");
	$rexe=mysql_fetch_row($select);
	$date=explode(" ",$rexe[0] );
	$dt=explode("-", $date[0]);
	$ht=explode(":", $date[1]);
	$my_new_date= mktime($ht[0], $ht[1], $ht[2]+1200, $dt[1], $dt[2], $dt[0]);
	$aujourdui= mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));
	
	
	if($aujourdui > $my_new_date )
mysql_query("INSERT INTO `views` (`id`, `id_element`, `type`, `ip`, `date`) VALUES (NULL, '$id', '$type', '$ip', '".date("Y-m-d H:i:s")."');	")	;

}

function nb_vue($id,$type){
	
	$select=mysql_query("select * from views where type='$type' and id_element='$id' ");
	$nb=mysql_num_rows($select);
	return $nb;

}


function region($id){
	
	$select=mysql_query("select region from regions where id='$id'");
	$nb=mysql_fetch_row($select);
	return $nb[0];

}
function image_profil($id){
	
	$select=mysql_query("select image from images where id_hotel='".$id."' and type='profil'");
	$select2=mysql_query("select image from images where id_hotel='".$id."'");
	$exe1=mysql_fetch_row($select);
	$exe2=mysql_fetch_row($select2);
	
	if(mysql_num_rows($select)!=0) return $exe1[0];
	elseif(mysql_num_rows($select2)!=0) return $exe2[0];
	else return "images/background/hotel-view-banner.jpg";


										
}

function image_profilEX($id, $table, $att){
	
	$select=mysql_query("select image from $table where $att='$id' and type='profil'");
	$select2=mysql_query("select image from $table where $att='$id'");
	$exe1=mysql_fetch_row($select);
	$exe2=mysql_fetch_row($select2);
	if(isset($exe1[0])) return $exe1[0];
	elseif(isset($exe2[0])) return $exe2[0];
	else return "images/background/hotel-view-banner.jpg";

}
function prix($id, $mode){
	
	$select=mysql_query("select prix from promotions where id_hotel='$id' and etat='1'");
	$select2=mysql_query("select prix from tarifs where id_hotel='$id'");
	$exe1=mysql_fetch_row($select);
	$exe2=mysql_fetch_row($select2);
	if(isset($exe1[0])&& isset($exe2[0])){
		if($mode==1){
		 return $exe1[0].'<sup style="font-size:9px;">DT</sup> <br><del style=" color:#F00;"><font style=" color:#F00;">'.$exe2[0]."<sup style=\"font-size:14px;\">DT</sup></font></del>";
		}
		elseif($mode==2){
		 return $exe1[0].'<sup style="font-size:9px;">DT</sup> <del style=" color:#F00;"><font style=" color:#F00;">'.$exe2[0]."<sup style=\"font-size:14px;\">DT</sup></font></del>";
		}
		 
		 }
	elseif(isset($exe2[0])) return $exe2[0]."<sup style=\"font-size:14px;\">DT</sup>";


}





function prix_list($id, $mode){
	
	$select=mysql_query("select prix from promotions where id_hotel='$id' and etat='1'");
	$select2=mysql_query("select prix from tarifs where id_hotel='$id'");
	$exe1=mysql_fetch_row($select);
	$exe2=mysql_fetch_row($select2);
	if(isset($exe1[0])&& isset($exe2[0])){
		if($mode==1){
		 return '<span style=" color:#7db921; font-size:20px;">'.$exe1[0].'</span><sup style="font-size:9px;">DT</sup> <br><del style=" color:#F00;"><font style=" color:#F00; font-size:20px;">'.$exe2[0]."<sup style=\"font-size:14px;\">DT</sup></font></del>";
		}
		elseif($mode==2){
		 return '<span style="color:#7db921; font-size:20px;">'.$exe1[0].'</span><sup style="font-size:9px;">DT</sup> <del style=" color:#F00;"><font style=" color:#F00; font-size:20px;">'.$exe2[0]."<sup style=\"font-size:14px;\">DT</sup></font></del>";
		}
		 
		 }
	elseif(isset($exe2[0])) return '<span style=" color:#7db921;font-size:20px;">'.$exe2[0]."</span><sup style=\"font-size:14px;\">DT</sup>";


}
function prixfinal($id){/**/
	
	
	
	$datevalide=" and id_hotel in(select id_hotel from promotions where date_depart <= '".date("Y-m-d")."' and date_fin >= '".date("Y-m-d")."' )";	
	
	$datevalidetarif=" and ( `date_depart` <= '".date("Y-m-d")."' and `date_fin` >= '".date("Y-m-d")."' )";
	$selectpromo=mysql_query("select prix, arrangement from promotions where id_hotel='$id' and etat='1' $datevalide");
	$selectarif=mysql_query("select prix, arrangement from tarifs where id_hotel='$id'  $datevalidetarif") or die (mysql_error());
	
	$exepromo=mysql_fetch_row($selectpromo);
	$exetarif=mysql_fetch_row($selectarif);
	
	$prixbase=$exetarif[0];
	$arrangementtarif=$exetarif[1];
	$prixpromotion=$exepromo[0];
	$arrangementpromotion=$exepromo[1];

if(mysql_num_rows($selectpromo)!=0){
	
	$prixs=explode("-",$prixpromotion);
	$arrangement=explode("-",$arrangementpromotion); 
	
	$min=$prixs[0];
	$pos=0;
	foreach($prixs as $att=>$val){ if( $val!="x" && $min>$val){ $min=$val; $pos=$att;} }

	$minarr=$arrangement[$pos];
	
	
	$arrangementtar=explode("-",$arrangementtarif);
	foreach($arrangementtar as $val){
			if($val!="D"){
				$t=explode("=", $val);
				if($t[0]==$minarr && $t[1]!="x" ){ $prixorigine=$t[1]+$prixbase; }
				

				
			}
		}
		
	
}
	
	else{$min="x"; 
	
	
	$arrangementtar=explode("-",$arrangementtarif);
	$x=$arrangementtar[1];
	$t=explode("=", $x);
	$minarr=$t[1];
	foreach($arrangementtar as $att=>$val){
			if($val!="D"){
				$t=explode("=", $val);
				if($minarr>$t[1] && $t[1]!="x" ){  $minarr=$t[1]; $pos=$att;}
				
		$prixorigine=$minarr+$prixbase; 
				
			}
		}
	}
if(empty($prixorigine))  $prixorigine='x';

	if($min!='x'){ 
	$x= $min;
	
		}
		else{
			 if($prixorigine!='x') $x=$prixorigine;
			 else $x=0;
			}
		
		
	
		 return $x;
		 
	
		 
		





}

function prix_promo($id, $mode){
	
	$datevalide=" and id_hotel in(select id_hotel from promotions where date_depart <= '".date("Y-m-d")."' and date_fin >= '".date("Y-m-d")."' )";	
	
	$datevalidetarif=" and ( `date_depart` <= '".date("Y-m-d")."' and `date_fin` >= '".date("Y-m-d")."' )";
	$selectpromo=mysql_query("select prix, arrangement, date_depart, date_fin from promotions where id_hotel='$id' and etat='1' $datevalide")or die (mysql_error());
	$selectarif=mysql_query("select prix, arrangement from tarifs where id_hotel='$id'  $datevalidetarif") or die (mysql_error());
	
	$exepromo=mysql_fetch_row($selectpromo);
	$exetarif=mysql_fetch_row($selectarif);
	
	$prixbase=$exetarif[0];
	$arrangementtarif=$exetarif[1];
	$prixpromotion=$exepromo[0];
	$arrangementpromotion=$exepromo[1];
	if(isset($exepromo[2])) $datedepart=$exepromo[2];else $datedepart='';
	if(isset($exepromo[3])) $datefin=$exepromo[3];else $datefin='';

if(mysql_num_rows($selectpromo)!=0){
	
	$prixs=explode("-",$prixpromotion);
	$arrangement=explode("-",$arrangementpromotion); 
	
	$min=$prixs[0];
	$pos=0;
	foreach($prixs as $att=>$val){ if( $val!="x" && $min>$val){ $min=$val; $pos=$att;} }

	$minarr=$arrangement[$pos];
	
	
	$arrangementtar=explode("-",$arrangementtarif);
	foreach($arrangementtar as $val){
			if($val!="D"){
				$t=explode("=", $val);
				if($t[0]==$minarr && $t[1]!="x" ){ $prixorigine=$t[1]+$prixbase; }
				

				
			}
		}
		
	
}
	
	else{$min="x"; 
	
	
	$arrangementtar=explode("-",$arrangementtarif);
	$x=$arrangementtar[1];
	$t=explode("=", $x);
	$minarr=$t[1];
	foreach($arrangementtar as $att=>$val){
			if($val!="D"){
				$t=explode("=", $val);
				if($minarr>$t[1] && $t[1]!="x" ){  $minarr=$t[1]; $pos=$att;}
				
		$prixorigine=$minarr+$prixbase; 
				
			}
		}
	}
if(empty($prixorigine))  $prixorigine='x';
		if($mode==1){ $br='<br>';} else $br='';	
$x='';
	if($min!='x'){ 
	$x.= $min.'<sup style="font-size:10px;vertical-align: middle;">DT</sup>';

if($prixorigine!='x') $x.=' '.$br.'<del style=" color:#F00; font-size:24px;"><font style=" color:#F00;">'.$prixorigine.'<sup style="font-size:10px;vertical-align: middle;">DT</sup></font></del>';
/*

if($datedepart!=''){
	
if($datefin!=''){$x.='<font class="datepromo" > '.$br.'de'.$datedepart.'au'.$datefin.'</font>';}
else{$x.='<font class="datepromo" > '.$br.'à partir de'.$datedepart.'</font>';}
	
	
}*/


	
		}
		else{
			 if($prixorigine!='x') $x.='<font >'.$prixorigine.'<sup style="font-size:10px;vertical-align: middle;">DT</sup></font>';
			 else $x."non disponible";
			}
		
		
	
		 return $x;
		 
	
		 
		


}


function pourcent_promo($id){
	
	$datevalide=" and id_hotel in(select id_hotel from promotions where date_depart <= '".date("Y-m-d")."' and date_fin >= '".date("Y-m-d")."' )";	
	
	$datevalidetarif=" and ( `date_depart` <= '".date("Y-m-d")."' and `date_fin` >= '".date("Y-m-d")."' )";
	$selectpromo=mysql_query("select prix, arrangement from promotions where id_hotel='$id' and etat='1' $datevalide");
	$selectarif=mysql_query("select prix, arrangement from tarifs where id_hotel='$id'  $datevalidetarif") or die (mysql_error());
	
	$exepromo=mysql_fetch_row($selectpromo);
	$exetarif=mysql_fetch_row($selectarif);
	
	$prixbase=$exetarif[0];
	$arrangementtarif=$exetarif[1];
	$prixpromotion=$exepromo[0];
	$arrangementpromotion=$exepromo[1];

if(mysql_num_rows($selectpromo)!=0){
	$etat="1";
	
	
	$arrangementpromo=explode("-",$arrangementpromotion);
	$x=$arrangementpromo[1];
	$t=explode("=", $x);
	$minarr=$t[1];
	foreach($arrangementpromo as $att=>$val){
			if($val!="D"){
				$t=explode("=", $val);
				if($minarr>$t[1] && $t[1]!="x" ){  $minarr=$t[1]; $pos=$att;}
				
		$prixpromo=$minarr+$prixpromotion; 
				
			}
		}
	if(mysql_num_rows($selectarif)!=0){	
	$arrangementtar=explode("-",$arrangementtarif);
	$x=$arrangementtar[1];
	$t=explode("=", $x);
	$minarr=$t[1];
	foreach($arrangementtar as $att=>$val){
			if($val!="D"){
				$t=explode("=", $val);
				if($minarr>$t[1] && $t[1]!="x" ){  $minarr=$t[1]; $pos=$att;}
				
		$prixorigine=$minarr+$prixbase; 
				
			}
		}
	}
	
	}
	
	else{$etat="x";}

	if(empty($prixorigine))  $prixorigine='x';
	
	if($etat!='x'){ 
	if($prixorigine!='x') $pourc=100-( $prixpromo/$prixorigine)*100;
	else $pourc= 100;
	
	}else $pourc= 0;
	

		
	$pourc=(int)$pourc;
return $pourc;
		 
	
		 
		


}


function arr_promo($id){
	
	
	$datevalide=" and id_hotel in(select id_hotel from promotions where date_depart <= '".date("Y-m-d")."' and date_fin >= '".date("Y-m-d")."' )";	
	
	$datevalidetarif=" and ( `date_depart` <= '".date("Y-m-d")."' and `date_fin` >= '".date("Y-m-d")."' )";
	$selectpromo=mysql_query("select prix, arrangement from promotions where id_hotel='$id' and etat='1' $datevalide");
	$selectarif=mysql_query("select prix, arrangement from tarifs where id_hotel='$id'  $datevalidetarif") or die (mysql_error());
	
	$exepromo=mysql_fetch_row($selectpromo);
	$exetarif=mysql_fetch_row($selectarif);
	$prixbase=$exetarif[0];
	$arrangementtarif=$exetarif[1];
	$prixpromotion=$exepromo[0];
	$arrangementpromotion=$exepromo[1];
	

if(mysql_num_rows($selectpromo)!=0){
	
	$arrangementtar=explode("-",$arrangementpromotion);
	$x=$arrangementtar[1];
	$t=explode("=", $x);
	$minarrt=$t[1];
	$minarr=$t[0];
	foreach($arrangementtar as $att=>$val){
			if($val!="D"){
				$t=explode("=", $val);
				if($minarrt>$t[1] && $t[1]!="x" ){  $minarrt=$t[1]; $pos=$att;$minarr=$t[0];}
				
						
			}
		}
	
}
	
	else{$min="erreur"; 
	
	/*
	$arrangementtar=explode("-",$arrangementtarif);
	$x=$arrangementtar[1];
	$t=explode("=", $x);
	$minarr=$t[1];
	*/
	
	$arrangementtar=explode("-",$arrangementtarif);
	$x=$arrangementtar[1];
	$t=explode("=", $x);
	$minarrt=$t[1];
	$minarr=$t[0];
	foreach($arrangementtar as $att=>$val){
			if($val!="D"){
				$t=explode("=", $val);
				if($minarrt>$t[1] && $t[1]!="x" ){  $minarrt=$t[1]; $pos=$att;$minarr=$t[0];}
				
						
			}
		}
		
	}

		

	
				$selectres=mysql_query("select nom from arrangement where id='$minarr'");
		$exer=mysql_fetch_row($selectres);
		 return "en ".$exer[0];
		
		 
		

}
function affiche_periode_promo($id){
	
		$select=mysql_query("select date_depart, date_fin from promotions where id_hotel='$id' and etat='1'");
		$re=mysql_fetch_row($select);
		$r1=explode("-", $re[0]); $r1=$r1[2]."-".$r1[1]."-".$r1[0];
		$r2=explode("-", $re[1]); $r2=$r2[2]."-".$r2[1]."-".$r2[0];
		return "<br>Du ".$r1." au ".$r2;
	
	
	}
function minstay($id){
	
	$select=mysql_query("select nb_nuit_min from promotions where id_hotel='$id' and date_depart<='".date("Y-m-d")."' and date_fin>='".date("Y-m-d")."' and etat='1'");
	$select2=mysql_query("select nb_nuit_min from tarifs where id_hotel='$id' and date_depart<='".date("Y-m-d")."' and date_fin>='".date("Y-m-d")."' ");
	$exe1=mysql_fetch_row($select);
	$exe2=mysql_fetch_row($select2);
	if(isset($exe1[0])) return $exe1[0];
	elseif(isset($exe2[0])) return $exe2[0];
	else return 1;
	

}


function accompte($id){
	
	$select2=mysql_query("select acompte from tarifs where id_hotel='$id' and date_depart<='".date("Y-m-d")."' and date_fin>='".date("Y-m-d")."' ");
	$exe2=mysql_fetch_row($select2);
	if(isset($exe2[0])) return $exe2[0];
	else return "100%";
	

}


function annulation($id){
	
	$select2=mysql_query("select delai_a from tarifs where id_hotel='$id' and date_depart<='".date("Y-m-d")."' and date_fin>='".date("Y-m-d")."' ");
	$exe2=mysql_fetch_row($select2);
	if(isset($exe2[0])) return $exe2[0];
	else return 1;
	

}


function arrangement($id){
	
	$arrag="";
	$select2=mysql_query("select amenagement from hotel where id_hotel='$id' ");
	$exe1=mysql_fetch_row($select2);
	$ar=explode("-", $exe1[0]);
	
	foreach($ar as $val){
		if($val!=0){
	$selectx=mysql_query("select nom, image from amenagement where id='$val' ");
	$exe2=mysql_fetch_row($selectx);
	$nom=$exe2[0];
	$image=$exe2[1];
	$arrag.='<div class="item feature-item"><i class="fa fa-check-square-o"></i>

                                        <p class="text">'.$nom.'</p></div>';
	
	}
	}
	return $arrag;
	

}
 
function affiche_image_p($id,$mode){
$images="";
	$select2=mysql_query("select image from images where id_hotel='$id'");
	
	while($exe1=mysql_fetch_row($select2)){
	$image=$exe1[0];
	
	if($mode==1){
	$images.='<div class="item" style="background-image:url('.$image.'); background-position:center; background-size:cover; height:380px; "></div>';

	}
	elseif($mode==2){
	$images.='<div class="item" style="background-image:url('.$image.'); background-position:center; background-size:cover; height:60px; width:70px;"></div>';

	}
	
	}
	
	return $images;
		
	
	
	}
	
	
	function affiche_image_pEX2($id,$mode,$table, $att){
$images="";
	$select2=mysql_query("select * from tourisme_medical_g ");
	
	while($exe1=mysql_fetch_array($select2)){
	$image=$exe1['image'];
	
	if($mode==1){
	$images.='<div class="item" style="background-image:url('.$image.'); background-position:center; background-size:cover; height:380px; "></div>';

	}
	elseif($mode==2){
	$images.='<div class="item" style="background-image:url('.$image.'); background-position:center; background-size:cover; height:60px; width:70px;"></div>';

	}
	
	}
	
	return $images;
		
	
	
	}
	
	function affiche_image_pEX($id,$mode,$table, $att){
$images="";
	$select2=mysql_query("select image from $table where $att='$id'");
	
	while($exe1=mysql_fetch_row($select2)){
	$image=$exe1[0];
	
	if($mode==1){
	$images.='<div class="item" style="background-image:url('.$image.'); background-position:center; background-size:cover; height:380px; "></div>';

	}
	elseif($mode==2){
	$images.='<div class="item" style="background-image:url('.$image.'); background-position:center; background-size:cover; height:60px; width:70px;"></div>';

	}
	
	}
	
	return $images;
		
	
	
	}
	function genererMDP ($longueur = 18){
	// initialiser la variable $mdp
	$mdp = "";
 
	// Définir tout les caractères possibles dans le mot de passe, 
	// Il est possible de rajouter des voyelles ou bien des caractères spéciaux
	$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
 
	// obtenir le nombre de caractères dans la chaîne précédente
	// cette valeur sera utilisé plus tard
	$longueurMax = strlen($possible);
 
	if ($longueur > $longueurMax) {
		$longueur = $longueurMax;
	}
 
	// initialiser le compteur
	$i = 0;
 
	// ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
	while ($i < $longueur) {
		// prendre un caractère aléatoire
		$caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
 
		// vérifier si le caractère est déjà utilisé dans $mdp
		if (!strstr($mdp, $caractere)) {
			// Si non, ajouter le caractère à $mdp et augmenter le compteur
			$mdp .= $caractere;
			$i++;
		}
	}
 
	// retourner le résultat final
	return $mdp;
}

?>

<?php /*
$database_connexionLogin 	= "travel01_masolutions";
$username_connexionLogin	= "travel01";
$password_connexionLogin	= "UBQHxGMjaKEVQSqr";
$hostname_connexionLogin	= "sql40.topnetpro.com";
$connexionLogin = mysql_connect($hostname_connexionLogin, $username_connexionLogin, $password_connexionLogin) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_connexionLogin, $connexionLogin) or die(mysql_error());

*/




function nom_att( $att, $table, $attrecherche,$id){
$sql=mysql_query("select ".$att." from ".$table." where ".$attrecherche."='".$id."'");
$res=mysql_fetch_row($sql);
return $res[0];

}
?>


<style>
.datepromo{ font-size:12px;}
</style>



