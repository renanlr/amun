<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagamento extends CI_Controller {

	/// MÉTODOS DE SERVIÇOS ----------------------------------------------------

    public function enviarComprovante(){
        $this->load->model('pagamento_model');
        $data = array(
            'numero'=> $this->input->post('numero'),
            'foto' => $_FILES['foto']
        );

        $config['upload_path'] = $this->base_img_dir();
        $config['allowed_types'] = 'jpg|png';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $extensao = strrchr($_FILES['foto']['name'],'.');
        $_FILES['foto']['name'] = md5(microtime()).'_'.$this->session->userdata('login_id').$extensao;
        $this->upload->do_upload('foto');
        $picture = $this->upload->data();
        $dados['foto'] = base_url().'complemento/com/'.$picture['file_name'];
        $data['foto'] = $dados['foto'];
        $this->pagamento_model->criarComprovante($this->session->userdata('login_id'),$data);
        $this->usuario_model->atualizarStatus($this->session->userdata('login_id'),5);
        redirect('usuario/home');

    }

    public function base_img_dir()
    {
        return './complemento/comprovantes';
    }


    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

    public function payment(){
        $this->load->model('usuario_model');
        $this->load->model('delegacao_model');

        if(($this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'))->status)<4){
            redirect('usuario/home');
        }
        if(($this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'))->status)==4) {
            if ($this->usuario_model->verificaPagamento($this->session->userdata('login_id'))) {
                $this->load->view('pagamento/confirmado');
            } else {
                if ($this->usuario_model->estrangeiro($this->session->userdata('login_id'))) {
                    $this->load->view('pagamento/paypal');
                } else {
                    if ($this->delegacao_model->delegacao($this->session->userdata('login_id'))) {
                        $dados['valor'] = $this->delegacao_model->retornaValorInc($this->session->userdata('login_id'));
                    } else {
                        $dados['valor'] = $this->usuario_model->retornaValorInsFesta($this->session->userdata('login_id'));
                    }

                    $this->load->view('pagamento/foto', $dados);
                }
            }
        }
        if(($this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'))->status)==5){
           $this->load->view('pagamento/pago');
        }
    }
    

    
        
}

?>