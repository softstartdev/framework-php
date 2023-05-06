<?php

/**
 * 
 * ENVIRONMENT: develop.
 * 
 */

// SERVER

$config['ENVIRONMENT']['URL'] = 'http://localhost:7272/webservice-ador/';

// USERS

$config['ENVIRONMENT']['USERS']['ROOT']['NAME']     = 'Super admin';
$config['ENVIRONMENT']['USERS']['ROOT']['EMAIL']    = 'admin@domain.com';
$config['ENVIRONMENT']['USERS']['ROOT']['USER']     = 'admin';
$config['ENVIRONMENT']['USERS']['ROOT']['PASSWORD'] = '123456';

// SERVERS DATABASES

$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['TYPE']      = 'FIREBIRD';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['HOST']      = 'docker-develop-firebird3-1';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['PORT']      = '3050';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['PATH']      = '/firebird/data';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['FILE']      = 'firebird3-database.fdb';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['NAME']      = '';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['USER']      = 'SYSDBA';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['PASSWORD']  = 'masterkey';

// SERVERS SMTP

$config['ENVIRONMENT']['SMTP']['DEFAULT']['TYPE']      = 'SMTP';
$config['ENVIRONMENT']['SMTP']['DEFAULT']['HOST']      = 'mail.domain.mx';
$config['ENVIRONMENT']['SMTP']['DEFAULT']['PORT']      = '547';
$config['ENVIRONMENT']['SMTP']['DEFAULT']['PATH']      = '';
$config['ENVIRONMENT']['SMTP']['DEFAULT']['FILE']      = '';
$config['ENVIRONMENT']['SMTP']['DEFAULT']['NAME']      = '';
$config['ENVIRONMENT']['SMTP']['DEFAULT']['USER']      = 'SYSDBA';
$config['ENVIRONMENT']['SMTP']['DEFAULT']['PASSWORD']  = 'develop@domain.mx';

// OTHERS

$config['ENVIRONMENT']['SESSION_NAME'] = 'i-J7-oris34uHis3y';

$config['ENVIRONMENT']['TOKEN_SIGN'] = '1E.dI-Y6';

?>