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

    public function base_img_dir(){
        return './complemento/comprovantes';
    }


    /// MÉTODOS DE CARREGAMENTO DE PÁGINAS ------------------------------------

    public function payment(){
        $this->load->model('usuario_model');
        $this->load->model('delegacao_model');

        $user = $this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'));

        if ($user->tipo == 1) {
            if(($user->status) < 4){
                redirect('usuario/home');
            }elseif(($user->status)==4) {
                if ($this->usuario_model->estrangeiro($this->session->userdata('login_id'))) {
                    $this->load->view('pagamento/paypal');
                } else {
                    if ($this->delegacao_model->delegacao($this->session->userdata('login_id'))) {
                        $dados['valor'] = $this->delegacao_model->retornaValorInc($this->session->userdata('login_id'));
                    } else {
                        $dados['valor'] = $this->usuario_model->retornaValorInsFesta($this->session->userdata('login_id'));
                    }
                    $dados['tipo'] = 1;
                    $this->load->view('pagamento/foto', $dados);
                }
            }elseif(($this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'))->status)==5){
               $this->session->set_userdata('Alert', 'Please wait for your payment to be confirmed. Once it\'s confirmed, you will be informed by e-mail.');
               redirect('usuario/home');
            }elseif(($this->usuario_model->buscarUsuarioPorId($this->session->userdata('login_id'))->status)==6){
                $this->session->set_userdata('Alert', 'Your payment is now confirmed, see you at the 18th AMUN!');
                redirect('usuario/home');
            }
        }elseif ($user->tipo == 2) {
            if ($user->status < 3) {
                $this->session->set_userdata('Alert', 'You have steps to complete before payment.');
                redirect('usuario/home');
            }elseif($user->status == 3){
                $delegation = $this->delegacao_model->buscarDelegacaoPorIdUsuario($this->session->userdata('login_id'));
                if ($delegation->qtd_gratuidade == 0) {
                    //$dados['valor'] = $this->delegacao_model->retornaValorInc($this->session->userdata('login_id'));
                    $dados['tipo'] = 2;
                    $this->load->view('pagamento/foto', $dados);
                }else{
                    $this->session->set_userdata('Alert', 'Please send e-mail to amun@amun.org.br with information (name , e- mail , cpf) of delegate who has gratuity. If you have already sent wait for confirmation.');
                    redirect('usuario/home');
                }
            }elseif($user->status == 4){
                $this->session->set_userdata('Alert', 'Please wait for your payment to be confirmed. Once it\'s confirmed, you will be informed by e-mail.');
                redirect('usuario/home');
            }else{
                $this->session->set_userdata('Alert', 'Your payment is now confirmed, see you at the 18th AMUN!');
                redirect('usuario/home');
            }
        }
    }
    

    
        
}

?>