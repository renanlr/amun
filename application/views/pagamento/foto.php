<?php echo $this->load->view('_inc/header') ?>
    <style type="text/css">
        .bold{
            font-weight: bold;
        }
        #form{
            font-size: 17px;
        }
    </style>

    <div class="content-box">
        <div class="dados">
            <div class="titulo">Personal Payment</div>
                <p style="  font-size: 17px;text-align: justify;">
                    Now, delegate, it is time to pay the registration fee and party entrances in order to complete the registration process.<br> Registrations will have the cost of <span class="bold">R$ 150,00</span> for the Press Agency and <span class="bold">R$ 175,00</span> for the ICTY in the first round of registrations.
            The Social Events combo, which includes both Beer Garden and Main Party, costs <span class="bold">R$ 85,00</span>  if bought during the registration period.
            Delegates must perform the payment within <span class="bold">5 business days</span> either by <span class="bold">bank transfer or bank deposit</span> and  <span class="bold">submit the receipt of the transaction</span> (a picture or digitalization) at the designated field below.
            The value of your payment and 18th AMUN's bank account information are:
                </p><br>

                <?php echo form_open('pagamento/enviarComprovante', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
                    <span class="bold" style="color:red;">Value: R$<?php echo $valor ?>,00 <br></span>
                    <span>CAREL AMUN<br></span>
                    <span>Banco do Brasil <br></span>
                    <span>Ag.: 3603-X<br></span>
                    <span>C.C.: 36.703-6<br><br></span>

                    <span class="bold">Insert the number of the receipt:<br></span>
                    <input name="numero" type="text" style="width:300px">
                    <span class="bold">Please upload a picture or digitalization of the receipt of the transaction.</span>
                    <input name="foto" type="file" style="width:300px">
                    <input type='submit' value="Send" style="margin:20px auto; padding:12px 20px;">
                <?php echo form_close(); ?>
        </div>
    </div>
<?php echo $this->load->view('_inc/footer') ?>