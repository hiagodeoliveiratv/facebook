<div class="row">
	
	<div class="col-sm-8">
		<div class="post_area">
			<form method="POST" enctype="multipart/form-data">
				<h4>O que você está pensando ?</h4>
				<textarea name="post" class="form-control"></textarea>
				<input type="submit" value="Publicar" class="btn btn-default">
				<input type="file" name="foto" class="form-control">
			</form>
		</div>
		<div class="feeds">
			<?php foreach($feeds as $postitem) {
				$this->loadView('posts/postitem', $postitem);
			}
			?>

		</div>
	</div>



	<div class="col-sm-4">
		<?php if(count($requisicoes) > 0): ?>
		<div class="widget">
			
			<h4>Pedidos de amizade</h4>

			<?php foreach ($requisicoes as $pessoa): ?>
				<div class="requisicaoitem">
					<strong><?php echo $pessoa['nome'];?></strong>
					<button class="btn btn-default pull-right" onclick="aceitarFriend('<?php echo $pessoa['id'];?>', this)">+</button>

				</div>
				
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<div class="widget">
			
			<h4>Meus Amigos (<?php echo $totalamigos; ?>)</h4>

			<?php foreach ($requisicoes as $pessoa): ?>
				<div class="requisicaoitem">
					<strong><?php echo $pessoa['nome'];?></strong>
					<button class="btn btn-default pull-right" onclick="aceitarFriend('<?php echo $pessoa['id'];?>', this)">+</button>

				</div>
				
			<?php endforeach; ?>
		</div>

		<div class="widget">
			<h4>Sugestão de amizades</h4>
			<?php foreach ($sugestoes as $pessoa): ?>
				<div class="sugestaoitem">
					<strong><?php echo $pessoa['nome'];?></strong>
					<button class="btn btn-default pull-right" onclick="addFriend('<?php echo $pessoa['id'];?>', this)">+</button>

				</div>
				
			<?php endforeach; ?>

		</div>

	</div>

</div>