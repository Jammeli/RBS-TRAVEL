
<?php include("connexion.php");?>






<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <title>ADMIN_RBS</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />

    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top" onLoad="charger()">
   <!-- BEGIN HEADER -->
                <?php include("header.php");?>

   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
          <div id="sidebar" class="nav-collapse collapse">

              <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
              <div class="navbar-inverse">
                  <form class="navbar-search visible-phone">
                      <input type="text"  class="search-query" placeholder="Search" />
                  </form>
              </div>
             <?php include("menu.php");?>
          </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     Factures
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                       
                       <li class="active">
                           Nouvelle Facture
                       </li>
                       
                   </ul>
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget red">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Factures</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                
                            </span>
                    </div>
                    
                    <div class="widget-body">
                    <center>
					
					</button>
                        <?php include("facture_nv_form.php");?>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->

   <!-- BEGIN FOOTER -->
   <div id="footer">
       2016 &copy; RBS.
   </div>
   <!-- END FOOTER -->

   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script src="js/jquery.scrollTo.min.js"></script>


   <!--common script for all pages-->
   <script src="js/common-scripts.js"></script>

   <!--script for this page only-->
   <script src="js/dynamic-table.js"></script>
   <style>


.btnsupp{ color:rgba(255,0,0,1); font-weight:bold; border:1px solid #F00; cursor:pointer; text-decoration:none; padding:5px;}

</style>
<script>

  function toWords(s){
	   var th = ['millime','dinar','million', 'millard','billion'];
var dg = ['zero','un','deux','trois','quatre', 'cinq','six','sept','huit','neuf'];
 var tn = ['dix','onze','douze','treize', 'quatorze','quinze','seize', 'dix-sept','dix-huit','dix-neuf'];
  var tw = ['vingt','trente','quarante','cinquante', 'soixante','soixante-dix','quatre-vingts','quatre-vingts dix'];
	   s = s.toString();
	    s = s.replace(/[\, ]/g,''); 
		if (s != parseFloat(s))
		 return 'pas de nombre';
		  var x = s.indexOf('.'); 
		  if (x == -1) x = s.length;
		   if (x > 15) return 'trop grand';
		    var n = s.split(''); var str = '';
			 var sk = 0; 
			 for (var i=0; i < x; i++) 
			 {if ((x-i)%3==2) 
			 	{if (n[i] == '1') 
					{str += tn[Number(n[i+1])] + ' ';
					 i++; sk=1;
					 } else if (n[i]!=0) 
					 {str += tw[n[i]-2] + ' ';sk=1;
					 }
			 	 } else if (n[i]!=0) 
				 {str += dg[n[i]] +' '; 
				 if ((x-i)%3==0) str += 'cent ';
				 sk=1;
				 } if ((x-i)%3==1)
				 {if (sk) 
				 str += th[(x-i-1)/3] + ' ';
				 sk=0;}}
				  if (x != s.length) {var y = s.length; str += 'et '; for (var i=x+1; i<y; i++) str += dg[n[i]] +' ';} return str.replace(/\s+/g,' ');}
	
	
		function calcul_ligne(id){
		

var pu=parseFloat(document.getElementById('pu'+id).value);
var pax=parseFloat(document.getElementById('pax'+id).value);
var qte=parseFloat(document.getElementById('qte'+id).value);




var totalligne=(pu*pax*qte).toFixed(3);
document.getElementById('montant'+id).value=totalligne;
 
calcul();
		
}			  

function calcul(){

var somme=0;	
	nligne=document.getElementById('nbreligne').value;
for(var k=0; k<nligne;k++){
somme+=parseFloat(document.getElementById('montant'+k).value); 
}



var totalapayer=(somme+0.5).toFixed(3);
document.getElementById('tot').innerHTML=totalapayer;
document.getElementById('total').value=totalapayer;
 
var htva1=(somme/1.06);
var htva=(htva1/1.01).toFixed(3);

/*-------*/
document.getElementById('FDCST').innerHTML=((htva*0.01).toFixed(3));
document.getElementById('sommet').innerHTML=htva;
document.getElementById('st').value=htva;
somme_ap_fdc=htva*1.01;
document.getElementById('tva').innerHTML=((somme_ap_fdc*0.06).toFixed(3));




var chaine=toWords(totalapayer*1000);
document.getElementById('prixlettre').innerHTML=chaine;
 	
		
	}
				  
function afficheligne()
{

var nbreligne= document.getElementById('nbreligne').value;

   
var idnv=parseInt(nbreligne);
var qte =new Array();
var designation =new Array();
var pu =new Array();
var pax =new Array();
var montant =new Array();
var arrangement =new Array();
var pchamp='' ;
var i=0;
var t=true;



for(i=0; i<idnv;i++){
qte[i]= document.getElementById('qte'+i).value;
designation[i]= document.getElementById('designation'+i).value;
pu[i]= document.getElementById('pu'+i).value;
pax[i]= document.getElementById('pax'+i).value;
arrangement[i]= document.getElementById('arrangement'+i).value;


montant[i]=document.getElementById('montant'+i).value;
montant[i]=parseFloat(montant[i]).toFixed(3); 
}

var x11="qte"+idnv;
var x21="designation"+idnv;
var x31="pu"+idnv;
var x41="arrangement"+idnv;
var x51="pax"+idnv;


var ligne='<tr id="col'+idnv+'" class="col1"><td><textarea  style="width:80%"  name="designation'+idnv+'" id="designation'+idnv+'"   ></textarea></td><td><input  style="width:80%" type="text" name="arrangement'+idnv+'" id="arrangement'+idnv+'" value=""   /></td><td><input  style="width:80%" type="text" name="pu'+idnv+'" id="pu'+idnv+'" value="0"  onkeyup="calcul_ligne('+idnv+');" /></td><td><input  style="width:80%" type="text" name="pax'+idnv+'" id="pax'+idnv+'" onkeyup="calcul_ligne('+idnv+');" value="1"   /></td> <td><input  style="width:80%" type="text" onkeyup="calcul_ligne('+idnv+');" name="qte'+idnv+'" id="qte'+idnv+'"   value="1" /></td><td><input  style="width:80%" type="text" disabled name="montant'+idnv+'" id="montant'+idnv+'" value="0.000"/><input  style="width:80%" type="hidden" /></td><td><a   class ="btnsupp" onClick="javascript: if(confirm(\'Supprimer cette ligne?\') ) supp_tr('+idnv+')" >X</a></td></tr>';



 var nligne=parseInt(document.getElementById('nbreligne').value);

	document.getElementById('tableau').deleteRow(-1);
document.getElementById('tableau').innerHTML+=ligne; 
document.getElementById('tableau').innerHTML+='<tr ><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" onclick="javascript:afficheligne();" value="+" /></td></tr>';
nligne+=1;

document.getElementById('nbreligne').value=nligne;
 

for(i=0; i<idnv;i++){
document.getElementById('qte'+i).value=qte[i];
document.getElementById('designation'+i).value=designation[i];
document.getElementById('pu'+i).value=pu[i];
document.getElementById('montant'+i).value=montant[i];
document.getElementById('pax'+i).value=pax[i];
document.getElementById('arrangement'+i).value=arrangement[i];


}





}
 
 
 
function test(id){
	var re = new RegExp("^[0-9]*([.,\,][0-9]+)*$", "g");
	var x=  document.getElementById('pu'+id).value;
	if(!re.test(x)){
	
	var l=x[x.length-1];
	var l2=x[0]; 
	if(l2=="." || l2==","){	document.getElementById('pu'+id).value='';}
	else{
	if(l!="." && l!=","){
	x = x.substring(0, x.length-1) ;
	document.getElementById('pu'+id).value=x;
	}
	}
}


}
function test_qte(id){
	var re = new RegExp("^[1-9]+[0-9]*$", "g");
	var x=  document.getElementById('qte'+id).value;
	if(!re.test(x)){
	
	var l=x[x.length-1];
	var l2=x[0]; 
	if(l2=="." || l2==","){	document.getElementById('qte'+id).value='';}
	else{
	if(l!="." && l!=","){
	x = x.substring(0, x.length-1) ;
	document.getElementById('qte'+id).value=x;
	}
	}
}


}
 
 
 
 
 
 
 
 
 function charger(){

	 var nbreligne=<?php if (isset($_GET['id'])) { $p=mysql_query("select * from facture_contenu where numfact='".$_GET['id']."'");echo mysql_num_rows($p);}else echo 1; ?>;
	 var somme=0;
	 for(i=0;i<<?php if (isset($_GET['id'])) { $p=mysql_query("select * from facture_contenu where numfact='".$_GET['id']."'");echo mysql_num_rows($p);}else echo 1; ?>;i++)
	 {
	var qte= document.getElementById('qte'+i).value;
	var pax= document.getElementById('pax'+i).value;
	var pu= document.getElementById('pu'+i).value;
	
	var montant=pu*qte*pax;
	montant=montant.toFixed(3); 
	  document.getElementById('montant'+i).value=montant ;
	 somme+=parseFloat(montant);

	  }
document.getElementById('nbreligne').value=nbreligne;

	somme=somme.toFixed(3);


var totalapayer=(parseFloat(somme)+0.5).toFixed(3);
document.getElementById('tot').innerHTML=totalapayer;
document.getElementById('total').value=totalapayer;
 
var htva1=(somme/1.06);
var htva=(htva1/1.01).toFixed(3);

/*-------*/
document.getElementById('FDCST').innerHTML=((htva*0.01).toFixed(3));
document.getElementById('sommet').innerHTML=htva;
document.getElementById('st').value=htva;
somme_ap_fdc=htva*1.01;
document.getElementById('tva').innerHTML=((somme_ap_fdc*0.06).toFixed(3));


var chaine=toWords(totalapayer*1000);
document.getElementById('prixlettre').innerHTML=chaine;


	 }
	 
	 

function supp_tr(id){
var qte =new Array();
var designation =new Array();
var pu =new Array();
var pax =new Array();
var montant =new Array();
var arrangement =new Array();

var nligne=parseInt(document.getElementById('nbreligne').value);

for(i=0; i<nligne;i++){
qte[i]= document.getElementById('qte'+i).value;
designation[i]= document.getElementById('designation'+i).value;
pu[i]= document.getElementById('pu'+i).value;
pax[i]= document.getElementById('pax'+i).value;
arrangement[i]= document.getElementById('arrangement'+i).value;


montant[i]=document.getElementById('montant'+i).value;
montant[i]=parseFloat(montant[i]).toFixed(3); 
}
document.getElementById('tableau').innerHTML='<tr id="top"><td style="width:500px;">Noms des Client</td><td style="width:10%;">Arrangement</td><td style="width:10%;">Prix unitaire</td><td style="width:10%;">Pax</td><td style="width:10%;">Jours</td><td colspan="2" style="width:10%;">Montant</td></tr>';

var cp=0;
for(var i=0; i<nligne; i++){

var id2=parseInt(cp)
var idnv2=parseInt(cp)+1;
var x1="qte"+id2;
var x2="designation"+id2;
var x3="pu"+id2;
var x4="arrangement"+id2;
var x5="pax"+id2;
var j;
if(i!=id){
//if(i<id){j=i} else {j=parseInt(i)+1;}
j=i;
var designationaff;
var arrangementaff;
var paxaff;
var qteaff;
var montantaff;
var puaff;
if(designation[j]!='') designationaff=designation[j]; else designationaff='';
if(arrangement[j]!='') arrangementaff=arrangement[j]; else arrangementaff='';
if(pax[j]!='') paxaff=pax[i]; else paxaff='1';
if(montant[j]!='0') montantaff=montant[j]; else montantaff='0';
if(pu[j]!='') puaff=pu[j]; else puaff='0';
if(qte[j]!='') qteaff=qte[j]; else qteaff='1';
document.getElementById('tableau').innerHTML+='<tr id="col'+id2+'" class="col1"><td><textarea  style="width:80%"  name="designation'+id2+'" id="designation'+id2+'"   >'+designationaff+'</textarea></td><td><input  style="width:80%" type="text" name="arrangement'+id2+'" id="arrangement'+id2+'" value="'+arrangementaff+'"  /></td><td><input  style="width:80%" type="text" name="pu'+id2+'" id="pu'+id2+'" value="'+puaff+'" onkeyup="calcul_ligne('+id2+');"  /></td><td><input  style="width:80%" type="text" name="pax'+id2+'" id="pax'+id2+'" value="'+paxaff+'" onkeyup="calcul_ligne('+id2+');"  /></td> <td><input  style="width:80%" type="text" name="qte'+id2+'" id="qte'+id2+'"  value="'+qteaff+'" onkeyup="calcul_ligne('+id2+');" /></td><td><input  style="width:80%" type="text" disabled name="montant'+id2+'" id="montant'+id2+'" value="'+montantaff+'"><input  style="width:80%" type="hidden" /></td><td><a    class ="btnsupp"  onClick="supp_tr('+id2+')" >X</a></td></tr>';
cp++;
}


}







nligne--;
document.getElementById('nbreligne').value=nligne;
calcul();
}
charger();
</script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>

