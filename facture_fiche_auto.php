
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
	 margin-top:420px;
	 
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
<form method="post" action="facture_fiche_auto.php?id=<?php echo  $_GET['id'];?>&imprime=ok">
  <input id="impression" name="impression" type="submit"  value="Imprimer" />
</form> <?php }?>


  <input onclick="javascript:window.close();" id="impression" name="impression" type="button"  value="Fermer" />
</div>
	
	  
	  
       
        
    </div>
    
    <br />
<center>

    <div class="tableau" id="tableaux">
   <?php   echo nom_att('facture','demmande_hotel','id_commande',$r['id_commande']);?>
	
	
</div>


<br/><div class="footer"  >



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
<style>
.tableau{ width:100%; border:1px solid #868686; border-collapse:collapse; color:#000; background-color:#fff;}
.tableau td {border:1px solid #868686; padding:5px;}
.tableau tr.toptable  {  border:1px solid #fff; height:70px !important; max-height:70px !important; }
.tableau tr.toptable1 td {   height:30px !important;}
.tableau table.toptableprix tr td {   height:30px !important;}
.tableau table.toptableprix  {   height:150px !important;}
</style>
</style>
</html>