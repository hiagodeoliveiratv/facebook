<?php 
class controller {

	public function loadView($viewName = array(), $viewData = array()) { // cria a função load view, e recebe os parametros view name e view data, para caso o usuario não envie nada, utilize os valores padrões...
		extract($viewData); // extrai os dados da data e transforma em variavel e dados.
		include 'views/'.$viewName.'.php'; // carrega as views
	}

	public function loadTemplate($viewName, $viewData = array()){
		
		include "views/template.php"; // carega o template do site


	}

	public function loadViewInTemplate($viewName, $viewData = array()){
		extract($viewData); // para usar os dados do usuario dentro do template
		include 'views/'.$viewName.'.php'; // esse método será usado dentro do template

	}
}








 ?>