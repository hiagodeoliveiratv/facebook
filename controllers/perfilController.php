<?php 
class perfilController extends controller {

	public function __construct() {
		$u = new usuarios();
		$u->verificarLogin();
	}

	public function index() {
		$dados = array(
		'usuario_nome' =>''
		);
		$u = new usuarios();
		if (isset($_POST['nome']) && !empty($_POST['nome'])) {
			$nome = addslashes($_POST['nome']);
			$bio = addslashes($_POST['bio']);

			$array = array(
				'nome' => $nome,
				'bio' => $bio,
			);
			$u->atualizarPerfil($array);

			if (isset($_POST['senha']) && !empty($_POST['senha'])) {
				$senha = md5(addslashes($_POST['nome']));

				$u->atualizarPerfil(array(
				'senha' => $senha
			));

			}

		}

		$dados['usuario_nome'] = $u->getNome($_SESSION['lgsocial']);
		$dados['info'] = $u->getDados($_SESSION['lgsocial']);


		
		$this->loadTemplate('usuario/editar_perfil', $dados); 
	}


}




 ?>