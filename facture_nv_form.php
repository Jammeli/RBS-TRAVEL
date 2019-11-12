<?php 
 if (isset($_GET['id']))
 {$q=mysql_query("select * from facture where numfact='".$_GET['id']."'"); 
 $r=mysql_fetch_array($q);

 }
  ?>

<style>
.page{padding-top:50px;

 width: 80%;
 border:1px solid #000 ;
 }
 .page .cadre{
	 
	 width:100%;
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
	 width:100%;
	 margin-top:100px;
border:1px solid #000000;
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
}
.page .tableau table tr#col1 td, .page .tableau table tr#top td {
	
	height:30px !important;
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
	 width:100%;
	 
border:1px solid #000000; height:200px;
	 }
	 
	 .page #table  {
	 width:100% !important;
	 
	 }
	 	 
	 .page .tableau table tr#top td {
		 margin-left:auto;
	 margin-right:auto;
	
	 
border:1px solid #000000; height:80px; }
.page .footer table { border-collapse:collapse; border:1px #000000 solid; width:99%;  }
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
	top:215px;
	left:200px;}
	
	
	.mat {
    -ms-transform: rotate(90deg); /* IE 9 */
    -webkit-transform: rotate(90deg); /* Safari */
    transform: rotate(90deg);
	position:absolute; margin-left:670px; margin-top:700px; font-size:18px; width:800px; font-weight:bold; word-spacing:3px;
}
table *{ font-family:"Caviar Dreams"; font-family:}
.page h1, .mat { font-family: Impact;}
.page h1  { font-size:18px;}
 .footer table tr td, #prixlettre{ font-weight:bold;}
</style>


	

<form method="post" action="facture_action.php">
<div class="imprimer">
  <input name="Enregistrer" type="submit"  value="Enregistrer" />
</div>
<input type="hidden" name="nbreligne" id="nbreligne" value="1" />

<div class="page"> 







    <div class="cadre">   
	
	<div class="date">
       <h3> Monastir le 
         <?php echo date("H:i:s");?> </h3>
       
        </div>                          
    	
        <table style="width:80%;" >
		<tr>
			<td><div class="logo" ><img src="../assets/images/logo/logo_color.png" width="250"/></div></td>
			<td style="text-align:right; float:right; width:70%;">
            <h1>Facture N&ordm;: ( auto )
	  
	  
	  
	  
	  
	  </h1>
   </td>
		</tr>
	</table>
	
	
        <div class="client">
        	Nom:&nbsp;/ Societ&eacute;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nom" value="<?php if (isset($_GET['id']))echo $r['nom'] ;else echo ""; ?>"  /> 
            Pr&eacute;nom /MF:<input type="text" name="prenom" value="<?php if(isset($_GET['id'])) echo $r['prenom'];else echo"" ;?>"  /> <br />
            Adresse :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="adresse" value="<?php if(isset($_GET['id'])) echo $r['tel'];else echo""; ?>"  />
      </div>
   
        
        
        
    </div>
    
 
<center>

    <div class="tableau">
	
	
	
	
    <table id="tableau">
    <tr id="top">
	<td style="width:500px;">Noms des Client</td>
	<td style="width:10%;">Arrangement</td>
	<td style="width:10%;">Prix unitaire</td>
	<td style="width:10%;">Pax</td>
	<td style="width:10%;">Jours</td>

	<td colspan="2" style="width:10%;">Montant</td>
	
	</tr>
  
 
    <?php $ligne=""; if (isset($_GET['id']))
	{ $a=mysql_query("select * from facture_contenu where numfact='".$_GET['id']."'");
	$id=0;
	
	
	
		while($res=mysql_fetch_array($a))
{ 
$idnv=$id+1;
$x1="qte".$id;
$x2="designation".$id;
$x3="pu".$id;
$x4="arrangement".$id;
$x5="pax".$id;
	$ligne.='<tr id="col'.$id.'" class="col1"><td><textarea  style="width:80%" name="designation'.$id.'" id="designation'.$id.'"  >'.$res['clients'].'</textarea></td><td><input  style="width:80%" type="text" name="arrangement'.$id.'" id="arrangement'.$id.'" value="'.$res['arrangement'].'"   /></td><td><input  style="width:80%" type="text" onkeyup="calcul_ligne('.$id.');" name="pu'.$id.'" id="pu'.$id.'"  value="'.$res['pu'].'"   /></td><td><input  style="width:80%" type="text" name="pax'.$id.'" id="pax'.$id.'"  onkeyup="calcul_ligne('.$id.');" value="'.$res['pax'].'"   /></td> <td><input  style="width:80%" type="text" name="qte'.$id.'" id="qte'.$id.'"  onkeyup="calcul_ligne('.$id.');"   value="'.$res['qte'].'" /></td><td><input  style="width:80%" type="text" disabled name="montant'.$id.'" id="montant'.$id.'" value="0"/><input  style="width:80%" type="hidden" /></td><td><a onClick="supp_tr('.$id.')">X</a></td></tr>';
$id++ ; 

    /*<tr id="col1"><td> <?php echo $res['qte']; ?> </td><td><?php echo $res['designation']; ?></td><td><?php echo $res['pu']; ?></td><td><?php echo $res['pu']*$res['qte'];$t+=($res['pu']*$res['qte']);?></td></tr>*/
    } 
	



	}else {$ligne='<tr id="col0" class="col1"> <td><textarea  style="width:80% !important;"  name="designation0" id="designation0" ></textarea></td><td><input  style="width:80% !important;"  type="text" name="arrangement0" id="arrangement0"  value=""/></td><td><input  style="width:80% !important;"  type="text" name="pu0" id="pu0" onkeyup="calcul_ligne(0);"  value="0"/></td><td><input   onkeyup="calcul_ligne(0);" style="width:80% !important;"  type="text" name="pax0" id="pax0"   value="1"/></td><td><input style="width:80% !important;" type="text" name="qte0" id="qte0"  onkeyup="calcul_ligne(0);"  value="1"/></td><td><input  style="width:80% !important;"  type="text" disabled name="montant0" id="montant0" value="0"/><input type="hidden"  /></td></tr>' ;}echo $ligne ; ?>
    <tr><td></td><td></td><td></td><td></td><td></td><td><input type="button" onclick="javascript:afficheligne();" value="+" /></td></tr>
    
    </table>
</div>




<div class="footer">
<table  >
<tr><td>prix ht</td><td id="td2"><div id="sommet"><br /></div></td></tr>
<tr><td>FDCST(1%)</td><td><div id="FDCST"><br /></div></td></tr>
<tr><td>TVA=6%</td><td><div id="tva"><br /></div></td></tr>
<tr><td>timbre fiscale</td><td>0.500</td></tr>
<tr><td>net à payer</td><td><div id="tot"><br /></div></td></tr>
<tr><td colspan="2" style="height:55px;"><div id="">Arr&eacute;t&eacute;e la pr&eacute;sente facture à la somme de:<font id="prixlettre"></font> </div></td></td></tr>
<input type="hidden" name="st" value="" id="st"/><input type="hidden" name="total" value="" id="total"/>
</table>

</div>
</center>

</div>
</form>

  
    