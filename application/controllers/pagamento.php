<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagamento extends CI_Controller {

	/// MÉTODOS DE SERVIÇOS ----------------------------------------------------

    

    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------
    public function payment(){
        $this->load->model('usuario_model');
        if($this->usuario_model->estrangeiro($this->session->userdata('login_id'))){
            $this->load->view('pagamento/paypal');
        }
        else{
            $this->load->view('pagamento/foto');
        }

    }
    

    
        
}

?>