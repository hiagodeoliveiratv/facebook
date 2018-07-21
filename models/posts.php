<?php 

/**
 * Model pra tratar as postagens
 */
class Posts extends model {
	
	public function __construct(){
		parent::__construct();
	}
	public function addPost($msg, $foto) {
		$usuario = $_SESSION['lgsocial'];
		$tipo = 'texto';
		$url = '';

		if (count($foto) > 0) {
			$tipos = array('image/jpeg', 'image/jpg', 'image/png');
			if(in_array($foto['type'], $tipos)) {
				$tipo = 'foto';
				$url = md5(time().rand(0,999));
				switch ($foto['type']) {
					case 'image/jpeg':
					case 'image/jpg':
						$url .= '.jpg';
						break;
					case 'image/png':
						$url .= '.png';
						break;
				}

				move_uploaded_file($foto['tmp_name'], 'assets/images/posts/'.$url);
			}
		}
		
		$sql = "INSERT INTO posts SET id_usuario = '$usuario', data_criacao = NOW(), tipo = '$tipo', texto ='$msg', url = '$url', id_grupo ='0'";
		$this->db->query($sql);
	}

	public function getFeeds() {
		$array = array();
		$r = new Relacionamentos();
		$ids = $r->getIdsFriends($_SESSION['lgsocial']);
		$ids[] = $_SESSION['lgsocial'];



		$sql = "SELECT *,
		(select usuarios.nome from usuarios where usuarios.id = posts.id_usuario) as nome
		FROM posts
		WHERE id_usuario IN (".implode(',', $ids).")
	    ORDER BY data_criacao DESC";

		$sql = $this->db->query($sql);

			if($sql->rowCount() > 0) {
				$array = $sql->fetchAll();
			}
			unset($_POST);
			return $array;

	}


















}






 ?>