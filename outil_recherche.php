
                            
                            
                            
                            <div class="col-md-4 sidebar-widget">
                            
                                        <div class="col-2">
                                            <div class="find-widget find-flight-widget widget"><h4 class="title-widgets">Trouver votre hôtel</h4>
                                            <b><?php 
							
							// $nb_hotels=mysql_num_rows($sqltot);
							echo $nb;?></b> Hôtels.

                                                <form class="content-widget">
                                                    <input type="hidden" id="minprix" name="minprix" value="<?php  if(isset($_GET['minprix']) && $_GET['minprix']!='') echo $_GET['minprix'];else echo "10";?>"/>
                                                    <input type="hidden" id="maxprix" name="maxprix"  value="<?php  if(isset($_GET['maxprix']) && $_GET['maxprix']!='') echo $_GET['maxprix'];else echo "200";?>"/>
                                                    <div class="text-input small-margin-top">
                                                        <div class="text-box-wrapper">
                                                        <label class="tb-label">Nom d'hôtel</label>

                                                            <div class="input-group"><input  name="nomhotel" type="text" placeholder="Nom de l'hôtel" class="tb-input" value="<?php if(isset($_GET['nomhotel'])) echo $_GET['nomhotel'];?>"></div>
                                                        </div>
                                                        <div class="text-box-wrapper">
                                                        <label class="tb-label">Ville</label>

                                                            <div class="input-group">
                                                            
                                                            
                                             <select class="tb-input"data-placeholder="Selectionnez une region" tabindex="1" name="region" id="region">
<option value="">Toute la Tunisie</option>
<?php 
$selectregionall=mysql_query("select * from regions  ORDER BY region ASC");
while($resregionall=mysql_fetch_array($selectregionall)){?>

								<option <?php if(isset($_GET['region']) && $resregionall['id']==$_GET['region']) echo "selected";?> value="<?php echo $resregionall['id'];?>"><?php echo $resregionall['region'];?></option>
							
							<?php }?>
                                        
                                        
                                    </select>               
                                                            
                                                            
                                                            </div>
                                                        </div>
                                                        <div class="input-daterange">
                                                            <div class="text-box-wrapper half left"><label class="tb-label">Arrivée</label>

                                                                <div class="input-group"><input  value="<?php if(isset($_GET['checkin'])) echo $_GET['checkin'];?>" name="checkin" type="text" placeholder="JJ/MM/AAAA" class="tb-input"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                            </div>
                                                            <div class="text-box-wrapper half right"><label class="tb-label">Départ</label>

                                                                <div class="input-group"><input  value="<?php if(isset($_GET['checkout'])) echo $_GET['checkout'];?>" name="checkout" type="text" placeholder="JJ/MM/AAAA" class="tb-input"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                            </div>
                                                        </div>
                                                    <div class="col-1">
                                                        <div class="price-wrapper">
                                                            <div class="text-box-wrapper left" style="width:80%;"><label class="tb-label">Prix</label>

                                                            <div data-range_min="0" data-range_max="500" data-cur_min="<?php  if(isset($_GET['minprix']) && $_GET['minprix']!='') echo $_GET['minprix']; else echo "10";?>" data-cur_max="<?php  if(isset($_GET['maxprix']) && $_GET['maxprix']!='') echo $_GET['maxprix']; else echo "200";?>" class="nstSlider">
                                                                <div class="leftGrip indicator">
                                                                    <div class="number" style="margin-top:10px !important;"></div>
                                                                </div>
                                                                <div class="rightGrip indicator">
                                                                    <div class="number" style="margin-top:10px !important;"></div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            
                                                        </div>
                                                        </div>
                                                        
                                                         <div class="text-box-wrapper"><br />

                                                            <div class="text-box-wrapper half left"><label class="tb-label">&Eacute;toiles</label>
                                                            <div class="radio-btn-wrapper">
                                                            
                                        <input type="radio"name="etoile" value=""  class="radio-btn" checked >Tous<br>
                                        <input type="radio"name="etoile" value="1"  class="radio-btn" <?php if(isset($_GET['etoile']) && 1==$_GET['etoile']) echo "checked";?> >
                                         01 étoile<br>
                                        <input type="radio" name="etoile" value="2"  class="radio-btn" <?php if(isset($_GET['etoile']) && 2==$_GET['etoile']) echo "checked";?> >
                                         02 étoile<br>
                                        <input type="radio" name="etoile" value="3"  class="radio-btn" <?php if(isset($_GET['etoile']) && 3==$_GET['etoile']) echo "checked";?> >
                                         03 étoile<br>
                                        <input type="radio" name="etoile" value="4"  class="radio-btn" <?php if(isset($_GET['etoile']) && 4==$_GET['etoile']) echo "checked";?> >
                                         04 étoile<br>
                                        <input type="radio" name="etoile" value="5"  class="radio-btn" <?php if(isset($_GET['etoile']) && 5==$_GET['etoile']) echo "checked";?> >
                                         05 étoile<br>
                                                         
                                                         
                                                            
                                                        </div>
                                                        
                                                
                                                
                                                    </div>
                                            
                                            
                                                    
                                                    <button type="submit" data-hover="Recherche" class="btn btn-slide small-margin-top"><span class="text">Recherche</span></button>
                                                </form>
                                            </div>
                                        </div>
                                       
                                        
 </div>
 </div></div>
