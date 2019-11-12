
<?php include("connexion.php");?>
<?php
 $q=mysql_query("select * from facture where numfact='".$_GET['id']."'"); 
 $r=mysql_fetch_array($q);
 


  ?>
<!DOCTYPE HTML> 
<html lang="fr-fr">
<head>

          <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




  


<title>Facture</title>
<style>
.masque{rgba(255,255,255,0.7) ; width:100%; height:100%; position:absolute; }



.page * { background-color:  !important}
.page{padding-top:50px;
 height: 1365px;
 width: 1000px;
 border:0px solid #000 ;
 margin-top:50px;
 
   background: url(img/paierentete.jpg);
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;;
 }
 
 .page .cadre{
	 
	 width:900px;
	 margin-left:auto;
	 margin-right:auto;
	 
	 
	 
 }
 .page .cadre div {float:right; height:100px;}
 .page .cadre div.client {float:right !important;}
 .page .cadre .logo{
	
	 width:30%;
	 
	
	
 }
 .page .cadre .societe{
	padding-left:10px;
	 width:45%;
 }
 .page .cadre .titre{

	 width:30%;
 }
 .page .cadre .client{
	padding:0px; 
	margin-top:-100px;
	 width:100%;
	 text-align:right;
	 float:right;
	
 }
 .page .cadre .date{
	
	 width:100%;
	 text-align:right;
	 height:30px;
 }
 .page .tableau {
	 margin-left:auto;
	 margin-right:auto;
	 width:900px;
	 margin-top:50px;
 height:550px;


	 }
.page .tableau table{
	height:100%;
	width:100%;
	border-collapse:collapse;
	 /*background: url(../images/logo-header-fact.png) no-repeat center center; background-repeat:repeat-y;
	 -webkit-background-size: 100%;
  -moz-background-size: 100%;
  -o-background-size: 100%;
  background-size: 100%;;*/
	
}
.page .tableau table td {
	border-top:0px solid #000000;
	border-left:1px solid #000000;
	border-right:1px solid #000000;
	border-bottom:0px solid #000000;
}
.page .tableau table tr#col1 td, .page .tableau table tr#top td {
	
	height:30px;
}

.page .tableau table tr#top td {
	border:1px solid #000000; font-family:"Caviar Dreams"; font-weight:bold; text-align:center;
	
}
.page .tableau table tr td {
	border:1px solid #000000; font-family:"Caviar Dreams"; text-align:center;
	
}.page .tableau table tr td.des {
	 font-family:"Caviar Dreams"; text-align:left;
	
}

.page .footer {
	 margin-left:auto;
	 margin-right:auto;
	 width:900px;
	 margin-top:205px;
	 
  height:200px;
	 }
	 .page .tableau table tr#top td {
		 margin-left:auto;
	 margin-right:auto;
	 width:900px;
	 
border:1px solid #000000; height:40px; }
.page .footer table { border-collapse:collapse; border:1px #000000 solid; width:898px;  }
.page .footer table td {
	 height:25px; border:1px #000000 solid; 
	 
	  
}
.page .footer table td#td2 {
	width:149px;	  
}

.imprimer {
	position:fixed;
	width:10px;
	height:200px; 
	top:200px;
	left:10px;}
	
	
	.mat {
    -ms-transform: rotate(90deg); /* IE 9 */
    -webkit-transform: rotate(90deg); /* Safari */
    transform: rotate(90deg);
	position:absolute; margin-left:670px; margin-top:700px; font-size:18px; width:800px; font-weight:bold; word-spacing:3px;
}
table *{ font-family:"Caviar Dreams"; font-family:}
h1, .mat { font-family: Impact;}
 .footer table tr td, #prixlettre{ font-weight:bold;}
 
</style>
<script type="text/javascript">
                <!--
function open_infos(page,nom,largeur,hauteur)
{

   if(window.innerWidth)
                                {
                                        var leftv = (window.innerWidth-largeur)/2;
                                        var topv = (window.innerHeight-hauteur)/2;
                                }
                                else
                                {
                                        var leftv = (document.body.clientWidth-largeur)/2;
                                        var topv = (document.body.clientHeight-hauteur)/2;
                                }						
								
window.open(page,nom,'menubar=no, scrollbars=no, top='+topv+', left='+leftv+', width='+largeur+', height='+hauteur+'');
}
</script>
</head>

