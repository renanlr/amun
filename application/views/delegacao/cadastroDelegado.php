<?php echo $this->load->view('_inc/header') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.validate.js" ></script>

<div class="content-box">
	<div class="titulo">Delegates Registration</div>
	<?php echo form_open('delegacao/cadastrarDelegado', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
		<div class="dados">
			<span>Name</span>
			<input name="name" type="text" style="width:300px">
			<span>Badge Name</span>
			<input name="badgeName" type="text" style="width:300px">
			<span>E-mail</span>
			<input name="email" type="text" style="width:300px">
			<span>Mobile Phone</span>
			<input name="cel" class="telefone" type="text" style="width:200px">
			<span>Identification (CPF/passport)</span>
			<input name="identification" type="text" style="width:200px">
            <span>Facebook</span><br>
            <input name="facebook" type="text" style="width:200px">
            <span>Country/Committee</span><br>
            <select name="representation" style="width:200px" form="form">
                <option value="0">Choose one option...</option>
                <?php foreach ($representations as $represent) { ?>
                    <option value="<?php echo $represent->id ?>"><?php echo "Representing ".$represent->nomepais." at ".$represent->nomecomite?></option>
                <?php }?>
            </select><br>
			
		</div>
		<input style="margin:20px auto; padding:12px 20px;" type="submit" value="Send" onclick="">
	<?php echo form_close(); ?>
</div>

<script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                name: "required",
                surName: {
                    required: true,
                },
                badgeName: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                senha: {
                    required: true
                },
                telefone: {
                    required: true,
                    digits: true
                },
                zip: {
                    required: true,
                    digits: true
                },
                city: {
                    required: true
                },
                state: {
                    required: true
                },
                country: {
                    required: true
                },
                identification: {
                    required: true
                },
                tipo: {
                    required: true
                }
            },
            messages: {
            	name: "Isert your name",
                surName: {
                    required: "Insert your surname",
                },
                badgeName: {
                    required: "Insert your badge name",
                },
                email: {
                    required: "Insert your e-mail",
                    email: "Incorrect format"
                },
                senha: {
                    required: "Insert your password"
                },
                cel: {
                    required: "Insert celphone",
                    digits: "Only use digits"
                },
                identification: {
                    required: "Insert your identification number"
                },
                tipo: {
                    required: "Choose one option"
                }
           	}
      	});
   }); 
</script> 
    
<?php echo $this->load->view('_inc/footer') ?>