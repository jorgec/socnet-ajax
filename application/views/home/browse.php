<?php $this->load->view('includes/header');?>

<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<h1>Non Friends</h1>
			<ul>
			<?php foreach( $nonfriends as $user ):?>
				<li><a href="<?php echo site_url('friend/'. $user->id);?>"><?php echo $user->username;?></a></li>
			<?php endforeach;?>
			</ul>
		</div>
		<div class="col-sm-6"></div>

	</div>
</div>

<?php $this->load->view('includes/footer');?>