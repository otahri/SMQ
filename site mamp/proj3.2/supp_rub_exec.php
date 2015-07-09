<?php
include('config.php'); 


if(isset($_GET['idr']))   
{  
$idr=$_GET['idr'];
}

// on écrit la requête sql
$sql =  "DELETE FROM rubriques WHERE idr='$idr'";
mysql_query($sql ) ;

    
?>
<script language="Javascript">
<!--
document.location.replace("bibliotheque.php");
// -->
</script>';