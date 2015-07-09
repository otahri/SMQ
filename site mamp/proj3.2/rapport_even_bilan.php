
<?php 
include('menu_debut.php'); 

$id_even = $_GET['id_e'];

$select= "select typeevenement,processus from evenement where id=".$id_even;
   
   $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { 

                                $proc=$ligne['processus'];
                                $ide=$ligne['typeevenement'];
                                  }
if(isset($_POST['ref'])&&isset($_POST['version'])&&isset($_POST['date'])&&isset($_POST['nomfich']))
{
        
  $req = "INSERT INTO documents_evenement values('','".$proc."','2','".$_POST['date']."','".$_POST['ref']."','".$_POST['version']."','../gestiondoc/arz/".$_POST['nomfich']."','".$_POST['nomfich']."','".$id_even."')";
   
   $result = mysql_query($req ) ;
 }   
  //////////////////-------------------
  
  $req = "UPDATE evenement SET etape=4 WHERE id=".$id_even;
   
   $result = mysql_query($req ) ;
 


?>


                    
<script type="text/javascript" src="basic.js"></script>
<script type="text/javascript" src="jspdf.debug.js"></script>






<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'processus.php?ide='.$ide; ?>" title="Evenements">
                                <i class="glyph-icon icon-chain"></i>
                                Processus
                            </a>
                            
                            <span class="current">
                                Bilan rapport
                            </span>
 </div>
 </div>


<div id="page-content">





                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Bilan de rapport
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
          
				<div class="col-md-8 center-margin">
							<div  id="fromHTMLtestdiv">
							<span style="display: none;"> 
							
															 
															 <h1 style="font-size:200%;text-align:center">Bilan de rapport</h1>
															 <h5 style="font-size:100%;text-align:center">--------------------------------------------</h5>
															 <p style="font-size:5%;text-align:center">. </p>
															</span>
							
							<div class="row">
							  <div >								
									<h4>Description de l'événement:</h4>
									</div>
									<span style="display: none;"> <h4 style="font-size:70%;">____________________________________________________________________________________________________________________________________________</h4> </span>
						  			<div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php 
												$select= "select code_even,responsable,datedecis,daterealis,processus from evenement where id=".$id_even;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { ?>

													<p><strong>Numéro d'evenement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['code_even']; ?> <br><br></p>
													<p><strong>Processus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong>
													<?php $selectp= "select processus from processus where id=".$ligne['processus'];
																				   
																				   $resultp = mysql_query($selectp ) ;
																											
																				 
																											 while($lignep = mysql_fetch_array($resultp)) { 


																												echo $lignep['processus'];
																												  }  ?>  <br><br></p>
													<p><strong>Résponsable  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['responsable']; ?> <br><br></p>
													
													<p><strong>Date de decision &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datedecis']; ?> <br><br></p>
													<p><strong>Date de réalisation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['daterealis']; ?> <br><br></p>
													
													
													
													<?php }
										
										?></p>
										</div>
									
								</div>
							




								<span style="display: none;"> <h4 style="font-size:40%;">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h4> </span>
							</div>
					<div class="row">
							  <div >								
									<h4>Fichiers joints</h4>

								</div>
								<span style="display: none;"> <h4 style="font-size:70%;">____________________________________________________________________________________________________________________________________________</h4> </span>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
											<p> <?php $fich=false;
												$select2 = 'SELECT nomdoc,chemindoc FROM documents_evenement where documents_evenement.ide='.$id_even;
											   $result2 = mysql_query($select2 ) ;
											   $chem=''; $name='aucun fichier trouvé';
											   while($ligne2 = mysql_fetch_array($result2)) { $fich=true; ?> <a href="<?php echo $ligne2['chemindoc'];?>" class="font-blue-alt"> <?php echo $ligne2['nomdoc'];?> </a> <br>  
											   <?php } if(!$fich) echo 'aucun fichier trouvé'; ?>
											 </p>
					</div>
														
													</div>

					</div>


					</div>

					<div><p>
					<button onclick="javascript:demoFromHTML()" class="btn medium primary-bg col-md-3">Exporter le bilan</button></p></div>
					</div>
							  
							
							
					
		  
		  
		  


	
			

          
          
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
