
		<script src="assets/chart-master/Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<style>
			canvas{
			}
		</style>
	
		<canvas id="line" height="300" width="450"></canvas>

<?php
$cetteannee=date("Y");
$ancienanne=date("Y")-1;
$jan1="$ancienanne-01-01 00:00:00";$jan2="$ancienanne-01-31 23:23:59";
$fev1="$ancienanne-02-01 00:00:00";$fev2="$ancienanne-02-29 23:23:59";
$mar1="$ancienanne-03-01 00:00:00";$mar2="$ancienanne-03-31 23:23:59";
$avr1="$ancienanne-04-01 00:00:00";$avr2="$ancienanne-04-30 23:23:59";
$mai1="$ancienanne-05-01 00:00:00";$mai2="$ancienanne-05-31 23:23:59";
$juin1="$ancienanne-06-01 00:00:00";$juin2="$ancienanne-06-30 23:23:59";
$jui1="$ancienanne-07-01 00:00:00";$jui2="$ancienanne-07-31 23:23:59";
$aou1="$ancienanne-08-01 00:00:00";$aou2="$ancienanne-08-31 23:23:59";
$sep1="$ancienanne-09-01 00:00:00";$sep2="$ancienanne-09-30 23:23:59";
$oct1="$ancienanne-10-01 00:00:00";$oct2="$ancienanne-10-31 23:23:59";
$nov1="$ancienanne-11-01 00:00:00";$nov2="$ancienanne-11-30 23:23:59";
$dec1="$ancienanne-12-01 00:00:00";$dec2="$ancienanne-12-31 23:23:59";



$xjan1="$cetteannee-01-01 00:00:00";$xjan2="$cetteannee-01-31 23:23:59";
$xfev1="$cetteannee-02-01 00:00:00";$xfev2="$cetteannee-02-29 23:23:59";
$xmar1="$cetteannee-03-01 00:00:00";$xmar2="$cetteannee-03-31 23:23:59";
$xavr1="$cetteannee-04-01 00:00:00";$xavr2="$cetteannee-04-30 23:23:59";
$xmai1="$cetteannee-05-01 00:00:00";$xmai2="$cetteannee-05-31 23:23:59";
$xjuin1="$cetteannee-06-01 00:00:00";$xjuin2="$cetteannee-06-30 23:23:59";
$xjui1="$cetteannee-07-01 00:00:00";$xjui2="$cetteannee-07-31 23:23:59";
$xaou1="$cetteannee-08-01 00:00:00";$xaou2="$cetteannee-08-31 23:23:59";
$xsep1="$cetteannee-09-01 00:00:00";$xsep2="$cetteannee-09-30 23:23:59";
$xoct1="$cetteannee-10-01 00:00:00";$xoct2="$cetteannee-10-31 23:23:59";
$xnov1="$cetteannee-11-01 00:00:00";$xnov2="$cetteannee-11-30 23:23:59";
$xdec1="$cetteannee-12-01 00:00:00";$xdec2="$cetteannee-12-31 23:23:59";

 $sqt1=mysql_query("select * from nb_visite where  date>='".$jan1."' and date <='".$jan2."'");
 $sqt2=mysql_query("select * from nb_visite where  date>='".$fev1."' and date <='".$fev2."'");
 $sqt3=mysql_query("select * from nb_visite where  date>='".$mar1."' and date <='".$mar2."'");
 $sqt4=mysql_query("select * from nb_visite where  date>='".$avr1."' and date <='".$avr2."'");
 $sqt5=mysql_query("select * from nb_visite where  date>='".$mai1."' and date <='".$mai2."'");
 $sqt6=mysql_query("select * from nb_visite where  date>='".$juin1."' and date <='".$juin2."'");
 $sqt7=mysql_query("select * from nb_visite where  date>='".$jui1."' and date <='".$jui2."'");
 $sqt8=mysql_query("select * from nb_visite where  date>='".$aou1."' and date <='".$aou2."'");
 $sqt9=mysql_query("select * from nb_visite where  date>='".$sep1."' and date <='".$sep2."'");
 $sqt10=mysql_query("select * from nb_visite where  date>='".$oct1."' and date <='".$oct2."'");
 $sqt11=mysql_query("select * from nb_visite where  date>='".$nov1."' and date <='".$nov2."'");
 $sqt12=mysql_query("select * from nb_visite where  date>='".$dec1."' and date <='".$dec2."'");

 
 
  $xsqt1=mysql_query("select * from nb_visite where  date>='".$xjan1."' and date <='".$xjan2."'");
 $xsqt2=mysql_query("select * from nb_visite where  date>='".$xfev1."' and date <='".$xfev2."'");
 $xsqt3=mysql_query("select * from nb_visite where  date>='".$xmar1."' and date <='".$xmar2."'");
 $xsqt4=mysql_query("select * from nb_visite where  date>='".$xavr1."' and date <='".$xavr2."'");
 $xsqt5=mysql_query("select * from nb_visite where  date>='".$xmai1."' and date <='".$xmai2."'");
 $xsqt6=mysql_query("select * from nb_visite where  date>='".$xjuin1."' and date <='".$xjuin2."'");
 $xsqt7=mysql_query("select * from nb_visite where  date>='".$xjui1."' and date <='".$xjui2."'");
 $xsqt8=mysql_query("select * from nb_visite where  date>='".$xaou1."' and date <='".$xaou2."'");
 $xsqt9=mysql_query("select * from nb_visite where  date>='".$xsep1."' and date <='".$xsep2."'");
 $xsqt10=mysql_query("select * from nb_visite where  date>='".$xoct1."' and date <='".$xoct2."'");
 $xsqt11=mysql_query("select * from nb_visite where  date>='".$xnov1."' and date <='".$xnov2."'");
 $xsqt12=mysql_query("select * from nb_visite where  date>='".$xdec1."' and date <='".$xdec2."'");
 
 $nbsqt1=mysql_num_rows($sqt1);
 $nbsqt2=mysql_num_rows($sqt2);
 $nbsqt3=mysql_num_rows($sqt3);
 $nbsqt4=mysql_num_rows($sqt4);
 $nbsqt5=mysql_num_rows($sqt5);
 $nbsqt6=mysql_num_rows($sqt6);
 $nbsqt7=mysql_num_rows($sqt7);
 $nbsqt8=mysql_num_rows($sqt8);
 $nbsqt9=mysql_num_rows($sqt9);
 $nbsqt10=mysql_num_rows($sqt10);
 $nbsqt11=mysql_num_rows($sqt11);
 $nbsqt12=mysql_num_rows($sqt12);
 
  $xnbsqt1=mysql_num_rows($xsqt1);
 $xnbsqt2=mysql_num_rows($xsqt2);
 $xnbsqt3=mysql_num_rows($xsqt3);
 $xnbsqt4=mysql_num_rows($xsqt4);
 $xnbsqt5=mysql_num_rows($xsqt5);
 $xnbsqt6=mysql_num_rows($xsqt6);
 $xnbsqt7=mysql_num_rows($xsqt7);
 $xnbsqt8=mysql_num_rows($xsqt8);
 $xnbsqt9=mysql_num_rows($xsqt9);
 $xnbsqt10=mysql_num_rows($xsqt10);
 $xnbsqt11=mysql_num_rows($xsqt11);
 $xnbsqt12=mysql_num_rows($xsqt12);
 
 
 
 $table=array();
 $table2=array();
 array_push ($table, "$nbsqt1", "$nbsqt2", "$nbsqt3", "$nbsqt4", "$nbsqt5", "$nbsqt6", "$nbsqt7", "$nbsqt8", "$nbsqt9", "$nbsqt10", "$nbsqt11", "$nbsqt12");
 array_push ($table2, "$xnbsqt1", "$xnbsqt2", "$xnbsqt3", "$xnbsqt4", "$xnbsqt5", "$xnbsqt6", "$xnbsqt7", "$xnbsqt8", "$xnbsqt9", "$xnbsqt10", "$xnbsqt11", "$xnbsqt12");
 
 $max=max($table);
 $xmax=max($table2);
 
