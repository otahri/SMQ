<?php 
session_start();

include('config.php'); 


?>

<!-- AUI Framework -->
<?php include('menu_debut.php'); 


?>


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">

                                <a href="tableaudebord.php" title="Evenements">
                                <i class="glyph-icon icon-table"></i>
                                Tableau de bord
                                </a>

                            
                            <span class="current">
                                <i class="glyph-icon icon-clock-o"></i>
                                Annee 
                            </span>
                           
 </div>
 </div>



<div id="page-content">

<h3>
    Tableau de bord
</h3>
<p class="font-gray-dark">
    Veuillez choisir une année
</p>


<div class="example-box">
    <div class="example-code clearfix">



                    <div  id="sidebar-menu" class="scrollable-content">

                            <ul >
                                <?php 
                                                $select = "SELECT DISTINCT annee FROM tableaux_de_bord order by annee DESC";
                                                $result = mysql_query($select ) or die ('Erreur : '.mysql_error() );
                    							
                     
                                                 while($ligne = mysql_fetch_array($result)) { ?>


                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="javascript:;" >
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                           <?php echo ''.utf8_encode($ligne['annee']).'';?>
                                                        
                                                         </a>   
                                                        <ul>
                                                           
                                                                    
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=janvier'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Janvier
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=fevrier'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Fevrier
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=mars'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Mars
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=avril'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Avril
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=mai'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Mai
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=juin'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Juin
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=juillet'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Juillet
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=aout'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Aout
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=septembre'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Septembre
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=octobre'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Octobre
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=novembre'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Novembre
                                                                    </a>
                                                                </li>
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indic_all.php?annee='.$ligne['annee'].'&mois=decembre'; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                         Decembre
                                                                    </a>
                                                                </li>

                                                                     
                                                                
                                                        </ul>
                                                           

                                                    </li>
                                                     <?php } ?>
                    			
                            </ul>

                     
                        
                    </div>


</div>
</div>



<?php include('menu_fin.php'); 


?>
