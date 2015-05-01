<?php echo $this->load->view('_inc/header') ?>

	<div class='login' style="width: 300px; margin: 50px auto ">
		<?php echo form_open('usuario/logar') ?>
			E-mail: <input type='text' name='login'>
			Senha: <input type='password' name='senha'>
			<input style="margin:10px 0" type='submit' value='Login'>
		<?php echo form_close() ?>
		<a style="display:block" href="<?php echo base_url(); ?>index.php/usuario/recuperacaoSenha">Forgot your password?</a>
		<a style="display:block" href="<?php echo base_url(); ?>index.php/usuario/cadastro">Sign up!</a>
	</div>

<?php echo $this->load->view('_inc/footer') ?>