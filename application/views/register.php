<?php $this->load->view('includes/header.php');?>
		<div class="container">
			
			<form action="<?php echo site_url('user/do_register');?>" method="POST" role="form">
				<legend>Registration</legend>
			
				<?php echo $message;?>

				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="username" class="form-control" id="username" placeholder="jdelacruz" required>
				</div>

				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name="email" class="form-control" id="email" placeholder="name@domain.com" required>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control" id="password" required>
				</div>
				<div class="form-group">
					<label for="">Repeat Password</label>
					<input type="password" name="password2" class="form-control" id="password2" required>
				</div>
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>

		</div>

<?php $this->load->view('includes/footer.php');?>