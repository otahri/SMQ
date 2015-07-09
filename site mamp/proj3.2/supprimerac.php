<?php
include  ("fonctions.php");

include ('menu_debut.php'); 

$ida=$_GET['ida'];
$idp=$_GET['idp'];
$idta=$_GET['idta'];

$sql1 = "SELECT nomdoc,chemindoc FROM documents_action WHERE action='$ida' "  ;
$result=mysql_query($sql1 ) ;
while($row = mysql_fetch_array($result))
        {
          $cd=$row['chemindoc'];
        }
supprimer_fichier($cd);
mysql_free_result($result);



$sql = "DELETE FROM action WHERE ida='$ida' "  ;
mysql_query($sql ) ;

?>

<script language="Javascript">
<!--
document.location.replace("table_action.php?ida=<?php echo $idta;?>&idp=<?php echo $idp;?>");
// -->
</script>';

