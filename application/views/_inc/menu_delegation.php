<?php
$ci =& get_instance();
$ci->load->model('usuario_model');
$ci->load->model('delegacao_model');
$user = $ci->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));
$deleg = $ci->delegacao_model->buscarDelegacaoPorIdUsuario($this->session->userdata('login_id'));
?>

<div id="menu">
	<ul>
		<li><a href="<?php echo base_url(); ?>index.php/usuario/home">Home</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/usuario/home">></a></li>
		<li><a href="<?php echo base_url(); ?>index.php/form/cadastroDelegacao">Form</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/form/cadastroDelegacao">></a></li>
		<li><a href="<?php echo base_url(); ?>index.php/form/cadastroPaises">Countries</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/form/cadastroPaises">></a></li>
		<li><a href="<?php echo base_url(); ?>index.php/pagamento/payment">Payment</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/pagamento/payment">></a></li>
		<li><a href="<?php echo base_url(); ?>index.php/delegacao/listaDelegados">Delegates registration</a></li>
	</ul>
	<div id="nav-loged">
		<div><?php echo $this->session->userdata('nome_fantasia'); ?></div>
		<a title="Home" href="<?php echo base_url(); ?>index.php/">
			<img src="<?php echo base_url(); ?>public/images/icon-home.svg">
		</a>
		<a title="Perfil" href="<?php echo base_url(); ?>index.php/responsavel/meusDados">
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
		<p>Welcome,  <?php echo $user->nome; ?></p>
	</div>

	<div style="
		position: absolute; 
		right: 840px; 
		top: -30px;
		font-size: 20px;
		font-weight: bold;
		color: #FECB20;
	">
		<p><?php if($deleg != null) echo $deleg->qtd_integrantes.' delegates'; ?></p>
	</div>
</div>

