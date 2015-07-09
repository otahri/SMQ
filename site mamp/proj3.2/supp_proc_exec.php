<?php
include('config.php'); 


if(!empty($_GET['idp']))
{
$idp=$_GET['idp'];
}

$sql = "DELETE FROM processus WHERE id='$idp'";
mysql_query($sql ) ;
    
?>
<script language="Javascript">
<!--
document.location.replace("processusgestdoc.php");
// -->
</script>';


