
	

<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]--><head>
    <!-- Page Title -->
    <title>RBS TRAVEL</title>
 
<?php include("connexion.php");?>
<?php vu_notification($_GET['id'],$_GET['page']);?>
                                <?php
                 $result = mysql_query("SELECT * FROM `demmande_cruise`  where page='".$_GET['page']."' and id_commande='".$_GET['id']."' ") or die(mysql_error());
   				$resulta = mysql_fetch_array($result);
   			
      			  
				 
				  
				   ?>
  
	<?php if(isset($_POST['valider'])){
		
 mysql_query("update  `demmande_cruise`SET etat='".$_POST['etat']."'  where page='".$_GET['page']."' and id_commande='".$_GET['id']."' ") or die(mysql_error());
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
                 
                 <input type="hidden" name="id_user" value="">                
                                <div class="person-information">
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
                           
                            
                            <div class="booking-details travelo-box">
                            
												
                <?php  echo mb_convert_encoding($resulta['facture'], "UTF-8" ,"HTML-ENTITIES");
						
						
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

