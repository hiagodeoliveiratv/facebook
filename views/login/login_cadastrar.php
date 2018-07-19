<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Facebook</title>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div id="navbar">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="<?php echo BASE;?>">Rede Social</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo BASE;?>login/entrar">Login</a></li>
					<li><a href="<?php echo BASE;?>login/cadastrar">Cadastrar</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<h1>Cadastrar</h1>
		<?php if(!empty($erro)): ?>
			<div class="alert alert-danger">
				<?php echo $erro; ?>
			</div>
		<?php endif; ?>
		<form method="POST">

			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" name="senha" id="senha" class="form-control" required>
			</div>

			<div class="radio">
				
				<label><input type="radio" name="sexo" value="1" required>Masculino</label>
				<label><input type="radio" name="sexo" value="0" required>Feminino</label>

			</div>

			<button type="submit" class="btn btn-default">Cadastrar</button>
		</form>
	</div>
</body>
</html>