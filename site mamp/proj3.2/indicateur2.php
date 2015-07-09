<?php
include('menu_debut.php');


?>
<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="tableaudebord.php" title="Dashboard">
                                <i class="glyph-icon icon-table"></i>
                                Tableau de bord
                            </a>
                            
                            <span class="current">
                                Indicateurs
                            </span>
 </div>
 </div>



<div id="page-content">


<?php

if(!empty($_GET['idp']))
{

$idp=$_GET['idp'];
// récuperer le id du processus a partir de son nom
$selecta = "SELECT Processus FROM processus WHERE id='$idp'";
$result = mysql_query($selecta )  or die(mysql_error());
while($row = mysql_fetch_array($result))
{
   $proc=$row['Processus'];
}

}


?>






<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Tableau de bord  
        <small>
            Processus :<?php echo $proc; ?> en  <?php echo $_GET['annee']; ?>
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
$selecta = "SELECT indicateurs,respdemesure,frequencedemesure,janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,objectif FROM indicateur,tableaux_de_bord WHERE indicateur.processus='$idp' and indicateur.id=tableaux_de_bord.indicateur and tableaux_de_bord.annee='$annee_max' ";
$result = mysql_query($selecta )  or die(mysql_error());
$total = mysql_num_rows($result);

// si on a récupéré un résultat on l'affiche.
if($total)
{
?>
                    

<div class="row mrg20B">



    <?php while($row = mysql_fetch_array($result))
    {
    		?>

                            <div class="col-md-4">
                            		
                                <a  class="tile-button btn clearfix bg-white mrg30B" title="">
                                    <div class="tile-header pad15A font-size-13 popover-title">
                                       <div> <?php echo utf8_encode($row["indicateurs"]) ?></div>
                                    </div>


                                    <div class="tile-content-wrapper">
                                    	

                                        <i class="glyph-icon icon-location-arrow"><?php echo $row["objectif"] ?></i>
                                        
                                        <div class="tile-content">
                                            
                                        	
                                            
                                            <h5><i class="glyph-icon icon-user"></i>  Responsable de mesure</h5>
                                       		 <small>
                                            <?php echo utf8_encode($row["respdemesure"]) ?>
                                            </small>
                                            <h5><i class="glyph-icon icon-signal"></i>  Frequence de mesure</h5>
                                       		 <small>
                                            <?php echo utf8_encode($row["frequencedemesure"]) ?>
                                            </small>
                                        </div>
                                        
                                    </div>
                                    
                                </a>
                                <div class="content-box box-toggle button-toggle content-box-closed">
                                    <h3 class="content-box-header primary-bg">
                                        <span class="float-left"></span>
                                        
                                    </h3>
                                 </div>   


                            </div>



    <?php } ?>

   
</div>
<?php } ?>
 <script type="text/javascript">
 
    $(function() {
 
        //UNCOMMENT THE NEXT LINES: (and delete this one)
 
         $( ".white-modal-60-example" ).click(function() {
           $( "#white-modal-60-example" ).dialog({
             modal: true,
            minWidth: 500,
             minHeight: 200, 
            dialogClass: "", 
             show: "fadeIn" 
           });
           $('.ui-widget-overlay').addClass('bg-white opacity-60');
         });
 
        
    });
 
</script>




<div> 
<?php



$query_conso = "SELECT indicateurs,janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,objectif  FROM indicateur,tableaux_de_bord WHERE indicateur.processus='$idp' and indicateur.id=tableaux_de_bord.indicateur and tableaux_de_bord.annee='$annee_max' ";
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



<?php

// connection à la DB

$selecta = "SELECT analyse,num_fiche FROM analyse WHERE processus='$idp'and annee='$annee_max' ";
$resulta = mysql_query($selecta ) ;
$totala = mysql_num_rows($resulta);

    while($rowa = mysql_fetch_array($resulta))
    {
          $analyse=utf8_encode($rowa['analyse']);
          $fich=utf8_encode($rowa['num_fiche']);
    }


if($analyse!="")
{
?>


  <div class="col-lg-15">
 
        <a  class="tile-button btn bg-gray-alt" title="">
            <div class="tile-header">
                Analyse des resultats
            </div>
            <div class="tile-content-wrapper">
                
                <div class="tile-content">
                    
                </div>
                <small>
                    
                    <textarea name="rm" id="textarea5" cols="140" readonly="readonly"  rows="15"><?php echo $analyse;?></textarea>
                </small>
            </div>
            
        </a>
 
    </div>


<?php } ?>

</div>


<?php include('menu_fin.php'); 


?>


        