<?php
 include('config.php'); ?>
<?php
// On commence par récupérer les champs

if(isset($_POST['janvier']))      $janvier=$_POST['janvier'];
else      $janvier="";
if(isset($_POST['fevrier']))      $fevrier=$_POST['fevrier'];
else      $fevrier="";
if(isset($_POST['mars']))      $mars=$_POST['mars'];
else      $mars="";
if(isset($_POST['avril']))      $avril=$_POST['avril'];
else      $avril="";
if(isset($_POST['mai']))      $mai=$_POST['mai'];
else      $mai="";
if(isset($_POST['juin']))      $juin=$_POST['juin'];
else      $juin="";
if(isset($_POST['juillet']))      $juillet=$_POST['juillet'];
else      $juillet="";
if(isset($_POST['aout']))      $aout=$_POST['aout'];
else      $aout="";
if(isset($_POST['septembre']))      $septembre=$_POST['septembre'];
else      $septembre="";
if(isset($_POST['octobre']))      $octobre=$_POST['octobre'];
else      $octobre="";
if(isset($_POST['novembre']))      $novembre=$_POST['novembre'];
else      $novembre="";
if(isset($_POST['decembre']))      $decembre=$_POST['decembre'];
else      $decembre="";
if(isset($_POST['id']))      $id=$_POST['id'];
else      $id="";
if(isset($_POST['objectif']))      $objectif=$_POST['objectif'];
else      $objectif="";
if(isset($_POST['annee']))      $annee=$_POST['annee'];
else      $annee="";


// on écrit la requête sql
$sql1 = "INSERT INTO tableaux_de_bord(indicateur,janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre,objectif,annee) VALUES('$id','$janvier','$fevrier','$mars','$avril','$mai','$juin','$juillet','$aout','$septembre','$octobre','$novembre','$decembre','$objectif','$annee')";
mysql_query($sql1);
//recuperer l'id du processus concerne
// récuperer le id du processus a partir de son nom
$selecta = "SELECT processus FROM indicateur WHERE id='$id'";
$result = mysql_query($selecta);
while($row = mysql_fetch_array($result))
{
   $idp=$row['processus'];
}



$sql1 = "INSERT INTO analyse(processus,annee) VALUES('$idp','$annee')";
mysql_query($sql1);

   
?>
<script language="Javascript">
<!--
document.location.replace("param_ind.php?id=<?php echo $id; ?>");
// -->
</script>';

    