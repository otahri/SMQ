
<?php 

include('menu_debut.php'); 


if(isset($_GET['id_even']))
{
 $id_even=$_GET['id_even'];

 }





if(isset($_POST['Numero']))
{
  
  
   ////---------------------------
   $req2 = "insert into evenement values('".$_POST['Numero']."','".$_POST['ide']."',".$_POST['processus'].",'".$_POST['datepicker1']."','".$_POST['Responsable']."','".$_POST['datepicker2']."','',2)";
   
   $result2 = mysql_query($req2 ) ;
   
   ////-----------------------------
   
   
   $select = "select id from evenement where code_even='".$_POST['Numero']."'";
   
   $result3 = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result3)) { 


                                $id_even=$ligne['id'];
                                  }
  
 
}


$select= "select typeevenement from evenement where id=".$id_even;
   
   $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { 

                                
                                $ide=$ligne['typeevenement'];
                                  }





?>



<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'processus.php?ide='.$ide; ?>" title="Evenements">
                                <i class="glyph-icon icon-chain"></i>
                                Processus
                            </a>
                            
                            <span class="current">
                                Validation rapport
                            </span>
 </div>
 </div>


<div id="page-content">






                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Rapport
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
							
							
							<div class="row">
							  <div >								
									<h4>Description de l'evenement:</h4>
								</div>
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
							
							</div>
				
							
							
					
		  
		  
		  
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<br><br><br>
		  <form action="rapport_even_bilan.php?id_e=<?php echo "".$id_even ?>"  method="post">
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
