<footer>
            
            <div class="footer-main padding-top ">
                <div class="container">
                    <div class="footer-main-wrapper">

                        <div class="row">
                            <div class="col-2">
                             <div class="col-md-2 col-xs-5"    style=" padding-top: 80px;">
                                    <div class="contact-us-widget widget">
                            <a href="index.html" class="logo-footer"><img src="assets/images/logo/logo.png" alt="" class="img-responsive"/></a>
                            </div></div>
                                <div class="col-md-3 col-xs-5">
                                    <div class="contact-us-widget widget">
                                        <div class="title-widget">contactez-nous</div>
                                        <div class="content-widget">
                                            <div class="info-list">
                                                <ul class="list-unstyled">
                                                    <li><i class="icons fa fa-map-marker"></i><a href="#" class="link"><?php echo $restotparametres['adresse'];?></a></li>
                                                    <li><i class="icons fa fa-phone"></i><a href="#" class="link"><?php echo $restotparametres['tel'];?></a></li>
                                                    <li><i class="icons fa fa-envelope-o"></i><a href="#" class="link"><?php echo $restotparametres['email'];?></a></li>
                                                </ul>
                                            </div>
                                            <div class="form-email"><p class="text">Inscrivez-vous à notre liste de diffusion pour obtenir les dernières mises à jour et des offres.</p>

                                                <form action="">
                                                    <div class="input-group"><input type="text" placeholder="Adresse Email" class="form-control form-email-widget" style="color:#000;"/><span class="input-group-btn"><button type="submit" class="btn-email">&#10004;</button></span></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xs-3">
                                    <div class="booking-widget widget text-center">
                                        <div class="title-widget">Réservez maintenant</div>
                                        <div class="content-widget">
                                            <ul class="list-unstyled">
                                            
                                            
                    <li ><a href="index.html" class="link">Bon plans</a></li>
                    <li ><a href="hotels_en_tunisie.html" class="link">Hôtels</a></li>
                    <li ><a href="vols.html" class="link">Vols</a></li>
                    <li ><a href="sejours.html" class="link">Séjours</a></li>
                    <li ><a href="circuits.html" class="link">Circuits</a></li>
                    <li ><a href="croisieres.html" class="link">Croisières</a></li>
                    
                                            
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                     <div class="col-md-2 col-xs-4">
                                    <div class="explore-widget widget">
                                        <div class="title-widget">Plus d'infos</div>
                                        <div class="content-widget">
                                            <ul class="list-unstyled">
                                            		<li ><a href="tourisme_medical.html" class="link">Tourisme médical</a></li>
                  								    <li><a href="contact.html" class="link">contact</a></li>
                                              </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-xs-4">
                                    <div class="explore-widget widget">
                                        <div class="title-widget">Facebook</div>
                                        <div class="content-widget">
                                           <?php include("Rsocial/facebook.php");?>
                                        </div>
                                    </div>
                                </div>
                           
                                
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="hyperlink">
                <div class="container">
                 <!--   <div class="slide-logo-wrapper">
                    
                     <?php
						   	$sqlallfff=mysql_query("select * from partenaires ") or die(mysql_error());
	
								while($rsqlallfff=mysql_fetch_array($sqlallfff)){?>
                                
                        <div class="logo-item"><a  title="<?php echo $rsqlallfff['titre'];?>" class="link"><img src="<?php echo $rsqlallfff['image'];?>" alt="" class="img-responsive" style="height: 70px;
    width: 140px;"/></a></div>
                        
                        <?php }?>
                       
                    </div>-->
                    
                    <div class="name-company" style="color:#FFF;">Copyright ©rbstravel.com.tn
2016 Tous droits réservés..&copy; Created by Think Creative.</div>
                </div>
            </div>
        </footer>