<?php

//echo dirname(__FILE__);
session_start();

error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

//date_default_timezone_set("America/Mexico_City");
date_default_timezone_set("America/Mérida");

define("USER_NAME",             "Administrador 1");
define("USER_USER",             "admin@yopmail.com");
define("USER_PASSWORD",         "qwerty123*");

define("SESSION_NAME",          "HJ7-8yrf1.s66isu9lis334u");

define("LIBRARY_PATH",          "../library");

define("PROVIDERS_PATH",        "../datas/providers");
define("VIEWS_PATH",            "../datas/views");
define("MESSAGES_PATH",         "../datas/messages");

/*
define("BUSINESS_PATH",         "../datas/business"); // certificados
define("REQUESTS_PATH",         "../datas/request");      // solicitudes de descarga
define("DOWNLOADS_PATH",        "../datas/downloads");    // cfdis
define("LOG_PATH",              "../datas/log");          // logs
define("USERS_PATH",            "../datas/users"); // certificados

//Administrador de procesos

DEFINE("CMDS_PATH",             "../datas/cmds/cmds.json");

//DEFINE("SCRIPTS_PATH",          "../datas/scripts");
//DEFINE("DATAS_PATH",            "../datas");
//DEFINE("PROCESS_FILE", "./datas-status.json");

define("DOWNLOADS_QUANTITY",    50);
*/

?>