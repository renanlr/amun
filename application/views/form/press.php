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
		<div class="titulo">Press Agency Form</div>
		
		<?php echo form_open('form/enviarRespostasPa', 'enctype="multipart/form-data" id="form"' ) ?>
			<table>
				<thead>
					<tr>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr class="bold"><td>College, University or Institution of Higher Education</td></tr>
					<tr><td><input type='text' name='universidade'></td></tr>
					<tr class="bold"><td>Undergraduate Major, What do you study at your higher education institution?</td></tr>
					<tr><td><input type='text' name='curso'></td></tr>
					<tr class="bold"><td>Do you have a faculty advisor?</td></tr>
					<tr><td><input type="radio" name="professor" value="1"> Yes</td></tr>
					<tr><td><input type="radio" name="professor" value="0"> No</td></tr>
					<tr class="bold"><td>Select those you are comfortable with experiencing:</td></tr>
					<tr><td><input type="checkbox" name="experiencia" value="writing news"> Writing news</td></tr>
					<tr><td><input type="checkbox" name="experiencia" value="taking pictures"> Taking pictures</td></tr>
					<tr><td><input type="checkbox" name="experiencia" value="Managing social medias"> Managing social medias</td></tr>
					<tr class="bold"><td>Why should you be a journalist at 18th AMUN’s Press Agency?</td></tr>
					<tr style="height:100px !important;"><td><textarea style="height:90px !important;" name="pergunta" rows="4" placeholder="Enter text here..."></textarea></td></tr>
					<tr class="bold"><td>Do you have any interest on participating as a one-delegate delegation if the Press Agency or the Press Agency do not have any vacancies anymore?</td></tr>
					<tr><td><input type="radio" name="delegacao" value="1"> Yes</td></tr>
					<tr><td><input type="radio" name="delegacao" value="0"> No</td></tr>
					<tr class="bold"><td>Do you wish to acquire our Social Events Package?</td></tr>
					<tr><td><input type="radio" name="social" value="1"> Yes</td></tr>
					<tr><td><input type="radio" name="social" value="0"> No</td></tr>
					<tr><td><input type='submit' value="Send" style="margin:20px auto; padding:12px 20px;"></td></tr>
				</tbody>
			</table>

		<?php echo form_close() ?>
	
	</div>

	<script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                universidade: "required",
                curso: {
                    required: true,
                },
                preferencies: {
                    required: true,
                },
                delegacao: {
                    required: true,
                },
                social: {
                    required: true
                }
            },
            messages: {
            	universidade: "Isert your university",
                curso: {
                    required: "Insert your course",
                },
                preferencies: {
                    required: "Insert your preferencies",
                },
                delegacao: {
                    required: "Insert",
                },
                social: {
                    required: ""
                }
           	}
      	});
   }); 
</script> 

<?php echo $this->load->view('_inc/footer') ?>