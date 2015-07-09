<?php 
session_start();
include('config.php'); 


?>

<?php include('menu_debut.php'); 


?>

<?php
if(!empty($_GET['idp']))
{
$idp=$_GET['idp'];
//récuperer le nom du processus a partir de son id

$sel = "SELECT Processus FROM processus WHERE id='$idp'";
$result3 = mysql_query($sel ) ;
while($row3 = mysql_fetch_array($result3))
{
  $proc=$row3['Processus'];
}

}


?>



<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="page.php?nom=Gestion%20documentaire" title="Gestion documentaire">
                                <i class="glyph-icon icon-folder-open"></i>
                                Gestion documentaire
                            </a>
                            <a href="processusgestdoc.php" title="Gestion documentaire">
                                <i class="glyph-icon icon-bars"></i>
                                Processus
                            </a>


                            <span class="current">
                                Fiche d'identification du processus
                            </span>
 </div>
 </div>



<div id="page-content">






<script type="text/javascript" src="basic.js"></script>
<script type="text/javascript" src="jspdf.debug.js"></script>


<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Fiche d'identification du processus
        <small>
            <?php echo $proc ?>
        </small>
    </div>
    
	
	<div align="right" >
        <?php if($_SESSION['user']=='admin') {?> <a href="<?php echo 'modifierproc.php?idp='.$idp.''; ?>" class="btn medium primary-bg" title="">
            <span style="width: 100px;" class="button-content">Modifier </span>
        </a>
		<?php } ?>
        
    </div>
    <div class="clear"></div>
</h4>



<div class="example-box">

    <div class="example-code clearfix">

<br>

