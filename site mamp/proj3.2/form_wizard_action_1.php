
<?php include('config.php'); 

include('menu_debut.php'); 

?>

<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="table_action.php?ida=1&idp=12" title="Dashboard">
                                <i class="glyph-icon icon-table"></i>
                                Table des actions
                            </a>
                            
                            
                        
                            <span class="current">
                                Nouveau action
                            </span>
 </div>
 </div>



<div id="page-content"> 
                    
                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Actions
        <small>
            Suivi des actions
        </small>
    </div>
    <div class="clear"></div>
    
</h4>
<?php 

												$code='';
												$proc='';
												$type='';
												$even='';
if(isset($_GET['id_a'])) {
	
	$select= "select action,processus,code_action,typeevenement from action where ida=".$_GET['id_a'];
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) {
												$code=$ligne['code_action'];
												$proc=$ligne['processus'];
												$type=$ligne['action'];
												$even=$ligne['typeevenement'];
												
												
												}
}

?>


<div class="example-box">
    <div class="example-code">

        <div class="row">
          <img src="assets/images/act1.png" width="100%" height="100%" >
		  <br>
          <br>
          <div id="step-1">

            <form action="form_wizard_action_2.php" class="col-md-8 center-margin" method="post">
                
				<div class="form-row">
                    
					<div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Numéro d'action
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
                        <input  type="text" value="<?php echo $code;?>" name="Numero" id="">
                    </div>
                </div>
				<div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Type d'action
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
						<select id="" name="type_act">
							<option <?php if($type == 1){echo("selected");}?> value="1">Corrective</option>
							<option <?php if($type == 2){echo("selected");} ?> value="2">Préventive</option>
						</select>
					</div>
                </div>
				<div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Numéro d'événement
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
						<select id="" name="even">
							<?php 
                            $select = 'SELECT DISTINCT code_even,id FROM evenement ORDER BY code_even';
                            $result = mysql_query($select ) ;
 
                             while($ligne = mysql_fetch_array($result)) {
							
								?>
								<option <?php if($ligne['id'] == $even){echo("selected");}?>><?php echo ''.$ligne['code_even'].'';?> </option>
								<?php
								}

						
								?>
						</select>
					</div>
                </div>
				<div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Résponsable
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
                            Processus
                            <span></span>
                        </label>
                    </div>
                    <div class="form-input col-md-8">
						<select id="" name="processus">
						<?php 
                            $select = 'SELECT DISTINCT processus,id FROM processus  ';
                            $result = mysql_query($select ) ;
							
                             while($ligne = mysql_fetch_array($result)) { ?>

								<option <?php if($ligne['id'] == $proc){echo("selected");}?> value=<?php echo $ligne['id']?>> <?php echo ''.utf8_encode($ligne['processus']).'';?></option>
                                
                                <?php } ?>
							
							
						</select>
					</div>
                </div>
                <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Date de décision
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
                            Date d'échéance
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
                            Date début
                            <span></span>
                        </label>
                    </div>
                     <div class="form-input col-md-8" class="form-input">
                        <input type="text" class="col-md-3" id="datepicker4" name="datepicker3">
                     </div>
                </div>
				<div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="" class="label-description">
                            Date fin
                            <span></span>
                        </label>
                    </div>
                     <div class="form-input col-md-8" class="form-input">
                        <input type="text" class="col-md-3" id="datepicker5" name="datepicker4">
                     </div>
                </div>
                 
                 
                 
                 
                       
                   <input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="" value="Valider" id="">

                               


                

            </form>

          </div>
          
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
