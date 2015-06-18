<?php echo $this->load->view('_inc/header') ?>

	<div class="content-box">
		<div class="titulo">ICTY Delegates Confirmed</div>

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
					</tr>
				</thead>
				<?php foreach ($delegados as $delegado) {?>
					<tr>
						<td><?php echo $delegado->nome." ".$delegado->sobrenome; ?></td>
						<td><?php echo $delegado->email ?></td>
						<td><?php echo $delegado->celular ?></td>
						<td><?php
							foreach ($paises as $pais) {
								if ($pais->id == $delegado->lista_paises_id ) {
									echo $pais->nome;
									break;
								}
							}
							?>
						</td>
						<td><?php echo $delegado->universidade ?></td>
						<td><?php
							if ($delegado->professor == 1) {
								echo "Sim";
							}else{
								echo "'Não";
							}
							?>
						</td>
						<td><?php echo $delegado->curso ?></td>
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