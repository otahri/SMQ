
<?php include('config.php'); 
 include('menu_debut.php'); 

?>

<?php
if(isset($_GET['idt']))
{
$idt=$_GET['idt'];
}
?>
<?php


$selecta = "SELECT * FROM tableaux_de_bord WHERE id='$idt'";
$result = mysql_query($selecta);

    while($row = mysql_fetch_array($result))
    {
        $annee=$row['annee'];
        $freq=$row['frequencedemesure'];
        $indicateur=utf8_encode($row['indicateurs']);
	    $janvier=$row['janvier'];
        $fevrier=$row['fevrier'];
        $mars=$row['mars'];
        $avril=$row['avril'];
        $mai=$row['mai'];
        $juin=$row['juin'];
        $juillet=$row['juillet'];
        $aout=$row['aout'];
	    $septembre=$row['septembre'];
	    $octobre=$row['octobre'];
	    $novembre=$row['novembre'];
	    $decembre=$row['decembre'];
        $objectif=$row['objectif'];
        $idi=$row['indicateur'];
    }

$selecta = "SELECT indicateurs,processus,frequencedemesure FROM indicateur WHERE id='$idi'";
$result = mysql_query($selecta);
while($row = mysql_fetch_array($result))
{
   $idp=$row['processus'];
   $freq=utf8_encode($row['frequencedemesure']);
   $ind=utf8_encode($row['indicateurs']);
}


