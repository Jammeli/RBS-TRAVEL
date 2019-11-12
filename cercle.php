

		<script src="assets/chart-master/Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<style>
			canvas{
			}
		</style>
	
		<canvas id="canvas" height="300" width="450"></canvas>

<?php
 $sqt1=mysql_query("select * from views where type='hotel'");
 $sqt2=mysql_query("select * from views where type='voyage'");
 $sqt3=mysql_query("select * from views where type='excursion'");
 $sqt4=mysql_query("select * from views where type='circuit'");
 $sqt5=mysql_query("select * from views where type='croisiere'");
 
 $nbsqt1=mysql_num_rows($sqt1);
 $nbsqt2=mysql_num_rows($sqt2);
 $nbsqt3=mysql_num_rows($sqt3);
 $nbsqt4=mysql_num_rows($sqt4);
 $nbsqt5=mysql_num_rows($sqt5);
 $sommest=$nbsqt1+$nbsqt2+$nbsqt3+$nbsqt4+$nbsqt5;
 if($sommest==0)$sommest=1;
 $coif=340/$sommest;
 
 ?>
	<script>

		var doughnutData = [
				{
					value: <?php echo $coif*$nbsqt1;?>,
					color:"#F7464A"
				},
				{
					value : <?php echo $coif*$nbsqt2;?>,
					color : "#46BFBD"
				},
				{
					value : <?php echo $coif*$nbsqt3;?>,
					color : "#FDB45C"
				},
				{
					value : <?php echo $coif*$nbsqt4;?>,
					color : "#949FB1"
				},
				{
					value : <?php echo $coif*$nbsqt5;?>,
					color : "#000"
				}
			
			];

	var myDoughnut = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(doughnutData);
	
	</script>
<font ><span style=" position:absolute;height:20px; width:20px; background-color:#F7464A;"></span>
<span  style="margin-left:21px;">Hotels:<?php echo (int)(($coif*$nbsqt1)*100/360);?>%</span></span> </font>	

<font ><span style=" position:absolute;height:20px; width:20px; background-color:#46BFBD;"></span>
<span  style="margin-left:21px;">Voyages:<?php echo (int)(($coif*$nbsqt2)*100/360);?>%</span> </font>

<font ><span style=" position:absolute;height:20px; width:20px; background-color:#FDB45C;"></span>
<span  style="margin-left:21px;">Excursion:<?php echo (int)(($coif*$nbsqt3)*100/360);?>% </span></font>

<font ><span style=" position:absolute;height:20px; width:20px; background-color:#949FB1;"></span>
<span  style="margin-left:21px;">Circuits:<?php echo (int)(($coif*$nbsqt4)*100/360);?>%</span> </font>	

<font ><span style=" position:absolute;height:20px; width:20px; background-color:#000;"></span>
<span  style="margin-left:21px;">Croisiere:<?php echo (int)(($coif*$nbsqt5)*100/360);?>% </span></font>