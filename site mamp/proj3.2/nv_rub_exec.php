<?php
include('config.php'); 


$rub=addslashes($_POST['rubrique']);


$sql1 = "INSERT INTO rubriques(nom) VALUES('$rub')";
mysql_query($sql1 ) ;

   
?>
<script language="Javascript">
<!--
document.location.replace("bibliotheque.php");
// -->
</script>';

    