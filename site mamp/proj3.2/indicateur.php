<?php
include('menu_debut.php');


?>


<SCRIPT language="javascript">
function choix_oui(form3)
{
document.getElementById('lb').style.display='';
document.form3.fiche.type="text";
}
function choix_non(form3)
{
document.getElementById('lb').style.display='none';
document.form3.fiche.type="hidden";
}
</SCRIPT>




<?php

if(!empty($_GET['idp']))
{

$idp=$_GET['idp'];
// récuperer le id du processus a partir de son nom
$selecta = "SELECT Processus FROM processus WHERE id='$idp'";
$result = mysql_query($selecta )  or die(mysql_error());
while($row = mysql_fetch_array($result))
{
   $proc=$row['Processus'];
}

}


?>



<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Tableau de bord du Processus: 
        <small>
            <?php echo $proc; ?> en  <?php echo $_GET['annee']; ?>
        </small>
    </div>
    <div class="clear"></div>
    <div class="divider"></div>
</h4>


<div id="resultat"></div>
<div id="anc">


<?php

// connection à la DB

// requête SQL qui compte le nombre total d'enregistrement dans la table et qui
//récupère tous les enregistrements'
$annee_max=$_GET['annee'];
$selecta = "SELECT indicateurs,respdemesure,frequencedemesure,janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,objectif FROM indicateur,tableaux_de_bord WHERE indicateur.processus='$idp' and indicateur.id=tableaux_de_bord.indicateur and tableaux_de_bord.annee='$annee_max' ";
$result = mysql_query($selecta )  or die(mysql_error());
$total = mysql_num_rows($result);

