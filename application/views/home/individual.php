<?php echo $this->load->view('_inc/header') ?>
	
<div class="content-box">
	<style type="text/css">
		.bold{
		font-weight: bold;	
		}
	</style>
	
	<?php if ($status==1) { ?>
		<div style="text-align:center;">
			<div class="titulo">Choose one committee option</div>
			<a style="color:white;font-size:17px;" onclick="if (confirm('Are you sure you want to register to ICTY? Once you confirm, it will not be possible to change the option.')) window.location.replace('<?php echo base_url(); ?>index.php/form/escolherOpcaoIndividual/2');"><button class="btn-custom" style="width: 160px; height: 60px; border-radius: 5px;">ICTY</button></a>
			<a style="color:white;font-size:17px;" onclick="if (confirm('Are you sure you want to register to Press Agency? Once you confirm, it will not be possible to change the option.')) window.location.replace('<?php echo base_url(); ?>index.php/form/escolherOpcaoIndividual/3');"><button class="btn-custom" style="width: 160px; height: 60px; border-radius: 5px;">Press Agency</button></a>
		</div>
	<?php } else {?>
		<div class="titulo">Individual Registration Panel</div>
		
		<div style="margin-bottom: 30px;font-size: 20px;font-weight: bold;color: red;">
			Next step:
			<?php if ($status < 4) {
				echo "Fill the form.";
			} elseif ($status < 5) {
				echo "Proceed to payment.";
			} elseif ($status < 6) {
				echo "Please wait for confirmation.";
			} else {
				echo "Congratulations, you are officially a participant at the 18th AMUN!";
			}?>
		</div>

		<div style="  font-size: 28px;font-weight: bold;">Understand our registration proccess step-by-step:</div>
		<h4 style="color:#e4b928;">1-	Login</h4>
		<p style="  font-size: 17px;text-align: justify;">After submitting your personal data, you are now logged-in to our registration system and can proceed to your individual registration.</p>
		<h4 style="color:#e4b928;">2-	Form</h4>
		<p style="  font-size: 17px;text-align: justify;">Fill the form, show your interest and confirm your preferences as a participant at the 18th AMUN.</p>
		<h4 style="color:#e4b928;">3-	Payment</h4>
		<p style="  font-size: 17px;text-align: justify;">At this step, you're expected to pay the registration fee and party entrances in order to complete the registration process. For Brazilian delegates, registrations will have the cost of <span class="bold">R$ 150,00</span> for the Press Agency and <span class="bold">R$ 175,00</span> for the ICTY in the first round of registrations. For international delegates, fees will be of <span class="bold">US$ 60,00</span> for the Press Agency and of <span class="bold">US$ 70,00</span> for the ICTY. The Social Events combo, which includes both Beer Garden and Main Party, costs <span class="bold">R$85,00</span> or <span class="bold">US$ 30,00</span> if bought during the registration period.<br>
Brazilian delegates must perform the payment within <span class="bold">5 business days</span> either by <span class="bold">bank transfer or bank deposit</span> and <span class="bold">submit the receipt of the transaction</span> (a picture or digitalization) at the designated field and insert other requested information regarding the transaction.<br>
International payments will be received through <span class="bold">Paypal</span>.<br></p>
		<h4 style="color:#e4b928;">4-	Payment confirmation</h4>
		<p style="  font-size: 17px;text-align: justify;">Please wait for your payment and your registration to be confirmed.</p>
		<h4 style="color:#e4b928;">5-	Confirmation</h4>
		<p style="  font-size: 17px;text-align: justify;">At this point you will receive confirmation that you are officially a participant at the 18th AMUN.<br><span class="bold"> Remember to constantly check our website and social media for further information.</span></p>

	<?php } ?>
	
	
</div>


<?php echo $this->load->view('_inc/footer') ?>