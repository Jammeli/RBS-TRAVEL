
	

<!DOCTYPE html>
<!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
<!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->  <html> <!--<![endif]--><head>
    <!-- Page Title -->
    <title>RBS TRAVEL</title>
 
<?php include("connexion.php");?>
<?php vu_notification($_GET['id'],'mice');?>
                                <?php
                 $result = mysql_query("SELECT * FROM `demande_congre`  where id='".$_GET['id']."' ") or die(mysql_error());                
				 
				$resulta=mysql_fetch_array($result);
   				
   			
      			  
				 
				  
				   ?>
  
	<?php if(isset($_POST['valider'])){
		
 mysql_query("update  `demande_congre` SET lu='".$_POST['etat']."'  where  id='".$_GET['id']."' ") or die(mysql_error());
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
    <option  <?php if( $resulta['lu']==0){ echo "selected ";}?> value="0">En attente</option>
    <option  <?php if( $resulta['lu']==1){ echo "selected ";}?>  value="1">Pay&eacute;</option>
    <option  <?php if( $resulta['lu']==2){ echo "selected ";}?>  value="2">Annul&eacute;e</option>
</select>
<input type="submit" name="valider">
     </form>   
        
            <div class="container">
                <div class="row">
                    <div id="main" >
                        <div class="booking-section travelo-box">
     
                 
                 <input type="hidden" name="id_user" value=""> 
        
                 
                                
                                <hr />
                   
               <div class="person-information">
             
        
<legend>Coordonn&eacute;es de contact</legend>
<table width="100%">
  <tr>
    <td>Nom & prenom</td>
    <td><?php echo $resulta['nom'];?> <?php echo $resulta['prenom'];?></td>
   </tr>
  <tr>
    <td>E-mail:</td>
    <td><?php echo $resulta['email'];?></td>
   </tr>

  <tr>
    <td>T&eacute;l.:</td>
    <td><?php echo $resulta['tel'];?></td>
   </tr>

  <tr>
    <td>Adresse:</td>
    <td><?php echo $resulta['adresse'];?></td>
   </tr>
   
   
  <tr>
    <td>Pays::</td>
    <td><?php echo $resulta['pays'];?></td>
   </tr> 
</table>
 
<legend>Demande Congres</legend>

<br>
<br>

<label  >Pr&eacute;sentation de l&rsquo;op&eacute;ration :</label>

<table >
  <tr>
    <td ><label>Nom de l&rsquo;op&eacute;ration </label></td>
    <td colspan="2"><?php echo $resulta['nomop'];?></td>
  </tr>
  <tr><td valign="top"><label >Organisateur </label></td>
	    <td colspan="2" class="row"><?php echo $resulta['nomorg'];?></td>
  </tr>
    <tr><td valign="top"><label >Local </label></td>
	    <td colspan="2" class="row"><?php echo $resulta['local'];?></td>
  </tr>
  
  
 
  </table>
  <br>

<label >Transport : Agence de voyages charg&eacute;e des transferts : RBS TRAVEL </label>
  <table width="100%" >
  <tr>
    <td ><label for="label" class="preFieldinscrit">Compagnie a&eacute;rienne :</label></td>
    <td colspan="2"><?php echo $resulta['compagine'];?></td>
    </tr>

  <tr>
    <td valign="top"><label>N&deg; de vol :</label>    </td>
    <td colspan="2" class="row"><?php echo $resulta['vol'];?></td>
  </tr>
  
  <tr>
    <td valign="top"><label for="label" class="preFieldinscrit">Date &amp; heure d&rsquo;arriv&eacute;e :</label></td>

    <td width="56%" class="row">LE <?php echo $resulta['date_alle'];?> &agrave; <?php echo $resulta['heure_arrive'];?>:<?php echo $resulta['minute_arrive'];?></td>
  </tr>
  <tr>
    <td valign="top"><label for="label" class="preFieldinscrit">Date &amp; heure de d&eacute;part :</label></td>
   
    <td class="row">LE <?php echo $resulta['date_retour'];?>  &agrave;<?php echo $resulta['heure_depart'];?>:<?php echo $resulta['minute_depart'];?></td>
  </tr>
</table>
<label >Logements</label>
<table>
<tr><td>H&ocirc;tel: </td><td><?php echo $resulta['cat_hotel'];?></td></tr>
<tr><td>Nombre chambre single</td><td><?php echo $resulta['single'];?></td></tr>
<tr><td>Nombre chambre double</td><td><?php echo $resulta['c_double'];?></td></tr>
<tr><td>Nombre chambre triple</td><td><?php echo $resulta['triple'];?></td></tr>
<tr><td>Nombre de suite</td><td>	<?php echo $resulta['suite'];?></td></tr>
<tr><td>BAR</td><td>	<?php echo $resulta['bar'];?></td></tr>
<tr><td>Arrangement</td><td><?php echo $resulta['logement'];?></td></tr>
</table>	
                
                
</div></div></div></div></div>
    

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

