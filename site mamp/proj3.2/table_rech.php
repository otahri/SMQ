<?php include('config.php'); 


?>

<!-- AUI Framework -->
<?php include('menu_debut.php'); 
?>
<?php $ide = $_GET['ide'];

?>
<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Evenement:  <?php 
                            $select = 'SELECT DISTINCT nom FROM noms_evenement,evenement where evenement.typeevenement=noms_evenement.ide and id='.$ide;
                            $result = mysql_query($select ) ;
                             while($ligne = mysql_fetch_array($result)) { echo ''.$ligne['nom']; } ?>
        <small>
            Processus: <?php 
                            $select = 'SELECT DISTINCT processus.processus FROM processus,evenement where evenement.processus=processus.id and evenement.id='.$ide;
                            $result = mysql_query($select ) ;
                             while($ligne = mysql_fetch_array($result)) { echo ''.$ligne['processus']; } ?>
        </small>
    </div>
    <div class="clear"></div>
    <div class="divider"></div>
</h4>



<table class="table" id="example1">
	<thead>
		<tr>
			<th>Code de l'&eacutev&eacutenement</th>
			<th>Responsable</th>
			<th>Date de d&eacutecision</th>
			<th>Date de r&eacutealisation</th>
			<th>Documents joints</th>
			<th>Progression</th>
			<th> Options </th>
		</tr>
	</thead>
	<tbody>
	<?php 
                            $select = 'SELECT code_even,responsable,datedecis,daterealis,etape,nomdoc,chemindoc FROM evenement,documents_evenement where evenement.id=documents_evenement.ide and  evenement.id='.$ide;
                            $result = mysql_query($select ) ;
 
                             while($ligne = mysql_fetch_array($result)) { ?>

								<tr>
									<td><?php echo ''.$ligne['code_even'];?></td>
									<td><?php echo ''.$ligne['responsable'];?></td>
									<td><?php echo ''.$ligne['datedecis'];?></td>
									<td class="center"><?php echo ''.$ligne['daterealis'];?></td>
									<td> <a href="<?php echo ''.$ligne['chemindoc'];?>" class="font-blue-alt" ><?php echo ''.$ligne['nomdoc'];?></a></td> 
									<td class="center"> <progress id="progressbar" value="<?php echo $ligne['etape'];?>" max="4"></progress> </td>
									<td> <div class="dropdown">
											<a href="javascript:;" title="" class="btn medium primary-bg"  data-toggle="dropdown">
												<span class="button-content">
													<i class="glyph-icon font-size-11 icon-cog"></i>
													<i class="glyph-icon font-size-11 icon-chevron-down"></i>
												</span>
											</a> 
											 <ul class="dropdown-menu float-right">
 
												<li>
													<a href="javascript:;" title="">
														<i class="glyph-icon icon-edit mrg5R"></i>
														Modifier
													</a>
												</li>
												
												<li class="divider"></li>
												<li>
													<a href="javascript:;" class="font-red" title="">
														<i class="glyph-icon icon-remove mrg5R"></i>
														Supprimer
													</a>
												</li>
											</ul>
										</div>
									</td>
								</tr>
		
                             
                                <?php } ?>
	
		
	</tbody>
	
</table>

<?php include('menu_fin.php'); 


?>
