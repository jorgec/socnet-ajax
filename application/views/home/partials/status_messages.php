<?php if( $posts ):?>
	<div class="section">
	<?php foreach( $posts as $post ):?>
		<div class="post" id="post-<?php echo $post->id;?>">
			<div class="post-date">
				<?php 
					$unix_ts = strtotime($post->created);
					$now_ts = time();
					echo timespan($unix_ts, $now_ts) . ' ago';
				?>
			</div>
			<div class="post-content"><?php echo $post->content;?></div>
		</div>
	<?php endforeach;?>
	</div>
<?php else:?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Warning!</strong> You have no posts to show!
	</div>
<?php endif;?>