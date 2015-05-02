<?php echo $this->load->view('_inc/header') ?>
    <div class="content-box">
    <p style="  font-size: 17px;text-align: justify;">
        Now, delegate, it is time to pay the registration fee and party entrances in order to complete the registration process. For Brazilian delegates, registrations will have the cost of <span class="bold">R$ 150,00</span> for the Press Agency and <span class="bold">R$ 175,00</span> for the ICTY in the first round of registrations.
The Social Events combo, which includes both Beer Garden and Main Party, costs <span class="bold">R$ 85,00</span>  if bought during the registration period.
Delegates must perform the payment within <span class="bold">5 business days</span> either by <span class="bold">bank transfer or bank deposit</span> and  <span class="bold">submit the receipt of the transaction</span> (a picture or digitalization) at the designated field below.
The value of your payment and 18th AMUN's bank account information are:
    </p><br>
    <span>Value: R$  <?php echo $valor ?>,00 </span><br>
    <span>CAREL AMUN</span><br>
    <span>3603-X</span><br>
    <span>C/C: 36.703-6</span><br>
    <span>Banco do Brasil</span><br>
    <?php echo form_open('pagamento/enviarComprovante', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
        <div class="dados">
            <div class="subtitulo">Personal</div>
            <span>Insert the number of the receipt</span>
            <input name="numero" type="text" style="width:300px">
            <span>Please upload a picture or digitalization of the receipt of the transaction.</span>
            <input name="foto" type="file" style="width:300px">
            <input type='submit' value="Send" style="margin:20px auto; padding:12px 20px;">
    <?php echo form_close(); ?>
    </div>
<?php echo $this->load->view('_inc/footer') ?>