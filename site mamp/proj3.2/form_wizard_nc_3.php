
<?php include('config.php'); 

include('menu_debut.php'); 

$id_nc=$_GET['id_nc'];
$id_even=$_GET['id_e'];

if(isset($_POST['cause']))
{
        
  $req = "UPDATE non_conf SET causes='".$_POST['cause']."' WHERE id=".$id_nc;
   
   $result = mysql_query($req ) ;
   
  //////////////////-------------------
  
  $req = "UPDATE evenement SET etape=2 WHERE id=".$id_even;
   
   $result = mysql_query($req ) ;
 } 

  $select= "select processus from evenement where id=".$id_even;
   
   $result = mysql_query($select ) ;
              
 
                             while($ligne = mysql_fetch_array($result)) { 

                                
                                $idp=$ligne['processus'];

                                  }

?>

<script language="javascript">
var cptIndicateur = 2;
</script>



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

<script type="text/javascript">

 
function addIndicateurBlock()
 {
	 
		 var elem = document.getElementById('myDiv_temp').cloneNode(true);
		
		var htmlCode = elem.innerHTML;
		document.getElementById('myDiv').innerHTML += ' <div class="form-label col-md-3" > <label for="" class="label-description"> Code de l\'action '+cptIndicateur+' :  </label> </div> <div class="form-input col-md-6"><input  type="text" name="action_'+cptIndicateur+'" id=""> </div><div class="form-input col-md-3"><select id="" name="type_act_'+cptIndicateur+'"><option value="1">Corrective</option><option value="2">Préventive</option></select></div><br> <br><br>';
		cptIndicateur++;
		
	 
	 
 }
   /*function changeFunc() {
    var selectBox = document.getElementById("selectBox");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	 
	
  
    for (i = 0; i < selectedValue; i++) 
{
	var ni = document.getElementById('myDiv'+i);

  var newdiv = document.createElement('div');
  var newdiv2 = document.createElement('div');
  var newdiv3 = document.createElement('div');
  var newlabel = document.createElement('label');
  
  newdiv.setAttribute('class','form-row');
  
  

  newdiv.innerHTML = '<div class="form-label col-md-4" > <label for="" class="label-description"> Code de l\'action :  </label> </div> <div class="form-input col-md-8"><input  type="text" name="action_'+i+'" id=""> </div>'
  ni.appendChild(newdiv);
  }
   }*/
 </script>



<div class="example-box">
    <div class="example-code">

        <div class="row">
          <img src="assets/images/nc3.png" width="100%" height="100%" >
		  <br>
          <br>
          <div id="step-1">

            <form action="form_wizard_nc_4.php?id_nc=<?php echo "".$id_nc ?>&id_e=<?php echo "".$id_even?>" id="formremove" class="col-md-8 center-margin" method="post">
                
				<div class="form-row" id="myDiv_temp">
                    
					<div class="form-label col-md-3">
                        <label for="" class="label-description">
                            Code de l'action 1:
                            
                        </label>
                    </div>
                    <div class="form-input col-md-6">
                        <input  type="text" name="action_1" id="">
                    </div>
					<div class="form-input col-md-3">
						<select id="" name="type_act_1">
							<option value="1">Corrective</option>
							<option value="2">Préventive</option>
						</select>
					</div>
                </div>
				
				<div class="form-row" id="myDiv"> </div>
				<a href="#"  onClick="addIndicateurBlock();" title="Horia Simon">Ajouter une action</a> 
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
