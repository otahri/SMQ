
<?php 

include('menu_debut.php'); 


$id_action=$_GET['id_a'];


?>

<script type="text/javascript" src="basic.js"></script>
<script type="text/javascript" src="jspdf.debug.js"></script>





<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'table_action.php?ida='.$ida.'&idp='.$idp.''; ?>" title="Dashboard">
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
        Action
        <small>
            Suivi des actions
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
							<div  id="fromHTMLtestdiv">
							<span style="display: none;"> 
							
															 
															 <h1 style="font-size:200%;text-align:center">Bilan de l'action</h1>
															 <h5 style="font-size:100%;text-align:center">--------------------------------------------</h5>
															 <p style="font-size:5%;text-align:center">. </p>
															</span>
							<div class="row">
							  <div >								
									<h4>Description de l'action</h4>
								</div>
								<span style="display: none;"> <h4 style="font-size:70%;">____________________________________________________________________________________________________________________________________________</h4> </span>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php 
												$select= "select code_action,action,typeevenement,responsable,processus,datedecision,dateecheance,datedebut,datefin,etape from action where ida=".$id_action;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { ?>

													<p><strong>Numéro d'action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['code_action']; ?> <br></p>
													<p><strong>Processus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php $selectp= "select processus from processus where id=".$ligne['processus'];
																				   
																				   $resultp = mysql_query($selectp ) ;
																											
																				 
																											 while($lignep = mysql_fetch_array($resultp)) { 


																												echo $lignep['processus'];
																												  }  ?>  <br></p>
													<p><strong>Evénement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong><?php $selectev= "select code_even from evenement where id=".$ligne['typeevenement'];
																				   
																				   $resultev = mysql_query($selectev ) ;
																											
																				 
																											 while($lignev = mysql_fetch_array($resultev)) { 


																												echo $lignev['code_even'];
																												  }  ?> <br></p>
													<p><strong>Type d'action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php if($ligne['action']==1) echo 'Corréctive';
													 elseif($ligne['action']==2) echo 'Préventive';?>  <br></p>
													<p><strong>Résponsable &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['responsable']; ?> <br></p>
													<p><strong>Date de décision &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datedecision']; ?> <br></p>
													<p><strong>Date d'échéance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['dateecheance']; ?> <br></p>
													<p><strong>Date début &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datedebut']; ?> <br></p>
													<p><strong>Date fin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datefin']; ?> </p>
													
													
													
													</p>
										</div>
									
								</div>
							
							</div>
							<span style="display: none;"> <h4 style="font-size:40%;">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h4> 
								<p style="font-size:5%;text-align:center">. </p>	
							<p style="font-size:5%;text-align:center">. </p> </p></span>
						
						
						
						
					
				</div>
		  
		  
		  <div class="row">
							  
<div><p>
<button onclick="location.href='<?php echo 'form_wizard_action_'.($ligne['etape']+1).'.php?id_a='.$id_action; 
										$selectaud = "SELECT id FROM suivi_action where num='".$ligne['code_action']."'";
										$resultaud = mysql_query($selectaud ) ;
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_sa='.$ligneaud['id']; break; }



									?>'" class="btn medium primary-bg col-md-3">Compléter la tâche</button></p></div> <?php break; }   ?>
					</div>
		  
<!---------------------------------------------------------------------------------------------------------------------------------------------->

	
          
        </div>


    </div>
    
</div>




<?php include('menu_fin.php'); 


?>