<body >

<div style="background-color:#FFF; position:absolute; width:100%; height:50px; top:0px;"></div>

<div class="page">


    <div class="cadre">
				
    	<table style="width:100%; float:right; ">
		<tr>
			<td style="text-align:right;    "><h1>Facture N&deg;:  <?php echo $_GET['id'];?></h1> </td>
            
            
		</tr>
        
        <tr><td  style="text-align:right;   ">
 
        	<h3> <?php echo $r['nom'] ; ?><br>
            <?php echo $r['prenom'] ;?> <br> 
            <?php echo $r['tel'] ;?> 
			
			 </h3>
     </td></tr>
      <tr><td  style="text-align:left;   ">
 
        	<h5> <strong>Date:</strong>  <?php echo date("d-m-Y", strtotime($r['date']));?><?php echo $r['heure'] ;?>
            
			
			 </h5>
     </td></tr>
	</table>
	
	
        
        
     <div class="imprimer">
	  
	  <?php if(!isset($_GET['imprime']) || $_GET['imprime']!="ok"){?>
<form method="post" action="facture_fiche.php?id=<?php echo  $_GET['id'];?>&imprime=ok">
  <input id="impression" name="impression" type="submit"  value="Imprimer" />
</form> <?php }?>


  <input onclick="javascript:window.close();" id="impression" name="impression" type="button"  value="Fermer" />
</div>
	
	  
	  
       
        
    </div>
    
    <br />
<center>

    <div class="tableau" id="tableaux">
    <table >
    <tr id="top">
	<td style="width:500px;">Noms des Client</td>
	<td style="width:10%; text-align:center;">Arrangement</td>
	<td style="width:10%; text-align:center;">Prix unitaire</td>
	<td style="width:10%; text-align:center;">Pax</td>
	<td style="width:10%; text-align:center;">Jours</td>

	<td style="width:10%; text-align:center;">Montant</td>
	</tr>
  <?php
  
  
  
  
   $t=0;
  $page=1;
  $nbocc=1;
  $a=mysql_query("select * from facture_contenu where numfact='".$_GET['id']."'");
  $end=1;
  $nreligneactuel=0;
  $nbocc=0;
  $nbocctest=0;

while($res=mysql_fetch_array($a))
{ 


     
	$nreligneactuel+= nbre_ligne($res['clients'], 24); 
	if($nreligneactuel>30){
	$sizo=100*$page; $nreligneactuel=0; 
	$nbocc=1;
	$page++;
    	
 		
	
	
	
	echo '</table></div><div class="footer" >
<table  >


<tr><td>prix ht</td><td id="td2"></td></tr>
<tr><td>FDCST(1%)</td><td></td></tr>
<tr><td>TVA=6%</td><td></td></tr>
<tr><td>timbre fiscale</td><td></td></tr>
<tr><td>net &Atilde;&nbsp; payer</td><td></td></tr>
<tr><td colspan="2" style="height:55px;"><div id=""></div></td></td></tr>

</table>


<table style="width:25%; float:left; border:1px solid #333333; margin-top:20px;">
<tr><td>En votre aimable règlement,
Cordialement.</td></tr>
</table>
<table style="width:25%; float:right;  border:0px solid #333333 !important; margin-top:20px;">
<tr><td>LA DIRECTION</td></tr>
</table>

</div></center></div>';
	
	echo '<div class="page"  ><div class="cadre">
    	<table style="width:100%; float:right; ">
		<tr>
			<td style="text-align:right;    "><h1>Facture N&deg;:  '.$_GET['id'].'</h1> </td>
            
            
		</tr>
        
        <tr><td  style="text-align:right;   ">
 
        	<h3>'.$r['nom'].'<br>
            '. $r['prenom'].'<br> 
            '.$r['tel'] .'
			
			 </h3>
     </td></tr>
      <tr><td  style="text-align:left;   ">
 
        	<h5> <strong>Date:</strong>  '.date("d-m-Y", strtotime($r['date'])).' '.$r['heure'] .'
            
			
			 </h5>
     </td></tr>
	</table>
  </div>
    
    <br />
<center>

    <div class="tableau" id="tableaux">
     <table >
   <tr id="top">
	<td style="width:500px;">Noms des Client</td>
	<td style="width:10%;">Arrangement</td>
	<td style="width:10%;">Prix unitaire</td>
	<td style="width:10%;">Pax</td>
	<td style="width:10%;">Jours</td>

	<td style="width:10%;">Montant</td>
	</tr>
    
    
    ';
	 ?>
	 

	 
	 <?php
	
	}
	
 
 ?>
    
    <tr id="col1">
		<td class="des">
        
        <?php
		$cc=0; 
		$nbocc+=mb_substr_count($res['clients'], "\n")+1;
		$chaine = nl2br($res['clients']); echo $chaine;

		
		?></td>
		<td class="des" style="text-align:center;"><?php echo $res['arrangement']; ?></td>

	<td style="text-align:center;"><?php if($res['pu']!=0)  echo sprintf('%.03F',$res['pu']); ?></td>
			<td class="des" style="text-align:center;"><?php if($res['pu']!=0) echo $res['pax']; ?></td>

	<td style="text-align:center;"> <?php if($res['pu']!=0) echo $res['qte']; ?> </td>
	<td style="text-align:center;"><?php  if($res['pu']!=0) echo sprintf('%.03F',$res['pu']*$res['qte']*$res['pax']);$t+=($res['pu']*$res['qte']*$res['pax']);?></td>
	
	</tr>
   <?php 
   
   //$nbligne+=$taille;
  
  
 	
	
	$end++;
} ?>
   
	
<tr style="border:0px;"><td></td><td></td><td></td><td></td><td></td><td></td></tr>
	
    </table>
	
	
