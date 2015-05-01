<?php echo $this->load->view('_inc/header') ?>

<div class="content-box">
	<div class="titulo">Contagem de créditos</div>
	<div class='data'>
		<?php echo form_open("aula/creditosProfessor"); ?>
			<input class='date' type='text' name='semana' style="margin-bottom:10px">
			<input type='submit' value='Selecionar semana' style="margin-bottom:10px; width:100%;">
		<?php echo form_close();?>
		<div>
			Semana: <?php
				$dia = (date('Y-m-d',strtotime(str_replace('/','-',$semana))));
				$dia1 = new DateTime($dia);
				echo $dia1->format("d/m/Y") . " ~ " . $dia1->modify('+6 day')->format('d/m/Y');
			?>
		</div>
	</div>
	<table class="table table-list table-condensed">
		<thead>
			<tr>
				<th width="660px">Professor</th>
				<th>Créditos</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($professores as $professor) { ?>
			<tr onclick="mostrarAulas('aulas_<?php echo $professor->id; ?>')">
				<td><?php echo $professor->nome; ?></td>
				<td><?php echo $professor->creditos; ?></td>
			</tr>
			<tr class='aulas_<?php echo $professor->id; ?>' style="display:none">
				<td colspan='2'>
					<table class='aulas'>
						<tr>
							<th>Data</th>
							<th>Horário</th>
							<th>Duração</th>
						</tr>
						<?php
							foreach ($professor->aulas as $aula){
								echo "<tr>";
									echo "<td>" . $aula->data . "</td>";
									echo "<td>" . $aula->horario . " </td>";
									echo "<td>" . $aula->duracao . " </td>";
								echo "</tr>";
							} ?>
			 		</table>
 				</td>
			</tr>
 			<?php } ?>
		</tbody>
	</table>
	<script type="text/javascript">
		function mostrarAulas(aula) {
			$('.'+	aula).toggle();
		}

    	$(document).ready(function(){
      		$('.date').mask('00/00/0000');
		});
	</script>
</div>

<?php echo $this->load->view('_inc/footer') ?>