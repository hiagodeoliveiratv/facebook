<?php 
class usuario extends model{

	public function __construct() {
		parent::__construct();
	}

	public function verificarLogin() {
		if(!isset($_SESSION['lgsocial']) || (isset($_SESSION['lgsocial']) && !empty($_SESSION['lgsocial']))) {
			header("Location:".BASE."login");
			exit;
		}

	}

	
}

 ?>