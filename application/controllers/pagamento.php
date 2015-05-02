<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagamento extends CI_Controller {

	/// MÉTODOS DE SERVIÇOS ----------------------------------------------------

    

    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

    public function payment(){
        $this->load->model('usuario_model');
        if(($this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'))->status)<4){
            redirect('usuario/home');
        }
        if($this->usuario_model->verificaPagamento($this->session->userdata('login_id'))){
            $this->load->view('pagamento/confirmado');
        }
        else{
            if($this->usuario_model->estrangeiro($this->session->userdata('login_id'))){
                $this->load->view('pagamento/paypal');
            }
            else{
                if($this->usuario_model->delegacao()){

                }
                $valor = $this->usuario_model->retornaValorInsFesta($this->session->userdata('login_id'));

                    if(a){}

                $dados['valor'] = $this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'))->valor;
                $this->load->view('pagamento/foto',$dados);
            }
        }

    }
    

    
        
}

?>