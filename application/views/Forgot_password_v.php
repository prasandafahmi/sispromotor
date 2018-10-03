<?php  $this->load->view('Header_v'); ?> <br>

<section>
 <div class="container">
		<form class="form-horizontal well" method="post" id="form" action="<?php echo site_url()?>/Akun/doforget">
			<fieldset>
	          <legend>Reset password</legend>
				<div class="control-group">
					<label for="email"> Email</label>
					<input class="box" type="text" id="email" name="email" />
				</div>
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="Reset" />
				</div>
				    <?php if( isset($info)): ?>
					<div class="alert alert-success">
						<?php echo($info) ?>
					</div>
				    <?php elseif( isset($error)): ?>
					<div class="alert alert-error">
						<?php echo($error) ?>
					</div>
				    <?php endif; ?>
			</fieldset>
		</form>
	</div> 
</section><br><br><br><br><br><br><br><br><br><br><br><br>


<?php $this->load->view('Footer_v'); ?>
<?php $this->load->view('LoadJS'); ?>