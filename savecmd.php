                           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

include("connexion.php");



$_SESSION['affiche_nb_jour_promo']=0;


			$page="hotel";
			$id_client =$_SESSION['mail_connect'];    
			   $s=explode("/",$_POST['checkin']); $checkin=$s[2].'-'.$s[1].'-'.$s[0];
			   $s=explode("/",$_POST['checkout']); $checkout=$s[2].'-'.$s[1].'-'.$s[0];
			
			
            $id_client =$_SESSION['mail_connect'];       
            $id_hotel= $_POST['id_hotel'];       
            $total= $_POST['total'];       
            $message= $_POST['message'];       
            $voucher_affiche= $_POST['voucher_affiche'];       
            $facture= $_POST['facture'];       
            $nbre_nuit= $_POST['nbre_nuit'];       
            $datedemmande =date("Y-m-d");
            $heuredemmande =date("H:i:s");
			
	     
mysql_query("INSERT INTO `demmande_hotel` (`id_commande`, `id_client`, `id_hotel`, `datedebut`, `datefin`, `datedemmande`, `heuredemmande`, `nbjours`, `total`, `facture_affiche`, `etat`, `voucher_affiche`, `facture`) 
			 VALUES ('', '$id_client', '$id_hotel', '$checkin', '$checkout', '$datedemmande', '$heuredemmande', '$nbre_nuit', '$total', '$message', '0', '$voucher_affiche', '$facture');" )or die(mysql_error());
			 
$id_commande=mysql_insert_id();
notification($id_commande,'hotel','attente','r&eacute;servation en attente .', $_SESSION['mail_connect']);


  
       
	

     
     


		$mail=$_SESSION['mail_connect'];
		$from='contact@rbstravel.com.tn';
		$subject = "Reservation en cour de traitement";
		
		
		$messagex = ' <p><strong>Détails de la réservation:</strong></p>
	   <p>Date de réservation: '.$datedemmande.' '.$heuredemmande.' </p>
	   <p>Hôtel: '.nom_att('nom','hotel','id_hotel',$id_hotel).'</p>
	   <p>Checkin: '.$checkin.'</p>
	   <p>Checkout: '.$checkout.'</p>
	   <p>Nombre de nuitées: '.$nbre_nuit.'</p>
	   <p>Total: '.$total.'dt</p>
	   <p>Cordialement L\'équipe RBS TRAVEL </p> 
	   <p>Pour plus d\'infos:</p> 
	   <p><strong>Tel 1 : </strong>'.str_replace("-"," ", nom_att('tel','parametres_g','id',1)).'</p> 
	   <p><strong>Tel 2 : </strong>'.str_replace("-"," ", nom_att('tel2','parametres_g','id',1)).' </p> 
	   <p><strong>Tel 3 : </strong> '.str_replace("-"," ", nom_att('tel3','parametres_g','id',1)).'</p> 
	   <p><strong>Fax : </strong>'.str_replace("-"," ", nom_att('fax','parametres_g','id',1)).' </p> 
	   <p><strong>Email : </strong>'. nom_att('email','parametres_g','id',1).'</p> 
	   
	  
	   
	    ';	
	   
	   			
	 $headers = 'From: RBS TRAVEL <'.$from.'>' . "\r\n" .
                    'Reply-To:'.$from. "\r\nContent-Type: text/html; charset=\"iso-8859-1\"\r\n"."X-Mailer: PHP/" . phpversion();
					
							
						$additionalparam = "-t " . $from;
						
						
								mail($mail, $subject, $messagex, $headers, $additionalparam);
 

	
	
				



?>
<script>
document.location.href='demande_<?php echo $page;?>_reussite.html';

</script>

<?php ?>

