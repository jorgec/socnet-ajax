<?php $this->load->view('includes/header');?>
<div class="container">
	<div class="row">
		<div class="col-xs-3 col-sm-2">
			// left sidebar
		</div>
		<div class="col-xs-6 col-sm-8">

			<?php if( $this->session->flashdata('post_status_message')):?>
				<?php 
					$post_status = $this->session->flashdata('post_status_message');
					$this->load->view('snippets/' . $post_status[0], $post_status[1]);
				?>
			<?php endif;?>

			<?php $this->load->view('home/partials/post_status_form');?>

			<?php $this->load->view('home/partials/status_messages');?>

		</div>
		<div class="col-xs-3 col-sm-2">
			// right sidebar
		</div>
	</div>
</div>
<?php $this->load->view('includes/footer');?>