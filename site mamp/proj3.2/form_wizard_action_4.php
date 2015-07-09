
<?php include('config.php'); 

include('menu_debut.php'); 

$id_suivi_action=$_GET['id_sa'];
$id_action=$_GET['id_a'];
$i=1;
$select= "select proc,even from suivi_action where id=".$id_suivi_action;
   
   $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { 


                                $idp=$ligne['proc'];
								$cdeven=$ligne['even'];
                                  }
								  
if(isset($_POST['action_1']))
{ $sele= "select ide from evenement where code_even=".$cdeven;
   
   $resu = mysql_query($sele ) ;
							
 
                             while($lig = mysql_fetch_array($resu)) { $id_even=$lig['ide'];} 
     do{
		  $req = "insert into action values('','".$_POST['type_act_'.$i]."',".$idp.",'".$_POST['action_'.$i]."','','','','','',".$id_even.",'',0)";
  
			$result = mysql_query($req ) ;

			$i++;
		}while(isset($_POST['action_'.$i])); 

   
  // Passer à l'etape suivante
  
	
	
	
	

 } 
 $req = "UPDATE action SET etape=3 WHERE ida=".$id_even;
   
	$result = mysql_query($req ) ;
	
if(isset($_POST['efficacite']))
{	$req2 = "UPDATE suivi_action SET efficacite='".$_POST['efficacite']."' WHERE id=".$id_suivi_action;
   
	$result2 = mysql_query($req2 ) ;
}

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
          <img src="assets/images/act4.png" width="100%" height="100%" >
		  <br>
          <br>
          <div id="step-1">
		
				<div class="col-md-8 center-margin">
							
							
							<div class="row">
							  <div >								
									<h4>Description de l'audit</h4>
								</div>
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
													<p><strong>Date déchéance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['dateecheance']; ?> <br></p>
													<p><strong>Date début &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datedebut']; ?> <br></p>
													<p><strong>Date fin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datefin']; ?> </p>
													
													
													
													<?php }
										
										?></p>
										</div>
									
								</div>
							
							</div>
				
							
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
		  
		  
		  
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<br><br><br>
		  <form action="form_wizard_action_5.php?id_sa=<?php echo "".$id_suivi_action ?>&id_a=<?php echo "".$id_action ?>"  method="post">
<script src="jquery.uploadfile.js"></script>

<h4>Ajouter un document:</h4>

<div id="mulitplefileuploader">Selectionner un fichier</div>

<div id="status">
<script>
$(document).ready(function()
{
var settings = {
    url: "upload.php",
    dragDrop:true,
    fileName: "myfile",
    allowedTypes:"jpg,jpeg,png,gif,doc,docx,pdf,zip",	
    returnType:"json",
	 onSuccess:function(files,data,xhr)
    {
       // alert((data));
    },
    showDelete:true,
    deleteCallback: function(data,pd)
	{
    for(var i=0;i<data.length;i++)
    {
        $.post("delete.php",{op:"delete",name:data[i]},
        function(resp, textStatus, jqXHR)
        {
            //Show Message  
            $("#status").append("<div>Fichier supprimé</div>");      
        });
     }      
    pd.statusbar.hide(); //You choice to hide/not.

}
}
var uploadObj = $("#mulitplefileuploader").uploadFile(settings);


});
</script>
			
                 

<br><br>
                       
                   <input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="" value="Valider" id="">

   </div>


                

            </form>
	
			

          </div>
          
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
