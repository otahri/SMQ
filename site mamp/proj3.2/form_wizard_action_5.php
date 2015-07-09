
<?php 

include('menu_debut.php'); 

$id_suivi_action=$_GET['id_sa'];
$id_action=$_GET['id_a'];


if(isset($_POST['ref'])&&isset($_POST['version'])&&isset($_POST['date'])&&isset($_POST['nomfich']))
{
        
  $req = "INSERT INTO documents_evenement values('','".$id_action."','".$_POST['ref']."','".$_POST['version']."','".$_POST['date']."','".$_POST['nomfich']."','../gestiondoc/arz/".$_POST['nomfich']."')";
   
   $result = mysql_query($req ) ;
 }   
  //////////////////-------------------
  
  $req = "UPDATE action SET etape=4 WHERE id=".$id_action;
   
   $result = mysql_query($req ) ;
 


$select= "select action,processus, from action where ida=".$id_action;
				   
$result = mysql_query($select ) ;
while($ligne = mysql_fetch_array($result)) { 
	$ida=$ligne['action'];
	$idp=$ligne['processus'];
	}										

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
												$select= "select code_action,action,typeevenement,responsable,processus,datedecision,dateecheance,datedebut,datefin from action where ida=".$id_action;
				   
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
													
													
													
													<?php }
										
										?></p>
										</div>
									
								</div>
							
							</div>
							<span style="display: none;"> <h4 style="font-size:40%;">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h4> 
								<p style="font-size:5%;text-align:center">. </p>	
							<p style="font-size:5%;text-align:center">. </p> </p></span>
						
						
						
						
					<div class="row">
							  <div >								
									<h4>Analyse et tâches </h4>
								</div>
								<span style="display: none;"> <h4 style="font-size:70%;">____________________________________________________________________________________________________________________________________________</h4> </span>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php 
												$select= "select tache from action where ida=".$id_action;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { 
													 	if(isset($_GET['id_sa'])) {
													
													$selectan= "select analy_cause from suivi_action where id=".$id_suivi_action;
				   
												$resultan = mysql_query($selectan ) ;
												while($lignean = mysql_fetch_array($resultan)) {
												echo '<strong> Analyse des causes :</strong>';
													echo '<p>'.utf8_encode($lignean['analy_cause']).'</p>';
													}}
													echo '<strong> Les tâches :</strong>';
													echo '<p>'.utf8_encode($ligne['tache']).'</p>';;
													if(isset($_GET['id_sa'])) {
													
													$selecteff= "select efficacite from suivi_action where id=".$id_suivi_action;
				   
												$resulteff = mysql_query($selecteff ) ;
												while($ligneff = mysql_fetch_array($resulteff)) {
													$eff=$ligneff['efficacite'];
													if($eff==0){ echo '<p><strong>Les tâches ne sont pas efficaces</strong></p> ';}
													 elseif($eff==1){ echo '<p><strong>Les tâches sont efficaces</strong></p> ';}
													 }
													
													}
													}
										
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
												$select2 = 'SELECT nomdoc,chemindoc FROM documents_action where id='.$id_action;
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
