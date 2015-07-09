<?php
include('config.php'); 


$idp=$_POST['idp'];
$idaction=$_POST['ida'];

$numact=$_POST['num'];

$resp=$_POST['resp'];



$datedecis=$_POST['datedecis'];

$dateecheance=$_POST['dateech'];


$dated=$_POST['datedebut'];

$datef=$_POST['datefin'];


$tache=$_POST['tache'];
$tache = addslashes( $tache );
















$sql = "UPDATE action SET code_action='$numact',datedecision='$datedecis',dateecheance='$dateecheance' ,responsable='$resp',tache='$tache',datedebut='$dated',datefin='$datefin' WHERE ida='$idaction'"  ;



mysql_query($sql ) ;


?>

<script language="Javascript">
document.location.replace("modif_act.php?id_act=<?php echo $idaction ?>");

</script>';



