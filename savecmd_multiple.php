                           <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

include("connexion.php");

	
		    
            $id_client =$_SESSION['mail_connect'];       
            $id_article= $_POST['id_article'];       
            $datedemmande =date("Y-m-d");
            $heuredemmande =date("H:i:s");       
            $total=$_POST['total'];
			 
            $etat=0;
            $page=$_POST['page'];
			$enfant=$_POST['enfant'];  
            $adulte=$_POST['adulte'];
			$sql=mysql_query("select * from $page where id='".$id_article."'  ") or die(mysql_error());
			$res=mysql_fetch_array($sql);  
			$total=$res['prix'];
			
			$facture=' <h4>Details de r&eacute;servation</h4>
                           
                            
                            <div class="details" style="width:100%;">
                                <h2 class="box-title">'. $res['libelle'].'<small>'.$res['apartir_de'].'</small></h2>
                                
                                <div class="feedback clearfix">
                                    
                                </div>
                               
 										<div class="row">
                                            
											
											<div class="col-xs-6">
                                                <label name="enfant" >Nombre d\'adultes = '.$adulte.'</label>
                                            </div><br>
											
											
											
                                        </div>			
 										<div class="row">
                                            
											
											<div class="col-xs-6">
                                                <label name="enfant" >Nombre d\'enfants  =   '.$enfant.'</label>
                                            </div><br>
											
											
											
                                        </div>			
				
									 <div class="row">
                                            
											
											<div class="col-xs-6">
                                                <label name="enfant" >Prix par personne  =   '.$res['prix'].'</label>
                                            </div><br>
											
											
											
                                        </div>
                            </div>   ';
                          $facture=mysql_real_escape_string($facture);	

   
mysql_query("INSERT INTO `demmande_cruise` (`id_commande`, `id_client`, `id_article`, `page`, `datedemmande`, `heuredemmande`, `total`, `adulte`, `enfant`,`facture`, `etat`)

 VALUES ('', '$id_client', '$id_article', '$page', '$datedemmande', '$heuredemmande', '$total', '$adulte', '$enfant','$facture', '$etat');") or die (mysql_error());
				
		 notification($id_commande,$page,'attente','reservation en attente .', $_SESSION['mail_connect']);
		
	
				
	  			header("location: demande_".$page."_reussite.html");
		
						


					







?>