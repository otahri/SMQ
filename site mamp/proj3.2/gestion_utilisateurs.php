<?php session_start();
include('config.php'); 

include('menu_debut.php'); 


?>

<script type="text/javascript"> 
 function Supp(link){
    if(confirm('Voulez vous vraiment supprimer cet utilisateur ?')){
     document.location.href = link;
    }
   }
</script>


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <span class="current">
                                <i class="glyph-icon icon-home"></i>
                                Gestion des utilisateurs
                            </span>

 </div>
 </div>



<div id="page-content">




                    
<h4 class="heading-1 clearfix">
    <div class="heading-content"><br/>
        <?php echo utf8_encode('Gestion des utilisateurs') ?>
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
													<h4><?php echo utf8_encode("Liste des utilisateurs"); ?></h4>
												</div>
						  		<br>
						  		

						<table class="table">
                            <tbody>
							<?php $select= "select pseudo,id from user where proc >=0";
   
   $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { 

                                ?>
                                
                                <tr>
                                    <td class="font-bold text-left">
                                       <!-- <i class="glyph-icon icon-user"></i> -->
                                        <?php echo $ligne['pseudo']; ?>
                                    </td>
                                    <td class="text-center">
                                        
                                        <a href="modif_user.php?id=<?php echo $ligne['id']; ?>" class="btn small hover-blue-alt tooltip-button" data-placement="top" title="" data-original-title="Modifier">
                                            <i class="glyph-icon icon-edit"></i>
                                        </a>
                                        <a href="supp_user.php?id=<?php echo $ligne['id']; ?>" onclick="Supp(this.href); return(false);" class="btn small hover-red tooltip-button" data-placement="top" title="" data-original-title="Supprimer">
                                            <i class="glyph-icon icon-remove"></i>
                                        </a>
                                    </td>
                                </tr>
								 <?php  }   ?>
                                
                            </tbody>
                        </table>
										</br>
										
								
							
							</div>
						
				</div>
		  
		  
		  
          
        </div>


    </div>
    
</div>




<?php include('menu_fin.php'); 


?>
