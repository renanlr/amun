<?php echo $this->load->view('_inc/header') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.validate.js" ></script>
<?php $this->load->helper('criptografia');?>
<div class="content-box">
    <?php if ($status < 4) { ?>
	<div class="titulo">Countries Registration</div>
	<?php echo form_open('form/cadastrarOpcaoPaises', 'class="form-professor" enctype="multipart/form-data" id="form"'); ?>
		<div class="dados">
            <p style="color:black;text-align: justify;"><span style="font-weight:bold;color:red;">At this step, you should submit your representation preferences, filling the form below.<br></span>
To fill this form, you must choose any combination of representations, as long as the combination of representations corresponds to the number of delegates in your delegation. Please note that some fields may be left unfilled.<br><span style="font-style: italic;"><br> Example: if your delegation is composed of 6 delegates, you can choose, for example, 6 one-delegate representations, or 2 three-delegate representations, or 1 four-delegates representations + 1 two-delegates representation, or even a six-delegates delegation.</span><br><br>
Each time you fill and submit the form with one combination, it will be registered as one of your preferences.<br> Please submit your combinations at the order you wish to have your preferences registered.<br> </p><br>
            <div class="subtitulo">Choose up to 6 representations</div>
            <table>
                <thead></thead>
                <tbody>
                    <tr>
                        <td>
                            <span>Representation 1:</span>
                            <select name="country1" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 45px;font-size: 20px;font-weight: bold;">+</span>
                            </td>
                        <td>
                            <span>Representation 2:</span>
                            <select name="country2" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 45px;font-size: 20px;font-weight: bold;">+</span>
                        </td>
                        <td>
                            <span>Representation 3:</span>
                            <select name="country3" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 35px;font-size: 20px;font-weight: bold;">+</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>Representation 4:</span>
                            <select name="country4" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 45px;font-size: 20px;font-weight: bold;">+</span>
                        </td>
                        <td>
                            <span>Representation 5:</span>
                            <select name="country5" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                            <span style="  position: relative;left: 45px;font-size: 20px;font-weight: bold;">+</span>
                        </td>
                        <td>
                            <span>Representation 6:</span>
                            <select name="country6" style="width:200px" form="form">
                                <option value="-1"></option>
                                <?php foreach ($paises as $pais) { ?>
                                    <option value="<?php  echo $pais->idpaises ?>"> <?php echo $pais->nome?> - <?php echo $pais->qtd_participantes?> delegates</option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
		</div>
		<input style="margin:20px auto; padding:12px 20px;" type="submit" value="Register Preference">
	<?php echo form_close(); ?>
    <?php }?>
    <div>
        <BR><BR><div class="titulo">Registered Preferences</div>
        <table class="table table-list table-condensed">
                <thead>
                    <tr>
                        <th style="font-size: 20px;">Preferences</th>
                        <th style="font-size: 20px;">Representations</th>
                    </tr>
                </thead>
                <?php $i=1; foreach ($paises_cadastrados as $combinacao) {?>
                    <tr>
                        <td>Preference <?php echo $i; ?></td>
                        <td><?php echo $combinacao; ?></td>
                    </tr>
                <?php $i= $i+1;} ?>
            </table>
    </div>

    <div style="text-align:center;margin-bottom: 40px;margin-top: 40px;">
        <a style="  color:white;cursor:pointer;background-color: #FECB20;padding: 21px;border-radius: 5px;" title="Proceed to payment" onclick="if (confirm('Are you sure that you want to proceed to payment? If you do this, no more changes in countries preferences will be avaliable')) window.location.replace('<?php echo base_url(); ?>index.php/usuario/alterarStatus/<?php echo criptografar(3);?>')">Proceed to Payment</a>
    </div>
</div>


    
<?php echo $this->load->view('_inc/footer') ?>