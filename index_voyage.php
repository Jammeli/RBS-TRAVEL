<section class="tours padding-top-30 padding-bottom-30">
                    <div class="container">
                        <div class="tours-wrapper">
                            <div class="group-title" style="text-align:center;">
                                <h2 class="main-title"  style="color:#144f75;">Séjours</h2></div>
                            <div class="tours-content ">
                                
                                <div class="col-md-12">
                                <div class="traveler-list">
<?php $sql_circuis=mysql_query("select * from voyage where etat='1' ORDER BY id DESC LIMIT 0,15");?>


 
                                                     
                                                     
                                                     
                    <?php if(mysql_num_rows($sql_circuis)!=0){?>    
                           <?php	while($resciecuit=mysql_fetch_array($sql_circuis)){?>     
                                    <div class="tours-layout" style="padding-left:5px; padding-right:5px;">
                                        <div class="image-wrapper"><a  href="sejour-<?php echo $resciecuit['id'];?>.html" class="link" style="background-image:url(<?php echo image_profilEX( $resciecuit['id'], 'images_voyage', 'id_voyage');?>); background-position:center; background-size:cover; height:250px; width:100%;"></a>

                                            <div class="title-wrapper"><a  href="sejour-<?php echo $resciecuit['id'];?>.html" class="title"><?php echo $resciecuit['libelle'];?></a></div>
                                            
                                        </div>
                                        <div class="content-wrapper">
                                            <ul class="list-info list-inline list-unstyle">
                                                <li><a href="#" class="link"><i class="icons fa fa-eye"></i><span class="text number"><?php echo nb_vue($resciecuit['id'], 'voyage');?></span></a></li>
                                                
                                            <li>Durée: <span class="text number"><?php echo $resciecuit['nbre_jour'];?> jour(s)</span></li>    
                                            </ul>
                                            <div class="content">
                                                <div class="title">à partir de 
                                                <div class="price"><span class="number"><?php echo $resciecuit['prix'];?><sup >DT</sup></span></div>
                                                
                                                </div>
                                                    
                                                  <div class="group-btn-tours"><a  href="sejour-<?php echo $resciecuit['id'];?>.html" class="left-btn">Voir plus</a></div>  
                                            </div>
                                                
                  
                                          </div>
                 </div>
                                    
                            <?php }?>
                     <?php }?>
                                </div>
                            </div>
                                <a href="about-us.html" class="btn btn-transparent ">Plus de voyages</a></div>
                        </div>
                    </div>
                </section>