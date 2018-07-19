<?php 
class homeController extends controller {

	public function __construct() {
		$u = new usuarios();
		$u->verificarLogin();
	}

	public function index() {
		$dados = array(
		'usuario_nome' =>''
		);
		$u = new usuarios();
		$dados['usuario_nome'] = $u->getNome($_SESSION['lgsocial']);


		
		$this->loadTemplate('home', $dados); 
	}


}




 ?>