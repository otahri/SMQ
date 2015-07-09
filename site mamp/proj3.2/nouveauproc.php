<?php include('config.php'); 

include('menu_debut.php'); 


?>


<script type="text/javascript">
function valider(){

if(document.formSaisie.processus.value == "" || document.formSaisie.version.value == "" || document.formSaisie.reference.value == "" || document.formSaisie.responsable.value == "" || document.getElementById('textfield13').value == "" ||  document.getElementById('textfield15').value == "" || document.formSaisie.date.value == "")
{
    alert("Veuillez renseigner tout les champs obligatoires!!");
    return false;
}

if(document.formSaisie.DOC.value == "")
{
    alert("Vous devez joindre un document à ce processus");
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

return true;
}
</script>




<script type="text/javascript" src="indicateur_validator.js"></script>
<script language="javascript">
var cptIndicateur = 1;
</script>






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


                            


                            <span class="current">
                                Nouveau F.Id.P
                            </span>
 </div>
 </div>



<div id="page-content">





<h3>
    Processus
</h3>
<p class="font-gray-dark">
    Ajouter un nouveau processus
</p>
    <div class="divider"></div>

    
    

</br>
<form method="POST" name="formSaisie" action="insert_proc.php" onsubmit="return valider()" enctype="multipart/form-data" class="col-md-10 center-margin">



                        <div class="content-box mrg25B" >



                                <table class="table table-hover text-left " >
                                <thead>
                                <th>Nouveau Processus</th>
                                </thead>
                                </table>

                        <div class="content-box-wrapper" >
                                </br>
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Processus
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="Processus" type="text" name="processus" id="textfield">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Responsable
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="responsable" type="text" name="responsable" id="textfield5">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Version
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="version" type="text" name="version" id="textfield2">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Reference
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="reference" type="text" name="reference" id="textfield3">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-label col-md-2">
                                        <label for="">
                                            Date
                                        </label>
                                    </div>
                                    <div class="form-input col-md-10">
                                        <input placeholder="date" type="text" name="date" id="datepicker2" >
                                    </div>
                                </div>

                        </div>
                        </div>


                        

                        <div class="content-box mrg25B" >



                                <table class="table table-hover text-left " >
                                <thead>
                                <th>Ajouter un indicateur</th>
                                </thead>
                                </table>

                        <div class="content-box-wrapper" >

                                </br>
                        <div class="form-row">
                            <div class="form-label col-md-2">
                                <label for="">
                                    Indicateur
                                </label>
                            </div>
                        <div class="form-input col-md-10">
                                
                        <textarea name="indicateur" id="textfield13" class="indicateur fond_formulaire2" cols="20" rows="3" ></textarea>
                        
                        </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-label col-md-2">
                                <label for="">
                                    Formule de calcul
                                </label>
                            </div>
                        <div class="form-input col-md-10">
                                
                        <textarea name="form" id="textfield14" class="indicateur fond_formulaire2" cols="20" rows="3"></textarea>    
                        </div>
                        </div>

                        <div class="form-row">
                            <div class="form-label col-md-2">
                                <label for="">
                                    Resp. de mesure
                                </label>
                            </div>
                        <div class="form-input col-md-10">
                                
                        <input type="text" name="resp" id="textfield15" class="indicateur fond_formulaire2" />    
                        </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-label col-md-2">
                                <label for="">
                                    Freq. de mesure
                                </label>
                            </div>
                        <div class="form-input col-md-10">
                                
                        <select name="freqmesure" id="select" class="indicateur fond_formulaire2">
                            <option>annuelle</option>
                            <option>trimestrielle</option>
                            <option>semestrielle</option>
                            <option>mensuelle</option>
                        </select>    
                        </div>
                        </div>

                        </div>
                        </div>

        

 <script src="jquery.uploadfile2.js"></script>

    <br>
    
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



        <input style="width: 200px;" type="submit"  class="btn medium primary-bg " name="envoyer" value="Ajouter">
</form>

<?php include('menu_fin.php'); 


?>

