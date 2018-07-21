<?php 
class homeController extends controller {

	public function __construct() {
		$u = new usuarios();
		$u->verificarLogin();
	}

	public function index() {
		$u = new usuarios();
		$p = new Posts();
		$r = new relacionamentos();

		$dados = array(
		'usuario_nome' =>''
		);
		
		$dados['usuario_nome'] = $u->getNome($_SESSION['lgsocial']);

		

		if (isset($_POST['post']) && !empty($_POST['post'])) {
			$postmsg = addslashes($_POST['post']);
			$foto = array();

			 if(isset($_FILES['foto']) && !empty($_FILES['foto']['tmp_name'])) {
			 	$foto = $_FILES['foto'];
			 }

			
			$p->addPost($postmsg, $foto);
			
		}


		

		$dados['sugestoes'] = $u->getSugestoes(3);
		$dados['requisicoes'] = $r->getRequisicoes();
		$dados['totalamigos'] = $r->getTotalAmigos($_SESSION['lgsocial']);

		$dados['feeds'] = $p->getFeeds();





		$this->loadTemplate('home', $dados); 
	}


}




 ?>