<!-- AUI Framework -->
<!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SMQ ARZ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Favicons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/images/icons/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/images/icons/favicon.png">

        <!--[if lt IE 9]>
          <script src="assets/js/minified/core/html5shiv.min.js"></script>
          <script src="assets/js/minified/core/respond.min.js"></script>
        <![endif]-->

        <!-- AgileUI CSS Core -->

        <link rel="stylesheet" type="text/css" href="assets/css/minified/aui-production.min.css">

        <!-- <link rel="stylesheet" type="text/css" href="../_assets/css/widgets/theme-switcher.css"> -->

        <!-- Theme UI -->

        <link id="layout-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/color-schemes/layouts/default.min.css">
        <link id="elements-theme" rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/color-schemes/elements/default.min.css">


        <link rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/responsive.min.css">

        <!-- AgileUI Animations -->

        <link rel="stylesheet" type="text/css" href="assets/themes/minified/agileui/animations.min.css">

        <!-- AgileUI JS -->

        <script type="text/javascript" src="assets/js/minified/aui-production.min.js"></script>

    </head>
    <body>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="login-page" class="mrg25B">

            <div id="page-header" class="clearfix">
                <div id="page-header-wrapper" class="clearfix">
                    <div id="header-logo">
                        <img width="180px"   style="padding-top:10px  " src="assets/images/logo_header.png" alt=""> 

                        <a href="#" class="tooltip-button" data-placement="bottom" title="Close sidebar" id="close-sidebar">
                            <i class="glyph-icon icon-align-justify"></i>
                        </a>
                        <a href="#" class="tooltip-button hidden" data-placement="bottom" title="Open sidebar" id="rm-close-sidebar">
                            <i class="glyph-icon icon-align-justify"></i>
                        </a>
                        <a href="#" class="tooltip-button hidden" title="Navigation Menu" id="responsive-open-menu">
                            <i class="glyph-icon icon-align-justify"></i>
                        </a>
                    </div>
                   

                </div>
            </div><!-- #page-header -->

        </div>
<img src="assets/images/login-bg.png" class="login-img" alt="">
<div class="ui-widget-overlay bg-black opacity-60"></div>
        <div class="pad20A mrg25T">
            <div class="row mrg25T">

                <div class="col-md-4 center-margin form-vertical mrg25T" >

                    <div class="ui-dialog modal-dialog mrg25T" id="login-form" style="position: relative !important;">
                        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                            <span class="ui-dialog-title">Authentification</span>
                        </div>
                        <div class="pad20A pad0B ui-dialog-content ui-widget-content">
                            
                            <div class="form-row">
                                <div class="form-label col-md-2">
                                    <label for="">
                                        Nom d'utilisateur:
                                    </label>
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input-icon">
                                        <i class="glyph-icon icon-user ui-state-default"></i>
                                        <input placeholder="username" type="text" name="login" id="login">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-label col-md-2">
                                    <label for="">
                                        Mot de passe:
                                    </label>
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input-icon">
                                        <i class="glyph-icon icon-unlock-alt ui-state-default"></i>
                                        <input placeholder="Password" type="password" name="pass" id="pass">
                                    </div>
                                </div>
                            </div>
							<div align="center" id="resultat"></div>
                            <div class="form-row">
                                
                                
                            </div>
                        </div>
                        <div class="ui-dialog-buttonpane text-center">
                            <button type="button" id="auth" class="btn large primary-bg text-transform-upr font-bold  ">
                                <span class="button-content">
                                    Se connecter
                                </span>
                            </button>
                        </div>
                    </div>

                </div>    

                

            </div>

        </div>


        
	<script src="ajax_authentification.js" type="text/javascript"></script>
    </body>
</html>