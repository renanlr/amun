<div id="menu">
	<ul>
		<li><a href="<?php echo base_url(); ?>index.php/usuario/listar">Usuários</a></li>

	</ul>
	<div id="nav-loged">
		<div><?php echo $this->session->userdata('nome_fantasia'); ?></div>
		<a title="Home" href="<?php echo base_url(); ?>index.php/">
			<img src="<?php echo base_url(); ?>public/images/icon-home.svg">
		</a>
		<a title="Sair" href="<?php echo base_url(); ?>index.php/usuario/deslogar">
			<img src="<?php echo base_url(); ?>public/images/icon-logout.svg">
		</a>
	</div>
	<div style="clear:both;"></div>
</div>


