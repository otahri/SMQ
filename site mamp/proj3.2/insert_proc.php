<?php
include ('config.php'); 

if(isset($_POST['processus']))
{
$processus=$_POST['processus'];
}


if(isset($_POST['version']))
{
$version=$_POST['version'];
}

if(isset($_POST['reference']))
{
$reference=$_POST['reference'];
}

if(isset($_POST['date']))
{
$date=$_POST['date'];
}

if(isset($_POST['responsable']))
{
$responsable=$_POST['responsable'];
}

if(isset($_POST['indicateur']))
{
$indicateur=$_POST["indicateur"];
}

if(isset($_POST['form']))
{
$form=$_POST['form'];
}

if(isset($_POST['resp']))
{
$resp=$_POST['resp'];
}

if(isset($_POST['freqmesure']))
{
$freqmesure=$_POST['freqmesure'];
}



$sql = "INSERT INTO processus(Processus,piloteprocessus) VALUES('$processus','$responsable')";
mysql_query($sql ) ;

$sql2 = "SELECT id FROM processus WHERE Processus='$processus'";
$result1=mysql_query($sql2 ) ; 

while($row1 = mysql_fetch_array($result1))
        {
        $idp=$row1['id'];
        }
$sql1 = "INSERT INTO indicateur(processus,indicateurs,formuledecalcul,respdemesure,frequencedemesure) VALUES('$idp','$indicateur','$form','$resp','$freqmesure')";

mysql_query($sql1 ) ;
    
if(isset($_POST['reference'])&&isset($_POST['version'])&&isset($_POST['date'])&&isset($_POST['nomfich']))
{
        
  $req = "INSERT INTO fiches_processus(processus,refdoc,versiondoc,datedoc,nomdoc,chemindoc,archive) VALUES('".$idp."','".$_POST['reference']."','".$_POST['version']."','".$_POST['date']."','".$_POST['nomfich']."','../gestiondoc/arz/".$_POST['nomfich']."','0')";
   
   $result = mysql_query($req ) ;
 } 


?>


<script language="Javascript">
<!--
document.location.replace("processusgestdoc.php");
// -->
</script>
