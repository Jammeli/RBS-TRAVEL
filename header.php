<?php
if(isset($_GET['activer'])&& isset($_GET['id'])){
	


	
	$testconfirm=mysql_query("select * from clients where mail='".$_GET['id']."' and code='".$_GET['activer']."'");
	if(mysql_num_rows($testconfirm)==1){
		
		mysql_query("update  clients  set etat='1' where mail='".$_GET['id']."' and code='".$_GET['activer']."'");
		$_SESSION['id_connect']=$_GET['activer'];
		$_SESSION['mail_connect']=$_GET['id'];
		       ?> <script>document.location.href='espace_client.html';</script><?php

		}
	
	
}

	$testtourisme=mysql_query("select etat from tourisme_medical ") or die(mysql_error());
	$restou=mysql_fetch_row($testtourisme); 	$etattourisme=$restou[0];
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88135701-1', 'auto');
  ga('send', 'pageview');

</script>
<header style="position:absolute; width:100%;">
            <div class="bg-transparent">
                <div class="header-topbar">
                    <div class="container">
                        
                        <ul class="topbar-right pull-right list-unstyled list-inline login-widget">
                        
                         <?php if(isset($_SESSION['id_connect']) && isset($_SESSION['mail_connect'])){?>
                             <li><a href="espace_client.html" class="item">Mon compte</a></li>
                                                    <li><a href="deconnexion.html" class="item">Déconnexion</a></li>

                        <?php } else{?>
                        
                            <li><a href="login.html" class="item">login</a></li>
                            <li><a href="register.html" class="item">S'enregistrer</a></li>        
                        <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="header-main">
                    <div class="container">
                        <div class="header-main-wrapper">
                            <div class="hamburger-menu">
                                <div class="hamburger-menu-wrapper">
                                    <div class="icons"></div>
                                </div>
                            </div>
                            <div class="navbar-header">
                                <div class="logo"><a href="index.html" class="header-logo"><img src="assets/images/logo/logo_color.png" alt=""/></a></div>
                            </div>
                            <nav class="navigation">
                                <ul class="nav-links nav navbar-nav">
                    <li class="dropdown"><a href="bons_plans.html" class="main-menu"><span class="text">Bon plans</span></a></li>
                    <li class="dropdown"><a href="hotels_en_tunisie.html" class="main-menu"><span class="text">Hôtels</span></a></li>
                    <li class="dropdown"><a href="vols.html" class="main-menu"><span class="text">Vols</span></a></li>
                    <li class="dropdown"><a href="sejours.html" class="main-menu"><span class="text">Séjours</span></a></li>
                    <li class="dropdown"><a href="circuits.html" class="main-menu"><span class="text">Circuits</span></a></li>
                    <li class="dropdown"><a href="croisieres.html" class="main-menu"><span class="text">Croisières</span></a></li>
             <?php if($etattourisme==1){?>  <li class="dropdown"><a href="tourisme_medical.html" class="main-menu"><span class="text">Tourisme médical</span></a></li><?php }?>
                    <li><a href="contact.html" class="main-menu"><span class="text">contact</span></a></li>
                    <li class="button-search"><p class="main-menu"><i class="fa fa-search"></i></p></li>
                                </ul>
                                <div class="nav-search hide">
                                    <form action="resultats.html"><input type="text" placeholder="Mots clés" class="searchbox" name="q"/>
                                        <button type="submit" class="searchbutton fa fa-search"></button>
                                    </form>
                                </div>
                            </nav>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
    