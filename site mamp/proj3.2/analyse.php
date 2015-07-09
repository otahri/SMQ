
<?php 
 include('menu_debut.php'); 

?>



<SCRIPT language="javascript">
function choix_oui(form3)
{
document.getElementById('lb').style.display='';
document.form3.fiche.type="text";
}
function choix_non(form3)
{
document.getElementById('lb').style.display='none';
document.form3.fiche.type="hidden";
}
</SCRIPT>


<?php

if(isset($_GET['annee']))
{
$anne=$_GET['annee'];
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


$selecta = "SELECT analyse,num_fiche FROM analyse WHERE processus='$idp'and annee='$anne' ";
$result = mysql_query($selecta ) ;

    while($row = mysql_fetch_array($result))
    {
          $analyse=$row['analyse'];
          $fich=$row['num_fiche'];
    }

?>




<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="tableaudebord.php" title="Dashboard">
                                <i class="glyph-icon icon-table"></i>
                                Tableau de bord
                            </a>
                            
                            
                            <a href="<?php echo 'modifiertab.php?idp='.$idp.''; ?>" >
                                <i class="glyph-icon icon-cog"></i>
                                Modification des indicateurs
                            </a>
                            
                            <span class="current">
                                Analyse
                            </span>
 </div>
 </div>



<div id="page-content">






<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Analyse des indicateurs 
        <small>
            Processus : <?php echo $proc; ?> en : <?php echo $anne; ?>
        </small>
    </div>
     

                                    
    <div class="clear"></div>
    <div class="divider"></div>
</h4>




<div class="content-box mrg20B" >



            
            <h3 class="content-box-header ui-state-default">
                <span>Analyse de l'indicateur</span>
            </h3>
           

    <div class="content-box-wrapper" >

          <div>

                                  <form method="POST" name="form3" action="analyse_exec.php" enctype="multipart/form-data">


                                  <input type="hidden" name="idp"  value="<?php echo $idp;?>">
                                  <input type="hidden" name="annee"  value="<?php echo $anne;?>">


                                  <div class="form-row">
                                          <div class="form-label col-md-2">
                                              <label for="">
                                                  Analyse :
                                              </label>
                                          </div>
                                          <div class="form-input col-md-10">
                                              <textarea name="rm" id="" class="textarea-autosize" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 36px;"><?php echo utf8_encode($analyse); ?></textarea>
                                          </div>
                                  </div>


                                  <div class="form-row">
                                          <div class="form-label col-md-2">
                                              <label for="">
                                                  Ouverture fiche AC/AP :
                                              </label>
                                          </div>
                                         <div class="form-checkbox-radio col-md-10">
                                              <div class="radio">

                                              <span class="ui-state-default btn radius-all-100"><input class="custom-radio" type=radio name="etat" value="oui" onClick="choix_oui(form3)" ><i class="glyph-icon icon-circle"></i></span>


                                              </div>
                                              <label for="">Oui</label>
                                              
                                              

                                              <div class="radio"><span class="ui-state-default btn radius-all-100"><input class="custom-radio" type=radio name="etat" value="non" onClick="choix_non(form3)" ><i class="glyph-icon icon-circle"></i></span></div>
                                              <label for="">Non</label>
                                              
                                          </div>
                                          



                                  </div>



                                  <div class="form-row">
                                          <div id="lb" for="textfield" style="display:none;" class="form-label col-md-2">
                                              <label for="">
                                                  Numero fiche :
                                              </label>
                                          </div>
                                          <div class="form-input col-md-10">
                                              <input class="form-input col-md-10" type="hidden" name="fiche" id="textfield" value="<?php echo $fich;?>" >
                                          </div>
                                  </div>





                                  <input style="width: 100px;"   class="btn medium primary-bg " type="submit" name="modifier" value="Modifier" />



                                  </form>
                </div>

</div>
</div>


<?php include('menu_fin.php'); 


?>




