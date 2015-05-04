<?php echo $this->load->view('_inc/header') ?>
    <div class="content-box">
    <?php echo form_open('pagamento/enviarComprovante', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
        <div class="dados">
            <div class="subtitulo">Personal Payment</div>
            <span>Value: <?php echo $valor ?> <br></span>
            <span>CAREL AMUN<br></span>
            <span>Ag.: 3603-X<br></span>
            <span>C.C.: 36.703-6<br></span>
            <span>Insert the number of the receipt<br><br></span>
            <input name="numero" type="text" style="width:300px">
            <span>Please upload a picture or digitalization of the receipt of the transaction.</span>
            <input name="foto" type="file" style="width:300px">
            <input type='submit' value="Send" style="margin:20px auto; padding:12px 20px;">
    <?php echo form_close(); ?>
    </div>
<?php echo $this->load->view('_inc/footer') ?>