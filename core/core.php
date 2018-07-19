<?php 
class Core {

	public function run() { // o primeiro objeto instanciado pela classe, que inicia o sistema
		$url = explode('index.php', $_SERVER['PHP_SELF']);
		$url = end($url); // pega o último registro após a explosão
		//
		// $url = substr($_SERVER['PHP_SELF'], 25); // Pega o que o usuário digitou pela url
		$params = array(); // definido para receber os parametros

		if (!empty($url)) { // é o que separa o que é controller e o que é action.
			$url = explode('/', $url); // remove a barra da url
			array_shift($url); // depois que explode, o array 0 ficará como objeto vazio, então se usa o array_shift para remover a primeira chave
			$currentController = $url[0].'Controller'; // seta o controller
			array_shift($url); // remove o array 0 que já foi utilizado

				if(isset($url[0])){
					$currentAction = $url[0]; // define a ação padrão, caso tenha sido setada
					array_shift($url); // remove novamente, já que já foi utilizado... o que importa é o que restar, se torne parâmetros...
				} else {
					$currentAction = 'index'; // se não, será a padrão, index
				}
				 if (count($url) > 0) { // se existir mais algum registro, vai se tornar parâmetros
				 	$params = $url; // caso haja parametros, todos serão preenchidos
				 }

		} else {
			$currentController ='homeController'; // se o usuário não digitou nada, tudo deverá ser padrão
			$currentAction = 'index'; // ação padrão
		}
		
		require_once 'core/controller.php'; // inicia a classe abstrata, que não pode ser instanciada. o autoload não consegue chamar a classe
		 $c = new $currentController(); // inicia o controller
		call_user_func_array(array($c, $currentAction),$params);
	}

}






 ?>