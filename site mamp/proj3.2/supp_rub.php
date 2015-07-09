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


                            <a href="bibliotheque.php" title="Evenements">
                                <i class="glyph-icon icon-book"></i>
                                Biblioth&egrave;que
                            </a>
                            <span class="current" >
                                
                                Supprimer rubrique
                                
                            </span>
                            
                            
 </div>
 </div>



<div id="page-content">
    


<h3>
    Biblioth&egrave;que
</h3>
<p class="font-gray-dark">
    Veuillez supprimer une rubrique
</p>
<div class="example-box">
    <div class="example-code clearfix">

        <ul class="sortable-elements">
            <?php 
                           
 
                             while($ligne = mysql_fetch_array($result)) { ?>


                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                    <a onclick="Supp(this.href); return(false);" href="<?php echo 'supp_rub_exec.php?idr='.$ligne['idr'].''; ?>" >

                                        <i class="glyph-icon icon-remove"></i>

                                           <?php echo ''.utf8_encode($ligne['nom']).'';?>
                                    </a>
                                </li>
                                <?php } ?>
      
        </ul>

    </div>
    
</div>





<?php include('menu_fin.php'); 


?>
