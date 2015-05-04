			</div>
		</div>
		<div id="footer">
			<div id="footer-inner">
				<div id="footer-left"></div>
				<div id="footer-center"></div>
				<div id="footer-right"></div>
			</div>
		</div>
		<?php if ($this->session->userdata('Alert')): ?>
			<div class="popup-mensagem">
				<div class="popup-inner-mensagem">
					<p class="popup-mensagem-titulo"><strong>Alert</strong></p>
					<p><?php echo $this->session->userdata('Alert') ?></p>
					<div style="margin-top: 30px; text-align: center">
						<a style="min-width: 80px;" href="#" class="btn btn-custom confirm">OK</a>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(function() {
					$('.confirm').click(function() {
						$('.popup-mensagem').hide();
					});
				})
			</script>
			<?php $this->session->unset_userdata('Alert'); //exclui a mensagem  ?>
		<?php endif ?>

	</body>
</html>
