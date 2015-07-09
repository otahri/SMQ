<?php include('config.php'); 

include('menu_debut.php'); 


$id_even=$_GET['id_e'];

$select= "select typeevenement,processus from evenement where id=".$id_even;
   
   $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { 

                                $proc=$ligne['processus'];
                                $typev=$ligne['typeevenement'];
                                  }


                            $select = 'SELECT DISTINCT ide,nom FROM noms_evenement where ide='.$typev;
                            $result = mysql_query($select ) ;
                             while($ligne = mysql_fetch_array($result)) { 

                             	$nomev=$ligne['nom']; 
                             	$ideev=$ligne['ide'];
                             } 


?>




<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'table.php?ide='.$ideev.'&idp='.$proc.''; ?>" title="Dashboard">
                                <i class="glyph-icon icon-table"></i>
                                Table
                            </a>
                            
                            
                        
                            <span class="current">
                                Modification
                            </span>
 </div>
 </div>



<div id="page-content">






                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Evenement : <?php echo $nomev ?>
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
													<h4>Description de l'événement</h4>
												</div>
						  		
						  		<div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">

										    <form method="POST" action="modif_even_exec.php" name="formSaisie" onsubmit="return valider();" enctype="multipart/form-data">
										    		     
										    		      <input type="hidden" name="ide" id="textfield10" value="<?php echo $id_even;?>">
										    		      <input type="hidden" name="idp" id="textfield10" value="<?php echo $proc;?>">
										    		           


										<p> <?php 
												$select= "select code_even,datedecis,daterealis,responsable,processus from evenement where id=".$id_even;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { ?>

													<p><strong>Numéro d'événement : </strong><input type="text" name="num" value="<?php echo $ligne['code_even']; ?>"> <br></p>
													
													
													<p><strong>Résponsable  : </strong> <input type="text" name="resp" value="<?php echo $ligne['responsable']; ?>"> <br></p>
													
													
													
													<p><strong>Date de decision : </strong>
													<input type="text"  name="datedecis" id="datepicker2" value="<?php echo $ligne['datedecis']; ?>"> <br></p>
													
													<p><strong>Date de réalisation : </strong>
													<input type="text" name="datereali"  id="datepicker3" value="<?php echo $ligne['daterealis']; ?>"> </p>
													
													
													
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
