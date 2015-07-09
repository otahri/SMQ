<?php
require_once ("fonctions.php");

if(isset($_GET['id']))   
{  
$id=$_GET['id'];
$connexion=Connect_bd();
// on écrit la requête sql
$sql = "DELETE FROM user WHERE id='$id'";
ExecRequete ($sql, $connexion);
Deconnect_db();
}


    
?>
<script language="Javascript">
<!--
document.location.replace("gestion_utilisateurs.php");
// -->
</script>';