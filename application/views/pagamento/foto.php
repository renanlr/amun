<?php echo $this->load->view('_inc/header') ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.validate.js" ></script>
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
            <?php if($tipo==1){?>
                <p style="  font-size: 17px;text-align: justify;">
                    Now, delegate, it is time to pay the registration fee and party entrances in order to complete the registration process.<br> Registrations will have the cost of <span class="bold">R$ 150,00</span> for the Press Agency and <span class="bold">R$ 175,00</span> for the ICTY in the first round of registrations.
            The Social Events combo, which includes both Beer Garden and Main Party, costs <span class="bold">R$ 85,00</span>  if bought during the registration period.
            Delegates must perform the payment within <span class="bold">5 business days</span> either by <span class="bold">bank transfer or bank deposit</span> and  <span class="bold">submit the receipt of the transaction</span> (a picture or digitalization) at the designated field below.
            The value of your payment and 18th AMUN's bank account information are:
                </p><br>
            <?php }else{?>
                <p style="  font-size: 17px;text-align: justify;">
                    At this step, you're expected to pay the registration fee(s) and party entrances in order to complete the registration process. For Brazilian delegations, registrations will have the cost of R$ 175,00 per delegate in the first round of registrations. For international delegations, the cost will be of US$ 70,00 per delegate. The Social Events combo, which includes both Beer Garden and Main Party, costs R$85,00 or US$ 30,00 per delegate if bought during the registration period.
                    Brazilian delegations must perform the payment within 5 business days either by bank transfer or bank deposit and submit the receipt of the transaction (a picture or digitalization) at the designated field and insert other requested information regarding the transaction. Only one transaction should be performed by the delegation.
                    International payments will be received through Paypal.
                </p><br>
            <?php }?>
                <?php echo form_open('pagamento/enviarComprovante', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
                    <span class="bold" style="color:red;">Value: R$<?php echo $valor ?>,00 <br></span>
                    <span>CAREL UNB<br></span>
                    <span>Banco do Brasil <br></span>
                    <span>CNPJ 01.275.310/0001-81<br></span>
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

    <script>
        $(document).ready(function(){
            $("#form").validate({
                rules: {
                    numero: "required",
                    foto: {
                        required: true
                    },
                },
                messages: {
                    numero: "Incomplete.",
                    foto: {
                        required: "Incomplete.",
                    },
                }
                
            });
       });
       
    </script> 
<?php echo $this->load->view('_inc/footer') ?>