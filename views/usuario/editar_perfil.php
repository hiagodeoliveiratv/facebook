<h1>Editar Perfil</h1>

<form method="POST">


			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" name="nome" id="nome" value="<?php echo $info['nome']; ?>" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="nome">Biografia</label>
				<textarea name="bio" id="bio" class="form-control"><?php echo $info['bio']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="senha">Senha</label>
				<input type="password" name="senha" id="senha" class="form-control">
			</div>
			
			<div class="form-group">
				<label for="email"><strong>Email:</strong></label>
				<?php echo $info['email']; ?>
			</div>
			

			<div class="radio">
				<strong>Sexo:</strong>
				<?php if ($info['sexo'] == 0) {
					echo "Feminino";
				} elseif($info['sexo'] == 1) {
					echo "Masculino"; }?>

			</div>

			<button type="submit" class="btn btn-default">Salvar</button>
		</form>