<?php
session_start();
include('menu_debut.php');
include('fonctions.php');
if (empty($_SESSION['user']))
    echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
?>




<div id="page-breadcrumb-wrapper">
    <div id="page-breadcrumb">
        <span class="current">
            <i class="glyph-icon icon-home"></i>
            Accueil
        </span>



    </div>
</div>



<div id="page-content" >






    <h3>
        <i class="glyph-icon icon-big  icon-sitemap"></i>
        Menu
    </h3>


    <div class="example-box">



        <div class="row">

            <div class="col-md-6">
                <a href="page.php?nom=Evenements" >
                    <?php
                    $select = 'select code_even,typeevenement,processus,datedecis,daterealis,responsable,etape from evenement where etape < 4 order by daterealis';
                    $result = mysql_query($select);
                    $ligne = mysql_fetch_array($result);
                    $total = mysql_num_rows($result);

                    if ($total) {
                        $selecteven = "select nom from noms_evenement where ide=" . $ligne['typeevenement'];
                        $resulteven = mysql_query($selecteven);
                        $ligneven = mysql_fetch_array($resulteven);

                        $selectp = "select processus from processus where id=" . $ligne['processus'];
                        $resultp = mysql_query($selectp);
                        $lignep = mysql_fetch_array($resultp);
                    }
                    ?>
                    <div class="info-box <?php if ($total && strtotime($ligne['daterealis']) < date("U")) echo 'error';
                    else echo 'success'; ?>-bg icon-wrapper">
                        <i class="glyph-icon icon-big icon-chain"></i>
                        <b style="font-size:16px;">Ev&eacute;nements</b>
                        <span class="stats">
                            <i class="glyph-icon icon-<?php if ($total && strtotime($ligne['daterealis']) < date("U")) echo 'thumbs-o-down';
                    else echo 'thumbs-o-up'; ?> font-<?php if ($total && strtotime($ligne['daterealis']) < date("U")) echo 'red';
                    else echo ''; ?>"></i>
                            <span class='font-black' style="font-size:15px;"> <?php if ($total && strtotime($ligne['daterealis']) < date("U")) echo $lignep['processus'];
                    else echo "Rien A Signaler"; ?><span>
                                    <span class="font-green"></span>
                                </span>
                                </div>
                                </a>
                                </div>






                                <div class="col-md-6">
                                    <a href="page.php?nom=Actions" >
                                        <?php
                                        $select = 'select code_action,action,processus,datedecision,dateecheance,responsable,etape from action where etape < 4 order by dateecheance';
                                        $result = mysql_query($select);
                                        $ligne = mysql_fetch_array($result);
                                        $total = mysql_num_rows($result);

                                        if ($total) {
                                            $selectp = "select processus from processus where id=" . $ligne['processus'];
                                            $resultp = mysql_query($selectp);
                                            $lignep = mysql_fetch_array($resultp);
                                        }
                                        ?>




                                        <div class="info-box <?php if ($total && strtotime($ligne['dateecheance']) < date("U")) echo 'error';
                                        else echo 'success'; ?>-bg icon-wrapper">
                                            <i class="glyph-icon icon-big icon-tasks"></i>
                                            <b style="font-size:16px;">Actions</b>
                                            <span class="stats">
                                                <i class="glyph-icon icon-<?php if ($total && strtotime($ligne['dateecheance']) < date("U")) echo 'thumbs-o-down';
                                        else echo 'thumbs-o-up'; ?> font-<?php if ($total && strtotime($ligne['dateecheance']) < date("U")) echo 'red';
                                        else echo 'black'; ?>"></i>
                                                <span class='font-black  '  style="font-size:15px;"> <?php if ($total && strtotime($ligne['dateecheance']) < date("U")) echo $lignep['processus'];
                                        else echo "Rien A Signaler"; ?></span>
                                                <span class="font-green"></span>
                                            </span>
                                        </div>
                                    </a>
                                </div>







                                <div class="col-md-6">

                                    <a href="tableaudebord.php">
                                        <div class="info-box bg-gray border-blue icon-wrapper">
                                            <i class="glyph-icon icon-big font-blue icon-table"></i>

                                            <b style="font-size:16px;"> Tableau de bord</b>
                                            <span class="stats">

                                            </span>
                                        </div>
                                    </a>
                                </div>



                                <div class="col-md-6">
                                    <a href="page.php?nom=Gestion documentaire" >
                                        <div class="info-box bg-gray border-blue icon-wrapper">
                                            <i class="glyph-icon icon-big font-blue icon-folder-open"></i>
                                            <b style="font-size:16px;">Gestion documentaire</b>
                                            <span class="stats">

                                            </span>
                                        </div>
                                    </a>
                                </div>




                                <div class="col-md-6 " >
                                    <a href="bibliotheque.php" >
                                        <div class="info-box bg-gray border-blue icon-wrapper">
                                            <i class="glyph-icon icon-big font-blue icon-book"></i>
                                            <b style="font-size:16px;">Biblioth&egrave;que</b>
                                            <span class="stats">

                                            </span>
                                        </div>
                                    </a>
                                </div>



                                <div class="col-md-6 " >
                                    <a href="page.php?nom=Timeline" >

                                        <div class="info-box bg-gray border-blue icon-wrapper">
                                            <i class="glyph-icon icon-big font-blue icon-clock-o"></i>
                                            <b style="font-size:16px;">Timeline</b>
                                            <span class="stats">

                                            </span>
                                        </div>
                                    </a>
                                </div>


                                </div>


                                </br></br>


                                <h3>
                                    <i class="glyph-icon icon-big  icon-legal"></i>
                                    Certification 
                                </h3>
                                <div class="example-box">


