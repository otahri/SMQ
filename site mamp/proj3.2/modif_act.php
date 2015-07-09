<?php include('config.php');
include('menu_debut.php'); 


$id_act=$_GET['id_act'];

$select= "select action,processus from action where ida=".$id_act;
				   
$result = mysql_query($select ) ;
while($ligne = mysql_fetch_array($result)) { 
	$ida=$ligne['action'];
	$idp=$ligne['processus'];
	}		
?>




<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'table_action.php?ida='.$ida.'&idp='.$idp.''; ?>" title="Dashboard">
                                <i class="glyph-icon icon-table"></i>
                                Table des actions
                            </a>
                            
                            
                        
                            <span class="current">
                                Modification
                            </span>
 </div>
 </div>



<div id="page-content">






                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Action 
        <small>
            Modification
        </small>
    </div>
    <div class="clear"></div>
    
</h4>




<div class="example-box">
    <div class="example-code">

        <div class="row">
          
		  <br>
          <br>
          <div id="step-1">
		
				<div class="col-md-8 center-margin">
						
							<div class="row">


											  <div >								
													<h4>Description de l'action</h4>
												</div>
						  		
						  		<div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">

										    <form method="POST" action="modif_act_exec.php" name="formSaisie" onsubmit="return valider();" enctype="multipart/form-data">
										    		     
										    		      
										    		 <input type="hidden" name="idp"  value="<?php echo $ligne['processus'];?>">
     												 <input type="hidden" name="ida"  value="<?php echo $id_act;?>">


										<p> <?php 
												$select= "select code_action,action,typeevenement,responsable,processus,datedecision,dateecheance,datedebut,datefin,tache from action where ida=".$id_act;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { ?>


													
													<!--

													<div class="form-label col-md-2">
														<label for="">
															Numéro d'action :
														</label>
													</div>
													<div class="form-input col-md-10">
														<input placeholder="numéro d'action" type="text" name="num" id="textfield" value="<?php echo $ligne['code_action']; ?>">
													</div>
													<div class="form-label col-md-2">
														<label for="">
															Résponsable
														</label>
													</div>
													<div class="form-input col-md-10">
														<input placeholder="Processus" type="text" name="resp" id="textfield" value="<?php echo $ligne['responsable']; ?>">
													</div><div class="form-label col-md-2">
														<label for="">
															Numéro d'action :
														</label>
													</div>
													<div class="form-input col-md-10">
														<input placeholder="Processus" type="text" name="num" id="textfield" value="<?php echo $ligne['code_action']; ?>">
													</div>
													<div class="form-label col-md-2">
														<label for="">
															Numéro d'action :
														</label>
													</div>
													<div class="form-input col-md-10">
														<input placeholder="Processus" type="text" name="num" id="textfield" value="<?php echo $ligne['code_action']; ?>">
													</div>
													<div class="form-label col-md-2">
														<label for="">
															Numéro d'action :
														</label>
													</div>
													<div class="form-input col-md-10">
														<input placeholder="Processus" type="text" name="num" id="textfield" value="<?php echo $ligne['code_action']; ?>">
													</div> -->
													
													<p><strong>Numéro d'action : </strong><input type="text" name="num" value="<?php echo $ligne['code_action']; ?>"> <br></p>
													
													
													<p><strong>Résponsable  : </strong> <input type="text" name="resp" value="<?php echo $ligne['responsable']; ?>"> <br></p>

													

													<!--	
													<p><strong>Evénement  : </strong>


													 <input type="text" name="even" value="<?php $selectev= "select code_even from evenement where id=".$ligne['typeevenement'];
																				   
																				   $resultev = mysql_query($selectev ) ;
																											
																				 
																											 while($lignev = mysql_fetch_array($resultev)) { 


																												echo $lignev['code_even'];
																												  }  ?> "> 


																												  <br></p> -->
													
													
													
													<p><strong>Date de decision : </strong> 
													<input type="text"  name="datedecis" id="datepicker2" value="<?php echo $ligne['datedecision']; ?>"> <b></p>
													
													<p><strong>Date d'échéance : </strong>
													<input type="text" name="dateech"   id="datepicker3" value="<?php echo $ligne['dateecheance']; ?>"> </p>
													
													<p><strong>Date debut : </strong>
													<input type="text" name="datedebut"  id="datepicker4" value="<?php echo $ligne['datedebut']; ?>"> </p>
													
													<p><strong>Date fin : </strong>
													<input type="text" name="datefin"  id="datepicker5" value="<?php echo $ligne['datefin']; ?>"> </p>

													<p><strong>Tache : </strong><textarea name="tache" id="" class="textarea-no-resize"><?php echo utf8_encode($ligne['tache']); ?></textarea> </p>

													
													
													
													<?php }
										
										?></p>


											<p><input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="" id="" value="Modifier"></p>
										</form>
										</br>
										</div>
									
								</div>

								
							
							</div>
						
				</div>
		  
		  
		  
          
        </div>


    </div>
    
</div>




<?php include('menu_fin.php'); 


?>
