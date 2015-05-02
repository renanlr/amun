<?php echo $this->load->view('_inc/header') ?>
    <div class="content-box">
    <span>Valor: <?php echo $valor ?> </span>

    <?php echo form_open('pagamento/enviarComprovante', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
        <div class="dados">
            <div class="subtitulo">Personal</div>
            <span>Número do comprovante</span>
            <input name="numero" type="text" style="width:300px">
            <span>Foto do comprovante</span>
            <input name="foto" type="file" style="width:300px">
            <input type='submit' value="Send" style="margin:20px auto; padding:12px 20px;">
    <?php echo form_close(); ?>
    </div>
<?php echo $this->load->view('_inc/footer') ?>