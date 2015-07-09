<?php 
 include('menu_debut.php'); 

?>

<script type="text/javascript">
   function Supp(link){
    if(confirm('Voulez vous vraiment supprimer cet indicateur ?')){
     document.location.href = link;
    }
   }

function valider(){

if(document.formSaisie.indicateur.value == "" || document.formSaisie.resp.value == "")
{
    alert("Veuillez renseigner tout les champs obligatoires!!");
    return false;
}

return true;
}
  </script>





<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="tableaudebord.php" title="Dashboard">
                                <i class="glyph-icon icon-table"></i>
                                Tableau de bord
                            </a>
                            
                            
                            <span class="current">
                                Modification des indicateurs
                            </span>
 </div>
 </div>



<div id="page-content">






<?php
if(isset($_GET['idp']))
{
$idp=$_GET['idp'];
// récuperer le id du processus a partir de son nom
$selecta = "SELECT Processus FROM processus WHERE id='$idp'";
$result = mysql_query($selecta ) ;
while($row = mysql_fetch_array($result))
{
   $proc=$row['Processus'];
}

}
else if(isset($_POST['select']))
{
$proc=$_POST['select'];
// récuperer le id du processus a partir de son nom
$selecta = "SELECT id FROM processus WHERE Processus='$proc'";
$result = mysql_query($selecta ) ;
while($row = mysql_fetch_array($result))
{
   $idp=$row['id'];
}

}
?>

<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Modification des indicateurs 
        <small>
            Processus : <?php echo $proc; ?> 
        </small>
    </div>
     

                                    
    <div class="clear"></div>
    <div class="divider"></div>
</h4>




    
	


<?php
// connection à la DB

// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements'
$selecta = "SELECT id,indicateurs,formuledecalcul,respdemesure,frequencedemesure FROM indicateur WHERE processus='$idp' ";
$result = mysql_query($selecta ) ;
$total = mysql_num_rows($result);

// si on a récupéré un résultat on l'affiche.
if($total)
{
    // debut du tableau
        echo '<table class="table table-hover text-center" >'."\n";
        echo '<thead >';
        echo '<th  ><b>Indicateurs</b></td>';
	    echo '<th ><b>Formule de calcul</b></td>';
        echo '<th ><b>Responsable de mesure</b></td>';
        echo '<th ><b>Frequence de mesure</b></td>';
        //echo '<td bgcolor="#BF9FDF"><b>Indicateur objectif</b></td>' ;
        //echo '<td bgcolor="#BF9FDF"><b>Année</b></td>' ;
        echo '<th ><b>Options</b></td>' ;
	    echo '</thead>'."\n";
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
    while($row = mysql_fetch_array($result)) {
        echo '<tr>';
        echo '<td >'.utf8_encode($row["indicateurs"]).'</td>';
	    echo '<td >'.utf8_encode($row["formuledecalcul"]).'</td>';
        echo '<td >'.utf8_encode($row["respdemesure"]).'</td>';
        echo '<td >'.utf8_encode($row["frequencedemesure"]).'</td>';
        //echo '<td bgcolor="#CCCCCC">'.$row["indicateurobjectif"].'</td>';
        //echo '<td bgcolor="#CCCCCC">'.$row["annee"].'</td>';
        $annee=$row["annee"];
        $id=$row["id"];
        echo '<td >     <a href="modifier_ind.php?idp='.$idp.'&id='.$id.'" class="btn small primary-bg tooltip-button" data-placement="top" title="" data-original-title="Modifier">
                            <i class="glyph-icon icon-gear"></i>
                        </a>
                        <a href="param_ind.php?id='.$id.'" class="btn small primary-bg tooltip-button" data-placement="top" title="" data-original-title="Remplir">
                            <i class="glyph-icon icon-edit"></i>
                        </a>
                        <a href="supp_ind.php?id='.$id.'" onclick="Supp(this.href); return(false);" class="btn small primary-bg tooltip-button" data-placement="top" title="" data-original-title="Supprimer">
                            <i class="glyph-icon icon-remove"></i>
                        </a>
              </td>';

      echo '</tr>'."\n";
    }
    echo '</table>'."\n";
    // fin du tableau.

}
else echo 'Aucun Indicateur trouvé pour ce Processus!';
?>


</br>




<div class="content-box mrg25B" >



            <table class="table table-hover text-left " >
            <thead>
            <th>Ajouter un indicateur</th>
            </thead>
            </table>

    <div class="content-box-wrapper" >
              


    

    
                <div>

                    <form method="POST" name="formSaisie" action="insert_ind.php" onsubmit="return valider()" enctype="multipart/form-data">
                        <input type="hidden" name="idp"  value="<?php echo $idp;?>">

                        <div class="form-row">
                            <div class="form-label col-md-2">
                                <label for="">
                                    Indicateur
                                </label>
                            </div>
                        <div class="form-input col-md-10">
                                
                        <textarea name="indicateur" id="textfield13" class="indicateur fond_formulaire2" cols="20" rows="3" ></textarea>
                        
                        </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-label col-md-2">
                                <label for="">
                                    Formule de calcul
                                </label>
                            </div>
                        <div class="form-input col-md-10">
                                
                        <textarea name="form" id="textfield14" class="indicateur fond_formulaire2" cols="20" rows="3"></textarea>    
                        </div>
                        </div>

                        <div class="form-row">
                            <div class="form-label col-md-2">
                                <label for="">
                                    Resp. de mesure
                                </label>
                            </div>
                        <div class="form-input col-md-10">
                                
                        <input type="text" name="resp" id="textfield15" class="indicateur fond_formulaire2" />    
                        </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-label col-md-2">
                                <label for="">
                                    Freq. de mesure
                                </label>
                            </div>
                        <div class="form-input col-md-10">
                                
                        <select name="freqmesure" id="select" class="indicateur fond_formulaire2">
                            <option>annuelle</option>
                            <option>trimestrielle</option>
                            <option>semestrielle</option>
                            <option>mensuelle</option>
                        </select>    
                        </div>
                        </div>
                        
                       
                        <input  style="width: 100px;"   class="btn medium primary-bg " type="submit" name="envoyer" value="Ajouter">

                    </form>
                </div>



                 


    </div>


 </div>

</br>

<div  id="sidebar-menu" class="scrollable-content">

        <ul >
            


                                <li class="ui-state-default radius-all-4 pad4A pad15L pad15R mrg5T mrg5B">
                                    <a href="javascript:;" >
                                        <i class="glyph-icon icon-caret-right"></i>
                                       Analyse
                                    
                                     </a>   
                                    <ul>
                                       <?php 
                                        $select2 = "SELECT DISTINCT annee FROM analyse WHERE processus='$idp' ORDER BY annee DESC";
                                        $result2 = mysql_query($select2 ) or die ('Erreur : '.mysql_error() );
                                        
                                        while($row = mysql_fetch_array($result2))
                                           
                                            { ?>
                                                
                                            <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                                <a href="<?php echo 'analyse.php?idp='.$idp.'&annee='.$row['annee'].''; ?>">
                                                    <i class="glyph-icon icon-chevron-right"></i>
                                                   <?php echo ''.$row['annee'].'';?>
                                                </a>
                                            </li>

                                                 <?php }?>
                                            
                                    </ul>
                                       

                                </li>
                              
			
        </ul>

 
    
</div>








    
   

<?php include('menu_fin.php'); 


?>
