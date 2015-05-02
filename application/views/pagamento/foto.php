<?php echo $this->load->view('_inc/header') ?>
    <span>Valor: <?php echo $valor ?> </span>

    <?php echo form_open('usuario/cadastrar', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
        <div class="dados">
            <div class="subtitulo">Personal</div>
            <span>Número do comprovante</span>
            <input name="numero" type="text" style="width:300px">
            <span>Foto do comprovante</span>
            <input name="surName" type="text" style="width:300px">
    <?php echo form_close(); ?>
<?php echo $this->load->view('_inc/footer') ?>