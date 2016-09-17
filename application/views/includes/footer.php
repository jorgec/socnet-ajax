		<!-- jQuery -->
		<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<?php if( isset( $js ) ):?>
			<?php foreach( $js as $j ):?>
				<script src="<?php echo $j;?>"></script>
			<?php endforeach;?>
		<?php endif;?>
	</body>
</html>