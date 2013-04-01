<div class="row-fluid">
	<div class="span12">
		<div style="width: 400px; margin:auto !important;">
			<?php echo validation_errors(); ?>
		</div>
	
		<form action="<?php echo base_url('accounting/login'); ?>" method="post" class="form-horizontal">
			<h3> Accountant Login</h3>
			<div class="clearfix"></div>
		 <hr/>
		  <div class="control-group">
			<label class="control-label" for="inputEmail"> Username</label>
			<div class="controls">
			  <input class="span12"  type="text" name="username" id="inputEmail" placeholder="Username">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
			  <input class="span12" name="password" type="password" id="inputPassword" placeholder="Password">
			</div>
		  </div>
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn btn-success">Sign in</button>
			</div>
		  </div>
		</form>
	</div>
</div>