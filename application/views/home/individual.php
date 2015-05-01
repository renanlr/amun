<?php echo $this->load->view('_inc/header') ?>
	
<div class="content-box">
	
	
	<?php if ($status==1) { ?>
		<div style="text-align:center;">
			<div class="titulo">Choose one option</div>
			<button class="btn-custom" style="width: 160px; height: 60px; border-radius: 5px;"><a style="color:white;font-size:17px;" onclick="if (confirm('Você tem certeza que deseja escolher ICTY? Ao confirmar você não poderá mais alterar a opção.')) window.location.replace('<?php echo base_url(); ?>index.php/form/escolherOpcaoIndividual/2');">ICTY</a></button>
			<button class="btn-custom" style="width: 160px; height: 60px; border-radius: 5px;"><a style="color:white;font-size:17px;" onclick="if (confirm('Você tem certeza que deseja escolher Press Agency? Ao confirmar você não poderá mais alterar a opção.')) window.location.replace('<?php echo base_url(); ?>index.php/form/escolherOpcaoIndividual/3');">Press Agency</a></button>
		</div>
	<?php } else {?>
		<div class="titulo">Individual Registration Panel</div>
		
		<div style="margin-bottom: 30px;font-size: 20px;font-weight: bold;color: red;">
			Next step:
			<?php if ($status < 4) {
				echo "Fill the form.";
			} elseif ($status < 5) {
				echo "Do the payment.";
			} elseif ($status < 6) {
				echo "Wait for confirmation";
			} else {
				echo "Congratulations, you are officially a participant at the 18TH AMUN";
			}?>
		</div>

		<div>Steps</div>
		<h4>1-	Login</h4>
		<p>After submitting your personal data, you are now logged-in to our registration system and can proceed to your individual registration.</p>
		<h4>2-	Form</h4>
		<p>Fill the form, show your interest and confirm your preferences as a participant at the 18th AMUN.</p>
		<h4>3-	Payment</h4>
<p>At this step, you're expected to pay the registration fee and party entrances in order to complete the registration process. For Brazilian delegates, registrations will have the cost of R$ 150,00 for the Press Agency and R$ 175,00 for the ICTY in the first round of registrations. For international delegates, fees will be of US$ 60,00 for the Press Agency and of US$ 70,00 for the ICTY. The Social Events combo, which includes both Beer Garden and Main Party, costs R$85,00 or US$ 30,00 if bought during the registration period.
Brazilian delegates must perform the payment within 5 business days either by bank transfer or bank deposit and submit the receipt of the transaction (a picture or digitalization) at the designated field and insert other requested information regarding the transaction.
International payments will be received through Paypal.</p>
		<h4>4-	Payment confirmation</h4>
		<p>Please wait for your payment and your registration to be confirmed.</p>
		<h4>5-	Confirmation</h4>
		<p>At this point you will receive confirmation that you are officially a participant at the 18TH AMUN. Remember to constantly check our website and social media for further information.</p>

	<?php } ?>
	
	
</div>


<?php echo $this->load->view('_inc/footer') ?>