<?php echo $this->load->view('_inc/header') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.validate.js" ></script>

<div class="content-box">
	<div class="titulo">Registration</div>
	<?php echo form_open('usuario/cadastrar', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
		<div class="dados">
			<div class="subtitulo">Personal</div>
			<span>Name</span>
			<input name="name" type="text" style="width:300px">
			<span>Surname</span>
			<input name="surName" type="text" style="width:300px">
			<span>Badge Name</span>
			<input name="badgeName" type="text" style="width:300px">
			<span>E-mail</span>
			<input name="email" type="text" style="width:300px">
			<span>Password</span>
			<input name="senha" type="password" style="width:200px">
			<span>Mobile Phone</span>
			<input name="cel" class="telefone" type="text" style="width:200px">
			<span>ZIP Code</span>
			<input name="zip" type="text" style="width:200px">
			<span>City</span>
			<input name="city" type="text" style="width:200px">
			<span>State/Province</span>
			<input name="state" type="text" style="width:200px">
			<span>Country</span><br>
            <select name="country" style="width:200px" form="form">
                <?php foreach ($paises as $pais) { ?>
                    <option value="<?php echo $pais->id ?>"><?php echo $pais->nome?></option>
                <?php }?>
            </select><br>
			<span>Identification (CPF/passport)</span>
			<input name="identification" type="text" style="width:200px">
			<span>Type of registration</span>
			<table>
				<thead>
					<tr>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="radio" name="tipo" value="1"></td>
						<td>Individual registration (ICTY and Press Agency only)</td>
					</tr>
					<tr>
						<td><input type="radio" name="tipo" value="2"></td>
						<td>Delegation registration (please note that the Head Delegate of each delegation is the only one responsible for the registration process)</td>
					</tr>
				</tbody>
			</table>
			
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
                telefone: {
                    required: "Informe um telefone para contato",
                    digits: "Utilize apenas dígitos"
                },
                zip: {
                    required: "Insert your Zip Code",
                    digits: "Only use digits"
                },
                city: {
                    required: "Insert your city"
                },
                state: {
                    required: "Insert your state"
                },
                country: {
                    required: "Insert your country"
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