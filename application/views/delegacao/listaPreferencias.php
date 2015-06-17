<?php echo $this->load->view('_inc/header') ?>

	<div class="content-box">
		<div class="titulo">Delegation Info</div>

        <div>
            
            <span>Nome: </span><?php echo $delegacao->nome." ".$delegacao->sobrenome;?><br>
            <span>E-mail: </span><?php echo $delegacao->email;?><br>
            <span>Celular: </span><?php echo $delegacao->celular;?><br>
            <span>Universidade: </span><?php echo $delegacao->universidade;?><br>
            <span>Curso: </span><?php echo $delegacao->curso;?><br>
            <span>Quantidade de delegados: </span><?php echo $delegacao->qtd_integrantes;?><br>
            <span>Quantidade de pacotes de festa: </span><?php echo $delegacao->qtd_pacotes;?><br>
        </div>

        <div class="titulo">Lista de preferencias</div>
		<div class="lista-materias" >
			<table class="table table-list table-condensed" style="margin-bottom:30px;">
				<thead>
					<tr>
						<th>Option</th>
						<th>Preferences</th>
					</tr>
				</thead>
				<tbody>
                <?php if (!empty($opt_paises)) { ?>
    				<?php $i=1; foreach ($opt_paises as $opt) {?>
    					<tr>
    						<td>Option <?php echo $i; ?></td>
    						<td><?php
    							foreach ($opt as $paisid) {
    								if ($paisid > 0) {
    									foreach ($paises as $pais) {
    										if ($pais->idpaises == $paisid) {
    											echo $pais->nome."," ;
    										}
    									}
    								}
    							}
    							 ?>

    						</td>
    					</tr>
    				<?php $i+=1; } ?>
                <?php } ?>
				</tbody>
			</table>

			<script>
		       $(function() {
		           $('table').dataTable({
		               paging: false,
		               language: {
		                   search: false,
		                   info: '',
		                   infoFiltered: '',
		                   infoEmpty: '',
		                   emptyTable: '',
		                   zeroRecords: ''
		               }
		           });
		           $('#DataTables_Table_0_filter input').css('width', '200px');
		           $('#DataTables_Table_0_filter input').css('margin-left', '5px');
		           $('#DataTables_Table_0_filter label').css('padding-left', '5px');
		           //$('#DataTables_Table_0_filter label').css('padding-left', '26px');
		           //$('#DataTables_Table_0_filter label').css('background', 'url(../)');
		       });
		   </script>	
		</div>

		<?php echo form_open('delegacao/cadastrarPaises', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
		<div class="titulo">Escolher Representações desta Delegação</div>
        <div class="dados">
            <div class="subtitulo">Choose up to 6 representations</div>
            <table>
                <thead></thead>
                <tbody>
                    <tr>
                        <td>
                            <span>Representation 1:</span>
                            <select name="country1" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 45px;font-size: 20px;font-weight: bold;">+</span>
                            </td>
                        <td>
                            <span>Representation 2:</span>
                            <select name="country2" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 45px;font-size: 20px;font-weight: bold;">+</span>
                        </td>
                        <td>
                            <span>Representation 3:</span>
                            <select name="country3" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 35px;font-size: 20px;font-weight: bold;">+</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Representation 4:</span>
                            <select name="country4" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 45px;font-size: 20px;font-weight: bold;">+</span>
                        </td>
                        <td>
                            <span>Representation 5:</span>
                            <select name="country5" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 45px;font-size: 20px;font-weight: bold;">+</span>
                        </td>
                        <td>
                            <span>Representation 6:</span>
                            <select name="country6" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
		</div>
		<input type="hidden" name="id" value="<?php echo $delegacao->iddelegacao ?>">
		<input style="margin:20px auto; padding:12px 20px;" type="submit" value="Register Preference">
	<?php echo form_close(); ?>
	</div>

<?php echo $this->load->view('_inc/footer') ?>