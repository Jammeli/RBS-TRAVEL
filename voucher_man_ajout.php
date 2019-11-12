<?php 
 if (isset($_GET['id']))
 {$q=mysql_query("select * from voucher_man where id='".$_GET['id']."'"); 
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
	 text-align:;
	
 }
 .page .cadre .date{
	
	 width:100%;
	 text-align:;
	 height:30px;
 }
 .page .tableau {
	 margin-left:auto;
	 margin-right:auto;
	 width:100%;
	 margin-top:200px;
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
 input , textarea{ font-weight:bold; color:rgb(231, 73, 85) !important;}
</style>


	

<form method="post" action="voucher_action.php">
<div class="imprimer">
  <input name="Enregistrer" type="submit"  value="Enregistrer" />
</div>

<div class="page"> 







    <div class="cadre">   
	
	<div class="date">
       <h3> Monastir le  <input type="hidden" name="date" value="<?php if(isset($_GET['id'])) echo $r['date'];else {$da=date("Y-m-d"); echo $da; } ?>"  />
         <?php if(isset($_GET['id'])) echo $r['date'];else {$da=date("Y-m-d"); echo $da; } ?><br />
        <input type="hidden" name="heure" value="<?php if(isset($_GET['id'])) echo $r['heure'];else {$da= date("H:i:s"); 
		echo $da; } ?>"  /> </h3>
       
        </div>                          
    	
        <table style="width:80%;" >
		<tr>
			<td><div class="logo" ><img src="img/logo_color.png" width="250"/></div></td>
			<td style="text-align:right; float:right; width:70%;">
            <h1>Voucher N&ordm;: (auto)
	  
	  
	  
	  
	  
	  </h1>
   </td>
		</tr>
	</table>
	
	
        <div class="client">
		<table>
		<tr><td><strong>H&ocirc;tel:</strong></td><td  colspan="3"><input type="text" name="hotel" value="<?php if (isset($_GET['id']))echo $r['hotel'] ;else echo ""; ?>"  /></td></tr>
		<tr><td><strong>NIGHTS:</strong></td><td  colspan="3"><input type="text" name="nuit" value="<?php if (isset($_GET['id']))echo $r['nom'] ;else echo ""; ?>"  /></td></tr>
		<td><strong>CHECK IN:</strong></td><td><input type="date" name="checkin" value=""  /></td>
		<td><strong>CHECK OUT:</strong></td><td><input type="date" name="checkout" value=""  /></td></tr>
		<tr><td colspan="4"><strong>Accommodation Detail:</strong></td></tr>
		<tr><td colspan="4"><textarea name="accomm"></textarea></td></tr>

  </table>
      
 

      </div>
   
        
        
        
    </div>
    
 
<center>

    <div class="tableau">
	
	
	
	
    <table id="tableau">
    <tr id="top">
	<td style="width:500px;">GUEST</td>
	<td style="width:12%;">ROOM TYPE</td>
	<td style="width:12%;">ADULTS</td>
	<td style="width:12%;">CHILDRENS</td>

	<td style="width:12%;">BOARD</td>
	
	</tr>
  
 
   
	
	    <?php $ligne=""; if (isset($_GET['id']))
	{
	
	$ligne='';
	 $a=mysql_query("select * from voucher_man_contenu where numvoucher='".$_GET['id']."'") or die(mysql_error());
	$id=0;
	
	
	
		while($res=mysql_fetch_array($a))
{ 
$idnv=$id+1;

	$ligne.='<tr id="col'.$id.'" class="col1"><td><textarea  style="width:80% !important;"  name="personne'.$id.'"  id="personne'.$id.'" >'.$res['personne'].'</textarea></td><td><input  style="width:80% !important;"  type="text" name="type'.$id.'" id="type'.$id.'"  value="'.$res['type'].'"/></td><td><input  style="width:80% !important;"  type="text" name="adulte'.$id.'" id="adulte'.$id.'" value="'.$res['adulte'].'"/></td><td><input style="width:80% !important;" type="text" name="enfant'.$id.'" id="enfant'.$id.'"  value="'.$res['enfant'].'"/></td><td><input  style="width:80% !important;"  type="text"  name="board'.$id.'" id="board'.$id.'" value="'.$res['board'].'"/></td><td><a onClick="supp_tr('.$id.')">X</a></td></tr>' ;
$id++ ; 

    /*<tr id="col1"><td> <?php echo $res['qte']; ?> </td><td><?php echo $res['designation']; ?></td><td><?php echo $res['pu']; ?></td><td><?php echo $res['pu']*$res['qte'];$t+=($res['pu']*$res['qte']);?></td></tr>*/
    } 
	
$idnv=$id+1;

		$ligne.='<tr id="col'.$id.'" class="col1"><td><textarea  style="width:80% !important;"  name="personne'.$id.'" type="text" id="personne'.$id.'"></textarea></td><td><input  style="width:80% !important;"  type="text" name="type'.$id.'" id="type'.$id.'"   /></td><td><input  style="width:80% !important;"  type="text" name="adulte'.$id.'" id="adulte'.$id.'"   /></td><td><input style="width:80% !important;" type="text" name="enfant'.$id.'" id="enfant'.$id.'"  /></td><td><input  style="width:80% !important;"  type="text"  name="board'.$id.'" id="board'.$id.'" /></td><td></td></tr>' ;
$id++ ; 


	}else {$ligne='<tr id="col0" class="col1"><td><textarea  style="width:80% !important;"  name="personne0"  id="personne0" ></textarea></td><td><input  style="width:80% !important;"  type="text" name="type0" id="type0"  value=""/></td><td><input  style="width:80% !important;"  type="text" name="adulte0" id="adulte0" value=""/></td><td><input style="width:80% !important;" type="text" name="enfant0" id="enfant0"  value=""/></td><td><input  style="width:80% !important;"  type="text"  name="board0" id="board0" value=""/></td></tr>' ;}
	
	
	echo $ligne ; ?>

    <tr><td></td><td></td><td></td><td></td><td></td><td><input type="button" onclick="afficheligne()"  value="+" /></td></tr>
    
    </table>
</div>

<input type="hidden" id="nbreligne"  name="nbreligne" value="<?php if (isset($_GET['id'])) echo mysql_num_rows($a); else echo 1;?>" />


<div class="footer">


</div>
</center>

</div>
</form>

  
    