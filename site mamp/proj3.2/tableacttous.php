<?php 
session_start();
include('menu_debut.php'); 

?>
<?php 

$ida = $_GET['ida'];

?>

<link rel="stylesheet" type="text/css" href="datatable/css/dataTables.tableTools.css">


<script type="text/javascript">
     function Supp(link){
                if(confirm('Voulez vous vraiment supprimer cette action ?')){
                 document.location.href = link;
                }
               }



</script> 

<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">	

							<a href="<?php echo 'processus_act.php?ida='.$ida; ?>" >
                                <i class="glyph-icon icon-bars"></i>
                                Processus
                            </a>
                            <span class="current">
                                <i class="glyph-icon icon-table"></i>
                                Table des actions
                            </span>
                            
                            
                        
                            
 </div>
 </div>



<div id="page-content"> 



<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Table des actions <?php 
                            $select = 'SELECT DISTINCT nom FROM noms_action where ida='.$ida;
                            $result = mysql_query($select ) ;
                             while($ligne = mysql_fetch_array($result)) { echo ''.utf8_encode($ligne['nom']).'s'; } ?>
        <small>
            Tous les processus
        </small>
    </div>
    <div class="clear"></div>
    <div class="divider"></div>
</h4>





<script type="text/javascript" charset="utf-8" src="datatable/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="datatable/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="datatable/js/TableTools.js"></script>
		<script type="text/javascript" charset="utf-8">
				$(document).ready( function () {
					$('#example').dataTable({
  "sScrollX": "100%",
  "sScrollY": 300,
          "bJQueryUI": true,
          "sPaginationType": "full_numbers",
		"sDom": 'T<"clear">lfrtip',
		// "sDom": '<"H"Tfr>t<"F"ip>',
    "oTableTools": {
        "sSwfPath": "datatable/swf/copy_csv_xls_pdf.swf",
        "aButtons": [
            {
                "sExtends": "copy",
				"sButtonText": "Copier",
                "mColumns": [0, 1, 2, 3, 4]
            },
			{
                "sExtends": "xls",
                "mColumns": [0, 1, 2, 3, 4]
            },
            {
                "sExtends": "pdf",
                "mColumns": [0, 1, 2, 3, 4]
            },
            {
                "sExtends": "print",
                "mColumns": [0, 1, 2, 3, 4],
                
			},
        ]
    }
});



 $('.dataTable .ui-icon-carat-2-n').addClass('icon-sort-up');
      $('.dataTable .ui-icon-carat-2-s').addClass('icon-sort-down');
      $('.dataTable .ui-icon-carat-2-n-s').addClass('icon-sort');

      $('.dataTables_paginate a.first').html('<i class="icon-caret-left"></i>');
      $('.dataTables_paginate a.previous').html('<i class="icon-angle-left"></i>');
      $('.dataTables_paginate a.last').html('<i class="icon-caret-right"></i>');
      $('.dataTables_paginate a.next').html('<i class="icon-angle-right"></i>');





} );
		</script>
<?php if($_SESSION['user']=='admin') {?> <button onclick="location.href='<?php  echo 'form_wizard_action_1.php?idp='.$idp.'';?>'" style="float: right; width: 10%; " class="btn medium primary-bg col-md-6">Ajouter</button> <?php }?>


<table class="table" id="example">
	<thead>
		<tr>
			<th>Code de l'action</th>
			<th>l'&eacutev&eacutenement</th>
			<th>Responsable</th>
			<th>Processus</th>
			<th>Date de d&eacutecision</th>
			<th>Date d'&eacutech&eacuteance</th>
			<th>Documents joints</th>
			
			<th>Progression</th>
<?php if($_SESSION['user']=='admin') {?> <th> Options </th> <?php }?>
		</tr>
	</thead>
	<tbody>
	<?php 
                            $select = 'SELECT ida,processus.processus,code_action,action.responsable,action.etape,action.datedecision,action.dateecheance,nomdoc,chemindoc,code_even,evenement.id FROM evenement,documents_action,action,processus where action.processus=processus.id and action.ida=documents_action.action and action.typeevenement=evenement.id and action.action='.$ida ;
                            $result = mysql_query($select ) ;
 
                             while($ligne = mysql_fetch_array($result)) { ?>

								<tr>
									<td><a href="<?php echo 'form_wizard_action_'.($ligne['etape']+1).'.php?id_a='.$ligne['ida']; 
										$selectaud = "SELECT id FROM suivi_action where num='".$ligne['code_action']."'";
										$resultaud = mysql_query($selectaud ) ;
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_sa='.$ligneaud['id']; break; }



									?>"><?php echo ''.$ligne['code_action'];?></a></td>
									<td> <a href="rapport_even_bilan.php?id_e=<?php echo ''.$ligne['id'];?>" class="font-blue-alt" ><?php echo ''.$ligne['code_even'];?></a></td>
									<td><?php echo ''.utf8_encode($ligne['responsable']);?></td>
									<td  ><?php echo ''.utf8_encode($ligne['processus']);?></td>
									<td class="center"><?php echo ''.$ligne['datedecision'];?></td>
									<td class="center"><?php echo ''.$ligne['dateecheance'];?></td>
									<td> <a href="<?php $select2 = 'SELECT nomdoc,chemindoc FROM documents_action where action='.$ligne['ida'];
                            $result2 = mysql_query($select2 ) ;
										$chem='#'; $name='*****';
                             while($ligne2 = mysql_fetch_array($result2)) { 
							  $chem=''.$ligne2['chemindoc']; $name=''.$ligne2['nomdoc'];} echo $chem;?>" class="font-blue-alt" ><?php echo $name ;?></a></td> 
									<td class="center"><span style="display: none;"><?php echo 'L\'étape '.$ligne['etape'];?></span> <div class="progress" >
														  <span class="<?php switch($ligne['etape']) { case 1: echo 'red'; break; case 2: echo 'orange'; break; case 3: echo 'blue'; break; case 4: echo 'green'; break; }?>" style="width: <?php echo $ligne['etape']*25; ?>%;"><span><?php echo $ligne['etape']*25; ?>%</span></span>
														</div> </td>
								<?php if($_SESSION['user']=='admin') {?>	<td> <div class="dropdown">
											<a href="javascript:;" title="" class="btn medium primary-bg"  data-toggle="dropdown">
												<span class="button-content">
													<i class="glyph-icon font-size-11 icon-cog"></i>
													<i class="glyph-icon font-size-11 icon-chevron-down"></i>
												</span>
											</a> 
											 <ul class="dropdown-menu float-right">
 
												<li>
													<a href="modif_act.php?id_act=<?php echo $ligne['ida']?>" title="">
														<i class="glyph-icon icon-edit mrg5R"></i>
														Modifier
													</a>
												</li>
												
												<li class="divider"></li>
												<li>
													<a onclick="Supp(this.href); return(false);" href="supprimerac.php?ida=<?php echo $ligne['ida']?>&idp=<?php echo $idp?>&idta=<?php echo $ligne['action']?>" class="font-red" title="">
														<i class="glyph-icon icon-remove mrg5R"></i>
														Supprimer
													</a>
												</li>
											</ul>
										</div>
									</td><?php }?>
								</tr>
		
                             
                                <?php } ?>
	
		
	</tbody>
	
</table>

<?php include('menu_fin.php'); 


?>