</div>


<br/><div class="footer" >
<table  >


<?php $ht=$t;?>
<?php
$totalapayer= sprintf('%.03F',$ht); 

$htva1=($ht/1.06);
$htva=$htva1/1.01;

$somme_ap_fdc=$htva*1.01;
$somme_ap_fdca=$somme_ap_fdc*0.06;


?>

<tr><td>prix ht</td><td id="td2"><?php echo sprintf('%.03F',$htva); ?></td></tr>
<tr><td>FDCST(1%)</td><td><?php echo sprintf('%.03F',$htva*0.01) ;$ht=$ht*1.01; ?></td></tr>
<tr><td>TVA=6%</td><td><?php echo sprintf('%.03F',$somme_ap_fdca) ; ?></td></tr>
<tr><td>timbre fiscale</td><td>0.500</td></tr>
<tr><td>net &Atilde;&nbsp; payer</td><td><?php echo sprintf('%.03F',$totalapayer+0.50) ; ?></td></tr>
<tr><td colspan="2" style="height:55px;"><div id="">Arr&eacute;t&eacute;e la pr&eacute;sente facture  &agrave; la somme de: 
<?php $tttc=sprintf('%.03F',$totalapayer+0.50); echo chifre_en_lettre($tttc);?> </div></td></td></tr>

</table>


<table style="width:25%; float:left; border:1px solid #333333; margin-top:20px;">
<tr><td> En votre aimable r&egrave;glement,<br />Cordialement.</td></tr>
</table>
<table style="width:25%; float:right;  border:0px solid #333333 !important; margin-top:20px;">
<tr><td>LA DIRECTION</td></tr>
</table>

</div>

</center>




</body>
<script>
var nn=document.getElementById('tableaux').offsetHeight;

function affiche()
{var prix=document.getElementById('prix').value;
var chaine=toWords(prix*1000);
document.getElementById('prixlettre').innerHTML+=chaine;}

function imprimer_page(id){
  window.print();
  

}
<?php 
if(isset($_GET['imprime']) && $_GET['imprime']=="ok") {

echo "imprimer_page(".$_GET['id'].");";

}?>
</script>
<style>
.sansborder{ border-left:2px solid #fff !important;border-top:2px solid #fff !important;border-bottom:2px solid #fff !important;border-right:2px solid #fff !important; }
.sansbordert{ border-top:0px !important; text-align:right !important;}
.sansborderb{ border-bottom:0px !important; text-align:right !important;}
*{ font-family:"Nexa Light" !important;}

</style>
</html>