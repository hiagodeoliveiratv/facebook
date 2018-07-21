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

	public function getDados($id) {
		$array = array();
		$sql = "SELECT * FROM usuarios WHERE id = '$id'";
		$sql = $this->db->query($sql);
			if ($sql->rowCount() > 0) {
				$array = $sql->fetch();
			}
		return $array;
	}

	public function atualizarPerfil ($array = array()) {

		if(count($array) > 0) {	

			$sql = "UPDATE usuarios SET ";

			foreach ($array as $campo => $valor) {
				$campos[] = $campo." = '".$valor."'";
			}

			$sql .= implode(',', $campos); // para remover a vírgula dos campos
			$sql .= " WHERE id = '".($_SESSION['lgsocial'])."'";
			$this->db->query($sql);

		}
	}

	public function getSugestoes($limit = 5) {
			$array = array();
			$meuid = $_SESSION['lgsocial'];

			$r = new relacionamentos();
			$ids = $r->getIdsFriends($_SESSION['lgsocial']);

			if(count($ids) == 0) {
				$ids[] = $meuid;
			}

			$sql = "SELECT 
			usuarios.id,
			usuarios.nome
			FROM
			usuarios
			WHERE
			usuarios.id != '$meuid' AND
			usuarios.id NOT IN (".implode(',', $ids).")

			ORDER BY RAND()
			LIMIT $limit
			";
			$sql = $this->db->query($sql);
				if($sql->rowCount() > 0) {
					$array = $sql->fetchAll();
				}


			return $array;

	}

	public function addFriend($id1, $id2) {
		$sql = "INSERT INTO relacionamentos SET usuario_de = '$id1', usuario_para = '$id2', status = '0'";
		$this->db->query($sql);


	}

	
}

 ?>