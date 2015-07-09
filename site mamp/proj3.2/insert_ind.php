<?php
include('config.php');

// On commence par récupérer les champs
$idp=$_POST['idp'];
$indicateur=$_POST["indicateur"];
$form=$_POST['form'];
$resp=$_POST['resp'];
$freqmesure=$_POST['freqmesure'];


$sql1 = "INSERT INTO indicateur(processus,indicateurs,formuledecalcul,respdemesure,frequencedemesure) VALUES('$idp','$indicateur','$form','$resp','$freqmesure')";
mysql_query($sql1 ) ;

?>
<script language="Javascript">
<!--
document.location.replace("modifiertab.php?idp=<?php echo $idp;?>");
// -->
</script>';
