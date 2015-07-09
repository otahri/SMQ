<?php
include('menu_debut.php');


?>


<?php

if(!empty($_GET['indic']))
{

$indic=$_GET['indic'];


}

if(!empty($_GET['annee']))
{
$annee_max=$_GET['annee'];
}

if(!empty($_GET['mois']))
{

$mois=$_GET['mois'];


}

?>


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'indic_all.php?annee='.$annee_max.'&mois='.$mois.''; ?>" >
                                <i class="glyph-icon icon-table"></i>
                                Indicateurs
                            </a>
                            
                            <span class="current">
                                Graphe
                            </span>
 </div>
 </div>



<div id="page-content">









<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Graphe 
        <small>
            Année : <strong><?php echo $_GET['annee']; ?></strong>
        </small>
    </div>
     
    
                                    
    <div class="clear"></div>
    <div class="divider"></div>
</h4>










<div id="page-content">


<?php

// connection à la DB

// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements'
$annee_max=$_GET['annee'];
?>





<div> 
<?php



$query_conso = "SELECT indicateur.id,indicateurs,janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,objectif  FROM indicateur,tableaux_de_bord WHERE indicateur.id='$indic' and indicateur.id=tableaux_de_bord.indicateur and tableaux_de_bord.annee='$annee_max' ";
$conso = mysql_query($query_conso) or die(mysql_error());


  $i=0;
 while(($row =mysql_fetch_array($conso)) && ($i<20))
    {
?>


		<script type="text/javascript">
$(function () {


        $('#container_<?php echo $i?>').highcharts({
           
            title: {
                text: '<?php echo json_encode(utf8_encode($row["indicateurs"])) ?>'
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
               
				
				},
				yAxis: {
					title: {
						text: 'Croissance'
					}
				},
				tooltip: {
					shared: true,
					
				},
				credits: {
					enabled: false
				},
				
				series: [{
					name: 'Indicateur',
					data: [<?php echo $row[janvier]; ?>,<?php echo $row[fevrier]; ?>,<?php echo $row[mars]; ?>,<?php echo $row[avril]; ?>,<?php echo $row[mai]; ?>,<?php echo $row[juin]; ?>,<?php echo $row[juillet]; ?>,<?php echo $row[aout]; ?>,<?php echo $row[septembre]; ?>,<?php echo $row[octobre]; ?>,<?php echo $row[novembre]; ?>,<?php echo $row[decembre]; ?>]
				}, {
					name: 'Objectif',
					data: [<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>,<?php echo $row[objectif]; ?>]
				}]
			});
		});


		</script>
		</br>
		<div class="content-box border-top ">
		</br></br>

		<div id="container_<?php echo $i; ?>" style="min-width: 10px; height: 400px; margin: 0 "></div>
        </div>

                        <div  class="content-box box-toggle button-toggle content-box-closed">
                                    <h3 class="content-box-header primary-bg">
                                        <span class="float-left">Tableau</span>
                                        <a href="#" class="float-right icon-separator btn toggle-button" >
                                            <i class="glyph-icon icon-toggle icon-chevron-down"></i>
                                        </a>
                                        
                                    </h3>

                                    <div class="content-box-wrapper">
                                                 <table class="table table-hover text-center">
                                        <thead>
                                            <tr>
                                                
                                                <th class="text-center">Janvier</th>
                                                <th class="text-center">Fevrier</th>
                                                <th class="text-center">Mars</th>
                                                <th class="text-center">Avril</th>
                                                <th class="text-center">Mai</th>
                                                <th class="text-center">Juin</th>
                                                <th class="text-center">Juillet</th>
                                                <th class="text-center">Aout</th>
                                                <th class="text-center">Septembre</th>
                                                <th class="text-center">Octobre</th>
                                                <th class="text-center">Novembre</th>
                                                <th class="text-center">Decembre</th>
                                                
                                            </tr>
                                        </thead>


                                        <tbody>

                                        

                                            
                                                
                                          <?php 

                                            $freq=$row["frequencedemesure"];
                                            echo '<tr>';
                                            
                                           if($freq=="mensuelle")
                                            {
                                              echo '<td >'.$row["janvier"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["janvier"].'</td>';
                                            }
                                            if($freq=="mensuelle")
                                            {
                                              echo '<td >'.$row["fevrier"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["fevrier"].'</td>';
                                            }
                                            if($freq=="mensuelle" || $freq=="trimestrielle")
                                            {
                                              echo '<td >'.$row["mars"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["mars"].'</td>';
                                            }
                                            if($freq=="mensuelle" || $freq=="semestrielle")
                                            {
                                              echo '<td >'.$row["avril"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["avril"].'</td>';
                                            }
                                            if($freq=="mensuelle")
                                            {
                                              echo '<td >'.$row["mai"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["mai"].'</td>';
                                            }
                                            if($freq=="mensuelle" || $freq=="trimestrielle")
                                            {
                                              echo '<td >'.$row["juin"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["juin"].'</td>';
                                            }
                                            if($freq=="mensuelle")
                                            {
                                              echo '<td >'.$row["juillet"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["juillet"].'</td>';
                                            }
                                            if($freq=="mensuelle" || $freq=="semestrielle")
                                            {
                                              echo '<td >'.$row["aout"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["aout"].'</td>';
                                            }
                                            if($freq=="mensuelle" || $freq=="trimestrielle")
                                            {
                                              echo '<td >'.$row["septembre"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["septembre"].'</td>';
                                            }
                                            if($freq=="mensuelle")
                                            {
                                              echo '<td >'.$row["octobre"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["octobre"].'</td>';
                                            }
                                            if($freq=="mensuelle")
                                            {
                                              echo '<td >'.$row["novembre"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["novembre"].'</td>';
                                            }
                                            if($freq=="mensuelle" || $freq=="semestrielle" || $freq=="trimestrielle" || $freq=="annuelle")
                                            {
                                              echo '<td >'.$row["decembre"].'</td>';
                                            }
                                            else
                                            {
                                              echo '<td >'.$row["decembre"].'</td>';
                                            }
                                            
                                            echo '</tr>';
                                        
                                                
                                            ?>
                                            
                                                  
                                        </tbody>
                                    </table>
                                        

                                    </div>
                                </div>


                              
		</br></br>
				


<?php

   $i++; } 
 ?>
	
<script src="jschart/highcharts.js"></script>
<script src="jschart/exporting.js"></script>


</div>	






<?php include('menu_fin.php'); 


?>


        