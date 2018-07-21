<div class="feeditem">
	<div class="postitem_info">
		Post de: <?php echo $nome; ?>
	</div>
	<div class="feeditem_texto">
		<?php echo $texto; ?>
	</div>
	<?php if($tipo == "foto"): ?>
	<img src="<?php echo BASE;?>assets/images/posts/<?php echo $url;?>" border="0" width="100%">
	<?php endif; ?>
	<div class="feeditem_botoes">
		 <button class="btn btn-default" onclick="curtir(this)" data-id="<?php echo $id; ?>" data-likes="<?php echo $likes; ?>" data-liked="<?php echo $liked;?>">(<?php echo $likes; ?>) <?php echo ($liked =='0')?'Curtir':'Descurtir';?> </button>
		<button class="btn btn-default">Comentar</button>

	</div>
</div>
