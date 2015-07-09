<?php session_start();
include('config.php'); 
if(empty($_SESSION['user'])) echo "<script type='text/javascript'>document.location.replace('login.php');</script>";

include('menu_debut.php');
?>






<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                             <a href="page.php?nom=Gestion%20documentaire" >
                                <i class="glyph-icon icon-folder-open"></i>
                                Gestion documentaire
                            </a>
                            
                            
                            
                            <span class="current">
                                Veille réglementaire
                            </span>
 </div>
 </div>



<div id="page-content">

<h3>
    Veille réglementaire 
</h3>
<p class="font-gray-dark">
    Historique
</p>

<div class="example-box">
    <div class="example-code clearfix">


<?php



// si on a récupéré un résultat on l'affiche.

    // debut du tableau
        echo '<table class="table table-striped text-center">'."\n";
        echo '<thead>';
        echo '<th  ><b>Date</b></th>';
        echo '<th  ><b>Référence</b></th>';
        echo '<th  ><b>Objet</b></th>';
        echo '<th  ><b>Source</b></th>';
        echo '<th  ><b>Date de Recherche</b></th>';
        echo '<th  ><b>Visa</b></th>';
	   
        echo '</thead>'."\n";
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
    

        echo '<tr >';
        echo '<td ></td>';
        echo '<td ></td>';
        echo '<td ></td>';
        echo '<td ></td>';
        echo '<td ></td>';
        echo '<td ></td>';
        
         
        echo '</tr>'."\n";
    
    echo '</table>'."\n";
    // fin du tableau.
    // on libère le résultat


?>




</div>
</div>










<?php include('menu_fin.php'); 


?>
