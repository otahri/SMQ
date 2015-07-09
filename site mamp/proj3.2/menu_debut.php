<?php include('config.php'); 

?>
<!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SMQ ARZ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

       
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/icons/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/images/icons/favicon.png">

        <!--[if lt IE 9]>
          <script src="assets/js/minified/core/html5shiv.min.js"></script>
          <script src="assets/js/minified/core/respond.min.js"></script>
        <![endif]-->

        
        <link rel="stylesheet" type="text/css" href="assets/css/minified/aui-production.min.css">

        
        <link id="layout-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/color-schemes/layouts/default.min.css">
        <link id="elements-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/color-schemes/elements/default.min.css">

        
        <link rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/responsive.min.css">

        

        <link rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/animations.min.css">

        

        <script type="text/javascript" src="assets/js/aui-production.js"></script>



    </head>
    <body class="fixed-sidebar fixed-header">
        

        <div id="loading" class="ui-front loader ui-widget-overlay bg-white opacity-100">
            <img src="assets/images/loader-dark.gif" alt="">
        </div>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="page-wrapper" class="demo-example">

            <div id="page-sidebar">
                <div id="header-logo">
                    <img width="180px"   style="padding-top:10px  " src="assets/images/logo_header.png" alt=""> 
					

                    <a href="javascript:;" class="tooltip-button" data-placement="bottom" title="Close sidebar" id="close-sidebar">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
                    <a href="javascript:;" class="tooltip-button hidden" data-placement="bottom" title="Open sidebar" id="rm-close-sidebar">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
                    <a href="javascript:;" class="tooltip-button hidden" title="Navigation Menu" id="responsive-open-menu">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
                </div>
                <div id="sidebar-search">
                   <b >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ARZ Assureur Conseil</b>
                </div>
                <div id="sidebar-menu" class="scrollable-content">
                    <ul>
                        <li>
                            <a href="index.php" title="Accueil">
                                <i class="glyph-icon icon-home"></i>
                                Accueil
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" title="Evenements">
                                <i class="glyph-icon icon-chain"></i>
                                Ev&eacute;nements
                            </a>
                            
                            

                            <ul>


                            <?php 
                            $select = 'SELECT DISTINCT nom,ide FROM noms_evenement  ';
                            $result = mysql_query($select ) ;
 
                             while($ligne = mysql_fetch_array($result)) { ?>


                                <li>
                                    <a href="<?php echo 'processus.php?ide='.$ligne['ide']; ?>" title="">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                       <?php echo ''.$ligne['nom'].'';?>
                                    </a>
                                </li>
                                <?php } ?>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" title="Actions">
                                <i class="glyph-icon icon-tasks"></i>
                                Actions
                            </a>
                            <ul>
                                <li>
                                    <a  href="processus_act.php?ida=1" title="">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Actions corr&eacute;ctives
                                    </a>
                                    
                                </li>
                                <li>
                                    <a href="processus_act.php?ida=2" title="">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Actions pr&eacute;ventives
                                    </a>
                                    
                                </li>
                             
                            </ul>
                        </li>
                        <li>
                            <a href="tableaudebord.php" title="Tableau de bord">
                               <i class="glyph-icon icon-table"></i>
                                Tableau de bord
                                
                            </a>
                            
                           
                        </li>
						<li>
                            <a href="javascript:;" title="Gestion documentaire">
                                <i class="glyph-icon icon-folder-open"></i>
                                Gestion documentaire
                            </a>
                            <ul>
                                <li>
                                    <a href="processusgestdoc.php" title="">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Fiche d'iden. du processus
                                    </a>
                                </li>
                                <li>
                                    <a href="fiche_doc.php?idr=9" title="">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Fiche de poste
                                    </a>
                                </li>
								<li>
                                    <a href="fiche_doc.php?idr=8" title="">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Fiche de fonction
                                    </a>
                                </li>
								<li>
                                    <a href="fiche_doc.php?idr=1" title="">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Proc&eacute;dures normatives
                                    </a>
                                </li>
								<li>
                                    <a href="veille.php" title="">
                                        <i class="glyph-icon icon-chevron-right"></i>
                                        Veille r&eacute;glementaire
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="bibliotheque.php" title="Bibliotheque">
                                <i class="glyph-icon icon-book"></i>
                                Biblioth&egrave;que
                                
                            </a>
                            
                           
                        </li>
                        <li>
                            <a href="javascript:;" title="Bibliotheque">
                                <i class="glyph-icon icon-clock-o"></i>
                                Timeline
                                
                            </a>
                            <ul>
                                <li >
                                <a href="timeline_action.php" >
                                <i class="glyph-icon icon-caret-right"></i>
                                                           Timeline Actions
                                </a>
                                </li>
                                 <li >
                               <a href="timeline_even.php" >  
                                <i class="glyph-icon icon-caret-right"></i>
                                                           Timeline Ev&eacute;nements
                                  </a>
                                 </li>
                             
                            </ul>
                            
                           
                        </li>
                        
                           
                    </ul>
                    <div class="divider mrg5T mobile-hidden"></div>
                    
                </div>

            </div><!-- #page-sidebar -->
			<div id="page-main">

                <div id="page-main-wrapper">

                    <div id="page-header" class="clearfix">
                        <div id="page-header-wrapper" class="clearfix">
                            
                            
                        
                            <div class="top-icon-bar dropdown">
                                <a href="javascript:;" title="" class="user-ico clearfix" data-toggle="dropdown">
                                    
                                    <span></span>
                                    <i class="glyph-icon icon-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu float-right">
                                    <li><?php 
										
										$selectproc = "select pseudo from user where login='".$_SESSION['user']."'";
										$resultproc = mysql_query($selectproc ) ;
										while($ligneproc = mysql_fetch_array($resultproc)) {
											
											$pseudo=$ligneproc['pseudo'];
										}
										$select1 = "select * from evenement where etape < 4 and responsable='".$pseudo."'";
										$result1 = mysql_query($select1 ) ;
										$total1 = mysql_num_rows($result1);
										$select2 = "select * from action where etape < 4 and responsable='".$pseudo."'";
										$result2 = mysql_query($select2 ) ;
										$total2 = mysql_num_rows($result2);
										$total=$total1+$total2;
										if($total > 0) {
										?>
                                        <span class="badge badge-absolute float-left radius-all-100 mrg5R bg-red tooltip-button" title="" data-original-title=""><?php echo $total; ?></span>
										<?php } ?>
									   <a href="gestion_utilisateurs.php" title="">
                                            <i class="glyph-icon icon-user mrg5R"></i>
                                            Gestion des utilisateurs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="edit_profile.php" title="">
                                            <i class="glyph-icon icon-cog mrg5R"></i>
                                            Modifier profile
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="logout.php" title="">
                                            <i class="glyph-icon icon-signout font-size-13 mrg5R"></i>
                                            <span class="font-bold">Logout</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
									<li>
                                        
                                        <a href="javascript:;" title="">
                                            <i class="glyph-icon icon-user mrg5R"></i>
                                            A propos
                                        </a>
                                    </li>
                                    
                                    
                                    

                                </ul>
                            </div>
                            

                            <div align="center " >
                                <a >
                                    <h4>
                                     Syst&egrave;me de Management de Qualit&eacute; 
                                     </h4>
                                </a>     
                            </div>
                            

                            

                        </div>
                    </div>
            
            

                  
                    
                    


