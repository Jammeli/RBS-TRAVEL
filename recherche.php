<style>


@media (max-width:480px){
.cvb{width: 50px !important;float: right !important; }
 .tab-search{
	    width: 100% !important;
    
	
 }
}

@media (max-width:1199px){
.group-logo{ display:none !important; margin-top:20px;}
.homepage-banner-content{    padding-top: 160px !important;}

}
@media (min-width:1200px){
.group-logo{  margin-top:20px;}

}

</style><div class="tab-search tab-search-long tab-search-transparent">
                            <ul role="tablist" class="nav nav-tabs cvb" >
                                <li role="presentation" class="tab-btn-wrapper active"><a href="#flight" aria-controls="flight" role="tab" data-toggle="tab" class="tab-btn"><i class="flaticon-transport-1"></i><span>VOLS</span></a></li>
                                
                                <li role="presentation" class="tab-btn-wrapper"><a href="#hotel" aria-controls="hotel" role="tab" data-toggle="tab" class="tab-btn"><i class="flaticon-three"></i><span>H&Ocirc;TEL</span></a></li>
                                <li role="presentation" class="tab-btn-wrapper"><a href="#tours" aria-controls="tours" role="tab" data-toggle="tab" class="tab-btn"><i class="flaticon-transport-7"></i><span>Circuits</span></a></li>
                                <li role="presentation" class="tab-btn-wrapper"><a href="#car-rent" aria-controls="car-rent" role="tab" data-toggle="tab" class="tab-btn"><i class="flaticon-people"></i><span>S&Eacute;JOURS</span></a></li>
                                <li role="presentation" class="tab-btn-wrapper"><a href="#cruises" aria-controls="cruises" role="tab" data-toggle="tab" class="tab-btn"><i class="flaticon-transport-4"></i><span>CROISI&Egrave;RES</span></a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" id="flight" class="tab-pane fade in active">
                                    <div class="find-widget find-flight-widget widget">

                                        <form class="content-widget" action="vols.html" method="get">
                                           <!-- <div class="ffw-radio-selection"><span class="ffw-radio-btn-wrapper"><input type="radio" name="type" value="aller" id="flight-type-1" checked="checked" class="ffw-radio-btn"><label for="flight-type-1" class="ffw-radio-label">Aller</label></span> <span class="ffw-radio-btn-wrapper"><input type="radio" name="type" value="retour" id="flight-type-2" class="ffw-radio-btn"><label for="flight-type-2" class="ffw-radio-label">Aller & Retour</label></span> 

                                                <div class="stretch">&nbsp;</div>
                                            </div>-->
                                            <div class="text-input small-margin-top">
                                                <div class="place text-box-wrapper"><label class="tb-label">Déstination</label>

                                                    <div class="input-group"><input type="text" placeholder="Déstination" class="tb-input"></div>
                                                </div>
                                                <div class="input-daterange">
                                                    <div class="text-box-wrapper half"><label class="tb-label">Date départ</label>

                                                        <div class="input-group"><input type="text" placeholder="JJ/MM/AAAA" class="tb-input" name="datedepart" Default="<?php echo date("d/m/Y");?>"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                    </div>
                                                    <div class="text-box-wrapper half"><label class="tb-label">Date retour</label>

                                                        <div class="input-group"><input type="text" placeholder="JJ/MM/AAAA" class="tb-input" name="dateretour" ><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                    </div>
                                                </div>
                                                <div class="count adult-count text-box-wrapper"><label class="tb-label">Adulte</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select class="form-control custom-select selectbox" name="adultes">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                   
                                                    </select></div>
                                                </div>
                                                <div class="count child-count text-box-wrapper"><label class="tb-label">Enfants</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select class="form-control custom-select selectbox" name="enfants">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                
                                                    </select></div>
                                                </div>
                                                <button type="submit" data-hover="RECHERCHE" class="btn btn-slide"><span class="text">RECHERCHE </span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" id="hotel" class="tab-pane fade">
                                    <div class="find-widget find-tours-widget widget">

                                        <form class="content-widget" action="hotels_en_tunisie.html">
                                            <div class="text-input small-margin-top">
                                                <div class="place text-box-wrapper"><label class="tb-label">Nom de l'hôtel</label>

                                                    <div class="input-group"><input name="nomhotel" type="text" placeholder="Nom de l'hôtel" class="tb-input"></div>
                                                </div>
                                                <div class="input-daterange">
                                                    <div class="text-box-wrapper half"><label class="tb-label">Check in</label>

                                                        <div class="input-group"><input type="text" placeholder="JJ/MM/AAAA" class="tb-input" name="checkin"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                    </div>
                                                    <div class="text-box-wrapper half"><label class="tb-label">Check out</label>

                                                        <div class="input-group"><input type="text" placeholder="JJ/MM/AAAA" class="tb-input" name="checkout"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="count child-count text-box-wrapper"><label class="tb-label">étoile</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select class="form-control custom-select selectbox" name="etoile">
                                                        <option  value="">0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                     
                                                    </select></div>
                                                </div>
                                                <button type="submit" data-hover="RECHERCHE" class="btn btn-slide"><span class="text">RECHERCHE</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" id="tours" class="tab-pane fade">
                                    <div class="find-widget find-tours-widget widget">

                                        <form class="content-widget" action="circuits.html" >
                                            <div class="text-input small-margin-top">
                                                <div class="place text-box-wrapper"><label class="tb-label">Destination</label>

                                                    <div class="input-group"><input name="destination" type="text" placeholder="votre Destination" class="tb-input"></div>
                                                </div>
                                                <div class="date text-box-wrapper"><label class="tb-label">Date de départ</label>

                                                    <div class="input-group"><input  name="datedepart"type="text" placeholder="JJ/MM/AAAA" class="tb-input"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                </div>
                                                <div class="count adult-count text-box-wrapper"><label class="tb-label">Adultes</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select name="adultes" class="form-control custom-select selectbox">
                                                        <option selected="selected">1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                    </select></div>
                                                </div>
                                                <div class="count child-count text-box-wrapper"><label class="tb-label">Enfants</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select  name="enfants"  class="form-control custom-select selectbox">
                                                        <option selected="selected">0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                    </select></div>
                                                </div>
                                                <button type="submit" data-hover="RECHERCHE" class="btn btn-slide"><span class="text">RECHERCHE</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" id="car-rent" class="tab-pane fade">
                                    <div class="find-widget find-tours-widget widget">

                                        <form class="content-widget" action="sejours.html">
                                            <div class="text-input small-margin-top">
                                                <div class="place text-box-wrapper"><label class="tb-label">Déstination</label>

                                                    <div class="input-group"><input name="Déstination" type="text" placeholder="Déstination" class="tb-input"></div>
                                                </div>
                                                <div class="date text-box-wrapper"><label class="tb-label">Date de départ</label>

                                                    <div class="input-group"><input  name="datedepart"type="text" placeholder="JJ/MM/AAAA" class="tb-input"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                </div>
                                                <div class="count adult-count text-box-wrapper"><label class="tb-label">Adultes</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select name="adultes" class="form-control custom-select selectbox">
                                                        <option selected="selected">1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                    </select></div>
                                                </div>
                                                <div class="count child-count text-box-wrapper"><label class="tb-label">Enfants</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select  name="enfants"  class="form-control custom-select selectbox">
                                                        <option selected="selected">0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                    </select></div>
                                                </div>
                                                <button type="submit" data-hover="RECHERCHE" class="btn btn-slide"><span class="text">RECHERCHE</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div role="tabpanel" id="cruises" class="tab-pane fade">
                                    <div class="find-widget find-tours-widget widget">

                                        <form class="content-widget"  action="croisieres.html">
                                            <div class="text-input small-margin-top">
                                                <div class="place text-box-wrapper"><label class="tb-label">Déstination</label>

                                                    <div class="input-group"><input name="destination" type="text" placeholder="votre Destination" class="tb-input"></div>
                                                </div>
                                                <div class="date text-box-wrapper"><label class="tb-label">Date de départ</label>

                                                    <div class="input-group"><input  name="datedepart"type="text" placeholder="JJ/MM/AAAA" class="tb-input"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                </div>
                                                <div class="count adult-count text-box-wrapper"><label class="tb-label">Adultes</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select name="adultes" class="form-control custom-select selectbox">
                                                        <option selected="selected">1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                    </select></div>
                                                </div>
                                                <div class="count child-count text-box-wrapper"><label class="tb-label">Enfants</label>

                                                    <div class="select-wrapper"><!--i.fa.fa-chevron-down--><select  name="enfants"  class="form-control custom-select selectbox">
                                                        <option selected="selected">0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                    </select></div>
                                                </div>
                                                <button type="submit" data-hover="RECHERCHE" class="btn btn-slide"><span class="text">RECHERCHE</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>