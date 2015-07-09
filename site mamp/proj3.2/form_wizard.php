
<?php include('config.php'); 

include('menu_debut.php'); 

?>


                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Audit interne
        <small>
            Suivi de l'audit
        </small>
    </div>
    <div class="clear"></div>
    
</h4>





<div class="example-box">
    <div class="example-code">

        <div class="row">
          <img src="assets/images/e1.png" width="100%" height="100%" >
		  <br>
          <br>
          <div id="step-1">

            <form action="form_wizard_2.php" class="col-md-8 center-margin" method="post">
                
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
                            Date d'audit
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
                            Responsable audit
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
                        <input  type="text" name="Responsable_audit" id="">
                    </div>
                </div>
                 <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Processus audite
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
                 <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Responsable audite
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
                        <input  type="text" name="Responsable_audite" id="">
                    </div>
                </div>
                 <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Points audites
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
                        <input  type="text" name="Points_audites" id="">
                    </div>
                </div>
                 
                       
                   <input  type="submit" name="" id="">

                               


                

            </form>

          </div>
          
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
