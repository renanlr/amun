<?php echo $this->load->view('_inc/header') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.validate.js" ></script>
	<style type="text/css">
		tr{
			height: 35px;
		}
		.table-master{
			margin-left: 130px;
			margin-bottom: 50px;
			width: 675px;
		}
		.bold{
			font-weight: bold;
		}
	</style>

	<div class="content-box">
		<div class="titulo">ICTY Form</div>
		
		<?php echo form_open('form/enviarRespostasIcty', 'enctype="multipart/form-data" id="form"' ) ?>
			<table class="table-master">
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
					<tr class="bold"><td>Preferencies<br>Please, inform here your preferences for representation from the most desired option to the least one.</td></tr>
					<tr><td>
						<table>
							<thead>
								
							</thead>
							<tbody>
									<tr><td style="width: 170px;font-weight: bold;">First:</td><td style="width: 170px;font-weight: bold;">Second:</td><td style="width: 170px;font-weight: bold;">Third:</td></tr>
									<tr><td><input type="radio" name="first" value="Judge"> Judge</td><td><input type="radio" name="second" value="Judge"> Judge</td><td><input type="radio" name="third" value="Judge"> Judge</td></tr>
									<tr><td><input type="radio" name="first" value="Prosecutor"> Prosecutors</td><td><input type="radio" name="second" value="Prosecutor"> Prosecutors</td><td><input type="radio" name="third" value="Prosecutor"> Prosecutors</td></tr>
									<tr><td><input type="radio" name="first" value="Defense Lawyers"> Defense Lawyers</td><td><input type="radio" name="second" value="Defense Lawyers"> Defense Lawyers</td><td><input type="radio" name="third" value="Defense Lawyers"> Defense Lawyers</td></tr>
							</tbody>
						</table>
					</td></tr>
					
					<tr class="bold"><td>Do you have any interest on participating as a one-delegate delegation if the ICTY or the Press Agency do not have any vacancies anymore?</td></tr>
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
            	universidade: "Isert your name",
                curso: {
                    required: "Insert your surname",
                },
                preferencies: {
                    required: "Insert your badge name",
                },
                delegacao: {
                    required: "Insert your e-mail",
                    email: "Incorrect format"
                },
                social: {
                    required: "Insert your password"
                }
           	}
      	});
   }); 
</script> 

<?php echo $this->load->view('_inc/footer') ?>