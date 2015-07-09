<?php
session_start();
include('config.php'); 
if(empty($_SESSION['user'])) echo "<script type='text/javascript'>document.location.replace('login.php');</script>";

?>

<!-- AUI Framework -->
<?php include('menu_debut.php'); 


?>


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="page.php?nom=Evenements" title="Evenements">
                                <i class="glyph-icon icon-chain"></i>
                                Ev&eacute;nements
                            </a>
                            
                            
                           
                            <span class="current">
                                Processus
                            </span>
 </div>
 </div>



<div id="page-content">




<h3>
    Processus
</h3>
<p class="font-gray-dark">
    Veuillez choisir un processus
</p>
<div class="example-box">
    <div class="example-code clearfix">

        <ul class="sortable-elements">
            <?php 
                            $select = 'SELECT DISTINCT processus,id FROM processus  ';
                            $result = mysql_query($select ) ;
							$ide = $_GET['ide'];
 
                             while($ligne = mysql_fetch_array($result)) { ?>


                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                    <a href="<?php echo 'table.php?ide='.$ide.'&idp='.$ligne['id'].''; ?>" >
                                        <i class="glyph-icon icon-caret-right"></i>
                                       <?php echo ''.utf8_encode($ligne['processus']).'';?>
                                    </a>
                                </li>
                                <?php } ?>
			
        </ul>

    </div>
    
</div>





<?php include('menu_fin.php'); 


?>
