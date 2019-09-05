<?php 
	$con=[	'port' => '3306',
            'host' => 'localhost',
            'username' => 'root',
            'password' => '123456',
            'database' => 'prueba'];
  	session_start();
	header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
	define('serverdb_link',$con["host"]);	//SERVER
	define('username_link', $con["username"]);	//SERVER
	define('password_link', $con["password"]);	//SERVER
	define('database_link',$con["database"]);	//SERVER
 	define('SITE_ROOT', dirname(dirname(__FILE__)));
	define('CLASS_DIR', SITE_ROOT . '/prueba/class/');
	define('CONTENT_DIR', SITE_ROOT . '/prueba/controller/');
	define('CONTENT_VIEW', SITE_ROOT . '/prueba/views/');
	define('CONTENT_WEBROOT',  '/prueba/webroot/');
	define('CONTENT_MODELS', SITE_ROOT . '/prueba/models/');
	define('SUFIJO', 'lime');/*SIFIJO PARA VARIABLES DE SECION*/
	define('PREFIJO_TABLAS',"");/*PREFIJO PARA LAS TABLAS*/
	define('PREFIJO_CUBO',"");/*PREFIJO PARA LAS TABLAS*/
?>