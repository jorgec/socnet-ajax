<form action="<?php echo $post_handler;?>" method="POST" class="form-horizontal" role="form">

	<div class="form-group">
		<label for="textarea" class="col-sm-2 control-label">Post a Status Message:</label>
		<div class="col-sm-10 col-xs-7">
			<textarea name="content" id="content" class="form-control" rows="3" required="required"></textarea>
		</div>
	</div>

	<button type="submit" class="btn btn-primary pull-right">Submit</button>
</form>