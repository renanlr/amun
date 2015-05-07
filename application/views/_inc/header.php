<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AMUN REGISTRATION</title>
		<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
		<link rel="icon" href="<?=base_url()?>public/images/favicon.ico" type="image/gif">
		<link href="<?php echo base_url(); ?>public/css/template.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>public/css/content.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>public/js/jquery.mask.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/progress-bar.css">
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo-centro" style="text-align:center;"><img src="<?php echo base_url(); ?>public/images/logo-amun.png" style="height:200px"></div>
				<div id="banner" style="text-align:center; color:#fecb20; font-size:50px; width:930px;">
					<?php 
						if ($this->session->userdata('login_perfil') == 3) { ?>
							Administrator
						<?php } 
						elseif ($this->session->userdata('login_perfil') == 2) { ?>
							
						<?php } 
						elseif ($this->session->userdata('login_perfil') == 1) { ?>
							
						<?php }
					?>
				</div>
				<div style="clear:both;"></div>
			</div>
			<?php 
				if ($this->session->userdata('login_perfil') == 3) {
					$this->load->view('_inc/menu_admin');
				} 
				elseif ($this->session->userdata('login_perfil') == 2) {
					$this->load->view('_inc/menu_delegation');
				} 
				elseif ($this->session->userdata('login_perfil') == 1) {
					$this->load->view('_inc/menu_individual');
				} 
			?>
			<div id="content">


