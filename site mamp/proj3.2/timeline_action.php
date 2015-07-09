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
                                Timeline action
                            </span>
 </div>
 </div>



<div id="page-content">


<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Actions
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
		$select = 'select code_action,action,processus,datedecision,dateecheance,responsable,etape,ida from action where etape < 4 order by dateecheance';
		elseif ( $proc == 2)
		$select = "select code_action,action,processus,datedecision,dateecheance,responsable,etape,ida from action where etape < 4 and responsable='".$pseudo."' order by dateecheance";
		else
		$select = "select code_action,action,processus,datedecision,dateecheance,responsable,etape,ida from action where etape < 4 and processus='".$proc."' order by dateecheance";
           $result = mysql_query($select ) ;
		   $total = mysql_num_rows($result);

 	if($total)
 	{                
						   
 
                             while($ligne = mysql_fetch_array($result)) { 
	
	?>
	
	<div class="tl-row <?php if($i%2==1) echo 'float-right';
							  ?>">
        <div class="tl-bullet bg-<?php if(strtotime($ligne['dateecheance'])<date("U")) echo 'red'; else {switch($ligne['etape']) { case 1: echo 'blue-alt'; break; case 2: echo 'azure'; break; case 3: echo 'green'; break;}} ?>"></div>
        <div class="popover <?php if($i%2==0) echo 'left';
							  else echo 'right';
							  $i++;?> no-shadow">
							  
							  

							  
							  
            <div class="arrow"></div>
            <div class="popover-content">
                    <h3>
                        <span href="#" class="font-<?php if(strtotime($ligne['dateecheance'])<date("U")) echo 'red'; else {switch($ligne['etape']) { case 1: echo 'blue-alt'; break; case 2: echo 'azure'; break; case 3: echo 'green'; break;}} ?>" title="Horia Simon"><?php echo $ligne['responsable']; ?> </span>
                        <div class="float-right">
                            <a href="<?php echo 'form_wizard_action_'.($ligne['etape']+1).'.php?id_a='.$ligne['ida']; 
										$selectaud = "SELECT id FROM suivi_action where num='".$ligne['code_action']."'";
										$resultaud = mysql_query($selectaud ) ;
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_sa='.$ligneaud['id']; break; }



									?>" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="" data-original-title="Compléter la tâche"></a>
                        </div>
                    </h3>
                    <br>
					<strong>Numéro d'action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['code_action']; ?> <br>
													<strong>Type d'action &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php  if($ligne['action']==1) echo Corréctive;
													 elseif($ligne['action']==2) echo Préventive;  ?>  <br>
													<strong>Processus &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php $selectp= "select processus from processus where id=".$ligne['processus'];
																				   
																				   $resultp = mysql_query($selectp ) ;
																											
																				 
																											 while($lignep = mysql_fetch_array($resultp)) { 


																												echo $lignep['processus'];
																												  }  ?>  <br>
													
													
													<strong>Date de réalisation : </strong><?php echo datesimple($ligne['dateecheance']); ?> <br><br>
													
													
													
													
                    <div class="chat-time">
                        <i class="glyph-icon icon-clock-o"></i>
                        <?php echo temps_qui_reste($ligne['dateecheance'],"date");?>
                    </div>
            </div>
        </div>
 
        <div class="tl-panel">
            <?php echo datesimple($ligne['datedecision']); ?>
        </div>
    </div>
<?php } 
	      }
	      else echo "<h4 align='center' > Rien A Signaler</h4>"
    
       					
      
    
					
	       ?>
    

    
    
    
</div>
<?php include('menu_fin.php');  ?>