
	

<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]--><head>
    <!-- Page Title -->
    <title>RBS TRAVEL</title>
 
<?php include("connexion.php");?>
<?php vu_notification($_GET['id'],'hotel');?>
                                <?php
                 $result = mysql_query("SELECT * FROM `demmande_hotel`  where id_commande='".$_GET['id']."' ") or die(mysql_error());                
				 
				$resulta=mysql_fetch_array($result);
   				
   			
      			  
				 
				  
				   ?>
  
	<?php if(isset($_POST['valider'])){
		
 mysql_query("update  `demmande_hotel`SET etat='".$_POST['etat']."'  where  id_commande='".$_GET['id']."' ") or die(mysql_error());
 
 
 
  if($_POST['etat']==1){
	  
	  $nom=mysql_real_escape_string($_POST['nom']);
	  $tel=mysql_real_escape_string($_POST['tel']);
	  $prenom=mysql_real_escape_string($_POST['prenom']);
	  $mail=mysql_real_escape_string($_POST['mail']);
 	  $numvoucher=numero('voucher_man');
	  $dated=explode("-", nom_att('datedebut','demmande_hotel','id_commande',$_GET['id']));
	  $datef=explode("-", nom_att('datefin','demmande_hotel','id_commande',$_GET['id']));
	  
	  $dated=$dated[2].'-'.$dated[1].'-'.$dated[0];
	  $datef=$datef[2].'-'.$datef[1].'-'.$datef[0];
	  
	  $total=nom_att('total','demmande_hotel','id_commande',$_GET['id']);
	  $total=sprintf('%.03F',($total+0.5));
	  $nbjours=nom_att('nbjours','demmande_hotel','id_commande',$_GET['id']);
	  $hotel=nom_att('nom','hotel','id_hotel',nom_att('id_hotel','demmande_hotel','id_commande',$_GET['id']));
	  $dateresa=date("Y-m-d");
	  $hresa=date("H:i:s");
	  
	  mysql_query("update  `demmande_hotel` SET numvoucher='".$numvoucher."'  where  id_commande='".$_GET['id']."' ") or die(mysql_error());
	  mysql_query("insert into  voucher_man(`id`, `date`, `heure`, `checkin`, `checkout`, `nuit`, `hotel`, `accomm`, `type`)
	  VALUES ('".$numvoucher."','".$dateresa."','".$hresa."','".$dated."','".$datef."','".$nbjours."','".$hotel."','','auto')
	  
	  
	   ") or die(mysql_error());
	  mysql_query("insert into  facture(`id`, `numfact`, `date`, `heure`, `nom`, `prenom`, `cin`, `tel`, `email`, `prixtot`, `etat`, `id_commande`, `source`)
	  VALUES ('','$numvoucher','".$dateresa."','".$hresa."','$nom','$prenom','0','$tel','$mail','$total','0','".$_GET['id']."','auto')
	  
	  
	   ") or die(mysql_error());
	 
	 	$mail=$resulta['id_client'];
		$from='contact@rbstravel.com.tn';
		$subject = "Voucher RBS Travel";
		$codeuniquepdfvoucher='1111';
						
						  $message = '
  
       <p>Suite &agrave; votre demande de réservation, veuillez consulter votre compte pour visualiser votre voucher.</p>
	   <p>Cordialement l\'&eacute;quipe de RBS Travel</p>
	   <p>www.rbstravel.com.tn</p>

     
     ';
			 $headers = 'From: RBS Travel<'.$from.'>' . "\r\n" .
                    'Reply-To:'.$from. "\r\nContent-Type: text/html; charset=\"iso-8859-1\"\r\n"."X-Mailer: PHP/" . phpversion();
					
							
						$additionalparam = "-t " . $from;
						
						
								mail($mail, $subject, $message, $headers, $additionalparam);
	 
	 }
?>



<script xfor=window xevent=OnLoad> 
var indexWin=window.opener ;
indexWin.location=indexWin.location ;
window.close() ;
</script>

<?php
		
	}
		?>	

    <!-- Meta Tags -->
                   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<style>
.panier{ border:1px solid rgba(0,0,0,1); border-collapse:collapse; width:100%;}
.panier  td{ border:1px solid rgba(0,0,0,1);}

</style>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="RBS TRAVEL - Agence de voyage">
    <meta name="author" content="THINK CREATIVE">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Theme Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/animate.min.css">
    
    <!-- Current Page Styles -->
    <link rel="stylesheet" type="text/css" href="../components/revolution_slider/css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../components/revolution_slider/css/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../components/jquery.bxslider/jquery.bxslider.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../components/flexslider/flexslider.css" media="screen" />
    
    <!-- Main Style -->
    <link id="main-style" rel="stylesheet" href="../css/style.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../css/custom.css">

    <!-- Updated Styles -->
    <link rel="stylesheet" href="../css/updates.css">
    
    <!-- Responsive Styles -->
    <link rel="stylesheet" href="../css/responsive.css">
    
    <!-- CSS for IE -->
    <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
    <![endif]-->
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
    
    
    <style>
	  .selectorx select {
       width:200px;
	   }
	</style>
</head>
<body>      
              <?php
		
		$sql_user=mysql_query("select * from clients where mail='".$resulta['id_client']."'");
		$resuser=mysql_fetch_array($sql_user);
		if(mysql_num_rows($sql_user)==1) {
			$nom=$resuser['nom'];
			$prenom=$resuser['prenom'];
			$tel=$resuser['tel'];
			$mail=$resuser['mail'];

		
		
		}else{
			
			$nom="";
			$prenom="";
			$tel="";
			$mail="";
			}
		         ?>
 <form method="post"> 
    <select name="etat">
    <option  <?php if( $resulta['etat']==0){ echo "selected ";}?> value="0">En attente</option>
    <option  <?php if( $resulta['etat']==1){ echo "selected ";}?>  value="1">Pay&eacute;</option>
    <option  <?php if( $resulta['etat']==2){ echo "selected ";}?>  value="2">Annul&eacute;e</option>
</select>


<input type="hidden" name="nom" value="<?php echo $nom;?>" />
<input type="hidden" name="prenom" value="<?php echo $prenom;?>"  />
<input type="hidden" name="mail" value="<?php echo $mail;?>"   />
<input type="hidden" name="tel" value="<?php echo $tel;?>"  />
<input type="submit" name="valider">
     </form>   
        
            <div class="container">
                <div class="row">
                    <div id="main" >
                        <div class="booking-section travelo-box">
     
                 
                 <input type="hidden" name="id_user" value=""> 

                 
                     <input type="hidden" name="id_user" value="">                
                                <div class="person-information">
                                    <h2>H&ocirc;tel: <?php
									
									$id_hotel=$resulta['id_hotel'];
									 $sqlnom=mysql_query("select nom from hotel where id_hotel='".$id_hotel."'");
									$renomhotel=mysql_fetch_row($sqlnom);
									echo $renomhotel[0];
									
									
									?></h2>
                                    <h2>Informations personnel</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Nom</label>
                                            <input type="text" class="input-text full-width" value="<?php echo $nom;?>" placeholder="" disabled/>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Prenom</label>
                                            <input type="text" class="input-text full-width" value="<?php echo $prenom;?>" placeholder="" disabled/>
                                        </div>
                                    </div>
                                       <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Email</label>
                                            <input type="text" class="input-text full-width" value="<?php echo $mail;?>" placeholder=""  disabled/>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Tel</label>
                                            <input type="text" class="input-text full-width" value="<?php echo $tel;?>" placeholder="" disabled/>
                                        </div>
                                    </div>
                                
                                </div>
                                <hr />
                   
                    <div class="person-information">
                                    <h2>Informations sur la demande</h2>      
                <table>
                        <tr><td>TOTAL &agrave; payer:</td> <td><?php echo $resulta['total'];?> </td></tr>
                          <tr><td>Date d'entr&eacute;e</td> <td><?php echo $resulta['datedebut'];?> </td></tr>
                           <tr><td>Date de sortie</td><td><?php echo $resulta['datefin'];?></td></tr>
                            <tr><td>Commande effectu&eacute; Le :</td><td><?php echo $resulta['datedemmande'];?> &agrave; <?php echo $resulta['heuredemmande'];?></td></tr>
                            </table>
                            </div>
                            
                             
                            <div class="booking-details travelo-box">
                            
							<div class="person-information">
                                    <h2>Informations sur les chambres</h2>					
                <?php  echo html_entity_decode($resulta['facture_affiche']);
						
						
                            ;?>
                            
                            
                   
                        </div>
                    </div>
       
        
                    
                    
                </div>
                </div>
            </div>

     
        
    

    <!-- Javascript -->
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.noconflict.js"></script>
    <script type="text/javascript" src="../js/modernizr.2.7.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.1.10.4.min.js"></script>
    
    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    
    <!-- load revolution slider scripts -->
    <script type="text/javascript" src="../components/revolution_slider/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="../components/revolution_slider/js/jquery.themepunch.revolution.min.js"></script>
    
    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="../components/jquery.bxslider/jquery.bxslider.min.js"></script>
    
    <!-- load FlexSlider scripts -->
    <script type="text/javascript" src="../components/flexslider/jquery.flexslider-min.js"></script>
    
    <!-- Google Map Api -->
    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    
    <script type="text/javascript" src="../js/calendar.js"></script>
    
    <!-- parallax -->
    <script type="text/javascript" src="../js/jquery.stellar.min.js"></script>
    
    <!-- waypoint -->
    <script type="text/javascript" src="../js/waypoints.min.js"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="../js/theme-scripts.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
    
    <script type="text/javascript">
    
    </script>
</body>
</html>

