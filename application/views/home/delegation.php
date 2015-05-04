<?php echo $this->load->view('_inc/header') ?>
	
<div class="content-box">

		<div class="titulo">Delegation Registration Panel</div>
		
		<div style="margin-bottom: 30px;font-size: 20px;font-weight: bold;color: red;">
			Next step:
			<?php if ($status < 4) {
				echo "Wait for e-mail.";
			} elseif ($status < 5) {
				echo "Do the payment.";
			} elseif ($status < 6) {
				echo "Wait for confirmation";
			} else {
				echo "Congratulations, you are officially a participant at the 18TH AMUN";
			}?>
		</div>

		<div style="  font-size: 28px;font-weight: bold;">Understand our registration proccess step-by-step:</div>
		<h4 style="color:#e4b928;">1-	Login</h4>
		<p style="  font-size: 17px;text-align: justify;">After submitting your personal data, you are now logged-in to our registration system and can proceed to register your delegation. Please note that the head-delegate is the only person who should perform the registration on behalf of the whole delegation.</p>
		<h4 style="color:#e4b928;">2-	Form</h4>
		<p style="  font-size: 17px;text-align: justify;">Fill this form with further information to confirm your interest in participating at the 18th AMUN.</p>
		<h4 style="color:#e4b928;">3-	Payment</h4>
		<p style="  font-size: 17px;text-align: justify;">At this step, you're expected to pay the registration fee(s) and party entrances in order to complete the registration process.  For Brazilian delegations, registrations will have the cost of R$ 175,00 per delegate in the first round of registrations. For international delegations, the cost will be of US$ 70,00 per delegate. The Social Events combo, which includes both Beer Garden and Main Party, costs R$85,00 or US$ 30,00 per delegate if bought during the registration period.<br>
Brazilian delegations must perform the payment within 5 business days either by bank transfer or bank deposit and submit the receipt of the transaction (a picture or digitalization) at the designated field and insert other requested information regarding the transaction. Only one transaction should be performed by the delegation. <br>
International payments will be received through Paypal.</p>
		<h4 style="color:#e4b928;">4-	Payment confirmation</h4>
		<p style="  font-size: 17px;text-align: justify;">Please wait for your payment and your registration to be confirmed. 
At the following step, the delegation will be assigned the countries it will represent during the conference.</p>
		<h4 style="color:#e4b928;">5-	Delegates registration</h4>
		<p style="  font-size: 17px;text-align: justify;">At this step, the head-delegate must enter the personal data of each one of the delegates composing the delegation. The committee each delegate will take part at should also be informed at this point.</p>
		<h4 style="color:#e4b928;">6-	Confirmation</h4>
		<p style="  font-size: 17px;text-align: justify;">At this point you will receive confirmation that you are officially a participant at the 18th AMUN. Remember to constantly check our website and social media for further information.</p>
</div>


<?php echo $this->load->view('_inc/footer') ?>