<?php echo $this->load->view('_inc/header') ?>

	<div class="content-box">
		<div class="titulo">All Users</div>

		<div class="lista-materias" >
			<table class="table table-list table-condensed" style="margin-bottom:30px;">
				<thead>
					<tr>
						<th>Name</th>
						<th>E-mail</th>
						<th>Phone Number</th>
						<th>Country</th>
						<th>Type</th>
						<th>Status</th>
						<th>Payment</th>
						<th>Options</th>
					</tr>
				</thead>
				<?php foreach ($users as $usuario) {?>
					<tr>
						<td><?php echo $usuario->nome." ".$usuario->sobrenome; ?></td>
						<td><?php echo $usuario->email ?></td>
						<td><?php echo $usuario->celular ?></td>
						<td><?php
							foreach ($paises as $pais) {
								if ($pais->id == $usuario->lista_paises_id ) {
									echo $pais->nome;
									break;
								}
							}
							?>
						</td>
						<td><?php
							if ($usuario->tipo == 1) {
								echo "Individual";
							}elseif ($usuario->tipo == 2) {
								echo "Delegation";
							}else{
								echo "Administrator";
							}
							?>
						</td>
						<td><?php
							if ($usuario->tipo == 1) {
								//status individual
								if ($usuario->status == 1) {
									echo "Choosing Committee";
								}elseif ($usuario->status == 2 || $usuario->status == 3) {
									echo "Preenchendo o form";
								}elseif ($usuario->status == 4) {
									echo "Aguardando pagamento";
								}elseif ($usuario->status == 5) {
									echo "Aguardando confirmação de pagamento";
								}elseif ($usuario->status == 6) {
									echo "Usuario inscrito";
								}
							}elseif ($usuario->tipo == 2) {
								//status delegation
							}else{
								echo "Administrator";
							}
							?>
						</td>
						<td>
							<?php if($usuario->situacao_pagamento){
		                        echo "Pago";
		                    }else{
		                        echo "Não pago";
		                    }; ?>
						</td>
						<td>
							<a title="Excluir" onclick="if (confirm('Tem certeza que deseja excluir esta matÃ©ria?')) window.location.replace('<?php echo base_url(); ?>index.php/materia/excluir/');"><img src="<?php echo base_url(); ?>public/images/icon-delete.svg"></a>
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