if($max==0) $max=1;
 $coif=100/$max;
 $xcoif=100/$max;

 $nb1=(int)$nbsqt1*$coif;
 $nb2=(int)$nbsqt2*$coif;
 $nb3=(int)$nbsqt3*$coif;
 $nb4=(int)$nbsqt4*$coif;
 $nb5=(int)$nbsqt5*$coif;
 $nb6=(int)$nbsqt6*$coif;
 $nb7=(int)$nbsqt7*$coif;
 $nb8=(int)$nbsqt8*$coif;
 $nb9=(int)$nbsqt9*$coif;
 $nb10=(int)$nbsqt10*$coif;
 $nb11=(int)$nbsqt11*$coif;
 $nb12=(int)$nbsqt12*$coif;
  
  $xnb1=(int)$xnbsqt1*$xcoif;
 $xnb2=(int)$xnbsqt2*$xcoif;
 $xnb3=(int)$xnbsqt3*$xcoif;
 $xnb4=(int)$xnbsqt4*$xcoif ;
 $xnb5=(int)$xnbsqt5*$xcoif;
 $xnb6=(int)$xnbsqt6*$xcoif;
 $xnb7=(int)$xnbsqt7*$xcoif;
 $xnb8=(int)$xnbsqt8*$xcoif;
 $xnb9=(int)$xnbsqt9*$xcoif;
 $xnb10=(int)$xnbsqt10*$xcoif;
 $xnb11=(int)$xnbsqt11*$xcoif;
 $xnb12=(int)$xnbsqt12*$xcoif;
 
 
 $table=implode(",", $table);
 $table2=implode(",", $table2);
 ?>
	<script>

		var lineChartData = {
			labels : ["Jan","Fev","Mar","Avr","Mai","Juin","Juil","Aout","Sept","Oct","Nov","Dec"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0.5)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					data : [<?php echo $table;?>]
				},
				{
					fillColor : "rgba(151,187,205,0.5)",
					strokeColor : "rgba(151,187,205,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					data : [<?php echo $table2;?>]
				}
			]
			
		}

	var myLine = new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
	
	</script>

