<?php
require_once ("fonctions.php");

$processus=addslashes($_POST['processus']);
$version=addslashes($_POST['version']);
$idp=$_POST['idp'];
$reference=addslashes($_POST['reference']);
$date=$_POST['date'];
$responsable=addslashes($_POST['responsable']);
$vers=addslashes($_POST['vers']);

$fichier=basename($_FILES['DOC']['name']);
$temp=$_FILES['DOC']['tmp_name'];

//joindre le fichier relatif o processus modifié
try
{
$chemin=joindre_processus_modifie($fichier,$temp);
}catch (Exception $e) {
    echo '<br><b>Erreur : '.$e->getMessage().'</b>';
}

$connexion=Connect_bd();

$sql = 'UPDATE processus SET piloteprocessus="'.$responsable.'" WHERE id="'.$idp.'" ';
ExecRequete ($sql, $connexion);

$sql3 = "INSERT INTO fiches_processus(processus,refdoc,versiondoc,datedoc,nomdoc,chemindoc,archive) VALUES('$idp','$reference','$version','$date','".$_POST['nomfich']."','../gestiondoc/arz/".$_POST['nomfich']."','0')";
ExecRequete ($sql3, $connexion);

$sql2 = 'UPDATE fiches_processus SET archive="1",datearchive="'.$date.'" WHERE processus="'.$idp.'" and versiondoc="'.$vers.'" ';
ExecRequete ($sql2, $connexion);

Deconnect_db(); 

?>
<script language="Javascript">
<!--
document.location.replace("consulterproc.php?idp=<?php echo $idp; ?> ");
// -->
</script>


