<?php
include('menu_debut.php');


?>
<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="tb_indic_all.php" title="Dashboard">
                                <i class="glyph-icon icon-clock-o"></i>
                                Annee
                            </a>
                            
                            <span class="current">
                                Indicateurs
                            </span>
 </div>
 </div>



<div id="page-content">





<?php

if(!empty($_GET['mois']))
{

$mois=$_GET['mois'];


}

if(!empty($_GET['annee']))
{
$annee_max=$_GET['annee'];
}

?>



<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Indicateurs de <?php echo $_GET['annee']; ?>
        <small>
            Pour le mois <strong> <?php echo $_GET['mois']; ?></strong>
        </small>
    </div>
     
    
                                    
    <div class="clear"></div>
    <div class="divider"></div>
</h4>





<div id="page-content">






<?php


$selecta = "SELECT indicateur.id,indicateurs,respdemesure,frequencedemesure,janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,objectif FROM indicateur,tableaux_de_bord WHERE indicateur.id=tableaux_de_bord.indicateur and tableaux_de_bord.annee='$annee_max' ";
$result = mysql_query($selecta )  or die(mysql_error());
$total = mysql_num_rows($result);
$i=0;
// si on a récupéré un résultat on l'affiche.
if($total)
{
?>
                    

<div class="row mrg20B">



    <?php while($row = mysql_fetch_array($result))
    {
    		?>



                <?php $freq=$row["frequencedemesure"]; 

                    if($freq=="mensuelle")
                    {

                ?>

<?php if($i%2==0) echo'<div class="row mrg20B">'; ?>
                            <div class="col-md-6">
                            		
                                <a  class="tile-button btn clearfix bg-white mrg30B" title="">
                                    <div class="tile-header pad15A font-size-13 popover-title">
                                       <div> <?php echo utf8_encode($row["indicateurs"]) ?></div>
                                       
                                    </div>


                                    <div class="tile-content-wrapper">
                                    	

                                        <i class="glyph-icon icon-arrow-<?php if($row["$mois"]-$row["objectif"]>=0) echo 'up'; else echo 'down'; ?> font-<?php if($row["$mois"]-$row["objectif"]>=0) echo 'green'; else echo 'red'; ?>"><?php echo  $row["$mois"]-$row["objectif"] ?></i>
                                        
                                        <div class="tile-content">
                                            
                                        	
                                            
                                            
                                            <h5><i class="glyph-icon icon-signal"></i>  Frequence de mesure</h5>
                                       		 <small>
                                            <?php echo utf8_encode($row["frequencedemesure"]) ?>
                                            </small>
                                            <h5><i class="glyph-icon icon-location-arrow"></i>  Objectif</h5>
                                             <small>
                                            <?php echo $row["objectif"] ?>
                                            </small>



                                            
                                        </div>
                                        
                                    </div>
                                    
                                </a>
                                <a href="<?php echo 'graphe_indic.php?annee='.$annee_max.'&indic='.$row["id"].'&mois='.$mois.''; ?>">
                                <div class="tile-footer mrg30B primary-bg ">
                                        Graphe
                                    <i class="glyph-icon icon-arrow-right"></i>
                                </div>  
                                </a>

                            </div> <?php if($i%2==1) echo'</div>'; $i++;?>

                        <?php } 
                        if($freq=="trimestrielle")
                            {
                                if($mois=="mars" || $mois=="juin" || $mois=="septembre")
                                {

                        ?>
<?php if($i%2==0) echo'<div class="row mrg20B">'; ?>
                                <div class="col-md-6">
                                    
                                        <a  class="tile-button btn clearfix bg-white mrg30B" title="">
                                            <div class="tile-header pad15A font-size-13 popover-title">
                                               <div> <?php echo utf8_encode($row["indicateurs"]) ?></div>
                                            </div>


                                            <div class="tile-content-wrapper">
                                                

                                                <i class="glyph-icon icon-arrow-<?php if($row["$mois"]-$row["objectif"]>=0) echo 'up'; else echo 'down'; ?> font-<?php if($row["$mois"]-$row["objectif"]>=0) echo 'green'; else echo 'red'; ?>"><?php echo  $row["$mois"]-$row["objectif"] ?></i>
                                                
                                                <div class="tile-content">
                                                    
                                                    
                                                    
                                                    
                                                    <h5><i class="glyph-icon icon-signal"></i>  Frequence de mesure</h5>
                                                     <small>
                                                    <?php echo utf8_encode($row["frequencedemesure"]) ?>
                                                    </small>
                                                    <h5><i class="glyph-icon icon-location-arrow"></i>  Objectif</h5>
                                                     <small>
                                                    <?php echo $row["objectif"] ?>
                                                    </small>



                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </a>
                                         <a href="<?php echo 'graphe_indic.php?annee='.$annee_max.'&indic='.$row["id"].'&mois='.$mois.''; ?>">
                                        <div class="tile-footer mrg30B primary-bg">
                                       Graphe
                                    <i class="glyph-icon icon-arrow-right"></i>
                                </div> </a>


                                </div> <?php if($i%2==1) echo'</div>'; $i++;?>

                            <?php } }

                            if($freq=="annuelle")
                                    {   
                                        if($mois=="decembre" )
                                            {


                             ?>
<?php if($i%2==0) echo'<div class="row mrg20B">'; ?>
                                    <div class="col-md-6">
                                    
                                        <a  class="tile-button btn clearfix bg-white mrg30B" title="">
                                            <div class="tile-header pad15A font-size-13 popover-title">
                                               <div> <?php echo utf8_encode($row["indicateurs"]) ?></div>
                                            </div>


                                            <div class="tile-content-wrapper">
                                                

                                                <i class="glyph-icon icon-arrow-<?php if($row["$mois"]-$row["objectif"]>=0) echo 'up'; else echo 'down'; ?> font-<?php if($row["$mois"]-$row["objectif"]>0) echo 'green'; else echo 'red'; ?>"><?php echo  $row["$mois"]-$row["objectif"] ?></i>
                                                
                                                <div class="tile-content">
                                                    
                                                    
                                                    
                                                    
                                                    <h5><i class="glyph-icon icon-signal"></i>  Frequence de mesure</h5>
                                                     <small>
                                                    <?php echo utf8_encode($row["frequencedemesure"]) ?>
                                                    </small>
                                                    <h5><i class="glyph-icon icon-location-arrow"></i>  Objectif</h5>
                                                     <small>
                                                    <?php echo $row["objectif"] ?>
                                                    </small>



                                                    
                                                </div>
                                                
                                            </div>
                                            
                                        </a>

                                        <a href="<?php echo 'graphe_indic.php?annee='.$annee_max.'&indic='.$row["id"].'&mois='.$mois.''; ?>">
                                        <div class="tile-footer mrg30B primary-bg">
                                        Graphe
                                    <i class="glyph-icon icon-arrow-right"></i>
                                	</div> 
                                	</a>

                                    </div> <?php if($i%2==1) echo'</div>'; $i++;?>




                                    <?php } } ?>



    <?php } } ?>

   
</div>















<?php 
include('menu_fin.php'); 
?>    
