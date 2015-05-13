<?php echo $this->load->view('_inc/header') ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.validate.js" ></script>

    <div class="content-box">
        <div class="titulo">Listagem</div>
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Pais</th>
                <th>Tipo</th>
                <th>Status</th>
                <th>Status do pagamento</th>
                <th colspan="3"></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($usuarios as $usuario){ ?>
            <tr>
                <td><?php echo $usuario->nome ?></td>
                <td><?php echo $usuario->sobrenome ?></td>
                <td><?php echo $usuario->email ?></td>
                <td><?php echo $usuario->celular ?></td>
                <td><?php echo $paises[$usuario->lista_paises_id-3]->nome ?></td>
                <td><?php echo $usuario->tipo ?></td>
                <td><?php echo $usuario->status ?></td>
                <td><?php if($usuario->situacao_pagamento){
                        echo "Pago";
                    }else{
                        echo "Não pago";
                    }; ?></td>
            </tr>
            <?php }?>
            </tbody>
        </table>


    </div>

<?php echo $this->load->view('_inc/footer') ?>