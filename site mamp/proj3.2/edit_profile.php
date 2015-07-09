<?php session_start();
include('config.php'); 

include('menu_debut.php'); 


$select= "select pseudo,proc,pwd from user where login='".$_SESSION['user']."'";
   
   $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { 

                                $proc=$ligne['proc'];
                                $pseudo=$ligne['pseudo'];
								$pwd=$ligne['pwd'];
                                  }


                            


?>




<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <span class="current">
                                <i class="glyph-icon icon-home"></i>
                                Modifier mon profil
                            </span>

 </div>
 </div>



<div id="page-content">
<script type="text/javascript">
function changer_mdp() {
   if(document.getElementById('check_mdp').checked) {
   	document.getElementById("txtf1").innerHTML = '<strong>Ancien mot de passe</strong><br><br> <div class="form-input col-md-8" title=""> <ul class="chosen-choices"> <li class="search-field"> <input type="password" name="an_mdp" id="an_mdp" value="" class="default"> </li> </ul> </div> <br><br><br> <strong>Nouveau mot de passe</strong><br><br> <div class="form-input col-md-8" title=""> <ul class="chosen-choices"> <li class="search-field"> <input type="password" value="" name="nv_mdp" id="nv_mdp" class="default"> </li> </ul> </div> <br><br><br> <strong>Confirmation du nouveau mot de passe</strong><br><br> <div class="form-input col-md-8" title=""> <ul class="chosen-choices"> <li class="search-field"> <input type="password" value="" name="cnv_mdp" id="cnv_mdp" class="default"> </li> </ul> </div>';
   	document.getElementById('check_mdp').value = "1";
	}
	else { document.getElementById("txtf1").innerHTML = '<strong>Ancien mot de passe</strong><br><br> <div class="form-input col-md-8" title=""> <ul class="chosen-choices"> <li class="search-field"> <input type="password" name="an_mdp" id="an_mdp" value="" class="default" disabled=""> </li> </ul> </div> <br><br><br> <strong>Nouveau mot de passe</strong><br><br> <div class="form-input col-md-8" title=""> <ul class="chosen-choices"> <li class="search-field"> <input type="password" value="" name="nv_mdp" id="nv_mdp" class="default" disabled=""> </li> </ul> </div> <br><br><br> <strong>Confirmation du nouveau mot de passe</strong><br><br> <div class="form-input col-md-8" title=""> <ul class="chosen-choices"> <li class="search-field"> <input type="password" value="" name="cnv_mdp" id="cnv_mdp" class="default" disabled=""> </li> </ul> </div>'; 
	document.getElementById('check_mdp').value = "0";
	}
 	}
</script>



                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        <?php echo utf8_encode($pseudo) ?>
        <small>
            Modification
        </small>
    </div>
    <div class="clear"></div>
    
</h4>




<div class="example-box">
    <div class="example-code">

        <div class="row">
          
		  <br>
          <br>
          <div id="step-1">
		
				<div class="col-md-8 center-margin">
						
							<div class="row">


											  <div >								
													<h4><?php echo utf8_encode("Paramètre du profil"); ?></h4>
												</div>
						  		
						  		<div class="content-box border-top border-black mrg25B" >
										<div class="content-box-wrapper">
								    <form method="POST" action="javascript:;" name="formSaisie"  enctype="multipart/form-data">
	    
										    		     
										    		      
										    		      
														  <input type="hidden" name="pwd" id="pwd" value="<?php echo $pwd;?>">
										    		           


										<p> 

													<p><strong>Nom d'utilisateur : </strong>
													 
													<div class="form-input col-md-8"  style="width: 712px;" title="">
														<ul class="chosen-choices">
															<li class="search-field">
																<input type="text" name="nom" id="nom" value="<?php echo utf8_encode($pseudo); ?>">
															</li>
														</ul>
														
													</div></p>
													<br>
													<p><strong>Login  : 
													</strong><div class="form-input col-md-8"   title="">
														<ul class="chosen-choices">
															<li class="search-field">
																<input type="text" name="login" id="login" value="<?php echo $_SESSION['user']; ?>">
															</li>
														</ul>
														
													</div></p>
													<br><br>
													<?php if($proc>=0){ ?>
													<p><strong>Processus : </strong>
													
                    
                    <div class="form-input col-md-8">
						<select name="proc" id="proc">
						<?php 
                            $selectp = 'SELECT DISTINCT processus,id FROM processus  ';
                            $resultp = mysql_query($selectp ) ;
							
                             while($lignep = mysql_fetch_array($resultp)) { ?>

								<option <?php if($lignep['id'] == $proc){echo("selected");}?> value=<?php echo $lignep['id']?>> <?php echo ''.utf8_encode($lignep['processus']).'';?></option>
                                
                                <?php } ?>
							
							
						</select>
					</div>
                
										<br><br>			
													
													<?php } ?>
													
													<div class="checkbox-radio">
                                <div class="form-checkbox-radio col-md-9">
									<input type="checkbox" name="check" id="check_mdp" Onclick="changer_mdp()" value="0">
								
                                <label for="">Modifier le mot de passe</label></div>
                            </div>
													<br>
													<br>
													<br>
													<div id="txtf1">
													<strong>Ancien mot de passe</strong><br><br>
													<div class="form-input col-md-8"  title="">
														<ul class="chosen-choices">
															<li class="search-field">
																<input type="password" name="an_mdp" id="an_mdp" value="" class="default"   disabled="">
															</li>
														</ul>
														
													</div>
													<br><br><br>
													<strong>Nouveau mot de passe</strong><br><br>
													<div class="form-input col-md-8"   title="">
														<ul class="chosen-choices">
															<li class="search-field">
																<input type="password" value="" name="nv_mdp" id="nv_mdp" class="default"   disabled="">
															</li>
														</ul>
														
													</div>
													<br><br><br>
													
													<strong>Confirmation du nouveau mot de passe</strong><br><br>
													<div class="form-input col-md-8"  title="">
														<ul class="chosen-choices">
															<li class="search-field">
																<input type="password" value="" name="cnv_mdp" id="cnv_mdp" class="default"   disabled="">
															</li>
														</ul>
														
													</div>
													</div>
													
<br><br><br>                                      <div align="center" id="resultat"></div>
<br>
										<p><input class="btn medium primary-bg col-md-3" type="submit" id="modif" width="50%" name="" id="" value="Modifier"></p>
										</form>
										</br>
										</div>
									
								</div>

								
							
							</div>
						
				</div>
		  
		  
		  <script src="ajax_modif_profil.js" type="text/javascript"></script>
          
        </div>


    </div>
    
</div>





<?php include('menu_fin.php'); 


?>
