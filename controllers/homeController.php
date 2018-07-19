<?php 
class homeController extends controller {

	public function __construct() {
		$u = new usuario();
		$u->verificarLogin();
	}

	public function index() {
		$dados = array();

		$this->loadTemplate('home', $dados); 
	}


}




 ?>