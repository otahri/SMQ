<?php include('menu_debut.php'); 


?>

<?php
if(!empty($_GET['idp']))
{
$idp=$_GET['idp'];
//récuperer le nom du processus a partir de son id

$sel = "SELECT Processus,piloteprocessus FROM processus WHERE id='$idp'";
$result3 = mysql_query($sel ) ;
while($row3 = mysql_fetch_array($result3))
{
  $proc=$row3['Processus'];
  $resp=$row3['piloteprocessus'];
}

}


?>


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="page.php?nom=Gestion%20documentaire" title="Gestion documentaire">
                                <i class="glyph-icon icon-folder-open"></i>
                                Gestion documentaire
                            </a>
                            <a href="processusgestdoc.php" title="Gestion documentaire">
                                <i class="glyph-icon icon-bars"></i>
                                Processus
                            </a>


                            <a href="consulterproc.php?idp=<?php echo $idp ?>">
                                <i class="glyph-icon icon-link"></i>
                                Fiche d'identification du processus
                            </a>


                            <span class="current">
                                Modification de la F.Id.P
                            </span>
 </div>
 </div>



<div id="page-content">




<h3>
    Modification de la F.Id.P
</h3>
<p class="font-gray-dark">
    <?php echo $proc ?>
</p>


<div class="example-box">
    <div class="example-code clearfix">

<br>





<script type="text/javascript"> 
 function Supp(link){
    if(confirm('Voulez vous vraiment supprimer cette fiche ?')){
     document.location.href = link;
    }
   }
   
function valider(){
 
if(document.formSaisie.version.value == "" || document.formSaisie.reference.value == "" || document.formSaisie.responsable.value == "" || document.formSaisie.date.value == "") 
{
    alert("Veuillez renseigner tout les champs!!");
    return false;
}

var version_pas_sure = document.formSaisie.version.value;
var format_v = /^\d{1,}$/;

if(!format_v.test(version_pas_sure))
{
alert('Veuillez saisir une version valide !!')
return false;
}

var date_pas_sure = document.formSaisie.date.value;
var format = /^(\d{1,2}\/){2}\d{4}$/;

if(!format.test(date_pas_sure))
{
alert('Veuillez saisir une date valide !!')
return false;
}

if(document.formSaisie.DOC.value == "") 
{
    alert("Vous devez joindre un document à ce processus !!");
    return false;
}

return true;
}
</script>



<?php
$max=1;

$selecta = "SELECT * FROM fiches_processus WHERE processus='$idp' ORDER BY versiondoc DESC ";
$result = mysql_query($selecta ) ;
$total = mysql_num_rows($result);

// si on a récupéré un résultat on l'affiche.
if($total)
{    
    // debut du tableau
        echo '<table  class="table table-hover text-center">'."\n";
        echo '<legend class="font-bold text-left">Liste des fiches existantes</legend>';
        echo '<thead>';
        echo '<th ><b>Reference</b></th>';
        echo '<th ><b>Date</b></th>';
        echo '<th ><b>Version</b></th>';
        echo '<th ><b>Fiche</b></th>';
        echo '<th ><b>Option</b></th>' ;
        echo '</thead>'."\n";
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
    while($row = mysql_fetch_array($result)) {
		if($max==1) {
		$ref=$row["refdoc"];
		$date=$row["datedoc"];
		$ver=$row["versiondoc"];
		}
		$max++;
        echo '<tr>';
        echo '<td >'.$row["refdoc"].'</td>';
        echo '<td >'.$row["datedoc"].'</td>';
        echo '<td >'.$row["versiondoc"].'</td>';
        echo '<td ><a href='.$row["chemindoc"].'>'.$row["nomdoc"].'</a></td>';
        $idf=$row["idf"];
        echo '<td ><a href="supp_fich.php?idf='.$idf.'" onclick="Supp(this.href); return(false);" class="btn small primary-bg tooltip-button" data-placement="top" data-original-title="Supprimer"> <i class="glyph-icon icon-remove"></i> </a></td>';

      echo '</tr>'."\n";
    }
    echo '</table>'."\n";
    // fin du tableau.
    // on libère le résultat
mysql_free_result($result);
}
else echo 'Aucun Indicateur trouvé pour ce Processus!';
?>



<form method="POST"  action="update.php" >
            <br><br>
			<input type="hidden" name="processus" value="<?php echo $proc;?>">
			<input type="hidden" name="idp" value="<?php echo $idp;?>">
			<input type="hidden" name="vers" value="<?php echo $ver;?>">
			<div class="content-box mrg25B" >



                                <table class="table table-hover text-left " >
                                <thead>
                                <th>Modifier le processus</th>
                                </thead>
                                </table>

                        <div class="content-box-wrapper" >
                                </br>
                                
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Responsable
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="responsable" type="text" name="responsable" id="textfield5" value="<?php echo $resp; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Version
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="version" type="text" name="version" id="textfield2" value="<?php echo $ver; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Reference
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="reference" type="text" name="reference" id="textfield3" value="<?php echo $ref; ?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Date
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="date" type="text" name="date" id="datepicker2" value="<?php echo $date; ?>" >
                                    </div>
                                </div>

                        </div>
                        </div>
			
			
			
			
			<script src="jquery.uploadfile2.js"></script>

    <input type="hidden" name="idr"  value="<?php echo $idr;?>">
    <br> <br>
                        <h4>Ajouter un document:</h4>

                    <div id="mulitplefileuploader">Selectionner un fichier</div>

                    <div id="status">
                            


                                        <script>
                                                        $(document).ready(function()
                                                        {
                                                        var settings = {
                                                            url: "upload.php",
                                                            dragDrop:true,
                                                            fileName: "myfile",
                                                            allowedTypes:"jpg,jpeg,png,gif,doc,docx,pdf,zip",   
                                                            returnType:"json",
                                                             onSuccess:function(files,data,xhr)
                                                            {
                                                               // alert((data));
                                                            },
                                                            showDelete:true,
                                                            deleteCallback: function(data,pd)
                                                            {
                                                            for(var i=0;i<data.length;i++)
                                                            {
                                                                $.post("delete.php",{op:"delete",name:data[i]},
                                                                function(resp, textStatus, jqXHR)
                                                                {
                                                                    //Show Message  
                                                                    $("#status").append("<div>Fichier supprimé</div>");      
                                                                });
                                                             }      
                                                            pd.statusbar.hide(); //You choice to hide/not.

                                                        }
                                                        }
                                                        var uploadObj = $("#mulitplefileuploader").uploadFile(settings);


                                                        });
                                        </script>
                                                         

                    <br><br>
                                           
                                       <input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="DOC" value="Valider" id="">

                    </div>
</form>











 

</td>
</tr>
</table>










    


<?php include('menu_fin.php'); 


?>