
<?php include('config.php'); 

include('menu_debut.php'); 
if(isset($_POST['Numero']))
{
  if($_POST['Numero']=='') echo "<script type='text/javascript'>document.location.replace('form_wizard_1.php');</script>";    
	
	///////----------------
  $req = "insert into suivi_action values('','".$_POST['Numero']."','".$_POST['type_act']."','".$_POST['even']."','".$_POST['Responsable']."','".$_POST['processus']."','".$_POST['datepicker1']."','".$_POST['datepicker2']."','".$_POST['datepicker3']."','".$_POST['datepicker4']."','','','')";
   
   $result = mysql_query($req ) ;
   
   //////---------------------------
 
   
   $selectev= "select id from evenement where code_even='".$_POST['even']."'";
   
   $resultev = mysql_query($selectev) ;
							
 
                             while($lignev = mysql_fetch_array($resultev)) { 


                                $id_even=$lignev['id'];
                                  }
								  
								  
   $req2 = "insert into action values('','".$_POST['type_act']."','".$_POST['processus']."','".$_POST['Numero']."','".$_POST['datepicker1']."','".$_POST['datepicker2']."','".$_POST['Responsable']."','','".$_POST['datepicker3']."','".$id_even."','".$_POST['datepicker4']."','1')";
  
   
   $result2 = mysql_query($req2 ) ;
   
   ///////-----------------------------
   
   $select= "select id from suivi_action where num='".$_POST['Numero']."'";
   
   $result3 = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result3)) { 


                                $id_suivi_action=$ligne['id'];
								
                                  }
 
   //---------------------------
   
   $select = "select ida from action where code_action='".$_POST['Numero']."'";
   
   $result3 = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result3)) { 


                                $id_action=$ligne['ida'];
								
                                  }
  
 } 
	if(isset($_GET['id_a']) && isset($_GET['id_sa']) ){
   $id_action=$_GET['id_a'];
   $id_suivi_action=$_GET['id_sa'];
   }


$req = "UPDATE action SET etape=1 WHERE id=".$id_action;
   
   $result = mysql_query($req ) ;
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

        <div >
          <img src="assets/images/act2.png" width="100%" height="100%" >
          
          <br>
		  <br>
		  <br>
          <div id="step-2">

            <form action="form_wizard_action_3.php?id_sa=<?php echo "".$id_suivi_action ?>&id_a=<?php echo "".$id_action ?>" class="col-md-10 center-margin" method="post">

                <div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="">
                            Analyse des causes
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                    <textarea name="analyse" id="" class="textarea-no-resize"></textarea>
                </div>
                </div>
				<div class="form-row">
                    <div class="form-label col-md-4">
                        <label for="">
                            Les tâches à réaliser
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                    <textarea name="taches" id="" class="textarea-no-resize"></textarea>
                </div>
                </div>
                <input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="" value="Valider" id="">

            </form>

          </div>                      
        
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
