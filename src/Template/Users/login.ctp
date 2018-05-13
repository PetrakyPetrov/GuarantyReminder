<div class="login-form" style="margin-top: 50px">
	<div class="login-content">
		<?= $this->Form->create(); ?>
			<?= $this->Form->input('email', ['type'=>'email']); ?>
			<?= $this->Form->input('password', ['type'=>'password']);?>
			<?= $this->Form->submit('Login', ['class'=>'button']); ?>
			<?= $this->Form->end(); ?>
	</div>
</div>