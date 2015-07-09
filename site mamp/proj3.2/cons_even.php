
<?php include('config.php'); 

include('menu_debut.php'); 


$id_even=$_GET['id_e'];



?>


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="timeline_even.php" >
                                <i class="glyph-icon icon-table"></i>
                                Timeline événement
                            </a>
                            
                            
                        
                            <span class="current">
                                Tâche non terminée
                            </span>
 </div>
 </div>



<div id="page-content">









<script type="text/javascript" src="basic.js"></script>
<script type="text/javascript" src="jspdf.debug.js"></script>
                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Tâche non terminée
        <small>
            Evénements
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
							
															 
															 <h1 style="font-size:200%;text-align:center">Bilan de l'audit</h1>
															 <h5 style="font-size:100%;text-align:center">--------------------------------------------</h5>
															 <p style="font-size:5%;text-align:center">. </p>
															</span>
							<div class="row">
							  <div >								
									<h4>Description de l'événement</h4>
								</div>
								<span style="display: none;"> <h4 style="font-size:70%;">____________________________________________________________________________________________________________________________________________</h4> </span>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php 
												$select= "select code_even,datedecis,daterealis,responsable,processus,typeevenement,etape from evenement where id=".$id_even;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { ?>

													<p><strong>Numéro  de l'événement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['code_even']; ?> <br></p>
													<p><strong>Processus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php $selectp= "select processus from processus where id=".$ligne['processus'];
																				   
																				   $resultp = mysql_query($selectp ) ;
																											
																				 
																											 while($lignep = mysql_fetch_array($resultp)) { 


																												echo $lignep['processus'];
																												  }  ?>  <br></p>
													<p><strong>Résponsable  de l'événement : </strong><?php echo $ligne['responsable']; ?> <br></p>
													
													
													<p><strong>Date  de l'événement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datedecis']; ?> <br></p>
													<p><strong>Date de réalisation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['daterealis']; ?> </p>
													
													
													
													
										
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
<button onclick="location.href='<?php 
if($ligne['typeevenement']==2) {echo 'form_wizard_'.($ligne['etape']+1).'.php?id_e='.$id_even;
										$selectaud = "SELECT id FROM audit where num='".$ligne['code_even']."'";

										$resultaud = mysql_query($selectaud ) ;
										
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_a='.$ligneaud['id']; break; }
										 }
										
										elseif($ligne['typeevenement']==4) {echo 'form_wizard_nc_'.($ligne['etape']+1).'.php?id_e='.$id_even;
										$selectaud = "SELECT id FROM non_conf where code_even='".$ligne['code_even']."'";
										$resultaud = mysql_query($selectaud ) ;
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_nc='.$ligneaud['id']; break; }
										 }
										else {if($ligne['etape']==2) echo 'rapport_even_valid.php?id_even='.$id_even; else echo 'rapport_even_bilan.php?id_e='.$id_even;}



?>'" class="btn medium primary-bg col-md-3">Compléter la tâche</button></p></div>  <?php break; }   ?>
					</div>
		  
<!---------------------------------------------------------------------------------------------------------------------------------------------->

	
          
        </div>


    </div>
    
</div>




<?php include('menu_fin.php'); 


?>
