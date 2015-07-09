
<?php include('config.php'); 

include('menu_debut.php'); 
if(isset($_POST['Numero']))
{
  if($_POST['Numero']=='') echo "<script type='text/javascript'>document.location.replace('form_wizard_1.php');</script>";    
	
	///////////----------------
  else {
  $req = "insert into non_conf values('','".$_POST['Numero']."','".$_POST['datepicker1']."','".$_POST['datepicker2']."','".$_POST['responsable']."',".$_POST['processus'].",'')";
   
   $result = mysql_query($req ) ;
   
   ////---------------------------
   $req2 = "insert into evenement values('".$_POST['Numero']."',4,".$_POST['processus'].",'".$_POST['datepicker1']."','".$_POST['responsable']."','".$_POST['datepicker2']."','',1)";
   
   $result2 = mysql_query($req2 ) ;
   
   ////-----------------------------
   
   $select= "select id from non_conf where code_even='".$_POST['Numero']."'";
   
   $result3 = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result3)) { 


                                $id_nc=$ligne['id'];
                                  }
 
   //////---------------------------
   
   $select = "select id,processus from evenement where code_even='".$_POST['Numero']."'";
   
   $result3 = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result3)) { 


                                $id_even=$ligne['id'];
                                $idp=$ligne['processus'];
                                  }
  
 } 
}

if(isset($_GET['id_e']) && isset($_GET['id_nc']) ){
   $id_even=$_GET['id_e'];
   $id_nc=$_GET['id_nc'];
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

        <div >
          <img src="assets/images/nc2.png" width="100%" height="100%" >
          
          <br>
		  <br>
		  <br>
          <div id="step-2">

            <form action="form_wizard_nc_3.php?id_nc=<?php echo "".$id_nc ?>&id_e=<?php echo "".$id_even ?>" class="col-md-10 center-margin" method="post">

                <div class="form-row">
                    <div class="form-label col-md-2">
                        <label for="">
                            Les causes de la non conformité
                        </label>
                    </div>
                    <div class="form-input col-md-10">
                    <textarea name="cause" id="" class="textarea-no-resize"></textarea>
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
