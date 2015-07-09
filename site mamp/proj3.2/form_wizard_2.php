
<?php include('config.php'); 

include('menu_debut.php'); 
if(isset($_POST['Numero']))
{
  if($_POST['Numero']=='') echo "<script type='text/javascript'>document.location.replace('form_wizard_1.php');</script>";    
	
	///////////----------------
  else {
  $req = "insert into audit values('".$_POST['Numero']."','".$_POST['datepicker1']."','".$_POST['datepicker2']."','".$_POST['Responsable_audit']."',".$_POST['processus'].",'".$_POST['Responsable_audite']."','".$_POST['Points_audites']."','".$_POST['Nombre_actions']."','','')";
   
   $result = mysql_query($req ) ;
   
   ////---------------------------
   $req2 = "insert into evenement values('".$_POST['Numero']."',2,".$_POST['processus'].",'".$_POST['datepicker1']."','".$_POST['Responsable_audit']."','".$_POST['datepicker2']."','',1)";
   
   $result2 = mysql_query($req2 ) ;
  } 
}  
   ////-----------------------------
   if(isset($_POST['Numero'])){
   $select= "select id from audit where num='".$_POST['Numero']."'";
   
   $result3 = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result3)) { 


                                $id_audit=$ligne['id'];
                                  }
	

   //////---------------------------
   
   $select = "select processus,id from evenement where code_even='".$_POST['Numero']."'";
   
   $result3 = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result3)) { 


                                $id_even=$ligne['id'];
                                $idp=$ligne['processus'];

                                  }
								  
	}
   elseif(isset($_GET['id_a']) && isset($_GET['id_e']) ){
   $id_audit=$_GET['id_a'];
   $id_even=$_GET['id_e'];
   }

?>





<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'table.php?ide=2&idp='.$idp; ?>" >
                                <i class="glyph-icon icon-table"></i>
                                Table
                            </a>
                            
                            
                        
                            <span class="current">
                                audit etape 2
                            </span>
 </div>
 </div>



<div id="page-content">




                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        Audit interne
        <small>
            Suivi de l'audit
        </small>
    </div>
    <div class="clear"></div>
    
</h4>





<div class="example-box">
    <div class="example-code">

        <div >
          <img src="assets/images/e2.png" width="100%" height="100%" >
          
          <br>
		  <br>
		  <br>
          <div id="step-2">

            <form action="form_wizard_3.php?id_a=<?php echo "".$id_audit ?>&id_e=<?php echo "".$id_even ?>" class="col-md-10 center-margin" method="post">

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Analyse
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                    <textarea name="analy" id="" class="textarea-no-resize"></textarea>
                </div>
                </div>
                <input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="" id="">

            </form>

          </div>                      
        
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