$selecta = "SELECT Processus FROM processus WHERE id='$idp'";
$result = mysql_query($selecta);
while($row = mysql_fetch_array($result))
{
   $proc=$row['Processus'];
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
                            <a class="current">
                                Parametrage de l'indicateur : <?php echo $ind; ?> 
                            </a>
                            <span class="current">
                                Modification du parametrage
                            </span>
 </div>
 </div>



<div id="page-content">








<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Modification du parametrage  
        
        <small>
            Processus : <?php echo $proc; ?> 
        </small>
    </div>
     

                                    
    <div class="clear"></div>
    <div class="divider"></div>
</h4>




<div class="content-box mrg25B" >



            <table class="table table-hover text-left " >
            <thead>
            <th>Prametrage de l'indicateur : <?php echo $ind; ?> en  <?php echo $annee;?></th>
            </thead>
            </table>

    <div class="content-box-wrapper" > 


                        <form method="POST" action="modifiertab_exec.php" enctype="multipart/form-data">
                        <input type="hidden" name="idi"  value="<?php echo $idi;?>">
                        <input type="hidden" name="idt"  value="<?php echo $idt;?>">

                        <table >
                          <thead class="table table-hover text-center">
                            <th  >Janvier</th>
                            <th  >Feverier</th>
                            <th  >Mars</th>
                            <th  >Avril</th>
                            <th  >Mai</th>
                            <th  >Juin</th>
                            <th  >Juillet</th>
                            <th  >Aout</th>
                            <th  >Septembre</th>
                            <th  >Octobre</th>
                            <th  >Novembre</th>
                            <th  >Decembre</th>
                            <th  >Objectif</th>
                            <th  >Annee</th>
                          </thead>
                          <?php
                        if($freq=="annuelle")
                        {
                        ?>
                          <tr>
                            <td  ><input type="text" name="janvier"  id="textfield1" readonly="readonly" class="formulaire2" value="<?php echo $janvier;?>"/></td>
                            <td  ><input type="text" name="fevrier"  id="textfield2" readonly="readonly" class="formulaire2" value="<?php echo $fevrier;?>"/></td>
                            <td  ><input type="text" name="mars" class="formulaire2" readonly="readonly" id="textfield3" value="<?php echo $mars;?>"/></td>
                            <td  ><input type="text" name="avril" class="formulaire2" readonly="readonly" id="textfield4" value="<?php echo $avril;?>"/></td>
                            <td  ><input type="text" name="mai" class="formulaire2" readonly="readonly" id="textfield5" value="<?php echo $mai;?>"/></td>
                            <td  ><input type="text" name="juin" class="formulaire2" readonly="readonly" id="textfield6" value="<?php echo $juin;?>"/></td>
                            <td  ><input type="text" name="juillet" class="formulaire2" readonly="readonly" id="textfield7" value="<?php echo $juillet;?>"/></td>
                            <td  ><input type="text" name="aout" class="formulaire2" readonly="readonly" id="textfield8" value="<?php echo $aout;?>"/></td>
                            <td  ><input type="text" name="septembre" class="formulaire2" readonly="readonly" id="textfield9" value="<?php echo $septembre;?>"/></td>
                            <td  ><input type="text" name="octobre" class="formulaire2" readonly="readonly" id="textfield10" value="<?php echo $octobre;?>"/></td>
                            <td  ><input type="text" name="novembre" class="formulaire2" readonly="readonly" id="textfield11" value="<?php echo $novembre;?>"/></td>
                            <td  ><input type="text" name="decembre" class="formulaire1"  id="textfield12" value="<?php echo $decembre;?>"/></td>
                            <td  ><input type="text" name="objectif" class="formulaire1" id="textfield13" value="<?php echo $objectif;?>"/></td>
                            <td  ><input type="text" name="annee" class="formulaire1" id="textfield14" value="<?php echo $annee;?>"/></td>
                          </tr>
                        <?php
                        }
                        else if($freq=="semestrielle")
                        {
                        ?>
                        <tr>
                            <td  ><input type="text" name="janvier"  id="textfield1"class="formulaire2" readonly="readonly" value="<?php echo $janvier;?>"/></td>
                            <td  ><input type="text" name="fevrier"  id="textfield2" class="formulaire2" readonly="readonly" value="<?php echo $fevrier;?>"/></td>
                            <td  ><input type="text" name="mars" class="formulaire2" readonly="readonly" id="textfield3" value="<?php echo $mars;?>"/></td>
                            <td  ><input type="text" name="avril" class="formulaire1" id="textfield4" value="<?php echo $avril;?>"/></td>
                            <td  ><input type="text" name="mai" class="formulaire2" readonly="readonly" id="textfield5" value="<?php echo $mai;?>"/></td>
                            <td  ><input type="text" name="juin" class="formulaire2" readonly="readonly" id="textfield6" value="<?php echo $juin;?>"/></td>
                            <td  ><input type="text" name="juillet" class="formulaire2" readonly="readonly" id="textfield7" value="<?php echo $juillet;?>"/></td>
                            <td  ><input type="text" name="aout" class="formulaire1" id="textfield8" value="<?php echo $aout;?>"/></td>
                            <td  ><input type="text" name="septembre" class="formulaire2" readonly="readonly" id="textfield9" value="<?php echo $septembre;?>"/></td>
                            <td  ><input type="text" name="octobre" class="formulaire2" readonly="readonly" id="textfield10" value="<?php echo $octobre;?>"/></td>
                            <td  ><input type="text" name="novembre" class="formulaire2" readonly="readonly" id="textfield11" value="<?php echo $novembre;?>"/></td>
                            <td  ><input type="text" name="decembre" class="formulaire1" id="textfield12" value="<?php echo $decembre;?>"/></td>
                            <td  ><input type="text" name="objectif" class="formulaire1" id="textfield13" value="<?php echo $objectif;?>"/></td>
                            <td  ><input type="text" name="annee" class="formulaire1" id="textfield14" value="<?php echo $annee;?>"/></td>
                          </tr>
                        <?php
                        }
                        else if($freq=="trimestrielle")
                        {
                        ?>
                        <tr>
                            <td  ><input type="text" name="janvier"  id="textfield1" class="formulaire2" readonly="readonly" value="<?php echo $janvier;?>"/></td>
                            <td  ><input type="text" name="fevrier"  id="textfield2" class="formulaire2" readonly="readonly" value="<?php echo $fevrier;?>"/></td>
                            <td  ><input type="text" name="mars" class="formulaire1" id="textfield3" value="<?php echo $mars;?>"/></td>
                            <td  ><input type="text" name="avril" class="formulaire2" readonly="readonly" id="textfield4" value="<?php echo $avril;?>"/></td>
                            <td  ><input type="text" name="mai" class="formulaire2" readonly="readonly" id="textfield5" value="<?php echo $mai;?>"/></td>
                            <td  ><input type="text" name="juin" class="formulaire1" id="textfield6" value="<?php echo $juin;?>"/></td>
                            <td  ><input type="text" name="juillet" class="formulaire2" readonly="readonly" id="textfield7" value="<?php echo $juillet;?>"/></td>
                            <td  ><input type="text" name="aout" class="formulaire2" readonly="readonly" id="textfield8" value="<?php echo $aout;?>"/></td>
                            <td  ><input type="text" name="septembre" class="formulaire1" id="textfield9" value="<?php echo $septembre;?>"/></td>
                            <td  ><input type="text" name="octobre" class="formulaire2" readonly="readonly" id="textfield10" value="<?php echo $octobre;?>"/></td>
                            <td  ><input type="text" name="novembre" class="formulaire2" readonly="readonly" id="textfield11" value="<?php echo $novembre;?>"/></td>
                            <td  ><input type="text" name="decembre" class="formulaire1" id="textfield12" value="<?php echo $decembre;?>"/></td>
                            <td  ><input type="text" name="objectif" class="formulaire1" id="textfield13" value="<?php echo $objectif;?>"/></td>
                            <td  ><input type="text" name="annee" class="formulaire1" id="textfield14" value="<?php echo $annee;?>"/></td>
                          </tr>
                        <?php
                        }
                        else if($freq=="mensuelle")
                        {
                        ?>
                        <tr>
                            <td  ><input type="text" name="janvier"  id="textfield1" class="formulaire1" value="<?php echo $janvier;?>"/></td>
                            <td  ><input type="text" name="fevrier"  id="textfield2" class="formulaire1" value="<?php echo $fevrier;?>"/></td>
                            <td  ><input type="text" name="mars" class="formulaire1" id="textfield3" value="<?php echo $mars;?>"/></td>
                            <td  ><input type="text" name="avril" class="formulaire1" id="textfield4" value="<?php echo $avril;?>"/></td>
                            <td  ><input type="text" name="mai" class="formulaire1" id="textfield5" value="<?php echo $mai;?>"/></td>
                            <td  ><input type="text" name="juin" class="formulaire1" id="textfield6" value="<?php echo $juin;?>"/></td>
                            <td  ><input type="text" name="juillet" class="formulaire1" id="textfield7" value="<?php echo $juillet;?>"/></td>
                            <td  ><input type="text" name="aout" class="formulaire1" id="textfield8" value="<?php echo $aout;?>"/></td>
                            <td  ><input type="text" name="septembre" class="formulaire1" id="textfield9" value="<?php echo $septembre;?>"/></td>
                            <td  ><input type="text" name="octobre" class="formulaire1" id="textfield10" value="<?php echo $octobre;?>"/></td>
                            <td  ><input type="text" name="novembre" class="formulaire1" id="textfield11" value="<?php echo $novembre;?>"/></td>
                            <td  ><input type="text" name="decembre" class="formulaire1" id="textfield12" value="<?php echo $decembre;?>"/></td>
                            <td  ><input type="text" name="objectif" class="formulaire1" id="textfield13" value="<?php echo $objectif;?>"/></td>
                            <td  ><input type="text" name="annee" class="formulaire1" id="textfield14" value="<?php echo $annee;?>"/></td>
                          </tr>
                          <?php
                        }
                        ?>
                        </table>


                        <br>
                        <input class="btn medium primary-bg" style="width: 100px;" type="submit" name="envoyer" value="Modifier" />
                        </form>
                        </fieldset>
                        </td>
                          </tr>
                        </table>

</div>
</div>
 


<?php include('menu_fin.php'); 


?>