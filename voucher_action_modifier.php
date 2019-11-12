<?php
include('connexion.php');
	mysql_query("delete from `voucher_man`  where id='".$_GET['id']."'");
	mysql_query("delete from `voucher_man_contenu`  where numvoucher='".$_GET['id']."'");
	
$date=date("Y-m-d");
$heure=date("H:i:s");
$checkin=$_REQUEST['checkin'];
$checkout=$_REQUEST['checkout'];
$nuit=$_REQUEST['nuit'];
$accomm=mysql_real_escape_string($_REQUEST['accomm']);
$hotel=mysql_real_escape_string($_REQUEST['hotel']);

$nbligne=$_REQUEST['nbreligne'];



$numnv=$_GET['id'];


	
			mysql_query("INSERT INTO  `voucher_man` (

`id` ,
`date` ,
`heure` ,
`checkin` ,
`checkout` ,
`nuit`, 
`hotel`, 
`accomm`,`type`
)
VALUES ('".$numnv."',
'".$date."',  '".$heure."',  '".$checkin."',  '".$checkout."',  '".$nuit."', '".$hotel."',  '".$accomm."','man')") or die(mysql_error());


 			for($i=0;$i<$nbligne;$i++)
			{ 
			
			$personne=mysql_real_escape_string($_REQUEST['personne'.$i]);
			$type=mysql_real_escape_string($_REQUEST['type'.$i]);
			$nuit=0;//mysql_real_escape_string($_REQUEST['nuit'.$i]);
			$adulte=mysql_real_escape_string($_REQUEST['adulte'.$i]);
			$enfant=mysql_real_escape_string($_REQUEST['enfant'.$i]);
			$board=mysql_real_escape_string($_REQUEST['board'.$i]);

			mysql_query("INSERT INTO  `voucher_man_contenu` (

`id` ,
`numvoucher` ,
`personne` ,
`type` ,
`nuit` ,
`adulte` ,
`enfant` ,
`board`
)
VALUES (
'',  '".$numnv."',  '".$personne."',  '".$type."',  '".$nuit."',  '".$adulte."',  '".$enfant."',  '".$board."'
)") or die(mysql_error()); 
			
				

			
			
			}
?>
<script type="text/javascript" language="Javascript">window.open('<?php echo 'voucher_man_fiche.php?id='.$numnv;?>');</script>
<script type="text/javascript" language="Javascript">document.location.href='voucher.php';</script>
<?php 	
	
?>
