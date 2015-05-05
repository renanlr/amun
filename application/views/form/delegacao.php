<?php echo $this->load->view('_inc/header') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.validate.js" ></script>
	<style type="text/css">
		tr{
			height: 35px;
		}
		table{
			margin-left: 130px;
			margin-bottom: 50px;
			width: 675px;
		}
		.bold{
			font-weight: bold;
		}
	</style>

	<div class="content-box">
		<div class="titulo">Delegation Form</div>
		
		<?php echo form_open('form/enviarRespostasDelegacao', 'enctype="multipart/form-data" id="form"' ) ?>
			<table>
				<thead>
					<tr>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr class="bold"><td>College, University or Institution of Higher Education (majoritarily):</td></tr>
					<tr><td><input type='text' name='universidade'></td></tr>
					<tr class="bold"><td>Undergraduate Major of Your Delegation (majoritarily):</td></tr>
					<tr><td><input type='text' name='curso'></td></tr>
					<tr class="bold"><td>Do you have a faculty advisor?</td></tr>
					<tr><td><input type="radio" name="professor" value="1"> Yes</td></tr>
					<tr><td><input type="radio" name="professor" value="0"> No</td></tr>
					<tr class="bold"><td>Number of delegates: (Maximum 6 delegates)</td></tr>
					<tr><td><input type='text' name="qtd_integrantes" style="width: 30px;" ></td></tr>
					<tr class="bold"><td>How many delegates were selected in our “Edital de Isenção de Taxa”?<br><span style="font-style:italic;font-size:12px;font-weight:initial;">Please send their personal information (full name, email and CPF) to <span class="bold">amun@amun.org.br</span> before procceding to payment. The payment step will only be available after the confirmation of such informations by the Secretariat.</span></td></tr>
					<tr><td><input type='text' name="qtd_gratuidade" style="width: 30px;" ></td></tr>
					<tr class="bold"><td>Please, inform here how many delegates are interested in our social events package. They include our main party and our Beer Garden party. The package costs R$85,00 or US$30.00.</td></tr>
					<tr><td><input type='text' name="qtd_pacotes" style="width: 30px;" ></td></tr>
					<tr><td><p style="color:red;font-weight:bold;margin:20px auto;">ATTENTION: Once you submit this form, changes will not be accepted anymore.</p></td></tr>
					<tr><td><input type='submit' value="Send" style=" padding:12px 20px;"></td></tr>
				</tbody>
			</table>

		<?php echo form_close() ?>
	
	</div>

	<script>
    $(document).ready(function(){
        $("#form").validate({
            rules: {
                universidade: "required",
                curso: {
                    required: true
                },
                professor: {
                    required: true
                },
                qtd_integrantes: {
                    required: true,
                    rangelength: [1, 6],
                    number: true,
                    maxlength: 1,
                },
               	qtd_gratuidade: {
                    required: true,
                    rangelength: [1, 6],
                    number: true,
                    maxlength: 1,
                },
                qtd_pacotes: {
                    required: true,
                    rangelength: [1, 6],
                    number: true,
                    maxlength: 1,
                },
            },
            messages: {
               	universidade: "Incomplete.",
               	curso: {
                    required: "Incomplete.",
               	},
               	professor: {
                    required: "Incomplete.",
               	},
               	qtd_integrantes: {
                    required: "Incomplete.",
                    rangelength: "Please inform a number in range 1 to 6.",
                    number: "Please only use numbers",
               	},
               	qtd_gratuidade: {
                    required: "Incomplete.",
                    rangelength: "Please inform a number in range 1 to 6.",
                    number: "Please only use numbers",
               	},
               	qtd_pacotes: {
                    required: "Incomplete.",
                    rangelength: "Please inform a number in range 1 to 6.",
                    number: "Please only use numbers",
               	}
            }
           	
      	});

      	$('.qtd_integrantes').mask('9');
      	$('.qtd_gratuidade').mask('9');
      	$('.qtd_pacotes').mask('9');
   });
   
</script> 

<?php echo $this->load->view('_inc/footer') ?>