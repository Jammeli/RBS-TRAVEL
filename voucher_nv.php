
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
<style>


.btnsupp{ color:rgba(255,0,0,1); font-weight:bold; border:1px solid #F00; cursor:pointer; text-decoration:none; padding:5px;}

</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top"  >
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
                     Vouchers
                   </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="index.php">Accueil</a>
                           <span class="divider">/</span>
                       </li>
                       
                       <li class="active">
                           Nouveau voucher
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
                        <h4><i class="icon-reorder"></i> Vouchers</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                
                            </span>
                    </div>
                    
                    <div class="widget-body">
                    <center>
					
					</button>
                        <?php include("voucher_man_ajout.php");?>
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
<script>

 
				  
				  
				  
function afficheligne()
{

   


var personne =new Array();
var type =new Array();
var adulte =new Array();
var enfant =new Array();
var board =new Array();
var ancien=document.getElementById('nbreligne').value;

for(i=0; i<ancien;i++){
personne[i]= document.getElementById('personne'+i).value;
type[i]= document.getElementById('type'+i).value;
adulte[i]= document.getElementById('adulte'+i).value;
enfant[i]= document.getElementById('enfant'+i).value;
board[i]= document.getElementById('board'+i).value;
}


var idxe=parseInt(ancien);


var xde='<tr id="col'+idxe+'" class="col1"><td><textarea  style="width:80%"  name="personne'+idxe+'" id="personne'+idxe+'"  ></textarea></td><td><input  style="width:80%" type="text" name="type'+idxe+'" id="type'+idxe+'" value=""  /></td><td><input  style="width:80%" type="text" name="adulte'+idxe+'" id="adulte'+idxe+'" value=""   /></td><td><input  style="width:80%" type="text" name="enfant'+idxe+'" id="enfant'+idxe+'"  value="" /></td><td><input  style="width:80%" type="text" name="board'+idxe+'" id="board'+idxe+'"   value="" /></td><td><a   class ="btnsupp" onClick="javascript: if(confirm(\'Supprimer cette ligne?\') ) supp_tr('+idxe+')" >X</a></td></tr>';







document.getElementById('tableau').deleteRow(-1);
document.getElementById('tableau').innerHTML+=xde;  
document.getElementById('tableau').innerHTML+='<tr ><td></td><td></td><td></td><td></td><td></td><td><input type="button" onclick="javascript:afficheligne();" value="+" /></td></tr>';
var nvligne=parseInt(ancien)+1;
document.getElementById('nbreligne').value=nvligne;



for(i=0; i<ancien;i++){

document.getElementById('personne'+i).innerHTML=personne[i];
document.getElementById('type'+i).value=type[i];
document.getElementById('adulte'+i).value=adulte[i];
document.getElementById('enfant'+i).value=enfant[i];
document.getElementById('board'+i).value=board[i];



}







}
 
 
	 
	

</script>

<script>
function supp_tr(id){


var personne =new Array();
var type =new Array();
var adulte =new Array();
var enfant =new Array();
var board =new Array();




var nligne=parseInt(document.getElementById('nbreligne').value);


for(i=0; i<nligne;i++){
personne[i]= document.getElementById('personne'+i).value;
type[i]= document.getElementById('type'+i).value;
adulte[i]= document.getElementById('adulte'+i).value;
enfant[i]= document.getElementById('enfant'+i).value;
board[i]= document.getElementById('board'+i).value;
}

document.getElementById('tableau').innerHTML='<tr id="top"><td style="width:500px;">GUEST</td><td style="width:12%;">ROOM TYPE</td><td style="width:12%;">ADULTS</td><td style="width:12%;">CHILDRENS</td><td style="width:12%;">BOARD</td></tr>';






var cp=0;
for(var i=0; i<nligne; i++){

var id2=parseInt(cp)
var idnv2=parseInt(cp)+1;
var x1="personne"+id2;
var x2="type"+id2;
var x4="adulte"+id2;
var x5="enfant"+id2;
var x6="board"+id2;
var j;
if(i!=id){
		//if(i<id){j=i} else {j=parseInt(i)+1;}
		j=i;
		
		var personneaff;
		var typeaff;
		var adulteaff;
		var enfantaff;
		var boardaff;
		
		if(personne[j]!='') personneaff=personne[j]; else personneaff='';
		if(type[j]!='') typeaff=type[j]; else typeaff='';
		if(adulte[j]!='') adulteaff=adulte[j]; else adulteaff='';
		if(enfant[j]!='') enfantaff=enfant[j]; else enfantaff='';
		if(board[j]!='') boardaff=board[j]; else boardaff='';


		document.getElementById('tableau').innerHTML+='<tr id="col'+id2+'" class="col1"><td><textarea  style="width:80%" type="text" name="personne'+id2+'" id="personne'+id2+'"    >'+personneaff+'</textarea></td><td><input  style="width:80%" type="text" name="type'+id2+'" id="type'+id2+'"   value="'+typeaff+'"   /></td><td><input  style="width:80%" type="text" name="adulte'+id2+'" id="adulte'+id2+'"   value="'+adulteaff+'"    /></td><td><input  style="width:80%" type="text" name="enfant'+id2+'" id="enfant'+id2+'"    value="'+enfantaff+'" /></td><td><input  style="width:80%" type="text" name="board'+id2+'" id="board'+id2+'"     value="'+boardaff+'"  /></td><td><a   class ="btnsupp" onClick="javascript: if(confirm(\'Supprimer cette ligne?\') ) supp_tr('+id2+')" >X</a></td></tr>';
		
		
		
		cp++;
}


}




document.getElementById('tableau').innerHTML+='<tr ><td></td><td></td><td></td><td></td><td></td><td><input type="button" onclick="javascript:afficheligne();" value="+" /></td></tr>';



nligne--;
document.getElementById('nbreligne').value=nligne;

}
</script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>