<div  id="fromHTMLtestdiv">

                              <span style="display: none;"> 
                            
                                                             
                                                             <h1 style="font-size:200%;text-align:center">Fiche d'identification du processus</h1>
                                                                                                            <h3 style="font-size:100%;color:grey;text-align:center">
                                                                                                                <?php echo $proc ?>
                                                                                                            </h3>
                                                             <h5 style="font-size:100%;text-align:center">--------------------------------------------</h5>
                                                             <p style="font-size:5%;text-align:center">. </p>
                             </span>



                                <table class="table table-hover text-center">




                                
                                <legend class="font-bold text-left">Processus</legend>
                                <?php
                            // connection à la DB

                            $selecte = "SELECT * FROM processus WHERE id='$idp'";
                            $result1 = mysql_query($selecte ) ;
                            $total = mysql_num_rows($result1);
                            // si on a récupéré un résultat on l'affiche.
                            if($total) { ?>
                                    <thead>
                                    <tr>
                                        
                                        <th class="text-center">Processus</th>
                                        <th class="text-center">Pilote processus</th>
                                    </tr>
                                    </thead>

                                    <?php
                                    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
                                    while($row = mysql_fetch_array($result1))
                                    { 
                                    echo '<tr>';
                                    echo '<td >'.$row["Processus"].'</td>';
                                    echo '<td>'.$row["piloteprocessus"].'</td>';
                                    echo '</tr>'."\n";
                                    }
                                echo '</table>'."\n";
                                // fin du tableau.
                            }
                            else echo 'Pas d\'informations sur ce processus...';
                            // on libère le résultat

                            ?>

                                
                                <table class="table table-hover text-center">
                                <legend class="font-bold text-left">Fiche d'identification du processus</legend>
                                <?php
                            // connection à la DB

                            $selecta = "SELECT MAX(versiondoc) as vers FROM fiches_processus WHERE processus='$idp' ";
                            $result3 = mysql_query($selecta ) ;
                            while($row3 = mysql_fetch_array($result3))
                            {
                              $vers=$row3['vers'];
                            }

                            $selecta = "SELECT * FROM fiches_processus WHERE processus='$idp' and versiondoc='$vers' and archive='0' ";
                            $result = mysql_query($selecta ) ;
                            $total = mysql_num_rows($result);
                            // si on a récupéré un résultat on l'affiche.
                            if($total)
                            {?>
                                    <thead>
                                    <tr>
                                        
                                        <th class="text-center">Reference</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Version</th>
                                        <th class="text-center">Fiche</th>
                                    </tr>
                                    </thead>

                                    <?php
                                    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
                                    while($row = mysql_fetch_array($result))
                                    {
                                    echo '<tr>';
                                    echo '<td >'.$row["refdoc"].'</td>';
                                    echo '<td >'.$row["datedoc"].'</td>';
                                    echo '<td >'.$row["versiondoc"].'</td>';
                                    echo '<td ><a href='.$row["chemindoc"].'>'.$row["nomdoc"].'</a></td>';
                                    echo '</tr>'."\n";
                                    }
                                    echo '</table>'."\n";
                                    // fin du tableau.
                            }
                            else echo 'Pas de fiche d\'identification pour ce processus...';

                            ?>

                               <table class="table table-hover text-center">
                                <legend class="font-bold text-left">Les indicateurs</legend>
                                <?php

                            $selectf = "SELECT * FROM indicateur WHERE processus='$idp'  ";
                            $result = mysql_query($selectf ) ;
                            $total = mysql_num_rows($result);
                            // si on a récupéré un résultat on l'affiche.
                            if($total)
                            {?>
                                    <thead>
                                    <tr>
                                        
                                        <th class="text-center">Indicateurs</th>
                                        <th class="text-center">Formule de calcul</th>
                                        <th class="text-center">Responsable de mesure</th>
                                        <th class="text-center">Frequence de mesure</th>
                                    </tr>
                                    </thead>

                                    <?php
                                    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
                                    while($row = mysql_fetch_array($result))
                                    {
                                    echo '<tr>';
                                    echo '<td >'.utf8_encode($row["indicateurs"]).'</td>';
                                    echo '<td >'.utf8_encode($row["formuledecalcul"]).'</td>';
                                    echo '<td >'.utf8_encode($row["respdemesure"]).'</td>';
                                    echo '<td >'.$row["frequencedemesure"].'</td>';
                                    echo '</tr>'."\n";
                                    }
                                    echo '</table>'."\n";
                                    // fin du tableau.
                            }
                            else echo 'Pas d\'indicateurs pour ce processus...';
                            // on libère le résultat

                            ?>
                                <table class="table table-hover text-center">
                                <legend class="font-bold text-left">Archive</legend>
                                <?php

                            $selectf = "SELECT * FROM fiches_processus WHERE processus='$idp' and archive='1' ORDER BY versiondoc DESC  ";
                            $result4 = mysql_query($selectf ) ;
                            $total4 = mysql_num_rows($result4);
                            // si on a récupéré un résultat on l'affiche.
                            if($total4)
                            {?>
                                    <thead>
                                    <tr>
                                        
                                        <th class="text-center">Reference</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Version</th>
                                        <th class="text-center">Fiche</th>
                                        <th class="text-center">Date d'archivage</th>
                                    </tr>
                                    </thead>

                                    <?php
                                    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
                                    while($row4 = mysql_fetch_array($result4))
                                    {
                                    echo '<tr>';
                                    echo '<td >'.$row4["refdoc"].'</td>';
                                    echo '<td >'.$row4["datedoc"].'</td>';
                                    echo '<td >'.$row4["versiondoc"].'</td>';
                                    echo '<td ><a href='.$row4["chemindoc"].'>'.$row4["nomdoc"].'</a></td>';
                                    echo '<td >'.$row4["datearchive"].'</td>';
                                    echo '</tr>'."\n";
                                    }
                                    echo '</table>'."\n";
                                    // fin du tableau.
                            }
                            else echo 'Aucun archive pour ce processus...';
                            // on libère le résultat

                            ?>


                            </table>
</table></table></table></div></div></div>                                                        


<div  ><p>
<button onclick="javascript:demoFromHTML()" class="btn medium primary-bg col-md-3">Exporter le bilan</button></p></div>

</div>
</div>

<?php include('menu_fin.php'); 


?>