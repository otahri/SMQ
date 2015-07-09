<?php include('config.php'); 
 include('menu_debut.php'); 

?>





<SCRIPT language="javascript">
function Supp(link){
    if(confirm('Voulez vous vraiment supprimer le paramétrage de cette année ?')){
     document.location.href = link;
    }
   }
</SCRIPT>


<?php
if(isset($_GET) && !empty($_GET['id']))
{
extract($_GET);
$id=$_GET['id'];

$selecta = "SELECT processus,indicateurs,frequencedemesure FROM indicateur WHERE id='$id'";
$result = mysql_query($selecta);
while($row = mysql_fetch_array($result))
{
   $idp=$row['processus'];
   $ind=utf8_encode($row['indicateurs']);
   $freq=$row['frequencedemesure'];
}

$selecta = "SELECT Processus FROM processus WHERE id='$idp'";
$result = mysql_query($selecta);
while($row = mysql_fetch_array($result))
{
   $proc=$row['Processus'];
}
}

?>


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="tableaudebord.php" title="Dashboard">
                                <i class="glyph-icon icon-table"></i>
                                Tableau de bord
                            </a>
                           
                            
                            <a href="<?php echo 'modifiertab.php?idp='.$idp.''; ?>" >
                                <i class="glyph-icon icon-cog"></i>
                                Modification des indicateurs
                            </a>
                            <span class="current">
                                Parametrage de l'indicateur : <?php echo $ind; ?> 
                            </span>
 </div>
 </div>



<div id="page-content">







<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Parametrage de l'indicateur : <?php echo $ind; ?> 
        <small>
            Processus : <?php echo $proc; ?> 
        </small>
    </div>
     

                                    
    <div class="clear"></div>
    <div class="divider"></div>
</h4>



<?php
// connection à la DB

$selecta = "SELECT * FROM tableaux_de_bord WHERE indicateur='$id'";
$result = mysql_query($selecta);
$total = mysql_num_rows($result);
if($total)
{
    // debut du tableau
        echo '<table class="table table-hover text-center">'."\n";
        echo '<thead>';
        echo '<th><b>Janvier</b></td>';
        echo '<th ><b>Fevrier</b></td>' ;
	    echo '<th ><b>Mars</b></td>' ;
        echo '<th ><b>Avril</b></td>' ;
        echo '<th ><b>Mai</b></td>' ;
        echo '<th ><b>Juin</b></td>' ;
        echo '<th ><b>Juillet</b></td>' ;
        echo '<th ><b>Aout</b></td>' ;
        echo '<th ><b>Septembre</b></td>' ;
        echo '<th ><b>Octobre</b></td>' ;
        echo '<th ><b>Novembre</b></td>' ;
        echo '<th ><b>Decembre</b></td>' ;
        echo '<th ><b>Indicateur Objectif</b></td>' ;
        echo '<th ><b>Année</b></td>' ;
        echo '<th ><b>Options</b></td>' ;
	    echo '</thead>'."\n";
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
    while($row = mysql_fetch_array($result))
    {
        echo '<tr>';
        if($freq=="mensuelle")
        {
          echo '<td ]>'.$row["janvier"].'</td>';
        }
        else
        {
          echo '<td >'.$row["janvier"].'</td>';
        }
        if($freq=="mensuelle")
        {
          echo '<td >'.$row["fevrier"].'</td>';
        }
        else
        {
          echo '<td >'.$row["fevrier"].'</td>';
        }
        if($freq=="mensuelle" || $freq=="trimestrielle")
        {
          echo '<td >'.$row["mars"].'</td>';
        }
        else
        {
          echo '<td >'.$row["mars"].'</td>';
        }
        if($freq=="mensuelle" || $freq=="semestrielle")
        {
          echo '<td >'.$row["avril"].'</td>';
        }
        else
        {
          echo '<td >'.$row["avril"].'</td>';
        }
        if($freq=="mensuelle")
        {
          echo '<td >'.$row["mai"].'</td>';
        }
        else
        {
          echo '<td >'.$row["mai"].'</td>';
        }
        if($freq=="mensuelle" || $freq=="trimestrielle")
        {
          echo '<td >'.$row["juin"].'</td>';
        }
        else
        {
          echo '<td >'.$row["juin"].'</td>';
        }
        if($freq=="mensuelle")
        {
          echo '<td >'.$row["juillet"].'</td>';
        }
        else
        {
          echo '<td >'.$row["juillet"].'</td>';
        }
        if($freq=="mensuelle" || $freq=="semestrielle")
        {
          echo '<td >'.$row["aout"].'</td>';
        }
        else
        {
          echo '<td >'.$row["aout"].'</td>';
        }
        if($freq=="mensuelle" || $freq=="trimestrielle")
        {
          echo '<td >'.$row["septembre"].'</td>';
        }
        else
        {
          echo '<td >'.$row["septembre"].'</td>';
        }
        if($freq=="mensuelle")
        {
          echo '<td >'.$row["octobre"].'</td>';
        }
        else
        {
          echo '<td >'.$row["octobre"].'</td>';
        }
        if($freq=="mensuelle")
        {
          echo '<td >'.$row["novembre"].'</td>';
        }
        else
        {
          echo '<td >'.$row["novembre"].'</td>';
        }
        if($freq=="mensuelle" || $freq=="semestrielle" || $freq=="trimestrielle" || $freq=="annuelle")
        {
          echo '<td >'.$row["decembre"].'</td>';
        }
        else
        {
          echo '<td >'.$row["decembre"].'</td>';
        }
        echo '<td >'.$row["objectif"].'</td>';
        echo '<td >'.$row["annee"].'</td>';
        $idt=$row["id"];
        echo '<td >

                        <a href="param_tab.php?idt='.$idt.'" class="btn small primary-bg tooltip-button" data-placement="top" title="" data-original-title="Modifier">
                            <i class="glyph-icon icon-gear"></i>
                        </a>
                        <a href="supp_tab.php?idt='.$idt.'" onclick="Supp(this.href); return(false);" class="btn small primary-bg tooltip-button" data-placement="top" title="" data-original-title="Supprimer">
                            <i class="glyph-icon icon-remove"></i>
                        </a>

            </td>';
        echo '</tr>'."\n";
    }
        echo '</table>'."\n";
}
else  echo 'Cet indicateur n\'est pas encore paramétré!';
// fin du tableau.
// on libère le résultat

