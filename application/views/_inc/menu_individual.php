<?php
$ci =& get_instance();
$ci->load->model('usuario_model');
$user = $ci->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));
?>

<div id="menu">
	<ul>
		<li><a href="<?php echo base_url(); ?>index.php/usuario/home">Home</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/usuario/home">></a></li>
		<li><a href="<?php echo base_url(); ?>index.php/form/cadastro">Form</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/form/cadastro">></a></li>
		<li><a href="<?php echo base_url(); ?>index.php/pagamento/pagamento">Payment</a></li>
	</ul>
	<div id="nav-loged">
		<div><?php echo $this->session->userdata('nome_fantasia'); ?></div>
		<a title="Home" href="<?php echo base_url(); ?>index.php/">
			<img src="<?php echo base_url(); ?>public/images/icon-home.svg">
		</a>
		<a title="Perfil" href="<?php echo base_url(); ?>index.php/professor/meusDados">
			<img src="<?php echo base_url(); ?>public/images/icon-perfil.svg">
		</a>
		<a title="Sair" href="<?php echo base_url(); ?>index.php/usuario/deslogar">
			<img src="<?php echo base_url(); ?>public/images/icon-logout.svg">
		</a>
	</div>
	<div style="clear:both;"></div>
	<div style="
		position: absolute; 
		right: 0; 
		top: -30px;
		font-size: 20px;
		font-weight: bold;
		color: #FECB20;
	">
		Welcome,  <?php echo $user->nome; ?>
	</div>
</div>


