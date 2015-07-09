
<?php include('config.php'); 

include('menu_debut.php'); 

$id_suivi_action=$_GET['id_sa'];
$id_action=$_GET['id_a'];

if(isset($_POST['analyse']))
{
        
  $req = "UPDATE suivi_action SET analy_cause='".$_POST['analyse']."' WHERE id=".$id_suivi_action; 
   $result = mysql_query($req ) ;

   $req2 = "UPDATE suivi_action SET taches='".$_POST['taches']."' WHERE id=".$id_suivi_action;
   $result2 = mysql_query($req2 ) ;

   $req3 = "UPDATE action SET tache='".$_POST['taches']."' WHERE ida=".$id_action;
   $result3 = mysql_query($req3 ) ;
   
  //////////////////-------------------
  
  $req = "UPDATE action SET etape=2 WHERE id=".$id_action;
   
   $result = mysql_query($req ) ;
 } 

?>

<script language="javascript">
var cptIndicateur = 1;
</script>




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

<script type="text/javascript">

 function addLink()
 {
	 
		 var elem = document.getElementById('MyLink').cloneNode(true);
		
		var htmlCode = elem.innerHTML;
		document.getElementById('TheLink').innerHTML = '<a href="#"  onClick="addIndicateurBlock();" title="Horia Simon">Ajouter une action</a>';
		
		
	 
	 
 }
function addIndicateurBlock()
 {
	 
		 var elem = document.getElementById('myDiv_temp').cloneNode(true);
		
		var htmlCode = elem.innerHTML;
		document.getElementById('myDiv').innerHTML += ' <br><div class="form-label col-md-3" > <label for="" class="label-description"> Code de l\'action '+cptIndicateur+' :  </label> </div> <div class="form-input col-md-6"><input  type="text" name="action_'+cptIndicateur+'" id=""> </div><div class="form-input col-md-3"><select id="" name="type_act_'+cptIndicateur+'"><option value="1">Corrective</option><option value="2">Préventive</option></select></div><br> <br><br>';
		cptIndicateur++;
		
	 
	 
 }
   
  
 </script>



<div class="example-box">
    <div class="example-code">

        <div class="row">
          <img src="assets/images/act3.png" width="100%" height="100%" >
		  <br>
          <br>
          <div id="step-1">

            <form action="form_wizard_action_4.php?id_sa=<?php echo "".$id_suivi_action; ?>&id_a=<?php echo "".$id_action;?>" id="formremove" class="col-md-8 center-margin" method="post">
                <div class="form-checkbox-radio col-md-9">
							<strong> Evaluation de l'action: </strong> <br><br><br>
                            <input type="radio" name="efficacite" value="1" id="" checked="">
                            <label for="">Efficace</label>

                            <input type="radio" name="efficacite" value="0" id="" onClick="addLink();">
                            <label for="">Non efficace</label>

                            

                        </div>
				<div style="display: none" >
					<div class="form-row" id="myDiv_temp">
						
						<div class="form-label col-md-3">
							<label for="" class="label-description">
								Code de l'action 0:
								
							</label>
						</div>
						<div class="form-input col-md-6">
							<input  type="text" name="" id="">
						</div>
						<div class="form-input col-md-3">
							<select id="" name="type_act_1">
								<option value="1">Corrective</option>
								<option value="2">Préventive</option>
							</select>
						</div>
					</div>
				</div>
				<br>
<br>
<br>
<br>
				<div class="form-row" id="myDiv"> </div>
				<div  id="TheLink"> </div>
				<div style="display: none" id="MyLink"> <a href="#"  onClick="addIndicateurBlock();" title="Horia Simon">Ajouter une action</a> </div>
<br>
<br>

                
                       
                   <input class="btn medium primary-bg col-md-3" type="submit" width="50%" name="" value="Valider" id="">

                               


                

            </form>

          </div>
          
        </div>


    </div>
    
</div>



<?php include('menu_fin.php'); 


?>
