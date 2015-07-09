<?php
include('config.php'); 

// On commence par récupérer les champs
if(isset($_POST['idp']))      $idp=$_POST['idp'];
else      $idp="";
if(isset($_POST['annee']))     $annee=$_POST['annee'];
else      $annee="";
if(isset($_POST['rm']))       $analyse=$_POST['rm'];
else      $analyse="";
$analyse=$analyse;
if(isset($_POST['etat']))     $etat=$_POST['etat'];
else      $etat="";
if(isset($_POST['fiche']))    $num_fich=$_POST['fiche'];
else      $num_fich="";
$num_fich=$num_fich;

if($etat=="non")$num_fich="";

// on écrit la requête sql
$sql = 'UPDATE analyse SET analyse="'.$analyse.'" ,etat_fiche="'.$etat.'" ,num_fiche="'.$num_fich.'" WHERE processus="'.$idp.'" and annee="'.$annee.'" ';
mysql_query($sql ) ;
    
?>

<script language="Javascript">
<!--
document.location.replace("modifiertab.php?idp=<?php echo $idp;?>");
// -->
</script>';
