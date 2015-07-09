
<?php include('config.php'); 

include('menu_debut.php'); 

$id_audit=$_GET['id_a'];
$id_even=$_GET['id_e'];

$select= "select typeevenement,processus from evenement where id=".$id_even;
   
   $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { 

                                $proc=$ligne['processus'];
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


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'table.php?ide=2&idp='.$proc; ?>" >
                                <i class="glyph-icon icon-table"></i>
                                Table
                            </a>
                            
                            
                        
                            <span class="current">
                                Bilan audit
                            </span>
 </div>
 </div>



<div id="page-content">









<script type="text/javascript" src="basic.js"></script>
<script type="text/javascript" src="jspdf.debug.js"></script>
                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Audit interne
        <small>
            Bilan de l'audit
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
									<h4>Description de l'audit</h4>
								</div>
								<span style="display: none;"> <h4 style="font-size:70%;">____________________________________________________________________________________________________________________________________________</h4> </span>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php 
												$select= "select code_even,datedecis,daterealis,responsable,processus from evenement where id=".$id_even;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { ?>

													<p><strong>Numéro d'audit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['code_even']; ?> <br></p>
													<p><strong>Processus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php $selectp= "select processus from processus where id=".$ligne['processus'];
																				   
																				   $resultp = mysql_query($selectp ) ;
																											
																				 
																											 while($lignep = mysql_fetch_array($resultp)) { 


																												echo $lignep['processus'];
																												  }  ?>  <br></p>
													<p><strong>Résponsable d'audit : </strong><?php echo $ligne['responsable']; ?> <br></p>
													<?php 	if(isset($_GET['id_a'])) { $selectau= "select resp_audite,pt_audites from audit where id=".$id_audit;
				   
												$resultau = mysql_query($selectau ) ;
											
				 
												while($ligneau = mysql_fetch_array($resultau)) { ?>
														
														<p><strong>Résponsable audité : </strong><?php echo $ligneau['resp_audite']; ?> <br></p>
														<p><strong>Les points audités &nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligneau['pt_audites']; ?><br></p>
													<?php }} ?>
													
													<p><strong>Date d'audit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datedecis']; ?> <br></p>
													<p><strong>Date de réalisation &nbsp;&nbsp;: </strong><?php echo $ligne['daterealis']; ?> </p>
													
													
													
													<?php }
										
										?></p>
										</div>
									
								</div>
							
							</div>
							<span style="display: none;"> <h4 style="font-size:40%;">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h4> 
								<p style="font-size:5%;text-align:center">. </p>	
							<p style="font-size:5%;text-align:center">. </p> </p></span>
						<?php 	if(isset($_GET['id_a'])) { ?>
							<div class="row">
							  <div >								
									<h4>Analyse</h4>
								</div>
								<span style="display: none;"> <h4 style="font-size:70%;">____________________________________________________________________________________________________________________________________________</h4> </span>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php 
												$select= "select analyse from audit where id=".$id_audit;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { 

													echo $ligne['analyse'];
													
													}
										
										?></p>
										</div>
									
								</div>
							
				
						</div>
						<span style="display: none;"> <h4 style="font-size:40%;">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h4>
						 <p style="font-size:5%;text-align:center">. </p>	
							<p style="font-size:5%;text-align:center">. </p>
							
							</span>
						
						<?php } ?>
						
					<div class="row">
							  <div >								
									<h4>Actions</h4>
								</div>
								<span style="display: none;"> <h4 style="font-size:70%;">____________________________________________________________________________________________________________________________________________</h4> </span>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php $c=1; $act=false;
												$selecta= "select action,code_action,ida,etape from action where typeevenement=".$id_even;
				   
												$resulta = mysql_query($selecta ) ;
											
				 
												while($lignea = mysql_fetch_array($resulta)) { $act=true; ?>
												
													<p><strong>- Action <?php echo $c; $c++;?> : </strong><a href="<?php echo 'form_wizard_action_'.($lignea['etape']+1).'.php?id_a='.$lignea['ida']; 
										$selectaud = "SELECT id FROM suivi_action where num='".$lignea['code_action']."'";
										$resultaud = mysql_query($selectaud ) ;
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_sa='.$ligneaud['id']; break; }



									?>"><?php echo ''.$lignea['code_action'];?></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
													<?php if($lignea['action']==1) echo '<strong>- Type:</strong> Corréctive';
													 elseif($lignea['action']==2) echo '<strong>- Type:</strong> Préventive';
																												    ?>  </p>
													
													
													
													<?php } if(!$act) echo 'aucune action programmée';
										
										?></p>
										</div>
									
								</div>
							<span style="display: none;"> <h4 style="font-size:40%;">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h4> </span>
					</div>
				</div>
		  
		  
		  <div class="row">
							  <div >								
									<h4>Fichiers joints</h4>
								</div>
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
<div><p>
<button onclick="javascript:demoFromHTML()" class="btn medium primary-bg col-md-3">Exporter le bilan</button></p></div>
					</div>
		  
<!---------------------------------------------------------------------------------------------------------------------------------------------->

	
          
        </div>


    </div>
    
</div>




<?php include('menu_fin.php'); 


?>
