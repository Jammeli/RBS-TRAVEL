
<?php

session_start();
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


   function nbre_ligne($phrase, $taillemax){
	$nbligne=mb_substr_count($phrase, "\n")+1;
	$p=explode(" ", $phrase);
	$somme=0;
	foreach($p  as $mot){
	$somme+=(strlen($mot)	+1);
	if($somme>$taillemax){ $nbligne++;
	$somme=strlen($mot);
	}
	}
	return $nbligne;
  }
  
function chifre_en_lettre($montant, $devise1='', $devise2='')
{
    if(empty($devise1)) $dev1='Dinars';
    else $dev1=$devise1;
    if(empty($devise2)) $dev2=' Millimes';
    else $dev2=$devise2;
    $valeur_entiere=intval($montant);
   // $valeur_decimal=intval(round($montant-intval($montant), 2)*100);
    $valeur_decimal=explode(".",$montant);
	$valeur_decimal=$valeur_decimal[1];
    $dix_c=intval($valeur_decimal%100/10);
    $cent_c=intval($valeur_decimal%1000/100);
    $unite[1]=$valeur_entiere%10;
    $dix[1]=intval($valeur_entiere%100/10);
    $cent[1]=intval($valeur_entiere%1000/100);
    $unite[2]=intval($valeur_entiere%10000/1000);
    $dix[2]=intval($valeur_entiere%100000/10000);
    $cent[2]=intval($valeur_entiere%1000000/100000);
    $unite[3]=intval($valeur_entiere%10000000/1000000);
    $dix[3]=intval($valeur_entiere%100000000/10000000);
    $cent[3]=intval($valeur_entiere%1000000000/100000000);
    $chif=array('', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix sept', 'dix huit', 'dix neuf');
        $secon_c='';
        $trio_c='';
    for($i=1; $i<=3; $i++){
        $prim[$i]='';
        $secon[$i]='';
        $trio[$i]='';
        if($dix[$i]==0){
            $secon[$i]='';
            $prim[$i]=$chif[$unite[$i]];
        }
        else if($dix[$i]==1){
            $secon[$i]='';
            $prim[$i]=$chif[($unite[$i]+10)];
        }
        else if($dix[$i]==2){
            if($unite[$i]==1){
            $secon[$i]='vingt et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='vingt';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==3){
            if($unite[$i]==1){
            $secon[$i]='trente et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='trente';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==4){
            if($unite[$i]==1){
            $secon[$i]='quarante et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='quarante';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==5){
            if($unite[$i]==1){
            $secon[$i]='cinquante et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='cinquante';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==6){
            if($unite[$i]==1){
            $secon[$i]='soixante et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='soixante';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==7){
            if($unite[$i]==1){
            $secon[$i]='soixante et';
            $prim[$i]=$chif[$unite[$i]+10];
            }
            else {
            $secon[$i]='soixante';
            $prim[$i]=$chif[$unite[$i]+10];
            }
        }
        else if($dix[$i]==8){
            if($unite[$i]==1){
            $secon[$i]='quatre-vingts et';
            $prim[$i]=$chif[$unite[$i]];
            }
            else {
            $secon[$i]='quatre-vingt';
            $prim[$i]=$chif[$unite[$i]];
            }
        }
        else if($dix[$i]==9){
            if($unite[$i]==1){
            $secon[$i]='quatre-vingts et';
            $prim[$i]=$chif[$unite[$i]+10];
            }
            else {
            $secon[$i]='quatre-vingts';
            $prim[$i]=$chif[$unite[$i]+10];
            }
        }
        if($cent[$i]==1) $trio[$i]='cent';
        else if($cent[$i]!=0 || $cent[$i]!='') $trio[$i]=$chif[$cent[$i]] .' cents';
    }
     
     
$chif2=array('', 'dix', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingts', 'quatre-vingts dix');
    $secon_c=$chif2[$dix_c];
    if($cent_c==1) $trio_c='cent';
    else if($cent_c!=0 || $cent_c!='') $trio_c=$chif[$cent_c] .' cents';
     
    if(($cent[3]==0 || $cent[3]=='') && ($dix[3]==0 || $dix[3]=='') && ($unite[3]==1))
        echo $trio[3]. '  ' .$secon[3]. ' ' . $prim[3]. ' million ';
    else if(($cent[3]!=0 && $cent[3]!='') || ($dix[3]!=0 && $dix[3]!='') || ($unite[3]!=0 && $unite[3]!=''))
        echo $trio[3]. ' ' .$secon[3]. ' ' . $prim[3]. ' millions ';
    else
        echo $trio[3]. ' ' .$secon[3]. ' ' . $prim[3];
     
    if(($cent[2]==0 || $cent[2]=='') && ($dix[2]==0 || $dix[2]=='') && ($unite[2]==1))
        echo ' mille ';
    else if(($cent[2]!=0 && $cent[2]!='') || ($dix[2]!=0 && $dix[2]!='') || ($unite[2]!=0 && $unite[2]!=''))
        echo $trio[2]. ' ' .$secon[2]. ' ' . $prim[2]. ' milles ';
    else
        echo $trio[2]. ' ' .$secon[2]. ' ' . $prim[2];
     
    echo $trio[1]. ' ' .$secon[1]. ' ' . $prim[1];
     
    echo ' '. $dev1 .' ' ;
     
	 
if(isset($valeur_decimal)){
		if(strlen($valeur_decimal)==1) $valeur_decimalx=$valeur_decimal*100;
		elseif(strlen($valeur_decimal)==2) $valeur_decimalx=$valeur_decimal*10;
		else $valeur_decimalx=$valeur_decimal;
		
        echo " et ".$valeur_decimalx.$dev2;}
		
}



function nom_att( $att, $table, $attrecherche,$id){
$sql=mysql_query("select ".$att." from ".$table." where ".$attrecherche."='".$id."'") or die(mysql_error());
$res=mysql_fetch_row($sql);
return $res[0];

}

function numero($table){
	
		$rech=mysql_query("SELECT MAX(id) from  `".$table."` ");
		$rrech=mysql_fetch_row($rech);
		if(strlen($rrech[0])==10){
			 $rrechannee=substr($rrech[0], 0, 6);
			 $rrrech=substr($rrech[0], 6, 4);
			 $rrrech=intval($rrrech)+1;
			 $rrrech= sprintf("%'.04d", $rrrech); 
			 $idnv="$rrechannee$rrrech";
		}
		else  $idnv=date("Y").date("m")."0001";	
return $idnv;
}

function numero2($table){
	
		$rech=mysql_query("SELECT MAX(numvoucher) from  `".$table."` ");
		$rrech=mysql_fetch_row($rech);
		if(strlen($rrech[0])==10){
			 $rrechannee=substr($rrech[0], 0, 6);
			 $rrrech=substr($rrech[0], 6, 4);
			 $rrrech=intval($rrrech)+1;
			 $rrrech= sprintf("%'.04d", $rrrech); 
			 $idnv="$rrechannee$rrrech";
		}
		else  $idnv=date("Y").date("m")."0001";	
return $idnv;
}


function temp($date){
	
$d1 = $date; 

 $d=explode(" ", $date);
 $d1=explode("-", $d[0]);
 $d2=explode(":", $d[1]);
 
 $time1=mktime ($d2[0],$d2[1],$d2[2],$d1[1],$d1[2],$d1[0]);
 $time2=mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));

 $diff=$time2-$time1;
 
 
$jour=intval(($diff / 3600)/24);
$heures=intval($diff / 3600);
$minutes=intval(($diff % 3600) / 60);
$secondes=intval((($diff % 3600) % 60));

 if($jour>0){return "il y a ".$jour." J";}
 elseif($heures>0){ return "il y a ".$heures." H";}
 elseif($minutes>0){ return "il y a ".$minutes." Min";}
 elseif($secondes>0){ return "il y a ".$secondes." Sec";}
	
}
function vu_notification($id, $source){
	
	mysql_query("update notifications set lu ='1' where id_element='".$id."' and source='".$source."'");
	
	
}

$connexionLogin = @mysql_connect($hostname_connexionLogin, $username_connexionLogin, $password_connexionLogin) or trigger_error(mysql_error(),E_USER_ERROR); 
@mysql_select_db($database_connexionLogin, $connexionLogin) or die(mysql_error());
/*	
 $connexionLogin = mysqli_connect($hostname_connexionLogin, $username_connexionLogin, $password_connexionLogin,  $database_connexionLogin);
*/
    
	mysql_set_charset('utf8',$connexionLogin);

echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
if(empty($_SESSION['admin_connect'])) header("location:login.php");

function image_profil($id){
	
	$select=mysql_query("select image from images where id_hotel='".$id."' and type='profil'");
	$select2=mysql_query("select image from images where id_hotel='".$id."'");
	$exe1=mysql_fetch_row($select);
	$exe2=mysql_fetch_row($select2);
	
	if(mysql_num_rows($select)!=0) return $exe1[0];
	elseif(mysql_num_rows($select2)!=0) return $exe2[0];
	else return "images/default.jpg";



										
}
?>





<?php



function compress($source, $destination, $quality) {

		$info = getimagesize($source);

		if ($info['mime'] == 'image/jpeg') 
			$image = imagecreatefromjpeg($source);

		elseif ($info['mime'] == 'image/gif') 
			$image = imagecreatefromgif($source);

		elseif ($info['mime'] == 'image/png') 
			$image = imagecreatefrompng($source);

		imagejpeg($image, $destination, $quality);

		return $destination;
	}
function upload($index,$destination,$extensions=FALSE)
{
	
	$maxsize=3145728;
	$nomfile="image".date("Y_m_d_H_i_s");
   //Test1: fichier correctement upload&eacute;
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return "chargement";
   //Test2: taille limite
    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return "taille";
   //Test3: extension
    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return "extension";
   //D&eacute;placement
    
 
  if( move_uploaded_file($_FILES[$index]['tmp_name'],$destination.$nomfile.".".$ext)){
  
  $source_img = $destination.$nomfile.".".$ext;
  $destination_img = $destination.$nomfile."2.".$ext;

	$d = compress($source_img, $destination_img, 50);
	unlink($source_img);
	return $d; 
  
  }else return"erreur";




}

function upload2($index,$destination,$extensions=FALSE)
{
	
	$maxsize=3145728;
	$nomfile="image".date("Y_m_d_H_i_s");
   //Test1: fichier correctement upload&eacute;
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return "chargement";
   //Test2: taille limite
    if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return "taille";
   //Test3: extension
    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return "extension";
   //D&eacute;placement
    
 
  if( move_uploaded_file($_FILES[$index]['tmp_name'],"../".$destination.$nomfile.".".$ext)){
  
  $source_img = "../".$destination.$nomfile.".".$ext;
  $destination_img = "../".$destination.$nomfile."2.".$ext;

	$d = compress($source_img, $destination_img, 50);
	unlink($source_img);
	$d=explode("../", $d);
	return $d[1]; 
  
  }else return"erreur";




}
 ?>
