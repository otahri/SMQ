<?php
session_start();
include('menu_debut.php'); 
if(empty($_SESSION['user'])) echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
?>


<script type="text/javascript">
   function Supp(link){
    if(confirm('Voulez vous vraiment supprimer ce document ?')){
     document.location.href = link;
    }
   }

function valider(){

if(document.formSaisie.DOC.value == "")
{
    alert("Vous devez joindre un document PDF à cette rubrique !");
    return false;
}

return true;
}
  </script>



<?php
if(isset($_GET['idr']))
{
$idr=$_GET['idr'];
}


$select = "SELECT DISTINCT nom FROM rubriques where idr='$idr' ";
$result = mysql_query($select ) ;
while($row = mysql_fetch_array($result))
    {
      $nom=utf8_encode($row["nom"]);
    }

?>




<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="bibliotheque.php" title="Bibliotheque">
                                <i class="glyph-icon icon-book"></i>
                                Biblioth&egrave;que
                                
                            </a>
                            
                            <span class="current">
                                Documents
                            </span>
 </div>
 </div>



<div id="page-content">




<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Documents  
        <small>
            Rubrique : <?php echo $nom; ?> 
        </small>
    </div>
     

                                    
    <div class="clear"></div>
    <div class="divider"></div>
</h4>





<?php


$selecta = "SELECT * FROM documents WHERE rubrique='$idr' ";
$result = mysql_query($selecta ) ;
$total = mysql_num_rows($result);

// si on a récupéré un résultat on l'affiche.
if($total)
{
    // debut du tableau
        echo '<table class="table table-striped text-center"">'."\n";
        echo '<thead>';
        echo '<th ><b>Documents</b></th>';
       if($_SESSION['user']=='admin') { echo '<th ><b>Option</b></th>' ;}
	    echo '</thead>'."\n";
    // lecture et affichage des résultats sur 2 colonnes, 1 résultat par ligne.
    while($row = mysql_fetch_array($result))
    {
        $nd=$row["nomdoc"];
        $cd=$row["chemindoc"];
        echo '<tr >';
        echo '<td ><a href='.$cd.'>'.utf8_encode($nd).'</a></td>';
        $id=$row["id"];
        if($_SESSION['user']=='admin') { echo '<td ><a href="sup_doc.php?id='.$id.'" onclick="Supp(this.href); return(false);" class="btn small primary-bg tooltip-button" data-placement="top" title="" data-original-title="Supprimer">
                            <i class="glyph-icon icon-remove"></i> 
              </a>
            </td>';}
        echo '</tr>'."\n";
    }
    echo '</table>'."\n";
    // fin du tableau.
    // on libère le résultat

}
else echo 'Aucun document trouv&eacute; pour cette rubrique!';
?>


<?php   if($_SESSION['user']=='admin') { ?>
<form method="POST" name="formSaisie" action="insert_doc.php" onsubmit="return valider()" enctype="multipart/form-data">


            <input type="hidden" name="idr"  value="<?php echo $idr;?>">

    
    


                    <h4>Ajouter un document:</h4>

                    <div id="mulitplefileuploader">Selectionner un fichier</div>

                    <div id="status">
                            

                                      <script src="jquery.uploadfile2.js"></script>

                                        <script>
                                                        $(document).ready(function()
                                                        {
                                                        var settings = {
                                                            url: "upload2.php",
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
                                                                $.post("delete2.php",{op:"delete",name:data[i]},
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

<?php }?>










<?php include('menu_fin.php'); 

?>
