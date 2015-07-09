<?php
include('config.php');

$idt=$_GET['idt'];

$selecta = "SELECT indicateur FROM tableaux_de_bord WHERE id='$idt' ";
$result = mysql_query($selecta);

while($row = mysql_fetch_array($result))
{
        $idi=$row['indicateur'];
}

// on libère le résultat


// on écrit la requête sql de suppression
$sql = "DELETE FROM tableaux_de_bord WHERE id='$idt' "  ;

// on execute la requete
mysql_query($sql);



?>

<script language="Javascript">
<!--
document.location.replace("param_ind.php?id=<?php echo $idi; ?>");
// -->
</script>';