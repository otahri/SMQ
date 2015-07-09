<?php
include('config.php'); 


if(isset($_POST['idr'])&&isset($_POST['nomfich']))
{
        
  $req = "INSERT INTO documents values('','".$_POST['idr']."','".$_POST['nomfich']."','../Accueil/documents/".$_POST['nomfich']."','','','1')";
   
   $result = mysql_query($req ) ;
 } 


$idr=$_POST['idr'];


?>

echo '<script language="Javascript">
<!--
document.location.replace("fiche_doc.php?idr=<?php echo $idr;?>");
// -->
</script>';