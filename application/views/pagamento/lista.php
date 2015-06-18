<?php echo $this->load->view('_inc/header') ?>

	<div class="content-box">
		<div class="titulo">Payment</div>

		<div class="lista-materias" >
			<table class="table table-list table-condensed" style="margin-bottom:30px;">
				<thead>
					<tr>
						<th>Comprovante</th>
						<th>Numero</th>
						<th>Dados Pessoais</th>
						<th>Situação Pagamento</th>
						<th>Operações</th>
					</tr>
				</thead>
				<?php foreach ($users as $usuario) {?>
					<tr>
						<td style="width:180px;"> <img style="max-width: 150px;" src="<?php echo $usuario->foto ?>"><br>
							<a href="<?php echo $usuario->foto ?>" target="_blank">Download</a>
						</td>
						<td><?php echo $usuario->numero ?></td>
						<td>
							Nome: <?php echo $usuario->nome." ".$usuario->sobrenome; ?><br>
							E-mail: <?php echo $usuario->email ?><br>
							Tipo: <?php
								if ($usuario->tipo == 1) {
									echo "Individual";
								}elseif ($usuario->tipo == 2) {
									echo "Delegation";
								}else{
									echo "Administrator";
								}
							?>
						</td>
						<td>
							<?php if($usuario->situacao_pagamento){
		                        echo "<h5 style=\"color:green;\">Pago</h5>";
		                    }else{
		                        echo "<h5 style=\"color:red;\">Não pago</h5>";
		                    }; ?>
						</td>
						<td>
							<a title="Confirmar pagamento" onclick="if (confirm('Tem certeza que deseja confirmar o pagamento de <?php echo $usuario->nome." ".$usuario->sobrenome; ?>  ?')) window.location.replace('<?php echo base_url(); ?>index.php/pagamento/confirmarPagamento/<?php echo $usuario->idusuario ?>');"><img src="<?php echo base_url(); ?>public/images/loop-square.svg"></a>
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