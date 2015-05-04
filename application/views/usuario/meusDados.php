<?php echo $this->load->view('_inc/header') ?>
    <?php // var_dump($usuario);exit;?>
    <div class="content-box">
    <?php echo form_open('usuario/alterarDados') ?>
    <div class="dados">
        <div class="subtitulo">Personal</div>
        <span>Name</span><br>
        <input name="name" type="text" style="width:300px" value="<?php echo $usuario->nome?>"><br>
        <span>Surname</span><br>
        <input name="surName" type="text" style="width:300px" value="<?php echo $usuario->sobrenome?>"><br>
        <span>Badge Name</span><br>
        <input name="badgeName" type="text" style="width:300px" value="<?php  echo $usuario->nome_cracha?>"><br>
        <span>E-mail</span><br>
        <input name="email" type="text" style="width:300px" value="<?php echo $usuario->email?>"><br>
        <span>Password</span><br>
        <input name="senha" type="password" style="width:200px"><br>
        <span>Mobile Phone</span><br>
        <input name="cel" class="telefone" type="text" style="width:200px" value="<?php echo $usuario->celular?>"><br>
        <span>ZIP Code</span><br>
        <input name="zip" type="text" style="width:200px" value="<?php  echo $usuario->cep?>"><br>
        <span>City</span><br>
        <input name="city" type="text" style="width:200px"value="<?php  echo $usuario->cidade?>"><br>
        <span>State/Province</span><br>
        <input name="state" type="text" style="width:200px" value="<?php echo $usuario->estado?>"><br>
        <span>Country</span><br>

        <span>Identification (CPF/passport)</span><br>
        <input name="identification" type="text" style="width:200px" value="<?php echo $usuario->identification?>"><br>

        <input style="margin:20px auto; padding:12px 20px;" type="submit" value="Send" onclick="">
        <?php echo form_close(); ?>
    </div>
    </div>

<?php echo $this->load->view('_inc/footer') ?>