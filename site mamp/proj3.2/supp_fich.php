<?php
require_once ("fonctions.php");

// On commence par récupérer les champs
if(isset($_GET['idf']))   
{  
$idf=$_GET['idf'];
//récuperer l'id de la rubrique
$connexion3=Connect_bd();
$sel = "SELECT processus,chemindoc FROM fiches_processus WHERE idf='$idf'";
$result3 = ExecRequete ($sel, $connexion3);
while($row3 = mysql_fetch_array($result3))
{
  $chemin=$row3['chemindoc'];
  $idp=$row3['processus'];
}
mysql_free_result($result3);
Deconnect_db();
}

supprimer_fichier($chemin);

$connexion=Connect_bd();
// on écrit la requête sql
$sql = "DELETE FROM fiches_processus WHERE idf='$idf'";
ExecRequete ($sql, $connexion);
Deconnect_db();// on ferme la connexion
    
?>
<script language="Javascript">
<!--
document.location.replace("modifierproc.php?idp=<?php echo $idp;?>");
// -->
</script>';