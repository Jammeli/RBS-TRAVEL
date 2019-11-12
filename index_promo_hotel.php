
   <?php 
   
$ssspromo ="select * from hotel where  etat=1 and id_hotel in(select id_hotel from promotions where date_depart<='".date("Y-m-d")."' and date_fin>='".date("Y-m-d")."' ) LIMIT 0,15";

$ssspromo2 ="select id_hotel from hotel where  etat=1 and id_hotel in(select id_hotel from promotions where date_depart<='".date("Y-m-d")."' and date_fin>='".date("Y-m-d")."' )";



$sssimple ="select * from hotel  where etat=1  and id_hotel in(select id_hotel from tarifs where date_depart<='".date("Y-m-d")."' and date_fin>='".date("Y-m-d")."')  and id_hotel NOT IN($ssspromo2) LIMIT 0,15";




?>            

 <?php  $sqlhotel=mysql_query($sssimple) or die(mysql_error());?>
 
  
                <section class="travelers" style="padding-bottom:50px; !important;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="traveler-wrapper padding-top-30 ">
                                    <div class="group-title white" style="text-align:center;">
                                        <h2 class="main-title"   style="color:#144f75;">Hôtels en Tunisie</h2></div>
                                        
                                </div>
                            </div>
                            
                        </div>
                        <div class="tours-wrapper">
                            
                            <div class="tours-content">
                                
                                <div class="col-md-12">
                                <div class="traveler-list" style="top:10px;">
 <?php	while($rsqlhotel=mysql_fetch_array($sqlhotel)){?>     
                                    <div class="tours-layout" style="padding-left:5px; padding-right:5px;">
                                        <div class="image-wrapper"><a href="hotel-details-<?php echo $rsqlhotel['id_hotel'];?>.html" class="link" style="background-image:url(<?php echo image_profil($rsqlhotel['id_hotel']);?>); background-position:center; background-size:cover; height:250px; width:100%;"></a>

                                            <div class="title-wrapper"><a href="hotel-details-<?php echo $rsqlhotel['id_hotel'];?>.html" class="title"><?php echo $rsqlhotel['nom'];?></a></div>
                                            
                                               
                                              <?php  $promo=pourcent_promo($rsqlhotel['id_hotel']);if($promo!=0 && ($promo!=100)){?>
                                               <div class="label-sale"> <p class="text"><?php if($promo!=100) echo "-".pourcent_promo($rsqlhotel['id_hotel'])."%";?></p>
                                                <p class="number"><?php if($promo!=100) echo "-".pourcent_promo($rsqlhotel['id_hotel'])."%";?></p> </div>
                                                <?php }?>
                                               
                                            
                                        </div>
                                        <div class="content-wrapper">
                                            <ul class="list-info list-inline list-unstyle">
                                                <li><a href="#" class="link"><i class="icons fa fa-eye"></i><span class="text number"><?php echo nb_vue($rsqlhotel['id_hotel'], 'hotel');?></span></a></li>
                                                <li style="color:#555e69;">Ville: <span class="text number"> <?php 
										$regionsql=mysql_query("select region from regions where id='".$rsqlhotel['region']."' ");
									    $exeregion=mysql_fetch_row($regionsql);
										echo $exeregion[0];?></span></li>
                                                
                                                
                                            </ul>
                                            <div class="content">
                                                <div class="title" style="color:#555e69;">
                                        à partir de<br>
                                       <div class="price"><span class="number"><?php echo prix_promo($rsqlhotel['id_hotel'],2);?></span></div>
                                                  <br>  <p class="for-price"><?php echo arr_promo($rsqlhotel['id_hotel']);?></p></div>
                                                

                                                <div class="group-btn-tours"><a href="hotel-details-<?php echo $rsqlhotel['id_hotel'];?>.html" class="left-btn">Détails</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                            <?php }?>
      
                                </div>
                            </div>
                                <a  style="margin-top:30px;" href="bons_plans.html" class="btn btn-transparent ">Plus d'hôtels</a></div>
                        </div>
                    </div>
                </section>
                
                
      
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                            
                
                   
              <section class="tours padding-bottom-30">
                    <div class="container">

<div class="row">
                            <div class="col-md-12">
                                <div class="traveler-wrapper padding-top-30 ">
                                    <div class="group-title white" style="text-align:center;">
                                        <h2 class="main-title"  style="color:#144f75;">Best of promo</h2></div>
                                </div>
                            </div>
                            
                        </div>
                        
                                                <div class="tours-wrapper">
                            
                            <div class="tours-content ">
                                
                                <div class="col-md-12">
                                <div class="traveler-list">

    
						  
 
                                                     
                                                     
                                                     
                       
                         <?php  $sqlpromo=mysql_query($ssspromo) or die(mysql_error());?>
	 <?php if(mysql_num_rows($sqlpromo)!=0){?>    
                           <?php	while($respromohotel=mysql_fetch_array($sqlpromo)){?>     
                                    <div class="tours-layout" style="padding-left:5px; padding-right:5px;">
                                        <div class="image-wrapper"><a href="hotel-details-<?php echo $respromohotel['id_hotel'];?>.html" class="link" style="background-image:url(<?php echo image_profil($respromohotel['id_hotel']);?>); background-position:center; background-size:cover; height:250px; width:100%;"></a>

                                            <div class="title-wrapper"><a href="hotel-details-<?php echo $respromohotel['id_hotel'];?>.html" class="title"><?php echo $respromohotel['nom'];?></a></div>
                                            
                                               
                                              <?php  $promo=pourcent_promo($respromohotel['id_hotel']);if($promo!=0 &&($promo!=100)){?>
                                               <div class="label-sale"> <p class="text"><?php if($promo!=100) echo "-".pourcent_promo($respromohotel['id_hotel'])."%";?></p>
                                                <p class="number"><?php if($promo!=100) echo "-".pourcent_promo($respromohotel['id_hotel'])."%";?></p> </div>
                                                <?php }?>
                                               
                                            
                                        </div>
                                        <div class="content-wrapper">
                                            <ul class="list-info list-inline list-unstyle">
                                                <li><a href="#" class="link"><i class="icons fa fa-eye"></i><span class="text number"><?php echo nb_vue($respromohotel['id_hotel'], 'hotel');?></span></a></li>
                                                <li style="color:#555e69">Ville: <span class="text number"> <?php 
										$regionsql=mysql_query("select region from regions where id='".$respromohotel['region']."' ");
									    $exeregion=mysql_fetch_row($regionsql);
										echo $exeregion[0];?></span></li>
                                                
                                                
                                            </ul>
                                            <div class="content">
                                                <div class="title" style="color:#555e69">
                                        à partir de<br>
                                       <div class="price"><span class="number"><?php echo prix_promo($respromohotel['id_hotel'],2);?></span></div>
                                                 <br>   <p class="for-price"><?php echo arr_promo($respromohotel['id_hotel']);?></p></div>
                                                

                                                <div class="group-btn-tours"><a href="hotel-details-<?php echo $respromohotel['id_hotel'];?>.html" class="left-btn">Détails</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                            <?php }?>
                     <?php }?>
                   
                                </div>
                            </div>
                                <a href="hotels_en_tunisie.html" class="btn btn-transparent ">Plus d'hôtels</a></div>
                        </div>
                    </div>
                </section>  