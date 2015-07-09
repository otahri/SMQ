<?php
include('config.php'); 
 


$ide=$_POST['ide'];

$idp=$_POST['idp'];


$datedecis=$_POST['datedecis'];

$datereali=$_POST['datereali'];

$responsable=$_POST['resp'];

$selecte=$_POST['selecte'];

$ce=$_POST['num'];


$select= "select typeevenement from evenement where id=".$ide;
   
 $result = mysql_query($select ) ;
      while($ligne = mysql_fetch_array($result)) { 

   
                                $typev=$ligne['typeevenement'];
                                
                                  }



// on écrit la requête sql
$sql = "UPDATE evenement SET code_even='$ce' , datedecis='$datedecis',daterealis='$datereali',responsable='$responsable' WHERE id='$ide'";
    
 mysql_query($sql ) ;


?>


<script language="Javascript">
<!--
document.location.replace("modifier_tab_even.php?id_e=<?php echo $ide?>");
// -->
</script>';
