<!DOCTYPE html>
<html>
<head>
	<title>Facebook</title>

	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="<?php echo BASE; ?>assets/css/style.css">
</head>
	<body>
			<nav class="navbar navbar-inverse">
				<div class="container">
					<div id="navbar">
						<ul class="nav navbar-nav navbar-left">
							<li><a href="<?php echo BASE;?>">Rede Social</a></li>
						</ul>

						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									 
									<?php echo substr($viewData['usuario_nome'], 0, strpos($viewData['usuario_nome'], ' '));?>
									<span class="caret"></span>
								</a>
								
									<ul class="dropdown-menu">
										<li><a href="">Editar Perfil</a></li>
										<li><a href="<?php echo BASE;?>login/sair">Sair</a></li>
									</ul>

							</li>
						</ul>
					</div>
				</div>
			</nav>
		
		<?php $this->loadViewInTemplate($viewName, $viewData);
		?>
		
		
	</body>
</html>