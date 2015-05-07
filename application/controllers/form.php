<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class form extends CI_Controller {

	/// MÉTODOS DE SERVIÇOS ----------------------------------------------------

    public function escolherOpcaoIndividual($novoStatus) {
    	$this->load->model('usuario_model');

    	if ($novoStatus != 2 || $novoStatus != 3) {
                if($this->usuario_model->atualizarStatus($this->session->userdata('login_id') ,$novoStatus)){
                    $this->session->set_userdata('Alert','Fill the form.');
                }
                else {
                    $this->session->set_userdata('Alert','No more places available');
                }

    	} else {
	    	$this->session->set_userdata('Alert','Something went wrong');
	    }

	    redirect('usuario/home');
   	}

   	public function enviarRespostasIcty(){
   		$this->load->model('form_model');
   		$this->load->model('usuario_model');

      $preferencies = array(
            1 => $this->input->post('first'),
            2 => $this->input->post('second'),
            3 => $this->input->post('third')
      );

        $data = array(
            'universidade' => $this->input->post('universidade'),
            'curso' => $this->input->post('curso'),
            'professor' => $this->input->post('professor'),
            'preferencies' => json_encode($preferencies),
            'delegation_interest' => $this->input->post('delegacao'),
            'social_events' => $this->input->post('social'),
            'icty_idusuario' => $this->session->userdata('login_id'),
        );


        if (($data['social_events'] == 0 || $data['social_events'] == 1) && ($data['delegation_interest'] == 0 || $data['delegation_interest'] == 1)) {

        	$this->form_model->inserirFormIcty($data);
        	$this->usuario_model->atualizarStatus($this->session->userdata('login_id'),4);
        	$this->session->set_userdata('Alert','Great, proceed to payment!');
        	redirect('usuario/home');
        } else {
        	$this->session->set_userdata('Alert','Something went wrong');
        }

   	}

    public function enviarRespostasPa(){
      $this->load->model('form_model');
      $this->load->model('usuario_model');

        $data = array(
            'universidade' => $this->input->post('universidade'),
            'curso' => $this->input->post('curso'),
            'professor' => $this->input->post('professor'),
            'experiencia' => $this->input->post('experiencia'),
            'pergunta' => $this->input->post('pergunta'),
            'delegation_interest' => $this->input->post('delegacao'),
            'social_events' => $this->input->post('social'),
            'pa_idusuario' => $this->session->userdata('login_id'),
        );

        if (($data['social_events'] == 0 || $data['social_events'] == 1) && ($data['delegation_interest'] == 0 || $data['delegation_interest'] == 1) && ($data['professor'] == 0 || $data['professor'] == 1)) {

          $this->form_model->inserirFormPa($data);
          $this->usuario_model->atualizarStatus($this->session->userdata('login_id'),4);
          $this->session->set_userdata('Alert','Great, proceed to payment!');
          redirect('usuario/home');
        } else {
          $this->session->set_userdata('Alert','Something went wrong');
        }

    }

    public function enviarRespostasDelegacao(){
      $this->load->model('form_model');
      $this->load->model('usuario_model');

      $integrantes = $this->input->post('qtd_integrantes');
      $gratuitos = $this->input->post('qtd_gratuidade');
      $pacotes = $this->input->post('qtd_pacotes');
      $vagas = $this->form_model->retornaQtdVagas();

      $data = array(
          'universidade' => $this->input->post('universidade'),
          'curso' => $this->input->post('curso'),
          'professor' => $this->input->post('professor'),
          'qtd_integrantes' => $integrantes,
          'qtd_gratuidade' => $gratuitos,
          'qtd_pacotes' => $pacotes,
          'delegacao_idusuario' => $this->session->userdata('login_id')
      );

      if ( ($integrantes > 6 || $integrantes < 1) || ($gratuitos > 6 || $gratuitos < 0) || ($pacotes > 6 || $pacotes < 0)) {
        $this->session->set_userdata('Alert','Something went wrong, please note that the maximum number of delegates in a delegation is 6.');
        redirect('form/cadastroDelegacao');
      } elseif($vagas->qtd_vagas_delegacao < $data['qtd_integrantes']) {
        $this->session->set_userdata('Alert','No more places available');
        redirect('usuario/home');
      } elseif($data['qtd_integrantes'] < $data['qtd_pacotes']){
        $this->session->set_userdata('Alert','Something went wrong, note that the maximum number of social events combo is up to the number of delegates.');
        redirect('form/paises');
      } else {
        $this->form_model->inserirFormDelegacao($data);
        $this->form_model->decrementarQtdVagasDelegacao($data['qtd_integrantes']);
        $this->usuario_model->atualizarStatus1($this->session->userdata('login_id'),2);
        $this->session->set_userdata('Alert','Great, now you can inform us your country preferences at the next step.');
        redirect('form/cadastroPaises');
      }

    }

    public function cadastrarOpcaoPaises(){
      $this->load->model('form_model');
      $this->load->model('usuario_model');
      $this->load->model('paises_model');
      $this->load->model('delegacao_model');

      $paises = array(
          'country1' => $this->input->post('country1'),
          'country2' => $this->input->post('country2'),
          'country3' => $this->input->post('country3'),
          'country4' => $this->input->post('country4'),
          'country5' => $this->input->post('country5'),
          'country6' => $this->input->post('country6'),
      );

      $sum = 0;

      foreach ($paises as $opcao) {
        if ($opcao == -1) {
          continue;
        }else{
          $sum += $this->paises_model->buscarPaisPorId($opcao)->qtd_participantes;
        }
      }

      $delegacao = $this->delegacao_model->buscarDelegacaoPorIdUsuario($this->session->userdata('login_id'));

      if ($delegacao->qtd_integrantes != $sum) {
        $this->session->set_userdata('Alert','Please, choose an option that corresponds with the number of delegates.');
        redirect('form/cadastroPaises');
      } else {
        $data = array(
          'delegacao_iddelegacao' => $delegacao->iddelegacao,
          'combinacao' => json_encode($paises),
          'status_aprovacao' => 0,
        );

        $this->paises_model->inserirOpcaoDePaises($data);
        $this->session->set_userdata('Alert','Great, proceed to payment, or insert another option');
        redirect('pagamento/payment');
      }

    }


    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

   	public function cadastroIndividual(){
   		$this->load->model('usuario_model');
        $dados = $this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));
        if ($dados->status == 2) {
        	$this->load->view('form/icty');
        } elseif ($dados->status == 3) {
        	$this->load->view('form/press');
        } else {
        	$this->session->set_userdata('Alert','Something went wrong');
        	redirect('usuario/home');
        }
   	}

    public function cadastroDelegacao(){
      $this->load->model('usuario_model');
      $dados = $this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));
      if ($dados->status == 1) {
        $this->load->view('form/delegacao');
      } else {
        $this->session->set_userdata('Alert','You have already submitted this form, go to the next step');
        redirect('form/cadastroPaises');
      }
    }

    public function cadastroPaises(){
      $this->load->model('form_model');
      $this->load->model('usuario_model');
      $this->load->model('paises_model');
      $this->load->model('delegacao_model');

      $user = $this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));

      if ($user->status==1) {
        $this->session->set_userdata('Alert','First fill the form.');
        redirect('usuario/home');
      } else {
        $delegacao = $this->delegacao_model->buscarDelegacaoPorIdUsuario($this->session->userdata('login_id'))->iddelegacao;
        $itens = $this->paises_model->buscarOpcoesDePaisesCadastrados($delegacao);
        $lista = array();

        foreach ($itens as $item) {
            $combinacao = json_decode($item->combinacao);
            $string_paises = '';
            foreach ($combinacao as $pais_id) {
              if ($pais_id == -1) {
                continue;
              }else{
                $pais_nome = $this->paises_model->buscarPaisPorId($pais_id)->nome;
                $string_paises .= $pais_nome.' - ';
              }
            }

            array_push($lista, $string_paises);
        }
        $dados['paises'] = $this->paises_model->buscarPaises();
        $dados['paises_cadastrados'] = $lista;
        $dados['status'] = $user->status;
        $this->load->view('form/paises', $dados);
      } 
    }
}

?>