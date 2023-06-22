<?php

/**
 * 
 * ENVIRONMENT: develop.
 * 
 */

// SERVER

$config['ENVIRONMENT']['URL'] = 'http://localhost:7272/softstart-framework-php/examples/app-empty/';

// USERS

$config['ENVIRONMENT']['USERS']['ROOT']['NAME']     = 'Super admin';
$config['ENVIRONMENT']['USERS']['ROOT']['EMAIL']    = 'admin@domain.com';
$config['ENVIRONMENT']['USERS']['ROOT']['USER']     = 'admin';
$config['ENVIRONMENT']['USERS']['ROOT']['PASSWORD'] = '123456';

// SERVERS DATABASES

// FIREBIRD

$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['TYPE']      = 'FIREBIRD';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['HOST']      = 'docker-develop-firebird3-1';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['PORT']      = '3050';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['PATH']      = '/firebird/data';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['FILE']      = 'firebird3-database.fdb';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['NAME']      = '';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['USER']      = 'SYSDBA';
$config['ENVIRONMENT']['DATABASES']['FIREBIRD_DEFAULT']['PASSWORD']  = 'masterkey';

// MYSQL

$config['ENVIRONMENT']['DATABASES']['MYSQL_DEFAULT']['TYPE']      = 'MYSQL';
$config['ENVIRONMENT']['DATABASES']['MYSQL_DEFAULT']['HOST']      = 'docker-develop-mariabd10-1';
$config['ENVIRONMENT']['DATABASES']['MYSQL_DEFAULT']['PORT']      = '3366';
$config['ENVIRONMENT']['DATABASES']['MYSQL_DEFAULT']['PATH']      = '';
$config['ENVIRONMENT']['DATABASES']['MYSQL_DEFAULT']['FILE']      = '';
$config['ENVIRONMENT']['DATABASES']['MYSQL_DEFAULT']['NAME']      = 'dbname';
$config['ENVIRONMENT']['DATABASES']['MYSQL_DEFAULT']['USER']      = 'root';
$config['ENVIRONMENT']['DATABASES']['MYSQL_DEFAULT']['PASSWORD']  = 'test';

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