<div class="container">
	<?php if(array_key_exists('status',$_REQUEST)) { ?>
		<?php if($_REQUEST['status'] == "failed") { ?>
			<div class="alert alert-error">
				Invalid login details, please login properly. <a href="<?php echo base_url("registrar/login");?>">Back</a>
			</div>
		<?php } ?>
	<?php } else { ?>
		<form action="<?php echo base_url("registrar/login");?>" method="post" class="form-horizontal">
			<h4>Registrar Officer Log In</h4><br/>
			<?php echo form_error("username"); ?>
			<?php echo form_error("password"); ?>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Username</label>
				<div class="controls">
					<input type="text" id="inputEmail" placeholder="Username" name="username" value="<?php echo set_value("username");?>" >
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
					<input type="password" id="inputPassword" placeholder="Password" name="password" value="<?php echo set_value("password");?>" >
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox"> Remember me
					</label>
					<button type="submit" class="btn btn-success"><span class="icon-user icon-white"></span>&nbsp;Log In</button>
				</div>
			</div>
		</form>
	<?php } ?>
</div>