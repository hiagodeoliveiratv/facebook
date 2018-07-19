<?php 
session_start();

require 'config.php'; // carrega o config
spl_autoload_register(function ($class) { // carrega todos os dados do sistema
	if (strpos($class, 'Controller') > -1) { // verifica se em existe Controller em depois de -1, que no caso é 0.
		if(file_exists('controllers/'.$class.'.php')){ // faz a verificação pra ver se existe
			require_once 'controllers/'.$class.'.php';
		}

	} else if(file_exists('models/'.$class.'.php')) {
		require_once 'models/'.$class.'.php';
	} else {
		require_once 'core/'.$class.'.php';
	}

});

$core = new Core(); // instancia a classe fundamento
$core->run(); // inicia todos os processos do sistema





 ?>