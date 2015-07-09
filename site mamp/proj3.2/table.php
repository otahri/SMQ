<?php 
session_start();
include('config.php'); 
require_once ("fonctions.php");

?>
	

	<link rel="stylesheet" type="text/css" href="datatable/css/dataTables.tableTools.css">
	

<?php include('menu_debut.php'); 
?>


<?php $ide = $_GET['ide'];
$idp = $_GET['idp'];
?>



<script type="text/javascript">
     function Supp(link){
                if(confirm('Voulez vous vraiment supprimer cet evenement ?')){
                 document.location.href = link;
                }
               }



</script> 


<div id="page-breadcrumb-wrapper">
<div id="page-breadcrumb">
                            <a href="<?php echo 'processus.php?ide='.$ide; ?>" title="Evenements">
                                <i class="glyph-icon icon-bars"></i>
                                Processus
                            </a>
                            
                            <span class="current">
                                Table
                            </span>
 </div>
 </div>


<div id="page-content">









<h4 class="heading-1 clearfix">
    <div class="heading-content">
        Table des <?php 
                            $select = 'SELECT DISTINCT nom FROM noms_evenement where ide='.$ide;
                            $result = mysql_query($select ) ;
                             while($ligne = mysql_fetch_array($result)) { echo ''.$ligne['nom']; } ?>
        <small>
            Processus: <?php 
                            $select = 'SELECT DISTINCT processus FROM processus where id='.$idp;
                            $result = mysql_query($select ) ;
                             while($ligne = mysql_fetch_array($result)) { echo ''.$ligne['processus']; } ?>
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
                "mColumns": [0, 1, 2, 3]
            },
			{
                "sExtends": "xls",
                "mColumns": [0, 1, 2, 3]
            },
            {
                "sExtends": "pdf",
                "mColumns": [0, 1, 2, 3]
            },
            {
                "sExtends": "print",
                "mColumns": [0, 1, 2, 3],
                
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






<?php if($_SESSION['user']=='admin') {?><button onclick="location.href='<?php if($ide==2) echo 'form_wizard_1.php?idp='.$idp.''; elseif($ide==4) echo 'form_wizard_nc_1.php?idp='.$idp.''; else echo 'rapport_even.php?ide='.$ide.'&idp='.$idp.'';?>'" style="float: right; width: 10%; " class="btn medium primary-bg col-md-6">Nouveau</button><?php }?>

<table class="table" id="example">
	<thead>
		<tr>
			<th>Code de l'&eacutev&eacutenement</th>
			<th>Responsable</th>
			<th>Date de d&eacutecision</th>
			<th>Date de r&eacutealisation</th>
			<th>Documents joints</th>
			<th>Progression</th>
			<?php if($_SESSION['user']=='admin') {?><th> Options </th> <?php }?>
			
			
			
			
		</tr>
	</thead>
	<tbody>
	<?php 
                            $select = 'SELECT id,code_even,responsable,datedecis,daterealis,etape FROM evenement where typeevenement='.$ide.' and evenement.processus='.$idp;
                            $result = mysql_query($select ) ;
 
                             while($ligne = mysql_fetch_array($result)) { ?>

								<tr>
									<td><a href="<?php 

										 if($ide==2) {echo 'form_wizard_'.($ligne['etape']+1).'.php?id_e='.$ligne['id'];
										$selectaud = "SELECT id FROM audit where num='".$ligne['code_even']."'";

										$resultaud = mysql_query($selectaud ) ;
										
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_a='.$ligneaud['id']; break; }
										 }
										
										elseif($ide==4) {echo 'form_wizard_nc_'.($ligne['etape']+1).'.php?id_e='.$ligne['id']; 
										$selectaud = "SELECT id FROM non_conf where code_even='".$ligne['code_even']."'";
										$resultaud = mysql_query($selectaud ) ;
										 while($ligneaud = mysql_fetch_array($resultaud)) { echo '&id_nc='.$ligneaud['id']; break; }
										 }
										else {if($ligne['etape']==2) echo 'rapport_even_valid.php?id_even='.$ligne['id']; else echo 'rapport_even_bilan.php?id_e='.$ligne['id'];}


										

										 


										 ?>">


									<?php echo ''.$ligne['code_even'];?></a></td>
									<td><?php echo ''.utf8_encode($ligne['responsable']);?></td>
									<td ><div><span style="display: none;"><?php echo ''.$ligne['datedecis'];?> <br></span></div><?php echo datesimple($ligne['datedecis']);?></td>
									<td ><span style="display: none;"><?php echo ''.$ligne['daterealis'];?></span><?php echo datesimple($ligne['daterealis']);?></td>
									<td> <a href="<?php $select2 = 'SELECT nomdoc,chemindoc FROM documents_evenement where documents_evenement.ide='.$ligne['id'];
                            $result2 = mysql_query($select2 ) ;
										$chem='#'; $name='*****';
                             while($ligne2 = mysql_fetch_array($result2)) { 
							  $chem=''.$ligne2['chemindoc']; $name=''.$ligne2['nomdoc'];} echo $chem;?>" class="font-blue-alt" ><?php echo $name ;?></a></td> 
									<td class="center"><span style="display: none;"><?php echo 'L\'étape '.$ligne['etape'];?></span> <div class="progress" >
														  <span class="<?php switch($ligne['etape']) { case 1: echo 'red'; break; case 2: echo 'orange'; break; case 3: echo 'blue'; break; case 4: echo 'green'; break; }?>" style="width: <?php echo $ligne['etape']*25; ?>%;"><span><?php echo $ligne['etape']*25; ?>%</span></span>
														</div> </td>
									<?php if($_SESSION['user']=='admin') {?> <td> <div class="dropdown">
											<a href="javascript:;" title="" class="btn medium primary-bg"  data-toggle="dropdown">
												<span class="button-content">
													<i class="glyph-icon font-size-11 icon-cog"></i>
													<i class="glyph-icon font-size-11 icon-chevron-down"></i>
												</span>
											</a> 
											 <ul class="dropdown-menu float-right">
 
												<li>
													<a href="modifier_tab_even.php?id_e=<?php echo $ligne['id']?>" title="">
														<i class="glyph-icon icon-edit mrg5R"></i>
														Modifier
													</a>
												</li>
												
												<li class="divider"></li>
												<li>
													<a onclick="Supp(this.href); return(false);" href="supprimerev.php?idev=<?php echo $ligne['id']?>&idp=<?php echo $idp?>&ide=<?php echo $ide?>" class="font-red" title="">
														<i class="glyph-icon icon-remove mrg5R"></i>
														Supprimer
													</a>
												</li>
											</ul>
										</div>
									</td> <?php }?>
									
									
									
								</tr>
		
                             
                                <?php } ?>
	
		
	</tbody>
	
</table>

<?php include('menu_fin.php'); 


?>
