<?php echo $this->load->view('_inc/header') ?>
	
<div class="content-box">
	<style type="text/css">
		.bold{
		font-weight: bold;	
		}
	</style>
		<div style="text-align:center;">
			<div class="titulo">Choose one option</div>
			<a style="color:white;font-size:17px;" href="<?php echo base_url(); ?>index.php/individual/listaIcty"><button class="btn-custom" style="width: 160px; height: 60px; border-radius: 5px;">ICTY</button></a>
			<a style="color:white;font-size:17px;" href="<?php echo base_url(); ?>index.php/individual/listaPress"><button class="btn-custom" style="width: 160px; height: 60px; border-radius: 5px;">Press Agency</button></a>
		</div>
</div>


<?php echo $this->load->view('_inc/footer') ?>