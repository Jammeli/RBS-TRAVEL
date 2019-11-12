<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><?php include"connexion.php" ; 

 $q=mysql_query("select * from voucher_man where id='".$_GET['id']."'"); 
 $r=mysql_fetch_array($q);
 
  ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Voucher</title>
<style>
.masque{rgba(255,255,255,0.7) ; width:100%; height:100%; position:absolute; }

body{

padding-top:0 !important; margin-top:0 !important; 
 
 background: url(img/paierentete.jpg) no-repeat center center; 
  -webkit-background-size: 100% 100%;
  -moz-background-size: 100% 100%;
  -o-background-size: 100% 100%;
  background-size: 100% 100%;
  }

.page * { background-color:  !important}
.page{
padding-top:50px;
 height: 1250px;
 width: 1000px;
 border:0px solid #000 ;
 margin-top:150px;
 

 }
 
 .page .cadre{
	 
	 width:900px;
	 margin-left:auto;
	 margin-right:auto;
	 
	 
	 
 }
 .page .cadre div {float:left; height:100px;}
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



	 }
.page .tableau table{
	
	width:100%;
	border-collapse:collapse;
	
}
.page .tableau table td {
	border-top:0px solid #000000;
	border-left:1px solid #000000;
	border-right:1px solid #000000;
	border-bottom:0px solid #000000;
	padding:10px;
}
.page .tableau table tr#col1 td, .page .tableau table tr#top td {
	
	height:30px;
}

.page .tableau table tr#top td {
	border:1px solid #000000; font-family:"Caviar Dreams"; font-weight:bold; text-align:center;
	
}
.page .tableau table tr td {
	border:1px solid #000000; font-family:"Caviar Dreams"; text-align:center; font-size:18px;  font-weight:bold;
	
}.page .tableau table tr td.des {
	 font-family:"Caviar Dreams"; text-align:left;font-size:18px; font-weight:bold;
	
}

.page .footer {
	 left:auto;
	 right:auto;
	 width:1000px;
	 top:1050px;
	 position:absolute;
	 
	 }
	 .page .tableau table tr#top td {
		 margin-left:auto;
	 margin-right:auto;
	 width:900px;
	 
 height:80px; }
.page .footer table { border-collapse:collapse; border:0px #000000 solid; width:898px;  }
.page .footer table td {
	 height:25px; border:0px #000000 solid;  text-align:left;font-size:18px; font-weight:bold;
	 
	  
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

</head>
<body onload="affiche()">

<div class="page">

<center><h1>Voucher N&deg;:<?php echo $r['id']; ?></h1></center>

    <div class="cadre">
				 
    	
	<table>
		<tr><td><strong>BOOKING DATE</strong></td><td><strong>:</strong></td><td  colspan="3"><strong><?php $s=explode("-" ,$r['date']);
																	echo $s[2]."-".$s[1]."-".$s[0]; ?></strong>
																	</td></tr>
		<tr><td><strong>NIGHTS</strong></td><td><strong>:</strong></td><td  colspan="3"><strong><?php echo $r['nuit']; ?></strong></td></tr>
		<tr><td><strong>CHECK IN</strong></td><td><strong>:</strong></td><td  colspan="3"><strong><?php echo date("d-m-Y", strtotime($r['checkin']));?></strong></td></tr>
		<tr><td><strong>CHECK OUT</strong></td><td><strong>:</strong></td><td  colspan="3"><strong><?php echo date("d-m-Y", strtotime($r['checkout']));?></strong></td></tr>
		<tr><td colspan="4"><strong>Accommodation Detail:</strong></td></tr>
		<tr><td colspan="4"><strong><?php echo $r['accomm']; ?></strong></td></tr>

  </table>
	
        
     
	  
	
	  
	  <div class="imprimer">
	  
	  <?php if(!isset($_GET['imprime']) || $_GET['imprime']!="ok"){?>
<form method="post" action="voucher_man_fiche.php?id=<?php echo  $_GET['id'];?>&amp;imprime=ok">
  <input id="impression" name="impression" type="submit"  value="Imprimer" />
</form> 
  <input onclick="javascript:window.close();" id="impression" name="impression" type="button"  value="Fermer" />

<?php }?>


</div>
       
        
    </div>
    
    <br />
<center>

    <div class="tableau">
	
    <table >
    <tr id="top">
	<td style="min-width:200px;">GUEST</td>
	<td style="width:12%;">ROOM TYPE</td>
	<td style="width:12%;">ADULTS</td>
	<td style="width:12%;">CHILDRENS</td>

	<td style="width:12%;">BOARD</td>
	
	</tr>
  <?php $t=0; $a=mysql_query("select * from voucher_man_contenu where numvoucher='".$_GET['id']."'");
while($res=mysql_fetch_array($a))
{  ?>
    <tr id="col1">
		<td class="des"><?php echo nl2br($res['personne']); ?></td>
		<td class=""><?php echo $res['type']; ?></td>
		<td class=""><?php echo $res['adulte']; ?></td>
		<td class=""><?php echo $res['enfant']; ?></td>
		<td class=""><?php echo $res['board']; ?></td>

	
	
	</tr>
   <?php } ?>
    
    </table>
	<h2  style="float:left;">H&ocirc;tel:<?php echo $r['hotel']; ?></h2>
</div>
<div class="footer">
<table  >

<tr>
<td>

Important:
D&eacute;lai d'annulation Minimum 5 jours avant la date d'arriv&eacute;e (*). Au-del&agrave; de ce d&eacute;lai  tout le s&eacute;jour sera factur&eacute; ( aucun remboursement espèces ni avoir n'est possible). En cas d'annulation ou de modification dans le d&eacute;lai le remboursement se fait sous forme d'un bon avoir &agrave; consommer dans 6 mois.Frais de modification ou anuulation: 5%
.selon des règles mondialement applique&eacute; :
.le check in(remise de la clef de la chambre) :&agrave; 14h00
.le check out (lib&eacute;ration de la chambre) : &agrave;       12h00.</td>



</table>









</div>

</center>
<input type="hidden" value="<?php echo sprintf('%.03F',$t+0.50) ; ?>" id="prix" />

			
</div>

</body>

</html>
<script>
function imprimer_page(id){
  window.print();
 
}
<?php 
if(isset($_GET['imprime']) && $_GET['imprime']=="ok") {

echo "imprimer_page(".$_GET['id'].");";

}?>
</script>
  
    