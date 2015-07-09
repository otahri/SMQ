
<?php include('menu_debut.php'); 


?>



<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="page.php?nom=Gestion%20documentaire" title="Gestion documentaire">
                                <i class="glyph-icon icon-folder-open"></i>
                                Gestion documentaire
                            </a>
                            <a href="processusgestdoc.php" title="Gestion documentaire">
                                <i class="glyph-icon icon-bars"></i>
                                Processus
                            </a>
                            
                            
                            
                            <span class="current">
                                Supprimer processus
                            </span>
 </div>
 </div>



<div id="page-content">
    

<h3>
    Processus

</h3>
<p class="font-gray-dark">
    Veuillez supprimer un processus
 </p>
   
<script type="text/javascript">
     function Supp(link){
                if(confirm('Voulez vous vraiment supprimer ce processus ?')){
                 document.location.href = link;
                }
               }



</script> 






<div class="example-box">
    <div class="example-code clearfix">

        <ul class="sortable-elements">
            <?php 
                            $select = 'SELECT DISTINCT processus,id FROM processus  ';
                            $result = mysql_query($select ) ;
							
 
                             while($ligne = mysql_fetch_array($result)) { ?>


                                <li class="ui-state-default radius-all-4 pad5A pad10L pad10R mrg5T mrg5B">
                                    <a onclick="Supp(this.href); return(false);" href="<?php echo 'supp_proc_exec.php?idp='.$ligne['id'].''; ?>" >

                                        <i class="glyph-icon icon-remove"></i>

                                       <?php echo ''.utf8_encode($ligne['processus']).'';?>
                                    </a>
                                    
                                </li>
                                <?php } ?>
			
        </ul>

    </div>
    
</div>





<?php include('menu_fin.php'); 


?>
