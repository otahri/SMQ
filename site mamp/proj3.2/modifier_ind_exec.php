<?php
include('config.php'); 
// On commence par récupérer les champs
if(isset($_POST['indicateur']))      $indicateur=$_POST['indicateur'];
else      $indicateur="";
$indicateur=$indicateur;
if(isset($_POST['formuledecalcul']))      $formuledecalcul=$_POST['formuledecalcul'];
else      $formuledecalcul="";
$formuledecalcul=$formuledecalcul;
if(isset($_POST['responsable']))      $responsable=$_POST['responsable'];
else      $responsable="";
$responsable=$responsable;
if(isset($_POST['frequence']))      $frequence=$_POST['frequence'];
else      $frequence="";
$frequence=$frequence;

if(isset($_POST['id']))      $id=$_POST['id'];
else      $id="";
if(isset($_POST['idp']))      $idp=$_POST['idp'];
else      $idp="";

// Connexion au serveur MySql
// on écrit la requête sql de modification
$sql = 'UPDATE indicateur SET indicateurs="'.$_POST['indicateur'].'",formuledecalcul="'.$_POST['formuledecalcul'].'",respdemesure="'.$_POST['responsable'].'",frequencedemesure="'.$_POST['frequence'].'" WHERE id="'.$_POST['id'].'"  ';

// on insère les informations du formulaire dans la table
mysql_query($sql);
// on ferme la connexion
?>

<script language="Javascript">
<!--
document.location.replace("modifiertab.php?idp=<?php echo $idp; ?>");
// -->
</script>';


