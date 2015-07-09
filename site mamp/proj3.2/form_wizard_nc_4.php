
<?php include('config.php'); 

include('menu_debut.php'); 

$id_nc=$_GET['id_nc'];
$id_even=$_GET['id_e'];
$i=1;
$select= "select proc from non_conf where id=".$id_nc;
   
   $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { 


                                $idp=$ligne['proc'];
                                  }
								  
if(isset($_POST['action_1']))
{
     do{
		  $req = "insert into action values('','".$_POST['type_act_'.$i]."',".$idp.",'".$_POST['action_'.$i]."','','','','','',".$id_even.",'',0)";
  
			$result = mysql_query($req ) ;

			$i++;
		}while(isset($_POST['action_'.$i])); 

   
  // Passer à l'etape suivante
  
	$req = "UPDATE evenement SET etape=3 WHERE id=".$id_even;
   
	$result = mysql_query($req ) ;
	
 } 

  $select= "select processus from evenement where id=".$id_even;
   
   $result = mysql_query($select ) ;
              
 
                             while($ligne = mysql_fetch_array($result)) { 

                                
                                $idp=$ligne['processus'];

                                  }

?>

<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'table.php?ide=4&idp='.$idp; ?>" >
                                <i class="glyph-icon icon-table"></i>
                                Table
                            </a>
                            
                            
                        
                            <span class="current">
                                NON CONFORMITÉ
                            </span>
 </div>
 </div>



<div id="page-content"> 
                    
                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
       NON CONFORMITÉ 
        <small>
            Suivi de la non-conformité
        </small>
    </div>
    <div class="clear"></div>
    
</h4>




<div class="example-box">
    <div class="example-code">

        <div class="row">
          <img src="assets/images/nc4.png" width="100%" height="100%" >
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
												$select= "select code_even,datedec,daterealis,responsable,proc from non_conf where id=".$id_nc;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { ?>

													<strong>Numéro de la non conformité : </strong><?php echo $ligne['code_even']; ?> <br><br>
													<strong>Processus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php $selectp= "select processus from processus where id=".$ligne['proc'];
																				   
																				   $resultp = mysql_query($selectp ) ;
																											
																				 
																											 while($lignep = mysql_fetch_array($resultp)) { 


																												echo $lignep['processus'];
																												  }  ?>  <br><br>
													<strong>Résponsable &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong><?php echo $ligne['responsable']; ?> <br><br>
													<strong>Date de décision &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['datedec']; ?> <br><br>
													<strong>Date de réalisation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne['daterealis']; ?> <br>
													
													
													
													<?php }
										
										?></p>
										</div>
									
								</div>
							
							</div>
				
							
							<div class="row">
							  <div >								
									<h4>Les causes de la non conformité</h4>
								</div>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php 
												$select= "select causes from non_conf where id=".$id_nc;
				   
												$result = mysql_query($select ) ;
											
				 
												while($ligne = mysql_fetch_array($result)) { 

													echo $ligne['causes'];
													
													}
										
										?></p>
										</div>
									
								</div>
							
				
						</div>
					<div class="row">
							  <div >								
									<h4>Actions</h4>
								</div>
						  <div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
										<p> <?php $c=1;
												$selecta= "select action,code_action from action where typeevenement=".$id_even;
				   
												$resulta = mysql_query($selecta ) ;
											
				 
												while($lignea = mysql_fetch_array($resulta)) { ?>
												
													<strong>Action <?php echo $c; $c++;?> : </strong><?php echo $lignea['code_action']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
													<?php if($lignea['action']==1) echo Corréctive;
													 elseif($lignea['action']==2) echo Préventive;
																												    ?>  <br><br>
													
													
													
													<?php }
										
										?></p>
										</div>
									
								</div>
							
							</div>
		  
		  
		  
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<br><br><br>
		  <form action="form_wizard_nc_5.php?id_nc=<?php echo "".$id_nc ?>&id_e=<?php echo "".$id_even ?>"  method="post">
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
			
	<!--	<form action="form_wizard_2.php" class="col-md-8 center-margin" method="post"><div class="form-row"><div class="form-label col-md-4"><label for="" class="label-description">Référence document:</label> </div><div class="form-input col-md-8"><input  type="text" name="Numero" id=""></div></div><div class="form-row"><div class="form-label col-md-4"><label for="" class="label-description">Version document:</label></div><div class="form-input col-md-8"><input  type="text" name="Responsable_audit" id=""></div></div> <div class="form-row"><div class="form-label col-md-4"><label for="" class="label-description">Date document:</label></div> <div class="form-input col-md-8" class="form-input"><input type="text" class="col-md-3" id="datepicker3" name="datepicker2"></div></div>-->
                 

<br><br>
                       
                   <input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="" value="Valider" id="">

   </div>
</div>                            


                

            </form>
	
			

          </div>
          
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
