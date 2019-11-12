    <?php include("connexion.php");
	
	 $sql_circuis=mysql_query("select * from circuit where etat='1' "); $nbcircuit=mysql_num_rows($sql_circuis);
	 $sql_croisiere=mysql_query("select * from croisiere where etat='1' "); $nbcroisiere=mysql_num_rows($sql_croisiere);
	 $sql_hotel=mysql_query("select * from hotel where etat='1'"); $nbhotel=mysql_num_rows($sql_hotel);
	 $sql_voyage=mysql_query("select * from voyage where etat='1'"); $nbvoyage=mysql_num_rows($sql_voyage);
	$sql=mysql_query("select * from clients where mail='".$_SESSION['mail_connect']."' ");
$res=mysql_fetch_array($sql);
	?>
    
    <?php 

if(isset($_SESSION['id_connect'])&& isset($_SESSION['mail_connect'])){
	$testconfirm=mysql_query("select * from clients where mail='".isset($_SESSION['mail_connect'])."' and code='".isset($_SESSION['id_connect'])."'");
	if(mysql_num_rows($testconfirm)==1){
		
		$codenv=genererMDP(18);
		mysql_query("update  clients  set code='$codenv' where mail='".$_GET['id']."'");
		
		$_SESSION['id_connect']=$codenv;


		}

	
if(isset($_POST['update_profil'])){
	
 	$tel=$_POST['telprofil'];
	
	mysql_query("update  clients  set   tel='$tel' where mail='".$_SESSION['mail_connect']."'");
	header("location: espace_client.php#profile");
	
	}




if(isset($_POST['renewpasssubmit'])){
	if(isset($_POST['oldpass'])&& isset($_POST['newpass']) &&isset($_POST['renewpass']) &&($_POST['newpass']==$_POST['renewpass'] )){
			$old=md5($_POST['oldpass']);
			$new=md5($_POST['newpass']);
			if(isset($_POST['newsletter'])){$news=1;}else $news=0;
			
			
			$sqlrenew=mysql_query("select * from clients where mail='".$_SESSION['mail_connect']."' and mdp='$old' ");
			if(mysql_num_rows($sqlrenew)==1){
			mysql_query("update  clients  set mdp='$new', news='$news' where mail='".$_SESSION['mail_connect']."'");
			$_SESSION['msjrenew']="Changement de mot de passe réussite";
			header("location: espace_client.php#settings");
			}else{

				$_SESSION['msjrenew']="L'ancien mot de passe est incorrecte!";
								header("location: espace_client.php#settings");

				}
	
	
	}
	}

?>


<?php





function temp2($date){
	
$d1 = $date; 
 $date;
 $d=explode(" ", $date);
 $d1=explode("-", $d[0]);
 $d2=explode(":", $d[1]);
 
 $time1=mktime ($d2[0],$d2[1],$d2[2],$d1[1],$d1[2],$d1[0]);
 $time2=mktime (date("H"),date("i"),date("s"),date("m"),date("d"),date("Y"));

 $diff=$time2-$time1;
 
 
$jour=intval(($diff / 3600)/24);
$heures=intval($diff / 3600);
$minutes=intval(($diff % 3600) / 60);
$secondes=intval((($diff % 3600) % 60));

 if($jour>0){return "il y a ".$jour." J";}
 elseif($heures>0){ return "il y a ".$heures." H";}
 elseif($minutes>0){ return "il y a ".$minutes." Min";}
 elseif($secondes>0){ return "il y a ".$secondes." Sec";}
	}?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Espace client</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONT CSS-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link type="text/css" rel="stylesheet" href="assets/font/font-icon/font-awesome/css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="assets/font/font-icon/font-flaticon/flaticon.css">
    <!-- LIBRARY CSS-->
    <link type="text/css" rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/animate/animate.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/slick-slider/slick.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/slick-slider/slick-theme.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/selectbox/css/jquery.selectbox.css">
    <link type="text/css" rel="stylesheet" href="assets/libs/please-wait/please-wait.css">
    <!-- STYLE CSS-->
    <link type="text/css" rel="stylesheet" href="assets/css/layout.css">
    <link type="text/css" rel="stylesheet" href="assets/css/components.css">
    <link type="text/css" rel="stylesheet" href="assets/css/responsive.css">
    <style>
	
	.tab-container li {    height: 50px;
    background-color: #144f75;
    width: 200px;
    vertical-align: middle;
    padding: 30px;
	margin-top:5px;
    color: #fff; cursor:pointer;
	}
	
.tab-container li:hover{  
    background-color:#868789 ;
    color: #144f75;
	}
	.tab-container input {    height: 35px; width:100%;	}
	
	.tab-container li a {color: #fff; background-color:#999;height: 35px; width:100%;		}
</style>
</head>
<body>
<div class="body-wrapper"><!-- MENU MOBILE-->
    <?php include("header_responsive.php");?>
    <!-- WRAPPER CONTENT-->
    <div class="wrapper-content"><!-- HEADER-->
            <?php include("header.php");?>

        <!-- WRAPPER-->
        <div id="wrapper-content"><!-- MAIN CONTENT-->
            <div class="main-content">
                <section class="page-banner about-us-page">
                    <div class="container">
                        <div class="page-title-wrapper">
                            <div class="page-title-content">
                                <ol class="breadcrumb">
                                    <li><a href="index.html" class="link home">Accueil</a></li>
                                    <li class="active"><a href="#" class="link">Mon compte</a></li>
                                </ol>
                                <div class="clearfix"></div>
                                <h2 class="captions">Mon compte</h2></div>
                        </div>
                    </div>
                </section>
                <section class="about-us layout-2 padding-top padding-bottom about-us-4">
                    <div class="container">
                        <div class="row">
                            <div class="wrapper-contact-style">
                                <div class="col-lg-12 col-md-8"><h3 class="title-style-2"><?php echo $res['nom'];?> <?php echo $res['prenom'];?></h3>

                                    <div class="tab-container full-width-style arrow-left dashboard" >
                        <ul class="tabs col-lg-4 col-md-8">
                            <a data-toggle="tab" href="#vouchers"><li class="active"><i class="soap-icon-user circle"></i>Mes Vouchers</li></a>
                            <a data-toggle="tab" href="#profile"><li class="active"><i class="soap-icon-user circle"></i>Profile</li></a>
                            <a data-toggle="tab" href="#settings"><li class=""><i class="soap-icon-settings circle"></i>Mot de passe</li></a>
                        </ul>
                        <div class="tab-content col-lg-8 col-md-8" >

<div id="vouchers" class="tab-pane fade in active   col-lg-12 col-md-8" >
                                                                    <h2>Mes Vouchers</h2>

                                <div class="view-profile">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                        </figure>
                                        <div class="details">
                                         <table class="table table-striped table-bordered" id="sample_1">
       <thead>
                                        <tr>
                                            <td>H&ocirc;tel</td>
                                            <th>Total</th>
                                            
                                            										 
                                            <th>Nuités</th>
                                            <th>Checkin</th>
                                            <th>Checkout</th>
                                            <th>Date de réservation</th>
                                           <th>Fiche</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                 $result = mysql_query("SELECT * FROM `demmande_hotel`   where id_client='".$_SESSION['mail_connect']."' and etat='1' ORDER BY `id_commande` DESC;") or die(mysql_error());
   				while($resulta = mysql_fetch_array($result))
   				 {
      			  ?>
                                        <tr class="odd gradeX">
                                            
                                            <td><?php
									
									$id_hotel=$resulta['id_hotel'];
									 $sqlnom=mysql_query("select nom from hotel where id_hotel='".$id_hotel."'");
									$renomhotel=mysql_fetch_row($sqlnom);
									echo $renomhotel[0];
									
									
									?></td>	
                                            <td><?php echo $resulta['total'];?> </td>
                                            <td><?php echo $resulta['nbjours'];?> </td>
                                            <td><?php echo date('d-m-Y',strtotime($resulta['datedebut']));?> </td>
                                            <td><?php echo date('d-m-Y',strtotime($resulta['datefin']));?> </td>
                                            <td><?php echo date('d-m-Y',strtotime($resulta['datedemmande']));?> </td>
                                            <td><a href="javascript:window.open('voucher-<?php echo $resulta['numvoucher'];?>.html','Voucher   Num <?php echo $resulta['id_commande'];?>','menubar=no, scrollbars=no, top=100, left=100, width=800, height=500');" >Fiche</a></td>

                                            
                                       
                                            
                                              
                                        </tr>
                                        
                                       
                        <?php }?>             
                                        
                                    </tbody>                       </table>   
                                        </div>
                                    </article>
                                    <hr>
                                   
                                </div>
                                
                            </div>
                            
                            
                            
                            <div id="profile" class="tab-pane fade in    col-lg-12 col-md-8" >
                                                                    <h2>Details du compte</h2>

                                <div class="view-profile">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                        </figure>
                                        <div class="details">
                                            <a data-toggle="tab" href="#settings1"  class="button btn-mini pull-right edit-profile-btn">Modifier</a>
                                            <h2 class="box-title fullname"></h2>
                                            <dl class="term-description">
                                                <dt>Email:</dt><dd><?php echo $res['mail'];?></dd>
                                                <dt>Nom:</dt><dd><?php echo $res['nom'];?></dd>
                                                <dt>Prenom:</dt><dd><?php echo $res['prenom'];?></dd>
                                                <dt>Tel:</dt><dd><?php echo $res['tel'];?></dd>
                                                <dt>Date d'inscription:</dt><dd><?php echo $res['date'];?></dd>
                                                
                                            </dl>
                                        </div>
                                    </article>
                                    <hr>
                                   
                                </div>
                                
                            </div>
                            
                            
                            
                            <div id="settings1" class="tab-pane   col-lg-12 col-md-8" >
                                                                    <h2>Modification  du compte</h2>

                                
                                <div class="edit-profile">
                                    <form class="edit-profile-form" method="post" onSubmit="return test_compte();">
                                        <div class="col-sm-9 no-padding no-float">
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-8">
                                                    <label>Nom</label>
                                                    <font id="erreurnomprofil" style="color:#F00;"></font>
                                                 
                                                    <input type="text" name="nomprofil" id="nomprofil" class="input-text full-width" placeholder="" value="<?php echo $res['nom'];?>" disabled>
                                                </div>
                                                <div class="col-sms-6 col-sm-8">
                                                    <label>Prenom</label>
                                       <font id="erreurprenomprofil" style="color:#F00;"></font>

                                                    <input name="prenomprofil"  id="prenomprofil"  type="text" class="input-text full-width" placeholder="" value="<?php echo $res['prenom'];?>" disabled>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Tel</label>
                                         <font id="erreurtelprofil" style="color:#F00;"></font>

                                                    <input  value="<?php echo $res['tel'];?>"  name="telprofil" id="telprofil" type="text" class="input-text full-width" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-8">
                                            
                                                    <label>Email</label>

                                                    <input  disabled value="<?php echo $res['mail'];?>"type="text" class="input-text full-width" placeholder="" >
                                                </div>
                                                <div class="col-sms-6 col-sm-8">
                                            
                                                    <label>Date d'inscription</label>

                                                    <input disabled  value="<?php echo $res['date'];?>"  type="text">
                                                </div>
                                                
                                            </div>
                                            
                                      
                                          
                                            <div class="from-group">
                                                <button name="update_profil" type="submit" class="btn-medium col-sms-6 col-sm-4">Mettre à jour</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            
                            <div id="settings" class="tab-pane fade  col-lg-12 col-md-8">
                                <h2>Changez le mot de passe</h2>
                                <form method="post" onSubmit="return test_renew();">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-12">
                                            <label>L'ancien mot de passe</label>
                                          <font id="oldpasserreur" style="color:#F00;"></font>
                     <?php if(isset($_SESSION['msjrenew'])){?>
                                          <font id="oldpasserreur" style="color:#F00;"><?php echo  $_SESSION['msjrenew'];?></font>
                                     <?php
									
									 
									  }
									  
									  
									  ?>
                                          
                                         

                                            <input name="oldpass"  id="oldpass" type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-12">
                                            <label>Tapez le nouveau mot de passe</label>
                                          <font id="newpasserreur" style="color:#F00;"></font>
                                            <input name="newpass"  id="newpass" type="password" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-12">
                                            <label>Confirmez  le nouveau mot de passe</label>
                                          <font id="renewpasserreur" style="color:#F00;"></font>
                                          <font id="erreuridentik" style="color:#F00;"></font>
                                            <input  name="renewpass"  id="renewpass" type="password" class="input-text full-width">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <button  name="renewpasssubmit"class="btn-medium">Remplacer le mot de passe</button>
                                    </div>
                                </form>
                                <hr>
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
                
                
                <div class="about-tours padding-top padding-bottom">
                    <div class="container">
                        <div class="wrapper-tours">
                            <div class="content-icon-tours">
                                
                                <div class="content-tours" style="width:25% !important;"><i class="icon flaticon-transport-4"></i>

                                    <div class="wrapper-thin"><span class="wrapper-icon-thin"><i class="icon-thin fa fa-circle-thin"></i></span>

                                        <div class="tours-title"><?php echo $nbcroisiere;?></div>
                                    </div>
                                    <div class="text">Croisières</div>
                                </div>
                                <div class="content-tours" style="width:25% !important;"><i class="icon flaticon-two"></i>

                                    <div class="wrapper-thin"><span class="wrapper-icon-thin"><i class="icon-thin fa fa-circle-thin"></i></span>

                                        <div class="tours-title"><?php echo $nbhotel;?></div>
                                    </div>
                                    <div class="text">Hôtels disponible</div>
                                </div>
                                <div class="content-tours" style="width:25% !important;"><i class="icon flaticon-transport"></i>

                                    <div class="wrapper-thin"><span class="wrapper-icon-thin"><i class="icon-thin fa fa-circle-thin"></i></span>

                                        <div class="tours-title"><?php echo $nbvoyage;?></div>
                                    </div>
                                    <div class="text">Voyages organisés</div>
                                </div>
                                <div class="content-tours" style="width:25% !important;"><i class="icon flaticon-drink"></i>

                                    <div class="wrapper-thin"><span class="wrapper-icon-thin"><i class="icon-thin fa fa-circle-thin"></i></span>

                                        <div class="tours-title"><?php echo $nbcircuit;?></div>
                                    </div>
                                    <div class="text">Circuits & excursions</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <!-- BUTTON BACK TO TOP-->
            <div id="back-top"><a href="#top" class="link"><i class="fa fa-angle-double-up"></i></a></div>
        </div>
        <!-- FOOTER-->
            <?php include("footer.php");?>

    </div>
</div>
<!-- LIBRARY JS-->
<script src="assets/libs/jquery/jquery-2.2.3.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/libs/detect-browser/browser.js"></script>
<script src="assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
<script src="assets/libs/wow-js/wow.min.js"></script>
<script src="assets/libs/slick-slider/slick.min.js"></script>
<script src="assets/libs/selectbox/js/jquery.selectbox-0.2.js"></script>
<script src="assets/libs/please-wait/please-wait.min.js"></script>
<!--script(src="assets/libs/parallax/jquery.data-parallax.min.js")--><!-- MAIN JS-->
<script src="assets/js/main.js"></script>
<!-- LOADING JS FOR PAGE-->
<script  type="text/javascript">

function test_compte(){
	
	var test=true;
	
	 document.getElementById("erreurnomprofil").innerHTML="";
	 document.getElementById("erreurprenomprofil").innerHTML="";
	 document.getElementById("erreurtelprofil").innerHTML="";
	
	
	var nom=document.getElementById('nomprofil').value;
	var prenom=document.getElementById('prenomprofil').value;
	var tel=document.getElementById('telprofil').value;


if(nom=="") {document.getElementById("erreurnomprofil").innerHTML += "verifier le nom.<br>";
					test=false;
					document.getElementById("erreurnomprofil").style.display="";
					
	}else document.getElementById("erreurnomprofil").style.display="none";


	
if(prenom=="") {document.getElementById("erreurprenomprofil").innerHTML += "verifier le nom.<br>";
					test=false;
					document.getElementById("erreurprenomprofil").style.display="";
					
	}else document.getElementById("erreurprenomprofil").style.display="none";


	
if(tel=="") {document.getElementById("erreurtelprofil").innerHTML += "verifier le Telephone.<br>";
					test=false;
					document.getElementById("erreurtelprofil").style.display="";
					
	}else document.getElementById("erreurtelprofil").style.display="none";


	return test;
	
	
	
	}
	
	





function test_renew(){
	
	var test=true;
	
	 document.getElementById("oldpasserreur").innerHTML="";
	 document.getElementById("newpasserreur").innerHTML="";
	 document.getElementById("renewpasserreur").innerHTML="";
	
	
	var oldpass=document.getElementById('oldpass').value;
	var newpass=document.getElementById('newpass').value;
	var renewpass=document.getElementById('renewpass').value;


if(oldpass=="") {document.getElementById("oldpasserreur").innerHTML += "Tapez l'ancien mot de passe.<br>";
					test=false;
					document.getElementById("oldpasserreur").style.display="";
					
	}else document.getElementById("oldpasserreur").style.display="none";
	
if(newpass=="") {document.getElementById("newpasserreur").innerHTML += "verifier le nouveau mot de passe.<br>";
					test=false;
					document.getElementById("newpasserreur").style.display="";
					
	}else document.getElementById("newpasserreur").style.display="none";


		
	
		
if(renewpass=="") {document.getElementById("renewpasserreur").innerHTML += "Retapez le nouveau  mot de passe.<br>";
					test=false;
					document.getElementById("renewpasserreur").style.display="";
					
	}else document.getElementById("renewpasserreur").style.display="none";


if(renewpass!=newpass && renewpass!=""&& newpass!="") {document.getElementById("erreuridentik").innerHTML += "Les mots de passes ne sont pas identiques.<br>";
					test=false;
					document.getElementById("erreuridentik").style.display="";
					
	}else document.getElementById("erreuridentik").style.display="none";
return test;
		
}
	
	

</script>
<script src="assets/js/pages/about-us.js"></script>

<script type="text/javascript">
        tjq(document).ready(function() {
            tjq("#profile .edit-profile-btn").click(function(e) {
                e.preventDefault();
                tjq(".view-profile").fadeOut();
                tjq(".edit-profile").fadeIn();
            });

            setTimeout(function() {
                tjq(".notification-area").append('<div class="info-box block"><span class="close"></span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ab quis a dolorem, placeat eos doloribus esse repellendus quasi libero illum dolore. Esse minima voluptas magni impedit, iusto, obcaecati dignissimos.</p></div>');
            }, 10000);
        });
        tjq('a[href="#profile"]').on('shown.bs.tab', function (e) {
            tjq(".view-profile").show();
            tjq(".edit-profile").hide();
        });
    </script>
</body>

</html><?php }else {
	$_SESSION['msj_erreur_singin']=1;
	?>
        <script>document.location.href='index.html';</script>
        <?php }?>