// si on a récupéré un résultat on l'affiche.
if($total)
{
?>
<p>
<label for="textfield2"></label>
<input type="hidden" name="anne" id="textfield2" value="<?php echo $annee_max;?>">&nbsp;


</p>
    <div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0">
        <strong> Indicateurs du Processus: <?php echo $proc; ?> en <?php echo $annee_max; ?> </strong>
        </li>
      </ul>


      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">




<table class="table table-hover text-center">
    <thead>
        <tr>
            <th class="text-center">Indicateurs</th>
            <th class="text-center">Responsable de mesure</th>
            <th class="text-center">Frequence de mesure</th>
            <th class="text-center">Janvier</th>
            <th class="text-center">Fevrier</th>
            <th class="text-center">Mars</th>
            <th class="text-center">Avril</th>
            <th class="text-center">Mai</th>
            <th class="text-center">Juin</th>
            <th class="text-center">Juillet</th>
            <th class="text-center">Aout</th>
            <th class="text-center">Septembre</th>
            <th class="text-center">Octobre</th>
            <th class="text-center">Novembre</th>
            <th class="text-center">Decembre</th>
            <th class="text-center">Indicateur Objectif</th>
        </tr>
    </thead>


    <tbody>

    

        
            
      <?php while($row = mysql_fetch_array($result))
    {
        $freq=$row["frequencedemesure"];
        echo '<tr>';
        echo '<td >'.utf8_encode($row["indicateurs"]).'</td>';
        echo '<td >'.$row["respdemesure"].'</td>';
        echo '<td >'.$row["frequencedemesure"].'</td>';
       if($freq=="mensuelle")
        {
          echo '<td >'.$row["janvier"].'</td>';
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
        echo '</tr>'."\n";
    }
            
        ?>
        
              
    </tbody>
</table>






</div>
</div>
</div>
<br>
<?php

// connection à la DB


$selecta = "SELECT indicateurs,respdemesure,frequencedemesure,janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,objectif FROM indicateur,tableaux_de_bord WHERE indicateur.processus='$idp' and indicateur.id=tableaux_de_bord.indicateur and tableaux_de_bord.annee='$annee_max' ";
$result = mysql_query($selecta ) ;
while($row = mysql_fetch_array($result))
{
	 $indicateur=$row["indicateurs"];
     $ind=$row["objectif"];
     $janvier=$row["janvier"];
	 $fevrier=$row["fevrier"];
	 $mars=$row["mars"];
	 $avril=$row["avril"];
	 $mai=$row["mai"];
	 $juin=$row["juin"];
	 $juillet=$row["juillet"];
	 $aout=$row["aout"];
	 $septembre=$row["septembre"];
	 $octobre=$row["octobre"];
	 $novembre=$row["novembre"];
	 $decembre=$row["decembre"];
	 $frequence=$row["frequencedemesure"];
     if($frequence=="annuelle")
     {
      $values = array($decembre,$decembre,$decembre,$decembre,$decembre,$decembre,$decembre,$decembre,$decembre,$decembre,$decembre,$decembre);
      $valuess = array($ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind);
      //$values=array(1,2,3,4,5,6,7,8,9,10,11,12);
      echo "<img src='tableaudebord/exgraphe.php?values=".urlencode(serialize($values))."&valuess=".urlencode(serialize($valuess))."&indicateur=".urlencode(serialize($indicateur))."' alt='Mon graphique'/>";
     }
if($frequence=="mensuelle")
{
$values = array($janvier,$fevrier,$mars,$avril,$mai,$juin,$juillet,$aout,$septembre,$octobre,$novembre,$decembre);
$valuess = array($ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind);
//$values=array(1,2,3,4,5,6,7,8,9,10,11,12);
echo "<img src='tableaudebord/exgraphe.php?values=".urlencode(serialize($values))."&valuess=".urlencode(serialize($valuess))."&indicateur=".urlencode(serialize($indicateur))."' alt='Mon graphique'/>";
}
if($frequence=="trimestrielle")
{
$values = array($mars,$mars,$mars,$juin,$juin,$juin,$septembre,$septembre,$septembre,$decembre,$decembre,$decembre);
$valuess = array($ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind);
//$values=array(1,2,3,4,5,6,7,8,9,10,11,12);
echo "<img src='tableaudebord/exgraphe.php?values=".urlencode(serialize($values))."&valuess=".urlencode(serialize($valuess))."&indicateur=".urlencode(serialize($indicateur))."' alt='Mon graphique'/>";
}
if($frequence=="semestrielle")
{
$values = array($avril,$avril,$avril,$avril,$aout,$aout,$aout,$aout,$decembre,$decembre,$decembre,$decembre);
$valuess = array($ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind,$ind);
//$values=array(1,2,3,4,5,6,7,8,9,10,11,12);
echo "<img src='tableaudebord/exgraphe.php?values=".urlencode(serialize($values))."&valuess=".urlencode(serialize($valuess))."&indicateur=".urlencode(serialize($indicateur))."' alt='Mon graphique'/>";
}
echo "\n";
}

// on libère le résultat


?>
<br>

<?php

// connection à la DB

$selecta = "SELECT analyse,num_fiche FROM analyse WHERE processus='$idp'and annee='$annee_max' ";
$resulta = mysql_query($selecta ) ;
$totala = mysql_num_rows($resulta);

    while($rowa = mysql_fetch_array($resulta))
    {
          $analyse=utf8_encode($rowa['analyse']);
          $fich=utf8_encode($rowa['num_fiche']);
    }


if($analyse!="")
{
?>

</p><div class="display-block popover bottom">
    <div class="arrow"></div>
    <h3 class="popover-title">Analyse des resultats</h3>
    <div class="popover-content">
        <div class="pad5A">
           <p>
<label for="textfield12"></label>
<label for="textarea5"></label>
<textarea name="rm" id="textarea5" cols="140" readonly="readonly"  rows="10"><?php echo $analyse;?></textarea>
</p>
        </div>
    </div>
</div>


<?php
}
}
else
{
?>
<br>
<br>
<?php
echo 'Aucun Indicateur trouvé pour ce processus!';
}
?>

</div>



<?php include('menu_fin.php'); 


?>
