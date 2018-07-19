<?php 
class usuarios extends model{

	public function __construct() {
		parent::__construct();
	}

	public function verificarLogin() {
		if(!isset($_SESSION['lgsocial']) || (isset($_SESSION['lgsocial']) && empty($_SESSION['lgsocial']))) {
			header("Location:".BASE."login");
			exit;
		}

	}

	public function verificarEmail($email) {
		$sql = "SELECT email FROM usuarios WHERE email = '$email'";
		$sql = $this->db->query($sql);
			if ($sql->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
	}

	public function logar ($email, $senha) {
		$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

		$sql = $this->db->query($sql);
			if ($sql->rowCount() > 0) {
				$sql = $sql->fetch();

				$_SESSION['lgsocial'] = $sql['id'];
				header("Location: ".BASE);
				exit;
			} else {
				return "Dados inválidos!";
			}
	}

	public function cadastrar ($nome, $email, $senha, $sexo) {
		if (!$this->verificarEmail($email)) {
			$sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha ='$senha', sexo = '$sexo'";
			$this->db->query($sql);

			$_SESSION['lgsocial'] = $this->db->lastInsertId();

			header("Location: ".BASE);
			exit;

		} else {
			return "O email já está sendo utilizado!";
		}
	}

	public function getNome($id) {
		$sql = "SELECT nome FROM usuarios WHERE id = '$id'";
		$sql = $this->db->query($sql);

			if($sql->rowCount() > 0) {
				$sql = $sql->fetch();
				return $sql['nome'];
			} else {
				return '';
			}
	}

	
}

 ?>