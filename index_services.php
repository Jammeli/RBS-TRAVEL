 <div class="clearfix"></div>
                    <div class="cruises-result-main padding-bottom-70">
                        <div class="container">
                            
                            
                            <div class="special-offer margin-top70"><h3 class="title-style-2">Nos services</h3>

                                <div class="special-offer-list">
                                    <?php $serv=mysql_query("select * from services where etat='1'");
									while($resserv=mysql_fetch_array($serv)){?>
                                    <div class="special-offer-layout">
                                        <div class="image-wrapper"><a href="service-<?php echo $resserv['id'];?>.html" class="link"><img src="<?php echo $resserv['image'];?>" alt="" class="img-responsive"></a>

                                            <div class="title-wrapper"><a href="service-<?php echo $resserv['id'];?>.html" class="title"><?php echo $resserv['titre'];?></a></div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>