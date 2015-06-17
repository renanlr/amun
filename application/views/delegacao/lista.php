<?php echo $this->load->view('_inc/header') ?>

	<div class="content-box">
		<div class="titulo">Delegations</div>

		<div class="lista-materias" >
			<table class="table table-list table-condensed" style="margin-bottom:30px;">
				<thead>
					<tr>
						<th>Head Delegate</th>
						<th>E-mail</th>
						<th>Phone Number</th>
						<th>Country</th>
						<th>University</th>
						<th>Professor</th>
						<th>Course</th>
						<th>Delegates</th>
						<th>Gratuity</th>
						<th>Social Events</th>
						<th>Options</th>
					</tr>
				</thead>
				<?php foreach ($delegacoes as $delegacao) {?>
					<tr>
						<td><?php echo $delegacao->nome." ".$delegacao->sobrenome; ?></td>
						<td><?php echo $delegacao->email ?></td>
						<td><?php echo $delegacao->celular ?></td>
						<td><?php
							foreach ($paises as $pais) {
								if ($pais->id == $delegacao->lista_paises_id ) {
									echo $pais->nome;
									break;
								}
							}
							?>
						</td>
						<td><?php echo $delegacao->universidade ?></td>
						<td><?php
							if ($delegacao->professor == 1) {
								echo "Sim";
							}else{
								echo "'Não";
							}
							?>
						</td>
						<td><?php echo $delegacao->curso ?></td>
						<td><?php echo $delegacao->qtd_integrantes ?></td>
						<td><?php echo $delegacao->qtd_gratuidade ?></td>
						<td><?php echo $delegacao->qtd_pacotes ?></td>
						<td>
							<a title="Country Preferences" href="<?php echo base_url();?>index.php/delegacao/listaPreferencias/<?php echo $delegacao->iddelegacao ?>">More Info</a><br>
						</td>
					</tr>
				<?php } ?>
			</table>

			<script>
		       $(function() {
		           $('table').dataTable({
		               paging: false,
		               language: {
		                   search: 'Search',
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
	</div>

<?php echo $this->load->view('_inc/footer') ?>