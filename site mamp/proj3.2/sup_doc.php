<?php
include('config.php');

// On commence par récupérer les champs
if(isset($_GET['id']))   
{  
$id=$_GET['id'];
//récuperer l'id de la rubrique
}
$sel = "SELECT rubrique,chemindoc FROM documents WHERE id='$id'";
$result3 = mysql_query($sel ) ;
while($row3 = mysql_fetch_array($result3))
{
  $idr=$row3['rubrique'];
  $chemin=$row3['chemindoc'];
}

unlink($chemin); 

$sql = "DELETE FROM documents WHERE id='$id'";
mysql_query($sql ) ;
    
?>
<script language="Javascript">
<!--
document.location.replace("biblio.php?idr=<?php echo $idr;?>");
// -->
</script>';