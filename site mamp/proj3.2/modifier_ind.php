<?php include('config.php'); 
 include('menu_debut.php'); 

?>





<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
}


if(isset($_GET['idp']))
{
$idp=$_GET['idp'];
// récuperer le id du processus a partir de son nom
$selecta = "SELECT Processus FROM processus WHERE id='$idp'";
$result = mysql_query($selecta ) ;
while($row = mysql_fetch_array($result))
{
   $proc=$row['Processus'];
}

}
else if(isset($_POST['select']))
{
$proc=$_POST['select'];
// récuperer le id du processus a partir de son nom
$selecta = "SELECT id FROM processus WHERE Processus='$proc'";
$result = mysql_query($selecta ) ;
while($row = mysql_fetch_array($result))
{
   $idp=$row['id'];
}

}
?>




	
<?php 

$selecta = "SELECT * FROM indicateur WHERE indicateur.id='$id' ";
$result = mysql_query($selecta);

while($row = mysql_fetch_array($result))
{
        $indicateur=utf8_encode($row['indicateurs']);
        $formuledecalcul=utf8_encode($row['formuledecalcul']);
        $responsable=utf8_encode($row['respdemesure']);
        $frequencedemesure=utf8_encode($row['frequencedemesure']);
}

?>




<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="tableaudebord.php" title="Dashboard">
                                <i class="glyph-icon icon-table"></i>
                                Tableau de bord
                            </a>
                           
                            
                            <a href="<?php echo 'modifiertab.php?idp='.$idp.''; ?>" >
                                Modification des indicateurs
                            </a>
                            <span class="current">
                                Modification de l'indicateur : <?php echo $indicateur;?>
                            </span>
 </div>
 </div>



<div id="page-content">







<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Modification de l'indicateur : <?php echo $indicateur;?>
        <small>
            Processus : <?php echo $proc; ?> 
        </small>
    </div>
     

                                    
    <div class="clear"></div>
    <div class="divider"></div>
</h4>




<div class="content-box mrg25B">

            <table class="table table-hover text-left " >
            <thead>
            <th>Modifier l'indicateur : <?php echo $indicateur;?> </th>
            </thead>
            </table>

            <div class="content-box-wrapper">
              


    <div class="menu2" id="indicateur_template">
    

    
    <div>

    <form method="POST" name="formSaisie" action="modifier_ind_exec.php" onsubmit="return valider()" enctype="multipart/form-data">
    <input type="hidden" name="idp"  value="<?php echo $idp;?>">
    <input type="hidden" name="id"  value="<?php echo $id;?>">


    <div class="form-row">
        <div class="form-label col-md-2">
            <label for="">
                Indicateur
            </label>
        </div>
    <div class="form-input col-md-10">
            
    <textarea name="indicateur" id="textfield13" class="indicateur fond_formulaire2" cols="20" rows="3" ><?php echo $indicateur;?></textarea>
    
    </div>
    </div>
    
    <div class="form-row">
        <div class="form-label col-md-2">
            <label for="">
                Formule de calcul
            </label>
        </div>
    <div class="form-input col-md-10">
            
    <textarea name="formuledecalcul" id="textfield14" class="indicateur fond_formulaire2" cols="20" rows="3"><?php echo $formuledecalcul;?></textarea>    
    </div>
    </div>

    <div class="form-row">
        <div class="form-label col-md-2">
            <label for="">
                Resp. de mesure
            </label>
        </div>
    <div class="form-input col-md-10">
            
    <input type="text" name="responsable" id="textfield15" class="indicateur fond_formulaire2"  value="<?php echo $responsable;?>" />    
    </div>
    </div>
    
    <div class="form-row">
        <div class="form-label col-md-2">
            <label for="">
                Freq. de mesure
            </label>
        </div>
    <div class="form-input col-md-10">
            
    <select name="frequence" id="select" class="indicateur fond_formulaire2">
        <option>annuelle</option>
        <option>trimestrielle</option>
        <option>semestrielle</option>
        <option>mensuelle</option>
    </select>    
    </div>
    </div>
    
   
    
    <input class="btn medium primary-bg"  style="width: 100px;" type="submit" name="envoyer" value="Modifier" />


    </form>
    </div>



     

  </div>

        </div>
        
        </div>





    
   

<?php include('menu_fin.php'); 


?>
