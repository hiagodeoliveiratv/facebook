<?php 
class ajaxController extends controller {

	public function __construct() {
		$u = new usuarios();
		$u->verificarLogin();
	}

	public function index() {}

	public function add_friend() {
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$id = addslashes($_POST['id']);

			$r = new relacionamentos();
			$r->addFriend($_SESSION['lgsocial'],$id);

		}
	}
	public function aceitarFriend() {
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$id = addslashes($_POST['id']);

			$r = new relacionamentos();
			$r->aceitarFriend($_SESSION['lgsocial'],$id);

		}
	}
	public function curtir() {
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$id = addslashes($_POST['id']);
			$id_usuario = $_SESSION['lgsocial'];

			$p = new Posts();

			if($p->isLiked($id, $id_usuario)) {

				$p->removeLike($id, $id_usuario);
			} else {
				
				$p->adicionaLike($id, $id_usuario);
			}


		}

	}


}




 ?>