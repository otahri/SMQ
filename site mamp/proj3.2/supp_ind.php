<?php

include('config.php'); 


$id=$_GET['id'];


// requête SQL pour avoir le nom du processus correspondant à l'id passé par GET
$selecta = "SELECT processus FROM indicateur WHERE indicateur.id='$id' ";
$result = mysql_query($selecta ) ;
while($row = mysql_fetch_array($result))
{
        $idp=$row['processus'];
}




// on écrit la requête sql de suppression
$sql = "DELETE FROM indicateur WHERE id='$id' "  ;

// on execute la requete
mysql_query($sql ) ;

// on ferme la connexion

?>

<script language="Javascript">
<!--
document.location.replace("modifiertab.php?idp=<?php echo $idp; ?>");
// -->
</script>';
