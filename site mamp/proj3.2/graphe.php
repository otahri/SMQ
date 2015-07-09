<div> <?php

//Connexion a la base de données
include('config.php'); 

$query_conso = "SELECT janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,objectif  FROM tableaux_de_bord WHERE id=1";
$conso = mysql_query($query_conso);
$row_conso = mysql_fetch_assoc($conso);
 
include('menu_debut.php'); 
?>


		<script type="text/javascript">
$(function () {
        $('#container').highcharts({
           
            title: {
                text: 'Average fruit consumption during one week'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            xAxis: {
                categories: [
                    'Janvier',
                    'Février',
                    'Mars',
                    'Avril',
                    'Mai',
                    'Juin',
                    'Juillet',
					'Aout',
					'Septembre',
					'Octobre',
					'Novembre',
					'Décembre'
                ],
               
				plotBands: [{ // visualize the weekend
						from: 4.5,
						to: 6.5,
						
					}]
				},
				yAxis: {
					title: {
						text: 'Fruit units'
					}
				},
				tooltip: {
					shared: true,
					valueSuffix: ' units'
				},
				credits: {
					enabled: false
				},
				
				series: [{
					name: 'John',
					data: [<?php echo $row_conso[janvier]; ?>,<?php echo $row_conso[fevrier]; ?>,<?php echo $row_conso[mars]; ?>,<?php echo $row_conso[avril]; ?>,<?php echo $row_conso[mai]; ?>,<?php echo $row_conso[juin]; ?>,<?php echo $row_conso[juillet]; ?>,<?php echo $row_conso[aout]; ?>,<?php echo $row_conso[septembre]; ?>,<?php echo $row_conso[octobre]; ?>,<?php echo $row_conso[novembre]; ?>,<?php echo $row_conso[decembre]; ?>]
				}, {
					name: 'Jane',
					data: [<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>,<?php echo $row_conso[objectif]; ?>]
				}]
			});
		});


		</script>
	
	
<div id="container" style="min-width: 10px; height: 400px; margin: 0 "></div>
<div id="container" style="min-width: 10px; height: 400px; margin: 0 "></div>
<div id="container" style="min-width: 10px; height: 400px; margin: 0 "></div>




<script src="jschart/highcharts.js"></script>
<script src="jschart/exporting.js"></script>



</div>	

<?php include('menu_fin.php'); 


?>