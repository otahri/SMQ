<?php 
session_start();

include('config.php'); 


?>

<!-- AUI Framework -->
<?php include('menu_debut.php'); 


?>


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">

                                <a href="index.php" title="Evenements">
                                <i class="glyph-icon icon-home"></i>
                                Acceuil
                            </a>

                            
                            <span class="current">
                                <i class="glyph-icon icon-table"></i>
                                Tableau de bord
                            </span>
                           
 </div>
 </div>



<div id="page-content">

<h3>
    Tableau de bord
</h3>
<p class="font-gray-dark">
    Veuillez choisir un processus
</p>


<div class="example-box">
    <div class="example-code clearfix">



                    <div  id="sidebar-menu" class="scrollable-content">

                            <ul >
                                <?php 
                                                $select = "SELECT DISTINCT processus,id FROM processus  ";
                                                $result = mysql_query($select ) or die ('Erreur : '.mysql_error() );
                    							
                     
                                                 while($ligne = mysql_fetch_array($result)) { ?>


                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="javascript:;" >
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                           <?php echo ''.utf8_encode($ligne['processus']).'';?>
                                                        
                                                         </a>   
                                                        <ul>
                                                           <?php 
                                                            $id=$ligne['id'];  
                                                            $select2 = "SELECT DISTINCT annee FROM tableaux_de_bord,indicateur WHERE indicateur.processus=' $id '  and indicateur.id=tableaux_de_bord.indicateur ORDER BY annee DESC";
                                                            $result2 = mysql_query($select2 ) or die ('Erreur : '.mysql_error() );
                                                            
                                                            while($row = mysql_fetch_array($result2))
                                                               
                                                                { ?>
                                                                    
                                                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'indicateur2.php?idp='.$ligne['id'].'&annee='.$row['annee'].''; ?>">
                                                                        <i class="glyph-icon icon-chevron-right"></i>
                                                                       <?php echo ''.$row['annee'].'';?>
                                                                    </a>
                                                                </li>

                                                                     <?php }

                                                                if($_SESSION['user']=='admin') {?>   <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                                    <a href="<?php echo 'modifiertab.php?idp='.$ligne['id'].''; ?>">
                                                                        <i class="glyph-icon icon-cog"></i>
                                                                        Modifier tableau de bord
                                                                    </a>
                                                                </li>  <?php } ?>
                                                                
                                                        </ul>
                                                           

                                                    </li>
                                                     <?php } ?>

                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="tb_indic_all.php" >
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                            TOUS LES INDICATEURS
                                                        
                                                         </a>  

                                                    </li>
                    			
                            </ul>

                     
                        
                    </div>


</div>
</div>



<?php include('menu_fin.php'); 


?>
