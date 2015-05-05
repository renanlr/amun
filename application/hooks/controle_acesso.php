<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controle_Acesso {

	function init() {

		//para utilizar a função date() do php
		if( ! ini_get('date.timezone') )
		{
		   date_default_timezone_set('GMT');
		}

		$permissao = array();

		$permissao['usuario'] = array();
        $permissao['form'] = array();
        $permissao['pagamento'] = array();

		$permissao['usuario']['index'] = array(0, 1, 2, 3);
		$permissao['usuario']['logar'] = array(0, 1, 2, 3);
		$permissao['usuario']['recuperarSenha'] = array(0, 1, 2, 3);
		$permissao['usuario']['deslogar'] = array(1, 2, 3);
		$permissao['usuario']['home'] = array(1, 2, 3);
		$permissao['usuario']['login'] = array(0);
		$permissao['usuario']['recuperacaoSenha'] = array(0, 1, 2, 3);
		$permissao['usuario']['cadastro'] = array(0, 1, 2, 3);
		$permissao['usuario']['cadastrar'] = array(0, 1, 2, 3);
        $permissao['usuario']['meusDados'] = array(0, 1, 2, 3);
        $permissao['usuario']['alterarDados'] = array(0, 1, 2, 3);
        $permissao['usuario']['alterarStatus'] = array(1, 2);

		$permissao['form']['escolherOpcaoIndividual'] = array(1);
		$permissao['form']['cadastroIndividual'] = array(1);
		$permissao['form']['enviarRespostasIcty'] = array(1);
		$permissao['form']['enviarRespostasPa'] = array(1);
		$permissao['form']['cadastroDelegacao'] = array(2);
		$permissao['form']['enviarRespostasDelegacao'] = array(2);
		$permissao['form']['cadastroPaises'] = array(2);
		$permissao['form']['cadastrarOpcaoPaises'] = array(2);

        $permissao['pagamento']['payment'] = array(1, 2);
        $permissao['pagamento']['enviarComprovante'] = array(1, 2);


		$ci =& get_instance();
		$controller = $ci->router->class;
		$action = $ci->router->method;

		if ($ci->session->userdata('login_perfil') == FALSE) {
			$perfil = 0;
		}
		else {
			$perfil = $ci->session->userdata('login_perfil');
		}

		if($ci->session->userdata('login_id') == true){
			$ci->load->model('usuario_model');
			if($ci->usuario_model->verificarId($ci->session->userdata('login_id'))==false){
				$ci->session->sess_destroy();
				redirect('usuario');
			}
		}

		$v = false;
		foreach ($permissao[$controller][$action] as $opcao) {
			if ($opcao == $perfil) {
				$v = true;
				break;
			}
		}
		if (!$v) {
			redirect('usuario');
		}

	}

}

?>