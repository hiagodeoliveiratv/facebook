<?php 
class loginController extends controller {


	public function index() {
		$dados = array();

		$this->loadView('login/login', $dados);
	}
	public function entrar() {
		$dados = array('erro' => '');

		if (isset($_POST['email']) && !empty($_POST['email'])) {
		$email = addslashes($_POST['email']);
		$senha = md5(addslashes($_POST['senha']));

		$u = new usuarios();
		$dados['erro'] = $u->logar($email, $senha);
		}

		$this->loadView('login/login_entrar', $dados);
	}

	public function cadastrar() {

		$dados = array('erro' => '');

		if (isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = md5(addslashes($_POST['senha']));
		$sexo = addslashes($_POST['sexo']);

		$u = new usuarios();
		$dados['erro'] = $u->cadastrar($nome, $email, $senha, $sexo);
		}
		$this->loadView('login/login_cadastrar', $dados);
	}

	public function sair() {
		unset($_SESSION['lgsocial']);
		header("Location: ".BASE."login/entrar");
	}

}




 ?>