
	

<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]--><head>
    <!-- Page Title -->
    <title>RBS TRAVEL</title>
 
<?php include("connexion.php");?>
<?php vu_notification($_GET['id'],'billetterie');?>
                                <?php
                 $result = mysql_query("SELECT * FROM `demande_billetterie`  where id='".$_GET['id']."' ") or die(mysql_error());                
				 
				  $result2 = mysql_query("SELECT * FROM `contenu_billeterie`  where id_demande='".$_GET['id']."' and type='adulte' ") or die(mysql_error());
				  $result3 = mysql_query("SELECT * FROM `contenu_billeterie`  where id_demande='".$_GET['id']."' and type='enfant' ") or die(mysql_error());
   				$resulta = mysql_fetch_array($result);
   				
   			
      	 $resultcl = mysql_query("SELECT * FROM `clients`  where mail='".$resulta['client']."' ") or die(mysql_error());		  
   				$resultacl = mysql_fetch_array($resultcl);
				  
				   ?>
  
	<?php if(isset($_POST['valider'])){
		
 mysql_query("update  `demande_billetterie`SET etat='".$_POST['etat']."'  where  id='".$_GET['id']."' ") or die(mysql_error());
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
 <form method="post"> 
    <select name="etat">
    <option  <?php if( $resulta['etat']==0){ echo "selected ";}?> value="0">En attente</option>
    <option  <?php if( $resulta['etat']==1){ echo "selected ";}?>  value="1">Pay&eacute;</option>
    <option  <?php if( $resulta['etat']==2){ echo "selected ";}?>  value="2">Annul&eacute;e</option>
</select>
<input type="submit" name="valider">
     </form>   
        
            <div class="container">
                <div class="row">
                    <div id="main" >
                        <div class="booking-section travelo-box">
     
                 
                 <input type="hidden" name="id_user" value=""> 
                 
                 
                 <div class="person-information">
                                
                         
                                    <h2>Informations sur la demande de Billet</h2>
           
           <h3>Contact</h3>
           <table>
           <tr><td>Nom</td><td><?php echo $resultacl['nom'];?> </td></tr>
           <tr><td>Prenom</td><td><?php echo $resultacl['prenom'];?> </td></tr>
           <tr><td>Email</td><td><?php echo $resultacl['mail'];?> </td></tr>
           <tr><td>Tel</td><td><?php echo $resultacl['tel'];?> </td></tr>
                                    
           <table>
                     
                     <tr><td>Billet - <?php echo $resulta['mode'];?></td>                  
                    <tr><td><label>D&eacute;part :</label></td><td>
					
					de <strong><?php echo $resulta ['depart'];?> </strong>
					&agrave;  <strong><?php echo $resulta ['destination'];?></strong> 
					Le <strong><?php echo $resulta ['datedepart'];?></strong>
					<strong> <?php echo $resulta ['modealler'];?> </strong>
                    
                    </td></tr>
                    <?php if($resulta ['mode']=="Aller et retour"){?>
                    <tr><td><label>Retour :</label></td><td>
					
					de <strong><?php echo $resulta ['destination'];?> </strong>
                   &agrave;<strong> <?php echo $resulta ['depart'];?> </strong>
					Le <strong><?php echo $resulta ['dateretour'];?></strong>
					 <strong><?php echo $resulta ['moderetour'];?> </strong>
                    
                    </td></tr>
                    
                    <?php }?>
                    
					<tr><td>Nombre d'adultes:<?php echo $resulta ['adulte'];?></td></tr>
					<tr><td>Nombre d'enfants<?php echo $resulta ['enfant'];?></td></tr>
                                    
                                          
                                  
                                 
                                       
                               
                                </table>                         
                                    
                                    
                  </div>               
                                <div class="person-information">
                                
                         
                                    <h2>Informations personnels</h2>
                                    

                             <table>
                                         <?php 
										 if(mysql_num_rows($result2)!=0){
					 ?><tr><td colspan="3"><h2> Liste des Adultes</h2></td></tr>
                    <tr><td><label>Nom & prenom </label></td><td><label>Date de naissance</label></td><td><label>Num Passeport</label></td></tr>
					 
					 <?php
										 while($resulta2 = mysql_fetch_array($result2)){?>
                                    
                                          <tr>
                                          <td>
                                            <input type="text" class="input-text full-width" value="<?php echo $resulta2 ['nomprenom'];?>" placeholder="" disabled/></td><td>
                                            <input type="text" class="input-text full-width" value="<?php echo $resulta2 ['date_naissance'];?>" placeholder="" disabled/></td>
                                    
                                        
                                        
                                          <td> 
                                            <input type="text" class="input-text full-width" value="<?php echo $resulta2 ['passeport'];?>" placeholder="" disabled/></td></tr>
                                  
                                 
                                       
                                <?php }
										 }
								?>
                                </table>
                                
                               <hr />  
                           
                           
                            <table>
                            
                                         <?php 
										 if(mysql_num_rows($result3)!=0){
											 
					 ?><tr><td colspan="3"> <h2>Liste des enfants</h2></td></tr>
                    <tr><td><label>Nom & prenom </label></td><td><label>Date de naissance</label></td><td><label>Num Passeport</label></td></tr>
					 
					 <?php
										 while($resulta3 = mysql_fetch_array($result3)){?>
                                    
                                 <tr><td>
                                            <input type="text" class="input-text full-width" value="<?php echo $resulta3 ['nomprenom'];?>" placeholder="" disabled/></td><td>
                                            <input type="text" class="input-text full-width" value="<?php echo $resulta3 ['date_naissance'];?>" placeholder="" disabled/></td>
                                    
                                        
                                        
                                          <td>
                                            <input type="text" class="input-text full-width" value="<?php echo $resulta3 ['passeport'];?>" placeholder="" disabled/></td></tr>
                                  
                                 
                                       
                                <?php }
										 }
								?>
                                </table>
                                   </div>
                                
                                </div>
                                <hr />
                           
                            
                            
                            
                   
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

