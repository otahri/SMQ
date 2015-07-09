<?php session_start();
include('config.php'); 
if(empty($_SESSION['user'])) echo "<script type='text/javascript'>document.location.replace('login.php');</script>";

include('menu_debut.php'); 
?>



<?php

$select = "SELECT DISTINCT nom,idr FROM rubriques ORDER BY nom DESC";
$result = mysql_query($select ) ;
?>



<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">


                            <a href="index.php" title="Evenements">
                                <i class="glyph-icon icon-home"></i>
                                Acceuil
                            </a>
                            <span class="current" >
                                <i class="glyph-icon icon-book"></i>
                                Biblioth&egrave;que
                                
                            </span>
                            
                            
 </div>
 </div>



<div id="page-content">
    <?php if($_SESSION['user']=='admin') {?>
    <div align="right" >
        
        <a href="<?php echo 'nv_rub.php'; ?>" class="btn medium primary-bg" title="">
            <span style="width: 100px;" class="button-content">Nouveau </span>
        </a>
        <a href="<?php echo 'supp_rub.php'; ?>" class="btn medium primary-bg" title="">
            <span style="width: 100px;" class="button-content">Supprimer </span>
        </a>
    </div>
<?php } ?>




<h3>
    Biblioth&egrave;que
</h3>
<p class="font-gray-dark">
    Veuillez choisir une rubrique
</p>
<div class="example-box">
    <div class="example-code clearfix">

        <ul class="sortable-elements">
            <?php 
                           
 
                             while($ligne = mysql_fetch_array($result)) { ?>


                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                    <a href="<?php echo 'biblio.php?idr='.$ligne['idr'].''; ?>" >
                                        <i class="glyph-icon icon-caret-right"></i>
                                           <?php echo ''.utf8_encode($ligne['nom']).'';?>
                                    </a>
                                </li>
                                <?php } ?>
      
        </ul>

    </div>
    
</div>





<?php include('menu_fin.php'); 


?>