?>




<div class="content-box mrg25B" >



            <table class="table table-hover text-left " >
            <thead>
            <th>Ajouter un nouveau parametrage</th>
            </thead>
            </table>

    <div class="content-box-wrapper" > 



                <form method="POST" action="ajouter_param.php" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?php echo $id;?>">
                <table >
                  <thead class="table table-hover text-center">
                    <th  >Janvier</th>
                    <th  >Feverier</th>
                    <th  >Mars</th>
                    <th  >Avril</th>
                    <th  >Mai</th>
                    <th  >Juin</th>
                    <th  >Juillet</th>
                    <th  >Aout</th>
                    <th  >Septembre</th>
                    <th  >Octobre</th>
                    <th  >Novembre</th>
                    <th  >Decembre</th>
                    <th  >Objectif</th>
                    <th  >Annee</th>
                  </thead>
                  <?php
                if($freq=="annuelle")
                {
                ?>
                  <tr>
                    <td  ><input type="text" name="janvier"  id="textfield1" readonly="readonly" class="formulaire2" /></td>
                    <td  ><input type="text" name="fevrier"  id="textfield2" readonly="readonly" class="formulaire2" /></td>
                    <td  ><input type="text" name="mars"  readonly="readonly"  id="textfield3" class="formulaire2" /></td>
                    <td  ><input type="text" name="avril"  readonly="readonly"  id="textfield4" class="formulaire2" /></td>
                    <td  ><input type="text" name="mai"  readonly="readonly"  id="textfield5" class="formulaire2" /></td>
                    <td  ><input type="text" name="juin"  readonly="readonly"  id="textfield6" class="formulaire2" /></td>
                    <td  ><input type="text" name="juillet"  readonly="readonly"  id="textfield7" class="formulaire2" /></td>
                    <td  ><input type="text" name="aout"  readonly="readonly"  id="textfield8" class="formulaire2" /></td>
                    <td  ><input type="text" name="septembre"  readonly="readonly"  id="textfield9" class="formulaire2" /></td>
                    <td  ><input type="text" name="octobre"  readonly="readonly"  id="textfield10" class="formulaire2" /></td>
                    <td  ><input type="text" name="novembre"  readonly="readonly"  id="textfield11" class="formulaire2" /></td>
                    <td  ><input type="text" name="decembre"  id="textfield12" class="formulaire1" /></td>
                    <td  ><input type="text" name="objectif"  id="textfield13" class="formulaire1" /></td>
                    <td  ><input type="text" name="annee"  id="textfield14" class="formulaire1" /></td>
                  </tr>
                <?php
                }
                else if($freq=="semestrielle")
                {
                ?>
                  <tr>
                    <td  ><input type="text" name="janvier"  id="textfield1" readonly="readonly" class="formulaire2"  /></td>
                    <td  ><input type="text" name="fevrier"  id="textfield2" readonly="readonly" class="formulaire2"  /></td>
                    <td  ><input type="text" name="mars"  readonly="readonly"  id="textfield3"class="formulaire2" /></td>
                    <td  ><input type="text" name="avril"   id="textfield4" class="formulaire1" /></td>
                    <td  ><input type="text" name="mai"  readonly="readonly"  id="textfield5" class="formulaire2" /></td>
                    <td  ><input type="text" name="juin"  readonly="readonly"  id="textfield6" class="formulaire2" /></td>
                    <td  ><input type="text" name="juillet"  readonly="readonly"  id="textfield7" class="formulaire2" /></td>
                    <td  ><input type="text" name="aout" style="widtd:60px;" id="textfield8" class="formulaire1" /></td>
                    <td  ><input type="text" name="septembre"  readonly="readonly" id="textfield9" class="formulaire2" /></td>
                    <td  ><input type="text" name="octobre"  readonly="readonly"  id="textfield10" class="formulaire2" /></td>
                    <td  ><input type="text" name="novembre"  readonly="readonly"  id="textfield11" class="formulaire2" /></td>
                    <td  ><input type="text" name="decembre"  id="textfield12" class="formulaire1" /></td>
                    <td  ><input type="text" name="objectif"  id="textfield13" class="formulaire1" /></td>
                    <td  ><input type="text" name="annee"  id="textfield14" class="formulaire1" /></td>
                  </tr>
                <?php
                }
                else if($freq=="trimestrielle")
                {
                ?>
                  <tr>
                    <td  ><input type="text" name="janvier"  id="textfield1" readonly="readonly" class="formulaire2"  /></td>
                    <td  ><input type="text" name="fevrier"  id="textfield2" readonly="readonly" class="formulaire2"  /></td>
                    <td  ><input type="text" name="mars" id="textfield3" class="formulaire1" /></td>
                    <td  ><input type="text" name="avril" readonly="readonly"  id="textfield4" class="formulaire2" /></td>
                    <td  ><input type="text" name="mai"  readonly="readonly"  id="textfield5" class="formulaire2" /></td>
                    <td  ><input type="text" name="juin" id="textfield6" class="formulaire1" /></td>
                    <td  ><input type="text" name="juillet"  readonly="readonly" id="textfield7" class="formulaire2" /></td>
                    <td  ><input type="text" name="aout"  readonly="readonly"  id="textfield8" class="formulaire2" /></td>
                    <td  ><input type="text" name="septembre"  id="textfield9" class="formulaire1" /></td>
                    <td  ><input type="text" name="octobre"  readonly="readonly"  id="textfield10" class="formulaire2" /></td>
                    <td  ><input type="text" name="novembre"  readonly="readonly"  id="textfield11" class="formulaire2" /></td>
                    <td  ><input type="text" name="decembre"  id="textfield12" class="formulaire1" /></td>
                    <td  ><input type="text" name="objectif"  id="textfield13" class="formulaire1" /></td>
                    <td  ><input type="text" name="annee"  id="textfield14" class="formulaire1" /></td>
                  </tr>
                <?php
                }
                else if($freq=="mensuelle")
                {
                ?>
                  <tr>
                    <td  ><input type="text" name="janvier"  id="textfield1" class="formulaire1"  /></td>
                    <td  ><input type="text" name="fevrier"  id="textfield2" class="formulaire1"  /></td>
                    <td  ><input type="text" name="mars"  id="textfield3" class="formulaire1" /></td>
                    <td  ><input type="text" name="avril"  id="textfield4" class="formulaire1" /></td>
                    <td  ><input type="text" name="mai"   id="textfield5" class="formulaire1" /></td>
                    <td  ><input type="text" name="juin"  id="textfield6" class="formulaire1" /></td>
                    <td  ><input type="text" name="juillet"  id="textfield7" class="formulaire1" /></td>
                    <td  ><input type="text" name="aout"  id="textfield8" class="formulaire1" /></td>
                    <td  ><input type="text" name="septembre" id="textfield9" class="formulaire1" /></td>
                    <td  ><input type="text" name="octobre" id="textfield10" class="formulaire1" /></td>
                    <td  ><input type="text" name="novembre" id="textfield11" class="formulaire1" /></td>
                    <td  ><input type="text" name="decembre" id="textfield12" class="formulaire1" /></td>
                    <td  ><input type="text" name="objectif" id="textfield13" class="formulaire1" /></td>
                    <td  ><input type="text" name="annee" id="textfield14" class="formulaire1" /></td>
                  </tr>
                <?php
                }
                ?>
                </table>
                <br>
                <input class="btn medium primary-bg" style="width: 100px;" type="submit" name="envoyer" value="Ajouter" />
                </form>
</div>
</div>



<?php include('menu_fin.php'); 


?>
