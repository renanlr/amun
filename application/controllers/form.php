<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class form extends CI_Controller {

	/// MÉTODOS DE SERVIÇOS ----------------------------------------------------

    public function escolherOpcaoIndividual($novoStatus) {
    	$this->load->model('usuario_model');

    	if ($novoStatus != 2 || $novoStatus != 3) {
                if($this->usuario_model->atualizarStatus($this->session->userdata('login_id') ,$novoStatus)){
                    $this->session->set_userdata('mensagem','Seccess');
                }
                else {
                    $this->session->set_userdata('mensagem','Something went wrong');
                }

    	} else {
	    	$this->session->set_userdata('mensagem','Something went wrong');
	    }

	    redirect('usuario/home');
   	}

   	public function enviarRespostasIcty(){
   		$this->load->model('form_model');
   		$this->load->model('usuario_model');

        $data = array(
            'universidade' => $this->input->post('universidade'),
            'curso' => $this->input->post('curso'),
            'preferencies' => $this->input->post('preferencies'),
            'delegation_interest' => $this->input->post('delegacao'),
            'social_events' => $this->input->post('social'),
            'usuario_idusuario' => $this->session->userdata('login_id'),
        );


        if (($data['social_events'] == 0 || $data['social_events'] == 1) && ($data['delegation_interest'] == 0 || $data['delegation_interest'] == 1)) {
        	$this->form_model->inserirFormIcty($data);
        	$this->usuario_model->atualizarStatus($this->session->userdata('login_id'),4);
        	$this->session->set_userdata('mensagem','Seccess, now pay!');
        	redirect('usuario/home');
        } else {
        	$this->session->set_userdata('mensagem','Something went wrong');
        }

   	}

    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

   	public function cadastro(){
   		$this->load->model('usuario_model');
        $dados = $this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));
        if ($dados->status == 2) {
        	$this->load->view('form/icty');
        } elseif ($dados->status == 3) {
        	$this->load->view('form/press');
        } else {
        	$this->session->set_userdata('mensagem','Seu formulário já foi enviado, para confirmar sua vaga realize o pagamento.');
        	redirect('usuario/home');
        }
   	}


}

?>