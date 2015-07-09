<?php
require_once ("fonctions.php");
require_once ("config.php");
$id=$_GET['idev'];
$idp=$_GET['idp'];
$ide=$_GET['ide'];


$sel = "SELECT chemindoc FROM documents_evenement WHERE ide='".$id."'";
$res = mysql_query($sel) ;
while ($row1 = mysql_fetch_array($res))
  {
     $chemin=$row1['chemindoc'];
     supprimer_fichier($chemin);
  }
// on libère le résultat
mysql_free_result($res);



$sql = "DELETE FROM evenement WHERE id='$id'";
$result = mysql_query($sql) ;

    
?>
<script language="Javascript">
<!--
document.location.replace("table.php?ide=<?php echo $ide; ?>&idp=<?php echo $idp; ?>");
// -->
</script>';


