<?php session_start();
if(empty($_SESSION['user'])) echo "<script type='text/javascript'>document.location.replace('login.php');</script>";

include('menu_debut.php');
include('config.php');
include('fonctions.php');
 ?>



<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                             
                            
                            <a href="page.php?nom=Timeline" title="Evenements">
                                <i class="glyph-icon icon-big  icon-clock-o"></i>
                                Timeline
                            </a>

                            <span class="current">
                                Timeline evenement
                            </span>
 </div>
 </div>



<div id="page-content">



<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        événements
        <small>
            Les tâches à realiser
        </small>
    </div>
    <div class="clear"></div>
    
</h4>
<div class="divider"></div>
	<br>
 <div class="timeline-box chat-box">
    <?php
		$i=0;
		$selectproc = "select proc,pseudo from user where login='".$_SESSION['user']."'";
		$resultproc = mysql_query($selectproc ) ;
		while($ligneproc = mysql_fetch_array($resultproc)) {
			$proc=$ligneproc['proc'];
			$pseudo=$ligneproc['pseudo'];
		}
		if ($proc == 0 || $proc == 1)
		$select = 'select code_even,typeevenement,processus,datedecis,daterealis,responsable,etape,id from evenement where etape < 4 order by daterealis';
		elseif ( $proc == 2)
		$select = "select code_even,typeevenement,processus,datedecis,daterealis,responsable,etape,id from evenement where etape < 4 and responsable='".$pseudo."' order by daterealis";
		else
		$select = "select code_even,typeevenement,processus,datedecis,daterealis,responsable,etape,id from evenement where etape < 4 and processus='".$proc."' order by daterealis";
    $result = mysql_query($select ) ;
 	$total = mysql_num_rows($result);

 	if($total)
 	{



				    while($ligne = mysql_fetch_array($result)) { 
					
					?>
	
										<div class="tl-row <?php if($i%2==1) echo 'float-right';
																  ?>">
									        <div class="tl-bullet bg-<?php if(strtotime($ligne['daterealis'])<date("U")) echo 'red'; else {switch($ligne['etape']) { case 1: echo 'blue-alt'; break; case 2: echo 'azure'; break; case 3: echo 'green'; break;}} ?>"></div>
									        <div class="popover <?php if($i%2==0) echo 'left';
																  else echo 'right';
																  $i++;?> no-shadow">
																  
																  

																  
																  
									            <div class="arrow"></div>
									            <div class="popover-content">
									                    <h3>
									                        <span href="#" class="font-<?php if(strtotime($ligne['daterealis'])<date("U")) echo 'red'; else {switch($ligne['etape']) { case 1: echo 'blue-alt'; break; case 2: echo 'azure'; break; case 3: echo 'green'; break;}} ?>" title="Horia Simon"><?php echo $ligne['responsable']; ?> </span>
									                        <div class="float-right">
									                            <a href="<?php 

										 if($ligne['typeevenement']==2) {echo 'form_wizard_'.($ligne['etape']+1).'.php?id_e='.$ligne['id'];
										$selectaud = "SELECT id FROM audit where num='".$ligne['code_even']."'";

										$resultaud = mysql_query($selectaud ) ;
										
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_a='.$ligneaud['id']; break; }
										 }
										
										elseif($ligne['typeevenement']==4) {echo 'form_wizard_nc_'.($ligne['etape']+1).'.php?id_e='.$ligne['id']; 
										$selectaud = "SELECT id FROM non_conf where code_even='".$ligne['code_even']."'";
										$resultaud = mysql_query($selectaud ) ;
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_nc='.$ligneaud['id']; break; }
										 }
										else {if($ligne['etape']==2) echo 'rapport_even_valid.php?id_even='.$ligne['id']; else echo 'rapport_even_bilan.php?id_e='.$ligne['id'];}


										

										 


										 ?>" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="" data-original-title="Compléter la tâche"></a>
									                        </div>
									                    </h3>
									                    <br>
														<strong>Numéro d'événement &nbsp;: </strong><?php echo $ligne['code_even']; ?> <br>
																						<strong>Evénement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php $selecteven= "select nom from noms_evenement where ide=".$ligne['typeevenement'];
																													   
																													   $resulteven = mysql_query($selecteven ) ;
																																				
																													 
																																				 while($ligneven = mysql_fetch_array($resulteven)) { 


																																					echo $ligneven['nom'];
																																					  }  ?>  <br>
																						<strong>Processus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php $selectp= "select processus from processus where id=".$ligne['processus'];
																													   
																													   $resultp = mysql_query($selectp ) ;
																																				
																													 
																																				 while($lignep = mysql_fetch_array($resultp)) { 


																																					echo $lignep['processus'];
																																					  }  ?>  <br>
																						
																						
																						<strong>Date de réalisation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo datesimple($ligne['daterealis']); ?> <br><br>
																						
																						
																						
																						
									                    <div class="chat-time">
									                        <i class="glyph-icon icon-clock-o"></i>
									                        <?php echo temps_qui_reste($ligne['daterealis'],"date");?>
									                    </div>
									            </div>
									        </div>
									 
									        <div class="tl-panel">
									            <?php echo datesimple($ligne['datedecis']); ?>
									        </div>
									    </div>
	<?php } 
	      }
	      else echo "<h4 align='center' > Rien A Signaler</h4>"
    
       					
      
    
					
	       ?>
									    

    
    
    
</div>
<?php include('menu_fin.php');  ?>