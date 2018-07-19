<?php 
require 'environment.php';
define("BASE_URL","http://localhost/CursoB7Web/mvc/");
global $config; // transforma a variável em global para ser usada em outras partes do sistema!
$config = array();

if (ENVIRONMENT == "development") {
	$config['dbname'] = 'galeria';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '1020304050';
}
else {
	$config['dbname'] = 'facebook';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '1020304050';	
}



 ?>