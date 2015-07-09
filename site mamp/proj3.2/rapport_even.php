
<?php 

include('menu_debut.php'); 

?>

<?php 
$ide = $_GET['ide'];
?>

             

<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'processus.php?ide='.$ide; ?>" title="Evenements">
                                <i class="glyph-icon icon-chain"></i>
                                Processus
                            </a>
                            
                            <span class="current">
                                Nouveau rapport
                            </span>
 </div>
 </div>


<div id="page-content">





<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Rapport
        <small>
            <?php 
                            $select = 'SELECT DISTINCT nom FROM noms_evenement where ide='.$ide;
                            $result = mysql_query($select ) ;
                             while($ligne = mysql_fetch_array($result)) { echo ''.$ligne['nom']; } ?>
        </small>
    </div>
    <div class="clear"></div>
    
</h4>





<div class="example-box">
    <div class="example-code">

        <div class="row">
          
          <div id="step-1">

            <form action="rapport_even_valid.php" class="col-md-8 center-margin" method="post">
                

                <input type="hidden" name="ide"  value="<?php echo $ide;?>">

				<div class="form-row">
                    
					<div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Numero evenement
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
                        <input  type="text" name="Numero" id="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Date de decision
                            <span></span>
                        </label>
                    </div>
                     <div class="form-input col-md-8" class="form-input">
                        <input type="text" class="col-md-3" id="datepicker2"  name="datepicker1">
                     </div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Date d'echeance
                            <span></span>
                        </label>
                    </div>
                     <div class="form-input col-md-8" class="form-input">
                        <input type="text" class="col-md-3" id="datepicker3" name="datepicker2">
                     </div>
                </div>
                 <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Responsable 
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
                        <input  type="text" name="Responsable" id="">
                    </div>
                </div>
                 <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Processus concerne
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
						<select id="" name="processus">
						<?php 
                            $select = 'SELECT DISTINCT processus,id FROM processus  ';
                            $result = mysql_query($select ) ;
							
                             while($ligne = mysql_fetch_array($result)) { ?>

								<option value=<?php echo $ligne['id']?>> <?php echo ''.utf8_encode($ligne['processus']).'';?></option>
                                
                                <?php } ?>
							
							
						</select>
					</div>
                </div>
                 
                 
                       
                   <input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="" id="">

                               


                

            </form>

          </div>
          
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
