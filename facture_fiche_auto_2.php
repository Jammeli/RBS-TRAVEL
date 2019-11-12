
<?php
 $q=mysql_query("select * from facture where numfact='".$_GET['id']."'"); 
 $r=mysql_fetch_array($q);
?>


 

<div  class="page">


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

</div>

