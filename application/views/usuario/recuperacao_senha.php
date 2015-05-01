<?php echo $this->load->view('_inc/header') ?>

<div class="login" style="width: 300px; margin: 50px auto ">
	<?php echo form_open('usuario/recuperarSenha'); ?>
		Informe seu e-mail de cadastro para <br>receber uma nova senha de acesso.<br><br>
		<input name="email" type="text">
		<input style="margin:10px 0" type="submit" value="Enviar">
	<?php echo form_close(); ?>
</div>

<?php echo $this->load->view('_inc/footer') ?>