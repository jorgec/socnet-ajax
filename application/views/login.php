<?php $this->load->view('includes/header.php');?>

		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h1>SocNet</h1>
				</div>
				<div class="col-sm-6">
					<div class="well">
						<form action="<?php echo site_url('user/do_login');?>" method="POST" role="form">
							<legend>Login</legend>
						
							<?php echo $message;?>

							<div class="form-group">
								<label for="">Username</label>
								<input type="text" name="username" class="form-control" id="username" placeholder="jdelacruz" required>
							</div>

							<div class="form-group">
								<label for="">Password</label>
								<input type="password" name="password" class="form-control" id="password" required>
							</div>
							
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>

					<p>Don't have an account? <a href="<?php echo site_url('user/register');?>">Register</a> today!</p>
				</div>
			</div>
		</div>

<?php $this->load->view('includes/footer.php');?>