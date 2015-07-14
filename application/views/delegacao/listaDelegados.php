<?php echo $this->load->view('_inc/header') ?>

	<div class="content-box">
		<div class="titulo">Delegates Registration</div>
		<p style="text-align: justify; margin-bottom: 25px;">Hello Head Delegate!<br> It's now time to register all delegates of your delegation. You just have to click on "new delegate", fill the necessary information and choose countries and committees.<br>ATTENTION:<br>Do not forget to register yourself as well!<br>Note that UNSC countries will appear twice on the list.<br>If something wrong happens, you can delete the delegate registration and start it again by clicking "new delegate". Changes will only be accepted until the deadline is over. Good luck!</p>

		<a class="buttom" style="float: right; margin-bottom: 20px; z-index: 3;" href="<?php echo base_url(); ?>index.php/delegacao/cadastroDelegado">
			<img style="top: -1px; left: -2px;" src="<?php echo base_url(); ?>public/images/icon-plus.svg">
			New Delegate
		</a>

		<div class="lista-materias" >
			<table class="table table-list table-condensed" style="margin-bottom:30px;">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Badge Name</th>
						<th>E-mail</th>
						<th>Phone Number</th>
						<th>Identification Document</th>
						<th>Facebook</th>
						<th>Country/Committee</th>
						<th>Options</th>
					</tr>
				</thead>
				<?php foreach ($delegados as $delegado) {?>
					<tr>
						<td><?php echo $delegado->nome ?></td>
						<td><?php echo $delegado->nome_cracha ?></td>
						<td><?php echo $delegado->email ?></td>
						<td><?php echo $delegado->celular ?></td>
						<td><?php echo $delegado->facebook ?></td>
						<td><?php echo $delegado->identification ?></td>
						<td><?php echo $delegado->strRepresentation ?></td>
						<td>
							<a title="Delete" href="<?php echo base_url();?>index.php/delegacao/excluirDelegado/<?php echo $delegado->iddelegado ?>">Delete</a><br>
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