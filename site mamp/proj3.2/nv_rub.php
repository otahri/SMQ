<?php session_start();
include('config.php'); 
if(empty($_SESSION['user'])) echo "<script type='text/javascript'>document.location.replace('login.php');</script>";

include('menu_debut.php'); 
?>







<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">


                            <a href="bibliotheque.php" title="Evenements">
                                <i class="glyph-icon icon-book"></i>
                                Biblioth&egrave;que
                            </a>
                            <span class="current" >
                                
                                Nouveau rubrique
                                
                            </span>
                            
                            
 </div>
 </div>



<div id="page-content">
    




<h3>
    Biblioth&egrave;que
</h3>

<div class="example-box">
    <div class="example-code clearfix">


    							<div class="content-box mrg25B" >



                                <table class="table table-hover text-left " >
                                <thead>
                                <th>Nouveau Rubrique</th>
                                </thead>
                                </table>

                                	<form method="POST" name="form_r" action="nv_rub_exec.php">

			                        <div class="content-box-wrapper" >

			        						<div class="form-row">
			                                    <div class="form-label col-md-2">
			                                        <label for="">
			                                            Rubrique
			                                        </label>
			                                    </div>
			                                    <div class="form-input col-md-10">
			                                        <input placeholder="" type="text" name="rubrique" id="textfield">
			                                    </div>
			                                </div>
			                                <input  style="width: 100px;"   align="right" class="btn medium primary-bg " type="submit" name="envoyer" value="Ajouter">

			                         </div> 
			                         </form>      
			                      </div>   	
    </div>
    
</div>





<?php include('menu_fin.php'); 


?>
