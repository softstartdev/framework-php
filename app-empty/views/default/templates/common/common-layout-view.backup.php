<?php
// security
if (!defined('IS_INDEX') || IS_INDEX !== true) {
    exit();
}
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
        
        <title><?= $c->getConfig("APP.NAME") ?></title>
        <link href="<?= $c->getResource('img', 'FAVICON.png') ?>" rel="shortcut icon" />
        
        <!-- jquery -->
        <script src='<?php //getPathLibrary() ?>/jquery/jquery.min.js' type='text/javascript'></script>
        
        <!-- bootstrap -->
        <link href="<?php //getPathLibrary() ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php //getPathLibrary() ?>/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <script src="<?php //getPathLibrary() ?>/bootstrap/js/bootstrap.js"></script>

        <!-- morris -->
        <link href="<?php //getPathLibrary() ?>/morris/morris.css" rel="stylesheet">
        <script src="<?php //getPathLibrary() ?>/morris/morris.min.js"></script>

        <!-- raphael -->
        <script src="<?php //getPathLibrary() ?>/raphael/raphael.min.js"></script>
        <!--
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        -->
        
        <!-- moment -->
        <script src="<?php //getPathLibrary() ?>/moment/moment.min.js"></script>
        <script src="<?php //getPathLibrary() ?>/moment/locale/es.js"></script>

        <!-- bootstrap-datetimepicker -->
        <script src="<?php //getPathLibrary() ?>/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet" href="<?php //getPathLibrary() ?>/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php //getPathLibrary() ?>/html5shiv/html5shiv.min.js"></script>
          <script src="<?php //getPathLibrary() ?>/respond/respond.min.js"></script>
        <![endif]-->
        
        <!-- bootbox -->
        <script src="<?php //getPathLibrary() ?>/bootbox/bootbox.js"></script>
        
        <!-- font-awesome
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        -->
        <link href="<?php //getPathLibrary() ?>/font-awesome/font-awesome.css" rel="stylesheet" type="text/css" />
        
        <!-- animate -->
        <link href="<?php //getPathLibrary() ?>/animate/animate.css" rel="stylesheet" type="text/css" />
        
        <!-- owl carousel -->
        <script src="<?php //getPathLibrary() ?>/owl-carousel/owl.carousel.js"></script>
        <link href="<?php //getPathLibrary() ?>/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
        
        <!-- select2
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
        -->
        <link href="<?php //getPathLibrary() ?>/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
        <script src="<?php //getPathLibrary() ?>/select2/4.0.8/js/select2.min.js"></script>
        <!--
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        -->
        
        <!-- InputImage -->
        <script src="<?php //getJsTemplate('InputImage') ?>" type="text/javascript"></script>
        
        <!-- InputFile -->
        <script src="<?php //getJsTemplate('InputFile') ?>" type="text/javascript"></script>
        
        <!-- Dropzone
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" integrity="sha256-0Z6mOrdLEtgqvj7tidYQnCYWG3G2GAIpatAWKhDx+VM=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js" integrity="sha256-awEOL+kdrMJU/HUksRrTVHc6GA25FvDEIJ4KaEsFfG4=" crossorigin="anonymous"></script>
        -->
        
        <!-- Jquery -->
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkK6mGzJvoz3Z2X6goXlzLi4wfrykzbow&libraries=&v=weekly" async ></script>
        <!-- &callback=initMap -->
        
        <!-- notify -->
        <script src="<?= getPathLibrary() ?>/notify/notify.js"></script>
        
        <!-- css -->
        <link href='<?= getCssTemplate('layout-panel') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= getCssTemplate('layout-table') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= getCssTemplate('layout-form') ?>'  rel='stylesheet' type='text/css' />
        <link href='<?= getCssTemplate('layout-dashboard') ?>'  rel='stylesheet' type='text/css' />
        
        <link href='<?= getCssTemplate('ui-breadcrumbs') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= getCssTemplate('ui-form') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= getCssTemplate('ui-table') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= getCssTemplate('ui-filtersbar') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= getCssTemplate('ui-paginator') ?>' rel='stylesheet' type='text/css' />
        <link href='<?= getCssTemplate('ui-box') ?>' rel='stylesheet' type='text/css' />
        <!--
        <link href='<?= getCssTemplate('ui-dashboard') ?>' rel='stylesheet' type='text/css' />
        -->

        <link href='<?= getCssTemplate('theme') ?>' rel='stylesheet' type='text/css' />
        <!--
        <link href='<?= getCssTemplate($code) ?>' rel='stylesheet' type='text/css' />    
        -->
        
        <!-- js -->
        <script src="<?= getJsTemplate('Config') ?>" type="text/javascript"></script>
        <script src="<?= getJsTemplate('Http') ?>" type="text/javascript"></script>
        <script src="<?= getJsTemplate('UI') ?>" type="text/javascript"></script>
        <script src="<?= getJsTemplate('URL') ?>" type="text/javascript"></script>
        <script src="<?= getJsTemplate('scripts') ?>" type="text/javascript"></script>
        
        <script src="<?= getJsTemplate(getParameter("r")) ?>" type="text/javascript" st="cef790e9fae132ea821a22d651c0145f"></script>
        
        <!--
        <base href="<?= getConfig("APP_URL") ?>" />
        -->
    </head>
    <body>
        
        <!-- debug -->
        <div class="visible-lg" style="position: fixed; z-index: 1000">lg</div>
        <div class="visible-md" style="position: fixed; z-index: 1000">md</div>
        <div class="visible-sm" style="position: fixed; z-index: 1000">sm</div>
        <div class="visible-xs" style="position: fixed; z-index: 1000">xs</div>
        
        <div id='js-pnl-layout' class="layout">
            <div id='js-pnl-sidebar' class="sidebar">
                
                <!--
                <div class="brand-movil"></div>
                -->
                
                <div class="profile">
                    <img id='js-img-profileImage' src="" alt="" />
                    <div class="datas-content">
                        <h3 id='js-txt-profileName'>- - -</h3>
                        <b><span id='js-txt-profileProfile'>- - -</span><span id='js-txt-profileBusiness'>- - -</span></b>
                    </div>
                </div>
                <a id='js-btn-toggleMenu' class="button-bar visible-xs" href="javascript:void(0);"><span></span></a>

                <!--
                <hr>
                -->

                <div class="menu">
                    <ul id='js-pnl-menu'>
                        <!--
                        Se llena de manera dinámica.
                        -->
                    </ul>
                </div>

            </div>
            
            <!-- ************************* -->
            
            <div class="content">

                <?= $header ?>

                <div class="main">

                    <?= $content ?>

                </div>
            </div>

        </div>
        
        <!-- Javascript aquí abajo -->
        
        <!--
        <script>
            $(document).ready(function() {
                var scope = $("#js-pnl-page");
                
                //Your code here...
                
            });
        </script>
        -->
        
        <script>   

            $(document).ready(function() {
                
                // Security --------------
                
                var url = "app-auth-isLogued";
                App.http.get(url).then(function(response) {
                if (response.status == "OK") {
                    if (response.datas == false) {
                        document.write("Para continuar inicie sesión");
                        //if (App.config.USER_LOGUED.appProfiles_Id == 1) location.href = "./index.php?r=login-administrator";
                        //location.href = "./index.php?r=login-administrator";
                    }
                }
                }).catch(function(error) {
                    bootbox.alert(error);
                }).finally(function() {
                    // vacio.
                });
                
                // Bind UI ------------------
                
                var scope = $("#js-pnl-layout");
                
                var pnlLayout      = scope;
                var pnlSidebar     = scope.find("#js-pnl-sidebar");
                var btnToggleMenu1 = scope.find("#js-btn-toggleMenu");
                
                var imgProfileImage    = scope.find("#js-img-profileImage");
                var txtProfileName     = scope.find("#js-txt-profileName");
                var txtProfileProfile  = scope.find("#js-txt-profileProfile");
                var txtProfileBusiness = scope.find("#js-txt-profileBusiness");
                
                var pnlMenu = scope.find("#js-pnl-menu");
                
                // Init UI ---------------------
                
                imgProfileImage.hide();
                txtProfileName.hide();
                txtProfileProfile.hide();
                txtProfileBusiness.hide();
                
                var url = "app-auth-getLogued";
                App.http.get(url).then(function(response) {
                    if (response.status == "OK") {
                        
                        App.config.USER_LOGUED = response.datas;
                        
                        $(document).trigger("configLoaded");

                        updateUISidebar();
                    }
                }).catch(function(error) {
                    bootbox.alert(error);
                }).finally(function() {
                    // vacio.
                });
                
                toggleMenu();
                
                btnToggleMenu1.click(function() {
                    toggleMenu();
                });

                // *****************************
                
                //Evento viene del boton del header.
                $(document).on("clickToggleMenu", function() { 
                    toggleMenu();
                });
                
                var isOpenedMenu = false;
                //toggleMenu();
                
                function toggleMenu() {
                    if (isOpenedMenu) {
                        pnlLayout.removeClass("opened");
                        pnlSidebar.removeClass("opened");
                        isOpenedMenu = false;
                    } else {
                        pnlLayout.addClass("opened");
                        pnlSidebar.addClass("opened");
                        isOpenedMenu = true;
                    }
                }

                // --------------

                function updateUISidebar() {

                    // Administrador.
                    //if (App.config.USER_LOGUED.appProfiles_Id == 1) {
                        imgProfileImage.attr("src", App.config.TEMPLATE_URL + "/img/FAVICON.png").show();
                        txtProfileName.html(App.config.USER_LOGUED.appUsers_NameFirst).show('slow');
                        txtProfileProfile.html(App.config.USER_LOGUED.appProfiles_Name).show('slow');
                    //}
                    
                    /*
                    if (App.config.USER_LOGUED.appBusinesses_Logo == "") {
                        var imgUrl = App.config.TEMPLATE_URL + "/img/EMPTY.png";
                    } else {
                        var imgUrl = App.config.FILES_URL + App.config.USER_LOGUED.appBusinesses_Logo;
                    }
                    
                    // Director.
                    if (App.config.USER_LOGUED.appProfiles_Id == 2) {
                        imgProfileImage.attr("src", imgUrl).show('slow');
                        txtProfileName.html(App.config.USER_LOGUED.appUsers_NameFirst).show('slow');
                        txtProfileProfile.html(App.config.USER_LOGUED.appProfiles_Name).show('slow');
                        txtProfileBusiness.html(" - " + App.config.USER_LOGUED.appBusinesses_Name).show('slow');
                    }
                    */
                    
                    //--------
                    
                    var menuButtons = [];
                    
                    if (App.config.USER_LOGUED.appProfiles_Id == 1) menuButtons = getMenuAdministrators();  // Administrator
                    if (App.config.USER_LOGUED.appProfiles_Id == 2) menuButtons = getMenuCapturists();      // Capturista
                    if (App.config.USER_LOGUED.appProfiles_Id == 3) menuButtons = getMenuPreauthorizings(); // Preautorizador
                    if (App.config.USER_LOGUED.appProfiles_Id == 4) menuButtons = getMenuAuthorizings();    // Autorizador
                    if (App.config.USER_LOGUED.appProfiles_Id == 5) menuButtons = getMenuTechnicians();     // Técnico
                    if (App.config.USER_LOGUED.appProfiles_Id == 6) menuButtons = getMenuSupervisors();     // Supervisor
                    if (App.config.USER_LOGUED.appProfiles_Id == 7) menuButtons = getMenuReviewers();       // Revisador
                    if (App.config.USER_LOGUED.appProfiles_Id == 8) menuButtons = getMenuDirectors();       // Director
                    
                    var menu = new UI.Menu(menuButtons);
                    menu.render(pnlMenu);
                }

                function getMenuAdministrators() {

                    var menuButtons = [];

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-dashboard',
                        text: "Dashboard",
                        icon: "fa fa-th",
                        route: "./index.php?r=common-home",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_DASHBOARD')
                    });

                    // -------

                    menuButtons.push({
                        type: "title",
                        text: "Solicitudes",
                        //icon: "fa fa-file-text",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Todos",
                        icon: "fa fa-file-text",
                        route: "./index.php?r=tic-tickets",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Capturadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=1",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Preautorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=2",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Autorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=3",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Asignado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=4",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Dictaminado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=5",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=6",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Cotizado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=7",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Seleccionado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=8",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Registrado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=9",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=10",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Validado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=11",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Ordenando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=12",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Procesando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=13",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Entregado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=14",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Cerrado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=15",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    // ---------
                    
                    menuButtons.push({
                        type: "title",
                        text: "Configuración",
                        //icon: "fa fa-user",
                        isVisible: true//App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-empAdministrators',
                        text: "Administradores",
                        icon: "fa fa-user",
                        route: "./index.php?r=emp-administrators",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true // App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-empCapturists',
                        text: "Capturistas",
                        icon: "fa fa-user",
                        route: "./index.php?r=emp-capturists",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true // App.config.havePermission('ENABLE_EMP_CAPTURISTS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-empPreauthorizings',
                        text: "Preautorizadores",
                        icon: "fa fa-user",
                        route: "./index.php?r=emp-preauthorizings",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true // App.config.havePermission('ENABLE_EMP_PREAUTHORIZINGS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-empAuthorizings',
                        text: "Autorizadores",
                        icon: "fa fa-user",
                        route: "./index.php?r=emp-authorizings",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true // App.config.havePermission('ENABLE_EMP_AUTHORIZINGS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-empTechnicians',
                        text: "Técnicos",
                        icon: "fa fa-user",
                        route: "./index.php?r=emp-technicians",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true // App.config.havePermission('ENABLE_EMP_TECHNICIANS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-empSupervisors',
                        text: "Supervisores",
                        icon: "fa fa-user",
                        route: "./index.php?r=emp-supervisors",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true // App.config.havePermission('ENABLE_EMP_SUPERVISORS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-empReviewers',
                        text: "Revisores",
                        icon: "fa fa-user",
                        route: "./index.php?r=emp-reviewers",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true // App.config.havePermission('ENABLE_EMP_REVIEWERS_VIEW')
                    });
                    
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-empDirectors',
                        text: "Directores",
                        icon: "fa fa-user",
                        route: "./index.php?r=emp-directors",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true // App.config.havePermission('ENABLE_EMP_DIRECTORS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-appBusinesses',
                        text: "Unidades Médicas",
                        icon: "fa fa-hospital-o",
                        route: "./index.php?r=app-businesses",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-appBusinessesAreas',
                        text: "Áreas",
                        icon: "fa fa-hospital-o",
                        route: "./index.php?r=app-businessesAreas",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-defCategories',
                        text: "Categorías art.",
                        icon: "fa fa-cube",
                        route: "./index.php?r=def-categories",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-defArticles',
                        text: "Def. artículos",
                        icon: "fa fa-cube",
                        route: "./index.php?r=def-articles",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-proArticles',
                        text: "Artículos",
                        icon: "fa fa-cube",
                        route: "./index.php?r=pro-articles",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-prvCategories',
                        text: "Categorías prov.",
                        icon: "fa fa-briefcase",
                        route: "./index.php?r=prv-categories",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-prvBusinesses',
                        text: "Proveedores",
                        icon: "fa fa-briefcase",
                        route: "./index.php?r=prv-businesses",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-prvContacts',
                        text: "Contactos prov.",
                        icon: "fa fa-briefcase",
                        route: "./index.php?r=prv-contacts",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-defArticles_prvBusinesses',
                        text: "Artículos-Proveedores",
                        icon: "fa fa-link",
                        route: "./index.php?r=def-articles_prvBusinesses",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    return menuButtons;
                }

                function getMenuCapturists() {

                    var menuButtons = [];

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-dashboard',
                        text: "Dashboard",
                        icon: "fa fa-th",
                        route: "./index.php?r=common-home",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_DASHBOARD')
                    });

                    // -------

                    menuButtons.push({
                        type: "title",
                        text: "Solicitudes",
                        //icon: "fa fa-file-text",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Capturadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=1",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Preautorizadas</b>",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=2",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Autorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=3",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Aceptado</b>",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=6",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Cotizado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=7",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Seleccionado</b>",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=8",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Registrado</b>",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=9",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=10",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Ordenando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=12",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Procesando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=13",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    /*
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Entregado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=14",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    */

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Terminado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=15",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-appBusinessesAreas',
                        text: "Áreas",
                        icon: "fa fa-hospital-o",
                        route: "./index.php?r=app-businessesareas",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-proArticles',
                        text: "Artículos",
                        icon: "fa fa-cube",
                        route: "./index.php?r=pro-articles",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    return menuButtons;
                }

                function getMenuPreauthorizings() {

                    var menuButtons = [];

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-dashboard',
                        text: "Dashboard",
                        icon: "fa fa-th",
                        route: "./index.php?r=common-home",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_DASHBOARD')
                    });

                    // -------

                    menuButtons.push({
                        type: "title",
                        text: "Solicitudes",
                        //icon: "fa fa-file-text",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Capturadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=1",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Preautorizadas</b>",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=2",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Autorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=3",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Aceptado</b>",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=6",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Cotizado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=7",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Seleccionado</b>",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=8",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Registrado</b>",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=9",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=10",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Ordenando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=12",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Procesando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=13",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    /*
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Entregado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=14",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    */

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Terminado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=15",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-appBusinessesAreas',
                        text: "Áreas",
                        icon: "fa fa-hospital-o",
                        route: "./index.php?r=app-businessesareas",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-proArticles',
                        text: "Artículos",
                        icon: "fa fa-cube",
                        route: "./index.php?r=pro-articles",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    return menuButtons;
                }

                function getMenuAuthorizings() {

                    var menuButtons = [];

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-dashboard',
                        text: "Dashboard",
                        icon: "fa fa-th",
                        route: "./index.php?r=common-home",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_DASHBOARD')
                    });

                    // -------

                    menuButtons.push({
                        type: "title",
                        text: "Solicitudes",
                        //icon: "fa fa-file-text",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Capturadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=1",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Preautorizadas</b>",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=2",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Autorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=3",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Aceptado</b>",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=6",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Cotizado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=7",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Seleccionado</b>",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=8",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Registrado</b>",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=9",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=10",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Ordenando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=12",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Procesando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=13",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    /*
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Entregado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=14",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    */
                    
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Terminado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=15",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-appBusinessesAreas',
                        text: "Áreas",
                        icon: "fa fa-hospital-o",
                        route: "./index.php?r=app-businessesareas",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-proArticles',
                        text: "Artículos",
                        icon: "fa fa-cube",
                        route: "./index.php?r=pro-articles",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    return menuButtons;
                }
                
                function getMenuTechnicians() {

                    var menuButtons = [];

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-dashboard',
                        text: "Dashboard",
                        icon: "fa fa-th",
                        route: "./index.php?r=common-home",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_DASHBOARD')
                    });

                    // -------

                    menuButtons.push({
                        type: "title",
                        text: "Solicitudes",
                        //icon: "fa fa-file-text",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    /*
                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Capturadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=1",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Preautorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=2",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Autorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=3",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    */
                    
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Asignado</b>",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=4",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Dictaminado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=5",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Aceptado</b>",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=6",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Cotizado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=7",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Seleccionado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=8",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Registrado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=9",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=10",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Validado</b>",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=11",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Ordenado</b>",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=12",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Procesando</b>",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=13",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Entregado</b>",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=14",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Cerrado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=15",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    return menuButtons;
                }

                function getMenuSupervisors() {

                    var menuButtons = [];

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-dashboard',
                        text: "Dashboard",
                        icon: "fa fa-th",
                        route: "./index.php?r=common-home",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_DASHBOARD')
                    });

                    // -------

                    menuButtons.push({
                        type: "title",
                        text: "Solicitudes",
                        //icon: "fa fa-file-text",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    /*
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Capturadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=1",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Preautorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=2",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    */

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Autorizadas</b>",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=3",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Asignado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=4",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Dictaminado</b>",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=5",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=6",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "<b>Cotizado</b>",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=7",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Seleccionado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=8",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Registrado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=9",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=10",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Validado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=11",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Ordenando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=12",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Procesando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=13",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Entregado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=14",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Terminado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=15",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    return menuButtons;
                }

                function getMenuReviewers() {

                    var menuButtons = [];

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-dashboard',
                        text: "Dashboard",
                        icon: "fa fa-th",
                        route: "./index.php?r=common-home",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_DASHBOARD')
                    });

                    // -------
                    
                    menuButtons.push({
                        type: "title",
                        text: "Solicitudes",
                        //icon: "fa fa-file-text",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=10",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Validado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=11",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    return menuButtons;
                }

                function getMenuDirectors() {

                    var menuButtons = [];

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-dashboard',
                        text: "Dashboard",
                        icon: "fa fa-th",
                        route: "./index.php?r=common-home",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_EMP_ADMINISTRATORS_DASHBOARD')
                    });

                    // -------
                    
                    menuButtons.push({
                        type: "title",
                        text: "Solicitudes",
                        //icon: "fa fa-file-text",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    /*
                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Capturadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=1",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Preautorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=2",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    */
                    
                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Autorizadas",
                        icon: "fa fa-pencil-square-o",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=3",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Asignado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=4",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Dictaminado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=5",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-stethoscope",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=6",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Cotizado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=7",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Seleccionado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=8",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Registrado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=9",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Aceptado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=10",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Validado",
                        icon: "fa fa-usd",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=11",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "separator",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Ordenando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=12",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Procesando",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=13",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Entregado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=14",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });

                    menuButtons.push({
                        type: "button",
                        id: 'js-btn-ticTickets',
                        text: "Entregado",
                        icon: "fa fa-gavel",
                        route: "./index.php?r=tic-tickets&ticStatuses_Id=15",
                        target: "_self",
                        style: "btn btn-default",
                        isVisible: true //App.config.havePermission('ENABLE_TIC_TICKETS_VIEW')
                    });
                    
                    return menuButtons;
                }
                
            });
        </script>
    </body>
</html>