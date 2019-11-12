<style>


@media (max-width:480px){
.cvb{width: 50px !important;float: right !important; }
.btn-slide{ position:relative !important;  right:auto;}
 .tab-search{
	    width: 80% !important;
    
	
 }
}

@media (max-width:1199px){
.group-logo{ display:none !important; margin-top:20px;}
.homepage-banner-content{    padding-top: 160px !important;}

}
@media (min-width:1200px){
.group-logo{  margin-top:20px;}

}

</style><div class="tab-search tab-search-long ">
                            
                            <div class="tab-content" >
                                
                                
                                <div role="tabpanel" id="tours" class=" active">
                                    <div class="find-widget find-tours-widget widget">

                                        <form class="content-widget" >
                                            <div class="text-input">
                                                <div class="place text-box-wrapper"><label class="tb-label">Destination</label>

                                                    <div class="input-group"><input name="destination" type="text" placeholder="votre Destination" class="tb-input" value="<?php if(isset($_GET['destination'])) echo $_GET['destination'];?>"></div>
                                                </div>
                                                <div class="date text-box-wrapper"><label class="tb-label">Date de départ</label>

                                                    <div class="input-group"><input  name="datedepart"type="text" placeholder="JJ/MM/AAAA" class="tb-input" value="<?php if(isset($_GET['datedepart'])) echo $_GET['datedepart'];?>"><i class="tb-icon fa fa-calendar input-group-addon"></i></div>
                                                </div>
                                                
<button type="submit" data-hover="FILTRER" class="btn btn-slide" style="float:left;"><span class="text">FILTRER</span></button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div> 
                        
                        
<style>
.trip-info {
    height: 35px;
    line-height: 35px;
	
}
.tab-search { margin-top:15px;} 
.tab-search .input-group{
	    height: 35px !important;
		
}
.tab-search input{
	padding:0;
		
}

.find-widget {
	padding: 10px 29px;
	
}
    </style>
	
