<?php
// security
if (!defined('IS_INDEX') || IS_INDEX !== true) {
    exit();
}
?>

<div id='js-pnl-header' class="header">
    <div class="row">

        <div class="brand col-lg-6 col-md-6 col-sm-6 col-xs-2">
            <a id='js-btn-toggleMenu2' href="javascript:void(0);"><i class="fa fa-bars"></i></a> 
            <h3 class='hidden-xs'>
                <!-- -->
                <img 
                src="<?= getImageTemplate('LOGO_BLACK.png') ?>" 
                style="position: relative;height: 42px;top: -9px;"
                >
            </h3>
        </div>

        <div class="buttons col-lg-6 col-md-6 col-sm-6 col-xs-10">
            <!-- Notificaciones, editar perfil de usuario y configuraciones -->
            <ul class='pull-right'>
                <li>
                    <a id='js-btn-notifications' href="javascript:void(0);">
                        <i class="fa fa-bell"></i>
                        <span class="label label-warning">0</span>
                    </a>
                </li>
                <li>
                    <a id='js-btn-profile' href="javascript:void(0);">
                        <i class="fa fa-user"></i>
                        <!--
                        <span class="label label-success">0</span>
                        -->
                    </a>
                </li>
                <li>
                    <a id='js-btn-settings' href="javascript:void(0);">
                        <i class="fa fa-cog"></i>
                    </a>
                </li>
                <li>
                    <a id='js-btn-logout' href="javascript:void(0);">
                        <i class="fa fa-power-off"></i>
                        <span class='hidden-sm hidden-xs'>Cerrar sesi&oacute;n</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    
    $(document).ready(function() {

        // Bind UI ------------------
        
        var scope = $("#js-pnl-header");

        var btnToggleMenu2   = scope.find("#js-btn-toggleMenu2");

        var btnNotifications = scope.find("#js-btn-notifications");
        var btnProfile       = scope.find("#js-btn-profile");
        var btnSettings      = scope.find("#js-btn-settings");
        var btnLogout        = scope.find("#js-btn-logout");

        /*
        var url = "app-auth-getLogued";
        App.http.get(url).then(function(response) {
          if (response.status == "OK") {
            
            App.config.USER_LOGUED = response.datas;
            $(document).trigger("configLoaded");

            //myAccount();
            //notifications();
          }
        }).catch(function(error) {
            bootbox.alert(error);
        }).finally(function() {
            // vacio.
        });
        */
       
        /*
        function myAccount() {
            if (App.config.USER_LOGUED.appProfiles_Id == 1) {
                btnProfile.attr("href", "./index.php?r=acc-administrator&id=" + App.config.USER_LOGUED.empAdministrators_Id);
            }

            if (App.config.USER_LOGUED.appProfiles_Id == 2) {
                btnProfile.attr("href", "./index.php?r=acc-director&id=" + App.config.USER_LOGUED.cusDirectors_Id);
            }
        }
        */

        /*
        function notifications() {

            var filters = {
                ldsAtentions_DateAtention: moment().format('YYYY-MM-DD'),
                appBusinesses_Id: (App.config.USER_LOGUED.appProfiles_Id == "1") ? "" : App.config.USER_LOGUED.appBusinesses_Id,
                ldsAtentionsStatuses_Id: "1"
            };

            var url = "lds-atentions-pendentAtentions";
            var params = "";
            $.each(filters, function(key, value) {
                if (value !== "") {
                    params += "&filters[" + key + "]=" + value;
                }
            });
            url += params;
            
            App.http.get(url).then(function(response) {
                if (response.status == "OK") {
                    btnNotifications.find("span").html(response.total);
                } else {
                    bootbox.alert('No es posible comunicarse con el servidor.');
                }
            }).catch(function(error) {
                //console.error(error);
                bootbox.alert(error);
            }).finally(function() {
                // vacio.
            });
        }
        */

        // Init UI ---------------------

        btnToggleMenu2.click(function() {
            $(document).trigger("clickToggleMenu");
        });
        
        btnLogout.click(function() {
            logout();
        });
        
        function logout() {
            bootbox.confirm("¿En verdad desea cerrar la sesión?", function (resp) {

                if(resp == false) return;
                
                var url = "app-auth-logout";
                App.http.get(url).then(function(response) {

                    localStorage.removeItem('TOKEN');
                    
                    if (App.config.USER_LOGUED.appProfiles_Id == 1) location.href = "./index.php?r=login-administrator";
                    if (App.config.USER_LOGUED.appProfiles_Id == 2) location.href = "./index.php?r=login-capturist";
                    if (App.config.USER_LOGUED.appProfiles_Id == 3) location.href = "./index.php?r=login-preauthorizing";
                    if (App.config.USER_LOGUED.appProfiles_Id == 4) location.href = "./index.php?r=login-authorizing";
                    if (App.config.USER_LOGUED.appProfiles_Id == 5) location.href = "./index.php?r=login-technician";
                    if (App.config.USER_LOGUED.appProfiles_Id == 6) location.href = "./index.php?r=login-supervisor";
                    if (App.config.USER_LOGUED.appProfiles_Id == 7) location.href = "./index.php?r=login-reviewer";
                    if (App.config.USER_LOGUED.appProfiles_Id == 8) location.href = "./index.php?r=login-director";
                    
                }).catch(function(error) {
                    bootbox.alert(error);
                }).finally(function() {
                    // vacio.
                });
            });
        }
    });
</script>