<?php
$select1 = 'SELECT DISTINCT processus,id FROM processus  ';
$result1 = mysql_query($select1) or die(mysql_error());


while ($ligne1 = mysql_fetch_array($result1)) {
    ?>

                                        <div  class="content-box box-toggle button-toggle content-box-closed">
                                            <h3 class="content-box-header ui-state-default">
                                                <span class="float-left"><?php echo '' . utf8_encode($ligne1['processus']) . ''; ?></span>
                                                <a href="#" class="float-right icon-separator btn toggle-button" >
                                                    <i class="glyph-icon icon-toggle icon-chevron-down"></i>
                                                </a>

                                            </h3>

                                            <div class="content-box-wrapper">


                                                <div >                
                                                    <h4>Rapport du dernier Audit externe :</h4>
                                                </div>

                                                <div class="content-box border-top border-black mrg25B" >
                                                    <div class="content-box-wrapper">
                                                        <p> <?php
    $id_even = "3";
    $select2 = 'select code_even,responsable,datedecis,daterealis from evenement where typeevenement=' . $id_even . ' and processus=' . $ligne1['id'] . ' order by daterealis desc ';

    $result2 = mysql_query($select2);


    $ligne2 = mysql_fetch_array($result2)
    ?>

                                                        <p><strong>Numéro d'evenement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne2['code_even']; ?> <br><br></p>

                                                        <p><strong>Résponsable  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo $ligne2['responsable']; ?> <br><br></p>

                                                        <p><strong>Date de decision &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo datesimple($ligne2['datedecis']); ?> <br><br></p>
                                                        <p><strong>Date de réalisation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php echo datesimple($ligne2['daterealis']); ?> <br><br></p>

                                                        <p><strong>Fichiers joints &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><?php
                                                        $fich = false;
                                                        $select3 = 'SELECT nomdoc,chemindoc FROM documents_evenement where documents_evenement.ide=' . $id_even;
                                                        $result3 = mysql_query($select3);
                                                        $chem = '';
                                                        $name = 'aucun fichier trouvé';
                                                        while ($ligne3 = mysql_fetch_array($result3)) {
                                                            $fich = true;
                                                            ?> <a href="<?php echo $ligne3['chemindoc']; ?>" class="font-blue-alt"> <?php echo $ligne3['nomdoc']; ?> </a> <br>  
    <?php } if (!$fich) echo 'aucun fichier trouvé'; ?> </p>



                                                        </p>
                                                    </div>

                                                </div>










                                            </div>
                                        </div>
<?php } ?>

                                </div>
                                </div>
                                </div>
                                </div>
<?php include('menu_fin.php');
?>

