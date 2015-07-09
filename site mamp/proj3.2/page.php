
<?php include('menu_debut.php'); 


?>

<?php
if(isset($_GET['nom']))
{
$nom=$_GET['nom'];
}
?>

<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="index.php" title="Evenements">
                                <i class="glyph-icon icon-home"></i>
                                Acceuil
                            </a>
                            
                            
                           
                            <span class="current">
                                <?php echo $nom ?>
                            </span>
 </div>
 </div>



<div id="page-content">




<h3>
    <?php echo $nom ?>
</h3>
<p class="font-gray-dark">
    Veuillez choisir 
</p>






            <?php if($nom=='Evenements') 
                   { ?>


                            <div class="example-box">
                                <div class="example-code clearfix">


                            <ul class="sortable-elements">
                                <?php 
                                                
                                                    $select = 'SELECT DISTINCT nom,ide FROM noms_evenement  ';
                                                    $result = mysql_query($select ) ;
                         
                                                     while($ligne = mysql_fetch_array($result)) { ?>


                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="<?php echo 'processus.php?ide='.$ligne['ide']; ?>" >
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                           <?php echo ''.$ligne['nom'].'';?>
                                                        </a>
                                                    </li>
                                                    <?php } ?>
                    			
                            </ul>


                                </div>
                                </div>

                <?php }

                    else if ( $nom=='Actions')
                     {
                        ?>

                                <div class="example-box">
                                        <div class="example-code clearfix">

                                <ul class="sortable-elements">
                                

                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="processus_act.php?ida=1" >
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                           Actions corr&eacute;ctives
                                                        </a>
                                                    </li>
                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="processus_act.php?ida=2" >
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                           Actions pr&eacute;ventives
                                                        </a>
                                                    </li>
                                                   
                                
                                </ul>


                                </div>
                                </div>




                 <?php } 
                        else if ( $nom=='Gestion documentaire')
                     {
                        ?>


                                <div class="example-box">
                                 <div class="example-code clearfix">
                                <ul class="sortable-elements">
                                

                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="processusgestdoc.php" title="">
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                            Fiche d'iden. du processus
                                                        </a>
                                                    </li>
                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="fiche_doc.php?idr=9" title="">
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                            Fiche de poste
                                                        </a>
                                                    </li>
                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="fiche_doc.php?idr=8" title="">
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                            Fiche de fonction
                                                        </a>
                                                    </li>
                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="javascript:;" title="">
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                            Proc&eacute;dures normatives
                                                        </a>
                                                    </li>
                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="javascript:;" title="">
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                            Veille r&eacute;glementaire
                                                        </a>
                                                    </li>
                                                   
                                
                                </ul>

                                </div></div>




                 <?php } 
                        else if ( $nom=='Timeline')
                     {
                        ?>

                                <div class="example-box">
                                    <div class="example-code clearfix"> 

                                    <ul class="sortable-elements">
                                

                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="timeline_action.php" >
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                           Timeline Actions
                                                        </a>
                                                    </li>
                                                    <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                        <a href="timeline_even.php" >
                                                            <i class="glyph-icon icon-caret-right"></i>
                                                           Timeline Ev&eacute;nements
                                                        </a>
                                                    </li>
                                                   
                                
                                         </ul>

                                         </div></div>

                        <?php } ?>



    





<?php include('menu_fin.php'); 


?>
