<?php
require_once ("fonctions.php"); 

// On commence par récupérer les champs
if(isset($_POST['janvier']))      $janvier=$_POST['janvier'];
else      $janvier="";
if(isset($_POST['fevrier']))      $fevrier=$_POST['fevrier'];
else      $fevrier="";
if(isset($_POST['mars']))      $mars=$_POST['mars'];
else      $mars="";
if(isset($_POST['avril']))      $avril=$_POST['avril'];
else      $avril="";
if(isset($_POST['mai']))      $mai=$_POST['mai'];
else      $mai="";
if(isset($_POST['juin']))      $juin=$_POST['juin'];
else      $juin="";
if(isset($_POST['juillet']))      $juillet=$_POST['juillet'];
else      $juillet="";
if(isset($_POST['aout']))      $aout=$_POST['aout'];
else      $aout="";
if(isset($_POST['septembre']))      $septembre=$_POST['septembre'];
else      $septembre="";
if(isset($_POST['octobre']))      $octobre=$_POST['octobre'];
else      $octobre="";
if(isset($_POST['novembre']))      $novembre=$_POST['novembre'];
else      $novembre="";
if(isset($_POST['decembre']))      $decembre=$_POST['decembre'];
else      $decembre="";
if(isset($_POST['idt']))      $idt=$_POST['idt'];
else      $idt="";
if(isset($_POST['idi']))      $idi=$_POST['idi'];
else      $idi="";
if(isset($_POST['annee']))      $annee=$_POST['annee'];
else      $annee="";
if(isset($_POST['objectif']))      $objectif=$_POST['objectif'];
else      $objectif="";

// connection à la DB
$connexion=Connect_bd();
// on écrit la requête sql
$sql = 'UPDATE tableaux_de_bord SET objectif="'.$_POST['objectif'].'",annee="'.$_POST['annee'].'",janvier="'.$_POST['janvier'].'",fevrier="'.$_POST['fevrier'].'",mars="'.$_POST['mars'].'",avril="'.$_POST['avril'].'",mai="'.$_POST['mai'].'",juin="'.$_POST['juin'].'",juillet="'.$_POST['juillet'].'",aout="'.$_POST['aout'].'",septembre="'.$_POST['septembre'].'",octobre="'.$_POST['octobre'].'",novembre="'.$_POST['novembre'].'",decembre="'.$_POST['decembre'].'" WHERE id="'.$_POST['idt'].'"  ';
	
ExecRequete ($sql, $connexion);
Deconnect_db();
?>
<script language="Javascript">
<!--
document.location.replace("param_tab.php?idt=<?php echo $idt; ?>");
// -->
</script>';
    